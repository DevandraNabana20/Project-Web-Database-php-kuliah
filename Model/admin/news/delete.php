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
<?php include "../../config/koneksi.php";
$con = db_connect(); ?>
<?php
// Get the newsCode from the URL query parameter
$newsCode = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM news WHERE newsCode = '$newsCode'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$encode = base64_encode($data["newsImage"]);
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
              <form action="../../../Controller/cr_deletenews.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">newsCode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="newsCode" readonly aria-describedby="emailHelp" required value="<?php echo $data["newsCode"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsImage</label>
                  <br>
                  <?php echo "<img width='170px'; src='data:image/jpeg;base64," . $encode . "' />" ?>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsTitle</label>
                  <input readonly type="text" required class="form-control" id="exampleInputPassword1" name="newsTitle" value="<?php echo $data["newsTitle"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsDOR</label>
                  <div class="input-group date" id="datepicker3">
                    <input readonly type="text" required class="form-control" id="exampleInputPassword1" name="newsDOR" value="<?php echo $data['newsDOR']; ?> ">
                    <span class="input-group-append">
                      <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsWriter</label>
                  <input readonly type="text" required class="form-control" id="exampleInputPassword1" name="newsWriter" value="<?php echo $data["newsWriter"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">newsContent</label>
                  <textarea readonly class="form-control" required name="newsContent" id="" cols="30" rows="10"><?php echo $data['newsContent'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">adminCode</label>
                  <input name="adminCode" value="<?php echo $data["adminCode"] ?>" required type="text" readonly class="form-control" id="exampleInputPassword1">
                </div>
                <center>
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <a href="news.php"><button type="button" class="ms-3 btn btn-warning">Cancel</button></a>
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