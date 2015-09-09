<!-- This is php code for form input validation -->
<!-- if user type nothing in the form, there will be displayed with error message or warning -->
<?php 
if ($_POST["submit"]) {
	if (!$_POST['name']) {
		$error="<div class='alert alert-danger'>Please enter your name</div>";
	}
	
	if (!$_POST['email']) {
		$error.="<div class='alert alert-danger'>Please enter your email address</div>";
	}
	
	if (!$_POST['comment']) {
		$error.="<div class='alert alert-danger'>Please enter a comment</div>";
	}
    
    if ($_POST['email']!="" AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$error.="Please enter a valid email address";
	}
	
	if ($error) {	
		$result='<strong>There were error(s) in your form:</strong>'.$error.'';
	} else {
		if (mail("safejourneytowork91@gmail.com", "Comment from website!", "Name: ".$_POST['name']."Email: ".$_POST['email']."Comment: ".$_POST['comment'])) {
			$result='<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch.</div>';
		} else {
			$result='<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
		}
	}	
}
?>