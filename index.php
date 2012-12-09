<?php include_once('/includes/init.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giving Joy</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container padding-top" id="opening">
		<div id="faces">
			<div class="row">
				<div class="height-block"></div>
				<div class="face-row span12 padding-bottom align-center">
					<?php for($i = 0; $i <=8; $i++){  ?>
						<img src="/images/child<?php echo rand(1,6); ?>.jpg" style="width: 80px; height: 80px; margin-bottom: 10px;" />
					<?php }; ?>					
				</div>
				
				<div class="row-fluid">
					<div class="jumbotron">
	        			<h1>We're changing culture, society &amp; the world!</h1>
	        			<p class="lead grey">What if every birthday gift would make a real difference in the world?<br />Impacting society at every gift-giving occasion!<br />Join our movement of giving 2.0</p>	
	        			<!-- Button to trigger modal -->
	        			<a href="#myModal" role="button" class="btn btn-success btn-large" data-toggle="modal">How?</a>
	        			 
	        			<!-- Modal -->
	        			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        			  	<iframe width="500" height="315" src="http://www.youtube.com/embed/cp3IH8ZNviQ?rel=0" frameborder="0" allowfullscreen></iframe>
	        			</div>
	        		</div>
    			</div>
        			
        		

				<div class="face-row span12 padding-bottom align-center">
					<?php for($i = 0; $i <=35; $i++){  ?>
						<img src="/images/child<?php echo rand(1,6); ?>.jpg" style="width: 60px; height: 60px; margin-bottom: 10px;" />
					<?php }; ?>					
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="buttons">
			<div class="row-fluid">
				<div class="span3 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to give someone a Gift Card</a>
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-large" href="/use-a-gift-card.php">I want to use a Gift Card</a>
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-large" href="/buy-a-gift-card.php">I want to add a Project</a>
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-large" href="/user-profile.php">I want to spread awareness about a Project</a>
				</div>
			</div>
		</div>
	</div>
	<div class="height-block"></div>
	<div class="container">
		<h4 class="align-center">Help these organizations make a difference!</h4>
		<div class="row-fluid">
			<div class="span1">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>

		</div>
	</div>

	<?php include_once('/includes/js.php'); ?>
	<script>
		jQuery("#myModal").on("hidden")(function() {
		  return jQuery("#opening").remove();
		});
	</script>
</body>

</html>