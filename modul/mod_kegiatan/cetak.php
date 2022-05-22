
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysqli_query($connect,"SELECT k.*, u.name, u.id FROM kegiatan k inner join user u ON u.id = k.id_user");
  echo   "<h2>DATA KEGIATAN PKM</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Jenis Kegiatan</th><th>Nama Keluarga</th><th>Hari</th><th>Tanggal</th><th>Waktu</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[jenis]</td>
             <td>$r[name]</td>
             <td>$r[hari]</td>
		     <td>$r[tanggal]</td>
             <td>$r[waktu]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>