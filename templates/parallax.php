<?php 


require_once 'function/all_function.php';

?>
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
        <?php if(isset($_SESSION['login'])) : ?>
          <h1 class="header center white-text text-lighten-2">Hai, <?= $_SESSION["Username"]; ?></h1>
        <?php else: ?>
          <h1 class="header center white-text text-lighten-2">Selamat Datang</h1>
        <?php endif; ?>
      <div class="row center">
        <h5 class="header col s12 light">Kini, mencari kos dan mengiklankan kos jadi lebih mudah dengan go-kos</h5>
      </div>
      <div class="row center">
        <a href="daftar_kos.php" class="btn-large waves-effect waves-light blue lighten-1 radius-button">Yuk Mulai</a>
      </div>
      <br><br>
    </div>
  </div>
  <div class="parallax"><img src="img/parallax-image.jpg" alt="Unsplashed background img 1"></div>
</div>
