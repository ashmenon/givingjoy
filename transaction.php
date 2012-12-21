<?php
include_once('./includes/init.php');

$post = $_POST;
$amount = $post['amount'];

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
'&L_PAYMENTREQUEST_0_NAME0='.urlencode('Gift Card Test 1').
'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode('SKU13141').
'&RETURNURL=' . urlencode($success_callback_url).
'&CANCELURL=' . urlencode($cancel_callback_url);

$nvpreq = "METHOD=SetExpressCheckout&VERSION=$version&PWD=$merchant_password&USER=$merchant_username&SIGNATURE=$merchant_signature$padata";


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

//Step 2, redirect the user to Paypal to authorize the payment.
$paypal_url = 'https://www' . $sandbox . '.paypal.com/webscr?cmd=_express-checkout&token=' . $auth_response['TOKEN'];
header('location:' . $paypal_url);





?>