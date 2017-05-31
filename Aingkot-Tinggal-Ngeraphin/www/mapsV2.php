<?php
session_start();
require_once 'dbconnect.php';
/*if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}*/
if (isset($_POST['uhuy'])){
  $start=$_POST['start'];
  $end=$_POST['end'];
  $query = $DBcon->query("SELECT direction, nama_mulai, nama_destinasi, angkot, mulai, destinasi FROM rute WHERE (mulai='$start' and destinasi='$end') or (mulai='$end' and destinasi='$start')");
  $row=$query->fetch_array();
  if($row['mulai']==$start){
    $_SESSION['sta']=$row['nama_mulai'];
    $_SESSION['en']=$row['nama_destinasi'];
  } else {
    $_SESSION['en']=$row['nama_mulai'];
    $_SESSION['sta']=$row['nama_destinasi'];
  }
  $one=explode("|", $row['direction']);
  $_SESSION['route'] = array();
  foreach ($one as $item) {
    $_SESSION['route'][] = explode(",",$item);
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
    <script src="components/loader.js"></script>
    <script src="lib/onsenui/js/onsenui.min.js"></script>
    <script src="css/index.js"></script>
    <script src="lib/onsenui/controller.js"></script>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }
    </style>

    <link rel="stylesheet" href="components/loader.css">
    <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <ons-toolbar>
		    <div class="center"> I-ngkot Maps </div>
		    <div class="left">
		      <ons-toolbar-button>
		        <a href="home.php"> <ons-icon icon="ion-ios-arrow-back"> Back </ons-icon> </a>
		      </ons-toolbar-button>
		    </div>
		  </ons-toolbar>
    <div id="map"></div>
    <div id="right-panel">
    <div>
      <form method="post" id="wut">
        <br>
        <b>Pilih Trayek:</b>
        <select id="Nomor-Angkot" name="Nomor-Angkot">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="15">15</option>
        </select>
    <b>Start:</b>
    <select id="start" name="start">
      <option value="laladon">Laladon</option>
      <option value="bubulak">Bubulak</option>
      <option value="merdeka">Merdeka</option>
      <option value="situgede">Situ Gede</option>
    </select>
    <br>
    <b>End:</b>
    <select id="end" name="end">
      <option value="laladon">Laladon</option>
      <option value="merdeka">Merdeka</option>
      <option value="bubulak">Bubulak</option>
      <option value="situgede">Situ Gede</option>
    </select>
    <button type="submit" id="coba" name="uhuy">halo</button>
    </form>
    <?php if(isset($_POST['uhuy'])) {?>
      <input type="submit" id="submit">
      <?php } ?>
    <br>
    <div id="demo"></div>
    <div id="directions-panel"></div>
  </div>
    </div>
    <script>
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: -6.5971469, lng: 106.8060388}
        });
        directionsDisplay.setMap(map);
        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = <?php echo json_encode($_SESSION['route']); ?>;
        for (var i = 0; i < checkboxArray.length; i++) {
            waypts.push({
              location: new google.maps.LatLng(checkboxArray[i][1],checkboxArray[i][2]),
              stopover: true
            });
          }

        directionsService.route({
          origin: "<?php echo $_SESSION['sta']?>",
          destination: "<?php echo $_SESSION['en']?>",
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLCY-oAc_LBIs8YwkGYUVHuaK0FGDCjk&callback=initMap">
    </script>
  </body>
</html>
