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
					Morris.Line({
						element: 'resultpanel1',
						data: [	
							<?php 
								//define the array for the result 
								$count13 = array();
								$count14 = array();
								$count15 = array();
								$count16 = array();
								$count17 = array();
								
								//get the result from the database and store into the variable as array
								while($row13 = mysqli_fetch_array($result13)) {
									$count13[] = $row13[1];
								}
								while($row14 = mysqli_fetch_array($result14)) {
									$count14[] = $row14[1];
								}
								while($row15 = mysqli_fetch_array($result15)) {
									$count15[] = $row15[1];
								}
								while($row16 = mysqli_fetch_array($result16)) {
									$count16[] = $row16[1];
								}
								while($row17 = mysqli_fetch_array($result17)) {	
									$count17[] = $row17[1];
								}							   
							?>
							
							{y: 'Jan', a: <?php echo $count13[0];?>, b: <?php echo $count14[0];?>, c: <?php echo $count15[0];?>, d: <?php echo $count16[0];?>, e: <?php echo $count17[0];?>},
							{y: 'Feb', a: <?php echo $count13[1];?>, b: <?php echo $count14[1];?>, c: <?php echo $count15[1];?>, d: <?php echo $count16[1];?>, e: <?php echo $count17[1];?>},
							{y: 'Mar', a: <?php echo $count13[2];?>, b: <?php echo $count14[2];?>, c: <?php echo $count15[2];?>, d: <?php echo $count16[2];?>, e: <?php echo $count17[2];?>},
							{y: 'Apr', a: <?php echo $count13[3];?>, b: <?php echo $count14[3];?>, c: <?php echo $count15[3];?>, d: <?php echo $count16[3];?>, e: <?php echo $count17[3];?>},
							{y: 'May', a: <?php echo $count13[4];?>, b: <?php echo $count14[4];?>, c: <?php echo $count15[4];?>, d: <?php echo $count16[4];?>, e: <?php echo $count17[4];?>},
							{y: 'Jun', a: <?php echo $count13[5];?>, b: <?php echo $count14[5];?>, c: <?php echo $count15[5];?>, d: <?php echo $count16[5];?>, e: <?php echo $count17[5];?>},
							{y: 'Jul', a: <?php echo $count13[6];?>, b: <?php echo $count14[6];?>, c: <?php echo $count15[6];?>, d: <?php echo $count16[6];?>, e: <?php echo $count17[6];?>},
							{y: 'Aug', a: <?php echo $count13[7];?>, b: <?php echo $count14[7];?>, c: <?php echo $count15[7];?>, d: <?php echo $count16[7];?>, e: <?php echo $count17[7];?>},
							{y: 'Sep', a: <?php echo $count13[8];?>, b: <?php echo $count14[8];?>, c: <?php echo $count15[8];?>, d: <?php echo $count16[8];?>, e: <?php echo $count17[8];?>},
							{y: 'Oct', a: <?php echo $count13[9];?>, b: <?php echo $count14[9];?>, c: <?php echo $count15[9];?>, d: <?php echo $count16[9];?>, e: <?php echo $count17[9];?>},
							{y: 'Nov', a: <?php echo $count13[10];?>, b: <?php echo $count14[10];?>, c: <?php echo $count15[10];?>, d: <?php echo $count16[10];?>, e: <?php echo $count17[10];?>},
							{y: 'Dec', a: <?php echo $count13[11];?>, b: <?php echo $count14[11];?>, c: <?php echo $count15[11];?>, d: <?php echo $count16[11];?>, e: <?php echo $count17[11];?>}
								
						],
						xkey: 'y',
						ykeys: ['a', 'b', 'c', 'd', 'e'],
						labels: ['2010', '2011', '2012', '2013', '2014'],
						parseTime:false,
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
			mysqli_free_result($result13);
			mysqli_free_result($result14);
			mysqli_free_result($result15);
			mysqli_free_result($result16);
			mysqli_free_result($result17);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>