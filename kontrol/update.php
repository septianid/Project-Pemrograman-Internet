<?php
include '../konek/connect.php';

session_start();
$email=$_SESSION['email'];
$stmt = $mysqli -> prepare("select id_user from tb_user where email='$email'");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$stmt->fetch();

  $nama_user = $_POST['nama'];
  $email= $_POST['email'];

  $q=$mysqli -> query("UPDATE tb_user SET nama_user='$nama_user', email='$email' WHERE id_user =$id");
  if ($q) {
    $_SESSION['email'] = $email;
    header('location:../home.php?content=profilcontent&status=sukses');
    break;
  }
  else {
    header('location:../home.php?content=profilcontent&status=gagal');
    break;
  }

 ?>
