<!DOCTYPE html>
<html lang="en">
  <head>
		<!-- Morris chart style -->
		<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
		<!--JQuery-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!--Draw bar chart for accident-->
		<script type="text/javascript">	
			<?php include("morris.php"); ?>
			//Morris charts snippet - js
			$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
				$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){
					line3 = Morris.Line({
						element: 'resultpanel1',
						data: [	
							<?php 	
								while($row3 = mysqli_fetch_array($result8)) {    
									$month = $row3[0];
									$count3 = $row3[1];
									$myurl3[] = "{y: '".$month."', a: ".$count3."},";
								}       
								$info3 = implode("",$myurl3);
								echo $info3;
							?>
						],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Accidents'],
						resize: true,
						parseTime: false
					});
				});
			});
		</script>
  </head>
  
  <body>
	<div id="resultpanel1"></div>

	<?php
		//Release the SQL clause
			mysqli_free_result($result8);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>