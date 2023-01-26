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
          <h1 class="mt-4">
            <?php
            // Get the movieCode from the URL query parameter
            $movieCode = isset($_GET['id']) ? $_GET['id'] : '';
            $sqlgetname = "SELECT movieName,movieRelease FROM moviedetail WHERE movieCode = '$movieCode'";
            $result1 = mysqli_query($con, $sqlgetname);
            $row1 = mysqli_fetch_assoc($result1);
            if (!empty($row1)) {
              echo $row1["movieName"] . " (" . $row1["movieRelease"] . ")";
            } else {
              echo "";
            }
            ?>
          </h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
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
            </div>
            <div class="card-body">
              <table id="datatablesSimple" style="width: 100%;">
                <thead class="table-dark">
                  <tr>
                    <th>movieCode</th>
                    <th>movieImage</th>
                    <th>movieName</th>
                    <th>movieRelease</th>
                    <th>movieLink</th>
                    <th>movieProduction</th>
                    <th>movieMinutes</th>
                    <th>movieDesc</th>
                    <th>movieRate</th>
                    <th>movieDirector</th>
                    <th>movieActors</th>
                    <th>counter</th>
                    <th>adminCode</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Select the movie with the specified movieCode
                  $sql = "SELECT * FROM moviedetail WHERE movieCode = '$movieCode'";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // Output data for the movie
                    $row = mysqli_fetch_assoc($result);
                    $encode = base64_encode($row["movieImage"]);
                    echo "<tr>
                    <td>" . $row["movieCode"] . "</td>
                    <td><img width='170px'; src='data:image/jpeg;base64," . $encode . "' /></td>
                    <td>" . $row["movieName"] . "</td>
                    <td>" . $row["movieRelease"] . "</td>
                    <td>" . $row["movieLink"] . "</td>
                    <td>" . $row["movieProduction"] . "</td>
                    <td>" . $row["movieMinutes"] . "</td>
                    <td>" . $row["movieDesc"] . "</td>
                    <td>" . $row["movieRate"] . "</td>
                    <td>" . $row["movieDirector"] . "</td>
                    <td>" . $row["movieActors"] . "</td>
                    <td>" . $row["counter"] . "</td>
                    <td>" . $row["adminCode"] . "</td>
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
  <script>
    $(document).ready(function() {
      $('#datatablesSimple').dataTable({
        destroy: true,
        paging: false,
        searching: false,
        "scrollX": true,
      });
    });
  </script>
</body>


</html>