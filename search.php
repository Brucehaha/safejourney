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
		<!-- Javascript -->
		<script type="text/javascript" src="myjs.js"></script>
		
		<!--JQuery-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		
		<!-- <script type="text/javascript">jQuery.noConflict();</script> -->
		<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
		
		<script>
			$(document).ready(function(){
				$("#suburb_id").autocomplete("suburbautocomplete.php", {
				selectFirst: true
				});
			});
			
			$(document).ready(function(){				
				$("#street_id").autocomplete("streetautocomplete.php", {
				selectFirst: true
				});
			});
		</script>
		
		<style>
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}
	   </style>
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
				<a class="navbar-brand navbar-left" href="http://www.safejourneytowork.tk/">SafeJourney</a>  
 			</div>
 			
 			<div class="collapse navbar-collapse">
 			    <ul class="nav navbar-nav">	
 			        <li><a href="http://www.safejourneytowork.tk/">Home</a></li>
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
 			        
 			        <button type="submit" class="btn" id="login">Log In</button>    
				</form>  		        
 			</div>
 	    </div>
    </div>
    
    <div class="container" id="midContainerSearch">
		
		<div class="row">
			<h3 align="center">Search the infringement fine for intersection in Melbourne by entering suburb and street.</h3>
           <!-- offset-3 make the 3 column to the right,move col6 to middle -->    
			<form id="topRowSearch" name="search" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
				<div class="col-md-3 col-md-offset-2" id="suburbdiv">
					<input type="text" class="form-control" name="suburb" value="<?php echo $_POST["suburb"];?>" placeholder="Suburb" id="suburb_id" >
				</div>
				
				<div class="col-md-3" id="streetdiv">
					<input type="text" class="form-control" name="street" value="<?php echo $_POST["street"];?>" placeholder="Street" id="street_id" />
				</div>
				
				<div class="col-md-1" id="btnPosition">
					<input type="submit"class="btn" name="searchBtn" value="Search" />
				</div>
			</form>
        </div>
		<!-- include the php file for handling the form validation and data -->
		<? include("searchphp.php"); ?>
	</div>	
   
	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>  	
	<!-- Auto Complete for input text box -->
	<!-- This lib conflicts with jQuery-ui lib --
		 Only separate those two lib in head tag and body tag --
		 They both can work -->
	<script type="text/javascript" src="js/jquery.js"></script>	
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script> 
  </body>
</html>