
<body>
<!-- map-->
	<div id="map" style="height:80%"> </div>
	<textarea id="json_polyline" style="height:10%;width:100%"></textarea>
</body>
<!--googlemap-v3.js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU4ozT2gwSNOibrQsc6zSCE9157kpFzyk"></script>

<script>

	function initialize(){
		//setup 
		var mapOptions = {
			zoom : 13,
			center: new google.maps.LatLng(-6.911717, 107.608060),
			}

		var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		//config polyline

		var polyOptions = {
			geodesic: true,
			strokeColor: 'rgb(20, 120, 218) ',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			editable: true, //importand editable
		}

		//apply config 
		var poly = new google.maps.Polyline(polyOptions);
		poly.setMap(map);

		//event to create polyline by click
		google.maps.event.addListener(map, "click", function(event){

			//menggambar
			var path = poly.getPath();
			path.push(event.latLng);

			var coordinates_poly = poly.getPath().getArray();
			var newCoordinates_poly = [];
			for (var i = 0; i < coordinates_poly.length;i++) {
				lat_poly = coordinates_poly[i].lat();
				lng_poly = coordinates_poly[i].lng();

				latlng_poly = [lat_poly, lng_poly];
				newCoordinates_poly.push(latlng_poly);
			}

			var str_coordinates_poly = JSON.stringify(newCoordinates_poly);
			var json_poly = "{\"coordinates\":" + str_coordinates_poly + "}";

			document.getElementById('json_polyline').value = json_poly;
		});
	}
//load maps
google.maps.event.addDomListener(window, 'load', initialize);
</script>

