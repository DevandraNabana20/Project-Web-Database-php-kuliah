<?php
require_once "../Model/config/koneksi.php";
$con = db_connect();

// prepare the call to the stored procedure
$stmt = mysqli_prepare($con, 'CALL proc_insert_movieheader_table(?, ?)');

// bind the parameters to the call
mysqli_stmt_bind_param($stmt, 'ss', $movieCode, $genresCode);

// set the values of the parameters
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
  // execute the call
  if (mysqli_stmt_execute($stmt)) {
    // success, redirect the user to a different page
    header('Location: ../model/admin/movieheader/movieheader.php?create=Create Successfull');
    exit;
  } else {
    throw new Exception("Error executing statement");
  }
} catch (Exception $e) {
  // error, redirect the user to a different page
  header('Location: ../model/admin/movieheader/movieheader.php?error=Create Error');
  exit;
}

// close the statement
mysqli_stmt_close($stmt);

// close the connection
mysqli_close($con);
