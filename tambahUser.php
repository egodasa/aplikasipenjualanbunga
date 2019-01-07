<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);


$select = "insert into user(username,pass,id_level) value ('".$_POST['username']."','".$_POST['password']."',".$_POST['level_user'].");"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolaUser.php");
?>
