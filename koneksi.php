<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
?> 
