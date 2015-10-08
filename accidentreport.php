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
		});
	</script>
  </head>
  
  <body>
	<!--Navigation bar and style-->
	<?php include("includes/header.html"); ?>

    <div class="container reportcontainer">
		<div class="row">			
			<div class="col-md-12 searchpanel">				
				<p style="font-size:130%;color:grey;margin-top:10px;margin-bottom:10px;">In recent years, the number of accidents happened on the road has increased. The safety is always the most important issue all the world wide. We provide the data report for last five years from 2010 to 2014.</p>
				<hr>
				<!-- Dropdown list for user selection to display the relevant chart -->
				<div class="searchinput">
					<label for="searchList" style="font-size:16px;">Search by </label>
					<select id="searchList" name="searchList" style="width:180px;height:30px;font-size:16px;">
						<option value="" disabled selected style="display:none;">Select your option...</option>
						<option value="year">Year</option>
						<option value="weekday">Weekly</option>
						<option value="daytime">Daily</option>
						<option value="light">Light Condition</option>
						<option value="speed">Speed Zone</option>
					</select>
					<select id="searchList2" name="searchList2" style="width:180px;height:30px;font-size:16px;">
						<option value="" disabled selected style="display:none;">Select your option...</option>
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
					<div class="col-md-8 col-md-offset-2" style="text-align:center;"> 					
						<div id="resultpanel" style="height:500px;"></div>
					</div>   
				</div>
			</div>	<!--end of col-md-9 -->
		</div> <!--end of row -->
	</div> <!--end of container -->
	
	<!-- FOOTER -->
    <footer>
		<div class="footer">
			<p class="pull-left">&copy; 2015 MasterMinds, Inc.<br /><br />
			Disclaimer: <span style="color:grey;">The information contained in this website is to make daily commuter familiar with road accidents and infringements. The data is collected from Victoria government <a href="https://www.data.vic.gov.au/">open data</a>. We are not responsible for any harm caused by using the provided in formation.</span></p>
		</div>
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
			if ($("#searchList option:selected").val() == "year" && $("#searchList2 option:selected").val() == ""){
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