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
									$myurl9[] = $row9[1];
								}       
							?>
							// {y: '<?php echo $myurl9[2];?>', a: '30 km/h'},
							// {y: '<?php echo $myurl9[3];?>', a: '40 km/h'},
							// {y: '<?php echo $myurl9[4];?>', a: '50 km/h'},
							// {y: '<?php echo $myurl9[5];?>', a: '60 km/h'},
							// {y: '<?php echo $myurl9[6];?>', a: '70 km/h'},
							// {y: '<?php echo $myurl9[7];?>', a: '75 km/h'},
							// {y: '<?php echo $myurl9[8];?>', a: '80 km/h'},
							// {y: '<?php echo $myurl9[9];?>', a: '90 km/h'},
							// {y: '<?php echo $myurl9[0];?>', a: '100 km/h'},
							// {y: '<?php echo $myurl9[1];?>', a: '110 km/h'},
							// {y: '<?php echo $myurl9[10];?>', a: 'Camping grounds/Off road'},
							// {y: '<?php echo $myurl9[11];?>', a: 'Unknown'},
							// {y: '<?php echo $myurl9[12];?>', a: 'Other speed limit'}
							
							{y: '30 km/h', a: '<?php echo $myurl9[2];?>'},
							{y: '40 km/h', a: '<?php echo $myurl9[3];?>'},
							{y: '50 km/h', a: '<?php echo $myurl9[4];?>'},
							{y: '60 km/h', a: '<?php echo $myurl9[5];?>'},
							{y: '70 km/h', a: '<?php echo $myurl9[6];?>'},
							{y: '75 km/h', a: '<?php echo $myurl9[7];?>'},
							{y: '80 km/h', a: '<?php echo $myurl9[8];?>'},
							{y: '90 km/h', a: '<?php echo $myurl9[9];?>'},
							{y: '100 km/h', a: '<?php echo $myurl9[0];?>'},
							{y: '110 km/h', a: '<?php echo $myurl9[1];?>'},
							{y: 'Other speed limit', a: '<?php echo $myurl9[12];?>'}
						],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Accidents'],
						xLabelAngle: 25,
						padding: 40,
						margin: 90,
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