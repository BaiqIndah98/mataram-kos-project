<?php 

session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function/all_function.php';

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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- widgets -->
          <?php include('templates/widget.php'); ?>

          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- footer -->
      <?php include('templates/footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- javascript -->
  <?php include('templates/js.php'); ?>

</body>

</html>
