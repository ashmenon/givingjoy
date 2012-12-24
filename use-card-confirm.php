<?php include_once('./includes/init.php'); ?>
<?php
setcookie('selectproject',false,0);
$projects = $_POST['chosen_projects'];
$token = $_POST['gift_card_token'];
if(!$_POST || !count($_POST)) header('location: /index.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Confirm Details</title>	
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Confirm Gift Card Usage</h3>			
		</div>

		<div class="row-fluid">
			<div class="span8">				
				<p class="lead">Please confirm details of the Gift Card.</p>
				<h4>Selected Projects</h4>
				<div class="row-fluid">
					<?php
					$projects = explode(',',$projects);
					foreach($projects as $project_id){
						$project = get_project_data((int)$project_id);
						echo '<div class="span3">';
						echo render_project_mini_entry($project);
						echo '</div>';
					};

					?>
				</div>

				<div class="height-block"></div>

				<div class="row-fluid" id="confirm-button">
					<form action="/process-card.php" method="post">
						<input type="hidden" name="projects" value="<?php echo join(',',$projects); ?>" />
						<input type="hidden" name="gift_card_token" value="<?php echo $token; ?>" />
						<button type="submit" class="btn btn-success">Confirm</button>			
						<a class="btn" href="/use-a-gift-card.php?t=<?php echo $token; ?>">
							Go Back
						</a>
					</form>
				</div>

				<div class="row-fluid align-center" id="thankyou" style="display:none;">
					<h3>Thank you!</h3>
					<p class="lead">
						Your contribution will make a difference today!
					<p>	
					<p class="muted">You will be redirected to the main page shortly.</p>
				</div>
			</div>
			<div class="span4">
				<h4>Gifts that make a difference</h4>
				<p>
					<img src="/images/charity-water2.jpg" />
				</p>
				<p>
					In 2010 UNICEF launched the "Water Our World" campaign, aimed at helping provide clean water to remote areas in third world countries. In 2011, as a result of contributions from awesome people like you all over the world, UNICEF has successfully built a water system in Uganda that supplies clean, safe, drinkable water to 65% of Uganda's remote areas. This means that thanks to your efforts, 3 out of 5 children in Uganda now have access to clean water.
				</p>


			</div>

		</div>
	</div>
	<?php include_once('./includes/js.php'); ?>
</body>

</html>
