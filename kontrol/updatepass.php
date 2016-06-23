<?php include '../konek/connect.php';

session_start();
$email=$_SESSION['email'];
$stmt = $mysqli -> prepare("select id_user,pass from tb_user where email='$email'");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$password12);
$stmt->fetch();

  $passbaru = $_POST['passbaru'];
  //$passbarucon= $_POST['konpassbaru'];
  $passlama =$_POST['passlama'];
  $hashpass = md5($passlama);
  $hashpassbaru=md5($passbaru);

  if ($hashpass == $password12) {
      $q=$mysqli -> query("UPDATE tb_user SET pass='$hashpassbaru' WHERE id_user =$id");
      if ($q) {

        header('location:../home.php?content=profilcontent&status=sukses');
        break;
      }
      else {
        header('location:../home.php?content=profilcontent&status=gagal');
        break;
      }
  }else{
    header('location:../home.php?content=profilcontent&status=salah');
    break;
  }



 ?>
