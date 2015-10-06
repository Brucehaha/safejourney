<!DOCTYPE html>
<html>
<head>
	<title>Your feedback</title>
	<!-- call the outernal head file -->
	<?php include("includes/head.html"); ?>	
</head>

<body>	
	<?php include("includes/feedbackphp.php");?>
	<!-- This is the code for the top of window to place the navigation button -->
	<?php include("includes/header.html"); ?>
	
	<!-- Main form for feedback by users -->
	<!-- Users should enter the name, email, some comments -->
	<div class="container contentContainer" id="feedbackcontainer">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 emailForm">
				<h1 style="color:grey;">We need your feedback for improvement</h1>
				<p class="lead" style="color:grey;">We will contact you by email.</p>
				<?php echo $result; ?>
					
				<form method="post">
					<div class="form-group">
						<label for="name" style="color:grey;">Name:</label><label style="color:red;">*</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name" />
					</div>

					<div class="form-group">
						<label for="email" style="color:grey;">Email:</label><label style="color:red;">*</label>
						<input type="email" name="email" class="form-control" placeholder="Your Email" />
					</div>

					<div class="form-group">
						<label for="comment" style="color:grey;">Comment:</label><label style="color:red;">*</label>
						<textarea class="form-control" name="comment" placeholder="Comments here, please..."></textarea>
					</div>

					<input type="submit" name="submit" class="btn btn-lg" value="Submit" />
				</form>
			</div>
		</div>
	</div>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>