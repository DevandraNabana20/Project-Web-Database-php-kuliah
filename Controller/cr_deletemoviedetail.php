<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$movieCode = mysqli_escape_string($con, $_POST['movieCode']);

try {
  // Delete the moviedetail from the database
  $sql = "DELETE FROM moviedetail WHERE movieCode='$movieCode'";
  mysqli_query($con, $sql);

  // Redirect to the moviedetail.php page with a success message
  header("Location: ../model/admin/moviedetail/moviedetail.php?delete=Delete Successfull");
} catch (Exception $e) {
  // Redirect to the moviedetail.php page with an error message
  header("Location: ../model/admin/moviedetail/moviedetail.php?error=Delete Error");
}

// Close connection
mysqli_close($con);
