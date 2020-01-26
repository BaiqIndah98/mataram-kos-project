<?php 

session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require_once 'function/all_function.php';
// tampilkan pemilik di combobox
$pemilik = tampil_pemilik("SELECT Id_pemilik, Nama FROM pemilik");

// get data from url
$idKos = $_GET["id"];

// query data kos
$kosan = tampil_kos("SELECT * FROM kos WHERE Id_kos = $idKos")[0];

// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    // cek apakah data berhasil diubah atau tidak
    if(ubah_kos($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'kelola_data_kos.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'kelola_data_kos.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include('templates/head.php'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- sidebar -->
    <?php include('templates/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- topbar -->
        <?php include('templates/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Kos</h6>
            </div>
            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="Id_kos" value="<?= $kosan["Id_kos"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $kosan["Gambar"]; ?>">
                  <div class="form-group">
                      <label for="namakos">Nama Kos</label>
                      <input type="text" class="form-control" name="Nama_kos" id="namakos" value="<?= $kosan["Nama_kos"] ?>">
                  </div>
                  <div class="form-group">
                      <label for="nama">Kategori</label>
                        <select class="form-control" name="Kategori">
                          <option value="Pilih" disabled selected><?= $kosan["Kategori"] ?></option>
                          <option value="Bulanan">Bulanan</option>
                          <option value="Tahunan">Tahunan</option>
                        </select>
                  </div>
                  <div class="form-group">
                       <label for="fasilitas">Fasilitas</label>
                      <input type="text" name="Fasilitas" class="form-control" id="fasilitas" value="<?= $kosan["Fasilitas"]; ?>">
                  </div>
                  <div class="form-group">
                            <label for="nama">Jenis Kos</label>
                            <select class="form-control" name="Jenis_kos">
                                <option value="Pilih" disabled selected><?= $kosan["Jenis_kos"]; ?></option>
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                                <option value="Campur">Campur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <!-- <input type="number" name="Harga" class="form-control uang" id="harga" placeholder="Masukkan harga"> -->
                            <input type="text" id="rupiah" name="Harga" class="form-control" placeholder="Masukkan Harga" value="<?= $kosan["Harga"]; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat Kos</label>
                            <textarea class="form-control" name="Alamat" rows="2" placeholder="Masukkan Alamat"><?= $kosan["Alamat"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Kos</label>
                            <br>
                            <img src="img/kosan/<?= $kosan["Gambar"]; ?>" width="200">
                            <br><br>
                            <input type="file" name="Gambar" id="gambar" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="kampus_terdekat">Kampus Terdekat</label>
                            <select class="form-control" name="Kampus_terdekat" id="kampus_terdekat">
                                <option value="" disabled selected><?= $kosan["Kampus_terdekat"] ?></option>
                                <option value="Universitas Mataram">Universitas Mataram</option>
                                <option value="UIN Mataram">UIN Mataram</option>
                                <option value="Universitas Bumigora">Universitas Bumigora</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik">Pemilik</label>
                            <select class="form-control" name="Id_pemilik" id="nama_pemilik">
                                <option value="" disabled selected>--PILIH--</option>
                                <?php foreach($pemilik as $p) : ?>
                                <option value="<?= $p["Id_pemilik"] ?>" ><?= $p["Nama"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-action text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="" class="btn btn-danger">Batalkan</a>
                        </div>
                
            </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('templates/footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- buat inputan rupiah -->
  <script>
  var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

</script>

  <!-- Bootstrap core JavaScript-->
  <?php include('templates/js.php'); ?>

</body>

</html>
