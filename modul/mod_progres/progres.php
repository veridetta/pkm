<?php
$aksi="modul/mod_progres/aksi_progres.php";
$aksi2="modul/mod_progres/cetak.php";
switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT k.*, u.id as idUser, u.name FROM progres k inner join user u on u.id=k.id_user");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i> Data Progres Hasil Kerja</h1>

   </div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Progres Hasil Kerja</h6>
         <div><br>
	<a href="<?=$aksi2?>" target="_blank" class="btn btn-secondary"> <i class="fa fa-print"></i>  </a>
	</div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Jenis Usaha</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Pendapatan</th>
						<th>Laporan Progres</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){
						$rupiah=number_format($r['pendapatan'],0,',','.');
					?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $r['name'] ?></td>
						<td><?php echo $r['jenis_usaha'] ?></td>
						<td><?php echo $r['alamat'] ?></td>
						<td><?php echo $r['no_hp'] ?></td>
						<td><?php echo "Rp. ".$rupiah ?></td>
						<td><?php echo $r['laporan'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="?module=progres&act=detailKegiatan&id=<?php echo $r['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
							</div>
						</td>
					</tr>
					<?php
					$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php			
break;
case "detailKegiatan":
$detail=mysqli_query($connect,"SELECT * FROM progres WHERE id='$_GET[id]'");
$r=mysqli_fetch_array($detail);
$rupiah=number_format($r['pendapatan'],0,',','.');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i> Data Progres Hasil Kerja</h1>

	<a href="?module=progres" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-eye"></i> Detail Data Progres Hasil Kerja</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<th class="bg-light">Nama</th>
					<td><?=$r['name']?></td>
				</tr>
				<tr>
					<th class="bg-light">Jenis Usaha</th>
					<td><?=$r['jenis_usaha']?></td>
				</tr>
				<tr>
					<th class="bg-light">Alamat</th>
					<td><?=$r['alamat']?></td>
				</tr>
				<tr>
					<th class="bg-light">No HP</th>
					<td><?=$r['no_hp']?></td>
				</tr>
				<tr>
					<th class="bg-light">Pendapatan</th>
					<td>Rp. <?=$rupiah?></td>
				</tr>
				<tr>
					<th class="bg-light">Laporan Progres</th>
					<td><?=$r['laporan']?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php
break;
}
?>
