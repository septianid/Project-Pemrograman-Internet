<?php
include ("konek/connect.php");

//lanjutkan session yang sudah dibuat sebelumnya
session_start();
$email =$_SESSION['email'];

//hapus session yang sudah dibuat
session_destroy();

//redirect ke halaman login
header('location:index.php'); ?>
