<?php
//include koneksi
include "../../config/koneksi.php";
//content type json
header('Content-Type: application/json');
//handle post
$pesan="";
$status="";
$json = array(
    'status' => $status,
    'pesan' => $pesan,
    'data' => array()
);
if($_POST['apps']=='buat'){
    $id_user = $_POST['id_user'];
    $jenis = $_POST['jenis'];
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into kegiatan (id_user, jenis, nama, hari, tanggal, waktu) values ('$id_user','$jenis','$nama','$hari','$tanggal','$waktu')");
    if($sql){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil ditambah";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal ditambah";
        echo json_encode($json);
    }
}else if($_POST['apps']=='ubah'){
    //insert nppt
    $sql = mysqli_query($connect,"UPDATE kegiatan SET id_user  = '$_POST[id_user]',
    jenis = '$_POST[jenis]',
    nama = '$_POST[nama]',
    hari = '$_POST[hari]',
    tanggal = '$_POST[tanggal]',
    waktu = '$_POST[waktu]'
    WHERE id = '$_POST[id]'");
    if($sql){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil diubah";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal diubah";
        echo json_encode($json);
    }
}else if($_POST['apps']=="hapus"){
    //insert nppt
    $sql = mysqli_query($connect,"DELETE FROM kegiatan WHERE id='$_POST[id]'");
    if($sql){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil dihapus";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal dihapus";
        echo json_encode($json);
    }
}else if($_POST['apps']=="get"){
    //insert nppt
    $sql = mysqli_query($connect,"SELECT * FROM kegiatan where id_user='$_POST[id_user]' and MONTH(tanggal)='$_POST[bulan]'");
    $dataResult=array();
    while($lpd=mysqli_fetch_array($sql)){
        //tampung data sebelum di masukkan ke json
        $dataResult[]=$lpd;
    }
    $json['status'] = "sukses";
    $json['pesan'] = "Data berhasil diambil";
    $json['data'] = $dataResult;
        //return json
        echo json_encode($json);
}