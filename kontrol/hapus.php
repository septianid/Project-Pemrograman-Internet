<?php

  include ("../konek/connect.php");
  $id = $_REQUEST['id'];

  $q = $mysqli->query("DELETE from diskusi where id_diskusi = $id");
  if ($q) {
    header('location: ../home.php?status=sukses');
    break;
  }
  else{
    header('location: ../home.php?status=gagal');
    break;
  }

 ?>
