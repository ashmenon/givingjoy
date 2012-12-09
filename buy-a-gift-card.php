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


		<form class="form-horizontal" action="transaction-success.php" method="post">
		<div class="row-fluid">
		<div class="span8">
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
		  <div class="control-group">
		  	<label class="control-label" for="message">Add a personal message</label>
		  	<div class="controls">
		  		<textarea id="message" name="message"></textarea>
		  		<span class="help-block"><small>This message will appear on the Gift Card that you purchase, so make it special!</small></span>
		  	</div>
		  </div>

		  
		  <div class="control-group">
		  	<label class="control-label">Interests</label>
			<div class="controls">
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
					</label><br />				
				
					<?php
				if($key % $rows == ($rows - 1) || $key == count($fields)-1){ ?>
					</div>
				<?php };

		  	}

		  	?>	
		  	<div class="clearfix"></div>	    
		  	</div>
		  </div>
		  <div class="form-actions">
			  <button type="submit" class="btn btn-success btn-large"><i class="icon-gift"></i>&nbsp;Purchase Gift Card</button>			  
			</div>
		  </div>
		  <div class="span4">
		  	<img src="/images/charity-water2.jpg" />
			<div class="height-block"></div>
			<h4>How am I making a difference?</h4>
			<p>
				Many deserving causes around the world do not get the necessary funding they need because people don't know where the money they're giving is going. This means that there are honest, well-deserving causes that are unable to do what they set out to do.
			</p>

			<p>
				GivingJoy.org aims to change that. When you purchase a Gift Card from GivingJoy.org, 80% of the transaction amount goes to the causes of your recipient's choice. The remaining 20% goes to GivingJoy.org's efforts to make sure these causes are accountable. These including auditing the causes' financials, and publishing those numbers on the site. This helps your recipient make more informed choices about where the money should go, and this means that the right causes get the money.
			</p>
			
		  </div>
		  </div>
		  
		</form>




	</div>


	<?php include_once('/includes/js.php'); ?>
</body>

</html>