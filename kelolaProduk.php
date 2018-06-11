<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Kelola Produk";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
?>
	<body>
	<script>
		function hapusData(id){
			if(confirm("Iyo ka dihapus yang iko?") == true){
				window.location = "http://localhost/sis/hapusproduk.php?id_produk="+id;
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
							<h2>Daftar Kelola Produk</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>Nama Produk</th>    
										<th>Deskripsi</th>       
										<th>Harga</th>
										<th>Stok</th>       
										<th>Gambar</th>       
										<th>Aksi</th>   
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
										   echo"<td>".$hasil['deskripsi']."</td>";
										   echo"<td>".$hasil['harga']."</td>";
										   echo"<td>".$hasil['stok']."</td>";
										   echo"<td><img src='produk/".$hasil['gambar']."' width='200' height='200' /></td>";
										   echo"<td><button type='button' onclick='hapusData(".$hasil['id_produk'].")'>Hapus</button>  <a href='http://localhost/sis/hapusproduk.php?id_produk=".$hasil['id_produk']."'>Hapus</button>  <a href='http://localhost/sis/editproduk.php?id_produk=".$hasil['id_produk']."'>Edit</button></td><tr>";
										   $no++;
										 }
									 }else{
										echo "<tr><td colspan=6 class='text-center'>Data Kosong</td></tr>";
									}
									?>
                                </tbody>
                            </table>
                            <hr>
                            <h2>Tambah Produk Baru </h2>
							<form enctype="multipart/form-data" action="tambahProduk.php" method="post">
								<div class="form-group">
							    <label><b>Nama Produk</b></label>
							    <input class="form-control" type="text" name="nm_produk" id="nm_produk" required>
							    </div>
								<div class="form-group">
							    <label><b>Deskripsi</b></label>
							    <input class="form-control" type="text" name="deskripsi" id="deskripsi" required>
							    </div>
								<div class="form-group">
							    <label><b>Harga Produk</b></label>
							    <input class="form-control" type="text" name="hrg_produk" id="hrg_produk" required>
							    </div>
								<div class="form-group">
							    <label><b>Stok</b></label>
							    <input class="form-control" type="text" name="stok" id="hrg_produk" required>
							    </div>
								<div class="form-group">
							    <label><b>Gambar produk</b></label>
							    <input class="form-control" type="file" name="gambar_produk" id="gambar_produk" required>
							    </div>
							    <br/>
							    <button class="btn btn-success" type="submit">Tambah</button>
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
