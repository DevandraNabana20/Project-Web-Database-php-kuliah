<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$upcomingtrailersCode = mysqli_real_escape_string($con, $_POST["upcomingtrailersCode"]);
$movieName = mysqli_real_escape_string($con, $_POST["movieName"]);
$linkTrailer = stripslashes(mysqli_escape_string($con, $_POST['linkTrailer']));
$adminCode = mysqli_real_escape_string($con, $_POST["adminCode"]);
// Encode HTML special characters in the movieName field
$movieName = htmlspecialchars($movieName);

try {
  // Melakukan validasi terhadap data
  if (empty($movieName)) {
    header("Location: ../model/admin/upcomingtrailers/show.php?id=$upcomingtrailersCode&error=movieName cannot be empty!");
    die();
  }
  if (empty($linkTrailer)) {
    header("Location: ../model/admin/upcomingtrailers/show.php?id=$upcomingtrailersCode&error=linkTrailer cannot be empty!");
    die();
  }
  if (empty($adminCode)) {
    header("Location: ../model/admin/upcomingtrailers/show.php?id=$upcomingtrailersCode&error=adminCode cannot be empty!");
    die();
  }

  // Update the upcomingtrailers in the database
  $sql = "UPDATE upcomingtrailers SET movieName='$movieName', linkTrailer='$linkTrailer', adminCode='$adminCode' WHERE upcomingtrailersCode='$upcomingtrailersCode'";
  mysqli_query($con, $sql);

  // Redirect to the show.php page with a success message
  header("Location:../model/admin/upcomingtrailers/show.php?id=$upcomingtrailersCode&update=Update Successfull");
} catch (Exception $e) {
  // Redirect to the show.php page with an error message
  header("Location:../model/admin/upcomingtrailers/show.php?id=$upcomingtrailersCode&error=Update Error");
}

// Close connection
mysqli_close($con);
