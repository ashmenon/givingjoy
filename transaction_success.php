<?php include_once('/includes/init.php'); ?>
<?php
$card_token = $_GET['t'];
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
			<div class="well">
				<h2>Gift Card</h2>

			</div>

		</div>
		




	</div>


	<?php include_once('/includes/js.php'); ?>
</body>

</html>