<?php 

session_start();

require_once 'function/all_function.php';

// ambil data dari url
$idKos = $_GET["id"];

$kosan = tampil_kos("SELECT * FROM kos JOIN pemilik ON kos.Id_pemilik=pemilik.Id_pemilik WHERE Id_kos = $idKos")[0];



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <!-- header -->
  <?php include('templates/head.php'); ?>

  <body>
    <!-- navbar -->
    <?php include('templates/navbar.php'); ?>

    <div class="container">
      <div class="row">
      <div class="col s2"></div>
      <div class="col s8">
        <div class="card" style="margin-top:50px;">
          <div class="card-content" id="print">
            <h4>Boking kos</h4>
            <hr style="width:50px;">
                          <table class="striped">
                    <thead>
                      <tr>
                          <th>Nama Kos</th>
                          <td><?= $kosan["Nama_kos"]; ?></td>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <th>Alamat</th>
                        <td><?= $kosan["Alamat"]; ?></td>
                      </tr>
                      <tr>
                        <th>Tipe Kos</th>
                        <td><?= $kosan["Kategori"]; ?></td>
                      </tr>
                      <tr>
                        <th>Harga Kos</th>
                        <td><?= $kosan["Harga"]; ?></td>
                      </tr>
                      <tr>
                        <th>Nama Pemilik</th>
                        <td><?= $kosan["Nama"]; ?></td>
                      </tr>
                      <tr>
                        <th>Nama Penyewa</th>
                        <td><?= $_SESSION["Nama"]; ?></td>
                      </tr>
                      <tr>
                        <th>DP Kos</th>
                        <td><?= $dpKos; ?></td>
                      </tr>
                      <tr>
                        <th>Rekening Tujuan</th>
                        <td>BNI : 1291721921212</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Bukti Transfer</span>
                      <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="upload bukti transfer">
                    </div>
                  </div>
                  <div class="aksi center">
                  <button class="btn waves-effect blue waves-light" style="border-radius: 50px;" type="submit" name="action">Boking Sekarang
    <i class="material-icons right">send</i>
  </button>
                  </div>
        
          </div>
        </div>
      </div>
      <div class="col s2"></div>
      </div>
    </div>

    <!-- footer -->
    <?php include('templates/footer.php'); ?>


    <!-- js -->
    <?php include('templates/js.php'); ?>

    <script>

    </script>

    </body>
  </html>
