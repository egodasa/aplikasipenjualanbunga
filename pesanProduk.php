<?php include "template/conf.php";
cekLogin();
?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Pesan Produk";
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
							<?php
								$q= $_SERVER['QUERY_STRING'];
								parse_str($q,$param);
								$id = $param['id_produk'];
								$select = "select * from produk where id_produk=$id;";
								$query_tampilkan = mysql_query($select);
								while($hasil = mysql_fetch_array($query_tampilkan)) 
								 { 
								?>
								<h2>Detail Produk </h2>
								<form action="tambahPesanProduk.php" method="post">
									<input type="hidden" value="<?php echo $id; ?>" name="id_produk" id="id_produk" />
									<div class="form-group">
								    <label><b>Nama Produk</b></label>
								    <input class="form-control" type="text" value="<?php echo $hasil['nm_produk']; ?>" name="nm_produk" id="nm_produk" readonly>
								    </div>
									<div class="form-group">
								    <label><b>Deskripsi</b></label>
								    <input class="form-control" type="text" value="<?php echo $hasil['deskripsi']; ?>" name="deskripsi" id="deskripsi" readonly>
								    </div>
									<div class="form-group">
								    <label><b>Harga Produk</b></label>
								    <input class="form-control" type="text" name="hrg_produk" value="<?php echo $hasil['harga']; ?>" id="hrg_produk" readonly>
								    </div>
									<div class="form-group">
								    <label><b>Stok</b></label>
								    <input class="form-control" type="text" name="stok" value="<?php echo $hasil['stok']; ?>" id="hrg_produk" readonly>
								    </div>
									<div class="form-group">
								    <label><b>Gambar produk</b></label>
								    <br/>
								    <img src="produk/<?php echo $hasil['gambar']; ?>" width='200' height='300' />
								    </div>
								    <div class="form-group">
								    <label><b>Alamat Pengiriman</b></label>
								    <input class="form-control" type="text" name="alamat" id="alamat">
								    </div>
								    <div class="form-group">
								    <label><b>Nomor HP</b></label>
								    <input class="form-control" type="text" name="nomor_hp" id="nomor_hp">
								    </div><div class="form-group">
								    <label><b>Jumlah Beli</b></label>
								    <input class="form-control" type="number" name="jumlah" id="jumlah">
								    </div>
									<div class="form-group">
								    <label><b>Kota Tujuan</b></label>
									<select class="form-control" name="kota">
									<?php
									$kota = $db->from('kota')->many();
									foreach($kota as $k){
										echo "<option value='".$k['id_kota']."'>".$k['nm_kota']." = ".$k['tarif']."</option>";
									}
									?>
									</select>
								    </div>
								    <br/>
								    <button class="btn btn-primary btn-block" type="submit">Pesan Produk</button>
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
