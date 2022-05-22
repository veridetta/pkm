<?php
$aksi="modul/mod_laporan/aksi_laporan.php";
$aksi2="modul/mod_laporan/cetak.php";
switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT k.*, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-money-bill"></i> Data Laporan Keuangan</h1>

   </div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Laporan Keuangan</h6>
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
						<th>Alamat</th>
						<th>Kategori</th>
						<th>Pemasukan</th>
						<th>Pengeluaran</th>
						<th>Saldo</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(mysqli_num_rows($tampil)<2){
						echo "<tr><td colspan=\"9\">Data Tidak Ada</td></tr>";
					}else{
						$no=1;
						while ($r=mysqli_fetch_array($tampil)){
							$pendapatan=number_format($r['totalPemasukan'],0,',','.');
							$pengeluaran=number_format($r['totalPengeluaran'],0,',','.');
							$saldo=number_format($r['totalPemasukan']-$r['totalPengeluaran'],0,',','.');
						?>
						<tr align="center">
							<td><?php echo $no ?></td>
							<td><?php echo $r['name'] ?></td>
							<td><?php echo $r['alamat'] ?></td>
							<td><?php echo $r['kategori'] ?></td>
							<td><?php echo "Rp. ".$pemasukan ?></td>
							<td><?php echo "Rp. ".$pengeluaran ?></td>
							<td><?php echo "Rp. ".$saldo ?></td>
							<td>
								<div class="btn-group" role="group">
									<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="?module=laporan&act=detailLaporan&id=<?php echo $r['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								</div>
							</td>
						</tr>
						<?php
						$no++;
						}
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
	$detail = mysqli_query($connect,"SELECT k.*, sum(k.pemasukan) as totalPemasukan, sum(k.pengeluaran) as totalPengeluaran, u.id as idUser, u.name FROM laporan k inner join user u on u.id=k.id_user where k.id='$_GET[id]'");
$r=mysqli_fetch_array($detail);
$pendapatan=number_format($r['totalPemasukan'],0,',','.');
						$pengeluaran=number_format($r['totalPengeluaran'],0,',','.');
						$saldo=number_format($r['totalPemasukan']-$r['totalPengeluaran'],0,',','.');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-money-bill"></i> Data Laporan Keuangan</h1>

	<a href="?module=laporan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-eye"></i> Detail Laporan Keuangan</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<th class="bg-light">Nama</th>
					<td><?=$r['name']?></td>
				</tr>
				<tr>
					<th class="bg-light">Alamat</th>
					<td><?=$r['alamat']?></td>
				</tr>
				<tr>
					<th class="bg-light">Kategori</th>
					<td><?=$r['kategori']?></td>
				</tr>
				<tr>
					<th class="bg-light">Pemasukan</th>
					<td>Rp. <?=$pemasukan?></td>
				</tr>
				<tr>
					<th class="bg-light">Pengeluaran</th>
					<td>Rp. <?=$pengeluaran?></td>
				</tr>
				<tr>
					<th class="bg-light">Saldo</th>
					<td>Rp. <?=$saldo?></td>
				</tr>
			
			</table>
		</div>
	</div>
</div>

<?php
break;
}
?>
