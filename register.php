<?php 

require_once 'function/all_function.php';

if(isset($_POST["register"])){

  if(register_user($_POST) > 0){
    echo "
      <script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'login.php';
      </script>
    ";
  }

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
      <div class="col s2"></div>
      <div class="col s8">
        <div class="card" style="margin-top:50px;">
          <div class="card-content">
            <h4>Register now</h4>
            <hr style="width:50px;">
            <form action="" method="post">
              <div class="row">
                <form action="col s12">
                  <div class="input-field col s6">
                    <input id="name" name="Nama" type="text" class="validate">
                    <label for="name">Nama</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="email" name="Email" type="text" class="validate">
                    <label for="email">E-Mail</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="nohp" name="No_hp" type="number" class="validate">
                    <label for="nohp">No Hp</label>
                  </div>
                  <div class="input-field col s6">
                  <span class="helper-text">Jenis Kelamin</span>
                  <p>
                  <label>
                      <input name="Jenis_kelamin" type="radio" value="Laki-laki" />
                      <span>Laki-laki</span>
                    </label>
                    <label>
                      <input name="Jenis_kelamin" type="radio"  value="Perempuan"/>
                      <span>Perempuan</span>
                    </label>
                    </p>
                  </div>
                  <div class="input-field col s12">
                    <textarea id="alamat" name="Alamat" class="materialize-textarea"></textarea>
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="input-field col s12">
                    <input id="username" name="Username" type="text" class="validate">
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="password" name="Password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="password2" name="Password2" type="password" class="validate">
                    <label for="password2">Konfirmasi password</label>
                  </div>
                  <div class="aksi center">
                  <button class="btn waves-effect waves-light blue" type="submit" name="register" style="border-radius:50px;">daftar sekarang
                    <i class="material-icons right">send</i>
                  </button>
                  </div>
                </form>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col s2"></div>
      </div>
    </div>

    <!-- footer -->
    <?php include_once('templates/footer.php'); ?>


    <!-- js -->
    <?php include_once('templates/js.php'); ?>

    </body>
  </html>
