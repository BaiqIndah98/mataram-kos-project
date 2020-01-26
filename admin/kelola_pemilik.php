<?php 

session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function/all_function.php';

$pemilik = tampil_pemilik("SELECT * FROM pemilik");

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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">
              <a href="tambah_pemilik.php" class="btn btn-primary">Tambah Data</a>
          </h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola Pemilik</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>No KTP</th>
                      <th>No HP</th>
                      <th>No Rekening</th>
                      <th>Foto KTP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>No KTP</th>
                      <th>No HP</th>
                      <th>No Rekening</th>
                      <th>Foto KTP</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($pemilik as $p) : ?>
                    <tr>
                    <td><?= $p["Nama"]; ?></td>
                  <td><?= $p["No_ktp"]; ?></td>
                  <td><?= $p["No_hp"]; ?></td>
                  <td><?= $p["No_rek"]; ?></td>
                  <td>
                      <img src="img/pemilik/<?= $p["Foto"]; ?>" width="50">
                  </td>
                  <td>
                      <a href="update_pemilik.php?id=<?= $p["Id_pemilik"]; ?>" class="btn-sm btn-warning">Ubah</a>
                      <a href="hapus_pemilik.php?id=<?= $p["Id_pemilik"]; ?>" onclick="return confirm('anda yakin ingin menghapus?');"" class="btn-sm btn-danger">Buang</a>
                  </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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
