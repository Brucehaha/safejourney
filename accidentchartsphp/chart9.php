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
					bar4 = Morris.Bar({
						element: 'resultpanel1',
						data: [	
							<?php 	
								while($row9 = mysqli_fetch_array($result12)) {    
									$speedzone = $row9[0];
									$count9 = $row9[1];
									$myurl9[] = "{y: '".$speedzone."', a: ".$count9."},";
								}       
								$info9 = implode("",$myurl9);
								echo $info9;
							?>
						],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Accidents'],
						xLabelAngle: 40,
						padding: 70,
						resize: true
					});		
				});
			});
		</script>
  </head>
  
  <body>
	<div id="resultpanel1"></div>

	<?php
		//Release the SQL clause
			mysqli_free_result($result12);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>