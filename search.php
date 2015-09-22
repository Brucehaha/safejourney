<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Head style -->
	<?php include("includes/head.html"); ?>  
		
	<!-- <script type="text/javascript">jQuery.noConflict();</script> -->
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
		
	<script>
		$(document).ready(function(){
			$("#suburb_id").autocomplete("suburbautocomplete.php", {
			selectFirst: true
			});
		});
			
		$(document).ready(function(){				
			$("#street_id").autocomplete("streetautocomplete.php", {
			selectFirst: true
			});
		});
	</script>
		
		<style>
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}
	   </style>
  </head>
  
  <body>
	<!--Navigation bar and style-->
	<?php include("includes/header.html"); ?>
    
    <div class="container" id="midContainerSearch">
		<div class="row">
			<h3 align="center">Search the infringement fine for intersection in Melbourne by entering suburb and street.</h3>
           <!-- offset-3 make the 3 column to the right,move col6 to middle -->    
			<form id="topRowSearch" name="search" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
				<div class="col-md-3 col-md-offset-2" id="suburbdiv">
					<input type="text" class="form-control" name="suburb" value="<?php echo $_POST["suburb"];?>" placeholder="Suburb" id="suburb_id" >
				</div>
				
				<div class="col-md-3" id="streetdiv">
					<input type="text" class="form-control" name="street" value="<?php echo $_POST["street"];?>" placeholder="Street" id="street_id" />
				</div>
				
				<div class="col-md-1" id="btnPosition">
					<input type="submit"class="btn" name="searchBtn" value="Search" />
				</div>
			</form>
        </div>
		<!-- include the php file for handling the form validation and data -->
		<? include("searchphp.php"); ?>
	</div>	
   
	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>  	
	<!-- Auto Complete for input text box -->
	<!-- This lib conflicts with jQuery-ui lib --
		 Only separate those two lib in head tag and body tag --
		 They both can work -->
	<script type="text/javascript" src="js/jquery.js"></script>	
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script> 
  </body>
</html>