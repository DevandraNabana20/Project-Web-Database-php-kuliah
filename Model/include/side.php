<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Menu</div>
        <a class="nav-link" href="http://localhost/project2/Model/dashboard.php">
          <div class="sb-nav-link-icon">
            <i class="fas fa-tachometer-alt"></i>
          </div>
          Dashboard
        </a>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="bi bi-film"></i>
          </div>
          Movie
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="http://localhost/project2/Model/admin/moviedetail/moviedetail.php">Movie Detail</a>
            <a class="nav-link" href="http://localhost/project2/Model/admin/movieheader/movieheader.php">Movie Header</a>
            <a class="nav-link" href="http://localhost/project2/Model/admin/genres/genres.php">Genres (Fixed Data)</a>
          </nav>
        </div>
        <a class="nav-link" href="http://localhost/project2/Model/admin/news/news.php">
          <div class="sb-nav-link-icon">
            <i class="bi bi-newspaper"></i>
          </div>
          News
        </a>
        <a class="nav-link" href="http://localhost/project2/Model/admin/upcomingtrailers/upcomingtrailers.php">
          <div class="sb-nav-link-icon">
            <i class="bi bi-camera-reels"></i>
          </div>
          Upcoming Trailers
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Logged in as:</div>
      <?php echo $_SESSION['username']; ?>
    </div>
  </nav>
</div>