<?php
include "template/conf.php";
cekLogin();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$judul = "Konfirmasi Pesanan";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
if(isset($_POST['alamat'])){
	parse_str($q,$param);
	$id_produk = $param['id_produk'];
	$id_user = $_SESSION['id_user'];
	$alamat = $_POST['alamat'];
	$nomor_hp = $_POST['nomor_hp'];
	$select = "insert into pesanan (id_produk,id_user,alamat,nomor_hp) values ($id_produk,$id_user,$alamat,$nomor_hp);"; 
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
							$select = "select * from pesanan where id_pesan=$id;";
							$query_tampilkan = mysql_query($select);
							while($hasil = mysql_fetch_array($query_tampilkan)) 
							 { 
							?>
							<h2>Detail Transaksi </h2>
							<form enctype="multipart/form-data" action="aksiKonfirmasiPesanan.php" method="post">
								<div class="form-group">
							    <label><b>ID Pesan</b></label>
							    <input class="form-control" type="text" value="<?php echo $hasil['id_pesan']; ?>" name="id_pesan" id="id_pesan" readonly>
							    </div>
								<div class="form-group">
							    <label><b>Nama Pembayar</b></label>
							    <input class="form-control" type="text" name="nm_pembayar" id="nm_pembayar" required>
							    </div>
								<div class="form-group">
							    <label><b>Nomor Rekening</b></label>
							    <input class="form-control" type="text" name="no_rekening" id="no_rekening" required>
							    </div>
								<div class="form-group">
							    <label><b>Bukti Pembayaran</b></label>
							    <input class="form-control" type="file" name="bukti_pembayaran" id="bukti_pembayaran" required>
							    </div>
							    <br/>
							    <button class="btn btn-success" type="submit">Konfirmasi Pembayaran</button>
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
