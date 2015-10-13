<!DOCTYPE html>
<html lang="en">

<head>

    

    <title>Safe Journey To Work</title>
	<?php include("includes/head.html"); ?>  
		
	<!-- <script type="text/javascript">jQuery.noConflict();</script> -->
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
	<script>
	$( "#map" ).load( "fines/test.html");
	</script>	
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!---->
	<style>
	    #map {
				height: 400px;
				width:100%;
				
				
			  }
		
		.inputStyle {
			
			padding:10px;
			
		}	

        #formPosition{
			
			padding-top:90px;
			
			
		}		
	</style>
   

</head>

<body onload="initMap()">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"> 
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand navbar-left" href="http://www.safejourneytowork.tk"><span>SafeJourney</span></a>  
			</div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li id="about"><a href="http://www.safejourneytowork.tk">Home</a></li>
				<li class="dropdown">
						<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"	>
						Search
						<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="drop1">
							<li><a href="search.php"><span>Fines Inquiry</span></a></li>
							<li><a href="../accidentreport.php">
							<span>Fines Report</span></a></li>
							<li role="separator" class="divider"></li>
							<li><a href="accidentreport.php"><span>
							Safe Routing</span></a></li>
							
													 
						</ul>
					</li>			         
				<li id="about"><a href="../feedback.php">Contact</a></li>
				<li id="about"><a href="../aboutus.php">About</a></li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            /input-group
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">blank</a>
                                </li>
                                <li>
                                    <a href="#">Morris.js Charts</a>
                                </li>
                            </ul>
                            /.nav-second-level
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li> -->
                        
                       
                       
						<li>
						    <div id="formPosition">
							<form id="topRowSearch" name="search" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
								<div class="inputStyle">
									<input type="textbox" class="form-control" name="suburb" value="<?php echo $_POST["suburb"];?>" placeholder="Suburb" id="suburb_id" >
								</div>
								<div class="inputStyle">
									<input type="text" class="form-control" name="street" value="<?php echo $_POST["street"];?>" placeholder="Street" id="street_id" />
								</div>
								<div class="inputStyle">
									<input type="submit"class="btn" name="searchBtn" id='submit' value="Search" />
								</div>
							</form>
							</div>
						</li>
						<li>
						<input id="address" type="textbox" value="Caulfield">

				         <input id="submit1" type="button" value="Geocode">
						<li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Dashboard</h3>
						<div id="map">
						
						</div>
						<div >
						<!-- include the php file for handling the form validation and data -->
							<? include("searchphp.php"); ?>
						</div>
						
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	
	
	
   <script>
		function initMap() {

		  var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 8,
			center: {lat: -37.8602828, lng: 145.079616}
		  });
		  var infoWindow = new google.maps.InfoWindow;
		  
		  document.getElementById('submit1').addEventListener('click', function() {
			geocodeAddress(infoWindow, map);

				   
		  });

		}

		function geocodeAddress(infoWindow, resultsMap) {
		 
			downloadUrl("mapxml.php", function(data) {
				var xml = data.responseXML;
				var markers = xml.documentElement.getElementsByTagName("marker");
				var address1 = document.getElementById('address').value;
				for (var i = 0; i < markers.length; i++) {
				  
				  var Suburb = markers[i].getAttribute("Suburb");
				  
				  if(Suburb.indexOf(address1) > -1){
					
					 
					  
					  var InfringementID = markers[i].getAttribute("InfringementID");
					  var Street1 = markers[i].getAttribute("Street1");
					  var Street2 = markers[i].getAttribute("Street2");
					  var no = markers[i].getAttribute("NoOfInfringement");
					  var Fines = markers[i].getAttribute("Fines");
					  var formatFine = Fines.toLocaleString('de-DE', { style: 'currency', currency: 'EUR' });
					  var address = Street1+" "+"and"+" "+Street2;	  
					  var html = '<b>' + address + '</b> <br/>' +'No. of Infringment: '+ no+'</b> <br/>' +'Total Fines: '+ formatFine;
				      console.log(address);
					 createMarker(address, html, resultsMap, infoWindow)		  
					  
				  } else {
					 console.log("not martch");
				  };
				 
				}
			  });
		 
		}

		function createMarker(address, html, resultsMap, infoWindow){

			 var geocoder = new google.maps.Geocoder();
					  geocoder.geocode({'address': address}, function(results, status) {
						if (status === google.maps.GeocoderStatus.OK) {
						  resultsMap.setCenter(results[0].geometry.location);
						  
						  var marker = new google.maps.Marker({
							map: resultsMap,
							position: results[0].geometry.location
						  });
						 

						  bindInfoWindow(marker, resultsMap, infoWindow, html);
						  
						} else {
						  console.log('Geocode was not successful for the following reason: ' + status);
						}
					  });   




		}


		 function bindInfoWindow(marker, map, infoWindow, html) {
			google.maps.event.addListener(marker, 'click', function() {
			infoWindow.setContent(html);
			infoWindow.open(map, marker);
		  });
		}


		function downloadUrl(url, callback) {
				var request = window.ActiveXObject ?
				new ActiveXObject('Microsoft.XMLHTTP') :
				new XMLHttpRequest;

			request.onreadystatechange = function() {
				if (request.readyState == 4) {
				  request.onreadystatechange = doNothing;
				  callback(request, request.status);
				}
			};
			request.open('GET', url, true);
			request.send(null);
		}

			function doNothing() {}
	</script>s
	
	
    <!-- /#wrapper -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
    <!-- jQuery -->
    <script src="css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="css/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="css/dist/js/sb-admin-2.js"></script>
	
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
