<?php include "template/conf.php";
cekLogin();
?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Verifikasi Pembayaran";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
if(isset($_POST['alamat'])){
	parse_str($q,$param);
	$id_produk = $param['id_produk'];
	$id_user = $_SESSION['id_user'];
	$alamat = $_POST['alamat'];
	$select = "insert into pesan (id_produk,id_user,alamat) values ($id_produk,$id_user,$alamat);"; 
	mysql_query($select);
	header("Location: http://localhost/sis/daftarTransaksi.php");
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
							<?php
							$q= $_SERVER['QUERY_STRING'];
							parse_str($q,$param);
							$id = $param['id_pesanan'];
							$select = "select * from konfirmasi_pesanan where id_pesan=$id;";
							$query_tampilkan = mysql_query($select);
							while($hasil = mysql_fetch_array($query_tampilkan)) 
							 { 
							?>
							<h2>Verifikasi Pembayaran </h2>
							<form enctype="multipart/form-data" action="aksiVerifikasiPembayaran.php" method="post">
								<div class="form-group">
							    <label><b>ID Pesan</b></label>
							    <input class="form-control" type="text" value="<?php echo $hasil['id_pesan']; ?>" name="id_pesan" id="id_pesan" readonly>
							    </div>
								<div class="form-group">
							    <label><b>Nama Pembayar</b></label>
							    <input class="form-control" type="text" value="<?php echo $hasil['nm_pembayar']; ?>" name="nm_pembayar" id="nm_pembayar" required>
							    </div>
								<div class="form-group">
							    <label><b>Nomor Rekening</b></label>
							    <input class="form-control" type="text" value="<?php echo $hasil['no_rekening']; ?>" name="no_rekening" id="no_rekening" required>
							    </div>
								<div class="form-group">
							    <label><b>Bukti Pembayaran</b></label>
							    <br/>
							    <img src="bayar/<?php echo $hasil['gambar_bukti']; ?>" width='200' height='300' />
							    </div>
							    <br/>
							    <a href="aksiVerifikasiPembayaran.php?id_pesan=<?php echo $hasil['id_pesan']; ?>&status=terima" class="btn btn-info" type="submit">Terima Pembayaran</a>
							    <a href="aksiVerifikasiPembayaran.php?id_pesan=<?php echo $hasil['id_pesan']; ?>&status=tolak" class="btn btn-danger" type="submit">Tolak Pembayaran</a>
							</form>
							<?php
							}
							?>
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
