<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Profil Toko";
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
						<div class="row">
							<div class="col-sm-12">
								<div class="box">
									<h2 class="text-center">Profil Toko Buk May Flowers</h2>
									<center></center>
									<p class="lead">
										<p class="text-center">
											<img src="<?php echo $base_url; ?>/images/profil.jpg" style="margin: 0 auto;width:40%;" class="img-thumbnail img-responsive" alt= "Image"/>
										</p>
										<p class="text-center">Alamat : <b>Jl.Khatib Sulaiman Padang</b></p>
									Toko Buk May Flowers adalah sebuah toko bunga yang berdiri pada 
									tahun 2007 di Kota Padang tepatnya di Jalan Kathib Sulaiman depan Bank BTPN. 
									Toko Buk May Flowers didirikan oleh ibu Ismaniarmai karena kebetulan ibu May 
									memiliki hobi di bidang seni terutama menghias dan merangkai bunga hingga akhirnya
									 hobi tersebut memberikan motivasi untuk mendirikan suatu usaha toko bunga. 
									Untuk wilayah kota Padang sendiri, 
									toko bunga atau florist masih jarang ditemui sehingga didirikannya usaha ini 
									akan menjadi peluang usaha yang cukup menjanjikan. Untuk itu, pemasaran melalui 
									media online juga dibutuhkan agar Toko Bunga ini dapat dikenal terutama untuk wilayah Padang 
									dan juga wilayah-wilayah lainnya. Maka dari itu dibuatlah web ini guna untuk menyebarluaskan 
									informasi-informasi produk di toko ini.
									</p>
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
