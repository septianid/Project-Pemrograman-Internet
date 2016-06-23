<?php
session_start();

//jika session email belum dibuat, atau session email kosong
if (isset($_SESSION['email']) || !empty($_SESSION['email'])) {
    //redirect ke halaman login

    header('location:home.php');
}

?>

<!DOCTYPE html>
<html>
        <head>
            <title> FOGRAMMER </title>
            <link rel="icon" type="image/png" href="assets/img/icons/login-w-icon.png" />

            <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
            <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

        </head>

    <body style="background-color:#f1d4fc">

      <div id="login-button">
        <img src="assets/img/icons/login-w-icon.png">
        <div style="text-align:center; color:white;">Login</div>
      </div>

      <div id="judul"> FOGRAMMER
          <h2> This is a Forum and Discussion Sites for Programmers</h2>
      </div>
      <?php
      //include "konek/cek.php";
      //kode php ini kita gunakan untuk menampilkan pesan eror
      if (!empty($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo '<h3 style="text-align:center">Email dan Password belum diisi!</h3>';

        } else if ($_GET['error'] == 2) {
            echo '<h3 style="text-align:center">Email belum diisi!</h3>';
        } else if ($_GET['error'] == 3) {
            echo '<h3 style="text-align:center">Password belum diisi!</h3>';
        } else if ($_GET['error'] == 4) {
            echo '<h3 style="text-align:center">Email dan Password tidak terdaftar!</h3>';
        }
      }
      ?>
      <div id="container">

          <h1>Log In</h1>
          <span class="close-btn">
            <img src="assets/img/icons/circle_close_delete_-128.png"></img>
          </span>

          <form action="konek/otentikasi.php" method="post">
          <input type="Email" name="email" placeholder="Email">
          <input type="password" name="pass" placeholder="Password">
          <button class=" center-block">LOGIN</button>

        </form>
          <div id="remember-container">

            <span id="signup"><a href="signup.php" style="background-color:#b666c9;margin-top:0px;;padding:10px 8px;font-size: 18px;
              font-family: 'Hind', sans-serif;
              color: #5c2b5c;">SIGN UP</a></span>
            
          </div>

        </div>

<!-- Forgotten Password Container -->
  <div id="forgotten-container">
    <h1>Forgotten</h1>
    <span class="close-btn">
      <img src="assets/img/icons/circle_close_delete_-128.png"></img>
    </span>

    <form>
      <input type="email" name="email" placeholder="E-mail">
      <a href="#" class="orange-btn">Get new password</a>
    </form>
  </div>
      <script src='assets/js/tweenmax.min.js'></script>
      <script src='assets/js/jquery.js'></script>
      <script src="assets/js/login.js"></script>
    </body>
</html>
