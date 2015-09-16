
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
	@mysqli_select_db($conn, "cl57-henningdb")
	or die ("Database not available");

	// Select all the rows of specific year in the LOCATION table
	$query = "SELECT count(*) AS 'Count', Latitude, Longitude, NodeType FROM Location WHERE AccidentNo in (SELECT AccidentNo from Accident where EXTRACT(YEAR FROM AccidentDate) = 2014) group by Latitude, Longitude, NodeType";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die('Can not find the location: ' . mysqli_error());
	}

	header("Content-type: text/xml");

	// Start XML file, echo parent node
	echo '<markers>';

	// Iterate through the rows, printing XML nodes for each
	while ($row = mysqli_fetch_assoc($result)){
		// ADD TO XML DOCUMENT NODE
		echo '<marker ';
		echo 'Count="' . parseToXML($row['Count']) . '" ';
		echo 'Latitude="' . parseToXML($row['Latitude']) . '" ';
		echo 'Longitude="' . parseToXML($row['Longitude']) . '" ';
		//echo 'AccidentNo="' . parseToXML($row['AccidentNo']) . '" ';
		//echo 'NodeID="' . parseToXML($row['NodeID']) . '" ';
		echo 'NodeType="' . parseToXML($row['NodeType']) . '" ';
		echo '/>';
	}

	// End XML file
	echo '</markers>';

?>