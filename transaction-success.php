<?php 
include_once('./includes/init.php'); 

if(!isset($_GET['token'])) header('location:index.php');
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

$padata = '&METHOD=GetExpressCheckoutDetails'.
'&TOKEN=' . $_GET['token'];

$nvpreq = "VERSION=$version&PWD=$merchant_password&USER=$merchant_username&SIGNATURE=$merchant_signature$padata";


// Set the request as a POST FIELD for curl.
curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

$capture_payment = urldecode(curl_exec($ch));
$capture_payment = explode('&',$capture_payment);
$capture_payment_ = array();
foreach($capture_payment as $key => $capture_payment_val){
	$capture_payment_val = explode('=',$capture_payment_val);
	$capture_payment_[$capture_payment_val[0]] = $capture_payment_val[1];	
}
$capture_payment = $capture_payment_;
unset($capture_payment_);

$query = "UPDATE gj_transactions SET payerid='" . $capture_payment['PAYERID'] . "', payeremail='" . $capture_payment['EMAIL'] . "', payername='" . $capture_payment['FIRSTNAME'] . ' ' . $capture_payment['LASTNAME'] . "', payerstatus='" . $capture_payment['PAYERSTATUS'] . "', paymentstatus='authorized' WHERE token = '" . $capture_payment['TOKEN'] . "' AND paymentstatus = 'pending'";
do_query($query);


$padata = '&METHOD=DoExpressCheckoutPayment'.
'&TOKEN=' . $capture_payment['TOKEN'] . 
'&PAYERID=' . $capture_payment['PAYERID'] . 
'&PAYMENTREQUEST_0_PAYMENTACTION=SALE' .
'&PAYMENTREQUEST_0_AMT=' . $capture_payment['PAYMENTREQUEST_0_AMT'] .
'&PAYMENTREQUEST_0_CURRENCYCODE=' . $capture_payment['PAYMENTREQUEST_0_CURRENCYCODE'];

$nvpreq = "VERSION=$version&PWD=$merchant_password&USER=$merchant_username&SIGNATURE=$merchant_signature$padata";

// Set the request as a POST FIELD for curl.
curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
$final_capture = urldecode(curl_exec($ch));
$final_capture = explode('&',$final_capture);
$final_capture_ = array();
foreach($final_capture as $key => $final_capture_val){
	$final_capture_val = explode('=',$final_capture_val);
	$final_capture_[$final_capture_val[0]] = $final_capture_val[1];	
}
$final_capture = $final_capture_;
unset($final_capture_);

$amount = (float)$final_capture['PAYMENTINFO_0_AMT'];
$paypal_fee = (float)$final_capture['PAYMENTINFO_0_FEEAMT'];
$nett_amount = $amount - $paypal_fee;

$query = "UPDATE gj_transactions SET paymentstatus='complete', paypalfee = $paypal_fee, nettamount = $nett_amount WHERE token='" . $final_capture['TOKEN'] . "'";
do_query($query);

$query = "UPDATE gj_giftcards SET status='payment complete' WHERE transaction = (SELECT id FROM gj_transactions WHERE token = '" . $final_capture['TOKEN'] . "' AND paymentstatus='complete')";
do_query($query);


//Get details of the giftcard.
$giftcard_details = get_query("SELECT * FROM gj_giftcards WHERE transaction = (SELECT id FROM gj_transactions WHERE token = '" . $final_capture['TOKEN'] . "' AND paymentstatus='complete') LIMIT 0,1");
$giftcard_details = $giftcard_details[0];



//Send out email to the sender.
$emailmessage = '
<html><body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" valign="top">
			<p>Dear ' . $giftcard_details['sendername'] . ',</p>
			<p>The GivingJoy.org Gift Card that you bought for  ' . $giftcard_details['recipientname'] . ' for RM' . $giftcard_details['amount'] . ' has been successfully processed.</p>
			
			<p>You can use your GivingJoy.org Gift Card to make contributions to various projects and charities listed on the GivingJoy.org website. To do so, click <a href="' . $domain . '/use-a-gift-card.php?t=' . $giftcard_details['token'] . '">here</a>.</p>
			
			<p>If the above link does not work for you, simply go to the GivingJoy.org website, select "Use a Gift Card" from the menu, and enter the token below:</p>
			<p align="center"><strong>' . $giftcard_details['token'] . '</strong></p>
			
			<p>We at GivingJoy.org would like to thank you and ' . $giftcard_details['sendername'] . ' for helping us make a difference in the world. We look forward to having you on the site!</p>
			
			<p>Sincerely,<br />
			The GivingJoy.org Team<br />
			<a href="' . $domain . '">http://www.givingjoy.org</a>
			</p>			
		</td>
		<td style="width:20px;"></td>
		<td valign="top" align="right">
			<a href="' . $domain . '/use-a-gift-card.php?t=' . $giftcard_details['token'] . '">
				<img src="' . $domain . '/images/gift_cards/' . $giftcard_details['token'] . '.jpg" />
			</a>
		</td>
	</tr>
</table></body></html>
';

$headers = "From: " . $adminemail . "\r\n";
$headers .= "Reply-To: " . $adminemail . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$sendmail = @mail($giftcard_details['sendername'] . '<' . $giftcard_details['senderemail'] . '>','Dear ' . $giftcard_details['sendername'] . ', your GivingJoy.org Gift Card has been sent!',$emailmessage,$headers);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Success</title>	
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Congratulations!</h3>
			<p class="lead">You have successfully purchased a Gift Card!</p>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<div class="row-fluid">
					<p>Your Gift Card purchase was successful. How would you like <strong><?php echo $giftcard_details['recipientname']; ?></strong> to receive his/her Gift Card?</p>
					<div class="height-block"></div>
					<div class="row-fluid">	
						<div class="span6 align-center">
							<a id="sendbyemail" data-giftcard-token="<?php echo $giftcard_details['token']; ?>" class="btn btn-large btn-primary" href="#"><i class="icon-envelope"></i>&nbsp;Email</a>
							<br /><br />
							<span class="muted"><strong><?php echo $giftcard_details['recipientname']; ?></strong> will receive his/her Gift Card in his/her email.</span>
						</div>
						<div class="span6 align-center">
							<a id="sendbyprint" class="btn btn-large btn-primary" target="_blank" href="/images/gift_cards/<?php echo $giftcard_details['token']; ?>.jpg"><i class="icon-print"></i>&nbsp;Print</a>
							<br /><br />
							<span class="muted">Clicking on the button above will guide you to the image, which you can print out at home. Print the Gift Card and give it to <strong><?php echo $giftcard_details['recipientname']; ?></strong> as a present.</span>
						</div>
					</div>
					<div class="height-block"></div>
					<div id="email_message" class="align-center" style="display:none;">
						<p>An email has been sent to <strong><?php echo $giftcard_details['recipientname']; ?></strong>. You will now be redirected to the frontpage shortly.</p>
					</div>
				</div>
			</div>
			<div class="span4">
				<img src="/images/happy-children.jpg" />
				<div class="height-block"></div>
				<h4>Thank You!</h4>
				<p>
					Besides being an awesome person and buying a gift for <?php echo $giftcard_details['recipientname']; ?>, you are also helping to support various causes and efforts to make the world a better place. Go ahead, pat yourself on the back, you've earned it.
				</p>				
			</div>
		</div>
	</div>
	<?php include_once('./includes/js.php'); ?>
</body>

</html>
