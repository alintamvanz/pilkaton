<?php
if ($w9 == "admin" && $su == "index") {
	$q=w9_sql("SELECT * FROM w9_admin ");
	$x=w9_sql_array($q);
	if($x['kunci']=="N")
	   $kunci="<input type='radio' name='kunci' value='N' checked>Tidak | <input type='radio' name='kunci' value='Y'>Iya ";
	else
		$kunci="<input type='radio' name='kunci' value='N'>Tidak | <input type='radio' name='kunci' value='Y' checked>Iya ";
	?>
	<h1>ADMINISTRATOR</h1>
	<form method="post">
	<table class="w3-table w3-border">
		<tr><td>Username :</td><td><input type="text" name="user" value="<?=$x[user];?>" class="w3-input"></td></tr>
		<tr><td>Password :</td><td><input type="password" name="pass" value="" class="w3-input"></td></tr>
		<tr><td>Kunci :</td><td><?=$kunci;?></td></tr>
		<tr><td colspan="2"><input type="submit" name="sbmt" value="Simpan!" class="w3-btn w3-btn-block w3-teal"></td></tr>
	</table>
	</form>
	<?php
	if(isset($_POST['sbmt'])){
		$user=$_POST['user'];
		$pass=w9_pass($_POST['pass']);
		$kunci=$_POST['kunci'];
		if(w9_sql("UPDATE w9_admin SET user='$user',pass='$pass',kunci='$kunci'")){
 			w9_alert("Berhasil di ubah! \n anda akan keluar dari halaman ini!","?x");
 			session_destroy();
 		}else{
 			w9_alert("Gagal di ubah!","?w9=admin&su=index");
 		}
	}
}
?>
