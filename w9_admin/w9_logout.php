<?php
if($w9 == "logout" && $su == "biasa"){
	if(session_destroy())
		w9_alert("Anda telah keluar dari halaman administrator!","?");
}elseif ($w9 == "logout" && $su == "kunci") {
	if(w9_sql("UPDATE w9_admin SET kunci='Y' "))
		session_destroy();
		w9_alert("Akun anda telah di kunci!","?w9=logout&su=terkunci");
}elseif ($w9 == "logout" && $su == "terkunci") {
	echo "<h1> AKUN ANDA TELAH TERKUNCI </h1>";
}