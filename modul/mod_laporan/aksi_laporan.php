<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='kegiatan' AND $act=='update'){
    mysqli_query($connect,"UPDATE kegiatan SET jenis  = '$_POST[jenis]',
								 nama = '$_POST[nama]',
								 tanggal = '$_POST[tanggal]'
								 WHERE id = '$_POST[id]'");
								 
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='kegiatan' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM kegiatan WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='kegiatan' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO kegiatan(jenis,nama,tanggal) 
	  VALUES('$_POST[jenis]','$_POST[nama]','$_POST[tanggal]')");
  header('location:../../media.php?module='.$module);
}

?>

