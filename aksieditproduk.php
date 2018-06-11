<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$nm_produk = $_POST['nm_produk'];
$des = $_POST['deskripsi'];
$hrg = $_POST['hrg_produk'];
$gbr = $_FILES['gambar_produk'];
$gbrn = $_FILES['gambar_produk']['name'];

$q = $_SERVER['QUERY_STRING'];
parse_str($q,$anu);
$select = "update produk set nm_produk='".$_POST['nm_produk']."',deskripsi='".$_POST['deskripsi']."',harga=".$_POST['hrg_produk'].",gambar='".$gbrn."', stok=".$_POST['stok']." where id_produk=".$anu['id_produk'].";";
mysql_query($select);
$source = $_FILES['gambar_produk']['tmp_name'];
$target = "./produk/".$gbrn;
move_uploaded_file( $source, $target );
header("Location: http://localhost/sis/kelolaProduk.php");
?>
