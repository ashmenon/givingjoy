<?php include_once('/includes/init.php'); ?>
<?php
$post = $_POST;

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
			<div class="span8">
				<div class="row-fluid">
					<p>Your Gift Card purchase was successful. How would you like <strong><?php echo $post['recipientname']; ?></strong> to receive his/her Gift Card?</p>
					<div class="height-block"></div>
					<div class="row-fluid">	
						<div class="span6 align-center">
							<a id="sendbyemail" class="btn btn-large btn-primary" href="#"><i class="icon-envelope"></i>&nbsp;Email</a>
							<br /><br />
							<span class="muted"><strong><?php echo $post['recipientname']; ?></strong> will receive his/her Gift Card in his/her email.</span>
						</div>
						<div class="span6 align-center">
							<a id="sendbyprint" class="btn btn-large btn-primary" href="#"><i class="icon-print"></i>&nbsp;Print</a>
							<br /><br />
							<span class="muted">Print the Gift Card and give it to <strong><?php echo $post['recipientname']; ?></strong> as a present.</span>
						</div>
					</div>
					<div class="height-block"></div>
					<div id="email_message" class="align-center" style="display:none;">
						<p>An email has been sent to <strong><?php echo $post['recipientname']; ?></strong>. You will now be redirected to the frontpage shortly.</p>
					</div>
				</div>
			</div>
			<div class="span4">
				<img src="/images/happy-children.jpg" />
				<div class="height-block"></div>
				<h4>Thank You!</h4>
				<p>
					Besides being an awesome person and buying a gift for <?php echo $post['recipientname']; ?>, you are also helping to support various causes and efforts to make the world a better place. Go ahead, pat yourself on the back, you've earned it.
				</p>				
			</div>
		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>