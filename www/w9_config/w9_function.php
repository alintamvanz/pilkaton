<?php
function w9_sql($kueri){
	return mysql_query($kueri);
}
function w9_sql_nums($q){
	return mysql_num_rows($q);
}
function w9_sql_array($array){
	return mysql_fetch_array($array);
}
function w9_alert($alert,$direct){
	echo "<script>";
	echo "alert('".$alert."');";
	echo "window.location.href='".$direct."';";
	echo "</script>";
}
function w9_aman($strings){ // mencegah SQL INJECTION ATTACK dan BYPASS admin Login
	 $aman_pokok = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($strings,ENT_QUOTES))));
  return $aman_pokok;
}
function w9_pass($pass){ // membuat password enskripsi dobel dobel
	$pass_aman=substr(urlencode(str_rot13(sha1(md5($pass)))),1,16);
	return $pass_aman;
}
function w9_rapih($text){
	return addslashes(strip_tags($text));
}
