<?php 

session_start();

// cek cookie
if(isset($_COOKIE['login'])){
  if($_COOKIE['login'] == 'true'){
    $_SESSION['login'] = true;
  }
}

require 'function/all_function.php';

if(isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

if(isset($_POST["login"])){
  $username = $_POST["Username"];
  $password = $_POST["Password"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'");
  if(mysqli_num_rows($result) === 1){

    $_SESSION["login"] = true;

    

    // cek remember me
    if(isset($_POST['remember'])){
      // buat cookie
      setcookie('login', 'true', time()+60);
    }
  }
  $error = true;
}



?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include('templates/head.php'); ?>


<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat datang</h1>
                    <p>Silahkan Login</p>
                    <?php if(isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Username / Password anda salah
                        </div>
                    <?php endif; ?>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" name="Username" class="form-control form-control-user" id="username" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="Password" class="form-control form-control-user" id="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat saya</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
