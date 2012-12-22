<?php include_once('./includes/init.php'); ?>
<?php
if(isset($_GET['t'])){
	$card = get_gift_card_details($_GET['t']);
	if(@$_COOKIE['selectproject'] != true){
		setcookie('selectproject',true);
		header('Location:' . $_SERVER['PHP_SELF'] . '?t=' . $_GET['t']);
	}
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Use Your Gift Card</title>	
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Use a Gift Card</h3>			
		</div>

		<div class="row-fluid">			
				<?php if(!isset($_GET['t'])){ ?>
				<div class="row-fluid">
					<div class="span8">
						<div class="well">
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
								<div class="control-group">
									<label class="control-label" for="t">Please insert your Gift Card token</label>
									<div class="controls">
										<div class="input-append">
										  <input class="span10" placeholder="Gift Card Token" name="t" type="text">
										  <button class="btn btn-success" type="submit">Submit</button>
										</div>
									</div>
								</div>								
							</form>
						</div>
					</div>
					<div class="span4">
						<h4>How does this work?</h4>
						<p>
							When someone buys a GivingJoy.org Gift Card for you, an email is sent to your email address. This email contains a link with a token in it, that is unique to this Gift Card. You can either click on that link, or you can insert the token value into the field on the left.
						</p>
						<p>
							Once your Gift Card is verified, you will be able to select from a list of Projects to contribute the money to. The person who bought you the card has already paid the amount listed, so there is no need for you to pay anything extra.
						</p>
						<p>
							80% of the amount listed on the Gift Card goes to the Project(s) that you select. <a href="#">Click here</a> to see where the remaining 20% goes.
						</p>
					</div>
				</div>

				<?php } else { ?>
					<p class="lead"><strong><?php echo $card['sendername']; ?></strong> has purchased a Gift Card for you worth <strong>RM <?php echo $card['amount']; ?></strong>.</p>
					<p>
						<?php echo $card['sendername']; ?> has suggested that the following areas may be of interest to you: <strong>Animals</strong>, <strong>Nature</strong>, <strong>Women's Rights</strong>. <br />Based on that, we've found some Projects that we think you might be interested in: 
					</p>
					

					<?php
					$projects = get_projects(explode(',',$card['interests']));
					foreach($projects as $key => $project){
						echo render_project_entry($project);
					}
					?>

					<div class="height-block"></div>

					<div class="row-fluid">
						<form action="/use-card-confirm.php" method="post" id="use_form">
							<input name="chosen_projects" value="" type="hidden" id="chosen_projects" />
							<input name="gift_card_token" value="<?php echo $_GET['t']; ?>" id="gift_card_token" type="hidden" />
							<button type="submit" class="btn btn-success">Proceed</button>
							<button type="reset" class="btn">Clear Choices</button>
						</form>
					</div>

				<?php }; ?>
			

		</div>
	</div>
	<?php include_once('./includes/js.php'); ?>
</body>

</html>
