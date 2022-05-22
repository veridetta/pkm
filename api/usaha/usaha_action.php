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
    $no_hp = $_POST['no_hp'];
    $minat = $_POST['minat'];
    $tanggal = $_POST['tanggal'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into usaha (id_user, no_hp, minat, tanggal) values ('$id_user','$no_hp','$minat','$tanggal')");
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
    $sql = mysqli_query($connect,"UPDATE usaha SET id_user  = '$_POST[id_user]',
    no_hp = '$_POST[no_hp]',
    minat = '$_POST[minat]',
    tanggal = '$_POST[tanggal]'
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
    $sql = mysqli_query($connect,"DELETE FROM usaha WHERE id='$_POST[id]'");
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
    $sql = mysqli_query($connect,"SELECT k.*, u.name, u.id as UserID FROM usaha k inner join user u ON u.id = k.id_user where k.id_user='$_POST[id_user]' and MONTH(k.tanggal)='$_POST[bulan]'");
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