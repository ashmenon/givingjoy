<?php include_once('/includes/init.php'); ?>
<?php
setcookie('selectproject',false,0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Confirm Details</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Confirm Gift Card Usage</h3>			
		</div>

		<div class="row-fluid">
			
				
			<p class="lead">Please confirm details of the Gift Card.</p>

			<h4>Selected Projects</h4>

			<?php
			$projects = array(1,2);

			foreach($projects as $project_id){
				$project = get_project_data((int)$project_id);
				echo render_project_entry($project);
			};

			?>

			<div class="height-block"></div>

			<div class="row-fluid">
				<a class="btn btn-large btn-success" href="use-card-confirm.php">Proceed</a>
			</div>			

		</div>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>