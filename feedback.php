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
				<h2 style="color:grey;">We need your feedback for improvement</h2>
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
		<br /><br />
		<!-- FOOTER -->
		<footer>
			<div class="footer">
				<p class="pull-left">&copy; 2015 MasterMinds, Inc.<br /><br />
				Disclaimer: <span style="color:grey;">The information contained in this website is to make daily commuter familiar with road accidents and infringements. The data is collected from Victoria government <a href="https://www.data.vic.gov.au/">open data</a>. We are not responsible for any harm caused by using the provided in formation.</span></p>
			</div>
		</footer>
	</div>
	
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>