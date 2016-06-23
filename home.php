
<?php
session_start();

//jika session email belum dibuat, atau session email kosong
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    //redirect ke halaman login

    header('location:index.php');
}



 include "konek/connect.php"; 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title> FOGRAMMER </title>
    <link rel="icon" type="image/png" href="assets/img/icons/login-w-icon.png" />
    <meta charset="utf-8">
    <meta content="width=device-width, inital-scale=1, maximum-scale=1, user-scalable=no" name="viewport" >
    <!--load css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/js/ckeditor/plugins/codesnippet/lib/highlight/styles/paraiso.dark.css">
     <script src="assets/js/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
     <script>hljs.initHighlightingOnLoad();</script>


  </head>
  <body>
    <nav class="navbar navbar-fixed-top" >
      <div class="container-fluid container-home" >
        <div class="col-md-5 col-xs-5">
          <div class="navbar-header">
              <a class="navbar-brand" href="home.php" style="color:#c28dcf;font-size:25pt;font-weight:800">Fogrammer</a>
          </div>
          <ul class="nav nav-pills" style="margin-top:5px;">
            <li role="presentation" class="active"><a href="?content=homecontent">Home</a></li>
            <li role="presentation" class="active"><a href="?content=profilcontent">Profile</a></li>
            <!--li role="presentation"class="active"><a href="?content=diskusicontent">Diskusi</a></li-->

</ul>
        </div>

        <div class="col-md-5">
          <form class="navbar-form navbar-right" role="search" style="margin-right:0px;">

          </form>
        </div>
        <div class="col-md-2 col-xs-2">
<form class="" action="logout.php" method="post">
  <button type="submit" class="btn btn-default navbar-right " style="margin-top:10px;">
    <span class="glyphicon glyphicon-off" aria-hidden="false"></span>
  </button>
</form>

        </div>
      </div>
  </nav>

<?php
if (isset($_REQUEST['content'])) {
  $content=$_REQUEST['content'];
  switch ($content) {
    case 'homecontent':
      include "konten/homecontent.php";
      break;
    case 'profilcontent':
      include "konten/profilcontent.php";
      break;
  //  case 'diskusicontent':
    //  include "konten/daftarpertanyaan.php";
      //break;
      case 'diskusicomment':
        include "konten/diskusi.php";
        break;
    default:
      # code...
      break;
  }
}
else {
  include "konten/homecontent.php";
}
 ?>





  <!-- load jquery-->
  <script src="assets/js/jQuery.js"></script>
  <!-- Load js bootstrap-->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/validate.js"></script>
  <script src="assets/js/ckeditor/ckeditor.js"></script>



  <script>

  var config = {
			extraPlugins: 'codesnippet',
			codeSnippet_theme: 'monokai_sublime'
		};
		CKEDITOR.replace( 'editor1', config );
    //CKEDITOR.replace( 'editor2', config );


    /*window.onload = function () {
      document.getElementById("passbaru").onchange = validatePassword;
      document.getElementById("passbarucon").onchange = validatePassword;
    }
    function validatePassword(){
    var pass2=document.getElementById("passbaru").value;
    var pass1=document.getElementById("passbarucon").value;
    if(pass1!=pass2)
      document.getElementById("passbaru").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("passbarucon").setCustomValidity('');
    //empty string means no validation error
  }*/

  </script>


  </body>
</html>
