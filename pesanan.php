<?php
$judul = "Pesanan";
include ("menu.php");
include ("koneksi.php");
?>
<body>
<div class="container">
<table class="table table-bordered table-striped">  
<thead>  
    <tr>    
       
        <th>Kode Pesanan</th>    
        <th>Nama Pesanan</th>
        <th>Harga</th>      
        </tr>  
</thead>  
<tbody>  
    <tr>        
        <td></td>    
        <td></td>
        <th></th>    
        </tr>
</tbody>
<?php
$select = "select * from pesanan";
$query_tampilkan = mysql_query($select);
while($hasil = mysql_fetch_array($query_tampilkan))
 {
  echo"<tr><td>".$hasil['kode_pesanan']."</td>";
  echo"<td>".$hasil['nm_pesanan']."</td>";
  echo"<td>".$hasil['harga']."</td></tr>";
 }
?>
</table>
</div>
</body>
<?php
include ("footer.php");
?>
