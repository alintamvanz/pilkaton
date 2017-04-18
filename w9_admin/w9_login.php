<!DOCTYPE html>
<html>
<head>
	<title>Login Admin - Pemilihan Ketua Osis Online</title>
<link rel="icon" type="text/css" href="../www/w9_img/logo.png">
<link rel="stylesheet" type="text/css" href="../www/w9_themes/css/w3.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="smk walisongo jepara">
<meta name="description" content="Pemilihan Ketua Osis Online SMK WALISONGO JEPARA">
</head>
<body>
<div class="w3-container w3-center">
<img src="../www/w9_img/logo.png">
<h3> Pemilihan Ketua Osis Online </h3>
<p>SMK WALISONGO JEPARA</p>
<?php
$x=w9_sql("SELECT * FROM w9_admin");
$c=w9_sql_array($x);
if($c['kunci']=="N"){
	?>
<form method="POST">
     <center>
     <table class="w3-table w3-border" style="width:800px;box-shadow:2px 3px 5px #000">
       <tr><td style="width:200px">Username </td><td style="width:600px">
	<input type="text" name="user" placeholder="Username" class="w3-input w3-animate-input" style="width:69%"></td></tr>
	   <tr><td style="width:200px">Password          </td><td style="width:600px;">    
	<input type="password" name="pass" placeholder="*****" class="w3-input w3-animate-input" style="width:69%"></td></tr>
	   <tr><td colspan="2"><input type="submit" name="submit" value="Masuk" class="w3-btn w3-teal w3-btn-block"></td></tr>
	</table>
	</center>
</form>
<?php
}else{
echo "<h1 class='w3-red w3-text-shadow'> HALAMAN INI TELAH DI KUNCI </h1>";
}
?>
<br><br>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$user=w9_aman($_POST['user']);
$pass=w9_pass($_POST['pass']);
$q=w9_sql("SELECT * FROM w9_admin WHERE user='$user' AND pass='$pass' AND kunci='N' ");
$n=w9_sql_nums($q);
$a=w9_sql_array($q);
if($n > 0){
	$_SESSION['user']=$nis;
	$_SESSION['passx']=$pass;
	w9_alert('selamat datang !','?0x20');
}else{
    w9_alert('user atau password salah :3 !','?');
}
}
?>