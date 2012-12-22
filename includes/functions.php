<?php

function generate_hash($length = 8){
	$list = 'A B C D E F G H J K L M N P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9';
	$list = explode(' ',$list);
	$str = '';
	while(strlen($str) <= $length){
		$str .= $list[array_rand($list)];
	}

	return $str;
}

function get_query($syntax){
	$result = mysql_query($syntax) or die('Database error.');	
	//$result = mysql_query($syntax) or die('Database error: ' . $syntax);
	if(mysql_num_rows($result) == 0){
		$return = array();
	} else if(mysql_num_rows($result) == 1){
		$return = array(mysql_fetch_assoc($result));
	} else if(mysql_num_rows($result) > 1){
		$return = array();
		while($row = mysql_fetch_assoc($result)){
			$return[] = $row;
		}
	}
	return $return;
}

function do_query($syntax){
	$result = mysql_query($syntax) or die('Database error.');
	//$result = mysql_query($syntax) or die('Database error: ' . $syntax);
	return $result;
}


function get_organization_projects($organization_id){
	if(!$organization_id || !is_int($organization_id)) return array();
	$projects = get_query("SELECT * FROM gj_projects WHERE organization = $organization_id");
	return $projects;
};

function get_project_data($project_id){
	if(!$project_id || !is_int($project_id)) return array();
	$project = get_query("SELECT * FROM gj_projects WHERE id = $project_id");
	$project = $project[0];
	return $project;
};

function get_organization_data($organization_id){
	if(!$organization_id || !is_int($organization_id)) return array();
	$organization = get_query("SELECT * FROM gj_organizations WHERE id = $organization_id");
	$organization = $organization[0];
	return $organization;
};


function get_project_budget_details($project_id){
	if(!$project_id || !is_int($project_id)) return array();
	$budget_data = get_query("SELECT SUM(b.budget) AS total_budget, SUM(b.actual) AS total_actual, (SELECT SUM(d.amount) FROM gj_donations AS d WHERE d.project = $project_id AND status='paid') AS total_donated FROM  gj_budgets_expenditures AS b WHERE b.project = $project_id");
	$budget_data = $budget_data[0];
	foreach($budget_data as $key => $data){
		if($data == null || !$data){
			$budget_data[$key] = 0;
		};
	};
	return $budget_data;
};

function get_project_expenses($project_id){
	if(!$project_id || !is_int($project_id)) return array();
	$expenses_data = get_query("SELECT * FROM gj_budgets_expenditures WHERE project = $project_id");
	return $expenses_data;

};

function render_project_mini_entry($project){
	if(!$project || !is_array($project)) return false;
	ob_start();
	?>
	<div class="project-mini-entry well well-small" id="project_mini_entry_<?php echo $project['id']; ?>">
		<div class="row-fluid">
			<?php
			if(strlen($project['images'])){
				$images = explode('||',$project['images']);
				$main_image = $images[0];
				if(substr($main_image,0,1) !== '/') $main_image = '/' . $main_image;
			} else {
				$main_image = '/images/defaults/project-image.png';
			};
			?>
			<p class="align-center">
				<a href="/project.php?id=<?php echo $project['id']; ?>" class="project-image-link" title="<?php echo $project['title']; ?>">
					<img src="<?php echo $main_image; ?>" alt="<?php echo $project['title']; ?>"  class="project-image" />
				</a>
			</p>
			<h4 class="project-title align-center">
				<a href="/project.php?id=<?php echo $project['id']; ?>" class="project-title-link" title="<?php echo $project['title']; ?>">
					<?php echo $project['title']; ?>
				</a>
			</h4>
			
			<div class="organization-link-holder align-center">
				<em>by</em>  
				<a href="/organization.php?id=<?php echo $project['organization']; ?>" class="project-organization-link">
					<?php
					$organization_title = get_query("SELECT title FROM gj_organizations WHERE id = {$project['organization']}");
					$organization_title = $organization_title[0]['title'];
					echo $organization_title; 
					?>
				</a>
			</div>

		</div>
	</div>
	<?php
	$project_html = ob_get_clean();
	return $project_html;
}

