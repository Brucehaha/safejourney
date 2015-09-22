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
					line1 = Morris.Line({
						element: 'resultpanel1',
						data: [	
							<?php 	
								while($row1 = mysqli_fetch_array($result1)) {    
									$year = $row1[0];
									$count1 = $row1[1];
									$myurl1[] = "{y: '".$year."', a: ".$count1."},";
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
				});
			});
		</script>
  </head>
  
  <body>
	<p class="p1" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">For past five years, there are much more accidents happened. There will show the accident rate trend by year.</p>	
	<div id="resultpanel1"></div>

	<?php
		//Release the SQL clause
			mysqli_free_result($result1);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>