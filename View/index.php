<!-- koneksi ke database-->
<?php
include('../model/config/koneksi.php');
$con = db_connect();
// SQL TRENDING MOVIES
$sqltrending = "SELECT DISTINCT moviedetail.movieCode, moviedetail.movieImage,moviedetail.movieName,moviedetail.movieRelease,moviedetail.movieLink,moviedetail.movieProduction,moviedetail.movieMinutes,moviedetail.movieDesc,moviedetail.movieRate,moviedetail.movieDirector,moviedetail.movieActors,moviedetail.counter FROM movieheader join moviedetail on moviedetail.movieCode = movieheader.movieCode join genres on genres.genresCode = movieheader.genresCode ORDER BY `moviedetail`.`counter` DESC LIMIT 8";
$resulttrending = mysqli_query($con, $sqltrending);

// SQL ACTION MOVIES
$sqlaction = "SELECT moviedetail.movieCode, moviedetail.movieImage,moviedetail.movieName,moviedetail.movieRelease,moviedetail.movieLink,moviedetail.movieProduction,moviedetail.movieMinutes,moviedetail.movieDesc,moviedetail.movieRate,moviedetail.movieDirector,moviedetail.movieActors,moviedetail.counter,genres.genresName FROM movieheader join moviedetail on moviedetail.movieCode = movieheader.movieCode join genres on genres.genresCode = movieheader.genresCode where genresName = 'Action' ORDER BY `moviedetail`.`movieRelease` DESC LIMIT 8";
$resultaction = mysqli_query($con, $sqlaction);

// SQL FANTASY MOVIES
$sqlfantasy = "SELECT moviedetail.movieCode, moviedetail.movieImage,moviedetail.movieName,moviedetail.movieRelease,moviedetail.movieLink,moviedetail.movieProduction,moviedetail.movieMinutes,moviedetail.movieDesc,moviedetail.movieRate,moviedetail.movieDirector,moviedetail.movieActors,moviedetail.counter,genres.genresName FROM movieheader join moviedetail on moviedetail.movieCode = movieheader.movieCode join genres on genres.genresCode = movieheader.genresCode where genresName = 'Fantasy' ORDER BY `moviedetail`.`movieRelease` DESC LIMIT 8";
$resultfantasy = mysqli_query($con, $sqlfantasy);

//SQL ROMANCE MOVIES
$sqlromance = "SELECT moviedetail.movieCode, moviedetail.movieImage,moviedetail.movieName,moviedetail.movieRelease,moviedetail.movieLink,moviedetail.movieProduction,moviedetail.movieMinutes,moviedetail.movieDesc,moviedetail.movieRate,moviedetail.movieDirector,moviedetail.movieActors,moviedetail.counter,genres.genresName FROM movieheader join moviedetail on moviedetail.movieCode = movieheader.movieCode join genres on genres.genresCode = movieheader.genresCode where genresName = 'Romance' ORDER BY `moviedetail`.`movieRelease` DESC LIMIT 8";
$resultromance = mysqli_query($con, $sqlromance);

// SQL HORROR MOVIES
$sqlhorror = "SELECT moviedetail.movieCode, moviedetail.movieImage,moviedetail.movieName,moviedetail.movieRelease,moviedetail.movieLink,moviedetail.movieProduction,moviedetail.movieMinutes,moviedetail.movieDesc,moviedetail.movieRate,moviedetail.movieDirector,moviedetail.movieActors,moviedetail.counter,genres.genresName FROM movieheader join moviedetail on moviedetail.movieCode = movieheader.movieCode join genres on genres.genresCode = movieheader.genresCode where genresName = 'Horror' ORDER BY `moviedetail`.`movieRelease` DESC LIMIT 8";
$resulthorror = mysqli_query($con, $sqlhorror);

// SQL UPCOMING TRAILERS
$sqlupcomingtrailers = "SELECT * from upcomingtrailers ORDER BY upcomingtrailersCode DESC LIMIT 2";
$resultUT = mysqli_query($con, $sqlupcomingtrailers);

