<?php
// require the database connection file
require_once "../Model/config/koneksi.php";

$con = db_connect();

// Get the form data
$movieCode = mysqli_escape_string($con, $_POST['movieCode']);
$movieImage = addslashes(file_get_contents($_FILES['movieImage']['tmp_name']));
$movieName = stripslashes(mysqli_escape_string($con, $_POST['movieName']));
$movieRelease = mysqli_escape_string($con, $_POST['movieRelease']);
$movieLink = stripslashes(mysqli_escape_string($con, $_POST['movieLink']));
$movieProduction = mysqli_escape_string($con, $_POST['movieProduction']);
$movieMinutes = mysqli_escape_string($con, $_POST['movieMinutes']);
$movieDesc = stripslashes(mysqli_escape_string($con, $_POST['movieDesc']));
$movieRate = mysqli_escape_string($con, $_POST['movieRate']);
$movieDirector = mysqli_escape_string($con, $_POST['movieDirector']);
$movieActors = mysqli_escape_string($con, $_POST['movieActors']);
$counter = mysqli_escape_string($con, $_POST['counter']);
$adminCode = mysqli_escape_string($con, $_POST['adminCode']);
// Encode HTML special characters in the movieDesc,movieName field
$movieName = htmlspecialchars($movieName);
$movieDesc = htmlspecialchars($movieDesc);

try {
  // Melakukan validasi terhadap data
  if (empty($movieImage)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieImage cannot be empty!");
    die();
  }
  if (empty($movieName)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieName cannot be empty!");
    die();
  }
  if (empty($movieRelease)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieRelease cannot be empty!");
    die();
  }
  if (empty($movieLink)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieLink cannot be empty!");
    die();
  }
  if (empty($movieProduction)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieProduction cannot be empty!");
    die();
  }
  if (empty($movieMinutes)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieMinutes cannot be empty!");
    die();
  }
  if (empty($movieDesc)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieDesc cannot be empty!");
    die();
  }
  if (empty($movieRate)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieRate cannot be empty!");
    die();
  }
  if (empty($movieDirector)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieDirector cannot be empty!");
    die();
  }
  if (empty($movieActors)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=movieActors cannot be empty!");
    die();
  }
  if ($counter > 0) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=counter cannot be greater than 0!");
    die();
  }
  if (empty($adminCode)) {
    header("Location: ../model/admin/moviedetail/show.php?id=$movieCode&error=adminCode cannot be empty!");
    die();
  }

  // Update the moviedetail in the database
  $sql = "UPDATE moviedetail SET movieImage='$movieImage', movieName='$movieName', movieRelease='$movieRelease', movieLink='$movieLink', movieProduction='$movieProduction', movieMinutes='$movieMinutes', movieDesc='$movieDesc', movieRate='$movieRate', movieDirector='$movieDirector', movieActors='$movieActors', counter='$counter', adminCode='$adminCode' WHERE movieCode='$movieCode'";
  mysqli_query($con, $sql);

  // Redirect to the show.php page with a success message
  header("Location:../model/admin/moviedetail/show.php?id=$movieCode&update=Update Successfull");
} catch (Exception $e) {
  // Redirect to the show.php page with an error message
  header("Location:../model/admin/moviedetail/show.php?id=$movieCode&error=Update Error");
}

// Close connection
mysqli_close($con);
