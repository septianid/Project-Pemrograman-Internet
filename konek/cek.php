<?php
session_start();

//jika session email belum dibuat, atau session email kosong
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    //redirect ke halaman login

    header('location:index.php');
}

?>
