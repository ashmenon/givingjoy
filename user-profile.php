<?php include_once('/includes/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>John Smith || Giving Joy</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body class="user-profile-page">
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="height-block"></div>
		<div class="row-fluid">
			<h3>John Smith</h3>			
		</div>		
		
		<div class="height-block"></div>

		<div class="row-fluid">
			<div class="span4">
				<div class="user-image-holder">
					<img class="user-image" src="/images/users/johnsmith.jpg" style="width: 100%;" />
				</div>
								
				<div class="height-block"></div>
				<h4>Share this page</h4>
				<div class="social-buttons">
					<a href="#" class="btn btn-primary"><i class="icon-facebook"></i> &nbsp;Facebook</a>
					<a href="#" class="btn btn-primary pull-right"><i class="icon-twitter"></i> &nbsp;Twitter</a>
				</div>
			</div>
			
			<div class="span8">
				<div class="user-description">
					<h4>About Me</h4>
					<p>I feel very strongly about animal welfare, I'm vegetarian too because I can't bear the thought of eating animals.</p>

					<p>I'm most passionate about rescuing animals and helping them get better - particularly dogs - and I help out with rescues and have adopted 'problem' dogs and worked with them. Animal cruelty has a very profound effect on me and I get deeply upset by it. </p>

					<p>I was really lucky to spend some time with a speaker from the Dr Hadwen Trust when I was at uni - the charity that work on alternatives to animal testing. I learned so much from them and I wish more animal rights groups could be more like them.</p>
				</div>
				<div class="height-block"></div>
				
				<h4>Projects I feel strongly about</h4>
				<?php
				$projects = array(1,2);

				foreach($projects as $project_id){
					$project = get_project_data((int)$project_id);
					echo render_project_entry($project);
				}

				?>
				
			</div>
		
		</div>

		
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>