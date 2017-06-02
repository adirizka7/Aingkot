<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location:home.php");
	exit();
}

if (isset($_POST['btn-login'])) {

	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);

	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);

	$query = $DBcon->query("SELECT id_pelanggan, email, password FROM pelanggan WHERE email='$email'");
	$squery = $DBcon->query("SELECT id_sopir, email, password FROM sopir WHERE email='$email'");
	$row=$query->fetch_array();
	$srow=$squery->fetch_array();

	$count = $query->num_rows;
	$scount = $squery->num_rows;// if email/password are correct returns must be 1 row

	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['id_pelanggan'];
		$_SESSION['status'] = 1;
		header("Location:home.php");
	}
	else if(password_verify($password, $srow['password']) && $scount==1){
		$_SESSION['userSession'] = $srow['id_sopir'];
		$_SESSION['status'] = 2;
		header("Location:home.php");
	}
	else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}

if(isset($_POST['button-sign'])) {

	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$phone = strip_tags($_POST['phone']);
	$cupass = strip_tags($_POST['cpassword']);

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

	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

	$check_email = $DBcon->query("SELECT email FROM pelanggan WHERE email='$email'");
	$count=$check_email->num_rows;

	if ($count==0) {

		$query = "INSERT INTO pelanggan(username,email,password,no_telp) VALUES('$username','$email','$hashed_password','$phone')";
		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
			$query = $DBcon->query("SELECT id_pelanggan, email, password FROM pelanggan WHERE email='$email'");
			$row=$query->fetch_array();
			$_SESSION['userSession'] = $row['id_pelanggan'];
			$_SESSION['status'] = 1;
			header("Location: home.php");

		}else {
			echo "<script language='javascript'>
					var uhuy='Data Tidak Ditemukan';
		            alert(uhuy);
		            </script>";
		}

	} else {

		echo "<script language='javascript'>
				var uhuy='Email Sudah Diambil';
							alert(uhuy);
							</script>";

	}
	$DBcon->close();
}

else {
		echo "<script language='javascript'>
			var uhuy='password tidak sesuai';
            alert(uhuy);
            </script>";
	}
}
else if(isset($_POST['button-sign-s'])) {

	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$phone = strip_tags($_POST['phone']);
	$cupass = strip_tags($_POST['cpassword']);

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

	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

	$check_email = $DBcon->query("SELECT email FROM sopir WHERE email='$email'");
	$count=$check_email->num_rows;

	if ($count==0) {
		$query = "INSERT INTO sopir(username,email,password,no_telp) VALUES('$username','$email','$hashed_password','$phone')";
		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
			$query = $DBcon->query("SELECT id_sopir, email, password FROM sopir WHERE email='$email'");
			$row=$query->fetch_array();
			$_SESSION['userSession'] = $row['id_sopir'];
			$_SESSION['status'] = 2;
			header("Location: home.php");

		}else {
			echo "<script language='javascript'>
					var uhuy='Data Tidak Ditemukan';
		            alert(uhuy);
		            </script>";
		}

	} else {

		echo "<script language='javascript'>
				var uhuy='Email Sudah Diambil';
							alert(uhuy);
							</script>";

	}
	$DBcon->close();
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
  <script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLCY-oAc_LBIs8YwkGYUVHuaK0FGDCjk&callback=initMap">
	</script>
	<script src="scripts/controller.js"></script>

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

  </script>
</head>
<body>
  <ons-page>
    <ons-toolbar>
      <div class="center" id="toolbar-title"></div>
    </ons-toolbar>
    <ons-tabbar position="auto">
      <ons-tab label="Sign Up" page="tab1.html" active>
      </ons-tab>
      <ons-tab label="Sign In" page="tab2.html">
      </ons-tab>
    </ons-tabbar>
  </ons-page>


<ons-template id="tab1.html">
<ons-page id="first-page">
	<form method="post" id="register-form">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <p><ons-input id="name" modifier="underbar" name="username" placeholder="Name" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" float  pattern=".{4,16}" required oninvalid="this.setCustomValidity('Salah woy')"></ons-input></p>
            <p><ons-input id="email" modifier="underbar" type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" float  pattern=".{4,100}" required ></ons-input></p>
            <p><ons-input id="phone" modifier="underbar" type="number" placeholder="Phone" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" float  pattern=".{4,16}" required ></ons-input></p>
            <p><ons-input id="password" modifier="underbar" type="password" name="password" placeholder="Password" float pattern=".{4,16}" required></ons-input></p>
            <p><ons-input id="cpassword" modifier="underbar" type="password" placeholder="Confirm Password" name="cpassword" float pattern=".{4,16}" required></ons-input>
          </p>

				<p style="margin-top: 30px;">
			<button type="submit" class = "button" name="button-sign-s" style="margin-bottom:20px">Sign Up as Sopir</button>
			<button type="subnit "class= "button" name="button-sign" style="margin-bottom:20px">Sign Up as Pelanggan</button>
            <!-- <a href = "signup()" class = "button" >Sign Up</a> -->
            <!--<ons-button onclick="login()">Sign Up</ons-button> -->
          </p>
		  </p>
        </div>
      </p>
	  </form>
	  </ons-page>
  </ons-template>


  <ons-template id="tab2.html">
    <ons-page id="second-page">
	<form method="post" id="register-form">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <ons-input id="email" modifier="underbar" type="email" placeholder="Email" name="email" float required></ons-input>
          </p>
          <p>
            <ons-input id="password" modifier="underbar" type="password" name="password" placeholder="Password" float required></ons-input>
          </p>
          <p style="margin-top: 30px;">
            <button type="submit" class = "button" name="btn-login">Login</button>
          </p>
        </div>
      </p>
	  </form>
    </ons-page>
  </ons-template>
</body>
</html>
