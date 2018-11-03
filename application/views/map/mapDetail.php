
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU4ozT2gwSNOibrQsc6zSCE9157kpFzyk&callback=initMap"
  type="text/javascript"></script>
<style>
         
          #map {
               width: 60%;
               height: 500px;
           
          }
</style>
 
<script type="text/javascript">
 
     //Mendefinisikan alamat icons yang akan digunakan
    var customIcons = {
      1: {
        icon: 'assets/icons/fa.png'
      },
      2: {
        icon: '<?php echo base_url(); ?>assets/icons/musik.png'
      }
    };
 
    function load() {
       var map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(<?php echo $no->lat;?>, <?php echo $no->lng;?>),
          zoom: 14,
          mapTypeId: 'terrain'
        });

        var infoWindow = new google.maps.InfoWindow;

      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam datalokasimapsbdg.php
      downloadUrl("<?php echo base_url(); ?>utama/tampilXMLcontoh/<?php echo $no->idCarFree;?>", function(data) {

      
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        
        
        var flightPlanCoordinates = [];
        for (var i = 0; i < markers.length; i++) {
          var id = markers[i].getAttribute("id");
          
          var latt = parseFloat(markers[i].getAttribute("lat"));
          var lngg = parseFloat(markers[i].getAttribute("lng"));
  
          var point = new google.maps.LatLng(latt,lngg);
          flightPlanCoordinates.push(point);
          var html = "<b>" + name + "</b><br/>" + "<br/>"  + "<a href='<?php echo base_url(); ?>utama/detailCFD/"+ id +"'>Detail</a>";
          var icon = customIcons[1] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
 
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }

        var polyline = new google.maps.Polyline({
	      path: flightPlanCoordinates,
	      strokeColor: "#FF0000",
	      strokeOpacity: 1.0,
	      strokeWeight: 2
	    });
	    polyline.setMap(map);
      });

      //url marker

      downloadUrl1("<?php echo base_url(); ?>acara/tampilXMLAcara", function(data) {
        

        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var id = markers[i].getAttribute("id");
          var name = markers[i].getAttribute("name");
          var latt = parseFloat(markers[i].getAttribute("lat"));
          var lngg = parseFloat(markers[i].getAttribute("lng"));
          var deskrip = markers[i].getAttribute("deskrip");
          var point = new google.maps.LatLng(latt,lngg);
          var html = "<b>" + name + "</b><br/>" + "<br/>" ;
          
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            
 
          });
          bindInfoWindow1(marker, map, infoWindow, html);
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

    function bindInfoWindow1(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    function downloadUrl1(url, callback) {
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
</head>
 <body onLoad="load()"> 
<center> 
<div id="map"></div> 
</center>
