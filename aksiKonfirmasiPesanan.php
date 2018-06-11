<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$id_pesan = $_POST['id_pesan'];
$nm_pembayar = $_POST['nm_pembayar'];
$no_rekening = $_POST['no_rekening'];
$gbr = $_FILES['bukti_pembayaran'];
$gbrn = $_FILES['bukti_pembayaran']['name'];

$select = "insert into konfirmasi_pesanan (id_pesan,nm_pembayar,no_rekening,gambar_bukti) values ($id_pesan,'$nm_pembayar','$no_rekening','$gbrn');"; 
mysql_query($select);
$source = $_FILES['bukti_pembayaran']['tmp_name'];
$target = "./bayar/".$gbrn;
move_uploaded_file( $source, $target );
header("Location: http://localhost/sis/daftarTransaksi.php");
?>
