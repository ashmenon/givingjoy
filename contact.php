<?php
include_once('./includes/init.php'); 
$topic_options = array(
	'general' => 'General Contact',
	'support' => 'Support / Technical Assistance',
	'partnership' => 'Partnership / Collaboration Opportunities'
);

if(isset($_POST) && count($_POST)){

	$post = $_POST;
	$name = $post['contactname'];
	$email = $post['contactemail'];
	$topic = $post['contacttopic'];
	$subject = $post['contactsubject'];
	$message = $post['contactmessage'];
	$sendcopy = (isset($post['contactsendcopy']));

	$errors = array();

	if(!strlen($name)) $errors[] = 'Please enter your name.';
	if(!strlen($email)) $errors[] = 'Please enter your email address.';
	if(!strlen($topic)) $errors[] = 'Please select a type of enquiry.';
	if(!strlen($subject)) $errors[] = 'Please enter your subject.';
	if(!strlen($message)) $errors[] = 'Please enter your message.';

	$emailmessage = "Dear GivingJoy.org Admin,

	A user has used the contact form on GivingJoy.org to submit an enquiry. The details of the enquiry are as follows:

	Name: $name
	Email: $email
	Type of Enquiry: " . $topic_options[$topic] . "
	Subject: $subject
	Message:
	$message

	You can reply to $name by replying to this email.

	Regards,
	GivingJoy.org";

	$copyemailmessage = "Dear $name,

	You are receiving this email because you have requested for a copy of your submitted enquiry form. The details of your enquiry are as follows:

	Name: $name
	Email: $email
	Type of Enquiry: " . $topic_options[$topic] . "
	Subject: $subject
	Message:
	$message

	We will be in touch with you regarding your enquiry as soon as possible.

	Regards,
	GivingJoy.org";

	

	if(!count($errors)){
		//Things look good. Send the email.

		$mailsend = @mail($adminname . '<' . $adminemail . '>', '[' . $topic_options[$topic] . '] ' . $subject, $emailmessage,'From: ' . $name . '<' . $email . '>' . "\r\n" . 'Reply-To:' . $name . '<' . $email . '>');

		$mailsend = $mailsend ? true : false;
		if($mailsend){
			$name = $email = $subject = $message = $topic = '';
			$errors = array();
		}

		if($sendcopy){

			$copymailsend = @mail($name . '<' . $email . '>', '[Sender\'s Copy][' . $topic_options[$topic] . ']' . $subject, $copyemailmessage,'From:' . $adminname . '<' . $adminemail . '>' . "\r\n" . 'Reply-To:' . $adminname . '<' . $adminemail . '>');

			$copymailsend = $copymailsend ? true : false;			
		}

	}


} else {
	$name = $email = $subject = $message = $topic = '';
	$errors = array();

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us | Giving Joy</title>
	<?php include_once('/includes/css.php'); ?>
</head>
<body>
	<?php include_once('/includes/menu.php'); ?>
	<div class="container">
		<div class="row-fluid">
			<h3>Contact</h3>
		</div>
		<?php
		if(isset($mailsend)){
			if($mailsend){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Success!</strong> Your enquiry has been successfully sent!
				</div>
			<?php } else { ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					An error occurred while trying to send your enquiry. Please try again later, or email <a href="mailto:<?php echo $adminemail; ?>"><?php echo $adminemail; ?></a> for assistance.
				</div>
			<?php };
		}
		?>
		<?php if(count($errors)){ ?>
			<div class="alert alert-error">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Error</strong> The following errors occurred while trying to process your enquiry:
			  <ul>
			  	<?php foreach($errors as $error){ ?>
			  	<li><?php echo $error; ?></li>
			  	<?php }; ?>
			  </ul>
			</div>
		<?php }; ?>
		<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="row-fluid">
		<div class="span8">
		  <div class="control-group">
		    <label class="control-label" for="contactname">Name</label>
		    <div class="controls">
		      <input type="text" id="contactname" name="contactname" placeholder="Please enter your name" value="<?php echo $name; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="contactemail">Email</label>
		    <div class="controls">
		      <input type="email" id="contactemail" name="contactemail" placeholder="Please enter your email address" value="<?php echo $email; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		  	<label class="control-label" for="contacttopic">What is the nature of your enquiry?</label>
		  	<div class="controls">
		  		<select name="contacttopic" id="contacttopic">
		  			<option value="">Please select one</option>
		  			<?php 
	  				foreach($topic_options as $tkey => $tval){ ?>
	  					<option value="<?php echo $tkey; ?>" <?php if($topic == $tkey){ ?> selected="selected" <?php }; ?>><?php echo $tval; ?></option>
	  				<?php } ?>		  			
		  		</select>
		  	</div>
		  </div>

		  <div class="control-group">
		    <label class="control-label" for="contactsubject">Subject</label>
		    <div class="controls">
		      <input type="text" id="contactsubject" name="contactsubject" placeholder="Please enter a subject matter">
		    </div>
		  </div>
		  <div class="control-group">
		  	<label class="control-label" for="contactmessage">Message</label>
		  	<div class="controls">
		  		<textarea id="contactmessage" name="contactmessage" placeholder="Please enter your message"></textarea>
		  	</div>
		  </div>
		  <div class="control-group">
		  	<label class="control-label">Would you like a copy of the email?</label>
		  	<div class="controls">
		  		<label class="checkbox"><input type="checkbox" name="contactsendcopy" id="contactsendcopy" value="1"> Yes, send a copy of this email to my email address</label>
		  	</div>
		  </div>
		  <div class="control-group">
		  	<div class="controls">
		  		<span class="muted help-block"><em>Note: All fields are required.</em></span>
		  	</div>
		  </div>
		  <div class="form-actions">
			  <button type="submit" class="btn btn-success">Submit</button>
			  <button type="reset" class="btn">Clear Form</button>
			</div>
		  </div>
		  <div class="span4">
		  	<h4>Getting in Touch</h4>
			<p>
				If you would like to get in touch with us, simply drop us a line using the contact form to the left. Alternatively, you can contact us via the following methods:
			</p>

			<p>
				
			</p>
			
		  </div>
		  </div>
		  
			</form>
		</div>

	<?php include_once('/includes/js.php'); ?>

</body>

</html>
