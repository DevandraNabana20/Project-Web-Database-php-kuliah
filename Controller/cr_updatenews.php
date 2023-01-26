<?php
// require the database connection file
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$newsCode = mysqli_escape_string($con, $_POST['newsCode']);
$newsImage = addslashes(file_get_contents($_FILES['newsImage']['tmp_name']));
$newsTitle = stripslashes(mysqli_escape_string($con, $_POST['newsTitle']));
$newsDOR = mysqli_escape_string($con, $_POST['newsDOR']);
$newsWriter = mysqli_escape_string($con, $_POST['newsWriter']);
$newsContent = nl2br(mysqli_real_escape_string($con, $_POST['newsContent']));
$adminCode = mysqli_escape_string($con, $_POST['adminCode']);
// Encode HTML special characters in the newsContent field
$newsTitle = htmlspecialchars($newsTitle);
$newsContent = htmlspecialchars($newsContent);

try {
  // Melakukan validasi terhadap data
  if (empty($newsImage)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=newsImage cannot be empty!");
    die();
  }
  if (empty($newsTitle)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=newsTitle cannot be empty!");
    die();
  }
  if (empty($newsDOR)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=newsDOR cannot be empty!");
    die();
  }
  if (empty($newsWriter)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=newsWriter cannot be empty!");
    die();
  }
  if (empty($newsContent)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=newsContent cannot be empty!");
    die();
  }
  if (empty($adminCode)) {
    header("Location: ../model/admin/news/show.php?id=$newsCode&error=adminCode cannot be empty!");
    die();
  }

  // Update the news in the database
  $sql = "UPDATE news SET newsImage='$newsImage', newsTitle='$newsTitle', newsDOR='$newsDOR', newsWriter='$newsWriter', newsContent='$newsContent', adminCode='$adminCode' WHERE newsCode='$newsCode'";
  mysqli_query($con, $sql);

  // Redirect to the show.php page with a success message
  header("Location:../model/admin/news/show.php?id=$newsCode&update=Update Successfull");
} catch (Exception $e) {
  // Redirect to the show.php page with an error message
  header("Location:../model/admin/news/show.php?id=$newsCode&error=Update Error");
}

// Close connection
mysqli_close($con);
