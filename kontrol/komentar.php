<?php
  include '../konek/connect.php';

session_start();
  $email=$_SESSION['email'];
  $stmt = $mysqli -> prepare("select id_user from tb_user where email='$email'");
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id);
  $stmt->fetch();

$id_diskusi=$_POST['id_pertanyaan'];
$isi=$_POST['editor1'];

if (isset($_POST['editor1']) &&  strlen($_POST['editor1'])>0) {
  # co	//insert new message in db
  $q= $mysqli -> query("insert into komentar (isi_komentar,id_user,id_diskusi) values ('$isi',$id,$id_diskusi)");
    if ($q){
      header('location:../home.php?content=diskusicomment&question='.$id_diskusi);
      break;
    }
    else {
      header('location:../home.php');
    }
        }

 ?>
