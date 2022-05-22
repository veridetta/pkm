<?php
$aksi="modul/mod_kegiatan/aksi_kegiatan.php";
$aksi2="modul/mod_kegiatan/cetak.php";
switch($_GET['act']){
default:
//$tampil = mysqli_query($connect,"SELECT * FROM kegiatan ORDER BY id DESC");
$tampil = mysqli_query($connect,"SELECT k.*, u.id as idUser, u.name FROM kegiatan k inner join user u on u.id=k.id_user");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-running"></i> Data Kegiatan PKM</h1>

   </div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Kegiatan PKM</h6>
         <div><br>
	<a href="?module=kegiatan&act=tambahKegiatan" class="btn btn-info"> <i class="fa fa-plus"></i>  </a>
	<a href="<?=$aksi2?>" target="_blank" class="btn btn-secondary"> <i class="fa fa-print"></i>  </a>
	</div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Jenis Kegiatan</th>
						<th>Nama Keluarga</th>
						<th>Hari</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){
					?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $r['jenis'] ?></td>
						<td><?php echo $r['name'] ?></td>
						<td><?php echo $r['hari'] ?></td>
						<td><?php echo $r['tanggal'] ?></td>
						<td><?php echo $r['waktu'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="?module=kegiatan&act=detailKegiatan&id=<?php echo $r['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=kegiatan&act=editKegiatan&id=<?php echo $r['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=kegiatan&act=hapus&id=<?php echo $r['id'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahKegiatan":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-running"></i> Data Kegiatan PKM</h1>

	<a href="?module=kegiatan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Tambah Data Kegiatan PKM</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=kegiatan&act=input'>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Kegiatan</label>
					<input autocomplete="off" type="text" name="jenis" required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Keluarga</label>
					<select name="id_user" class="form-control">
						<?php
						$user=mysqli_query($connect,"SELECT * FROM user where role='user'");
						while($u=mysqli_fetch_array($user)){
						?>
						<option value="<?=$u['id']?>"><?=$u['name']?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Hari</label>
					<select name="hari" class="form-control">
						<?php $hari=array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
						foreach($hari as $h){
							if($r['hari']==$h){
								echo "<option value='$h' selected>$h</option>";
							}else{
								echo "<option value='$h'>$h</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Waktu</label>
					<input autocomplete="off" type="time" name="waktu" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> </button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> </button>
        </div>
	</form>
</div>
				
<?php				
break;
case "editKegiatan":
$edit=mysqli_query($connect,"SELECT k.*, u.id asUserId, u.name FROM kegiatan k inner join user u on u.id=k.id_user where k.id='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-running"></i> Data Kegiatan PKM</h1>

	<a href="?module=kegiatan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Data Kegiatan PKM</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=kegiatan&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Kegiatan</label>
					<input autocomplete="off" type="text" name="jenis" required value="<?=$r['jenis']?>" class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Keluarga</label>
					<select name="id_user" class="form-control">
						<option value="<?=$r['id_user']?>"><?=$r['name']?></option>
						<?php
						$user=mysqli_query($connect,"SELECT * FROM user where role='user'");
						while($u=mysqli_fetch_array($user)){
						?>
						<option value="<?=$u['id_user']?>"><?=$u['name']?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Hari</label>
					<select name="hari" class="form-control">
						<?php $hari=array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
						foreach($hari as $h){
							if($r['hari']==$h){
								echo "<option value='$h' selected>$h</option>";
							}else{
								echo "<option value='$h'>$h</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" required value="<?=$r['tanggal']?>" class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Waktu</label>
					<input autocomplete="off" type="time" name="waktu" required value="<?=$r['waktu']?>" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> </button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> </button>
        </div>
	</form>
</div>

<?php   
break;  
case "detailKegiatan":
	
$detail=mysqli_query($connect,"SELECT k.*, u.id, u.name FROM kegiatan k inner join user u on u.id=k.id_user where k.id='$_GET[id]'");
$r=mysqli_fetch_array($detail);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-running"></i> Data Kegiatan PKM</h1>

	<a href="?module=kegiatan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-eye"></i> Detail Data Kegiatan PKM</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<th class="bg-light">Jenis Kegiatan</th>
					<td><?=$r['jenis']?></td>
				</tr>
				<tr>
					<th class="bg-light">Nama Keluarga</th>
					<td><?=$r['name']?></td>
				</tr>
				<tr>
					<th class="bg-light">Hari</th>
					<td><?=$r['hari']?></td>
				</tr>
				<tr>
					<th class="bg-light">Tanggal</th>
					<td><?=$r['tanggal']?></td>
				</tr>
				<tr>
					<th class="bg-light">Waktu</th>
					<td><?=$r['waktu']?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php
break;
}
?>
