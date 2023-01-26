<?php
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$newsCode = mysqli_escape_string($con, $_POST['newsCode']);

try {
  // Delete the news from the database
  $sql = "DELETE FROM news WHERE newsCode='$newsCode'";
  mysqli_query($con, $sql);

  // Redirect to the news.php page with a success message
  header("Location: ../model/admin/news/news.php?delete=Delete Successfull");
} catch (Exception $e) {
  // Redirect to the news.php page with an error message
  header("Location: ../model/admin/news/news.php?error=Delete Error");
}

// Close connection
mysqli_close($con);
