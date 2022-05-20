
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysqli_query($connect,"SELECT * FROM usaha ");
  echo   "<h2>DATA USAHA</h2><br/>
    		<table  border='2' cellpadding='5'>
          <thead><tr><th>No</th><th>Minat Usaha</th><th>Nama Keluarga</th><th>No HP</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[minat]</td>
             <td>$r[nama_keluarga]</td>
		     <td>$r[no_hp]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>