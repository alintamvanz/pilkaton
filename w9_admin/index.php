<?php
session_start();
include '../www/w9_config/w9_dbconnect.php';
include '../www/w9_config/w9_function.php';
if(empty($_SESSION['user'])&&empty($_SESSION['passx'])){
include 'w9_login.php';
}else{
include 'w9_main.php';
}
?>
