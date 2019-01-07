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
Laporan Transaksi Harian Tanggal <?=tanggal_indo($waktu)?>
</p>
<table>
              <thead>
                <tr>
                  <th>Nama Produk</th>    
										<th>Tanggal Pesan</th>       
										<th>Alamat</th>       
										<th>Nomor HP</th>       
										<th>Total Harga</th>   
                </tr>
              </thead>
              <tbody>
               <?php
									$id_user=$_SESSION['id_user'];
									$select = "select produk.nm_produk,pesanan.tgl_pesan,pesanan.alamat,pesanan.status,pesanan.nomor_hp, (produk.harga*pesanan.jumlah)+kota.tarif as total from pesanan left join produk on pesanan.id_produk=produk.id_produk join kota on pesanan.id_kota = kota.id_kota where pesanan.status = 'Sudah Selesai' AND date(pesanan.tgl_pesan) = '$waktu'"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									$total = 0;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>".$hasil['nm_produk']."</td>";
										   echo"<td>".$hasil['tgl_pesan']."</td>";
										   echo"<td>".$hasil['alamat']."</td>";
										   echo"<td>".$hasil['nomor_hp']."</td>";
										   echo"<td>Rp ".number_format($hasil['total'],2,',','.')."</td></tr>";
										   $total += $hasil['total'];
										 }
									 }else{
										echo "<tr><td colspan=7 class='text-center'>Data Kosong</td></tr>";
									}
									?>
								<tr>
									<td colspan=4>Total</td>
									<td><?="Rp ".number_format($total,2,',','.')?></td>
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
