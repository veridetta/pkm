<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='kegiatan' AND $act=='update'){
    mysqli_query($connect,"UPDATE kegiatan SET id_user  = '$_POST[id_user]',
								 jenis = '$_POST[jenis]',
								 hari = '$_POST[hari]',
								 tanggal = '$_POST[tanggal]',
								 waktu = '$_POST[waktu]'
								 WHERE id = '$_POST[id]'");
								 
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='kegiatan' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM kegiatan WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='kegiatan' AND $act=='input'){
	$id_user = $_POST['id_user'];
    $jenis = $_POST['jenis'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into kegiatan (id_user, jenis, hari, tanggal, waktu) values ('$id_user','$jenis','$hari','$tanggal','$waktu')");
    if ($sql) {
        header('location:../../media.php?module='.$module);
    }else{
        echo "gagal". mysqli_error($connect);
    }
}

?>

