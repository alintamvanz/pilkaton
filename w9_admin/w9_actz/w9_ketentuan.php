<?php

if($w9 == "ketentuan"){
$q=w9_sql("SELECT * FROM w9_ketentuan ");
$p=w9_sql_array($q);
	?>
<h1>KETENTUAN PEMILU</h1>
<form method="post">
<table class="w3-table w3-border">
	<tr><td>mulai pemilu :</td><td><input type="text" name="mulai" value="<?=$p['mulai'];?>" class="w3-input"></td></tr>
	<tr><td>akhir pemilu :</td><td><input type="text" name="akhir" value="<?=$p['akhir'];?>" class="w3-input"></td></tr>
	<tr><td colspan="2"><input type="submit" name="sbmt" value="Simpan" class="w3-btn w3-teal w3-btn-block"></td></tr>
</table>
</form>
	<?php
	if(isset($_POST['sbmt'])){
		$mulai=w9_rapih($_POST['mulai']);
		$akhir=w9_rapih($_POST['akhir']);
		$q=w9_sql("UPDATE w9_ketentuan SET mulai='$mulai',akhir='$akhir' ");
		if($q){
			w9_alert("Berhasil di perbarui!","?w9=ketentuan");
		}else{
			w9_alert("Gagal di perbarui!","?w9=ketentuan");
		}
	}
}