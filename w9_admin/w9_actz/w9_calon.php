<?php
if($w9 == "calon" && $su == "index"){
	$q=w9_sql("SELECT * FROM w9_calon ");
	?>
	<script type="text/javascript">
	function w9_buka(id){
		document.getElementById(id).style.display='block';
	}
	function w9_tutup(id){
		document.getElementById(id).style.display='none';
	}
</script>
	<a href="?w9=calon&su=tambah" class="w3-teal w3-btn w3-margin"><i class="fa fa-plus"></i> Tambah Calon Osis</a>
	<form method="post">
	<table class="w3-table w3-border">
		<th>No.</th><th>[*]</th><th>Foto</th><th>No Urut</th><th>Nama Calon</th><th>Aksi</th>
	<?php
	$n=1;
	while($i=w9_sql_array($q)){
		echo "<tr><td>".$n++."</td><td><input type='checkbox' name='si[]' value='".$i[id]."'></td>";
		echo "<td><img class='w3-circle w3-hover-opacity' src='../www/w9_img/foto_calon/".$i[foto]."' style='width:100px;height:100px'></td>";
		echo "<td><b>".$i[no_urut]."</b></td><td>".$i[nama]."</td>";
		echo "<td><a href='javascript:;' onclick=\"w9_buka('id_".$i[id]."')\">Detail</a>|<a href='?w9=calon&su=edit&id=".$i[id]."'>Edit</a>|<a href='?w9=calon&su=delete&id=".$i[id]."&img=".$i[foto]."'>Delete</a></td></tr>";
		echo "<div class='w3-modal' id='id_".$i[id]."'>";
		echo "<div class='w3-modal-content'>";
		echo "<div ckass='w3-container w3-margin'>";
		echo "<span onclick=\"w9_tutup('id_".$i[id]."')\"
      class=\"w3-closebtn\">&times;</span>";
        echo "<center>";
        echo "<img src='../www/w9_img/foto_calon/".$i[foto]."' style='width:200px;200px'>";
        echo "<h1><b> ".$i['no_urut']."</b></h1>";
        echo "<h3> ".$i['nama']."</h3>";
        echo "<p> PROFILE : <br><hr> ".$i['profile']."</p>";
        echo "<p> VISI : <br><hr> ".$i['visi']."</p>";
        echo "<p> MISI : <br><hr> ".$i['misi']."</p>";
      echo "</div></div></div>";
	}
	?>
	<tr><td colspan="6"><button type="submit" name="rmx" class="w3-teal w3-btn w3-btn-block"><i class="fa fa-trash"></i> Hapus yang terpilih</button></td></tr>
	</table>
	</form>
	<?php
	if(isset($_POST['rmx'])){
		$cok=$_POST['si'];
	foreach($cok as $id){
		if(w9_sql("DELETE FROM w9_calon WHERE id='$id'"))
			w9_alert("Berhasil di hapus!","?w9=calon&su=index");
		else
			w9_alert("Gagal di hapus!","?w9=calon&su=index");
	}
}
}elseif ($w9 == "calon" && $su == "tambah") {
	?>
	<h1>TAMBAH CALON OSIS</h1>
	<form method="post" enctype="multipart/form-data">
	<table class="w3-table w3-border">
	<tr><td>Nama </td><td><input type="text" name="nama" class="w3-input"></td></tr>
	<tr><td>No.Urut </td><td><input type="number" name="no_urut" class="w3-input"></td></tr>
	<tr><td>Foto  </td><td><input type="file" name="foto" class="w3-input" ></td></tr>
	<tr><td>Profile </td><td><textarea name="profile" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;"></textarea></td></tr>
	<tr><td>Visi </td><td><textarea name="visi" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;"></textarea></td></tr>
	<tr><td>Misi </td><td><textarea name="misi" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;"></textarea></td></tr>
	<tr><td colspan="2"><input type="submit" name="sbmt" value="Tambah!" class="w3-teal w3-btn w3-btn-block"></td></tr>
	</table>
	</form>
	<?php
	if(isset($_POST['sbmt'])){
		$nama=w9_rapih($_POST['nama']);
		$no=$_POST['no_urut'];
		$visi=$_POST['visi'];
		$misi=$_POST['misi'];
		$profile=$_POST['profile'];
		if(empty($_FILES['foto']['tmp_name']))
			$foto = "calon-default.png";
		else
			$foto=$_FILES['foto']['name'];
			$upload="../www/w9_img/foto_calon/".$foto;
			if(move_uploaded_file($_FILES['foto']['tmp_name'],$upload))
		        if(w9_sql("INSERT INTO w9_calon VALUES('','$nama','$no','$visi','$misi','$profile','$foto')"))
			       w9_alert("berhasil di tambahkan!","?w9=calon&su=index");
			else
				w9_alert("Gagal Upload !","?w9=calon&su=tambah");


	}
}elseif ($w9 == "calon" && $su == "delete") {
	$id=w9_aman(abs($_GET['id']));
	if(w9_sql("DELETE FROM w9_calon WHERE id='$id'")){
		@unlink("../www/w9_img/foto_calon/".$_GET['img']);
		w9_alert("berhasil di hapus!","?w9=calon&su=index");
	}
	else{
		w9_alert("gagal di hapus!","?w9=calon&su=index");
	}
}elseif ($w9 == "calon" && $su == "edit") {
$id=w9_aman(abs($_GET['id']));
$q=w9_sql("SELECT * FROM w9_calon WHERE id='$id'");
$x=w9_sql_array($q);
	?>
	<h1>EDIT CALON OSIS</h1>
	<form method="post" enctype="multipart/form-data">
	<table class="w3-table w3-border">
	<tr><td colspan="2"><img src="../www/w9_img/foto_calon/<?=$x['foto'];?>" style="width:100px;height: 100px;" class="w3-circle"></td></tr>
	<tr><td>Nama </td><td><input type="text" name="nama" class="w3-input" value="<?=$x['nama'];?>"></td></tr>
	<tr><td>No.Urut </td><td><input type="number" name="no_urut" class="w3-input" value="<?=$x['no_urut'];?>"></td></tr>
	<input type="hidden" name="fotox" value="<?=$x['foto'];?>">
	<tr><td>Foto  </td><td><input type="file" name="foto" class="w3-input" ></td></tr>
	<tr><td>Profile </td><td><textarea name="profile" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;"><?=$x['profile'];?></textarea></td></tr>
	<tr><td>Visi </td><td><textarea name="visi" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;"><?=$x['visi'];?>
	</textarea></td></tr>
	<tr><td>Misi </td><td><textarea name="misi" class="w3-code w3-teal ckeditor" style="width:100%;height:200px;resize: none;">
	<?=$x['misi'];?>
	</textarea></td></tr>
	<tr><td colspan="2"><input type="submit" name="sbmt" value="Simpan !" class="w3-teal w3-btn w3-btn-block"></td></tr>
	</table>
	</form>
	<?php
		if(isset($_POST['sbmt'])){
		$id=w9_aman(abs($_GET['id']));
		$nama=w9_rapih($_POST['nama']);
		$no=$_POST['no_urut'];
		$visi=$_POST['visi'];
		$misi=$_POST['misi'];
		$profile=$_POST['profile'];
		if(empty($_FILES['foto']['tmp_name']))
			$foto = $_POST['fotox'];
		else
			$foto=$_FILES['foto']['name'];
			$upload="../www/w9_img/foto_calon/".$foto;
			if(move_uploaded_file($_FILES['foto']['tmp_name'],$upload))
				@unlink("../www/w9_img/foto_calon/".$_POST['fotox']);
		        if(w9_sql("UPDATE w9_calon SET nama='$nama',no_urut='$no',visi='$visi',misi='$misi',profile='$profile',foto='$foto' WHERE id='$id'"))
			       w9_alert("berhasil di ubah!","?w9=calon&su=index");
			else
				w9_alert("Gagal Upload !","?w9=calon&su=tambah");


	}
}