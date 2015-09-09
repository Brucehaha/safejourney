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
				<a class="navbar-brand navbar-left" href="http://217.199.187.198/masterminds.com/">SafeJourney</a>  
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
							<li><a href="#">By Accident</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">On Map</a></li>						 
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
					<button type="submit" class="btn btn-success" id="login">Log In</button>
				</form>
								
			</div>
		</div>
	</div>
	
	<!-- Main form for feedback by users -->
	<!-- Users should enter the name, email, some comments -->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 emailForm">
				<h1>We need your feedback</h1>
				<?php echo $result; ?>
				<p class="lead">Please keep in touch</p>
					
				<form method="post">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name" />
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Your Email" />
					</div>

					<div class="form-group">
						<label for="comment">Comment:</label>
						<textarea class="form-control" name="comment"></textarea>
					</div>

					<input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />
				</form>
			</div>
		</div>
	</div>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>