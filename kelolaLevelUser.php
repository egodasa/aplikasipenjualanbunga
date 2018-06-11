<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Kelola Level User";
include "koneksi.php"; 
include "db.php";
include "template/head.php";
?>
	<body>
	<script>
		function hapusData(id){
			if(confirm("Iyo ka dihapus yang iko?") == true){
				window.location = "http://localhost/sis/hapusLevelUser.php?id_User="+id;
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
							<h2>Daftar Level User</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>Nama Level User</th>          
										<th>Aksi</th> 
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$select = "select * from level_user"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										  echo"<tr><td>$no</td>";
										   echo"<td>".$hasil['nm_level']."</td>";
										  echo"<td><button type='button' onclick='hapusData(".$hasil['id_User'].")'>Hapus</button>  <a href='".$base_url."/hapusLevelUser.php?id=".$hasil['id_level']."'>Hapus</button> 
										  <a href='".$base_url."/editleveluser.php?id=".$hasil['id_level']."'>Edit</button></td><tr>";
										 $no++;
										 }
									 }else{
										echo "<tr><td colspan=3 class='text-center'>Data Kosong</td></tr>";
									}
									?>
                                </tbody>
                            </table>
                            <hr>
                            <h2>Tambah Level User</h2>
                            <form action="tambahLevelUser.php" method="POST">
								<div class="form-group">
									<label><b>Nama Level User</b></label>
									<input class="form-control" type="text" name="nm_level" id="nm_level" required>
							    </div>
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
