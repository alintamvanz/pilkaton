<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua Osis Online</title>
<link rel="icon" type="text/css" href="www/w9_img/logo.png">
<link rel="stylesheet" type="text/css" href="www/w9_themes/css/w3.css">
<link rel="stylesheet" type="text/css" href="www/w9_themes/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="smk walisongo jepara">
<meta name="description" content="Pemilihan Ketua Osis Online SMK WALISONGO JEPARA">
</head>
<body>
<?php
include 'www/w9_themes/w9_header.php';
if(empty($_GET['w9'])){
	?>
<div class="w3-row">
	<?php
$q=w9_sql("SELECT * FROM w9_calon ORDER BY no_urut ASC");
while($c=w9_sql_array($q)){
	?>
	<div class="w3-col m3 l3"><div class="w3-card-12 w3-margin">
	<img src="www/w9_img/foto_calon/<?=$c['foto'];?>" style="width:300px;height:300px;" class="w3-circle w3-hover-opacity" onclick="document.getElementById('<?=$c[id];?>').style.display='block';" title="Click for details">
	<p><?=$c[no_urut];?> | <?=$c[nama];?></p>
<div id="<?=$c['id'];?>" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('<?=$c[id];?>').style.display='none';"
      class="w3-closebtn">&times;</span>
      <table class="w3-table w3-border">
      <tr><td style="width:200px;height:200px;"><img src="www/w9_img/foto_calon/<?=$c[foto];?>" style="width:200px;height:200px;"></td><td><center><h1>No. Urut <b><?=$c['no_urut'];?></b></h1>
      <br>
      <p><?=$c['profile'];?></p>
      </center></td></tr>
      <tr><td colspan="2"><h1><?=$c[nama];?></h1></td></tr>
      <tr><td style="width:200px;">Visi :</td><td><?=$c['visi'];?></td></tr>
      <tr><td style="width:200px;">Misi :</td><td><?=$c['misi'];?></td></tr>
      </table>
    </div>
  </div>
</div>
	</div></div>
	<?php
}
?>
<br><br>
<a href="?w9=login" class="w3-btn w3-btn-block w3-teal w3-margin" >Mulai Mencoblos</a>
</div>
</div>
<?php
}else{
	if($_GET['w9']=='login'){
?>
<div class="w3-container w3-center w3-animate-right"  >

<form method="POST" class="w3-margin">
     <center>
     <table class="w3-table w3-border" style="width:800px;box-shadow:2px 3px 5px #000">
       <tr><td style="width:200px">Nomor Induk Siswa </td><td style="width:600px">
	<input type="text" name="nis" placeholder="NIS" class="w3-input w3-animate-input" style="width:69%"></td></tr>
	   <tr><td style="width:200px">Password          </td><td style="width:600px;">    
	<input type="password" name="pass" placeholder="*****" class="w3-input w3-animate-input" style="width:69%"></td></tr>
	   <tr><td colspan="2"><input type="submit" name="submit" value="Masuk" class="w3-btn w3-teal w3-btn-block"></td></tr>
	</table>
	</center>
</form>
<br><br>
<?php
}elseif($_GET['w9']=='suara'){
echo'
<div class="w3-container w3-center w3-animate-right"  >';
include 'www/w9_suara.php';
}
}
include 'www/w9_themes/w9_footer.php'; 
?>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$nis=w9_aman($_POST['nis']);
$pass=w9_pass($_POST['pass']);
$q=w9_sql("SELECT * FROM w9_siswa WHERE nis='$nis' AND password='$pass' AND mencoblos='N' ");
$n=w9_sql_nums($q);
$a=w9_sql_array($q);
$qi=w9_sql("SELECT * FROM w9_ketentuan");
$aa=w9_sql_array($qi);
$time=date('H:i');
if($time>=$aa['akhir']){
w9_alert('anda gak bisa login \n waktu telah habis','?w9=login');
}else{
if($n > 0){
	$_SESSION['nis']=$nis;
	$_SESSION['pass']=$pass;
	w9_alert('selamat datang ! \n silahkan mencoblos.','?x=');
}else{
    w9_alert('nis atau password salah :3 !','?');
}
}
}
?>
