<?php include_once('./includes/init.php'); ?>
<?php
if(!$_POST || !count($_POST)) header('location: /index.php');
$post = $_POST;

//Get variables from the POST parameters.
$projects = explode(',',$post['projects']);
$token = $post['gift_card_token'];


//Get card details from the database.
$card_details = get_query("SELECT * FROM gj_giftcards WHERE token = '$token' AND status='payment complete'");
$card_details = $card_details[0];


//Check if all projects are actually in database. This check should always return true.
$check_projects = get_query("SELECT * FROM gj_projects WHERE id IN (" . join(',',$projects) . ")");

$projects_ = array();
foreach($projects as $key => $project_id){
	$project_exists = false;
	foreach($check_projects as $check_project){
		if($check_project['id'] == $project_id) $project_exists = true;
	}
	if($project_exists) $projects_[] = $project_id;
}
$projects = $projects_;

$payment_amount = (float)$card_details['amount'] * 0.8; //80% goes to the projects.
$per_project = round($payment_amount/count($projects),2);

foreach($projects as $project_id){
	$new_donation = do_query("INSERT INTO gj_donations (giftcard,project,amount,status) VALUES (" . $card_details['id'] . ",$project_id,$per_project,'not paid')");
}


//Send email to the recipient.
$emailmessage = "Dear " . $card_details['recipientname'] . ",

This email is to let you know that your contribution of RM" . $card_details['amount'] . " has been successfully assigned to the following projects:

";
foreach($check_projects as $check_project){
	$emailmessage .= $check_project['title'] . "\r\n";
}

$emailmessage .= "

An email will also be sent to " . $card_details['sendername'] . " to let him/her know that his/her gift to you has been utilized.

We thank you for being a part of the GivingJoy.org process and making a difference in the world, and we hope you will do so again soon!

Regards,
GivingJoy.org System
http://www.givingjoy.org";

$mailsend = @mail($card_details['recipientname'] . '<' . $card_details['recipientemail'] . '>', 'Your GivingJoy.org Gift Card has been successfully redeemed!', $emailmessage,'From: ' . $adminname . '<' . $adminemail . '>' . "\r\n" . 'Reply-To:' . $adminname . '<' . $adminemail . '>');


//Send one to the sender as well.
$emailmessage = "Dear " . $card_details['sendername'] . ",

This email is to let you know that " . $card_details['recipientname'] . " has successfully redeemed the GivingJoy.org gift card worth RM" . $card_details['amount'] . " that you sent him/her. " . $card_details['recipientname'] . " has chosen to support the following projects:

";
foreach($check_projects as $check_project){
	$emailmessage .= $check_project['title'] . "\r\n";
}

$emailmessage .= "

Once again, we would like to thank you for being a part of the GivingJoy.org process and making a difference in the world, and we hope you will do so again soon!

Regards,
GivingJoy.org System
http://www.givingjoy.org";

$mailsend = @mail($card_details['sendername'] . '<' . $card_details['senderemail'] . '>', $card_details['recipientname'] . ' has successfully redeemed his/her GivingJoy.org Gift Card!', $emailmessage,'From: ' . $adminname . '<' . $adminemail . '>' . "\r\n" . 'Reply-To:' . $adminname . '<' . $adminemail . '>');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thank You! | Giving Joy</title>
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>You're Awesome!</h3>
		</div>
		
		<div class="row-fluid">
			<p class="lead">
				No, seriously.
			</p>
			<p>
				You and <?php echo $card_details['sendername']; ?> have helped make a difference in the world today!
			</p>
			<p>
				As you may have realized, the site is currently in its beta stages. We intend to take this site to great heights, and for that we need your help. How was the experience of using the site? What areas in particular did we do well on? What are the areas that could use some improvement? Your feedback is crucial in making this site bigger and better, and ultimately helping more organizations and projects around the world achieve their goal.
			</p>
			<p>
				Get in touch with us using our <a href="/contact.php">contact page</a>!
			</p>
		</div>	
	</div>

	<?php include_once('./includes/js.php'); ?>

</body>

</html>
