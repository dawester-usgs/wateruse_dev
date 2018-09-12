<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8 />
  <title>gp drivetime</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

  <!-- Load Leaflet from CDN-->
   <!-- Load Leaflet from CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1.0.0-rc.3/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/leaflet/1.0.0-rc.3/leaflet.js"></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="https://cdn.jsdelivr.net/leaflet.esri/2.0.2/esri-leaflet.js"></script>

  <!-- Esri Leaflet Related -->
  <script src="https://cdn.jsdelivr.net/leaflet.esri.related/2.0.0/esri-leaflet-related.js"></script>



  <style>
    body {
      margin:0;
      padding:0;
    }

    #map {
      position: absolute;
      top:0;
      bottom:0;
      right:0;left:0;
    }

    #info-pane {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 10;
      padding: 1em;
      background: white;
    }
  </style>
</head>
<body>

<div id="map"></div>
<div id="info-pane" class="leaflet-bar">
</div>

<script>
  var map = L.map('map').setView([ 38.83,-98.5], 7);

  L.esri.tiledMapLayer({
    url: "https://www.gis.arkansas.gov/arcgis/rest/services/BASEMAP_DYNAMIC/MapServer"
  }).addTo(map);
</script>

</body>
</html>
