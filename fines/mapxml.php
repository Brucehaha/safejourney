
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
	$query = "SELECT*FROM Infringement";
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
		echo 'InfringementID ="' . parseToXML($row['InfringementID']) . '" ';
		echo 'Street1="' . parseToXML($row['Street1']) . '" ';
		echo 'Street2="' . parseToXML($row['Street2']) . '" ';
		echo 'Suburb="' . parseToXML($row['Suburb']) . '" ';
		echo 'NoOfInfringement="' . parseToXML($row['NoOfInfringement']) . '" ';
		echo 'Fines="' . parseToXML($row['Fines']) . '" ';
		echo '/>';
	}

	// End XML file
	echo '</markers>';

?>