<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function/all_function.php';

$id = $_GET["id"];

$pemilik = tampil_pemilik("SELECT * FROM pemilik WHERE Id_pemilik = $id")[0];

// cek apakah tombol tambah sudah ditekan
if(isset($_POST["submit"])){
  // cek apakah data berhasil ditambah
  if(ubah_pemilik($_POST) > 0){
    echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'kelola_pemilik.php';
        </script>
    ";
  }else{
    echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'kelola_pemilik.php';
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
              <h6 class="m-0 font-weight-bold text-primary">Update Data Pemilik</h6>
            </div>
            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <!-- hidden input -->
            <input type="hidden" name="Id_pemilik" value="<?= $pemilik["Id_pemilik"]; ?>">
              <input type="hidden" name="fotoLama" value="<?= $pemilik["Foto"] ?>">

                <div class="form-group">
                    <label for="namapemilik">Nama</label>
                    <input type="text" class="form-control" name="Nama" id="namapemilik" value="<?= $pemilik["Nama"]; ?>">
                </div>
                <div class="form-group">
                    <label for="noktp">No KTP</label>
                    <input type="text" class="form-control" name="No_ktp" id="noktp" value="<?= $pemilik["No_ktp"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" class="form-control" name="No_hp" id="nohp" value="<?= $pemilik["No_hp"]; ?>">
                </div>
                <div class="form-group">
                    <label for="norek">No Rekening</label>
                    <input type="text" class="form-control" name="No_rek" id="norek" value="<?= $pemilik["No_rek"]; ?>">
                </div>
                <div class="form-group">
                    <label for="fotoktp">Foto KTP</label>
                    <br>
                    <img src="img/pemilik/<?= $pemilik["Foto"]; ?>" width="200">
                    <br><br>
                    <input type="file" class="form-control-file" name="Foto" id="fotoktp">
                </div>
                <div class="form-action text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan data</button>
                    <a href="" class="btn btn-warning">Batalkan</a>
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



  <!-- Bootstrap core JavaScript-->
  <?php include('templates/js.php'); ?>

</body>

</html>
