<?php
  include "template/conf.php"; 
  $judul = "Laporan Transaksi";
  include "koneksi.php"; 
  $nama_perusahaan = "Toko Buk May Flower";
  $alamat = "Jl.Khatib Sulaiman Padang";
  $waktu = date("Y-m-d");
  if(isset($_GET['waktu']) && !empty($_GET['waktu'])){
    $waktu = $_GET['waktu'];
  }
  $tahun = explode("-", $waktu);
?>
<style>
body{
	font-family: Times New Roman;
}
table {
    border-collapse: collapse;
	margin: 0 auto;
}

table, td, th {
    border: 1px solid black;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 7px;
}
h1{
	text-align: center;
}
p{
	text-align: center;
}
.ttl{
	width:75%;
}
.ttd{
	width: 25%;
	text-align:center;
	float: right;
}
</style>
<p>
<b><?=$nama_perusahaan?></b>
</p>
<p><?=$alamat_perusahaan?></p>
<hr/>
<p>
Laporan Transaksi Tahun <?=$tahun[0]?>
</p>
<table>
              <thead>
                                    <tr>
                                      <th>No</th>    
                                      <th>Bulan</th>       
                                      <th>Pemasukan</th>     
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$id_user=$_SESSION['id_user'];
									$select = "SELECT MONTH(tgl_pesan) AS bulan, SUM(harga) as pemasukan FROM laporan_pemasukan WHERE YEAR(tgl_pesan) = YEAR('$waktu') GROUP BY nm_produk"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									$total = 0;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>".$no."</td>";
										   echo"<td>".namaBulan($hasil['bulan'])."</td>";
										   echo"<td>".rupiah($hasil['pemasukan'])."</td></tr>";
										   $total += $hasil['pemasukan'];
                       $no++;
										 }
									 }else{
										echo "<tr><td colspan=3 class='text-center'>Data Kosong</td></tr>";
									}
									?>
								<tr>
									<td colspan=2>Total</td>
									<td><?=rupiah($total)?></td>
								</tr>
                                </tbody>
            </table>
<br/>
<div class="ttd">
<p>Padang, <?=date("d/m/Y")?></p><br/>
<br/>
<p>Pimpinan
</p>
</div>

<script>
  window.print();
</script>
