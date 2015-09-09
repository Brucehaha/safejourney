	<?php
	// PDO connect *********
	function connect() {
		return new PDO('mysql:host=localhost;dbname=cl56-henningdb', 'cl56-henningdb', 'KW/Cedw9x', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	$pdo = connect();
	$keyword = '%'.$_POST['keyword'].'%';
	//$suburbkey = '%'.$_POST["suburbkey"].'%';
	$suburbkey = $_POST["suburb"];
	$sql = "SELECT DISTINCT StreetName FROM Street WHERE StreetName LIKE (:keyword) and SuburbName like '%$suburbkey%' LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	//$query->bindParam(':suburbkey', $suburbkey, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$suburb_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['StreetName']);
		// add new option
		echo '<li onclick="set_item2(\''.str_replace("'", "\'", $rs['StreetName']).'\')">'.$suburb_name.'</li>';
	}
	//echo $suburbkey;
	//echo $keyword;
	
	?> 	       