<?php
$judul = "Edit Kota";
include ("menu.php");
include ("koneksi.php");
?>

	<h1>Edit Kota</h1>
 
<?php
$q = $_SERVER['QUERY_STRING'];
parse_str($q,$anu);
$select = "select * from kota where id_kota=".$anu['id_kota'].";";  
$query_tampilkan = mysql_query($select);
$hasil = mysql_fetch_array($query_tampilkan); 

 
?>



<form enctype="multipart/form-data" action="aksieditkota.php?id_kota=<?php echo $anu['id_kota']; ?>" method="POST">
  <div class="container">
	<div class="input-group">
    <label><b>Nama Kota</b></label>
    <input class="form-control" type="text" name="nm_kota" id="nm_kota" value="<?php echo $hasil['nm_kota'];?>" required>
    </div>
	<div class="input-group">
    <label><b>Tarif</b></label>
    <input class="form-control" type="text" name="tarif" id="tarif" value="<?php echo $hasil['tarif'];?>" required>
    </div>
    <button class="btn btn-default" type="submit">Edit</button>
	</div>
</form>
</body>
		
		


<?php
include ("footer.php");
?>
