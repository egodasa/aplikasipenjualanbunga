<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Kelola User";
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
							<h2>Daftar Kelola User</h2>
							<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th> 
										<th>UserName</th>    
										<th>Level</th>       
										<th>Aksi</th>  
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$id_user=$_SESSION['id_user'];
									$select = "select user.id_user,user.username,level_user.nm_level from user inner join level_user on user.id_level=level_user.id_level;"; 
									$query_tampilkan = mysql_query($select);
									$no=1;
									if($query_tampilkan != false){
										while($hasil = mysql_fetch_array($query_tampilkan)) 
										 { 
										   echo"<tr><td>$no</td>";
										   echo"<td>".$hasil['username']."</td>";
										   echo"<td>".$hasil['nm_level']."</td>";
										   echo"<td><a href='http://localhost/sis/hapususer.php?id_user=".$hasil['id_user']."'>Hapus</button></td><tr>";
										   $no++;
										 }
									 }else{
										echo "<tr><td colspan=4 class='text-center'>Data Kosong</td></tr>";
									}
									?>
                                </tbody>
                            </table>
                            <hr>
                            <h2>Tambah User Baru </h2>
							<form action="tambahUser.php" method="POST">
								<div class="form-group">
							    <label><b>Username</b></label>
							    <input class="form-control" type="text" name="username" id="username" required>
							    </div>
							     
							    <div class="form-group">
							    <label><b>Password</b></label>
							    <input class="form-control" type="password" name="password" id="password" required>
							    </div>
							    
							    <div class="form-group">
							    <label><b>Level User</b></label>
							    <select class="form-control" name="level_user" id="level_user">
								<?php
								$select = "select * from level_user;"; 
								$query_tampilkan = mysql_query($select);
								while($hasil = mysql_fetch_array($query_tampilkan)) 
								{ 
								echo"<option value=".$hasil['id_level'].">".$hasil['nm_level']."</option>";
								} 
								?>
							    </select>
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
