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
          <h1 class="mt-4">News</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form onsubmit="return validateFile(event)" action="../../../Controller/cr_createnews.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="image-upload" class="form-label">newsImage</label>
                  <input type="file" accept="image/png,image/jpeg" required class="form-control" id="image-upload" name="newsImage">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsTitle</label>
                  <input name="newsTitle" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsDOR</label>
                  <div class="input-group date" id="datepicker">
                    <input type="text" required class="form-control" id="exampleInputPassword1" name="newsDOR">
                    <span class="input-group-append">
                      <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsWriter</label>
                  <input name="newsWriter" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsContent</label>
                  <textarea style="white-space: pre-wrap;" class="form-control" required name="newsContent" id="" cols="30" rows="10"></textarea>
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
                  <button type="submit" class="btn btn-success">Add data</button>
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