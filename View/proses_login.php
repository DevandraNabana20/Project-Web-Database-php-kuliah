<?php
session_start();

require_once "../Model/config/koneksi.php";
$con = db_connect();

$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = md5(mysqli_real_escape_string($con, $_POST["password"]));

// Melakukan validasi terhadap data
if (empty($username)) {
  header("Location: location:login.php?pesan=username cannot be empty!");
  die();
}
if (empty($password)) {
  header("Location: location:login.php?pesan=password cannot be empty!");
  die();
}

$data = mysqli_query($con, "select * from admin where adminUsername='$username' and adminPassword='$password'");



$cek = mysqli_num_rows($data);
if ($cek > 0) {
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  header("location:../Model/dashboard.php");
} else {
  header("location:login.php?pesan=gagal");
}
