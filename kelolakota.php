<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Kelola Kota";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
?>
	<body>
		<script>
		function hapusData(id){
			if(confirm("Iyo ka dihapus yang iko?") == true){
				window.location = "http://localhost/sis/hapusKota.php?id_kota="+id;
			}
		}
		</script>
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
							<h2>Daftar Kota</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>Nama Kota</th>    
										<th>Tarif</th> 
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$select = "select * from kota;"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										{ 
										echo"<tr><td>$no</td>";
										echo"<td>".$hasil['nm_kota']."</td>";
										echo"<td>".$hasil['tarif']."</td>";
										echo"<td><button type='button' onclick='hapusData(".$hasil['id_kota'].")'>Hapus</button>  <a href='http://localhost/sis/editKota.php?id_kota=".$hasil['id_kota']."'>Edit</button></td><tr>";
										$no++;
										} 
									}else{
										echo "<tr><td colspan=4 class='text-center'>Data Kosong</td></tr>";
									}
									?>
                                </tbody>
                            </table>
                            <hr>
                            <h2>Tambah Kota Baru </h2>
							<form  action="tambahKota.php" method="post">
								<div class="form-group">
							    <label><b>Nama Kota</b></label>
							    <input class="form-control" type="text" name="nm_kota" id="nm_kota" required>
							    </div>
								<div class="form-group">
							    <label><b>Tarif</b></label>
							    <input class="form-control" type="text" name="tarif" id="tarif" required>
							    </div>
							    <br/>
							    <button class="btn btn-success" type="submit">Tambah</button>
								</div>
							</form>
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
