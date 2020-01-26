<?php 

require_once 'function/all_function.php';
$kos = tampil_kos("SELECT * FROM kos JOIN pemilik ON kos.Id_pemilik=pemilik.Id_pemilik");

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
              <a href="" class="btn btn-primary">Tambah Data</a>
          </h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola Pegguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>E-mail</th>
                      <th>No HP</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>E-mail</th>
                      <th>No HP</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($kos as $k) : ?>
                    <tr>
                    <td><?= $k["Nama_kos"]; ?></td>
                  <td><?= $k["Kategori"]; ?></td>
                  <td><?= $k["Fasilitas"]; ?></td>
                  <td><?= $k["Jenis_kos"]; ?></td>
                  <td><?= $k["Harga"]; ?></td>
                  <td><?= $k["Alamat"]; ?></td>
                  <td>
                      <img src="img/kosan/<?= $k["Gambar"]; ?>" width="50">
                  </td>
                  <td><?= $k["Kampus_terdekat"]; ?></td>
                  <td><?= $k["Nama"]; ?></td>
                  <td>
                      <a href="" class="btn-sm btn-warning">Ubah</a>
                      <a href="" class="btn-sm btn-danger">Buang</a>
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
