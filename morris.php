<?php
	
	//Connect to database server and table
    include("connection.php");
	@mysqli_select_db($conn, "cl57-henningdb")
	or die ("Database not available");
	
	//Count the number of accidents happened for last five years
	$querySql1 = "SELECT EXTRACT(YEAR FROM AccidentDate) AS 'AccidentYear', COUNT(*) AS 'Count' FROM Accident GROUP BY AccidentYear";
	
	//Count the number of accidents happened based on the seasons for past five years
	//"SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident GROUP BY AccidentMonth";
	//Season 1 between Jan and Mar
	//"SELECT MONTHNAME(STR_TO_DATE(EXTRACT(MONTH FROM AccidentDate), '%m')) AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident where EXTRACT(MONTH FROM AccidentDate) between 1 and 3 GROUP BY AccidentMonth order by FIELD(AccidentMonth, 'JANUARY', 'FEBRUARY', 'MARCH')";
	$querySql7 = "SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident where EXTRACT(MONTH FROM AccidentDate) between 1 and 3 GROUP BY AccidentMonth order by FIELD(AccidentMonth, 'JAN', 'FEB', 'MAR')";
	//Season 2 between Apr and Jun
	$querySql8 = "SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident where EXTRACT(MONTH FROM AccidentDate) between 4 and 6 GROUP BY AccidentMonth order by FIELD(AccidentMonth, 'APR', 'MAY', 'JUN')";
	//Season 3 between Jul and Sep
	$querySql9 = "SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident where EXTRACT(MONTH FROM AccidentDate) between 7 and 9 GROUP BY AccidentMonth order by FIELD(AccidentMonth, 'JUL', 'AUG', 'SEP')";
	//Season 4 between Oct and Dec
	$querySql10 = "SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident where EXTRACT(MONTH FROM AccidentDate) between 10 and 12 GROUP BY AccidentMonth order by FIELD(AccidentMonth, 'OCT', 'NOV', 'DEC')";
	
	//Count the number of accidents occurred based on light condition
	$querySql2 = "SELECT LightCondition, COUNT(*) AS 'Count' FROM Accident GROUP BY LightCondition";
	
	//Count the number of accidents occurred based on the time period of day
	$querySql3 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '05:00:00' AND '12:00:00'";
	$querySql4 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '12:00:01' AND '17:00:00'";
	$querySql5 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime BETWEEN '17:00:01' AND '22:00:00'";
	$querySql6 = "SELECT AccidentTime, COUNT(*) AS 'Count' FROM Accident WHERE AccidentTime >= '22:00:01' OR AccidentTime < '05:00:00'";
	
	//Count the number of accidents occurred based on the weekdays
	$querySql11 = "SELECT DayOfWeek, COUNT(*) AS 'Count' FROM Accident GROUP BY DayOfWeek order by FIELD(DayOfWeek, 'SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY')";
	
	//Count the number of accidents occurred based on speed zone
	$querySql12 = "SELECT SpeedZone, COUNT(*) AS 'Count' FROM Accident GROUP BY SpeedZone";
	
	//$querySql13 = "SELECT Date_Format(AccidentDate, '%b') AS 'AccidentMonth', COUNT(*) AS 'Count' FROM Accident GROUP BY AccidentMonth";
	//$querySql14
	//$querySql15
	//$querySql16
	//$querySql17
	
	
	
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
	$result7 = mysqli_query($conn, $querySql7)
	or die ("No information return...");
	$result8 = mysqli_query($conn, $querySql8)
	or die ("No information return...");
	$result9 = mysqli_query($conn, $querySql9)
	or die ("No information return...");
	$result10 = mysqli_query($conn, $querySql10)
	or die ("No information return...");
	$result11 = mysqli_query($conn, $querySql11)
	or die ("No information return...");
	$result12 = mysqli_query($conn, $querySql12)
	or die ("No information return...");
	
	$row1 = mysqli_fetch_array($result3);
	$row2 = mysqli_fetch_array($result4);
	$row3 = mysqli_fetch_array($result5);
	$row4 = mysqli_fetch_array($result6);
	
?>