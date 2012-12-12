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


				<div class="jumbotron">
        			<h1>We're changing culture, society &amp; the world!</h1>
        			<p class="lead grey">
        				What if every gift you bought could make a real difference in the world? &nbsp;&nbsp;
        				<a href="#myModal" role="button" class="btn btn-success" data-toggle="modal">How?</a>
        				<a href="#" id="skipintro" role="button" class="btn">Skip Intro</a>
        			</p>
        			<!-- Button to trigger modal -->



        		</div>

				<div class="face-row span12 padding-bottom align-center">
					<?php for($i = 0; $i <=35; $i++){  ?>
						<img src="/images/child<?php echo rand(1,6); ?>.jpg" style="width: 60px; height: 60px; margin-bottom: 10px;" />
					<?php }; ?>
				</div>
			</div>
		</div>
		<h2 class="align-center">Awesome people like you have donated $12,623,650 so far <br />
				<small>That's enough to buy school books for 971,050 children around the world</small>
		</h2>
	</div>
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <object width="508" height="273" id="myytplayer" data="http://www.youtube.com/embed/OCWj5xgu5Ng?rel=0enablejsapi=1&version=3&playerapiid=ytplayer">
	   <param name="allowscriptaccess" value="always">
	   </object>
	   <script type="text/javascript">

	   </script>

	</div>

	<div class="height-block"></div>
	<div class="container displayHidden hide" id="giftbuttons">
		<h2 class="align-center">
			What would you like to do?<br />
			<small>Select from one of the four options below, or click <a href="#">here</a> if you're not sure what this is about.</small>
		</h2>
		<div id="buttons">
			<div class="row-fluid">
				<div class="span3 align-center">
					<a class="btn btn-primary btn-block" href="/buy-a-gift-card.php">I want to give someone a Gift Card</a>
					<div class="height-block"></div>
					<img src="/images/gift_friends.jpg" />
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-block" href="/use-a-gift-card.php">I want to use a Gift Card that I have received</a>
					<div class="height-block"></div>
					<img src="/images/gift_card.jpg" />
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-block" href="/buy-a-gift-card.php">I am an Organization and I want to add a Project</a>
					<div class="height-block"></div>
					<img src="/images/organization.jpg" />
				</div>
				<div class="span3 align-center">
					<a class="btn btn-primary btn-block" href="/user-profile.php">I want to spread awareness about a Project</a>
					<div class="height-block"></div>
					<img src="/images/megaphone.jpg" />
				</div>
			</div>
		</div>
	</div>

	<div class="height-block"></div>

	<div class="container" id="organizations">
		<h3 class="align-center">Join these organizations in making a difference!</h3>
		<div class="row-fluid">
			<div class="span1 align-center">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/4186_83892693445_5782838445_1755018_2431750_n.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/save-the-children1508Mid.jpeg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/logo-unicef.jpg" />
			</div>
			<div class="span1 align-center">
				<img src="/images/organizations/wwf-2.jpg" />
			</div>
		</div>
	</div>

	<?php include_once('/includes/js.php'); ?>

</body>

</html>
