<?php
ob_start();
error_reporting(0);
$mod = $_GET['module'];

// Home
if ($mod=='home'){
	include "home.php";
}
// SPPD
elseif ($mod=='usaha'){
    include "modul/mod_usaha/usaha.php";
}
elseif ($mod=='tambahusaha'){
    include "modul/mod_usaha/tambahusaha.php";
}
elseif ($mod=='kegiatan'){
    include "modul/mod_kegiatan/kegiatan.php";
}
elseif ($mod=='tambahkegiatan'){
    include "modul/mod_kegiatan/tambahkegiatan.php";
}
elseif ($mod=='progres'){
    include "modul/mod_progres/progres.php";
}
elseif ($mod=='tambahprogres'){
    include "modul/mod_progres/tambahprogres.php";
}
elseif ($mod=='laporan'){
    include "modul/mod_laporan/laporan.php";
}
elseif ($mod=='tambahlaporan'){
    include "modul/mod_laporan/tambahlaporan.php";
}
elseif ($mod=='password'){
    include "modul/mod_password/password.php";
}

// Apabila modul tidak ditemukan
else{
  include "404.php";
}
?>
