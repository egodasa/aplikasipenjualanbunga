<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Daftar Pesanan";
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
							<h2>Daftar Pesanan</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>Nama Lengkap</th>  	
										<th>Nama Produk</th>    
										<th>Tanggal Pesan</th>       
										<th>Alamat</th>       
										<th>Status</th>
										<th>Nomor HP</th>
										 <th>Aksi</th>  
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$id_user=$_SESSION['id_user'];
									$select = "SELECT pesanan.id_pesan, user.username, user.nm_lengkap, produk.nm_produk, pesanan.tgl_pesan, pesanan.alamat, pesanan.status, pesanan.nomor_hp
									FROM pesanan
									INNER JOIN produk ON pesanan.id_produk = produk.id_produk
									INNER JOIN user ON pesanan.id_user = user.id_user"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>$no</td>";
										   echo"<td>".$hasil['nm_lengkap']."</td>";
										   echo"<td>".$hasil['nm_produk']."</td>";
										   echo"<td>".$hasil['tgl_pesan']."</td>";
										   echo"<td>".$hasil['alamat']."</td>";
										   echo"<td>".$hasil['status']."</td>";
										   echo"<td>".$hasil['nomor_hp']."</td>";
										   if($hasil['status'] == 'Belum Selesai'){
										     echo"<td><a class='btn btn-info' href='http://localhost/sis/verifikasiPembayaran.php?id_pesanan=".$hasil['id_pesan']."'>Verifikasi Pembayaran</a><a class='btn btn-success' href='http://localhost/sis/detailPesanan.php?id_pesanan=".$hasil['id_pesan']."'>Detail</a></td><tr>";
										   }else{
											   echo"<td><a class='btn btn-success' href='http://localhost/sis/detailPesanan.php?id_pesanan=".$hasil['id_pesan']."'>Detail</a></td><tr>";
										   }
										   $no++;
										 }
									 }else{
										echo "<tr><td colspan=8 class='text-center'>Data Kosong</td></tr>";
									}
									?>
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
