<?php
include_once('./includes/init.php');

if(!$_POST || !count($_POST)) die('Illegal Access');
$function = $_POST['fn'];
if(!isset($_POST['options']) || !is_array($_POST['options'])){
	$options = array();
} else {
	$options = $_POST['options'];
}
switch($function){
	case 'send_recipient_email':
	send_recipient_email($_POST['giftcard_token'],$options);
	break;
}

send_recipient_email($giftcard_token,$options){
	$giftcard_token = mysql_real_escape_string($giftcard_token);
	$giftcard_details = get_query("SELECT * FROM gj_giftcards WHERE token='$giftcard_token' LIMIT 0,1");
	$giftcard_details = $giftcard_details[0];
	$projects = get_query("SELECT * FROM gj_projects ORDER BY RAND() LIMIT 0,3");

	//Send out email to the recipient.
	$emailmessage = '
	<html><body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="left" valign="top">
				<p>Dear ' . $giftcard_details['recipientname'] . ',</p>
				<p>' . $giftcard_details['sendername'] . ' has purchased a GivingJoy.org Gift Card for you worth RM' . $giftcard_details['amount'] . '. He/She has also added the following message:</p>
				
				<p><em>' . $giftcard_details['message'] . '</em></p>
				
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
		<tr>
			<td colspan="2">
				<h4>Here are some projects that you can contribute to:</h4>
			</td>
		</tr>
		<tr>
		<td colspan="2">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		';
		foreach($projects as $project){
			$images = explode('||',$project['images']);
			$main_image = $images[0];
			echo "<td>";
			echo '<img src="' . $domain . $main_image . '" alt="' . $project['title'] . '" title="' . $project['title'] . '" />';
			echo '<br /><br />';
			echo '<h5><a href="' . $domain . '/project?id=' . $project['id'] . '" title="' . $project['title'] . '">' . $project['title'] . '</a></h5>';
			echo "</td>":
		}
		$emailmessage .= '
		</tr>
		</table>
		</td>
		</tr>
	</table></body></html>
	';

	$headers = "From: " . $adminemail . "\r\n";
	$headers .= "Reply-To: " . $adminemail . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$sendmail = @mail($giftcard_details['recipientname'] . '<' . $giftcard_details['recipientemail'] . '>',$giftcard_details['sendername'] . ' has sent you a GivingJoy.org Gift Card!',$emailmessage,$headers);


	$response = json_encode('status' => 'OK','mailsend' => $sendmail);
	die($response);


}



?>