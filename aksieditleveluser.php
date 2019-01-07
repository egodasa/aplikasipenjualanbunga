<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$q = $_SERVER['QUERY_STRING'];
parse_str($q,$anu);
$select = "update level_user set nm_level='".$_POST['nm_level']."' where id_level=".$anu['id_level']."; "; 
mysql_query($select);
header("Location: http://localhost/sis/kelolaLevelUser.php");
?>
