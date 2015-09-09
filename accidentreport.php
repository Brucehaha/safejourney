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
		
		<style>
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}
			
			.morris-hover{
				position:absolute;
				z-index:1000;}
				
			.morris-hover.morris-default-style{
				border-radius:10px;
				padding:6px;
				color:#666;
				background:rgba(255,255,255,0.8);
				border:solid 2px rgba(230,230,230,0.8);
				font-family:sans-serif;
				font-size:12px;
				text-align:center;}
			
			.morris-hover.morris-default-style .morris-hover-row-label{
				font-weight:bold;
				margin:0.25em 0;}
			
			.morris-hover.morris-default-style .morris-hover-point{
				white-space:nowrap;
				margin:0.1em 0;}

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
				<a class="navbar-brand navbar-left" href="http://217.199.187.198/masterminds.com/">SafeJourney</a>  
 			</div>
 			
 			<div class="collapse navbar-collapse">
 			    <ul class="nav navbar-nav">	
 			        <li><a href="http://217.199.187.198/masterminds.com/">Home</a></li>
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
    
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" style="text-align:center;">
				<p style="font-size:160%;color:grey;margin:30px 10px;">In recent years, an increasing number of accidents happened on the road for daily frequent commuters. The safety is always the most important issue all the world wide.</p>  
				<hr>
				<p style="font-size:150%;color:grey;margin:30px 10px;background-color:#EBF5FF;">For past five years, there are much more accidents happened. There will show the accident rate trend by year.</p> 
			</div>
		</div>

		<div class="row">
			<!-- Display the line chart here -->
			<div class="col-md-6">
				<div id="lineChart" style="height: 350px;"></div>
			</div>
			<div class="col-md-6">
				<div id="table1" style="height: 350px;">
					<h4 style="color:#ACC9E6;font-weight:bold;">Number of Accidents occurred for past five years</h4>
					<?php 
						include("morris.php"); 
						$i=1;
						echo "<table class='table table-bordered table-hover' id='showTable'>";
						echo "<tr><th>#</th><th>Year</th><th>No. of Accidents</th></tr>";
						while($Record = mysqli_fetch_array($result1)){
							echo "<tr><td>".$i."</td><td>".$Record[0]."</td><td>".$Record[1]."</td></tr>";
							$i++;
						}
						echo "</table>";
					?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12" style="text-align:center;">
				<p style="font-size:150%;color:grey;margin:30px 10px;background-color:#EBF5FF;">Most of accidents occurred because of the kinds of light conditions.</p>  
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div id="table2" style="height: 350px;">
					<h4 style="color:#ACC9E6;font-weight:bold;">Number of Accidents by Light Condition</h4>
					<?php 
						include("morris.php"); 
						$i=1;
						echo "<table class='table table-bordered table-hover' id='showTable'>";
						echo "<tr><th>#</th><th>Light Condition</th><th>No. of Accidents</th></tr>";
						while($Record = mysqli_fetch_array($result2)){
							echo "<tr><td>".$i."</td><td>".$Record[0]."</td><td>".$Record[1]."</td></tr>";
							$i++;
						}
						echo "</table>";
					?>
				</div>
			</div>
			<!-- Display the bar chart here -->
			<div class="col-md-6">
				<div id="barChart" style="height: 350px;"></div>
			</div>			
		</div>
		
		<div class="row">
			<div class="col-sm-12" style="text-align:center;">
				<p style="font-size:150%;color:grey;margin:30px 10px;background-color:#EBF5FF;">When did the accidents mostly happen? In the morning?  afternoon?  Or evening?</p>  
			</div>
		</div>

		<div class="row">
			<!-- Display the bar chart here -->
			<div class="col-md-6">
				<div id="barChart1" style="height: 350px;"></div>
			</div>	
			
			<div class="col-md-6">
				<div id="table3" style="height: 350px;">
					<h4 style="color:#ACC9E6;font-weight:bold;">Number of Accidents by daytime</h4>
					<?php 
						include("morris.php"); 
						$timeOfDay = array("Morning", "Afternoon", "Evening", "Night");
						echo "<table class='table table-bordered table-hover' id='showTable'>";
						echo "<tr><th>#</th><th>Daytime</th><th>No. of Accidents</th></tr>";
						echo "<tr><td>1</td><td>".$timeOfDay[0]."</td><td>".$row1[1]."</td></tr>";
						echo "<tr><td>2</td><td>".$timeOfDay[1]."</td><td>".$row2[1]."</td></tr>";
						echo "<tr><td>3</td><td>".$timeOfDay[2]."</td><td>".$row3[1]."</td></tr>";
						echo "<tr><td>4</td><td>".$timeOfDay[3]."</td><td>".$row4[1]."</td></tr>";
						echo "</table>";
					?>
				</div>
			</div>					
		</div>
	</div>
	<hr>
	<!-- FOOTER -->
    <footer>
		<p class="pull-right" style="margin-top:50px;"><a href="#">Back to top</a></p>
    </footer>
	
	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>   
	<!--Draw bar chart and line chart for accident-->
	<script>
		//Morris charts snippet - js
		$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
			$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){
				Morris.Line({
					element: 'lineChart',
					data: [	
						<?php 	
							include("morris.php");
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
					labels: ['Accidents']					
				});
				
				Morris.Bar({
					element: 'barChart',
					data: [	
						<?php 
							include("morris.php"); 
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
					labels: ['Accidents']					
				});	

				Morris.Bar({
					element: 'barChart1',
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
					labels: ['Accidents']					
				});		
			});
		});
		
	</script> 
  </body>
</html>