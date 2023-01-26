<!-- koneksi ke database-->
<?php
include('../model/config/koneksi.php');
$con = db_connect();
$sql = "SELECT * from news ORDER BY newsCode desc";
$result = mysqli_query($con, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieBee.com/News-blog</title>
    <link rel="icon" href="assets/logo.ico" type="image/icon type">

    <!--Link eksternal bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!--link bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/genres.css">

    <!--link animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!--Link eksternal font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!--Box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Pagination -->
    <style>
        nav.text-center {
            margin-top: 40px;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            font-family: cursive;
        }

        nav.text-center .page-item.active .page-link {
            background-color: #f5176c;
            border-color: #f5176c;
            color: white;
        }

        nav.text-center .page-item .page-link {
            background-color: #0e0d0d;
            color: white;
            border-color: #0e0d0d;
        }
    </style>

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


    <!--News-blog title -->
    <section>
        <div class="container p-3 mt-2">
            <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <span class="title"> <i class="fa-solid fa-newspaper"></i> News/Blog</span>
                </div>
            </div>
            <!--News-blog -->
            <div class="row">
                <?php if (mysqli_num_rows($result) > 0) { // Number of records to display per page
                    $per_page = 6;
                    // Total number of records
                    $total_records = mysqli_num_rows($result);
                    // Total number of pages
                    $total_pages = ceil($total_records / $per_page);
                    // Check if page number is set in the URL
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    // Set the limit for the query
                    $start_from = ($page - 1) * $per_page;
                    $sql = $sql . " LIMIT $start_from, $per_page";
                    $result = mysqli_query($con, $sql); ?>
                    <?php while ($data = mysqli_fetch_assoc($result)) {
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
                    echo '<nav aria-label="Page navigation example" class="text-center">
                <ul class="pagination">
                    <li class="page-item';
                    if ($page == 1) {
                        echo ' disabled';
                    }
                    echo '"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<li class="page-item';
                        if ($i == $page) {
                            echo ' active';
                        }
                        echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                    echo '<li class="page-item';
                    if ($page == $total_pages) {
                        echo ' disabled';
                    }
                    echo '"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>
                </ul>
                </nav>';
                } else {
                    echo '<center><h1 style="color: white;">No data found</h1></center>';
                } ?>
            </div>
        </div>
    </section>



    <!-- Modal berita -->


    <!--News-blog -->


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
                            <a href="trendingmovies.php" style="text-decoration: none; color:#fff">Trending
                                Movies</a>
                        </p>
                        <p class="Judul2">
                            <a href="genres.php" style="text-decoration: none; color:#fff">Genres</a>
                        </p>
                        <p class="Judul2">
                            <a href="news/blog.php" style="text-decoration: none; color:#ffff">News/Blog</a>
                        </p>
                    </div>


                    <div class="col-sm-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(238, 153, 43)">Genres
                        </h5>
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
                            <h5 class="text-uppercase font-weight-bold" style="color:rgb(238, 153, 43)">Download
                                app
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
    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>