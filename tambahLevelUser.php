<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);


$select = "insert into level_user(nm_level) value ('".$_POST['nm_level']."');"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolaLevelUser.php");
?>
