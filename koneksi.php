<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
function namaBulan($bulan){
  $hasil = "";
  switch($bulan){
      case 1 :  $hasil = 'Januari'; break;
	    case 2 :  $hasil = 'Februari';break;
	    case 3 :  $hasil = 'Maret';   break;
	    case 4 :  $hasil = 'April';   break;
	    case 5 :  $hasil = 'Mei';     break;
	    case 6 :  $hasil = 'Juni';    break;
	    case 7 :  $hasil = 'Juli';    break;
	    case 8 :  $hasil = 'Agustus'; break;
	    case 9 :  $hasil = 'September';break;
	    case 10 : $hasil = 'Oktober'; break;
	    case 11 : $hasil = 'November';break;
	    case 12 : $hasil = 'Desember';break;
      default : $hasil = 'Format Salah...';
  }
  return $hasil;
}
?> 
