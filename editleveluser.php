<?php
$judul = "Edit Level User";
include ("menu.php");
include ("koneksi.php");
?>
<body></body>
<div class="container">
		
<?php
$q = $_SERVER['QUERY_STRING'];
parse_str($q,$anu);
$select = "select * from level_user where id_level=".$anu['id'].";"; 
$query_tampilkan = mysql_query($select);
$hasil = mysql_fetch_array($query_tampilkan); 
?>

</table>
<h2>Edit Level User Baru </h2>
<form action="aksieditleveluser.php?id_level=<?php echo $anu['id']; ?>" method="POST">
  <div class="container">
	<div class="input-group">
    <label><b>Nama Level User</b></label>
    <input class="form-control" type="text" name="nm_level" id="nm_level" value="<?php echo $hasil['nm_level'];?>" required>
    </div>
    <br/>
    <button class="btn btn-default" type="submit">Edit</button>
</form>
</div>
</body>
		
		


<?php
include ("footer.php");
?>
