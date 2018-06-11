<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Detail Pesanan";
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
						<?php
$q= $_SERVER['QUERY_STRING'];
parse_str($q,$param);
$id = $param['id_pesanan'];
$select = "select *,produk.nm_produk,produk.harga from pesanan inner join produk on pesanan.id_produk=produk.id_produk
join kota on pesanan.id_kota = kota.id_kota where id_pesan=$id;";
$query_tampilkan = mysql_query($select);
while($hasil = mysql_fetch_array($query_tampilkan)) 
 { 
?>
<div class="box">
<h2>Detail Pesanan </h2>
<form method="post">
	<div class="form-group">
    <label><b>ID Pesan</b></label>
    <input class="form-control" type="text" value="<?php echo $hasil['id_pesan']; ?>" name="id_pesan" id="id_pesan" readonly>
    </div>
	<div class="form-group">
    <label><b>Nama Produk</b></label>
    <input class="form-control" type="text" value="<?php echo $hasil['nm_produk']; ?>" name="nm_produk" id="nm_produk" readonly>
    </div>
	<div class="form-group">
    <label><b>Total Bayar</b></label>
    <input class="form-control" type="text" value="<?php echo ($hasil['harga']*$hasil['jumlah'])+$hasil['tarif']; ?>" name="total_bayar" id="total_bayar" readonly>
    </div><div class="form-group">
    <label><b>Jumlah</b></label>
    <input class="form-control" type="text" value="<?php echo $hasil['jumlah']; ?>" name="jumlah" id="jumlah" readonly>
    </div>
	<div class="form-group">
    <label><b>Status Pesanan</b></label>
    <input class="form-control" type="text" value="<?php echo $hasil['status']; ?>" name="total_bayar" id="no_rekening" readonly>
	</div>
</form>
</div>
<?php
 }
?>
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
