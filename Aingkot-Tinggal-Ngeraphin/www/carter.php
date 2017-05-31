<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
$query = $DBcon->query("SELECT * FROM pelanggan WHERE id_pelanggan=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

$id=$_GET['id'];

$quer = $DBcon->query("SELECT * FROM sopir WHERE id_sopir=".$_GET['id']);
$userRowSupir=$quer->fetch_array();

if(isset($_POST['hoy'])) {
	$lokasi = strip_tags($_POST['lokasi']);
	$tujuan = strip_tags($_POST['tujuan']);
	$ttl = strip_tags($_POST['date']);
	$komen = strip_tags($_POST['komen']);

	$lokasi = $DBcon->real_escape_string($lokasi);
	$tujuan = $DBcon->real_escape_string($tujuan);
	$komen = $DBcon->real_escape_string($komen);

  $u=$_SESSION['userSession'];
  $que = "INSERT INTO carter_angkot(id_pelanggan,id_sopir,tanggal_pemesanan,lokasi_awal,tujuan,keterangan) VALUES('$u','$id','$ttl','$lokasi','$tujuan','$komen')";
  if ($DBcon->query($que)) {
		unset($_POST['hoy']);
    header("Location: home.php");
  } else {
		echo ("Error description: " . mysqli_error($DBcon));;
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
  <script src="components/loader.js"></script>
  <script src="lib/onsenui/js/onsenui.min.js"></script>
  <script src="css/index.js"></script>
	<script src="lib/onsenui/controller.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd', minDate: new Date});
  } );
  </script>
<style>

</style>

  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<ons-page>
		<ons-toolbar>
		    <div class="center"> Pesan Angkot </div>
		    <div class="left">
		      <ons-toolbar-button>
		        <a href="home.php"> <ons-icon icon="ion-ios-arrow-back"> Back </ons-icon> </a>
		      </ons-toolbar-button>
		    </div>
		  </ons-toolbar>
		<p style="text-align: center; margin-top: 30px;">
		<img src="<?php echo $userRow['image'] ?>" style="width:200px; height: 200px; border-radius: 50%;"></img>
		<img src="<?php echo $userRowSupir['image'] ?>" style="width:200px; height: 200px; border-radius: 50%;"></img>
    <br>
    <div class="center"><h1></h1></div>
	</p>
		<div style="text-align: center; margin-top: 30px;">
		<p>
		</p>
		</div>
  	<form method="post" id="register-form">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <p>Nama Supir Angkot:</p>
            <p><?php echo $userRowSupir['username'] ?></p>
            <p><ons-input modifier="underbar" name="lokasi" placeholder="Lokasi Penjemputan" float required></ons-input></p>
            <p><ons-input modifier="underbar" name="tujuan" placeholder="destinasi" float required></ons-input></p>
			      <p><input type="text" id="datepicker" name="date" placeholder="Tanggal Carter" readonly='true' required/></p>
			      <p><textarea rows="5" cols="50" placeholder="keterangan" name="komen"></textarea></p>
        </p>
          <p style="margin-top: 30px;">
            <button type="submit" class="button" name="hoy" style="width: 30vw; height: 6vh;" onclick="return confirm('cobs doeloe');">Hubungi tukang angkot!</button>
          </p>
        </div>
      </p>
  </form>
</ons-page>

</body>
</html>
