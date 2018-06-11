<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Beranda";
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
				<div class="row products">
					<?php
					$q= $_SERVER['QUERY_STRING'];
					parse_str($q,$param);
					if(isset($_GET['page'])){
						$page = $param['page'];
					}else $page = 1;
					$select = "select * from produk limit 8 offset ".($page-1)*8;
					$totalhalaman = count($db->from('produk')->many());
					$totalhalaman = ceil($totalhalaman/8);
					$query_tampilkan = mysql_query($select);
					while($hasil = mysql_fetch_array($query_tampilkan)) 
					 {
					?>
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="<?php echo $base_url; ?>/produk/<?php echo $hasil['gambar']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="<?php echo $base_url; ?>/produk/<?php echo $hasil['gambar']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html"><?php echo $hasil['nm_produk']; ?></a></h3>
                                    <p class="price">Rp <?php echo $hasil['harga']; ?></p>
                                    <p class="buttons">
                                        <a href="<?php echo $base_url; ?>/pesanProduk.php?id_produk=<?php echo $hasil['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Pesan</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php
						}
						?>
                    </div>
                    <div class="pages">
					  <ul class="pagination">
					  <?php 
					  for($x = 0; $x < $totalhalaman; $x++){
						echo '<li><a href="?page='.($x+1).'">'.($x+1).'</a><li>';  
					  }
					  ?>
					</div>
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
