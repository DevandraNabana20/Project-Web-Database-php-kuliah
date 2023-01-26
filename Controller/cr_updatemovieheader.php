<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$code = explode(" - ", $_POST['movieCode']);
$movCode = $code[0];
$movieCode = mysqli_real_escape_string($con, $movCode);
$genresCode = mysqli_escape_string($con, $_POST['genresCode']);

try {
  // Melakukan validasi terhadap data
  if (empty($movieCode)) {
    header("Location: ../model/admin/movieheader/movieheader.php?error=movieCode cannot be empty!");
    die();
  }
  if (empty($genresCode)) {
    header("Location: ../model/admin/movieheader/movieheader.php?error=genresCode cannot be empty!");
    die();
  }

  // Update the movieCode in the database
  $sql = "UPDATE movieheader SET movieCode='$movieCode', genresCode='$genresCode' WHERE movieCode='$movieCode'";
  mysqli_query($con, $sql);

  // Redirect to the movieheader.php page with a success message
  header("Location:../model/admin/movieheader/movieheader.php?id=$movieCode&update=Update Successfull");
} catch (Exception $e) {
  // Redirect to the movieheader.php page with an error message
  header("Location:../model/admin/movieheader/movieheader.php?id=$movieCode&error=Update Error");
}

// Close connection
mysqli_close($con);
