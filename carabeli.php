<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Cara Pembelian";
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
						<div class="row">
							<div class="col-sm-12">
								<div class="box">
									<h2>Cara Pemesanan</h2>
									<ol>
										<li>Pembeli yang ingin membeli produk melalui web bisa langsung melakukan registrasi</li>
									    <li>Setelah registrasi pembeli bisa memilih produk yang telah disajikan, dengan mengklik pesan pada produk</li>
									    <li>Detail Produk akan ditampilkan, dan pembeli mengisi form alamat pengiriman dan nomor Hp               </li>
									    <li>Selanjutnya pembeli bisa melakukan pembayaran melalui rekening yang ada di menu kontak                </li>
									    <li>Dan mengklik daftar transaksi yang ada di menu untuk konfirmasi pembayaran                            </li>
									    <li>Untuk pengiriman akan dikirikmkan melalui Go-Jek  atau Go-Car untuk wilayah kota padang               </li>
										<li>Pembayaran ongkos kirim ditanggung oleh pembeli ketika produk telah sampai ditujuan                   </li>
									</ol>
								</div>
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
