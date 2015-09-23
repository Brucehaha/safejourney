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
				  alert('Geocode was not successful for the following reason: ' + status);
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

    </script>