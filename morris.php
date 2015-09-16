<?php
	//session_start();
	
	//Connect to database server and table
    include("connection.php");
	@mysqli_select_db($conn, "cl57-henningdb")
	or die ("Database not available");
	
	//Count the number of accidents happened for last five years
	$querySql1 = "SELECT EXTRACT(YEAR FROM AccidentDate) AS 'AccidentYear', COUNT(*) AS 'Count' FROM Accident GROUP BY AccidentYear";
	//Count the number of accidents occurred based on light condition
	$querySql2 = "SELECT LightCondition, COUNT(*) AS 'Count' FROM Accident GROUP BY LightCondition";
	//Count the number of accidents occurred based on the time period of day
	$querySql3 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '05:00:00' AND '12:00:00'";
	$querySql4 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '12:00:01' AND '17:00:00'";
	$querySql5 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '17:00:01' AND '22:00:00'";
	$querySql6 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime >= '22:00:01' OR AccidentTime < '05:00:00'";
				
	$result1 = mysqli_query($conn, $querySql1)
	or die ("No information return...");
	$result2 = mysqli_query($conn, $querySql2)
	or die ("No information return...");
	$result3 = mysqli_query($conn, $querySql3)
	or die ("No information return...");
	$result4 = mysqli_query($conn, $querySql4)
	or die ("No information return...");
	$result5 = mysqli_query($conn, $querySql5)
	or die ("No information return...");
	$result6 = mysqli_query($conn, $querySql6)
	or die ("No information return...");
	
	$row1 = mysqli_fetch_array($result3);
	$row2 = mysqli_fetch_array($result4);
	$row3 = mysqli_fetch_array($result5);
	$row4 = mysqli_fetch_array($result6);
	
?>