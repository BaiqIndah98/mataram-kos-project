<?php 

session_start();

require_once 'function/all_function.php';

// ambil data dari url
$idKos = $_GET["id"];

$kosan = tampil_kos("SELECT * FROM kos JOIN pemilik ON kos.Id_pemilik=pemilik.Id_pemilik WHERE Id_kos = $idKos")[0];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <!-- head -->
  <?php include_once('templates/head.php'); ?>

  <body>
    <!-- navbar -->
    <?php include_once('templates/navbar.php'); ?>

    <div class="container">
      <h4>Detail dan pemesanan</h4>
      <hr>
      <div class="row">
        <div class="col s5">
          <div class="card">
              <img class="materialboxed" width="100%" height="290px" src="admin/img/kosan/<?= $kosan["Gambar"]; ?>">
          </div>
          <div class="card">
          <div id="googleMap" style="width:100%;height:290px;"></div>
          </div>
        </div>
        <div class="col s7">
          <div class="card">
            <div class="card-content">
              <h4>Detail Kos</h4>
              <table class="striped">
                    <thead>
                      <tr>
                          <th>Nama</th>
                          <td><?= $kosan["Nama_kos"]; ?></td>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <th>Pemilik</th>
                        <td><?= $kosan["Nama"]; ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kos</th>
                        <td><?= $kosan["Jenis_kos"]; ?></td>
                      </tr>
                      <tr>
                        <th>Fasilitas</th>
                        <td><?= $kosan["Fasilitas"]; ?></td>
                      </tr>
                      <tr>
                        <th>Kategori</th>
                        <td><?= $kosan["Kategori"] ?></td>
                      </tr>
                      <tr>
                        <th>Harga</th>
                        <td>Rp. <?= $kosan["Harga"]; ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td><?= $kosan["Alamat"]; ?></td>
                      </tr>
                      <tr>
                        <th>Kampus Terdekat</th>
                        <td><?= $kosan["Kampus_terdekat"] ?></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php if(isset($_SESSION['login'])) : ?>
                    <div class="action center" style="margin-top: 25px;">
                  <a class="waves-effect waves-light btn-small orange" style="border-radius: 25px;" href="https://api.whatsapp.com/send?phone=<?= $kosan["No_hp"]; ?>" target="_blank"><i class="material-icons left">chat</i>hubungi pemilik</a>
                  <a class="waves-effect waves-light btn-small blue" style="border-radius: 25px;" href="boking.php?id=<?= $kosan["Id_kos"]; ?>"><i class="material-icons left">add_shopping_cart</i>boking kos</a>
                  </div>
                  <?php else: ?>
                    <div class="action center" style="margin-top: 25px;">
                  <p class="center" style="color: red; font-style:italic;">"Anda harus <a href="login.php">login</a> untuk melakukan boking !"</p>
                  <a class="waves-effect waves-light btn-small orange" style="border-radius: 25px;" href="https://api.whatsapp.com/send?phone=<?= $kosan["No_hp"]; ?>" target="_blank"><i class="material-icons left">chat</i>hubungi pemilik</a>
                  <a class="waves-effect waves-light btn-small blue disabled" style="border-radius: 25px;" href="boking.php?id=<?= $kosan["Id_kos"]; ?>"><i class="material-icons left">add_shopping_cart</i>boking kos</a>
                  </div>
                  <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php include_once('templates/footer.php'); ?>

    <!-- js -->
    <?php include_once('templates/js.php'); ?>

  </body>
</html>
