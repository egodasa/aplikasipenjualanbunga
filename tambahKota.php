<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$nm_kota = $_POST['nm_kota'];
$tarif = $_POST['tarif'];


$select = "insert into kota (nm_kota,tarif) values ('$nm_kota',$tarif);"; 
mysql_query($select);
header("Location: http://localhost/sis/kelolakota.php");
?>
