	<?php
	//Check the form if submit by post
		if (isset($_POST["searchBtn"])) {
			$strInputSuburb = "";
			$strInputStreet = "";
			
			$strInputSuburb = $_POST["suburb_id"];
			$strInputStreet = $_POST["street"];		
	
			//Check if the input box is empty or not
			//if BOTH "Suburb" AND "Street" is empty, it will display the error message.
			if(!empty($strInputSuburb) || !empty($strInputStreet))
			{
				//Connect to database server and table
                include("connection.php");
				@mysqli_select_db($conn, "cl57-henningdb")
				or die ("Database not available");
				
				$querySql1 = "select * from Infringement 
							  where suburb like '%".mysqli_real_escape_string($conn, $strInputSuburb)."%' and Street1 like '%".mysqli_real_escape_string($conn, $strInputStreet)."%'
             				  order by Suburb, Fines DESC";
				
				$result1 = mysqli_query($conn, $querySql1)
					or die ("No information return...");
					
				$count = mysqli_num_rows($result1);
				$i=1;
				if(!$count==0){
					echo "<div class='row' id='tableTop'>";
					//table-responsive, scroll the table horizontally 
					echo "<div class='col-md-10 col-md-offset-1 table-responsive'>";
					echo "<table class='table table-bordered table-hover' id='showTable'>";
					echo "<tr><th>#</th><th>Location</th><th>Suburb</th><th>No. of Infringements</th><th>Fines($)</th></tr>";
					while($Row = mysqli_fetch_array($result1)){
						echo "<tr><td>".$i."</td><td>Intersection of ".$Row['Street1']." and ".$Row['Street2']."</td><td>".$Row['Suburb']."</td><td>".NUMBER_FORMAT($Row['NoOfInfringement'],0,'.',',')."</td><td>".NUMBER_FORMAT($Row['Fines'], 0, '.', ',')."</td></tr>";
						$i++;
					}
					echo "</table>";
					echo "</div>";
					echo "</div>";
				}
				else {
					echo " ";

				} 
				
				//Release the SQL clause
				mysqli_free_result($result1);
				//Close the connection to database
				mysqli_close($conn);
			}
			else {
				echo " ";

			}
		}	
	?> 	       