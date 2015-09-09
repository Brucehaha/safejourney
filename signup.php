<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Safe Journey To Work</title>
		<!-- logo -->
		<link rel="shortcut icon" href="images/logo.png" />
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Javascript -->
		<script type="text/javascript" src="myjs.js"></script>
   
		<!--JQuery-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		
		<style>
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}
	   </style>
  </head>

<body>
	<!-- This is the code for the top of window to place the navigation button -->
	<div class="navbar navbar-default navbar-fix-top " id="topContainer">    
		<div class="container">
			<div class="navbar-header"> 
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand navbar-left" href="http://217.199.187.198/masterminds.com/">SafeJourney</a>  
			</div>
				
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">	 
					<li><a href="http://217.199.187.198/masterminds.com/" />Home</a></li>
					<li class="dropdown">
						<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						Search
						<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="drop1">
							<li><a href="search.php">By Fine</a></li>
							<li><a href="#">By Accident</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">On Map</a></li>						 
						</ul>
					</li>			         
					<li id="about"><a href="feedback.php">Feedback</a></li>
					<li id="about"><a href="aboutus.php">About Us</a></li>	
				</ul>
					 
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control" />
					</div>	
					<div class="form-group">
						<input type="passwork" placeholder="Password" class="form-control" />
					</div>
					<button type="submit" class="btn btn-success" id="login">Log In</button>
				</form>
								
			</div>
		</div>
	</div>

<?php 
	session_start(); 
	$email=$_SESSION["email"];
?>

<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 registerForm">
				<h1>Sign Up</h1>
				<label style="color:red;font-size:18px;">*</label><label>&nbsp;&nbsp;Required field</label>
				<br /><br />	
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="form-group">
						<label for="email">Email:</label><label style="color:red;">*</label>
						<input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Your Email" />
					</div>
					
					<div class="form-group">
						<label for="name">Profile Name:</label><label style="color:red;">*</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name" />
					</div>

					<div class="form-group">
						<label for="password">Password:</label><label style="color:red;">*</label>
						<input type="password" class="form-control" name="password" placeholder="Password" />
					</div>
					
					<div class="form-group">
						<label for="confirmPWD">Confirm Password:</label><label style="color:red;">*</label>
						<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password" />
					</div>
					
					<input type="submit" name="register" class="btn btn-success btn-lg" value="Sign Up" />
					<input type="reset" name="reset" class="btn btn-success btn-lg" value="Cancel" />
				</form>
			</div>
		</div>
	</div>
<br />


<?php
	/* Function to validate if the name is empty or not
	 * and check if the name entered in the right format */
	function validateProfile($data, $fieldName) {
		if(empty($data)) {
			echo "<p>\"$fieldName\" is a required field.</p>";
			return false;
		}
		else {
			$pattern = "/^[a-zA-z\s]+$/";
			if(!preg_match($pattern, $data)) {
				echo "<P>You have entered the wrong name!</p>";
				return false;
			}
		}
		return true;
	}

	/* Function to validate if the password is empty or not
	 * and check if the password entered in the right format */
	function validatePassword($data, $fieldName) {
		if(empty($data)) {
			echo "<p>\"$fieldName\" is a required field.</p>";
			return false;
		} else {
			$pattern = "/^[a-zA-Z0-9]+$/";
			if(!preg_match($pattern, $data)) {
				echo "<p>You have entered the wrong password!</p>";
				return false;
			}
		}
		return true;
	}
	
	//Form data validation
	if (isset($_POST['register']) ){
		
		$strEmail = "";
		$strProfile = "";
		$strPassqord = "";
		$strConPassword = "";

		$strEmail = $_POST["email"];
		$strProfile = $_POST["name"];
		$strPassword = $_POST["password"];
		$strConPassword = $_POST["confirmPassword"];
		
		//$_SESSION["email"] = $strEmail;
		
		if (validateProfile($strProfile, "Profile Name") && validatePassword($strPassword, "Password")) {
			if($strPassword != $strConPassword){
				echo "The password can not match.";
			}
			else{
				//Connect to database server and table
				include("connection.php");
				@mysqli_select_db($conn, "cl56-henningdb")
				or die ("Database not available");

				/*
				$strSql = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) values ('$strEmail', '$strPassword', '$strProfile', CURDATE(), 0)";
				$Result = mysqli_query($conn, $strSql)
					or die("Problem reading table");

				if($Result){
					echo "Register successfully!";
					header("location:friendadd.php");
				}
				else{
					echo "Register failed! Please try again!";
					header("location:signup.php");
				}
				mysqli_free_result($Result);
				*/
				mysqli_close($conn);
			}
			
		}
	}
?>

	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>

