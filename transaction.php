<?php
include_once('./includes/init.php');
if(!isset($_POST) || !count($_POST)) header('location:index.php');
$post = $_POST;
$file = isset($_FILES['bgimage']) ? $_FILES['bgimage'] : null;
if($file){
	$file_prefix = (strtolower($file['type']) == 'image/png') ? 'png' : 'jpg';
	$file_handler = fopen($file['tmp_name'], 'r');
	$imagedata = fread($file_handler, filesize($file['tmp_name']));
	$image = imagecreatefromstring($imagedata);
	$imagesize = getimagesize($file['tmp_name']);
} else {
	$file_prefix = 'jpg';	
}
$card_width = 500;
$ratio = $card_width / $imagesize[0];
$gap = 60;
$bottom_gap = 0;

$card_height = ($imagesize[1] * $ratio) + $gap + $bottom_gap;
$logo = imagecreatefrompng('./images/blue-gift-icon.png');
$logosize = getimagesize('./images/blue-gift-icon.png');
$final_image = imagecreatetruecolor($card_width,$card_height);
$white = imagecolorallocate($final_image,255,255,255);
imagefill($final_image,0,0,$white);
imagecopyresized($final_image,$logo,10,10,0,0,50,50,$logosize[0],$logosize[1]);
imagecopyresized($final_image,$image,0,$gap,0,0,$card_width,($imagesize[1] * $ratio),$imagesize[0],$imagesize[1]);

//Put in the text.
$black = imagecolorallocate($final_image, 0, 0, 0);
$font = './font/Telex.ttf';
$text = 'RM' . $post['amount'];
$textsize = imagettftext($final_image,24,0,375,45,$black,$font,$text);
$brandingsize = imagettftext($final_image,20,0,65,40,$black,$font,'GivingJoy.org');

foreach($post as $key => $value){
	if(!is_string($value)) continue;
	$post[$key] = mysql_real_escape_string($value);
};
$amount = (float)$post['amount'];

extract($post,EXTR_PREFIX_ALL,'buy');

$gj_token = generate_hash();
$interests = join(',',$buy_fields_checkbox);

imagejpeg($final_image,'./images/gift_cards/' . $gj_token . '.jpg');

$query = "INSERT INTO gj_giftcards (recipientname,recipientemail,sendername,senderemail,interests,message,amount,token,status) VALUES ('$buy_recipientname','$buy_recipientemail','$buy_sendername','$buy_senderemail','$interests','$buy_message',$amount,'$gj_token','pending payment')";

do_query($query);

$sandbox = ($sandbox) ? '.sandbox' : '';
$API_Endpoint = "https://api-3t" . $sandbox . ".paypal.com/nvp";

// Set the curl parameters.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
curl_setopt($ch, CURLOPT_VERBOSE, 1);

// Turn off the server and peer verification (TrustManager Concept).
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$success_callback_url = $domain . '/transaction-success.php';
$cancel_callback_url = $domain . '/transaction-cancel.php';

//Step 1: Set Up the Payment Authorization

$padata = '&METHOD=SetExpressCheckout'.
'&PAYMENTREQUEST_0_PAYMENTACTION=SALE'.
'&PAYMENTREQUEST_0_AMT=' . urlencode($amount).
'&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($currency).
'&L_PAYMENTREQUEST_0_QTY0='. urlencode(1).
'&L_PAYMENTREQUEST_0_AMT0='.urlencode($amount).
'&L_PAYMENTREQUEST_0_NAME0='.urlencode('Giving Joy RM' . $amount . ' Gift Card').
'&RETURNURL=' . urlencode($success_callback_url).
'&CANCELURL=' . urlencode($cancel_callback_url);

$nvpreq = "VERSION=$version&PWD=$merchant_password&USER=$merchant_username&SIGNATURE=$merchant_signature$padata";


// Set the request as a POST FIELD for curl.
curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

// Get response from the server.
$auth_response = urldecode(curl_exec($ch));
$auth_response = explode('&',$auth_response);
$auth_response_ = array();
foreach($auth_response as $key => $auth_val){
	$auth_val = explode('=',$auth_val);
	$auth_response_[$auth_val[0]] = $auth_val[1];	
}
$auth_response = $auth_response_;
unset($auth_response_);

//Pop the token into the transaction details in the database.
$query = "INSERT INTO gj_transactions (amount,token,paymentstatus) VALUES ($amount,'" . $auth_response['TOKEN'] . "','pending')";
do_query($query);

$query = "UPDATE gj_giftcards SET transaction = (SELECT id FROM gj_transactions WHERE token='" . $auth_response['TOKEN'] . "') WHERE token = '$gj_token'";
do_query($query);




//Step 2, redirect the user to Paypal to authorize the payment.
$paypal_url = 'https://www' . $sandbox . '.paypal.com/webscr?cmd=_express-checkout&token=' . $auth_response['TOKEN'];
header('location:' . $paypal_url);





?>