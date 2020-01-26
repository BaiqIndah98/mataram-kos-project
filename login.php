<?php 

session_start();



require_once 'function/all_function.php';

if(isset($_POST["login"])){

  $username = $_POST["Username"];
  $password = $_POST["Password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$username'");

  // cek username
  if(mysqli_num_rows($result) === 1){
    // cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["Password"])){
      // set session
      $_SESSION["login"] = true;

      $_SESSION["Username"] = $username;
      
      header("Location: index.php");
      exit;
    }
  }

  $error = true;

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <!-- header -->
  <?php include_once('templates/head.php'); ?>

  <body>
    <!-- navbar -->
    <?php include_once('templates/navbar.php'); ?>

    <div class="container">
      <div class="row">
      <div class="col s3"></div>
      <div class="col s6">
        <div class="card" style="margin-top:50px;">
          <div class="card-content">
            <h4>Login</h4>
            <hr style="width:50px;">
<?php if(isset($error)) : ?>
            <p class="center" style="color:red; font-style:italic;">Username / Password anda salah !!</p>
<?php endif; ?>
            <form action="" method="post">
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="Username" id="username" class="validate">
                <label for="username">Username</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">https</i>
                <input type="password" name="Password" id="password" class="validate">
                <label for="password">Password</label>
              </div>
              <div class="input-field">
                <p>
                  <label>
                    <input type="checkbox" name="remember" class="filled-in" checked="checked" />
                    <span>Remember Me</span>
                  </label>
                </p>
              </div>
              <div class="input-field">
                <button class="btn waves-effect waves-light blue" type="submit" name="login" style="width:100%; border-radius:50px;">login
                  <i class="material-icons right">send</i>
                </button>
              </div>
              <p class="center">Tidak punya akun? <a href="register.php">daftar disini<a></p>
            </form>
          </div>
        </div>
      </div>
      <div class="col s3"></div>
      </div>
    </div>

    <!-- footer -->
    <?php include_once('templates/footer.php'); ?>


    <!-- js -->
    <?php include_once('templates/js.php'); ?>

    </body>
  </html>
