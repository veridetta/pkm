
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
$tampil = mysqli_query($connect,"SELECT k.*, u.name, u.id FROM progres k inner join user u ON u.id = k.id_user");
  echo   "<h2>DATA PROGRES HASIL KERJA</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Nama</th><th>Jenis Usaha</th><th>Alamat</th><th>No HP</th><th>Pendapatan</th><th>Laporan Progres</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
        $rupiah=number_format($r['pendapatan'],0,',','.');
       echo "<tr align='center'><td>$no</td>
             <td>$r[name]</td>
             <td>$r[jenis_usaha]</td>
		     <td>$r[alamat]</td>
             <td>$r[no_hp]</td>
             <td>$rupiah</td>
             <td>$r[laporan]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>