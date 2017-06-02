<?php
session_start();
include_once 'dbconnect.php';

$id=$_GET['id'];
$idc=$_GET['idc'];
$ids=$_SESSION['userSession'];
$query = "	DELETE FROM carter_angkot
      WHERE id_pelanggan = '$id'
      AND id_sopir = '$ids'
      AND id_carter = '$idc' ";

if ($DBcon->query($query)) {
  header("Location: home.php");
} else {
  echo ("Error description: " . mysqli_error($DBcon));;
}
?>
