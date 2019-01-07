<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Laporan Transaksi";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
$waktu = date("Y-m-d");
if(isset($_POST['waktu']) && !empty($_POST['waktu'])){
  $waktu = $_POST['waktu'];
}
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
                            <h2>Laporan Transaksi Harian Tanggal <?=tanggal_indo($waktu)?></h2>
                            <form action="" method="POST">
                              <div class="form-group">
                                <label class="form-label">
                                  Pilih Tanggal
                                </label>
                                <div class="input-group input-group-sm">
                                  <input class="form-control" type="text" id="waktu" name="waktu" value="<?=$waktu?>" readonly />
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat">Tampilkan</button>
                                    <a href="cetak-laporan-harian.php?waktu=<?=$waktu?>" target="_blank" class="btn btn-success btn-flat">Cetak</a>
                                  </span>
                                </div>
                              </div>
                            </form>
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
    <script>
      var tanggal = new Pikaday({
        field: document.getElementById('waktu'),
        format: 'YYYY-MM-DD',
      });
    </script>
	</body>

</html>
