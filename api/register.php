<?php
//include koneksi
include "../config/koneksi.php";
//content type json
header('Content-Type: application/json');
//handle post
$pesan="";
$status="";
$json = array(
    'status' => $status,
    'pesan' => $pesan
);
if(isset($_POST['apps'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into user (username, email, password, name, role) values ('$username', '$email', '$password', '$name', '$role')");
    if($sql){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil ditambah";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal ditambah";
        echo json_encode($json);
    }
}