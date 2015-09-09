<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Safe Journey To Work</title>
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
    
	<!-- This is the code for the main body of content with the background -->
    <div class="container contentContainer" id="midContainerAbout">
        <div class="row">
			<!-- offset-3 make the 3 column to the right, move col6 to middle -->
			<div class="col-md-6 col-md-offset-3" id="topRowAbout">
				<span class="heading-campaign" >ABOUT US</span><br /><br /><br /><br /><br /><br />  
				<span><a class="linkDetails" href="#details">Find out More</a></span>			
			</div>
		</div>
    </div>
    
    <div class="container contentContainer2" id="details">
		<div class="row aboutcontainer">
			<p style="font-size:150%;color:grey;">Our team is Master Minds. There are four people in the team. We are happy to help you viewing the data about your journey to work. We believe it's easy to use and well-understand how it is going. We hope that it is helpful for your daily life.</p>
			<p class="row byline" >More Concern More Safe</p>
		</div>
	</div>
	<hr />
	
	<!-- Put the video about our system here -->
	<div class="container contentContainer3" id="video">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TMIMIgfX5lg" frameborder="0" allowfullscreen></iframe>
		</div>

	</div>
	<hr />
	
	<!-- Put the introduction of our team members here-->
	<div class="container contetnContainer4" id="profile">
		<div class="media">
			<a href="#" class="pull-left">
				<img src="images/Henning.jpg" class="img-circle" alt="Xiaolong Li" width="160" height="195">
			</a>
			<div class="media-body" >
				<h4 class="media-heading">Xiaolong Li</h4>
				<p style="text-align:justify">Introduction:Our team is Master Minds. There are four people in the team. We are happy to help you viewing the data about your journey to work. We believe it's easy to use and well-understand how it is going. We hope that it is helpful for your daily life.</p>
			</div>
		</div>

		<div class="media">
			<a href="#" class="pull-right">
				<img src="images/Annie.jpg" class="img-circle" alt="Luyao Meng" width="160" height="195">
			</a>
			<div class="media-body" >
				<h4 class="media-heading" style="text-align:right">Luyao Meng</h4>
				<p style="text-align:justify">Introduction:Our team is Master Minds. There are four people in the team. We are happy to help you viewing the data about your journey to work. We believe it's easy to use and well-understand how it is going. We hope that it is helpful for your daily life.</p>
			</div>
		</div>
	
		<div class="media">
			<a href="#" class="pull-left">
				<img src="images/navdeep.jpg" class="img-circle" alt="Navdeep Kaur" width="160" height="195">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Navdeep Kaur</h4>
				<p style="text-align:justify">Introduction:Our team is Master Minds. There are four people in the team. We are happy to help you viewing the data about your journey to work. We believe it's easy to use and well-understand how it is going. We hope that it is helpful for your daily life.</p>
			</div>
		</div>

		<div class="media">
			<a href="#" class="pull-right">
				<img src="images/Terry.jpg" class="img-circle" alt="Siyuan Zhang" width="160" height="195">
			</a>
			<div class="media-body">
				<h4 class="media-heading" style="text-align:right">Siyuan Zhang</h4>
				<p style="text-align:justify">Introduction:Our team is Master Minds. There are four people in the team. We are happy to help you viewing the data about your journey to work. We believe it's easy to use and well-understand how it is going. We hope that it is helpful for your daily life.</p>
			</div>
		</div>
	</div>
	<hr />
	
	<!-- JavaScript -->
	<!-- fit the background -->
	<!-- make the background image fit for the size of screen -->
	<script src="myjs.js" type="text/javascript"></script>
    
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>