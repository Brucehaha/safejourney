	<?php
	// PDO connect *********
	function connect() {
		return new PDO('mysql:host=localhost;dbname=cl57-henningdb', 'cl57-henningdb', 'VK.nb3kcM', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	$pdo = connect();
	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT DISTINCT Suburb FROM Infringement WHERE Suburb LIKE (:keyword) LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$suburb_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['Suburb']);
		// add new option
		echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['Suburb']).'\')">'.$suburb_name.'</li>';
	}
	
	?> 	       