<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Head style -->
	<?php include("includes/head.html"); ?>  
		
	<!-- <script type="text/javascript">jQuery.noConflict();</script> -->
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="http://maps.google.com/maps/api/js?libraries=places,visualization&sensor=false"></script>
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	
	
	
	
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
		//load map
		$( "#map" ).load( "fines/test.html #map");
	</script>
	<script>
	function initMap() {

		  var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 8,
			center: {lat: -37.8602828, lng: 145.079616}
		  });
		  var infoWindow = new google.maps.InfoWindow;
		  
		  document.getElementById('submit').addEventListener('click', function() {
			geocodeAddress(infoWindow, map);

				   
		  });

		}
	
	</script>
		<style>
		
		    #map {
				height: 400px;
				width:100%;
				
				
			  }
			<!-- Responsive tables firefox -->
			@-moz-document url-prefix() {
				fieldset { display: table-cell; }
			}
	   </style>
  </head>
  
  <body onload="initMap()">
	<!--Navigation bar and style-->
    <?php include("includes/header.html"); ?>
	 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Search by Suburb or Street 	:
                    </a>
                </li>
               
                <li>
			
					<form id="topRowSearch" name="search" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
					    <div class="inputStyle">
							<input type="text" class="form-control" name="suburb" value="<?php echo $_POST["suburb"];?>" placeholder="Suburb" id="suburb_id" >
				        </div>
						<div class="inputStyle">
							<input type="text" class="form-control" name="street" value="<?php echo $_POST["street"];?>" placeholder="Street" id="street_id" />
					    </div>
						<div class="inputStyle">
							<input type="submit"class="btn" name="searchBtn" id='submit' value="Search" />
					    </div>
					</form>
		        </li>
		</ul>	
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content 22-->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div id="map">
							</div>
						
						
					        <div>
							<!-- include the php file for handling the form validation and data -->
							<? include("searchphp.php"); ?>
							</div>
						
						
						
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    
   
    
	<!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>  	
	<!-- Auto Complete for input text box -->
	<!-- This lib conflicts with jQuery-ui lib --
		 Only separate those two lib in head tag and body tag --
		 They both can work -->
	<script type="text/javascript" src="js/jquery.js"></script>	
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script> 
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>