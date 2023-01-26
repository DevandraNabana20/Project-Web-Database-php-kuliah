<?php
require_once "../Model/config/koneksi.php";
$con = db_connect();

// prepare the call to the stored procedure
$stmt = mysqli_prepare($con, 'CALL proc_insert_moviedetail_table(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

// bind the parameters to the call
mysqli_stmt_bind_param($stmt, 'ssssssssssss', $movieImage, $movieName, $movieRelease, $movieLink, $movieProduction, $movieMinutes, $movieDesc, $movieRate, $movieDirector, $movieActors, $counter, $adminCode);

// set the values of the parameters
$movieImage = file_get_contents($_FILES['movieImage']['tmp_name']);
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
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieImage cannot be empty!");
    die();
  }
  if (empty($movieName)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieName cannot be empty!");
    die();
  }
  if (empty($movieRelease)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieRelease cannot be empty!");
    die();
  }
  if (empty($movieLink)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieLink cannot be empty!");
    die();
  }
  if (empty($movieProduction)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieProduction cannot be empty!");
    die();
  }
  if (empty($movieMinutes)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieMinutes cannot be empty!");
    die();
  }
  if (empty($movieDesc)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieDesc cannot be empty!");
    die();
  }
  if (empty($movieRate)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieRate cannot be empty!");
    die();
  }
  if (empty($movieDirector)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieDirector cannot be empty!");
    die();
  }
  if (empty($movieActors)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=movieActors cannot be empty!");
    die();
  }
  if ($counter > 0) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=counter cannot be greater than 0!");
    die();
  }
  if (empty($adminCode)) {
    header("Location: ../model/admin/moviedetail/moviedetail.php?error=adminCode cannot be empty!");
    die();
  }
  // execute the call
  if (mysqli_stmt_execute($stmt)) {
    // success, redirect the user to a different page
    header('Location: ../model/admin/moviedetail/moviedetail.php?create=Create Successfull');
    exit;
  } else {
    throw new Exception("Error executing statement");
  }
} catch (Exception $e) {
  // error, redirect the user to a different page
  header('Location: ../model/admin/moviedetail/moviedetail.php?error=Create Error');
  exit;
}

// close the statement
mysqli_stmt_close($stmt);


// close the connection
mysqli_close($con);
