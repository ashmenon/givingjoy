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
			<p>
				Nulla etsy sustainable ethnic fingerstache. Raw denim photo booth thundercats eu tempor. Mcsweeney's placeat sustainable nulla, anim keffiyeh art party sed trust fund flexitarian truffaut cupidatat. Fugiat odd future nesciunt, cred sunt typewriter pitchfork post-ironic small batch sustainable mustache wayfarers lo-fi etsy scenester. Voluptate vice chillwave bicycle rights etsy laborum. Pinterest officia synth american apparel, chambray Austin magna. Banh mi carles typewriter DIY irony laborum.
			</p>
			<p>
				Fanny pack aliquip wolf, voluptate williamsburg high life direct trade adipisicing consequat qui fingerstache chambray. Narwhal id you probably haven't heard of them locavore organic. PBR forage aliqua four loko raw denim, occupy dreamcatcher seitan iphone. Nisi marfa Austin blog. Fugiat narwhal cupidatat put a bird on it, beard esse non. Readymade nulla squid, wolf minim butcher beard do cosby sweater. Farm-to-table pinterest mcsweeney's scenester accusamus proident.
			</p>
			<p>
				Readymade post-ironic eu cray. Non locavore sed portland sriracha, 3 wolf moon aliquip cupidatat raw denim freegan. Non labore biodiesel iphone direct trade, pour-over high life art party deserunt in fanny pack swag. Hella organic fanny pack echo park sartorial, biodiesel 8-bit ethical art party messenger bag four loko fugiat aliquip semiotics. Keytar wayfarers mumblecore, narwhal brunch fanny pack consequat craft beer sartorial id mcsweeney's vero truffaut bespoke. Voluptate pickled dolore, retro veniam in keffiyeh aute hoodie velit high life eiusmod banh mi. Aliqua sustainable beard forage ad odd future.
			</p>
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