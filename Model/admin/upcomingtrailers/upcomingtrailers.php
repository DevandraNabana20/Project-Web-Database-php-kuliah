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
            <li class="breadcrumb-item active">UpcomingTrailers</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="mt-3">
              <!-- For error message -->
              <?php if (!empty($_GET["error"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed! </strong><?php echo $_GET["error"]; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead class="table-dark">
                  <tr>
                    <th>upcomingtrailersCode</th>
                    <th>movieName</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "../../config/koneksi.php";
                  $con = db_connect();
                  $sql = "SELECT * FROM upcomingtrailers";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data untuk setiap baris
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr onclick='location.href = \"show.php?id=" . $row["upcomingtrailersCode"] . "\"'>
                        <td>" . $row["upcomingtrailersCode"] . "</td>
                        <td>" . $row["movieName"] . "</td>
                        <td><center>
                        <a href='update.php?id=" . $row["upcomingtrailersCode"] . "'><i class='fas fa-edit'></i></a>
                        </center>
                      </td>
                      </tr>";
                    }
                  } else {
                    echo "No data found";
                  }

                  // Menutup koneksi
                  mysqli_close($con);
                  ?>
                </tbody>
              </table>
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