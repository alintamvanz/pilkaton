<!DOCTYPE html>
<html>
<title>Halaman Administrator</title>
<link rel="icon" type="text/css" href="../www/w9_img/logo.png">
<link rel="stylesheet" type="text/css" href="../www/w9_themes/css/w3.css">
<link rel="stylesheet" type="text/css" href="../www/w9_themes/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/styles.js"></script>
<script type="text/javascript" src="ckeditor/build-config.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="smk walisongo jepara">
<meta name="description" content="Pemilihan Ketua Osis Online SMK WALISONGO JEPARA">
<body>
<script type="text/javascript">
  function w9_adminx(){
    var x=confirm('Apakah anda ingin mengunci akun ini?');
    if (x == false) {
      window.location.href='?w9=logout&su=biasa';
    }else{
      window.location.href='?w9=logout&su=kunci';
    }
  }
</script>
<nav class="w3-sidenav w3-collapse w3-white w3-card-2 w3-animate-left" style="width:200px;" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" 
  class="w3-closenav w3-large w3-hide-large">Close &times;</a>
  <a href="?w9" class="w3-hover-teal w3-padding"><i class="fa fa-home"></i> Home</a>
  <a href="?w9=ketentuan&su=indexXx" class="w3-hover-teal w3-padding"><i class="fa fa-gear"></i> Ketentuan</a>
  <a href="?w9=siswa&su=index" class="w3-hover-teal w3-padding"><i class="fa fa-users"></i> Menejemen siswa</a>
  <a href="?w9=calon&su=index" class="w3-hover-teal w3-padding"><i class="fa fa-user-circle"></i> Menejemen calon</a>
  <a href="?w9=suara&su=index" class="w3-hover-teal w3-padding"><i class="fa fa-volume-up"></i> Menejemen suara</a>
  <a href="?w9=admin&su=index" class="w3-hover-teal w3-padding"><i class="fa fa-user-circle-o"></i> Menejemen admin</a>
  <a href="javascript:;" onclick="w9_adminx()" class="w3-red w3-hover-teal w3-padding"><i class="fa fa-sign-out"></i> LogOut</a>
</nav>

<div class="w3-main" style="margin-left:200px">
<header class="w3-container w3-teal">
  <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</span>
  <h2><img src="../www/w9_img/logo.png" style="width:50px;height:50px"> SMK WALISONGO JEPARA</h2>
</header>

<div class="w3-container">
<?php
if(empty($_GET['w9'])){
include '../www/w9_suara.php';
?>
 <div class="w3-container">
   <div class="w3-col m3 l3 s12">
   <a href="?w9">
     <i class="fa fa-home fa-5x"></i>
     <p>Home</p>
     </a>
   </div>
   <div class="w3-col m3 l3 s12">
   <a href="?w9=ketentuan&su=index">
     <i class="fa fa-cog fa-spin fa-5x fa-fw"></i>
     <p>Jam Pelaksanaan</p>
     </a>
   </div>
   <div class="w3-col m3 l3 s12">
   <a href="?w9=siswa&su=index">
     <i class="fa fa-users fa-5x"></i>
     <p>Siswa (Pencoblos)</p>
     </a>
   </div>
   <div class="w3-col m3 l3 s12">
     <a href="?w9=calon&su=index">
     <i class="fa fa-user-circle fa-5x"></i>
     <p>Calon</p>
     </a>
     </div>
   </div>
 </div>
<?php
}else{
include 'w9_tengah.php';
}
?>
</div>
<br><br><br>
<footer class="w3-container w3-teal">
  <h5>PILKATON - SMK WALISONGO JEPARA</h5>
  <p>copyright &copy; <?=date('Y');?> All right reserved.</p>
</footer>
     
</div>

<script>
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}
</script>
     
</body>
</html>
