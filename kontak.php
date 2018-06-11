<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
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
							<h2 class="text-center">Kontak</h2>
							<h4 class="text-center">Nomor Rekening Muhammad Ikhsan Pratama: Bank Nagari Syariah 71000220260060</h4>
							<div class="row">
								<div class="col-sm-4">
									<p class="text-center">
										<img src="<?php echo $base_url; ?>/images/wa.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
										<p class="text-center"><b>Whatsapp</b></p>
										<p class="text-center"><b>085274526035</b></p>
									</p>
									
								</div>
								<div class="col-sm-4">
									<p class="text-center">
										<img src="<?php echo $base_url; ?>/images/ig.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
									</p>
									<p class="text-center"><b>Instagram</b></p>
									<p class="text-center"><b>Ismaniarmai</b></p>
								</div>
								<div class="col-sm-4">
									<p class="text-center">
										<img src="<?php echo $base_url; ?>/images/fb1.png" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
									</p>
									<p class="text-center"><b>Facebook</b></p>
									<p class="text-center"><b>Ismaniarmai</b></p>
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
