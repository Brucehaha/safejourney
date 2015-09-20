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
		<!-- Morris chart style -->
		<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
   
		<!--JQuery-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		
		<style>
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}			
	   </style>
	   
	   <script type="text/javascript">
			$(document).ready(function() {
				//Initially hide div with the paragraph which indicating the location of graphs
				$("#searchList2").hide();
			});
	   </script>
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
                			<li><a href="maps/index.php">On Map</a></li>	 
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
    
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" style="text-align:center;">
				<p style="font-size:160%;color:grey;margin:30px 10px;">In recent years, an increasing number of accidents happened on the road for daily frequent commuters. The safety is always the most important issue all the world wide.</p>  
				<!-- Dropdown list for user selection to display the relevant chart -->
				<div>
					<select id="searchList" name="searchList" style="width:150px;">
						<option selected>Choose One...</option>
						<option value="year">Year</option>
						<option value="light">Light Condition</option>
						<option value="daytime">Daytime</option>
						<option value="weekday">Weekday</option>
						<option value="speed">Speed Zone</option>
					</select>
					<select id="searchList2" name="searchList2">
						<option value="none" selected>Select seasons...</option>
						<option value="season1">Season 1</option>
						<option value="season2">Season 2</option>
						<option value="season3">Season 3</option>
						<option value="season4">Season 4</option>
					</select>
					<input type="submit" id="select" class="btn" name="searchBtn" value="Search" />
				</div>
				<hr>	
			</div>
		</div>
		
		<div class="row">
			<!-- Display the graph report here -->
			<div class="col-md-6 col-md-offset-3"> 					
				<div id="resultpanel"></div>
			</div>   
		</div>
	</div>		

	<!-- FOOTER -->
    <footer>
		<p class="pull-right" style="margin-top:50px;margin-right:70px;"><a href="#">Back to top</a></p>
    </footer>
	
	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>   
	
	<!--Draw bar chart and line chart for accident-->
	<script type="text/javascript">	
		//when "year" option selected, the another dropdownlist selection shows
		$("#searchList").change(function () {
			if ($("#searchList option:selected").text() == "Year"){
				$("#searchList2").show();
			} else {
				$("#searchList2").hide();
			}
		});
		
		//event handler after "Search" button click
		$("#select").click(function () {
			//Show line chart based on the selection of "Year"
			if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "none"){
				$("#resultpanel").load("chart1.php");	
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season1") {
				$("#resultpanel").load("chart2.php");
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season2") {
				$("#resultpanel").load("chart3.php");	
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season3") {
				$("#resultpanel").load("chart4.php");	
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season4") {
				$("#resultpanel").load("chart5.php");
			}
			//Show bar chart based on the selection of "Light Condition"
			else if ($("#searchList option:selected").val() == "light") {
				$("#resultpanel").load("chart6.php");
			} 
			//Show bar chart based on the selection of "Day Time": morning, afternoon, evening, night
			else if ($("#searchList option:selected").val() == "daytime") {
				$("#resultpanel").load("chart7.php");	
			}
			//Show bar chart based on the selection of "Weekday"
			else if ($("#searchList option:selected").val() == "weekday") {
				$("#resultpanel").load("chart8.php");	
			}
			//Show bar chart based on the selection of "Speed Zone"
			else if ($("#searchList option:selected").val() == "speed") {
				$("#resultpanel").load("chart9.php");	
			}
			//Display error message when user click the button without any selection from dropdown menu
			else {
				alert("Please select an option");
			}
		});

	</script> 
  </body>
</html>