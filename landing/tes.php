<?php 
define("API_KEY","AIzaSyDn1JrKoNqygrc0Wjei_wpPCSFIJXvvclk") ?>
<html>
<head>
<title>How to Get Current Location using Google Map Javascript API</title>
</head>
<style>
body {
	font-family :Arial;
}
#map-layer {
	margin: 20px 0px;
	max-width: 600px;
	min-height: 400;
}
#btnAction {
	background: #3878c7;
    padding: 10px 40px;
    border: #3672bb 1px solid;
    border-radius: 2px;
    color: #FFF;
    font-size: 0.9em;
    cursor:pointer;
    display:block;
}
#btnAction:disabled {
    background: #6c99d2;
}
</style>
<body>
	<div id="button-layer"><button id="btnAction" onClick="locate1()">My Current Location</button></div>
	<div id="map-layer"></div>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script type="text/javascript">
	var map;


	function locate(){
		document.getElementById("btnAction").disabled = true;
		document.getElementById("btnAction").innerHTML = "Processing...";
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var currentLatitude = position.coords.latitude;
				var currentLongitude = position.coords.longitude;

				var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
				var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
				var currentLocation = { lat: currentLatitude, lng: currentLongitude };
				infoWindow.setPosition(currentLocation);
				document.getElementById("btnAction").style.display = 'none';
			});
		}
	}
	function locate1(){
	    if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var currentLatitude = position.coords.latitude;
				var currentLongitude = position.coords.longitude;
				alert(currentLatitude);
				alert(currentLongitude);
			});
		}
	}
	</script>
</body>
</html>