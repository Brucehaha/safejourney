<?php

//Get the requested word to find the similar one in the database
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	//$keyword = $_POST['keyword'];
	$conn=mysqli_connect("localhost", "cl57-henningdb", "VK.nb3kcM","cl57-henningdb") 
	or die("No information return");
	$sql = "SELECT DISTINCT StreetName FROM Street WHERE StreetName LIKE '%$my_data%' and lower(SuburbName) like '%$keyword%' LIMIT 0, 10";
	//SELECT StreetName, SuburbName FROM Street WHERE StreetName LIKE '%c%' and lower(SuburbName) like '%clayton' LIMIT 0, 10;
	$result = mysqli_query($conn,$sql) 
	or die("No data return");
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['StreetName']."\n";
		}
	}
	
?> 
