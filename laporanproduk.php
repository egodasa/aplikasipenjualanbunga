<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Laporan Produk";
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
                            <h2>Laporan Produk</h2>
                            <a class="btn btn-primary dropdown-toggle" href="cetak-laporan-produk.php" target="_blank">Cetak Laporan</a>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>Nama Produk</th>         
										<th>Harga</th>
										<th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$select = "select * from produk;"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>$no</td>";
										   echo"<td>".$hasil['nm_produk']."</td>";
										   echo"<td>".$hasil['harga']."</td>";
										   echo"<td>".$hasil['stok']."</td>";
                                           $no++;
										 }
									 }else{
										echo "<tr><td colspan=6 class='text-center'>Data Kosong</td></tr>";
									}
									?>
                                </tbody>
                            </table>
                        
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
