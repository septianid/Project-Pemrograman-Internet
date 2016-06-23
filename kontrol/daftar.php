<?php
    include '../konek/connect.php';

/* Tangkap data */
    $nama= $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //cek data yang dikirim, apakah kosong atau tidak
    if (empty($email) && empty($password)) {
        //kalau email dan password kosong
        header('location:../signup.php?error=1');
        break;
    } else if (empty($email)) {
        //kalau email saja yang kosong
        header('location:../signup.php?error=2');
        break;
    } else if (empty($password)) {
        //kalau password saja yang kosong
        //redirect ke halaman index
        header('location:../signup.php?error=3');
        break;
    }
    $hashpass=md5($password);

    $q = $mysqli->query("insert into tb_user (nama_user, email, pass) values ('$nama', '$email', '$hashpass')");


    if ($q) {
        //kalau email dan password sudah terdaftar di database
        header('location:../signup.php?sukses=1');
    } else {
        //kalau email ataupun password tidak terdaftar di database
        header('location:../signup.php?sukses=0');
    }

 ?>
