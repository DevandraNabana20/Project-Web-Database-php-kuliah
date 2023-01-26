<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:http://localhost/project2/View/login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../include/header.php';
?>

<body class="sb-nav-fixed">
  <?php
  include '../include/navbar.php';
  ?>
  <div id="layoutSidenav">
    <?php
    include '../include/side.php';
    ?>

    <?php
    require_once "../config/koneksi.php";
    $con = db_connect();

    ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Change Password For adminUser : <?php echo $_SESSION['username']; ?></h1>
          <!--For error update message -->
          <?php if (!empty($_GET["error"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed! </strong><?php echo $_GET["error"]; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <form method="post" action="../../Controller/cr_changepassword.php">
            <div class="form-group mt-4">
              <input hidden type="text" name="adminName" value="<?php echo $_SESSION['username']; ?>">
              <label for="password">New Password</label>
              <div class="input-group mt-1">
                <input type="password" class="form-control" required id="password" name="password" placeholder="Enter your new password">
                <div class="input-group-append">
                  <span style="font-size: 25px;cursor: pointer;" class="input-group-text" id="togglePassword"><i class="fa fa-eye"></i></span>
                </div>
              </div>

              <div class="form-group mt-4">
                <label for="repassword">Re-Password</label>
                <div class="input-group mt-1">
                  <input type="password" class="form-control" required id="repassword" name="repassword" placeholder="Retype your new password">
                  <div class="input-group-append">
                    <span style="font-size: 25px;cursor: pointer;" class="input-group-text" id="toggleRePassword"><i class="fa fa-eye"></i></span>
                  </div>
                </div>

          </form>
          <button type="submit" class="btn btn-primary mt-3">Update Password</button>
        </div>
      </main>
      <?php
      include '../include/footer.php';
      ?>
    </div>
  </div>
  <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
      var x = document.getElementById("password");
      var y = document.getElementById("togglePassword");
      if (x.type === "password") {
        x.type = "text";
        y.innerHTML = '<i class="fa fa-eye-slash"></i>';
      } else {
        x.type = "password";
        y.innerHTML = '<i class="fa fa-eye"></i>';
      }
    });

    document.getElementById("toggleRePassword").addEventListener("click", function() {
      var x = document.getElementById("repassword");
      var y = document.getElementById("toggleRePassword");
      if (x.type === "password") {
        x.type = "text";
        y.innerHTML = '<i class="fa fa-eye-slash"></i>';
      } else {
        x.type = "password";
        y.innerHTML = '<i class="fa fa-eye"></i>';
      }
    });
  </script>
</body>
<?php
include '../include/script.php';
?>

</html>