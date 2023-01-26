<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MovieBee.com/Login for admin</title>
  <link rel="icon" href="assets/logo.ico" type="image/icon type">

  <!--Link eksternal bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!--link bootstrap icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!--custom css-->
  <link rel="stylesheet" href="css/login.css">

  <!--link animate css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!--Link eksternal font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

  <!--Box icons-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <!--Navbar-->
  <section>
    <nav style="background-color: #0a0809;" class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top">
      <div class="container">
        <a style="color: #f5176c; animation-duration: 10s; animation-delay: 5s;" class="navbar-brand animate__animated animate__headShake animate__infinite" href="index.php">Movie<span style="color: rgb(238, 153, 43);">Bee</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a style="color: #EF2F88;" class="nav-link active home" aria-current="page" href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
              <a style="color: #EF2F88;" class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-folder-open"></i> Genres
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="action.php">Action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="horror.php">Horror</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="fantasy.php">Fantasy</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
            </li>
            <li><a class="dropdown-item" href="romance.php">Romance</a></li>
            <li>
          </ul>
          </li>
          <li class="nav-item">
            <a style="color: #EF2F88;" class="nav-link active" aria-current="page" href="trendingmovies.php"><i class="fa-solid fa-fire"></i> Trending Movies</a>
          </li>
          <li class="nav-item">
            <a style="color: #EF2F88;" class="nav-link active" href="news-blog.php"><i class="fa-solid fa-newspaper"></i></i> News/Blog</a>
          </li>
          </ul>
          <a href="login.php"><button type="button" class="btn btn-danger"><i class="fa-solid fa-right-to-bracket"></i>
              Login</button></a>
        </div>
      </div>
    </nav>
  </section>
  <!--Navbar-->

  <!-- login -->

  <section>
    <div class="container-fluid p-3 mt-5">
      <div class="row">
        <div class="bg-image" style="background-image: url('assets/output-onlinepngtools.png');">
          <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
            <div class="card bg-dark border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h2 class="card-title text-center mb-5 fw-bold text-white" style="font-family: cursive;">Login for Admin
                </h2>
                <?php
                if (isset($_GET['pesan'])) {
                  if ($_GET['pesan'] == "gagal") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Login Failed!</strong> Wrong Username and Password!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                  } else if ($_GET['pesan'] == "logout") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Log Out Success!</strong> You have successfully logged out
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                  } else if ($_GET['pesan'] == "belum_login") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>You must be logged in to access the admin dashboard page!!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                  }
                }
                ?>
                <form style="height: 200px;" method="post" action="proses_login.php">
                  <div class="input-group mb-3">
                    <input class="form-control" id="username" name="username" placeholder="Username" type="text" value="" required>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required>
                    <span class="input-group-text">
                      <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                    </span>
                  </div>
                  <div class="d-grid">
                    <button class="mt-3 btn btn-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- login -->


  <!-- Footer -->
  <section>
    <footer style="background-color: #0e0d0d;" class="text-white pt-5 pb-4">
      <div class="container text-center">
        <div class="row text-center">
          <div class="col-sm-3 mx-auto mt-3">
            <a style="text-decoration: none;" href="index.php">
              <h5 class=" mb-4 font-weight-bold judul" style="color: rgb(238, 153, 43) ;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 900;">
                <span class="judul" style="color:#f5176c">Movie</span>Bee
              </h5>
            </a>
            <p>MovieBee is a website that provides free movie and tv series streaming services.
            </p>
          </div>

          <div class="col-sm-3 mx-auto mt-3">
            <h5 Services class="text-uppercase mb-4 font-weight-bold" style="color:rgb(238, 153, 43)">
              Services </h5>
            <p class="Judul2">
              <a href="index.php" style="text-decoration: none; color: #fff">Home</a>
            </p>
            <p class="Judul2">
              <a href="trendingmovies.php" style="text-decoration: none; color:#fff">Trending Movies</a>
            </p>
            <p class="Judul2">
              <a href="genres.php" style="text-decoration: none; color:#fff">Genres</a>
            </p>
            <p class="Judul2">
              <a href="news-blog.php" style="text-decoration: none; color:#ffff">News/Blog</a>
            </p>
          </div>


          <div class="col-sm-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(238, 153, 43)">Genres</h5>
            <div class="description2">
              <p class="Judul2">
                <a href="horror.php" style="text-decoration: none; color:#ffff">Horror</a>
              </p>
              <p class="Judul2">
                <a href="fantasy.php" style="text-decoration: none; color:#fff">Fantasy</a>
              </p>
              <p class="Judul2">
                <a href="romance.php" style="text-decoration: none; color:#ffff">Romance</a>
              </p>
              <p class="Judul2">
                <a href="action.php" style="text-decoration: none; color:#ffff">Action</a>
              </p>
            </div>
          </div>

          <div class="col-sm-3 mt-3">
            <div class="content">
              <h5 class="text-uppercase font-weight-bold" style="color:rgb(238, 153, 43)">Download app
              </h5><br>
              <a href="#">
                <img class="img-fluid" src="assets/app-store-png-logo-33123 (3).png" alt="">
              </a>
            </div>
          </div>
        </div>

        <hr class="mb-4">
        <div class="row">
          <div class="col-sm-12 text-center">
            <p> &copy; Copyright 2022 All right reserved by
              <a href="index.php" style="text-decoration: none;">
                <strong style="color: #f5176c"> Movie<span style="color: rgb(238, 153, 43)">Bee.com</span></strong></a>
            </p>
          </div>
          <div class="col-sm-12 text-center">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px; border-radius: 50%;"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-google-plus"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-youtube"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-linkedin"></i></a>
              </li>
            </ul>

          </div>
        </div>


      </div>

    </footer>
  </section>
  <!-- Footer -->


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


  <!--link java script -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="java script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>