<div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/bukmay.png" width="139" height="60" alt="Obaju logo" class="hidden-xs">
                    <img src="img/bukmay.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo $base_url; ?>">Beranda</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="<?php echo $base_url; ?>/profil.php" class="dropdown-toggle">Profil</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="<?php echo $base_url; ?>/carabeli.php" class="dropdown-toggle">Cara Pesan</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="<?php echo $base_url; ?>/kontak.php" class="dropdown-toggle">Kontak</a>
                    </li>
                    <?php
						if(isset($_SESSION['username'])){
	                ?>
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">Menu <b class="caret"></b></a>
	                  <ul class="dropdown-menu">
						<?php
						if($_SESSION['level'] == 'Admin'){
						?>
	                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/daftarPesanan.php" class="nav-link"><i class="fa fa-list"></i> Kelola Pesanan</a></li>
                      <li class="dropdown-item"><a href="<?php echo $base_url;?>/laporanTransaksi.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi Keseluruhan</a></li>
	                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/laporan-harian.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi Harian</a></li>
	                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/laporan-bulanan.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi Bulanan</a></li>
	                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/laporan-tahunan.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi Tahunan</a></li>
	                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/laporanproduk.php" class="nav-link"><i class="fa fa-list"></i> Laporan Produk</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/kelolaUser.php" class="nav-link"><i class="fa fa-user"></i> Kelola User</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/kelolaLevelUser.php" class="nav-link"><i class="fa fa-user"></i> Kelola Level User</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/kelolaProduk.php" class="nav-link"><i class="fa fa-list"></i> Kelola Produk</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/kelolakota.php" class="nav-link"><i class="fa fa-list"></i> Kelola Kota</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
						<?php
						}else{
							?>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/daftarTransaksi.php" class="nav-link"><i class="fa fa-list"></i> Daftar Transaksi</a></li>
						<li class="dropdown-item"><a href="<?php echo $base_url;?>/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
						<?php
						}
						?>
		                  </ul>
		                </li>
		                <?php
						}
		                ?>
					</ul>

            </div>
            <!--/.nav-collapse -->

<!--
            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
-->
