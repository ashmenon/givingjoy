<?php include_once('/includes/init.php'); ?>
<?php
$token = @$_GET['t'];
$card = get_gift_card_details($token);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Success</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Congratulations!</h3>
			<p class="lead">You have successfully purchased a Gift Card!</p>
		</div>

		<div class="row-fluid">
			<p>Your Gift Card purchase was successful. How would you like <strong>John Smith</strong> to receive his/her Gift Card?</p>
			<div class="height-block"></div>
			<div class="row-fluid">	
				<div class="span6 align-center">
					<a id="sendbyemail" class="btn btn-large btn-primary" href="#"><i class="icon-envelope"></i>&nbsp;Email</a>
					<br /><br />
					<span class="muted"><strong>John Smith</strong> will receive his/her Gift Card in his/her email.</span>
				</div>
				<div class="span6 align-center">
					<a id="sendbyprint" class="btn btn-large btn-primary" href="#"><i class="icon-print"></i>&nbsp;Print</a>
					<br /><br />
					<span class="muted">Print the Gift Card and give it to <strong>John Smith</strong> as a present.</span>
				</div>
			</div>
			<div class="height-block"></div>
			<div id="email_message" class="align-center" style="display:none;">
				<p>An email has been sent to <strong>John Smith</strong>. You will now be redirected to the frontpage shortly.</p>
			</div>
		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>