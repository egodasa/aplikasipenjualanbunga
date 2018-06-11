<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Laporan Transaksi";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
?>
	<body>
		<div id="top">
			<?php
        include "template/top-bar.php";
        include "template/modal-login.php";
        ?>
		</div>
		<div class="navbar navbar-default yamm" role="navigation" id="navbar">
			<div class="container">
				<?php
            include "template/navbar.php";
            ?>
			</div>
		</div>
		<div id="all">
			<div id="content">
				<div class="container">
					
					<!-- CONTENT -->
						<div class="box">
                            <h2>Laporan Transaksi</h2>
                            <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Cetak Laporan
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    <li><a target="_blank" href="cetak-laporan.php?laporan=harian">Cetak Laporan Harian</a></li>
                                    <li><a target="_blank" href="cetak-laporan.php?laporan=bulanan">Cetak Laporan Bulanan</a></li>
                                    <li><a target="_blank" href="cetak-laporan.php?laporan=tahunan">Cetak Laporan Tahunan</a></li>
                                    </ul>
                                    </div>
							<div class="table-responsive">
                            <table class="table table-hover">
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
									$select = "select produk.nm_produk,pesanan.tgl_pesan,pesanan.alamat,pesanan.status,pesanan.nomor_hp, (produk.harga*pesanan.jumlah)+kota.tarif as total from pesanan left join produk on pesanan.id_produk=produk.id_produk join kota on pesanan.id_kota = kota.id_kota where pesanan.status = 'Sudah Selesai'"; 
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
                        </div>
                        
						</div>
					<!-- EOF CONTENT -->
					
					
				</div>
		<?php
        include "template/footer-atas.php";
        include "template/footer-bawah.php";
        ?>
			</div>
		</div>
		<?php
		include "template/javascript.php";
		?>
	</body>

</html>
