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
					bar2 = Morris.Bar({
						element: 'resultpanel1',
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
		</script>
  </head>
  
  <body>
	<div id="resultpanel1"></div>

	<?php
		//Release the SQL clause
			mysqli_free_result($result3);
			mysqli_free_result($result4);
			mysqli_free_result($result5);
			mysqli_free_result($result6);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>