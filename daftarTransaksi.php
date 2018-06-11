<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Daftar Transaksi";
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
							<h2>Daftar Transaksi</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Pesan</th> 
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
									$select = "select (select count(*) from konfirmasi_pesanan where id_pesan=pesanan.id_pesan) as 'konfirmasi',pesanan.id_pesan,produk.nm_produk,pesanan.tgl_pesan,pesanan.alamat,pesanan.status,pesanan.nomor_hp from pesanan inner join produk on pesanan.id_produk=produk.id_produk inner join user on pesanan.id_user=user.id_user where user.id_user=$id_user;"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>".$hasil['id_pesan']."</td>";
										   echo"<td>".$hasil['nm_produk']."</td>";
										   echo"<td>".$hasil['tgl_pesan']."</td>";
										   echo"<td>".$hasil['alamat']."</td>";
										   echo"<td>".$hasil['status']."</td>";
										   echo"<td>".$hasil['nomor_hp']."</td>";
										   if($hasil['konfirmasi'] < 1){
											  echo"<td><a class='btn btn-info' href='http://localhost/sis/konfirmasiPesanan.php?id_pesanan=".$hasil['id_pesan']."'>Konfirmasi Pembayaran</a>
											  <a class='btn btn-success' href='http://localhost/sis/detailPesanan.php?id_pesanan=".$hasil['id_pesan']."'>Detail</button>
											  </td><tr>";
										   }else{
											   echo"<td><a class='btn btn-success' href='http://localhost/sis/detailPesanan.php?id_pesanan=".$hasil['id_pesan']."'>Detail</a></td><tr>";
										   }
										 }
									 }else{
										echo "<tr><td colspan=7 class='text-center'>Data Kosong</td></tr>";
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
