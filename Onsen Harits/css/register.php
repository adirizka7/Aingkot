<?php
session_start();
require_once 'dbconnect.php';

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

?>