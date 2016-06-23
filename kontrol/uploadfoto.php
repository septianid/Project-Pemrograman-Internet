<?php
include '../konek/connect.php';

session_start();
$email=$_SESSION['email'];

$q=$mysqli->query();
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    header('location:../home.php?content=profilcontent&status=gambarsalah');
    break;
// if everything is ok, try to upload file
} else {
  $file_dir = substr($target_file, 3);
    $q = $mysqli->query("UPDATE tb_user set foto_user = '$file_dir' where email = '$email' ");
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file) && $q) {
        //echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
        header('location:../home.php?content=profilcontent&status=sukses');
        break;
    } else {
        //echo "Sorry, there was an error uploading your file.";
        header('location:../home.php?content=profilcontent&status=gagal');
        break;
    }
}
 ?>
