<?php
$w9=$_GET['w9'];
$su=$_GET['su'];
if ($w9 == "ketentuan") {
	include 'w9_actz/w9_ketentuan.php';
}elseif ($w9 == "siswa") {
	include 'w9_actz/w9_siswa.php';
}elseif ($w9 == "calon") {
	include 'w9_actz/w9_calon.php';
}elseif ($w9 == "suara") {
	include 'w9_actz/w9_suara.php';
}elseif ($w9 == "admin") {
	include 'w9_actz/w9_admin.php';
}elseif ($w9 == "logout") {
	include 'w9_logout.php';
}
?>