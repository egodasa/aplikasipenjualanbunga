<?php
session_start();
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "db_bunga"; 
$koneksi = mysql_connect($host, $username, $password); 
$pilihdatabase = mysql_select_db($database, $koneksi);
$user = $_POST['username'];
$pass = $_POST['password'];
$select = "SELECT user.id_user,count(username) as 'jumlah',level_user.nm_level as 'level' from user inner join level_user on user.id_level=level_user.id_level where username='$user' and pass='$pass';";
$hasil = mysql_query($select);
while($r = mysql_fetch_array($hasil)){
if ($r['jumlah'] == 0){ 
  echo "Password anda salah"; 
 } 
  else{ 
  $_SESSION['id_user'] = $r['id_user'];
  $_SESSION['username'] = $user;
  $_SESSION['level'] = $r['level'];
  header("Location: http://localhost/sis/home.php");
 }	
}
?>



