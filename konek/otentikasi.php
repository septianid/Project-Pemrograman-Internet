<?php
include ('connect.php');

session_start();

//tangkap data dari form login
$email = $_POST['email'];
$password = $_POST['pass'];
$hashpass=md5($password);


//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
//$email = mysqli_real_escape_string($email);
//$hashpass = mysqli_real_escape_string($hashpass);


//cek data yang dikirim, apakah kosong atau tidak
if (empty($email) && empty($password)) {
    //kalau email dan password kosong
    header('location:../index.php?error=1');
    break;
} else if (empty($email)) {
    //kalau email saja yang kosong
    header('location:../index.php?error=2');
    break;
} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:../index.php?error=3');
    break;
}

$q = $mysqli->query("select * from tb_user where email='$email' and pass='$hashpass'");

if ($q->num_rows == 1) {
    //kalau email dan password sudah terdaftar di database

    $stmt = $mysqli -> prepare("select status from tb_user where email='$email'");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($status);
    $stmt->fetch();
    $_SESSION['email'] = $email;
    $_SESSION['status'] = $status;
    /*$c= $mysqli -> query("select id_user from tb_user where email='$email'");
    if ($c) {
    $_SESSION['id']=$id_user;  # code...
    $_SESSION['status']='member';  # code...
  }*/
    header('location:../home.php');
} else {
    //kalau email ataupun password tidak terdaftar di database
    header('location:../index.php?error=4');
}
?>
