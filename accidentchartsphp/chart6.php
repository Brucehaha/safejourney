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
					bar1 = Morris.Bar({
						element: 'resultpanel1',
						data: [	
							<?php  
								while($row6 = mysqli_fetch_array($result2)) {    
									$condition = $row6[0];
									$count6 = $row6[1];
									$myurl6[] = "{y: '".$condition."', a: ".$count6."},";
								}
								$info6 = implode("",$myurl6);
								echo $info6;
							?>
						],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Accidents'],
						xLabelAngle: 20,
						padding: 60,
						resize: true
					});	
				});
			});
		</script>
  </head>
  
  <body>
	<p class="p2" style="font-size:150%;color:grey;margin:10px 20px;background-color:#EBF5FF;text-align:center;">Most of accidents occurred because of the kinds of light conditions.</p>
	<div id="resultpanel1"></div>

	<?php
		//Release the SQL clause
			mysqli_free_result($result2);
		//Close the connection to database
			mysqli_close($conn);
	?>
  </body>
</html>