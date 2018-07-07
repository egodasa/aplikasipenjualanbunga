<?php
include "db.php";
require "./koneksi.php";
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$judul = null;
$head = "<h2>Toko Buk May Flower</h2>";
$alamat = "Jl.Khatib Sulaiman Padang";
$tableConf = array(
    array(
        "name"		=>	"nm_produk",
        "caption"	=>	"Nama Produk"
    ),
    array(
        "name"		=>	"harga",
        "caption"	=>	"Harga"
    ),
    array(
        "name"		=>	"stok",
        "caption"	=>	"Sisa Stok"
    )
);
$judul = "Laporan Stok Produk Per ".date("d F Y");
$dataTable = $db->sql('select * from produk')->many();
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
			if($t['name'] == 'harga'){
				$html .= "<td>Rp ".number_format($r[$t['name']],2,',','.')."</td>";
			}else $html .= "<td>".$r[$t['name']]."</td>";
		}
		$no++;
		$total += $r['stok'];
		$html .= "</tr>";
	}
	$html .= "
	<tfoot>
	<tr>
	<td colspan=".(count($tableConf)).">Total</td>
	<td>".$total."</td>
	</tr></tfoot>";
}
$html .= '</tbody>	
</table>';

$html .= "<br/><br/><br/><div class='ttd'>Padang, ".date("d-m-Y")."<br/><br/><br/> Mengetahui</div>";

//~ echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
