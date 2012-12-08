<?php include_once('/includes/init.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giving Joy</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container" id="opening">
		<div id="faces">
			<div class="row">
				<div class="height-block"></div>
				<div class="face-row span12 padding-bottom align-center">
					<?php for($i = 0; $i <=8; $i++){  ?>
						<img src="/images/child<?php echo rand(1,4); ?>.jpg" style="width: 80px; height: 80px; margin-bottom: 10px;" />
					<?php }; ?>					
				</div>
				

				<div class="jumbotron">
        			<h1>We're changing culture, society & the world!</h1>
        			<p class="lead grey">What if every birthday gift would make a real difference in the world.</p>
        			<p class="lead grey">Impacting society at every gift-giving occasion!</p>
        			<p class="lead">Join our movement of giving 2.0</p>
        			<button type="button" class="btn btn-success btn-large">How?</button>
        		</div>

				<div class="face-row span12 padding-bottom align-center">
					<?php for($i = 0; $i <=40; $i++){  ?>
						<img src="/images/child<?php echo rand(1,4); ?>.jpg" style="width: 60px; height: 60px; margin-bottom: 10px;" />
					<?php }; ?>					
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="main">
		<div id="buttons">
			<div class="row-fluid">
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to give someone a Gift Card</a>
				</div>
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/use-a-gift-card.php">I want to use a Gift Card</a>
				</div>
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to add a Project</a>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>