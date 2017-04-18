<?php
if($w9 == "suara" && $su == "index"){
$q=w9_sql("SELECT * FROM w9_calon ");
	?>
	<h1>MANAGEMENT SUARA</h1>
	<script type="text/javascript">
		function w9_konfir(){
			var cok =confirm('Apakah ada yakin?');
			if (cok == true) {
				window.location.href='?w9=suara&su=reset';
			}else{
				alert('anda kurang yakin');
			}
		}
	</script>
	<a href="javascript:;" class="w3-btn w3-teal w3-margin" onclick="w9_konfir()"><i class="fa fa-remove"></i> Reset Suara</a>
	<table class="w3-table w3-border">
		<th>No.</th><th>No. Urut</th><th>Nama Calon</th><th>Jumlah Suara</th>
		<?php
		$n=1;
		while($x=w9_sql_array($q)){
			$qx=w9_sql("SELECT * FROM w9_suara WHERE no_urut='$x[no_urut]' ");
			$c=w9_sql_array($qx);
			$jml=w9_sql_nums($qx);
			echo "<tr><td>".$n++."</td><td>".$x[no_urut]."</td><td>".$x[nama]."</td><td>".$jml."</td></tr>";
		}
		?>
	</table>
	<?php
}elseif ($w9 == "suara" && $su == "reset") {
if(w9_sql("TRUNCATE w9_suara")){
	w9_alert("Berhasil di reset!","?w9=suara&su=index");
}else{
	w9_alert("gagal di reset!","?w9=suara&su=index");
}
}