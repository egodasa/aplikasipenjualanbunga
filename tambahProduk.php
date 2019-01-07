<?php
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$nm_produk = $_POST['nm_produk'];
$des = $_POST['deskripsi'];
$hrg = $_POST['hrg_produk'];
$gbr = $_FILES['gambar_produk'];
$gbrn = $_FILES['gambar_produk']['name'];

$select = "insert into produk (nm_produk,deskripsi,harga,gambar) values ('$nm_produk','$des',$hrg,'$gbrn');"; 
mysql_query($select);
$source = $_FILES['gambar_produk']['tmp_name'];
$target = "./produk/".$gbrn;
move_uploaded_file( $source, $target );
header("Location: http://localhost/sis/kelolaProduk.php");
?>
