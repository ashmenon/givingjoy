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
				<div class="face-row span12 padding-bottom">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
				</div>
				

				<div class="jumbotron">
        			<h1>We're changing culture, society & the world!</h1>
        			<p class="lead grey">What if every birthday gift would make a real difference in the world.</p>
        			<p class="lead grey">Impacting society at every gift-giving occasion!</p>
        			<p class="lead">Join our movement of giving 2.0</p>	
        			<!-- Button to trigger modal -->
        			<a href="#myModal" role="button" class="btn btn-success btn-large" data-toggle="modal">How?</a>
        			 
        			<!-- Modal -->
        			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        			  	<iframe width="500" height="315" src="http://www.youtube.com/embed/cp3IH8ZNviQ?rel=0" frameborder="0" allowfullscreen></iframe>
        			</div>
        		</div>

				<div class="face-row span12 padding-bottom">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
					<img src="http://placehold.it/100x150">
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="displayHidden">
		<div id="buttons">
			<div class="row-fluid">
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to give someone a Gift Card</a>
				</div>
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to use a Gift Card</a>
				</div>
				<div class="span4 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to add a Project</a>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
	<script>
		jQuery("#myModal").on("show")(function() {
		  return jQuery("#opening").remove();
		});
	</script>
</body>

</html>