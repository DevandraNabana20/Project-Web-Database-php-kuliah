<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$code = explode(" - ", $_POST['movieCode']);
$movCode = $code[0];
$code1 = explode(" - ", $_POST['genresCode']);
$genCode = $code1[0];
$movieCode = mysqli_real_escape_string($con, $movCode);
$genresCode = mysqli_real_escape_string($con, $genCode);

try {
  // Delete the movieheader from the database
  $sql = "DELETE FROM movieheader WHERE movieCode='$movieCode'and genresCode='$genresCode'";
  mysqli_query($con, $sql);

  // Redirect to the movieheader.php page with a success message
  header("Location: ../model/admin/movieheader/movieheader.php?delete=Delete Successfull");
} catch (Exception $e) {
  // Redirect to the movieheader.php page with an error message
  header("Location: ../model/admin/movieheader/movieheader.php?error=Delete Error");
}

// Close connection
mysqli_close($con);