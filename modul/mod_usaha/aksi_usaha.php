<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='usaha' AND $act=='update'){
    mysqli_query($connect,"UPDATE usaha SET id_user  = '$_POST[id_user]', minat  = '$_POST[minat]',
								 tanggal = '$_POST[tanggal]',
								 no_hp = '$_POST[no_hp]'
								 WHERE id = '$_POST[id]'");
								 
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='usaha' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM usaha WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='usaha' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO usaha(id_user, minat,tanggal,no_hp) 
	  VALUES('$_POST[id_user]','$_POST[minat]','$_POST[tanggal]','$_POST[no_hp]')");
  header('location:../../media.php?module='.$module);
}

?>

