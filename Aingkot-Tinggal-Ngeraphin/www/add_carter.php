<?php
session_start();
include_once 'dbconnect.php';

$quer = $DBcon->query("SELECT * FROM sopir WHERE id_sopir=".$_SESSION['userSession']);
$userRowSupir=$quer->fetch_array();

$id=$_GET['id'];

$query = $DBcon->query("SELECT * FROM pelanggan WHERE id_pelanggan=".$_GET['id']);
$userRow=$query->fetch_array();

$Err="";

if(isset($_POST['hoy'])){
if (empty($_POST["komen"])) {
  $Err = "Tolong Isi Kolom Komentar";
} else {
  $id=$_GET['id'];
  $idc=$_GET['idc'];
  $ids=$_SESSION['userSession'];
  $komen=$_POST['komen'];
  $komen = trim($komen);
  $komen = stripslashes($komen);
  $query = "	UPDATE carter_angkot
        SET status= '1',
        keterangan_tambahan = '$komen'
        WHERE id_pelanggan = '$id'
        AND id_sopir = '$ids'
        AND id_carter = '$idc' ";

  unset($_POST['hoy']);

  if ($DBcon->query($query)) {
    header("Location: home.php");
  } else {
    echo ("Error description: " . mysqli_error($DBcon));;
  }
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
  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<ons-page>
		<ons-toolbar>
		    <div class="center"> Add Carteran </div>
		    <div class="left">
		      <ons-toolbar-button>
		        <a href="home.php"> <ons-icon icon="ion-ios-arrow-back"> Back </ons-icon> </a>
		      </ons-toolbar-button>
		    </div>
		  </ons-toolbar>
		<p style="text-align: center; margin-top: 30px;">
		<img src="<?php echo $userRowSupir['image'] ?>" style="width:200px; height: 200px; border-radius: 50%;"></img>
    <img src="<?php echo $userRow['image'] ?>" style="width:200px; height: 200px; border-radius: 50%;"></img>
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
          <Form method="post">
          <p>
            <p>Nama Pelanggan Angkot:</p>
            <Form method="post">
            <p><?php echo $userRow['username'] ?></p>
			      <p><textarea rows="5" cols="50" placeholder="Tolong isi Keterangan tambahan untuk pelanggan(seperti waktu, kondisi, dll)" name="komen" required></textarea></p>
            <p><span class="error"><?php if($Err!="")echo "*".$Err;?></span></p>
        </p>
          <p style="margin-top: 30px;">
            <button type="submit" class="button" name="hoy" style="width: 30vw; height: 6vh;" onclick="return confirm('cobs doeloe');" value="submit">Add</button>
          </p>
        </form>
        </div>
      </p>
  </form>
</ons-page>

</body>
</html>
