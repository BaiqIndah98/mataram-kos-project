<?php 

session_start();

require_once 'function/all_function.php';

$kosan = tampil_kos("SELECT * FROM kos LIMIT 6");


?>

<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include_once('templates/head.php'); ?>

<body>

  <!-- navbar -->
  <?php include_once('templates/navbar.php'); ?>

  <!-- parallax -->
  <?php include_once('templates/parallax.php'); ?>

  <!-- card promotion -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="card card-radius">
        <div class="card-content">
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">account_balance_wallet</i></h2>
            <h5 class="center">Hemat</h5>

            <p class="light center">Dengan aplikasi go-kos anda hanya perlu mencari kos melalui gadget anda tanpa meniggalkan rumah.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">security</i></h2>
            <h5 class="center">Aman</h5>

            <p class="light center">Setiap iklan kos yang ada di aplikasi ini sudah melalui tahap verifikasi oleh admin.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">sentiment_very_satisfied</i></h2>
            <h5 class="center">Mudah</h5>

            <p class="light center">Sangat mudah dalam penggunaan, dirancang dengan tampilan yang user friendly.</p>
          </div>
        </div>
      </div>
    </div>
    </div>

    </div>
  </div>

  <!-- kos terbaru -->
  <div class="container">
  <h4>Iklan baru-baru ini</h4>
  <hr>
  <div class="row">
    <?php foreach($kosan as $kos ) : ?>
    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="admin/img/kosan/<?= $kos["Gambar"]; ?>" height="200">
          <span class="card-title"><?= $kos["Nama_kos"]; ?></span>
        </div>
        <div class="card-content center">
          <div class="chip">
            <?= $kos["Harga"]; ?>/<?= $kos["Kategori"]; ?>
          </div>
          <div class="chip">
            <?= $kos["Jenis_kos"]; ?>
          </div>
          <a href="detail_kos.php?id=<?= $kos["Id_kos"]; ?>" class="waves-effect waves-light btn-small radius-button"><i class="material-icons left">info</i>Lihat details</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  </div>
  </div>

  <!-- footer -->
  <?php include_once('templates/footer.php'); ?>

  <!-- js -->
  <?php include_once('templates/js.php'); ?>

  </body>
</html>
