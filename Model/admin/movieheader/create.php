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
$con = db_connect();
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
          <h1 class="mt-4">MovieHeader</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form action="../../../Controller/cr_createmovieheader.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieCode</label>
                  <select required class="form-select" name="movieCode" id="exampleFormControlSelect1">
                    <option value="" selected>Please select movieCode</option>
                    <?php
                    $sql1 = "SELECT movieCode,movieName from moviedetail order by movieCode desc";
                    $result1 = mysqli_query($con, $sql1);
                    ?>
                    <?php
                    if (mysqli_num_rows($result1) > 0) {
                      while ($data1 = mysqli_fetch_assoc($result1)) {
                        echo "<option>" . $data1['movieCode'] . " - " . $data1['movieName'] . "</option>";
                      }
                    } else {
                      echo "No data found";
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">genresCode</label>
                  <select required class="form-select" name="genresCode" id="exampleFormControlSelect1">
                    <option value="" selected>Please select genresCode</option>
                    <option value="G000001">G000001 - Action</option>
                    <option value="G000002">G000002 - Fantasy
                    </option>
                    <option value="G000003">G000003 - Horror</option>
                    <option value="G000004">G000004 - Romance</option>
                  </select>
                  <center class="mt-4">
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
<?php
// Menutup koneksi
mysqli_close($con); ?>

</html>