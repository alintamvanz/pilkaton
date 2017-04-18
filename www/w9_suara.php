<?php
$u=w9_sql("SELECT * FROM w9_siswa WHERE mencoblos='Y'");
$ux=w9_sql_nums(w9_sql("SELECT * FROM w9_siswa"));
$u1=w9_sql("SELECT * FROM w9_ketentuan ");
$f=w9_sql_array($u1);
$p=w9_sql_nums($u);
$t=date('H:i');
$b=($t>=$f['akhir']) ? "HASIL AKHIR !" : "HASIL PEROLEHAN SEMENTARA!";
?>
<meta http-equiv="refresh" content="5;url=">
<hr>
JAM <?=date('H:i');?><br>
<b><?=$p;?> Siswa mencoblos, dari <?=$ux;?> Siswa</b>
<form method="post">
	<select name="no" onchange="this.form.submit()" class="w3-input w3-margin">
	<option><?=$b;?></option>
		<?php
		$qx=w9_sql("SELECT * FROM w9_calon ORDER BY no_urut ASC");
		while ($xq=w9_sql_array($qx)) {
	echo "<option value='".$xq[no_urut]."'>[".$xq[no_urut]."] ".$xq[nama]."</option>";
		}
		?>
	</select>
</form>
<?php
if(isset($_POST['no'])){
$q=w9_sql("SELECT * FROM w9_suara WHERE no_urut='$_POST[no]' ");
$x=w9_sql_nums($q);
echo "<br><h3 class='w3-text-shadow'><b>".$x."</b> SUARA UNTUK NOMOR URUT ".$_POST[no]."</h3></b>";

}
$q=w9_sql("SELECT * FROM w9_calon ");
	?>
	<table class="w3-table w3-border">
		<th>No.</th><th>No. Urut</th><th>Nama Calon</th><th>Jumlah Suara</th>
		<?php
		$n=1;
		while($x=w9_sql_array($q)){
			$qx=w9_sql("SELECT * FROM w9_suara WHERE no_urut='$x[no_urut]'  ");
			$c=w9_sql_array($qx);
			$jml=w9_sql_nums($qx);
			echo "<tr><td>".$n++."</td><td>".$x[no_urut]."</td><td>".$x[nama]."</td><td>".$jml."</td></tr>";
		}
		?>
	</table>