// SQL NEWS
$sqlnews = "SELECT * from news ORDER BY newsCode desc LIMIT 2";
$resultnews = mysqli_query($con, $sqlnews);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MovieBee.com</title>
  <link rel="icon" href="assets/logo.ico" type="image/icon type">

  <!--Link eksternal bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!--link bootstrap icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!--custom css-->
  <link rel="stylesheet" href="css/styles.css">

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
            <a style="color: #EF2F88;" class="nav-link active" href="news-blog.php"><i class="fa-solid fa-newspaper"></i></i>
              News/Blog</a>
          </li>
          </ul>
          <a href="login.php"><button type="button" class="btn btn-danger"><i class="fa-solid fa-right-to-bracket"></i>
              Login</button></a>
        </div>
      </div>
    </nav>
  </section>
  <!--Navbar-->

  <!--Caraousel-->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div style="margin-top: 56px;" class="col-sm-12">
          <div id="carouselExampleCaptions" class="carousel slide rounded-5 shadow-4-strong" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active"><a href="action.php">
                  <img src="assets/action.jpg" class="d-block w-100 img-fluid" data-bs-interval="1000" alt="gambar">
                  <div class="carousel-caption d-block h-50">
                    <h5 class="animate__animated animate__fadeInDown animate__delay-0.4s">Action Movies</h5>
                </a>
              </div>
            </div>
            <div class=" carousel-item"><a href="horror.php">
                <img src="assets/horror.jpg" class="d-block w-100 img-fluid" data-bs-interval="1000" alt="gambar">
                <div class="carousel-caption d-block h-50">
                  <h5 class="animate__animated animate__fadeInDown animate__delay-0.4s">Horror Movies</h5>
              </a>
            </div>
          </div>
          <div class="carousel-item"><a href="fantasy.php">
              <img src="assets/fantasy.jpg" class="d-block w-100 img-fluid" data-bs-interval="1000" alt="gambar">
              <div class="carousel-caption d-block h-50">
                <h5 class="animate__animated animate__fadeInDown animate__delay-0.4s">Fantasy Movies</h5>
            </a>
          </div>
        </div>
        <div class="carousel-item"><a href="romance.php">
            <img src="assets/romance2.jpg" class="d-block w-100 img-fluid" data-bs-interval="1000" alt="gambar">
            <div class="carousel-caption d-block h-50">
              <h5 class="animate__animated animate__fadeInDown animate__delay-0.4s">Romance Movies</h5>
          </a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>
    </div>
    </div>
    </div>
  </section>
  <!--Caraousel-->

  <!-- search -->
  <section>
    <div class="container p-3">
      <div class="row">
        <form action="search.php" method="post">
          <div class="col-sm-12">
            <div class="input-group">
              <input name="search" style="background-color: black; color: white;" type="search" class="form-control rounded" placeholder="Search movie in here!" role="search" aria-label="Search" aria-describedby="search-addon" required />
              <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </form>
      </div>
    </div>
    </div>
  </section>
  <!-- search -->

  <!-- Trending Movies title-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <i style="color: #EF2F88; font-size: 25px;" class="fa-solid fa-fire">
            <span class="title">Trending Movies</span>
          </i>
          <span class="title float-end"><a href="trendingmovies.php"><button class="btn btn-warning">See
                all</button></a>
          </span>
        </div>
      </div>
    </div>
  </section>
  <!-- Trending Movies title-->

  <!--Trending Movies slider  -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php if (mysqli_num_rows($resulttrending) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($resulttrending)) {
                  $movieCode = $data['movieCode'];
                  $movieImage = $data['movieImage'];
                  $movieName = $data['movieName'];
                  $movieRelease = $data['movieRelease'];
                  $image_data = base64_encode($data['movieImage']);
                ?>
                  <div class="swiper-slide"><a href="show.php?id=<?php echo $movieCode ?>">
                      <div class="card text-bg-dark">
                        <img src="data:image/jpeg;base64,<?php echo $image_data ?>" class="card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title"><i class="fa-solid fa-play"></i></h5>
                          <h5 class="card-title"><?php echo $movieName . ' (' . $movieRelease . ')' ?></h5>
                        </div>
                      </div>
                    </a></div>
              <?php
                }
              } else {
                echo '<center><h1 style="color: white;">No data found</h1></center>';
              }
              ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!--Trending Movies slider  -->

  <!-- Action Movies title-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <span class="title">| <i class="fa-sharp fa-solid fa-gun"></i> Action Movies |</span>
          <span class="title float-end"><a href="action.php"><button class="btn btn-warning">See all</button></a>
          </span>
        </div>
      </div>
    </div>
  </section>
  <!-- Action Movies title-->

  <!-- Action Movies slider  -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php if (mysqli_num_rows($resultaction) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($resultaction)) {
                  $movieCode = $data['movieCode'];
                  $movieImage = $data['movieImage'];
                  $movieName = $data['movieName'];
                  $movieRelease = $data['movieRelease'];
                  $image_data = base64_encode($data['movieImage']);
                ?>
                  <div class="swiper-slide"><a href="show.php?id=<?php echo $movieCode ?>">
                      <div class="card text-bg-dark">
                        <img src="data:image/jpeg;base64,<?php echo $image_data ?>" class="card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title"><i class="fa-solid fa-play"></i></h5>
                          <h5 class="card-title"><?php echo $movieName . ' (' . $movieRelease . ')' ?></h5>
                        </div>
                      </div>
                    </a></div>
              <?php
                }
              } else {
                echo '<center><h1 style="color: white;">No data found</h1></center>';
              }
              ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!-- Action Movies slider  -->

  <!-- Fantasy Movies title-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <span class="title">| <i class="fa-sharp fa-solid fa-wand-magic-sparkles"></i> Fantasy Movies |</span>
          <span class="title float-end"><a href="fantasy.php"><button class="btn btn-warning">See all</button></a>
          </span>
        </div>
      </div>
    </div>
  </section> <!-- Fantasy Movies title-->

  <!-- Fantasy Movies slider  -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php if (mysqli_num_rows($resultfantasy) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($resultfantasy)) {
                  $movieCode = $data['movieCode'];
                  $movieImage = $data['movieImage'];
                  $movieName = $data['movieName'];
                  $movieRelease = $data['movieRelease'];
                  $image_data = base64_encode($data['movieImage']);
                ?>
                  <div class="swiper-slide"><a href="show.php?id=<?php echo $movieCode ?>">
                      <div class="card text-bg-dark">
                        <img src="data:image/jpeg;base64,<?php echo $image_data ?>" class="card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title"><i class="fa-solid fa-play"></i></h5>
                          <h5 class="card-title"><?php echo $movieName . ' (' . $movieRelease . ')' ?></h5>
                        </div>
                      </div>
                    </a></div>
              <?php
                }
              } else {
                echo '<center><h1 style="color: white;">No data found</h1></center>';
              }
              ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!-- Fantasy Movies slider  -->


  <!-- Romance Movies title-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <span class="title">| <i class="fa-sharp fa-solid fa-heart"></i> Romance Movies |</span>
          <span class="title float-end"><a href="romance.php"><button class="btn btn-warning">See all</button></a>
          </span>
        </div>
      </div>
    </div>
  </section> <!-- Romance Movies title-->

  <!-- Romance Movies slider  -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php if (mysqli_num_rows($resultromance) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($resultromance)) {
                  $movieCode = $data['movieCode'];
                  $movieImage = $data['movieImage'];
                  $movieName = $data['movieName'];
                  $movieRelease = $data['movieRelease'];
                  $image_data = base64_encode($data['movieImage']);
                ?>
                  <div class="swiper-slide"><a href="show.php?id=<?php echo $movieCode ?>">
                      <div class="card text-bg-dark">
                        <img src="data:image/jpeg;base64,<?php echo $image_data ?>" class="card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title"><i class="fa-solid fa-play"></i></h5>
                          <h5 class="card-title"><?php echo $movieName . ' (' . $movieRelease . ')' ?></h5>
                        </div>
                      </div>
                    </a></div>
              <?php
                }
              } else {
                echo '<center><h1 style="color: white;">No data found</h1></center>';
              }
              ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!-- Romance Movies slider  -->


  <!-- Horror Movies title-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <span class="title">| <i class="fa-sharp fa-solid fa-ghost"></i> Horror Movies |</span>
          <span class="title float-end"><a href="horror.php"><button class="btn btn-warning">See all</button></a>
          </span>
        </div>
      </div>
    </div>
  </section> <!-- Horror Movies title-->

  <!-- Horror Movies slider  -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php if (mysqli_num_rows($resulthorror) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($resulthorror)) {
                  $movieCode = $data['movieCode'];
                  $movieImage = $data['movieImage'];
                  $movieName = $data['movieName'];
                  $movieRelease = $data['movieRelease'];
                  $image_data = base64_encode($data['movieImage']);
                ?>
                  <div class="swiper-slide"><a href="show.php?id=<?php echo $movieCode ?>">
                      <div class="card text-bg-dark">
                        <img src="data:image/jpeg;base64,<?php echo $image_data ?>" class="card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title"><i class="fa-solid fa-play"></i></h5>
                          <h5 class="card-title"><?php echo $movieName . ' (' . $movieRelease . ')' ?></h5>
                        </div>
                      </div>
                    </a></div>
              <?php
                }
              } else {
                echo '<center><h1 style="color: white;">No data found</h1></center>';
              }
              ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!-- Horror Movies slider  -->

  <!-- Upcoming trailers title & (Youtube)-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <div><span class="title">| <i style="color: #EF2F88;" class="fa-brands fa-youtube"></i> Upcoming Trailers
              |</span></div>
        </div>
      </div>
      <div class="row justify-content-between">
        <?php if (mysqli_num_rows($resultUT) > 0) { ?>
          <?php while ($data = mysqli_fetch_assoc($resultUT)) {
            $linkTrailer = $data['linkTrailer'];
          ?>
            <div class="col-sm-6   mt-3 ">
              <div class="ratio ratio-16x9">
                <?php echo $linkTrailer ?>
              </div>
              <hr>
            </div>
        <?php }
        } else {
          echo '<center><h1 style="color: white;">No data found</h1></center>';
        } ?>
      </div>
    </div>
  </section>
  <!-- Upcoming trailers title & (Youtube)-->

  <!-- News/blog-->
  <section>
    <div class="container p-3">
      <div class="row">
        <div class="col-sm-12">
          <div><span class="title">| <i style="color: #EF2F88;" class="fa-solid fa-newspaper"></i> News/Blog |</span>
            <span class="title float-end"><a href="news-blog.php"><button class="btn btn-warning">See all</button></a>
          </div>
        </div>
      </div>
      <!-- News/blog title-->
      <div class="row">
        <?php if (mysqli_num_rows($resultnews) > 0) { ?>
          <?php while ($data = mysqli_fetch_assoc($resultnews)) {
            $newsImage = $data['newsImage'];
            $newsTitle = $data['newsTitle'];
            $newsDOR = $data['newsDOR'];
            $newsContent = $data['newsContent'];
            $hari = date("l", strtotime($newsDOR));
            $image_data = base64_encode($data['newsImage']);
            $newsWriter = $data['newsWriter'];
            $newsCode = $data['newsCode'];
          ?>
            <div class="col-sm-6  mt-4">
              <img class="img-fluid rounded-3" src="data:image/jpeg;base64,<?php echo "$image_data"; ?>" alt="">
              <div class="text-light mt-1" style="font-size: 25px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: 900;">
                <?php echo "$newsTitle"; ?>
              </div>
              <div class="mt-1 text-light">
                <?php echo substr($newsContent, 0, 200) . "...."; ?>
              </div>
              <div class="mt-4 text-white-50 text-end">
                <?php echo "$hari, " . " " . "$newsDOR"; ?>
              </div>
              <div class="mt-3 text-end">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $newsCode ?>">Read more</button>
              </div>
              <hr>
            </div>
            <!-- News/Blog Modal -->
            <div class="modal fade" id="modal<?= $newsCode ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel1"><?php echo "$newsTitle"; ?></h1>
                  </div>
                  <div class="modal-body">
                    <img class="img-fluid" src="data:image/jpeg;base64,<?php echo "$image_data"; ?>" alt="">
                    <hr>
                    <center>
                      <h6><i class="fa-solid fa-user"></i> <?php echo "$newsWriter"; ?> </h6>
                      <h6><i class="fa-solid fa-clock"></i> <?php echo "$hari, " . " " . "$newsDOR"; ?></h6>
                    </center>
                    <hr>
                    <div class="text-black" style="text-align: left;">
                      <?php echo nl2br($newsContent); ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <?php   }
        } else {
          echo '<center><h1 style="color: white;">No data found</h1></center>';
        }  ?>
      </div>
    </div>
  </section>
  <!-- News/blog-->


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


  <!----Scroll Top!---->
  <a href="#" class="scrollTop rounded-circle" id="scroll-Top">
    <i class='bx bx-chevron-up scrollTop_icon'></i>
  </a>

  <script>
    // Show Scroll Back To Top //
    function scrollTop() {
      const scrollTop = document.getElementById('scroll-Top')
      // when the scroll is higher than 560 viewport height
      if (this.scrollY >= 260) scrollTop.classList.add('show-scroll');
      else scrollTop.classList.remove('show-scroll')
    }
    window.addEventListener('scroll', scrollTop)
  </script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!--link java script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="java script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>