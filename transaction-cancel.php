<?php 
include_once('./includes/init.php'); 

if(!isset($_GET['token'])) header('location:index.php');
$token = $_GET['token'];

//Payment is cancelled. Update both tables.
$query = "UPDATE gj_transactions SET paymentstatus='cancelled' WHERE token='$token'";
do_query($query);

$query = "UPDATE gj_giftcards SET status='payment cancelled' WHERE transaction = (SELECT id FROM gj_transactions WHERE token = '$token')";
do_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Payment Cancelled</title>	
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<p align="center">
				<img src="/images/sadsmiley.png" />
			</p>
			<h3>Aww</h3>
			<p>
				It appears that you requested to cancel the transaction. We hope everything was alright. If you have encountered a problem or are dissatisfied with our service, please <a href="/contact.php">let us know</a>.
			</p>
			<p>
				We hope you will consider using our service in the future, and we hope that we can serve you better next time.
			</p>
		</div>		
	</div>
	<?php include_once('./includes/js.php'); ?>
</body>

</html>
