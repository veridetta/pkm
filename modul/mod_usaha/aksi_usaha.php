<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='usaha' AND $act=='update'){
    mysqli_query($connect,"UPDATE usaha SET minat  = '$_POST[minat]',
								 nama_keluarga = '$_POST[nama_keluarga]',
								 no_hp = '$_POST[no_hp]'
								 WHERE id = '$_POST[id]'");
								 
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='usaha' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM usaha WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='usaha' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO usaha(minat,nama_keluarga,no_hp) 
	  VALUES('$_POST[minat]','$_POST[nama_keluarga]','$_POST[no_hp]')");
  header('location:../../media.php?module='.$module);
}

?>

