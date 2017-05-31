<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
if($_SESSION['status']==1){
$query = $DBcon->query("SELECT * FROM pelanggan WHERE id_pelanggan=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
}
else{
	$query = $DBcon->query("SELECT * FROM sopir WHERE id_sopir=".$_SESSION['userSession']);
	$userRow=$query->fetch_array();
}
if(isset($_POST['button-update'])) {
	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$phone = strip_tags($_POST['phone']);
	$cupass = strip_tags($_POST['cpassword']);
	if($_SESSION['status']==1){
		$alamat = strip_tags($_POST['alamat']);
		$ttl = strip_tags($_POST['date']);
	}
	else {
		$np = strip_tags($_POST['np']);
	}

  if(strlen($upass) < 4){
    echo "<script language='javascript'>
    var uhuy='Password Harus lebih dari 4 karakter!!';
          alert(uhuy);
          </script>";
  }

	else if($upass==$cupass){

	$username = $DBcon->real_escape_string($username);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	$phone = $DBcon->real_escape_string($phone);
	if($_SESSION['status']==1){
		$alamat = $DBcon->real_escape_string($alamat);
		$ttl = $DBcon->real_escape_string($ttl);
	}
	else {
		$np = $DBcon->real_escape_string($np);
	}

	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	$id=$_SESSION['userSession'];
	if($_SESSION['status']==1){
		$query = "	UPDATE pelanggan
					SET username= '$username',
					email= '$email',
					password='$hashed_password',
					no_telp='$phone',
					alamat='$alamat',
					tanggal_lahir='$ttl'
					WHERE id_pelanggan = '$id'";
	}
	else {
		$query = "	UPDATE sopir
					SET username= '$username',
					email= '$email',
					password='$hashed_password',
					no_telp='$phone',
					no_plat='$np'
					WHERE id_sopir = '$id'";
	}
		if ($DBcon->query($query)) {
			$_SESSION['popbox']=1;
			$DBcon->close();
			header("Location: home.php");
		}
		else {
			echo "<script language='javascript'>
			var uhuy='kok salah';
            alert(uhuy);
            </script>";
		}

	}

else {
		echo "<script language='javascript'>
			var uhuy='password tidak sesuai';
            alert(uhuy);
            </script>";
	}
}
/*if(isset($_SESSION['popbox'])){
	echo "<script language='javascript'>
			var uhuy='Data Berhasil di Update';
            alert(uhuy);
            </script>";
	unset($_SESSION['popbox']);
}*/

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
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd', maxDate: new Date});
  } );
  </script>
<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.inputfile + label {
    font-size: 1em;
    font-weight: 700;
    color: white;
    background-color:#6f8eca;
    display: inline-block;
		padding: 10px;
		border-radius: 4px;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}


</style>

  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<ons-page>
		<ons-toolbar>
		    <div class="center"> Edit Profile </div>
		    <div class="left">
		      <ons-toolbar-button>
		        <a href="home.php"> <ons-icon icon="ion-ios-arrow-back"> Back </ons-icon> </a>
		      </ons-toolbar-button>
		    </div>
		  </ons-toolbar>
		<p style="text-align: center; margin-top: 30px;">
		<img src="<?php echo $userRow['image'] ?>" style="width:200px; height: 200px; border-radius: 50%;"></img>
	</p>
		<div style="text-align: center; margin-top: 30px;">
		<p>
			<form action="upload.php" method="post" enctype="multipart/form-data" >
					Select image to upload:
					<br><br>
					<div class="center">
						<input type="file" name="img" id="fileToUpload" class="inputfile" />
						<label for="fileToUpload">Choose a file</label>
						<input type="submit" name="submit" id="submit" class="inputfile">
						<label for="submit">Upload</label>
			</form>
		</p>
		</div>
  	<form method="post" id="register-form">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <p><ons-input id="name" modifier="underbar" name="username" placeholder="Name" value="<?php echo $userRow['username'] ?>" float required></ons-input></p>
            <p><ons-input id="email" modifier="underbar" type="email" name="email" placeholder="Email" value="<?php echo $userRow['email'] ?>" float required></ons-input></p>
            <p><ons-input id="phone" modifier="underbar" type="number" placeholder="Phone" name="phone" value="<?php echo $userRow['no_telp'] ?>" float required></ons-input></p>
			<?php if($_SESSION['status']==1){ ?>
			<p><ons-input id="alamat" modifier="underbar" name="alamat" placeholder="alamat" value="<?php echo (isset($_POST['alamat']))? $_POST['alamat'] : $userRow['alamat'] ?>" pattern=".{4,16}" float required></ons-input></p>
			  <p><input type="text" id="datepicker" name="date" placeholder="Tanggal Lahir" readonly='true' value="<?php if($userRow['tanggal_lahir']!="0000-00-00")echo $userRow['tanggal_lahir'] ?>"/></p>
			<?php } else {?>
			<p><ons-input id="np" modifier="underbar" name="np" placeholder="Nomor Plat" value="<?php echo $userRow['no_plat'] ?>" float required pattern=".{4,16}"></ons-input></p>
			<?php } ?>
      <p><ons-input id="password" modifier="underbar" type="password" name="password" placeholder="Password" float required pattern=".{4,16}"></ons-input></p>
			<p><ons-input id="cpassword" modifier="underbar" type="password" placeholder="Confirm Password" name="cpassword" float required pattern=".{4,16}"></ons-input></p>
        </p>
          <p style="margin-top: 30px;">
            <button type="submit" class = "button" name="button-update" style="width: 70vw; height: 6vh;" onclick="return confirm('Anda yakin ingin mengganti data anda?');">Save</button>
          </p>
        </div>
      </p>
  </form>
</ons-page>

</body>
</html>
