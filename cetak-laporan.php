<?php
include "db.php";
require "./koneksi.php";
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$judul = null;
$head = "<h2>Toko Buk May Flower</h2>";
$alamat = "Jl.Khatib Sulaiman Padang";
$awal = date('Y-m-d');
$akhir = date('Y-m-d');
if(isset($_GET['awal'])) $awal = $_GET['awal'];
if(isset($_GET['akhir'])) $akhir = $_GET['akhir'];

if(isset($_GET['laporan'])){
    switch($_GET['laporan']){
        case "harian" : 
            $tableConf = array(
                array(
                    "name"		=>	"nm_lengkap",
                    "caption"	=>	"Nama Pemesan"
                ),
                array(
                    "name"		=>	"tgl_pesan",
                    "caption"	=>	"Tanggal Pesan"
                ),
                array(
                    "name"		=>	"nm_produk",
                    "caption"	=>	"Nama Produk"
                ),
                array(
                    "name"		=>	"jumlah",
                    "caption"	=>	"Jumlah Pesan"
                ),
                array(
                    "name"		=>	"total_harga",
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Laporan Penjualan Hari ".date("l, d F Y");
            $dataTable = $db->sql('select *,b.nm_lengkap,(pesanan.jumlah * c.harga) as total_harga from pesanan join produk on pesanan.id_produk = produk.id_produk join user b on pesanan.id_user = b.id_user join produk c on pesanan.id_produk = c.id_produk where day(tgl_pesan) = day(now())')->many();
        break;
        case "bulanan" : 
            $tableConf = array(
                array(
                    "name"		=>	"id_pesan",
                    "caption"	=>	"No Faktur"
                ),
                array(
                    "name"		=>	"bulan",
                    "caption"	=>	"Bulan"
                ),
                array(
                    "name"		=>	"nm_produk",
                    "caption"	=>	"Nama Produk"
                ),
                array(
                    "name"		=>	"jumlah",
                    "caption"	=>	"Jumlah"
                ),
                array(
                    "name"		=>	"harga",
                    "caption"	=>	"Harga"
                ),
                array(
                    "name"		=>	"total_harga",
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Laporan Penjualan Bulan ".date("F Y");
            $dataTable = $db->sql('select a.id_pesan, month(a.tgl_pesan) as bulan, a.jumlah, c.harga, c.nm_produk, sum(a.jumlah*c.harga) as `total_harga` from pesanan a join user b on a.id_user = b.id_user join produk c on a.id_produk = c.id_produk where month(a.tgl_pesan) = month(now()) and year(a.tgl_pesan) = year(now())')->many();
        break;
        case "tahunan" : 
            $tableConf = array(
                array(
                    "name"		=>	"bulan",
                    "caption"	=>	"Bulan"
                ),
                array(
                    "name"		=>	"jumlah",
                    "caption"	=>	"Jumlah"
                ),
                array(
                    "name"		=>	"total_pesanan",
                    "caption"	=>	"Total Pesanan"
                ),
                array(
                    "name"		=>	"total_harga",
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Laporan Penjualan Tahun ".date("Y");
            $dataTable = $db->sql('select month(a.tgl_pesan) as `bulan`,sum(a.jumlah) as jumlah,count(a.id_pesan) as total_pesanan,sum(a.jumlah*c.harga) as `total_harga` from pesanan a join user b on a.id_user = b.id_user join produk c on a.id_produk = c.id_produk where year(a.tgl_pesan) = year(now()) group by month(a.tgl_pesan)')->many();
        break;
    }
}else{
    $tableConf = array(
        array(
            "name"		=>	"nm_lengkap",
            "caption"	=>	"Nama Pemesan"
        ),
        array(
            "name"		=>	"tgl_pesan",
            "caption"	=>	"Tanggal Pesan"
        ),
        array(
            "name"		=>	"nm_produk",
            "caption"	=>	"Nama Produk"
        ),
        array(
            "name"		=>	"jumlah",
            "caption"	=>	"Jumlah Pesan"
        ),
        array(
            "name"		=>	"total_harga",
            "caption"	=>	"Total Pemasukan"
        )
    );
    if(!isset($_GET['awal'])){
    $judul = "Laporan Penjualan Keseluruhan";
	$dataTable = $db->sql('select a.*,b.nm_lengkap,(a.jumlah*c.harga) as `total_harga` from pesanan a join user b on a.id_user = b.id_user join produk c on a.id_produk = c.id_produk')->many();
    }else{
        $judul = "Laporan Dari Tanggal $awal - $akhir";
        $dataTable = $db->sql('select a.*,b.nm_lengkap,(a.jumlah*c.harga) as `total_harga` from pesanan a join user b on a.id_user = b.id_user join produk c on a.id_produk = c.id_produk where a.tgl_pesan between "'.$awal.'" and "'.$akhir.'"')->many();
    }
}
$html = '';
$html .= '<style>
body{
	font-family: Arial;
}
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    margin: 0 auto;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 3px;
}
h1, h2, p{
	text-align: center;
}
.ttd{
    width: 150px;
    float: right;
    text-align: center;
}
</style>';
$html .='<h2>'.$head.'</h2>';
$html .='<p>'.$alamat.'</p>';
$html .='<p>'.$judul.'</p>';
$html .='<hr>';
$html .= '<table class="table table-hover">
<thead>
	<tr>
		<th>No</th>';
		
foreach($tableConf as $t){
	$html .= "<th>".$t['caption']."</th>";
}
$html .= '</tr>
</thead>
<tbody>';

$no = 1;
$total = 0;
if(count($dataTable) == 0){
	$html .= "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		$html .= "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'total_harga' || $t['name'] == 'harga'){
				$html .= "<td>Rp ".number_format($r[$t['name']],2,',','.')."</td>";
			}else if($t['name'] == 'bulan'){
                $html .= "<td>".namaBulan($r[$t['name']])."</td>";
            }else $html .= "<td>".$r[$t['name']]."</td>";
		}
		$no++;
		$total += $r['total_harga'];
		$html .= "</tr>";
	}
	$html .= "
	<tfoot>
	<tr>
	<td colspan=".(count($tableConf)).">Total</td>
	<td>Rp ".number_format($total,2,',','.')."</td>
	</tr></tfoot>";
}
$html .= '</tbody>	
</table>';

$html .= "<br/><br/><br/><div class='ttd'>Padang, ".date("d-m-Y")."<br/><br/><br/> Mengetahui</div>";

//~ echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
