<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua Osis Online - SMK WALISONGO JEPARA</title>
<link rel="icon" type="text/css" href="www/w9_img/logo.png">
<link rel="stylesheet" type="text/css" href="www/w9_themes/css/w3.css">
<link rel="stylesheet" type="text/css" href="www/w9_themes/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="smk walisongo jepara">
<meta name="description" content="Pemilihan Ketua Osis Online SMK WALISONGO JEPARA">
</head>
<body>
<div class="w3-container">
<div class="w3-row">
	<div class="w3-col m3 l3 s12"><img src="www/w9_img/logo.png" style="width:200px;height:200px;"></div>
	<div class="w3-col m6 l6 s12 w3-center">
		<h1>SMK WALISONGO JEPARA</h1>
		<h2>PEMILIHAN KETUA OSIS ONLINE 2017/2018</h2>
<?php
$q=w9_sql("SELECT * FROM w9_siswa WHERE nis='$_SESSION[nis]' ");
$c=w9_sql_array($q);
echo "INFO PEMILIH : ".$c['nis']." | ".$c['nama']." | ".$c['kelas']." | ".$c['jurusan'];
?>
</div>
<div class="w3-col m3 l3  s12">
<img src="www/w9_img/pemilu.png" style="width:200px;height:200px;">
</div>
</div>
<br><br>
<div class="w3-row">
<form method="post" action="www/w9_coblos.php">
<input type="hidden" name="nisx" value="<?=$_SESSION['nis'];?>">
<?php
$q2=w9_sql("SELECT * FROM w9_calon ORDER BY no_urut ASC ");
while($p=w9_sql_array($q2)){
?>
<script type="text/javascript">
	function w9_buka(id){
		document.getElementById(id).style.display='block';
	}
	function w9_tutup(id){
		document.getElementById(id).style.display='none';
	}
</script>
<?php
echo "<div class=\"w3-col m3 l3 s12\">";
echo "<div class='w3-tooltip'>";
echo "<h4 style=\"position:relative;top:0;left:0;\">".$p['no_urut']." | <span class='w3-text'>".$p['nama']."</span></h4>";
echo "<img src=\"www/w9_img/foto_calon/".$p['foto']."\" style=\"width:200px;height:200px;\" onclick=\"w9_buka('id_".$p['id']."')\" class=\"w3-circle w3-hover-opacity\" title=\"Click for more details\">";
echo "<input type=\"radio\" name=\"coblos\" value=\"".$p['no_urut']."\">";
echo "</div>";
echo "</div>";
?>
<div id="id_<?=$p['id'];?>" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="w9_tutup('id_<?=$p[id];?>')"
      class="w3-closebtn">&times;</span>
      <table class="w3-table w3-border">
      <tr><td style="width:200px;height:200px;"><img src="www/w9_img/foto_calon/<?=$p[foto];?>" style="width:200px;height:200px;"></td><td><center><h1>No. Urut <b><?=$p['no_urut'];?></b></h1>
      <br>
      <p><?=$p['profile'];?></p>
      </center></td></tr>
      <tr><td colspan="2"><h1><?=$p[nama];?></h1></td></tr>
      <tr><td style="width:200px;">Visi :</td><td><?=$p['visi'];?></td></tr>
      <tr><td style="width:200px;">Misi :</td><td><?=$p['misi'];?></td></tr>
      </table>
    </div>
  </div>
</div>
<?php
}
?>
<button type="submit" name="sbmt" class="w3-btn w3-teal w3-btn-block w3-margin"><i class="fa fa-pencil"></i> COBLOS ! </button>
</form>
<br><br><br>
</div>
<?php include 'www/w9_themes/w9_footer.php'; ?>
</div>
</body>
</html>
