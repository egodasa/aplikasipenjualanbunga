<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Laporan Transaksi";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
$tanggal = date("Y-m-d");
if(isset($_POST['waktu']) && !empty($_POST['waktu'])){
  $tanggal = $_POST['waktu'];
}
$waktu = explode("-", $tanggal);
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
                            <h2>Laporan Transaksi Bulan <?=namaBulan($waktu[1])." ".$waktu[0]?></h2>
                            <form action="" method="POST">
                              <div class="form-group">
                                <label class="form-label">
                                  Pilih Tanggal/Bulan
                                </label>
                                <div class="input-group input-group-sm">
                                  <input class="form-control" type="text" id="waktu" name="waktu" value="<?=$tanggal?>" readonly />
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat">Tampilkan</button>
                                    <a href="cetak-laporan-bulanan.php?waktu=<?=$tanggal?>" target="_blank" class="btn btn-success btn-flat">Cetak</a>
                                  </span>
                                </div>
                              </div>
                            </form>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                      <th>No</th>    
                                      <th>Tanggal</th>       
                                      <th>Pemasukan</th>     
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$id_user=$_SESSION['id_user'];
									$select = "SELECT DAY(tgl_pesan) AS tanggal, SUM(harga) as pemasukan FROM laporan_pemasukan WHERE MONTH(tgl_pesan) = MONTH('$tanggal') AND YEAR(tgl_pesan) = YEAR('$tanggal') GROUP BY DAY(tgl_pesan) ORDER BY MONTH(tgl_pesan) ASC"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									$total = 0;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>".$no."</td>";
										   echo"<td>".$hasil['tanggal']."</td>";
										   echo"<td>".rupiah($hasil['pemasukan'])."</td></tr>";
										   $total += $hasil['pemasukan'];
                       $no++;
										 }
									 }else{
										echo "<tr><td colspan=3 class='text-center'>Data Kosong</td></tr>";
									}
									?>
								<tr>
									<td colspan=2>Total</td>
									<td><?=rupiah($total)?></td>
								</tr>
                                </tbody>
                            </table>
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
    <script>
      var tanggal = new Pikaday({
        field: document.getElementById('waktu'),
        format: 'YYYY-MM-DD',
      });
    </script>
	</body>

</html>
