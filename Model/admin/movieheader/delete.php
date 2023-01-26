<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:http://localhost/project2/View/login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../include/header.php';
?>
<?php require_once "../../config/koneksi.php";
$con = db_connect(); ?>
<?php
// Get the movieCode & genresCode from the URL query parameter
$movieCode = isset($_GET['id']) ? $_GET['id'] : '';
$genresCode = isset($_GET['genresCode']) ? $_GET['genresCode'] : '';
$sql = "SELECT * FROM movieheader join genres on movieheader.genresCode = genres.genresCode WHERE movieCode = '$movieCode'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$result2 = mysqli_query($con, "SELECT movieName from moviedetail where movieCode = '$movieCode'");
$data2 = mysqli_fetch_assoc($result2);
?>

<body class="sb-nav-fixed">
  <?php
  include '../../include/navbar.php';
  ?>
  <div id="layoutSidenav">
    <?php
    include '../../include/side.php';
    ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Delete Confirmation</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Delete data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form action="../../../Controller/cr_deletemovieheader.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">movieCode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="movieCode" readonly
                    aria-describedby="emailHelp" required
                    value="<?php echo $data["movieCode"] . ' - ' . $data2["movieName"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">genresCode</label>
                  <input readonly name="genresCode"
                    value="<?php echo $data["genresCode"] . ' - ' . $data["genresName"] ?>" required type="text"
                    class="form-control" id="exampleInputPassword1">
                </div>
                <center>
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <a href="movieheader.php"><button type="button" class="ms-3 btn btn-warning">Cancel</button></a>
                </center>
              </form>
            </div>
          </div>
        </div>
      </main>
      <?php
      include '../../include/footer.php';
      ?>
    </div>
  </div>
  <?php
  include '../../include/script.php';
  ?>
</body>

</html>