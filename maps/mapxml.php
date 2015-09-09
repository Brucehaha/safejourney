<?php
	function parseToXML($htmlStr)
	{
		$xmlStr=str_replace('<','&lt;',$htmlStr);
		$xmlStr=str_replace('>','&gt;',$xmlStr);
		$xmlStr=str_replace('"','&quot;',$xmlStr);
		$xmlStr=str_replace("'",'&#39;',$xmlStr);
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		return $xmlStr;
	}

	//Connect to database server and table
	include("connection.php");
	@mysqli_select_db($conn, "cl56-henningdb")
	or die ("Database not available");

	// Select all the rows in the markers table
	$query = "SELECT * FROM Location limit 100";
	$result = mysqli_query($conn, $query);
	if (!$result) {
	  die('Invalid query: ' . mysqli_error());
	}

	header("Content-type: text/xml");

	// Start XML file, echo parent node
	echo '<markers>';

	// Iterate through the rows, printing XML nodes for each
	while ($row = mysqli_fetch_assoc($result)){
	  // ADD TO XML DOCUMENT NODE
	  echo '<marker ';
	  echo 'Latitude="' . parseToXML($row['Latitude']) . '" ';
	  echo 'Longitude="' . $row['Longitude'] . '" ';
	  echo 'AccidentNo="' . $row['AccidentNo'] . '" ';
	  echo 'NodeID="' . $row['NodeID'] . '" ';
	  echo 'NodeType="' . $row['NodeType'] . '" ';
	  echo '/>';
	}

	// End XML file
	echo '</markers>';

?>