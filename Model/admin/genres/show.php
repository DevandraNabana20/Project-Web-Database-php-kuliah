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
          <h1 class="mt-4">
            Genres
          </h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead class="table-dark">
                  <tr>
                    <th>genresCode</th>
                    <th>genresName</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Get the genresCode from the URL query parameter
                  $genresCode = isset($_GET['id']) ? $_GET['id'] : '';
                  // Select the genres with the specified genresCode
                  $sql = "SELECT * FROM genres WHERE genresCode = '$genresCode'";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    // Output data for the genres
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>
                    <td>" . $row["genresCode"] . "</td>
                    <td>" . $row["genresName"] . "</td>
                  </tr>";
                  } else {
                    echo "No data found";
                  }

                  // Close connection
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
<script>
  $(document).ready(function() {
    $('#datatablesSimple').dataTable({
      destroy: true,
      paging: false,
      searching: false
    });
  });
</script>

</html>