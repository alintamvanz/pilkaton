<?php
session_start();
include 'w9_config/w9_dbconnect.php';
include 'w9_config/w9_function.php';
if(isset($_POST['sbmt'])){
	if(empty($_POST['coblos'])){
		w9_alert('anda belum memilih!','../?');
	}else{
		$no=$_POST['coblos'];
	$kotak_suara=$_SERVER['REMOTE_ADDR'];
	$q=w9_sql("INSERT INTO w9_suara VALUES('','$kotak_suara','$no')");
	if($q){
		if(w9_sql("UPDATE w9_siswa SET mencoblos='Y' WHERE nis='$_POST[nisx]' ")){
		session_destroy();
		w9_alert('terimakasih telah menyalurkan suara anda!','../?logika_galau');
	}
}
}
}
