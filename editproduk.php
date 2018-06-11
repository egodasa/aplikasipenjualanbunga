<?php
$judul = "Edit Produk";
include ("menu.php");
include ("koneksi.php");
?>

	<h1>Edit Produk</h1>
 
<?php
$q = $_SERVER['QUERY_STRING'];
parse_str($q,$anu);
$select = "select * from produk where id_produk=".$anu['id_produk'].";";  
$query_tampilkan = mysql_query($select);
$hasil = mysql_fetch_array($query_tampilkan); 

 
?>



<form enctype="multipart/form-data" action="aksieditproduk.php?id_produk=<?php echo $anu['id_produk']; ?>" method="POST">
  <div class="container">
	<div class="input-group">
    <label><b>Nama Produk</b></label>
    <input class="form-control" type="text" name="nm_produk" id="nm_produk" value="<?php echo $hasil['nm_produk'];?>" required>
    </div>
	<div class="input-group">
    <label><b>Deskripsi</b></label>
    <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="<?php echo $hasil['deskripsi'];?>" required>
    </div>
	<div class="input-group">
    <label><b>Harga Produk</b></label>
    <input class="form-control" type="text" name="hrg_produk" id="hrg_produk" value="<?php echo $hasil['harga'];?> "required>
    </div>
	<div class="input-group">
    <label><b>Stok</b></label>
    <input class="form-control" type="text" name="stok" id="stok" value="<?php echo $hasil['stok'];?> "required>
    </div>
	<div class="input-group">
    <label><b>Gambar produk</b></label>
    <input class="form-control" type="file" name="gambar_produk" id="gambar_produk" value="<?php echo $hasil['gambar'];?>" required>
    </div>
    <br/>
    <button class="btn btn-default" type="submit">Edit</button>
	</div>
</form>
</body>
		
		


<?php
include ("footer.php");
?>
