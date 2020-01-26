<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include('templates/head.php'); ?>

<body>

  <!-- navbar -->
  <?php include('templates/navbar.php'); ?>

  <div class="container">
    <h4>Tentang</h4>
    <hr>
    <p style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <h4>Developer Team</h4>
    <hr>
    <div class="row">
      <div class="col s3">
        <div class="card">
          <div class="card-image">
            <img src="img/kos/3.jpg" height="200">
            <span class="card-title">Baiq Indah</span>
          </div>
          <div class="card-content center">
            <div class="chip">
              Project Manager
            </div>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-image">
            <img src="img/kos/3.jpg" height="200">
            <span class="card-title">Bagus Suharta</span>
          </div>
          <div class="card-content center">
            <div class="chip">
              Front-End Developer
            </div>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-image">
            <img src="img/kos/3.jpg" height="200">
            <span class="card-title">Erra Ratau</span>
          </div>
          <div class="card-content center">
            <div class="chip">
              Database Engineer
            </div>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-image">
            <img src="img/kos/3.jpg" height="200">
            <span class="card-title">Muh. Kuswari</span>
          </div>
          <div class="card-content center">
            <div class="chip">
              Back-End Developer
            </div>
          </div>
        </div>
      </div>
    </div>

    <h4>Contact Us</h4>
    <hr>

  </div>

  <!-- footer -->
  <?php include('templates/footer.php'); ?>

  <!-- js -->
  <?php include('templates/js.php'); ?>

  </body>
</html>
