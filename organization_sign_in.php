<?php include_once('/includes/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Giving Joy - Buy a Gift Card</title>	
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Buy a Gift Card for:</h3>
		</div>


		<form class="form-horizontal" action="transaction.php" method="post">
		<div class="row-fluid">
		<div class="span6">
		  <div class="control-group">
		    <label class="control-label" for="recipientname">Recipient's Name</label>
		    <div class="controls">
		      <input type="text" id="recipientname" name="recipientname" placeholder="Recipient's Name">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="recipientemail">Recipient's Email</label>
		    <div class="controls">
		      <input type="email" id="recipientemail" name="recipientemail" placeholder="Recipient's Email">
		    </div>
		  </div>

		  <div class="control-group">
		    <label class="control-label" for="sendername">Your Name</label>
		    <div class="controls">
		      <input type="text" id="sendername" name="sendername" placeholder="Your Name">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="senderemail">Your Email</label>
		    <div class="controls">
		      <input type="email" id="senderemail" name="senderemail" placeholder="Your Email">
		    </div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="amount">Amount</label>
			<div class="controls">
				<select name="amount" id="amount">
					<option value="20">RM 20.00</option>
					<option value="30">RM 30.00</option>
					<option value="50">RM 50.00</option>
					<option value="100">RM 100.00</option>
				</select>
			</div>
		  </div>
		  
		  <div id="interest_fields" class="row-fluid">
			<h3>Interests</h3>
		  	<?php
		  	$fields = get_query("SELECT * FROM gj_fields ORDER BY title");
		  	$columns = 4;
		  	$rows = ceil(count($fields) / $columns);

		  	foreach($fields as $key => $field){
		  		if($key % $rows == 0){ ?>
		  			<div class="span3">
		  		<?php } 
					?>
					
					<label class="checkbox" for="fields_checkbox_<?php echo $field['id']; ?>">
						<input type="checkbox" id="fields_checkbox_<?php echo $field['id']; ?>" value="<?php echo $field['id']; ?>" name="fields_checkbox[]"> <?php echo $field['title']; ?>
					</label>						
				
					<?php
				if($key % $rows == ($rows - 1)){ ?>
					</div>
				<?php };

		  	}

		  	?>		    
		  </div>
		  </div>
		  <div class="span6">
			owuhfoauehngouboua oua
		  </div>
		  </div>
		  <div class="form-actions">
			  <button type="submit" class="btn btn-success">Purchase Gift Card</button>			  
			</div>
		</form>
	</div>
	<?php include_once('/includes/js.php'); ?>
</body>

</html>