<?php
session_start();
error_reporting(1);
include "config/koneksi.php";
if ($_POST) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login=mysqli_query($connect,"SELECT * FROM user WHERE username='$username' AND password='$password'");
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);
	
	// Apabila username dan password ditemukan
	if ($ketemu > 0){
	
	  $_SESSION['namauser']     = $r['username'];
	  $_SESSION['passuser']     = $r['password'];
	  $_SESSION['nama']     = $r['name'];
	  $_SESSION['role']		= $r['role'];
	  header('location:media.php?module=home');
	}
	else{
	  header('location:index.php?log=2');
	}
}
?>
