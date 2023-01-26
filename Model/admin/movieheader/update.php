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

$result2 = mysqli_query($con, "SELECT * from movieheader where movieCode = '$movieCode'");
$data2 = mysqli_fetch_assoc($result2);
$genres = $data2["genresCode"];
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
            <li class="breadcrumb-item active">Update data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form action="../../../Controller/cr_updatemovieheader.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">movieCode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="movieCode" readonly
                    aria-describedby="emailHelp" required
                    value="<?php echo $data["movieCode"] . ' - ' . $data["movieName"] ?> ">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">genresCode</label>
                  <select required class="form-select" name="genresCode" id="exampleFormControlSelect1">
                    <option value="G000001" <?php if ($genres == "G000001") echo "selected" ?>>G000001 - Action</option>
                    <option value="G000002" <?php if ($genres == "G000002") echo "selected" ?>>G000002 - Fantasy
                    </option>
                    <option value="G000003" <?php if ($genres == "G000003") echo "selected" ?>>G000003 - Horror</option>
                    <option value="G000004" <?php if ($genres == "G000004") echo "selected" ?>>G000004 - Romance
                    </option>
                  </select>
                  <center class="mt-4">
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