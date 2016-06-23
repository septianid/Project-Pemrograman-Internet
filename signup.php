
<!DOCTYPE html>
<html>
  <head>
    <title> FOGRAMMER </title>
    <link rel="icon" type="image/png" href="assets/img/icons/login-w-icon.png" />
    <meta charset="utf-8">
    <meta content="width=device-width, inital-scale=1, maximum-scale=1, user-scalable=no" name="viewport" >
    <!--load css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/home.css">

  </head>
  <body style="background-color:#834083;">
    <div class="container">
      <h1 style="text-align:center;font-weight: 900;font-size:40pt;color:#fff;">SIGN UP</h1>
      <?php
        if (isset($_GET['sukses'])) {
            if ($_GET['sukses']==1) {
              echo "<div class='alert alert-success alert-dismissible fadeIn' role='alert' id='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <strong>Success</strong> Well done, now, you are part of this site </div>";
            }
            else{
              echo "<div class='alert alert-danger alert-dismissible' role='alert' id='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <strong>Warning!!!</strong> Please submit again... </div>";
            }
        }
       ?>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
          <div class="signup-style">
            <div class="form-horizontal">
              <form action="kontrol/daftar.php" method="post">
              <div class="form-group">
                <label class="control-label col-sm-4 label1" for="nama">You Name :</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-4 label1" for="alamat">Email :</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-4 label1" for="alamat">Password :</label>
                <div class="col-sm-8">
                <input type="Password" name="password" class="form-control" id="pass" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label label1 col-sm-4 " for="alamat">Retype Password :</label>
                <div class="col-sm-8">
                <input type="Password" class="form-control" name="repass" id="rePass">
                </div>
              </div>


            </div>

            <?php
               if (!empty($_GET['error'])) {
                if ($_GET['error'] == 1) {
                    echo '<h3>Email dan Password belum diisi!</h3>';
                } else if ($_GET['error'] == 2) {
                    echo '<h3>Email belum diisi!</h3>';
                } else if ($_GET['error'] == 3) {
                    echo '<h3>Password belum diisi!</h3>';
                } else if ($_GET['error'] == 4) {
                    echo '<h3>Email dan Password tidak terdaftar!</h3>';
                }
              } ?>

            <div class="row">
              <div class="col-md-12">
                  <button type="submit"  class="btn button1 btn-group-justified ">
                    <div style="color:#fff;font-weight: 700;font-size:15pt;">
                      Submit
                    </div>
                  </button>
                  <p class="text-center">
                    atau
                  </p>
                  <a class="btn btn-primary  center-block" href="index.php">Login</a>
              </div>
            </div>
            </form>
          </div>

        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
    <script src='assets/js/validate.js'></script>



  </body>
</html>
