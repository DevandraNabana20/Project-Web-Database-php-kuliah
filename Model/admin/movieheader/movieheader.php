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
          <h1 class="mt-4">MovieHeader</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">MovieHeader</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div style="text-align: left;" class="mt-3 ms-3">
              <a href="create.php"><button style="font-size: 20px; border-radius: 15px;" class="btn btn-success"><i class="bi bi-plus-lg"></i> Add Data</button></a>
            </div>
            <div class="mt-3">
              <!--For update message -->
              <?php if (!empty($_GET["error"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed! </strong><?php echo $_GET["error"]; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <?php if (!empty($_GET["update"])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success! </strong><?php echo $_GET["update"]; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <!-- For delete message -->
              <?php if (!empty($_GET["delete"])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success! </strong><?php echo $_GET["delete"]; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <!-- For create message -->
              <?php if (!empty($_GET["create"])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success! </strong><?php echo $_GET["create"]; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead class="table-dark">
                  <tr>
                    <th>movieCode</th>
                    <th>genresCode</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "../../config/koneksi.php";
                  $con = db_connect();
                  $sql = "SELECT movieheader.movieCode,moviedetail.movieName,movieheader.genresCode,genres.genresName FROM movieHeader JOIN moviedetail on moviedetail.movieCode=movieheader.movieCode JOIN genres on genres.genresCode=movieheader.genresCode";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data untuk setiap baris
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>
                        <td onclick='location.href = \"../moviedetail/show.php?id=" . $row["movieCode"] . "\"'>" . $row["movieCode"] . ' - ' . $row["movieName"] . "</td>
                        <td onclick='location.href = \"../genres/show.php?id=" . $row["genresCode"] . "\"'>" . $row["genresCode"] . ' - ' . $row["genresName"] . "</td>
                        <td><center>
                        <a href='update.php?id=" . $row["movieCode"] . "'><i class='fas fa-edit'></i></a>
                        <a href='delete.php?id=" . $row["movieCode"] . "&amp;genresCode=" . $row["genresCode"] . "'><i class='fas fa-trash'></i></a></center>
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