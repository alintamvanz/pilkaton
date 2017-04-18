<?php
if ($w9 == "siswa" && $su == "index") {
	$q=w9_sql("SELECT * FROM w9_siswa ");
	$n=1;
	?>
	<h1>MANAGEMET SISWA</h1>
<a href="?w9=siswa&su=tambah" class="w3-teal w3-btn w3-margin"><i class="fa fa-plus"></i> Tambah data siswa</a>
<form method="post">
	<table class="w3-table w3-border">
		<th>No.</th><th>[*]</th><th>NIS</th><th>NAMA</th><th>KELAS</th><th>JURUSAN</th><th>MENCOBLOS</th><th>AKSI</th>
		<?php
		while($x=w9_sql_array($q)){
		$coblos=($x['mencoblos']=="Y") ? "Sudah" : "Belum";
	echo"<tr class='w3-hover-teal'><td>".$n++."</td><td><input type='checkbox' name='si[]' value='".$x['id']."'></td><td>".$x['nis']."</td><td>".$x['nama']."</td><td>".$x['kelas']."</td><td>".$x['jurusan']."</td><td>$coblos</td><td><a href='?w9=siswa&su=edit&id=".$x['id']."'>Edit</a>|<a href='?w9=siswa&su=delete&id=".$x['id']."'>Delete</a></td></tr>";
	}
	?>
	<tr><td colspan="8"><button type="submit" name="rm" class="w3-btn w3-teal w3-btn-block"><i class="fa fa-trash"></i> Hapus yang terpilih</button></td></tr>
	</table>
</form>
	<?php
	if(isset($_POST['rm'])){
		$rm=$_POST['si'];
		foreach ($rm as $id) {
			if(w9_sql("DELETE FROM w9_siswa WHERE id='$id' ")){
				w9_alert("Berhasil di hapus!","?w9=siswa&su=index");
			}else{
				w9_alert("Gagal di hapus!","?w9=siswa&su=index");
			}
		}
	}
}elseif ($w9 == "siswa" && $su == "tambah") {
	?>
	<h1>TAMBAH SISWA</h1>
	<script type="text/javascript">
	//  referensi : http://stackoverflow.com/questions/9719570/generate-random-password-string-with-requirements-in-javascript
	var Password = {
 
  _pattern : /[a-zA-Z0-9_\-\+\.]/,
  
  
  _getRandomByte : function()
  {
    // http://caniuse.com/#feat=getrandomvalues
    if(window.crypto && window.crypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.crypto.getRandomValues(result);
      return result[0];
    }
    else if(window.msCrypto && window.msCrypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.msCrypto.getRandomValues(result);
      return result[0];
    }
    else
    {
      return Math.floor(Math.random() * 256);
    }
  },
  
  generate : function(length)
  {
    return Array.apply(null, {'length': length})
      .map(function()
      {
        var result;
        while(true) 
        {
          result = String.fromCharCode(this._getRandomByte());
          if(this._pattern.test(result))
          {
            return result;
          }
        }        
      }, this)
      .join('');  
  }    
    
};

	</script>
	<form method="post">
		<table class="w3-table w3-border">
			<tr><td>NIS</td><td><input type="number" name="nis" class="w3-input"></td></tr>
			<tr><td>NAMA</td><td><input type="text" name="nama" class="w3-input"></td></tr>
			<tr><td>PASSWORD</td><td><input type="text" name="pw" class="w3-input" id="p"><a href="javascript:;" onclick='document.getElementById("p").value = Password.generate(10)'>Generate password</a></td></tr>
			<tr><td>JURUSAN</td><td><select name="jurusan" class="w3-teal w3-input"><option>JURUSAN</option>
			<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
			<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
			<option value="Perbankan Syariah">Perbankan Syariah</option>
			<option value="Kriya Tekstil">Kriya Tekstil</option>
			</select></td></tr>
			<tr><td>KELAS</td><td><select name="kelas" class="w3-input w3-teal"><option>KELAS</option>
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XII</option>
			</select></td></tr>
		</table>
		<input type="submit" name="submit_form" value="Tambah !" class="w3-btn w3-teal w3-btn-block">
	</form>

	<?php
	if(isset($_POST['submit_form'])){
	$nis=w9_rapih($_POST['nis']);
	$nama=w9_rapih($_POST['nama']);
	$pw=w9_pass($_POST['pw']);
	$jurusan=w9_rapih($_POST['jurusan']);
	$kelas=w9_rapih($_POST['kelas']);

		if(w9_sql("INSERT INTO w9_siswa VALUES('','$nis','$nama','$pw','$jurusan','$kelas','N')")){
			w9_alert("Berhasil ditambahkan!","?w9=siswa&su=tambah&jml=".$_GET[jml]);
		
	}else{
		  w9_alert("Gagal menambah!","?w9=siswa&su=tambah&jml=".$_GET[jml]);
	}
	}
}elseif ($w9 == "siswa" && $su=="edit") {
	$id=w9_aman(abs($_GET['id']));
	$q=w9_sql("SELECT * FROM w9_siswa WHERE id='$id'");
	$x=w9_sql_array($q);
	?>
	<h1>EDIT SISWA</h1>
	<form method="post">
	<table class="w3-table w3-border">
			<tr><td>NIS</td><td><input type="number" name="nis" class="w3-input" value="<?=$x['nis'];?>"></td></tr>
			<tr><td>NAMA</td><td><input type="text" name="nama" class="w3-input" value="<?=$x['nama'];?>"></td></tr>
			<tr><td>JURUSAN</td><td><select name="jurusan" class="w3-input w3-teal">
			<option value="<?=$x['jurusan'];?>"><?=$x['jurusan'];?></option>
			<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
			<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
			<option value="Perbankan Syariah">Perbankan Syariah</option>
			<option value="Kriya Tekstil">Kriya Tekstil</option>
			</select></td></tr>
			<tr><td>KELAS</td><td><select name="kelas" class="w3-input w3-teal"><option value="<?=$x['kelas'];?>"><?=$x['kelas'];?></option>
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XII</option>
			</select></td></tr>
			<?php
			$m_y=($x['mencoblos']=="Y") ? "checked" : "";
			$m_n=($x['mencoblos']=="N") ? "checked" : "";
			 ?>
			<tr><td>Mencoblos :</td><td><input type="radio" name="mencoblos" value="Y" <?=$m_y;?>>Sudah | <input type="radio" name="mencoblos" value="N" <?=$m_n;?>>Belum</td></tr>
		</table>
		<input type="submit" name="submit_form" value="Simpan !" class="w3-btn w3-teal w3-btn-block">
	</form>
	<?php
	if(isset($_POST['submit_form'])){
		$nis=w9_rapih($_POST['nis']);
		$nama=w9_rapih($_POST['nama']);
		$jurusan=w9_rapih($_POST['jurusan']);
		$kelas=w9_rapih($_POST['kelas']);
		$id=w9_aman(abs($_GET['id']));
		if(w9_sql("UPDATE w9_siswa SET nis='$nis',nama='$nama',jurusan='$jurusan',kelas='$kelas',mencoblos='$_POST[mencoblos]' WHERE id='$id' ")){
			w9_alert("Berhasil di ubah!","?w9=siswa&su=index");
		}else{
			w9_alert("Gagal di ubah!","?w9=siswa&su=index");
		}
	}
}elseif ($w9 == "siswa" && $su == "delete") {
	$id=w9_aman(abs($_GET['id']));
	if(w9_sql("DELETE FROM w9_siswa WHERE id='$id' ")){
		w9_alert("Berhasil di hapus!","?w9=siswa&su=insdex");
	}else{
		w9_alert("Gagal di hapus!","?w9=siswa&su=index");
	}
}