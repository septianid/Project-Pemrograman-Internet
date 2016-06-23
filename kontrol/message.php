<?php
  include '../konek/connect.php';
  session_start();
$email=$_SESSION['email'];
$stmt = $mysqli -> prepare("select id_user from tb_user where email='$email'");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$stmt->fetch();

//$msg_time = date('h:i A M d',time()); // current time

$message=$_POST['editor1'];
$judul=$_POST['judul'];

  if (isset($_POST['editor1']) &&  strlen($_POST['editor1'])>0) {
    # co	//insert new message in db
    $q= $mysqli -> query("insert into diskusi (judul,isi,id_user,kategori) values ('$judul','$message',$id, 'C')");
  		if ($q){
        header('location:../home.php');
        break;
      }
      else {
        header('location:../home.php');
      }
          }





 ?>
