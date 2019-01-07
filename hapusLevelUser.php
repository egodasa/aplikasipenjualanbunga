<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
$q= $_SERVER['QUERY_STRING'];
parse_str($q,$param);
$select = "delete from level_user where id_level=".$param['id'].";"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolaLevelUser.php");
?>
