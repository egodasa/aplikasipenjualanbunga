<?php
include ("menu.php");
include ("koneksi.php");
?>
<body></body>
<div class="container">
		<table class="table table-bordered table-striped">  
		<thead>   
				<tr>    
					
					<th>Id</th> 
					<th>UserName</th>    
					<th>Password</th> 
					<th>Level</th>
					<th>Nama Lengkap</th>       
					<th>Aksi</th>       
					</tr>  
		</thead>  
		
		<tbody>   
				<tr>    
					<td></td>    
					<td></td>    
					<td></td>
					<th></th>     
					</tr> 
		</tbody>  

<?php
$select = "select * from user"; 
$query_tampilkan = mysql_query($select);
while($hasil = mysql_fetch_array($query_tampilkan)) 
 { 
  echo"<tr><td>".$hasil['id']."</td>";
   echo"<td>".$hasil['user_name']."</td>";
   echo"<td>".$hasil['password']."</td>";
   echo"<td>".$hasil['level']."</td>";
  echo"<td>".$hasil['nm_lengkap']."</td>";
  echo"<td><a href='http://localhost/sis/hapususer.php?id_user=".$hasil['id']."'>Hapus</button></td><tr>";
  
  
 } 

?>

</table>
</div>
</body>
		
		


<?php
include ("footer.php");
?>
