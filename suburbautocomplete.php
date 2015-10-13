<?php

//Get the requested word to find the similar one in the database
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	
	//Connect to database server and table
    include("connection.php");
	@mysqli_select_db($conn, "cl57-masterdb") 
	or die("No information return");
	
	$sql = "SELECT Distinct SuburbName FROM Suburb WHERE SuburbName LIKE '$my_data%'";
	$result = mysqli_query($conn,$sql) 
	or die("No data return");
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			$lowerSuburb=strtolower($row['SuburbName']);
			echo $lowerSuburb."\n";
		}
	}
	
?>      