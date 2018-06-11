<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);

$q= $_SERVER['QUERY_STRING'];
parse_str($q,$param);
$id = $param['id_pesan'];
if($param['status'] == "terima"){
	$select="update konfirmasi_pesanan set status='Diterima' where id_pesan=$id;";
	$select2="update pesanan set status='Sudah Selesai' where id_pesan=$id;";
	mysql_query($select2);
}else {
	$select="update konfirmasi_pesanan set status='Ditolak' where id_pesan=$id;";
}
mysql_query($select);
header("Location: http://localhost/sis/daftarPesanan.php");
?>
