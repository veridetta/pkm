
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysqli_query($connect,"SELECT * FROM progres ");
  echo   "<h2>DATA PROGRES HASIL KERJA</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Nama</th><th>Jenis Usaha</th><th>Alamat</th><th>No HP</th></tr><th>Pendapatan</th><th>Laporan Progres</th></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[nama]</td>
             <td>$r[jenis_usaha]</td>
		     <td>$r[alamat]</td>
             <td>$r[no_hp]</td>
             <td>format_rupiah($r[pendapatan])</td>
             <td>$r[laporan]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>