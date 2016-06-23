function myfunction(){
  var pass1= document.getElementById("pass").value;
  var pass2= document.getElementById('rePass').value;
  if (pass1 != pass2) {
      //alert("Passwords Do not match");
      document.getElementById("pass").style.borderColor= "#E34234";
      document.getElementById("rePass").style.borderColor = "#E34234";
      document.getElementById("pass").value="";
      document.getElementById("rePass").value = "";
  }
  else {
      //alert("Passwords Match!!!");
  }

}

$(".close").click(function(){

      $(".close").fadeOut("slow");
     });

$('#collapseExample').collapse({
toggle:false
});
