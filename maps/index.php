<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
	<title>Search on Map</title>
	<!-- call the outernal head file -->
	<?php include("../includes/head.html"); ?>
	<!-- call the outernal head file -->
	<script src="http://maps.google.com/maps/api/js?libraries=places,visualization&sensor=false"></script>
	<script type="text/javascript" src="../lib/Fluster2.packed.js"></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}		
	</style>
	
	<script type="text/javascript">
	// OnLoad function ...
	var directions = [];	
	function initialize() {		
		// Create a new map with some default settings
		var myLatlng = new google.maps.LatLng(-37.8602828,145.079616);
		var myOptions = {
			zoom:8,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl:true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DEFAULT,
				mapTypeIds: [
					google.maps.MapTypeId.ROADMAP,
					google.maps.MapTypeId.TERRAIN,
					google.maps.MapTypeId.SATELLITE
				],
				position: google.maps.ControlPosition.RIGHT_TOP
			}
		}
		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
		 //click function call calculateAndDisplayRoute to ge the alternative routes
		var directionsService = new google.maps.DirectionsService;
				
		//prediction list for input box
		var input = document.getElementById('start');
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);
				
		var input1 = document.getElementById('end');
		var autocomplete1 = new google.maps.places.Autocomplete(input1);
		autocomplete.bindTo('bounds', map);// prediction-->			

		document.getElementById('submit').addEventListener('click', function() {
			if (directions && directions.length > 0) {
				for (var i=0; i<directions.length; i++)
					directions[i].setMap(null);
				}
			directions = [];
			calculateAndDisplayRoute(directionsService, map);	
		});
		
		// Initialize Fluster and give it a existing map
		var fluster = new Fluster2(map);
			
		downloadUrl("mapxml.php", function(data) {
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName("marker");
		
			for (var i = 0; i < markers.length; i++) {
				//var accidentno = markers[i].getAttribute("AccidentNo");
				//var nodeid = markers[i].getAttribute("NodeID");
				var count = markers[i].getAttribute("Count");
				var nodetype = markers[i].getAttribute("NodeType");
				var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("Latitude")),
					parseFloat(markers[i].getAttribute("Longitude")));
						
				// Create a new marker. Don't add it to the map!
				var marker = new google.maps.Marker({
					position: point,
					icon: '../images/accidenticon.png',
					title: 'Marker ' + i
				});
		
				// Add the marker to the Fluster
				fluster.addMarker(marker);			   
			}	
		});  
		
		// Set styles
		// These are the same styles as default, assignment is only for demonstration ...
		fluster.styles = {
			// This style will be used for clusters with more than 0 markers
			0: {
				image: 'http://gmaps-utility-library.googlecode.com/svn/trunk/markerclusterer/1.0/images/m1.png',
				textColor: '#FFFFFF',
				width: 53,
				height: 52
			},
			// This style will be used for clusters with more than 10 markers
			10: {
				image: 'http://gmaps-utility-library.googlecode.com/svn/trunk/markerclusterer/1.0/images/m2.png',
				textColor: '#FFFFFF',
				width: 56,
				height: 55
			},
			20: {
				image: 'http://gmaps-utility-library.googlecode.com/svn/trunk/markerclusterer/1.0/images/m3.png',
				textColor: '#FFFFFF',
				width: 66,
				height: 65
			}
		};
		
		// Initialize Fluster
		// This will set event handlers on the map and calculate clusters the first time.
		fluster.initialize();
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
	
	//google route function--->
	function calculateAndDisplayRoute(directionsService, map) {			
		//get the value from start and end input box 
		var start = document.getElementById('start').value;
		var end =document.getElementById('end').value;
		
		//property when dran on the map
		var directionsRequest = {
		   //starting point
			origin: start,
			//destination
			destination: end,
			//multiple route
			provideRouteAlternatives: true,
			travelMode: google.maps.TravelMode.DRIVING	
		};
		
		directionsService.route( directionsRequest, function(response, status) {		
			if (status === google.maps.DirectionsStatus.OK) {
				 //store the multiple routes in respones and display one by one
				for (var i = 0, len = response.routes.length; i < len; i++) {
					directions.push(new google.maps.DirectionsRenderer({
						map: map,
						directions: response,
						routeIndex: i
					}));
				}	
			} else {
				window.alert('Directions request failed due to ' + status);
			}
		});
	}
</script>

</head>
<body onload="initialize()">
	<?php include("../includes/header.html"); ?>
	<div id="map_canvas"></div>
	<div class="container1">
		<div id="accordion" >
			<div class="header1"><span>Click to navigate your safe journey<i class="fa fa-align-justify"></i></span></span></div>
			<div class="wraper">
				<form>
					<div class="form-group">						
						<input type="text" id="start" placeholder="Starting point" class="form-control" />
					</div>
					<div class="form-group">						
						<input type="text" class="form-control"  id="end" placeholder="Ending point"/>
					</div>
						<input type="button" name="submit" class="btn" value="Search" id="submit" />					
				</form>
			</div>
		</div>	
	</div>

	<script>
		$(".header1").click(function () {
			$header1 = $(this);
			$header1.css("font-size", "1.5em")
			//getting the next element
			$wraper = $header1.next();
			//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
			$wraper.slideToggle(500, function () {
				//execute this after slideToggle is done
				//change text of header based on visibility of content div
				$header1.text(function () {
					//change text based on condition
					return $wraper.is(":visible") ? "Click to collapse" : "Click to navigate your safe journey";
				});		
			});
		});
	</script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>