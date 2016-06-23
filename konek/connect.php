<?php

  $host = '127.0.0.1';
  $username ='root';
  $password = '';
  $db = 'fogrammer';

  $mysqli = new mysqli($host, $username, $password, $db);

  if ($mysqli->connect_error) {
    die("koneksi gagal". $conn->connect_error);
  }

?>
