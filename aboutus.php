<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Safe Journey To Work</title>
	
	<!-- logo -->
	<link rel="shortcut icon" href="images/logo.png" />
    <!-- css -->
	<link rel="stylesheet" type="text/css" href="mystyle.css"> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	   
	<!-- JQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>   
  </head>
  
  <body>
	<!-- This is the code for the top of window to place the navigation button -->
    <div class="navbar navbar-default navbar-fix-top" id="topContainer">  
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
					<li><a href="http://www.safejourneytowork.com" />Home</a></li>
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
					<li id="feedback"><a href="feedback.php">Feedback</a></li>						         
					<li id="about"><a href="aboutus.php">About Us</a></li>	
				</ul>
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control" />
					</div>
						
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control" />
					</div>
						
					<button type="submit" class="btn btn-success" id="login">Log In</button>
				</form>
			</div>
		</div>
    </div>
	
	<!-- Put the video about our system here -->
	<div font-familty="Arial" class="container contentContainer3" id="aboutvideo">
		<div class="row">
		    <div class="col-md-5">
			<h1>About Us...</h1>
			 <h3><span class="text-muted">Watch the excited video on right and get more details</span></h3>
			
			<p class="lead">
			  This website can help you find more information about the location of the traffic infringement occurred most often and the accumulated accident happened during last year etc..<br />
			</p>
			</div>
			<div id="movie" class="col-md-7">
				<iframe src="https://www.youtube.com/embed/Pqa5aNf46bo" frameborder="0" width="700" height="350" allowfullscreen></iframe>
			</div>
	    </div>
    </div> 
		<hr />
		<!-- Put more information about website here-->
		<div class="container contentContainer4" id="aboutwebsite">
			<div class="row aboutcontainer2">
				<h2>Fines? Accident? What do you concern more about on your way to work?</h2><br /><br /><br /><br />
			</div>	
			<div class="row aboutimage">
				<div class="col-md-4">
					<img src="images/fines.jpg" class="img-responsive">
				</div>
				<div class="col-md-8">
					<h2>Avoid a ticket? <span class="text-muted"> Mark places where you may get a ticket</span></h2>
					<p class="lead">It summarizes and shows the location where people get a ticket frequently and  save your money. </p>
				</div>	
			</div>

			<div class="row aboutimage">
			    <div class="col-md-8 ">
				    <h2 class="featurette-heading">Keep your life safe. <span class="text-muted">Get accidents location </span></h2>
					<p class="lead">In order to keep your journey safe, please view report here and remember. Warning you for everywhere. </p>
				</div>
				<div class="col-md-4">
					<img src="images/accidentimg.jpg" class="img-responsive">
				</div>
			</div>
		</div>

	<!-- FOOTER -->
    <footer>
		<p class="pull-right" style="margin-top:20px;"><a href="#">Back to top</a></p>
    </footer>
	
	<!-- JavaScript -->
	<!-- fit the background -->
	<!-- make the background image fit for the size of screen -->
	<script src="myjs.js" type="text/javascript"></script>
    
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>