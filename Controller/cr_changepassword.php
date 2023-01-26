<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$username = mysqli_escape_string($con, $_POST['adminName']);
$password = mysqli_escape_string($con, $_POST['password']);
$repassword = mysqli_escape_string($con, $_POST['repassword']);

try {
  // Melakukan validasi terhadap data
  if (empty($password)) {
    header("Location: ../model/admin/changepassword.php?error=Password Field cannot be empty!");
    die();
  }
  if (empty($repassword)) {
    header("Location: ../model/admin/changepassword.php?error=Re-Password Field cannot be empty!");
    die();
  }
  if ($password != $repassword) {
    header("Location: ../model/admin/changepassword.php?error=Re-Password and Password didn't match");
    die();
  } else {
    $password = md5(mysqli_real_escape_string($con, $_POST["password"]));
  }

  // Update the adminPassword in the database
  $sql = "UPDATE admin SET adminPassword='$password'WHERE adminUsername='$username'";
  mysqli_query($con, $sql);

  // Redirect to the dashboard.php page with a success message
  header("Location:../model/dashboard.php?id=$username&update=Update Password Successfull");
} catch (Exception $e) {
  // Redirect to the dashboard.php page with an error message
  header("Location:../model/dashboard.php?id=$username&error=Update Password  Error");
}

// Close connection
mysqli_close($con);
