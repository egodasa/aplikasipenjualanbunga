<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<?php
$judul = "Login";
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
                        <h1>Login </h1>
                        <hr>

                        <form action="aksilogin.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Login</button>
                            </div>
                        </form>
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
