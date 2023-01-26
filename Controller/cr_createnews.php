<?php
require_once "../Model/config/koneksi.php";
$con = db_connect();

// prepare the call to the stored procedure
$stmt = mysqli_prepare($con, 'CALL proc_insert_news_table(?,?,?,?,?,?)');

// bind the parameters to the call
mysqli_stmt_bind_param($stmt, 'ssssss', $newsImage, $newsTitle, $newsDOR, $newsWriter, $newsContent, $adminCode);

// set the values of the parameters
$newsImage = file_get_contents($_FILES['newsImage']['tmp_name']);
$newsTitle = stripslashes(mysqli_escape_string($con, $_POST['newsTitle']));
$newsDOR = mysqli_escape_string($con, $_POST['newsDOR']);
$newsWriter = mysqli_escape_string($con, $_POST['newsWriter']);
$newsContent = stripslashes(nl2br(mysqli_escape_string($con, $_POST['newsContent'])));
$adminCode = mysqli_escape_string($con, $_POST['adminCode']);
// Encode HTML special characters in the newsContent field
$newsTitle = htmlspecialchars($newsTitle);
$newsContent = htmlspecialchars($newsContent);


try {
  // Melakukan validasi terhadap data
  if (empty($newsImage)) {
    header("Location: ../model/admin/news/news.php?error=newsImage cannot be empty!");
    die();
  }
  if (empty($newsTitle)) {
    header("Location: ../model/admin/news/news.php?error=newsTitle cannot be empty!");
    die();
  }
  if (empty($newsDOR)) {
    header("Location: ../model/admin/news/news.php?error=newsDOR cannot be empty!");
    die();
  }
  if (empty($newsWriter)) {
    header("Location: ../model/admin/news/news.php?error=newsWriter cannot be empty!");
    die();
  }
  if (empty($newsContent)) {
    header("Location: ../model/admin/news/news.php?error=newsContent cannot be empty!");
    die();
  }
  if (empty($adminCode)) {
    header("Location: ../model/admin/news/news.php?error=adminCode cannot be empty!");
    die();
  }
  // execute the call
  if (mysqli_stmt_execute($stmt)) {
    // success, redirect the user to a different page
    header('Location: ../model/admin/news/news.php?create=Create Successfull');
    exit;
  } else {
    throw new Exception("Error executing statement");
  }
} catch (Exception $e) {
  // error, redirect the user to a different page
  header('Location: ../model/admin/news/news.php?error=Create Error');
  exit;
}

// close the statement
mysqli_stmt_close($stmt);


// close the connection
mysqli_close($con);
