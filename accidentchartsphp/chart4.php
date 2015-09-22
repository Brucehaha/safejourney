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
					line4 = Morris.Line({
						element: 'resultpanel1',
						data: [	
							<?php 	
								while($row4 = mysqli_fetch_array($result9)) {    
									$month = $row4[0];
									$count4 = $row4[1];
									$myurl4[] = "{y: '".$month."', a: ".$count4."},";
								}       
								$info4 = implode("",$myurl4);
								echo $info4;
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
			mysqli_free_result($result9);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>