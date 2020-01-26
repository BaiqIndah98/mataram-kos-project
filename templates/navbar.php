<?php 


require_once 'function/all_function.php';

?>
<nav class="white" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="index.php" class="brand-logo">
      <img src="img/logo/logo-app.png" alt="Go-Kos" style="padding-top: 8px;">
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Home</a></li>
      <li><a href="daftar_kos.php">Daftar Kos</a></li>
      <li><a href="tentang.php">Tetang</a></li>

      <?php if(isset($_SESSION['login'])) : ?>
          <a href="logout.php" class="waves-effect waves-light btn red lighten-1 radius-button" onclick="return confirm('yakin ingin keluar?');"><i class="material-icons left">account_circle</i>Logout</a>
      <?php else: ?>
        <a href="login.php" class="waves-effect waves-light btn blue lighten-1 radius-button"><i class="material-icons left">account_circle</i>login</a>
      <?php endif; ?>
        <!-- <a href="logout.php" class="waves-effect waves-light btn blue lighten-1 radius-button"><i class="material-icons left">account_circle</i>Logout</a>

        <a href="login.php" class="waves-effect waves-light btn blue lighten-1 radius-button"><i class="material-icons left">account_circle</i>login</a> -->
    </ul>

    <ul id="nav-mobile" class="sidenav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Daftar Kos</a></li>
      <li><a href="#">Tetang</a></li>
      <?php if(isset($_SESSION["login"]) && $_SESSION["login"] == true) : ?>
        <a href="logout.php" class="waver-effect waves-light btn red radius-button"><i class="material-icons-left">logout</i>Keluar</a>
      <?php else: ?>
      <a href="login.php" class="waves-effect waves-light btn blue lighten-1 radius-button"><i class="material-icons left">account_circle</i>login</a>
      <?php endif; ?>
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </div>
</nav>
