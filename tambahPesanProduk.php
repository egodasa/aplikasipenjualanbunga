<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$alamat = $_POST['alamat'];
$nomor_hp = $_POST['nomor_hp'];
$id_produk = $_POST['id_produk'];
$id_kota = $_POST['kota'];
$id_user = $_SESSION['id_user'];
$jumlah = $_POST['jumlah'];
if($_SESSION['level'] == 'Admin'){
	$select = "insert into pesanan (id_produk,id_user,alamat,nomor_hp,id_kota,jumlah,status) values($id_produk,$id_user,'$alamat','$nomor_hp',$id_kota,$jumlah,'Sudah Selesai');";
}else{
	$select = "insert into pesanan (id_produk,id_user,alamat,nomor_hp,id_kota,jumlah) values($id_produk,$id_user,'$alamat','$nomor_hp',$id_kota,$jumlah);";
} 
mysql_query($select);
mysql_query("update produk set stok = stok - $jumlah where id_produk = $id_produk;");
header("Location: http://localhost/sis/home.php");
?>
	
