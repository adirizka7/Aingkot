<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location:  http://localhost/onsen/home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT id_pelanggan, email, password FROM pelanggan WHERE email='$email'");
	echo $_POST['email'], $_POST['password'];
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['id_pelanggan'];
		$_SESSION['status'] = 1;
		header("Location: http://localhost/onsen/home.php");
	} else {
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
			header("Location: http://localhost/onsen/home.php");
				
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	$DBcon->close();
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
            <p><ons-input id="name" modifier="underbar" name="username" placeholder="Name" float></ons-input></p>
            <p><ons-input id="email" modifier="underbar" type="email" name="email" placeholder="Email" float></ons-input></p>
            <p><ons-input id="phone" modifier="underbar" type="number" placeholder="Phone" name="phone" float></ons-input></p>
            <p><ons-input id="password" modifier="underbar" type="password" name="password" placeholder="Password" float></ons-input></p>
            <p><ons-input id="cpassword" modifier="underbar" type="password" placeholder="Confirm Password" name="cpassword" float></ons-input>
          </p>

				<p style="margin-top: 30px;">
			<button type="submit" class = "button" name="button-sign-s">Sign Up as Sopir</button>
			<button class= "button" name="button-sign">Sign Up as Pelanggan</button>
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
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <ons-input id="username" modifier="underbar" placeholder="Username" float></ons-input>
          </p>
          <p>
            <ons-input id="password" modifier="underbar" type="password" placeholder="Password" float></ons-input>
          </p>

          <p style="margin-top: 30px;">
            <ons-button onclick="login()">Sign in</ons-button>
          </p>
        </div>
      </p>
    </ons-page>
  </ons-template>
</body>
</html>