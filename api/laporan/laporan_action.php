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
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $alamat = '$_POST[alamat]';
    $keterangan = $_POST['keterangan'];
    $pemasukan = $_POST['pemasukan'];
    $pengeluaran = $_POST['pengeluaran'];
    $saldo = $_POST['saldo'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into laporan (id_user, tanggal, kategori, alamat, keterangan, pemasukan, pengeluaran, saldo) values ('$id_user','$tanggal','$kategori','$alamat','$keterangan','$pemasukan','$pengeluaran','$saldo')");
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
    $sql = mysqli_query($connect,"UPDATE laporan SET 
    id_user  = '$_POST[id_user]',
    tanggal = '$_POST[tanggal]',
    kategori = '$_POST[kategori]',
    alamat = '$_POST[alamat]',
    keterangan = '$_POST[keterangan]',
    pemasukan = '$_POST[pemasukan]',
    pengeluaran = '$_POST[pengeluaran]',
    saldo = '$_POST[saldo]'
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
    $sql = mysqli_query($connect,"DELETE FROM laporan WHERE id='$_POST[id]'");
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
    //switch $_POST['groupBy']
    switch ($_POST['groupBy']) {
        case 'year':
            $sql = mysqli_query($connect,"SELECT k.*, year(k.tanggal) as nilai, 'Tahun' as tipe, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, sum(k.pemasukan)-sum(k.pengeluaran) as totalSaldo, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user group by year(k.tanggal), kategori");
            break;
        case 'month':
            $sql = mysqli_query($connect,"SELECT k.*,month(k.tanggal) as nilai,'Bulan' as tipe, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, sum(k.pemasukan)-sum(k.pengeluaran) as totalSaldo, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user group by month(k.tanggal), kategori");
            break;
        case 'week':
            $sql = mysqli_query($connect,"SELECT k.*,week(k.tanggal) as nilai, 'Minggu' as tipe,sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, sum(k.pemasukan)-sum(k.pengeluaran) as totalSaldo, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user group by week(k.tanggal), kategori");
            break;
        case 'day':
            $sql = mysqli_query($connect,"SELECT k.*,k.tanggal as nilai,'Tanggal' as tipe, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, sum(k.pemasukan)-sum(k.pengeluaran) as totalSaldo, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user group by DATE_FORMAT(k.tanggal,'%Y-%m-%d'), kategori");
            break;
        default:
        $sql = mysqli_query($connect,"SELECT k.*,month(k.tanggal) as nilai,'Bulan' as tipe, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, sum(k.pemasukan)-sum(k.pengeluaran) as totalSaldo, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user group by month(k.tanggal), kategori");
            break;
    }
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