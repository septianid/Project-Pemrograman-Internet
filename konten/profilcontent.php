<?php
session_start();
$email=$_SESSION['email'];
 ?>
  <div class="container" style="margin-top:70x;">
    <div class="row">
      <div class="col-md-12">
        <?php if (isset($_REQUEST['status'])) {
          if ($_REQUEST['status'] == 'sukses') {
            echo "<h2 class='text-success text-center'><b>Sukses</b></h2>";
          }else{
            echo "<h2 class='text-danger text-center'><b>Terjadi kesalah saat memperbarui data</b></h2>";
          }
        } ?>
        <div class="signup-style"style="margin-top:70px;">
          <h1 style="text-align:center;font-weight: 900;font-size:40pt;color:#fff;">PROFIL</h1>

          <div class="row">
            <div class="col-md-5">
              <?php
              $q=$mysqli->query("SELECT nama_user,email,pass,foto_user FROM tb_user WHERE email='$email'");
              if ($q->num_rows>0){
                while ($row = $q->fetch_assoc()) {
                $nama_user=$row['nama_user'];
                  $email = $row['email'];
                  $pass=$row['pass'];
                  $url_foto = $row['foto_user'];?>
                  <img src="<?php echo $url_foto;?>" class=" img-responsive img-rounded">
                  <form class="" action="kontrol/uploadfoto.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="foto" >
                  <button type="submit"  class="btn btn-primary pull-right">
                      Submit
                  </button>
                  </form>

            </div>
            <div class="col-md-7">
              <form class="form-horizontal" action="kontrol/update.php" method="post">
                <div class="form-group">
                  <div class="col-md-3">
                  <label class="control-label label1" for="nama">You Name :</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama_user?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                  <label class="control-label label1" for="email">Email :</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="email" value="<?php echo $email?>">
                  </div>
                </div>
                <button type="submit"  class="btn btn-primary pull-right">
                    Submit
                </button>
              </form>

              <!--form password-->
              <br>
              <form class="form-horizontal" action="kontrol/updatepass.php" method="post" >
                <h3 >Ganti Password</h3>
                <div class="form-group">
                  <div class="col-md-3">
                  <label class="control-label label1" for="passbaru" >Password Baru:</label>
                  </div>
                  <div class="col-md-9">
                    <input type="Password" class="form-control" id="passbaru" name="passbaru" placeholder="Ganti Password" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                  <label class="control-label label1" for="konpassbaru">Konfirmasi Password Baru :</label>
                  </div>
                  <div class="col-md-9">
                    <input type="Password" class="form-control" id="passbarucon" name="konpassbaru" placeholder="Ganti Password" required oninput="check(this)">
                    <script language='javascript' type='text/javascript'>
                        function check(input) {
                            if (input.value != document.getElementById('passbaru').value) {
                                input.setCustomValidity('Password tidak cocok.');
                            } else {
                                // input is valid -- reset the error message
                                input.setCustomValidity('');
                            }
                        }
                      </script>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                  <label class="control-label label1" for="passlama">Password lama:</label>

                  </div>
                  <div class="col-md-9">
                    <input type="Password" class="form-control" name="passlama" placeholder="Ganti Password" required>
                    <?php if (isset($_REQUEST['status'])) {
                      if ($_REQUEST['status'] == 'salah') {
                        echo "<p class='text-danger' >password salah</p>";
                      }
                    } ?>
                  </div>
                </div>
                <button type="submit"  class="btn btn-primary pull-right">
                    Submit
                </button>
                </div>
              </form>
            </div>
          <?php  }}?>
          </div>
          </div>
        </div>
    </div>
  </div>
