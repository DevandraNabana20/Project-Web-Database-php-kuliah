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
// Get the movieCode from the URL query parameter
$movieCode = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM moviedetail WHERE movieCode = '$movieCode'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$encode = base64_encode($data["movieImage"]);
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
              <form action="../../../Controller/cr_deletemoviedetail.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieCode</label>
                  <input readonly name="movieCode" required value="<?php echo $data["movieCode"] ?> " type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieImage</label>
                  <br>
                  <?php echo "<img width='170px'; src='data:image/jpeg;base64," . $encode . "' />" ?>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieName</label>
                  <input readonly name="movieName" value="<?php echo $data["movieName"] ?> " required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieRelease</label>
                  <div class="input-group date" id="datepicker1">
                    <input readonly type="text" value="<?php echo $data["movieRelease"] ?> " required class="form-control" id="exampleInputPassword1" name="movieRelease">
                    <span class="input-group-append">
                      <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieLink</label>
                  <textarea readonly class="form-control" required name="movieLink" id="" cols="30" rows="10"><?php echo $data["movieLink"] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieProduction</label>
                  <input readonly name="movieProduction" value="<?php echo $data["movieProduction"] ?> " required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieMinutes</label>
                  <input readonly name="movieMinutes" required value="<?php echo $data["movieMinutes"] ?> " type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieDesc</label>
                  <textarea readonly class="form-control" required name="movieDesc" id="" cols="30" rows="10"><?php echo $data["movieDesc"] ?> </textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieRate</label>
                  <input readonly value="<?php echo $data['movieRate'] ?>" max="10" min="0" name="movieRate" required type="number" step="any" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieDirector</label>
                  <input readonly name="movieDirector" value="<?php echo $data["movieDirector"] ?> " required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieActors</label>
                  <input readonly name="movieActors" value="<?php echo $data["movieActors"] ?> " required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">counter</label>
                  <input readonly name="counter" value="<?php echo $data['counter'] ?>" required type="number" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">adminCode</label>
                  <input readonly name="adminCode" value="<?php echo $data["adminCode"] ?> " required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <center>
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <a href="moviedetail.php"><button type="button" class="ms-3 btn btn-warning">Cancel</button></a>
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