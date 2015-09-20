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
				//Initially hide all the divs with the paragraph which indicating the location of graphs
				$("#searchList2").hide();
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
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
				<div>
					<select id="searchList" name="searchList" style="width:150px;">
						<option selected>Choose One...</option>
						<option value="year">Year</option>
						<option value="light">Light Condition</option>
						<option value="daytime">Daytime</option>
					</select>
					<select id="searchList2" name="searchList2">
						<option value="none" selected>Select seasons...</option>
						<option value="season1">Season 1</option>
						<option value="season2">Season 2</option>
						<option value="season3">Season 3</option>
						<option value="season4">Season 4</option>
					</select>
					<input type="submit" id="select" class="btn" name="searchBtn" value="Search" />
<!--
					<input type="radio" name="radiosearch" id="year" value="year" /> Year
					<input type="radio" name="radiosearch" id="light" value="light" />Light Condition
					<input type="radio" name="radiosearch" id="daytime" value="daytime" />Daytime
					<input type="submit" id="select" class="btn" name="searchBtn" value="Search" />
					-->
				</div>
				<hr>	
			</div>
		</div>
		
		<div class="row">
			<!-- Display the graph report here -->
			<!--
			<div class="col-md-6 col-md-offset-3">
				<div id="yearsearchresult">
					<p class="p1" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">For past five years, there are much more accidents happened. There will show the accident rate trend by year.</p>
					<div id="resultpanel1" style="height:350px;"></div>
				</div>
				<div id="lightsearchresult">
					<p class="p2" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">Most of accidents occurred because of the kinds of light conditions.</p> 
					<div id="resultpanel2" style="height:350px;"></div>
				</div>
				<div id="daytimesearchresult">
					<p class="p3" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">When did the accidents mostly happen? In the morning? afternoon? Or evening?</p> 
					<div id="resultpanel3" style="height:350px;"></div>
				</div>
			</div>
			-->
			<!--
			<div class="col-md-6 col-md-offset-3">
				<p class="p1" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">For past five years, there are much more accidents happened. There will show the accident rate trend by year.</p>					
				<div id="resultpanel1" style="height:350px;"></div>
	
				<p class="p2" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">Most of accidents occurred because of the kinds of light conditions.</p> 
				<div id="resultpanel2" style="height:350px;"></div>
				
				<p class="p3" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">When did the accidents mostly happen? In the morning? afternoon? Or evening?</p> 
				<div id="resultpanel3" style="height:350px;"></div>	
			</div>
			-->
			<div class="col-md-6 col-md-offset-3"> 					
				<div id="resultpanel1"></div>
				<div id="resultpanel2"></div>
				<div id="resultpanel3"></div>	
				<div id="resultpanel4"></div>
				<div id="resultpanel5"></div>
				<div id="resultpanel6"></div>
				<div id="resultpanel7"></div>
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
		
		<?php include("morris.php"); ?>
		//Morris charts snippet - js
		$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
			$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){
				line1 = Morris.Line({
					element: 'resultpanel1',
					data: [	
						<?php 	
							while($row = mysqli_fetch_array($result1)) {    
								$year = $row[0];
								$count = $row[1];
								$myurl[] = "{y: '".$year."', a: ".$count."},";
							}       
							$info = implode("",$myurl);
							echo $info;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});
				
				var months = ["Jan", "Feb", "Mar", "Apr"];
				
				line2 = Morris.Line({
					element: 'resultpanel4',
					data: [	
						<?php 	
							while($row2 = mysqli_fetch_array($result7)) {    
								$month = $row2[0];
								$count = $row2[1];
								$myurl2[] = "{y: '".$month."', a: ".$count."},";
							}       
							$info2 = implode("",$myurl2);
							echo $info2;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true,
					xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
					var month = months[x.getMonth()];
					return month;
					},
					dateFormat: function(x) {
						var month = months[new Date(x).getMonth()];
						return month;
					},
				});
				
				line3 = Morris.Line({
					element: 'resultpanel5',
					data: [	
						<?php 	
							while($row3 = mysqli_fetch_array($result8)) {    
								$month = $row3[0];
								$count = $row3[1];
								$myurl3[] = "{y: '".$month."', a: ".$count."},";
							}       
							$info3 = implode("",$myurl3);
							echo $info3;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});
				
				line4 = Morris.Line({
					element: 'resultpanel6',
					data: [	
						<?php 	
							while($row4 = mysqli_fetch_array($result9)) {    
								$month = $row4[0];
								$count = $row4[1];
								$myurl4[] = "{y: '".$month."', a: ".$count."},";
							}       
							$info4 = implode("",$myurl4);
							echo $info4;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});
				
				line5 = Morris.Line({
					element: 'resultpanel7',
					data: [	
						<?php 	
							while($row5 = mysqli_fetch_array($result10)) {    
								$month = $row5[0];
								$count = $row5[1];
								$myurl5[] = "{y: '".$month."', a: ".$count."},";
							}       
							$info5 = implode("",$myurl5);
							echo $info5;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});
				
				bar1 = Morris.Bar({
					element: 'resultpanel2',
					data: [	
						<?php  
							while($row1 = mysqli_fetch_array($result2)) {    
								$condition = $row1[0];
								$count1 = $row1[1];
								$myurl1[] = "{y: '".$condition."', a: ".$count1."},";
							}
							$info1 = implode("",$myurl1);
							echo $info1;
						?>
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});	

				bar2 = Morris.Bar({
					element: 'resultpanel3',
					data: [	
						{y:'Morning', a:<?php include("morris.php");
											echo $row1[1]; ?>},
						{y:'Afternoon', a:<?php include("morris.php");
											echo $row2[1]; ?>},
						{y:'Evening', a:<?php include("morris.php");
											echo $row3[1]; ?>},
						{y:'Night', a:<?php include("morris.php");
											echo $row4[1]; ?>},					
					],
					xkey: 'y',
					ykeys: ['a'],
					labels: ['Accidents'],
					resize: true
				});		
			});
		});
		
		//event handler after "Search" button click
		$("#select").click(function () {
			//Show line chart based on the selection of "Year"
			if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "none"){
				$("#resultpanel1").show();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season1") {
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").show();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season2") {
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").show();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season3") {
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").show();
				$("#resultpanel7").hide();
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "season4") {
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").show();
			}
			//Show bar chart based on the selection of "Light Condition"
			else if ($("#searchList option:selected").val() == "light") {
				$("#resultpanel1").hide();
				$("#resultpanel2").show();
				$("#resultpanel3").hide();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
			} 
			//Show bar chart based on the selection of "Day Time": morning, afternoon, evening, night
			else if ($("#searchList option:selected").val() == "daytime") {
				$("#resultpanel1").hide();
				$("#resultpanel2").hide();
				$("#resultpanel3").show();
				$("#resultpanel4").hide();
				$("#resultpanel5").hide();
				$("#resultpanel6").hide();
				$("#resultpanel7").hide();
			}
			else {
				alert("Please select an option");
			}
		});

	</script> 
	
	<?php
		//Release the SQL clause
			mysqli_free_result($result1);
			mysqli_free_result($result2);
			mysqli_free_result($result3);
			mysqli_free_result($result4);
			mysqli_free_result($result5);
			mysqli_free_result($result6);
			mysqli_free_result($result7);
			mysqli_free_result($result8);
			mysqli_free_result($result9);
			mysqli_free_result($result10);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>