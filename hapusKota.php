<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
$q= $_SERVER['QUERY_STRING'];
parse_str($q,$param);
$select = "delete from kota where id_kota=".$param['id_kota'].";"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolakota.php");
?>
