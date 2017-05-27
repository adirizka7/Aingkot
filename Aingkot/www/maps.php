<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
  <script src="components/loader.js"></script>
  <script src="lib/onsenui/js/onsenui.min.js"></script>
  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">

  <script>
    ons.ready(function() {
      console.log("Onsen UI is ready!");
    });
    document.addEventListener('show', function(event) {
      var page = event.target;
      var titleElement = document.querySelector('#toolbar-title');
      if (page.matches('#first-page')) {
        titleElement.innerHTML = 'I-NGKOT';
      } else if (page.matches('#second-page')) {
        titleElement.innerHTML = 'I-NGKOT';
      }
    });
    window.fn = {};
    window.fn.open = function() {
      var menu = document.getElementById('menu');
      menu.open();
    };
    window.fn.load = function(page) {
      var content = document.getElementById('content');
      var menu = document.getElementById('menu');
      content.load(page)
        .then(menu.close.bind(menu));
    };
    </script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
       #floating-panel {
        position: absolute;
        top: 50px;
        left: 10px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
  <ons-page>
    <ons-toolbar>
      <div class="center" style="font-size: 20px"> Map </div>
      <div class="left">
        <ons-toolbar-button>
          <a href="home.php"> <ons-icon icon="ion-ios-arrow-back"> Back </ons-icon> </a>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>
  <div id="floating-panel">
    <b>Rute: </b>
    <select id="rute">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
    </div>
    <div id="map"></div>
    <script>

      // This example creates a 2-pixel-wide red polyline showing the path of William
      // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
      // Brisbane, Australia.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: {lat: 0, lng: -180},
          mapTypeId: 'terrain'
        });

        var flightPlanCoordinates = [
          {lat: 37.772, lng: -122.214},
          {lat: 21.291, lng: -157.821},
          {lat: -18.142, lng: 178.431},
          {lat: -27.467, lng: 153.027}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLCY-oAc_LBIs8YwkGYUVHuaK0FGDCjk&callback=initMap">
    </script>
    </ons-page>
  </body>
</html>
