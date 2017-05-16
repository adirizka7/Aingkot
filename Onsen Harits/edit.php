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
		$ttl = strip_tags($_POST['ttl']);
	}
	else {
		$np = strip_tags($_POST['np']);
	}
	
	if($upass==$cupass){
	
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
			header("Location: http://localhost/onsen/home.php");	
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

  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<ons-page>
  <form method="post" id="register-form">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <p><img src="1439015645187.jpg" style="width: 55vw; height: 30vh; border-radius: 50%; align-self: center;"></p>
            <p><ons-input id="name" modifier="underbar" name="username" placeholder="Name" value="<?php echo $userRow['username'] ?>" float required></ons-input></p>
            <p><ons-input id="email" modifier="underbar" type="email" name="email" placeholder="Email" value="<?php echo $userRow['email'] ?>" float required></ons-input></p>
            <p><ons-input id="phone" modifier="underbar" type="number" placeholder="Phone" name="phone" value="<?php echo $userRow['no_telp'] ?>" float required></ons-input></p>
			<?php if($_SESSION['status']==1){ ?>
			<p><ons-input id="alamat" modifier="underbar" name="alamat" placeholder="alamat" value="<?php echo $userRow['alamat'] ?>" float required></ons-input></p>
			<p><ons-input id="ttl" modifier="underbar" name="ttl" placeholder="Tanggal Lahir" value="<?php echo $userRow['tanggal_lahir'] ?>" float></ons-input></p>
			<?php } else {?>
			<p><ons-input id="np" modifier="underbar" name="np" placeholder="Nomor Plat" value="<?php echo $userRow['no_plat'] ?>" float required></ons-input></p>
			<?php } ?>
            <p><ons-input id="password" modifier="underbar" type="password" name="password" placeholder="Password" float required></ons-input></p>
			 <p><ons-input id="cpassword" modifier="underbar" type="password" placeholder="Confirm Password" name="cpassword" float required></ons-input></p>
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