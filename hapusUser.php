<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
$q= $_SERVER['QUERY_STRING'];
parse_str($q,$param);
$select = "delete from user where id_user=".$param['id_user'].";"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolaUser.php");
?>
