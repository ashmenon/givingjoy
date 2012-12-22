<?php include_once('/includes/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<?php include_once('/includes/css.php'); ?>
</head>
<body class="project-detail-page">
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="height-block"></div>
		<div class="row-fluid">
			<h3>Sample Project Title</h3>
			<p class="muted">Sample Organization Title</p>
		</div>
		
		
		<div class="height-block"></div>

		<div class="row-fluid">
			<div class="span4">
				<div class="project-image-holder">
					<?php
					$project['images'] = '';
					if(strlen($project['images'])){
						$images = explode('||',$project['images']);
						$main_image = $images[0];
						if(substr($main_image,0,1) !== '/') $main_image = '/' . $main_image;
					} else {
						$main_image = '/images/defaults/project-image.png';
					};
					?>
					<img class="project-image" src="<?php echo $main_image; ?>" />
				</div>
				<?php if(count($images) > 1){
					echo '<div class="row-fluid">';
					foreach($images as $key => $image){
						if($key == 0) continue;
						if(substr($image,0,1) !== '/') $image = '/' . $image;
						echo '<img class="project-thumbnail-image" src="' . $image . '" />';
					};
					echo '</div>';
				}; ?>
				
				<div class="height-block"></div>
				<div class="organization-description">
					<?php echo $organization['description']; ?>
				</div>
				<div class="height-block"></div>
				<a class="btn btn-block btn-large btn-primary" href="/organization.php?id=<?php echo $project['organization']; ?>">View Organization Details</a>
				<div class="height-block"></div>
				<div class="social-buttons">
					<a href="#" class="btn btn-primary"><i class="icon-facebook"></i> &nbsp;Facebook Page</a>
					<a href="#" class="btn btn-primary pull-right"><i class="icon-twitter"></i> &nbsp;Twitter Page</a>
				</div>
			</div>
			
			<div class="span8">
				<div class="project-description">
					<?php echo $project['description']; ?>
				</div>
				<div class="height-block"></div>
				<h4>How can I help?</h4>
				<ul>
					<li><strong>RM 20</strong> will plant a new tree.</li>
					<li><strong>RM 50</strong> will plant 3 new trees.</li>
					<li><strong>RM 100</strong> will reforest a 2 square kilometer area.</li>
				</ul>
				<div class="height-block"></div>

				
				<div class="project-budget well well-small">
					<?php
					$budget_data = get_project_budget_details((int)$project_id);
					?>
					<div class="progress">
						<div class="bar" style="width: <?php echo $budget_data['total_donated'] / $budget_data['total_budget'] * 100; ?>%;"></div>
					</div>
					<p class="lead">
						<strong>RM <?php echo $budget_data['total_donated']; ?></strong> of <strong>RM <?php echo $budget_data['total_budget']; ?></strong> gifted!
					</p>
				</div>
				
				<div class="height-block"></div>
				<?php
				$expenses = get_project_expenses((int)$project_id);
				?>
				
				<h4>Actual Expenses</h4>
				<small><em>updated 5<sup>th</sup> August, 2012</em></small>

				<div class="height-block"></div>

				<table class="table table-bordered">
					<tr>
						<th>Item</th>
						<th>Quantity</th>					
						<th>Unit Price</th>
						<th>Amount</th>
					</tr>
					<?php foreach($expenses as $key => $expense){
						echo '<tr>';
							echo '<td>' . $expense['expenditure'] . '</td>';
							echo '<td>1</td>';
							echo '<td>' . $expense['actual'] . '</td>';
							echo '<td>' . $expense['actual'] . '</td>';
						echo '</tr>';
					}
					?>
				</table>



				<h4>Budget</h4>

				<div class="height-block"></div>

				<table class="table table-bordered">
					<tr>
						<th>Item</th>
						<th>Quantity</th>					
						<th>Unit Price</th>
						<th>Amount</th>
					</tr>
					<?php foreach($expenses as $key => $expense){
						echo '<tr>';
							echo '<td>' . $expense['expenditure'] . '</td>';
							echo '<td>1</td>';
							echo '<td>' . $expense['budget'] . '</td>';
							echo '<td>' . $expense['budget'] . '</td>';
						echo '</tr>';
					}
					?>
				</table>
				
			</div>
		
		</div>

		
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>