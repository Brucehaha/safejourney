<!DOCTYPE html>
<html lang="en">
<head>
    <title>Safe Journey To Work</title>
	<?php include("includes/head.html"); ?>  
		
	<!-- <script type="text/javascript">jQuery.noConflict();</script> -->
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
    <script type="text/javascript" src="js/jquery.autocomplete.js"></script>

	<script>
		$( "#map" ).load( "fines/test.html");
	</script>	
	<script>
       //send input value to database
	    $(document).ready(function() {
			$('#submit').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'searchphp.php',
					data: {
						suburb_id: $('#suburb_id').val(),
						searchBtn: 'on'
					},
					success: function(data)
					{
						$("#tableContent").html(data);
					}
				});
			});
		});   

		$(document).ready(function(){
			$("#suburb_id").autocomplete("suburbautocomplete.php", {
			selectFirst: false
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

	<style>
	    #tableContent {			
			width:100%;
			height:400px;			
		}
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
		<?php include("includes/header.html"); ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li>   
						    <div id="formPosition">
							    <div id="error">
						        </div>
								<form>
									<div class="form-group inputStyle ">
										<input type="textbox" class="form-control" name="suburb"  placeholder="Enter Suburb Name" id="suburb_id" >
									</div>
									
									<div class="form-group inputStyle">
										<input type="submit"class="btn" name="searchBtn" id='submit' value="Search" />
									</div>
						        </form>
							</div>
						</li>	
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            	
                <div class="row">
                	
                    <div class="col-lg-12">
                    	<h4>
                        <ul class="breadcrumb">
                        	<li>
                        		<a href="index.html">
                        			<i class="fa fa-home">
                        				Home
                        			</i>
                        		</a>
                        	</li>
                        	<li class="active">Safe Crossing</li>
                        </ul>
                    </h4>
						<div id="map">
						
						</div>
						<div id="tableContent">
						<!-- include the php file for handling the form validation and data -->				
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
	
	<?php include("includes/footer.html"); ?>
	
	<script>
		var markerdata = [];
		//initialize map
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 8,
				center: {lat: -37.8602828, lng: 145.079616}
			});
			var infoWindow = new google.maps.InfoWindow;
			
			console.log(markerdata.length);// test 

			document.getElementById('submit').addEventListener('click', function() {
				//clear the existing markers
				if(markerdata && markerdata.length > 0) {
					for(var i=0;i<markerdata.length;i++) {
						
						markerdata[i].setMap(null);
					
					}
				}	
				markerdata = [];
			    //set new markers
			    map.setZoom(12);
				geocodeAddress(infoWindow, map);	   
		  });
		}

		function geocodeAddress(infoWindow, resultsMap) {
		    var error;
			var suburbs = [];
			downloadUrl("mapxml.php", function(data) {
				var xml = data.responseXML;
				var markers = xml.documentElement.getElementsByTagName("marker");
				var address1 = document.getElementById('suburb_id').value;
				
				if(address1.replace(/\s/g,"") == ""){					
					error = "<div class='alert alert-danger'>Please enter a valid suburb</div>";
					$("#error").html(error);
				}else {				    
					error = "";
					$("#error").html(null);
					
					for (var i = 0; i < markers.length; i++) {				 
						var Suburb = markers[i].getAttribute("Suburb");
					  
						if(Suburb.trim().toUpperCase().indexOf(address1.trim().toUpperCase()) !== -1){
							suburbs.push(Suburb);
							var InfringementID = markers[i].getAttribute("InfringementID");
							var Street1 = markers[i].getAttribute("Street1");
							var Street2 = markers[i].getAttribute("Street2");
							var no = markers[i].getAttribute("NoOfInfringement");
							var Fines = markers[i].getAttribute("Fines");
							var formatFine = Fines.toLocaleString('de-DE', { style: 'currency', currency: 'EUR' });
							var address = Street1+" "+"and"+" "+Street2+", "+Suburb+", "+"VIC Australia";	  
							var html = '<b>' + address + '</b> <br/>' +'No. of Infringment: '+ no+'</b> <br/>' +'Total Fines: '+ formatFine;
							
							createMarker(address, html, resultsMap, infoWindow);		  
					  } 
					}
					
					if(suburbs.length == 0){
						error = "<div class='alert alert-danger'>Please enter a valid suburb</div>";						
						$("#error").html(error);					
					} else{					
						error="";
						$("#error").html(error);					
					}
				}
			});
		}
           //set markers to the map
		function createMarker(address, html, resultsMap, infoWindow){
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({'address': address}, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					resultsMap.setCenter(results[0].geometry.location);
					// push the points in to marker data	  
					var marker = new google.maps.Marker({
						map: resultsMap,
						position: results[0].geometry.location
					});
						//set the infor window for each marker
                     markerdata.push(marker);
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

        // @param url :request data from url
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
	</script>
		
    <!-- /#wrapper -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
	
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
