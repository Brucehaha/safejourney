<?php
	$q=$_GET['q'];
	$my_data=mysqli_real_escape_string($q);
	$conn=mysqli_connect("localhost", "cl57-henningdb", "VK.nb3kcM","cl57-henningdb") 
	or die("No information return");
	$sql = "SELECT DISTINCT Suburb FROM Infringement WHERE Suburb LIKE '%$my_data%' LIMIT 0, 10";
	$result = mysqli_query($conn,$sql) 
	or die("No data return");
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['Suburb']."\n";
		}
	}
?>      