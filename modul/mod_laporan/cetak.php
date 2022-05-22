
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
$tampil = mysqli_query($connect,"SELECT k.*, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user");
  echo   "<h2>DATA PROGRES HASIL KERJA</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Nama</th><th>Kategori</th><th>Alamat</th><th>Pemasukan</th><th>Pengeluaran</th><th>Saldo</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
      $pendapatan=number_format($r['totalPemasukan'],0,',','.');
      $pengeluaran=number_format($r['totalPengeluaran'],0,',','.');
      $saldo=number_format($r['totalPemasukan']-$r['totalPengeluaran'],0,',','.');
       echo "<tr align='center'><td>$no</td>
             <td>$r[name]</td>
             <td>$r[kategori]</td>
		     <td>$r[alamat]</td>
             <td>Rp. $pendapatan</td>
             <td>Rp. $pengeluaran</td>
             <td>Rp. $saldo</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>