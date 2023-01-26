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
          <h1 class="mt-4">Audit</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Audit</li>
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
                    <th>auditID</th>
                    <th>adminCode</th>
                    <th>activity</th>
                    <th>created_at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "../../config/koneksi.php";
                  $con = db_connect();
                  $sql = "SELECT * FROM audit";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data untuk setiap baris
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "
                        <td>" . $row["auditID"] . "</td>
                        <td>" . $row["adminCode"] . "</td>
                        <td>" . $row["activity"] . "</td>
                        <td>" . $row["created_at"] . "</td>
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