function render_project_entry($project){
	if(!$project || !is_array($project)) return false;
	ob_start();
	?>
	<div class="project-entry row-fluid" id="project_entry_<?php echo $project['id']; ?>">
		<div class="span1 project-image-holder">
			<?php
			if(strlen($project['images'])){
				$images = explode('||',$project['images']);
				$main_image = $images[0];
				if(substr($main_image,0,1) !== '/') $main_image = '/' . $main_image;
			} else {
				$main_image = '/images/defaults/project-image.png';
			};
			?>
			<a href="/project.php?id=<?php echo $project['id']; ?>" class="project-image-link" title="<?php echo $project['title']; ?>">
				<img src="<?php echo $main_image; ?>" alt="<?php echo $project['title']; ?>"  class="project-image" />
			</a>
		</div>
		<div class="span4 project-details-holder">
			<h4 class="project-title">
				<a href="/project.php?id=<?php echo $project['id']; ?>" class="project-title-link" title="<?php echo $project['title']; ?>">
					<?php echo $project['title']; ?>
				</a>
			</h4>
			
			<div class="organization-link-holder">
				<em>by</em>  
				<a href="/organization.php?id=<?php echo $project['organization']; ?>" class="project-organization-link">
					<?php
					$organization_title = get_query("SELECT title FROM gj_organizations WHERE id = {$project['organization']}");
					$organization_title = $organization_title[0]['title'];
					echo $organization_title; 
					?>
				</a>
			</div>
		</div>
		<div class="span7 project-statistics-holder">
			<?php
			$budget_data = get_project_budget_details((int)$project['id']);
			?>
			<div class="row-fluid">
				<div class="span3 align-center">
					<strong>Budget</strong><br />
					RM <?php echo $budget_data['total_budget']; ?>
				</div>
				<div class="span3 align-center">
					<strong>Actual Expenses</strong><br />
					RM <?php echo $budget_data['total_actual']; ?>
				</div>
				<div class="span6">
					<strong>RM <?php echo $budget_data['total_donated']; ?></strong> gifted so far.
					<div class="progress">
						<div class="bar" style="width: <?php echo $budget_data['total_donated'] / $budget_data['total_budget'] * 100; ?>%;"></div>
					</div>
				</div>
			</div>
			<div class="row-fluid align-right">
				<?php if(@$_COOKIE['selectproject'] == true){ ?>
					<button class="btn btn-primary btn-success btn-select-project" data-project-id="<?php echo $project['id']; ?>">Select Project</button>
				<?php } ?>
				<a class="btn btn-primary" href="/project.php?id=<?php echo $project['id']; ?>">View Project Details</a>
			</div>
		</div>
	</div>
	<?php
	$project_html = ob_get_clean();
	return $project_html;
};

function get_gift_card_details($token){
	if(!$token) return array();
	$card = get_query("SELECT * FROM gj_giftcards WHERE token = '$token'");
	$card = $card[0];

	return $card;
}


function get_projects($interests){
	if(!is_array($interests)) return array();	
	if(count($interests)){
		$project_ids = array();
		foreach($interests as $key => $interest){
			$project_id = get_query("SELECT id FROM `gj_projects` WHERE fields REGEXP '.*,?$interest,?.*'");
			foreach($project_id as $key => $id){
				$project_id[$key] = $id['id'];
			}
			$project_ids = array_merge($project_ids,$project_id);
		}
		$project_ids = array_unique($project_ids);
		if(count($project_ids)){
			$projects = get_query("SELECT * FROM gj_projects WHERE id IN (" . join(',',$project_ids) . ")");
		} else {
			$projects = get_query("SELECT * FROM gj_projects ORDER BY RAND() LIMIT 0,10");
		}
	} else {
		$projects = get_query("SELECT * FROM gj_projects ORDER BY RAND() LIMIT 0,10");
	}

	return $projects;
}

?>