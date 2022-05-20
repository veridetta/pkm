
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysqli_query($connect,"SELECT * FROM kegiatan ");
  echo   "<h2>DATA KEGIATAN PKM</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Jenis Kegiatan</th><th>Nama</th><th>Tanggal</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[jenis]</td>
             <td>$r[nama]</td>
		     <td>$r[tanggal]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>