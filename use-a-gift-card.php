<?php include_once('/includes/init.php'); ?>
<?php
if(isset($_GET['t'])){
	$card = get_gift_card_details($_GET['t']);
	setcookie('selectproject',true);
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Use Your Gift Card</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Use a Gift Card</h3>
			<?php if(isset($card)){ ?>
				<p class="lead">Give the gift of giving!</p>
			<?php }; ?>
		</div>

		<div class="row-fluid">
			
				<?php if(!isset($_GET['t'])){ ?>
				<div class="well">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
						<div class="control-group">
							<label for="cardtoken" class="control-label">Please insert your Gift Card Token</label>
							<div class="controls">
								<input type="text" name="t" placeholder="Gift Card Token" />
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-large btn-success">Submit</button>
						</div>
					</form>
				</div>
				<?php } else { ?>
					<p class="lead"><strong><?php echo $card['sendername']; ?></strong> has purchased a Gift Card for you worth <strong>RM <?php echo $card['amount']; ?></strong>.</p>

					<p class="muted">Here are some projects that <strong><?php echo $card['sendername']; ?></strong> thinks may interest you:</p>

					<?php
					$projects = get_projects(explode(',',$card['interests']));
					foreach($projects as $key => $project){
						echo render_project_entry($project);
					}
					?>

					<div class="height-block"></div>

					<div class="row-fluid">
						<a class="btn btn-large btn-success" href="use-card-confirm.php">Proceed</a>
					</div>

				<?php }; ?>
			

		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>