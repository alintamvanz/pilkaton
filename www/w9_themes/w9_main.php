<?php
session_start();
include 'www/w9_config/w9_dbconnect.php';
include 'www/w9_config/w9_function.php';
if(empty($_SESSION['nis'])&&empty($_SESSION['pass'])){
	include 'www/w9_login.php';
}else{
	include 'www/w9_themes/w9_theme.php';
}
?>
