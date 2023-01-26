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
// Get the upcomingtrailersCode from the URL query parameter
$upcomingtrailersCode = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM upcomingtrailers WHERE upcomingtrailersCode = '$upcomingtrailersCode'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
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
          <h1 class="mt-4">UpcomingTrailers</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form action="../../../Controller/cr_updateupcomingtrailer.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">upcomingtrailersCode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="upcomingtrailersCode" readonly aria-describedby="emailHelp" required value="<?php echo $data["upcomingtrailersCode"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieName</label>
                  <input type="text" required class="form-control" id="exampleInputPassword1" name="movieName" value="<?php echo $data["movieName"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">linkTrailer</label>
                  <textarea class="form-control" required name="linkTrailer" id="" cols="30" rows="10"><?php echo $data['linkTrailer'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">adminCode</label>
                  <?php
                  $username = $_SESSION['username'];
                  $admindata = mysqli_query($con, "select adminCode from admin where adminUsername = '$username'");
                  $result12 = mysqli_fetch_assoc($admindata);
                  ?>
                  <input name="adminCode" readonly value="<?php echo $result12['adminCode']; ?>" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <center>
                  <button type="submit" class="btn btn-primary">Update</button>
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