<?php 

require 'function/all_function.php';
// cek apakah tombol tambah sudah ditekan
if(isset($_POST["submit"])){
  // cek apakah data berhasil ditambah
  if(tambah_pemilik($_POST) > 0){
    echo "
      <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'kelola_pemilik.php';
      </script>
    ";
  }else{
    echo "
			<script>
                alert('data gagal ditambahkan!');
               
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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Pemilik</h6>
            </div>
            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="namapemilik">Nama</label>
                    <input type="text" class="form-control" name="Nama" id="namapemilik">
                </div>
                <div class="form-group">
                    <label for="noktp">No KTP</label>
                    <input type="text" class="form-control" name="No_ktp" id="noktp">
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" class="form-control" name="No_hp" id="nohp">
                </div>
                <div class="form-group">
                    <label for="norek">No Rekening</label>
                    <input type="text" class="form-control" name="No_rek" id="norek">
                </div>
                <div class="form-group">
                    <label for="fotoktp">Foto KTP</label>
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
