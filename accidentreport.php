<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Morris chart style -->
	<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
	
	<style>		    
		<!-- Responsive tables firefox -->
		@-moz-document url-prefix() {
			fieldset { display: table-cell; }
		}	

	</style>

	<!-- Head style -->
	<?php include("includes/head.html"); ?>  
	   
	<script type="text/javascript">
		$(document).ready(function() {
			//Initially hide div with the paragraph which indicating the location of graphs
			$("#searchList2").hide();
			
			$(".alert").addClass("in").fadeOut(4500);
			/* swap open/close side menu icons */
			$('[data-toggle=collapse]').click(function(){
				// toggle icon
				$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
			});
		});
	</script>
  </head>
  
  <body>
	<!--Navigation bar and style-->
	<?php include("includes/header.html"); ?>

    <div class="container">
		<div class="row">
			<div class="col-md-3 left_sidebar">
				<ul class="nav nav-stacked">
					<li class="nav-header"><a href="#" data-toggle="collapse" data-target="#userMenu"> Year <i class="glyphicon glyphicon-chevron-down"></i></a>
						<ul class="nav nav-stacked collapse in" id="userMenu">
							<li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> 2010</a></li>
							<li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> 2011</a></li>
							<li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> 2012</a></li>
							<li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> 2013</a></li>
							<li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> 2014</a></li>
						</ul>
					</li>
	 
					<li class="nav-header">
						<a href="#" data-toggle="collapse" data-target="#menu3"> Comparison <i class="glyphicon glyphicon-chevron-right"></i></a>
						<ul class="nav nav-stacked collapse" id="menu3">
							<li><a href=""><i class="glyphicon glyphicon-eye-open"></i> Monthly</a></li>
							<li><a href=""><i class="glyphicon glyphicon-eye-open"></i> Weekly</a></li>
							<li><a href=""><i class="glyphicon glyphicon-eye-open"></i> Daily</a></li>
						</ul>
					</li>
				</ul>
			</div> <!--end of col-md-3 -->
			<div class="col-md-9 searchpanel">
				<h4>Dashboard <i class="glyphicon glyphicon-search"></i></h4>
				<hr>
				<!-- Dropdown list for user selection to display the relevant chart -->
				<div class="searchinput">
					<label for="searchList">Search by</label>
					<select id="searchList" name="searchList" style="width:150px;">
						<option selected>Choose One...</option>
						<option value="year">Year</option>
						<option value="weekday">Weekly</option>
						<option value="daytime">Daily</option>
						<option value="light">Light Condition</option>
						<option value="speed">Speed Zone</option>
					</select>
					<select id="searchList2" name="searchList2" style="width:150px;">
						<option value="none" selected>Select option...</option>
						<option value="q1">Quarter 1</option>
						<option value="q2">Quarter 2</option>
						<option value="q3">Quarter 3</option>
						<option value="q4">Quarter 4</option>
						<option value="compare">Monthly Comparison</option>
					</select>
						
					<input type="submit" id="select" class="btn" name="searchBtn" value="Search" />
				</div>	
					
				<div style="text-align:center;">
					<!-- Display the graph report here -->
					<div style="text-align:center;"> 					
						<div id="resultpanel"></div>
					</div>   
				</div>
			</div>	<!--end of col-md-9 -->
		</div> <!--end of row -->
	</div> <!--end of container -->
	
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
				$("#resultpanel").load("accidentchartsphp/chart1.php");	
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "q1") {
				$("#resultpanel").load("accidentchartsphp/chart2.php");
			} 
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "q2") {
				$("#resultpanel").load("accidentchartsphp/chart3.php");	
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "q3") {
				$("#resultpanel").load("accidentchartsphp/chart4.php");	
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "q4") {
				$("#resultpanel").load("accidentchartsphp/chart5.php");
			}
			else if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == "compare") {
				$("#resultpanel").load("accidentchartsphp/chart10.php");
			}
			//Show bar chart based on the selection of "Light Condition"
			else if ($("#searchList option:selected").val() == "light") {
				$("#resultpanel").load("accidentchartsphp/chart6.php");
			} 
			//Show bar chart based on the selection of "Day Time": morning, afternoon, evening, night
			else if ($("#searchList option:selected").val() == "daytime") {
				$("#resultpanel").load("accidentchartsphp/chart7.php");	
			}
			//Show bar chart based on the selection of "Weekday"
			else if ($("#searchList option:selected").val() == "weekday") {
				$("#resultpanel").load("accidentchartsphp/chart8.php");	
			}
			//Show bar chart based on the selection of "Speed Zone"
			else if ($("#searchList option:selected").val() == "speed") {
				$("#resultpanel").load("accidentchartsphp/chart9.php");	
			}
			//Display error message when user click the button without any selection from dropdown menu
			else {
				alert("Please select an option");
			}
		});

	</script> 
	<!-- script references -->
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>