<?php
$host = "localhost";
$username = "root";
$password = "mysql";
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
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
function rupiah($nilai, $simbol = "Rp", $spasi_rupiah = "", $dibelakang_koma = 0, $penutup = "")
{
   // $penutup = ,-
   // $dibelakang_koma = 2 -> ,00
  return $simbol.$spasi_rupiah.number_format($nilai,$dibelakang_koma,',','.').$penutup;
}
function tanggal_indo_waktu($waktu, $hari = false){
  $bagian = explode(" ", $waktu);
  $tanggal = tanggal_indo($bagian[0], $hari);
  return $tanggal." ".$bagian[1];
}
function tanggal_indo_bulan_tahun($tanggal){
   $waktu = explode(" ", tanggal_indo_waktu($tanggal));
   return $waktu[1]." ".$waktu[2];
}
function alertBootstrap($jenis_alert = "success", $judul = "Pesan!", $isi_pesan = "Isi Pesan."){
   $icon_alert = array(
      "success" => "check",
      "warning" => "warning",
      "info" => "info",
      "danger" => "ban",
   );
   return "<div class='alert alert-".$jenis_alert." alert-dismissible'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
   <h4><i class='icon fa fa-".$icon_alert['$jenis_alert']."'></i> ".$judul."</h4>
   ".$isi_pesan."
   </div>";
}
?> 
