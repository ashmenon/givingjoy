<?php include_once('./includes/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Projects</title>	
	<?php include_once('./includes/css.php'); ?>
</head>
<body>
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Projects</h3>
		</div>


		<?php
		$projects = get_projects();
		foreach($projects as $key => $project){
			echo render_project_entry($project);
		}
		?>




	</div>


	<?php include_once('./includes/js.php'); ?>
</body>

</html>