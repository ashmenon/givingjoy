<?php include_once('/includes/init.php'); ?>
<?php
$organization_id = $_GET['id'];
$organization = get_organization_data((int)$organization_id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title><?php echo $organization['title']; ?> || Giving Joy</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body class="organization-detail-page">
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="height-block"></div>
		<div class="row-fluid">
			<h3><?php echo $organization['title']; ?></h3>			
		</div>

		<div class="row-fluid">
			<div class="organization-description span12">
				<?php echo $organization['description']; ?>
			</div>
		</div>
		
		<div class="height-block"></div>
		<div class="row-fluid">
			<h4>Projects</h4>
		</div>
		
		<?php 
		$projects = get_organization_projects((int)$organization_id);
		foreach($projects as $key => $project){
			
			echo render_project_entry($project);
		};
		?>
		
		
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>