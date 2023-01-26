<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:http://localhost/project2/View/login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'include/header.php';
?>
<?php
include 'include/script.php';
?>

<body class="sb-nav-fixed">
  <?php
  include 'include/navbar.php';
  ?>
  <div id="layoutSidenav">
    <?php
    include 'include/side.php';
    ?>

    <?php
    require_once "config/koneksi.php";
    $con = db_connect();
    $movieName     = mysqli_query($con, "SELECT movieName FROM moviedetail order by counter desc limit 10");
    $counter = mysqli_query($con, "SELECT counter FROM moviedetail order by counter desc limit 10");
    ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</h1>
          <?php if (!empty($_GET["update"])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success! </strong><?php echo $_GET["update"]; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">𝙒𝙚𝙡𝙘𝙤𝙢𝙚 𝙩𝙤 𝙢𝙤𝙫𝙞𝙚𝙗𝙚𝙚 𝙙𝙖𝙨𝙝𝙗𝙤𝙖𝙧𝙙 𝙛𝙤𝙧 𝙖𝙙𝙢𝙞𝙣</li>
          </ol>
          <label class="mt-1" style="font-size: 25px;color: lightsalmon;" for="">𝐓𝐨𝐩 𝟏𝟎 𝐕𝐢𝐞𝐰𝐞𝐝 𝐌𝐨𝐯𝐢𝐞𝐬</label>
          <canvas id="myChart" width="35px" height="13px"></canvas>
          <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: [<?php while ($b = mysqli_fetch_array($movieName)) {
                            echo '"' . $b['movieName'] . '",';
                          } ?>],
                datasets: [{
                  label: "Total of Visitors",
                  data: [<?php while ($p = mysqli_fetch_array($counter)) {
                            echo '"' . $p['counter'] . '",';
                          } ?>],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          </script>
        </div>
      </main>
      <?php
      include 'include/footer.php';
      ?>
    </div>
  </div>

</body>

</html>