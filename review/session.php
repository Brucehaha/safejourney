<?php
/*Function to validate if the email is empty or not
 *and check if the email entered in the right format*/
	function validateEmail($data, $fieldName){
		if(empty($data)) {
			echo "\"$fieldName\" is a required field.<br />\n";
			return false;
		} else {
			$pattern = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
			if(!preg_match($pattern, $data)) {
				echo "\"$fieldName\" is not a valid e-mail address.<br />\n";
				return false;
			}
		}
		return true;
	}
	
//The session is a way to store information (in variables) to be used across multiple pages
//Here the session is used to store the email by new users
	if (isset($_POST['submit']) ){
		session_start();
		if(!isset($_SESSION["email"])) {
			$_SESSION["email"] = "";
		}
		
		$strEmail = "";
		$strEmail = $_POST["email"];
		
		if (validateEmail($strEmail, "Email")) {	
			$_SESSION["email"] = $strEmail;
		//Redirect to the signup page
			header("location: signup.php");
		}
		
	}
?>