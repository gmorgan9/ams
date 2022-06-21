<!--Main Navigation-->
<header>

<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <!-- Container wrapper -->
  <div class="container-fluid">

<!-- Brand -->
<a class="navbar-brand" href="#">
  <h3>Assignment Management System</h3>
</a>
<?php if (isset($_SESSION['username'])) { ?>
<!-- Right links -->
  <ul class="navbar-nav ms-auto d-flex flex-row">
  <li class="nav-item">
      <a class="nav-link me-3 me-lg-0" href="/">
        <i class="fas fa-home"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link me-3 me-lg-0" href="<?php BASE_URL ?>/pages/profile.php">
        <i class="fas fa-user"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link me-3 me-lg-0" href="/action/logout.php">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
      </a>
    </li>
  </ul>

  <?php }else { ?>
  <?php } ?>
</div>
<!-- Container wrapper -->
</nav>
<!-- Navbar -->
</header>
<!--Main Navigation-->
<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4"></div>
</main>
<!--Main layout-->