<?
	include("feedbackphp.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your feedback</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- logo -->
	<link rel="shortcut icon" href="images/logo.png" />	
	<!--css-->
	<link rel="stylesheet" type="text/css" href="mystyle.css"> 
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!--JQuery and the its script must be put in the header or it will not work-->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body>
	<!-- This is the code for the top of window to place the navigation button -->
	<div class="navbar navbar-default navbar-fix-top " id="topContainer">    
		<div class="container">
			<div class="navbar-header"> 
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand navbar-left" href="www.safejourneytowork.com">SafeJourney</a>  
			</div>
				
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">	 
					<li><a href="http://217.199.187.198/masterminds.com/" />Home</a></li>
					<li class="dropdown">
						<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						Search
						<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="drop1">
							<li><a href="search.php">By Fine</a></li>
							<li><a href="accidentreport.php">By Accident</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="maptest.html">On Map</a></li>						 
						</ul>
					</li>			         
					<li id="about"><a href="feedback.php">Feedback</a></li>
					<li id="about"><a href="aboutus.php">About Us</a></li>	
				</ul>
					 
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control" />
					</div>	
					<div class="form-group">
						<input type="passwork" placeholder="Password" class="form-control" />
					</div>
					<button type="submit" class="btn" id="login">Log In</button>
				</form>
								
			</div>
		</div>
	</div>
	
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
	
	<!-- JavaScript -->
	<!-- fit the background -->
	<!-- make the background image fit for the size of screen -->
	<script src="myjs.js" type="text/javascript"></script>
	
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>