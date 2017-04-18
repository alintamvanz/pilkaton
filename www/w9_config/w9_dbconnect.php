<?php
// Original code by alinko
// Database connection configuration 

define('hostname','localhost'); // sesuaikan dengan hostaname database server anda
define('username','root'); // sesuaikan username dengan database server anda
define('password','toor123'); // sesuaikan dengan password database server anda
define('database','dbpilkaton'); // sesuaikan dengan nama database yang anda buat dan sudah ter-import dbpikaton.sql

mysql_connect(hostname,username,password);
mysql_select_db(database);
?>
