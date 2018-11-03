<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Get Lattitude and Longitude onmouseover and onclick in Google Map v2 - Programming - Google Maps</title>
<meta name="keywords" content="get lattitude longitude, latlng onclick google map, latlng onmousemove google map, get lattitude longitude onclick, google map mouse event, show lattitude longutude onmousemove, show latlng onclick">
<meta name="description" content="Get lattitude and longitude when onmouseover and onmouseclick in google map version 2" />

<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyBU4ozT2gwSNOibrQsc6zSCE9157kpFzyk" type="text/javascript"></script>

<style type="text/css">
	body {font:10pt arial; }
	.main { text-align:center; font:12pt Arial; width:100%; height:auto; }
	.eventtext {width:100%; margin-top:20px; font:10pt Arial; text-align:left; line-height:25px; background-color:#EDF4F8;
	padding:5px; border:1px dashed #C2DAE7;}
	#mapa {width:100%; height:340px; border:5px solid #DEEBF2;}
	ul {font:10pt arial; margin-left:0px; padding:5px;}
	li {margin-left:0px; padding:5px; list-style-type:decimal;}
	.code {border:1px dashed #cecece; background-color:#F7F7F7; padding:5px;}
	.small {font:9pt arial; color:gray; padding:2px; }
	.jimi { margin:0px;}
</style>
</head>
<body>

<div class="main">

<div style="width:70%; margin:0px auto;">
<div id="mapa"></div>
<div class="eventtext">
<div>Lattitude: <span id="latspan"></span></div>

<div>Longitude: <span id="lngspan"></span></div>
<div>Lat Lng: <span id="latlong"></span></div>
</div>
</div>

</div>
<script type="text/javascript">
if (GBrowserIsCompatible())
{
map = new GMap2(document.getElementById("mapa"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl(3));
map.setCenter( new GLatLng(-6.886791,107.615238), 15);

GEvent.addListener(map,'mousemove',function(point)
{
document.getElementById('latspan').innerHTML = point.lat()
document.getElementById('lngspan').innerHTML = point.lng()
document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()
});

GEvent.addListener(map,'click',function(overlay,point)
{
document.getElementById('latspan').value = point.lat()
document.getElementById('lngspan').value = point.lng()
document.getElementById('lat').value = point.lat()
document.getElementById('lng').value = point.lng()

});
}
</script>

<br />
<div style="width:70%; margin:0 auto;">

</body>
</html>