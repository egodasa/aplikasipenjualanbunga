<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
$user = $_POST['username'];
$password = $_POST['password'];
$nm = $_POST['nm_lengkap'];
$email = $_POST['email'];
$select = "insert into user(username,pass,email,nm_lengkap,id_level) values('$user','$password','$email','$nm',2)";
$hasil = mysql_query($select);
header("Location: http://localhost/sis/login.php");
?>



