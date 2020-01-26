<?php 

session_start();

require_once 'function/all_function.php';

$kosan = tampil_kos("SELECT * FROM kos");

?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include_once('templates/head.php'); ?>

<body>

  <!-- navbar -->
  <?php include_once('templates/navbar.php'); ?>

  <h4>List Kos untuk anda</h4>
  <hr>
  <div class="container">
    <div class="card" style="border-radius:50px;">
      <div class="card-content">
        <form class="" action="" method="post">
          <div class="row">
            <div class="col s3">
              <div class="input-field col s12">
                <select class="browser-default">
                  <option value="" disabled selected>Pilih Kategori Kos</option>
                  <option value="1">Kos Pria</option>
                  <option value="2">Kos Wanita</option>
                  <option value="3">Kos Campur</option>
                </select>
              </div>
            </div>
            <div class="col s3">
              <div class="input-field col s12">
                <select class="browser-default">
                  <option value="" disabled selected>Pilih Jenis Kos</option>
                  <option value="1">Bulanan</option>
                  <option value="2">Tahunan</option>
                </select>
              </div>
            </div>
            <div class="col s4">
              <div class="input-field col s12">
                <select class="browser-default">
                  <option value="" disabled selected>Kampus terdekat</option>
                  <option value="1">Universitas Mataram</option>
                  <option value="2">Universitas Islam Negeri Mataram</option>
                  <option value="3">IKIP Mataram</option>
                  <option value="4">Universitas Muhammadiyah Mataram</option>
                  <option value="5">Universitas NW Mataram</option>
                  <option value="6">Universitas Bumigora</option>
                  <option value="7">Universitas Islam Al-Azhar Mataram</option>
                  <option value="8">STIE AMM Mataram</option>
                  <option value="9">Universitas 45 Mataram</option>
                  <option value="10">Universitas Maha Saraswati Mataram</option>
                  <option value="11">Sekolah Tinggi Pariwisata Mataram</option>
                </select>
              </div>
            </div>
            <div class="col s2">
              <label for="">Tap For Search</label>
              <button class="btn waves-effect blue waves-light" type="submit" name="action" style="border-radius:50px;">Search
                <i class="material-icons right">search</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
    <?php foreach($kosan as $kos ) : ?>
      <div class="col s4">
        <div class="card">
          <div class="card-image">
            <img src="admin/img/kosan/<?= $kos["Gambar"]; ?>" height="200">
            <span class="card-title"><?= $kos["Nama_kos"] ?></span>
          </div>
          <div class="card-content center">
            <div class="chip">
              Rp.<?= $kos["Harga"]; ?>/<?= $kos["Kategori"]; ?>
            </div>
            <div class="chip">
              <?= $kos["Jenis_kos"]; ?>
            </div>
            <a class="waves-effect waves-light btn-small radius-button" href="detail_kos.php?id=<?= $kos["Id_kos"]; ?>"><i class="material-icons left">info</i>Lihat details</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    </div>
    </div>
  </div>

  <div class="page center">
    <ul class="pagination">
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
      <li class="active blue"><a href="#!">1</a></li>
      <li class="waves-effect"><a href="#!">2</a></li>
      <li class="waves-effect"><a href="#!">3</a></li>
      <li class="waves-effect"><a href="#!">4</a></li>
      <li class="waves-effect"><a href="#!">5</a></li>
      <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
  </div>

  <!-- footer -->
  <?php include_once('templates/footer.php'); ?>

  <!-- js -->
  <?php include_once('templates/js.php'); ?>

  </body>
</html>
