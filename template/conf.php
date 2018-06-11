<?php
session_start();
$base_url = "http://localhost/sis";
function cekLogin(){
	if(!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
}
?>
