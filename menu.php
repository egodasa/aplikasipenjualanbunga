<?php
session_start();
?>
<?php include "template/conf.php"; ?> <!DOCTYPE html>
<html lang="en">
<head>
  <title>Flowers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
	  background-color: #1A45CC;
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #57C183;
      padding: 25px;
    }
    
  </style>
</head>
<body>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Beranda</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="kontak.php">Kontak</a></li>
        <li><a href="carabeli.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cara Pemesanan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		  <?php if(isset($_SESSION['username'])){
				  $nm = $_SESSION['username'];
				  if($_SESSION['level'] == "Admin"){
				  ?>
				   <li><a href="daftarPesanan.php">Kelola Pesanan</a></li>
				   <li><a href="kelolaUser.php">Kelola User</a></li>
			       <li><a href="kelolaLevelUser.php">Kelola Level User</a></li>
			       <li><a href="kelolaProduk.php">Kelola Produk</a></li>
				   <li><a href="kelolakota.php">Kelola Kota</a></li>
				  <?php
				   echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>$nm</a></li>";
				   echo "<li><a href='logout.php'><span class='glyphicon glyphicon-user'></span>Logout</a></li>";
				}else if($_SESSION['level'] == "Pembeli"){
				   echo "<li><a href='daftarTransaksi.php'><span class='glyphicon glyphicon-user'></span>Daftar Transaksi</a></li>";
				   echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>$nm</a></li>";
				   echo "<li><a href='logout.php'><span class='glyphicon glyphicon-user'></span>Logout</a></li>";
				}
				
			  }else{
				  ?>
				  <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
				  <li><a href="registrasi.php"><span class="glyphicon glyphicon-user"></span>Registrasi</a></li>
				  <?php
				  } ?>
      </ul>
    </div>
  </div>
</nav>
