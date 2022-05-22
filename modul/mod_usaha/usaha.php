<?php
$aksi="modul/mod_usaha/aksi_usaha.php";
$aksi2="modul/mod_usaha/cetak.php";
switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT k.*, u.id as idUser, u.name FROM usaha k inner join user u on u.id=k.id_user");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Usaha</h1>

   </div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Usaha</h6>
         <div><br>
	<a href="?module=usaha&act=tambahUsaha" class="btn btn-info"> <i class="fa fa-plus"></i>  </a>
	<a href="<?=$aksi2?>" target="_blank" class="btn btn-secondary"> <i class="fa fa-print"></i>  </a>
	</div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Keluarga</th>
						<th>Minat Usaha</th>
						<th>Tanggal</th>
						<th>No HP</th>
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
						<td><?php echo $r['name'] ?></td>
						<td><?php echo $r['minat'] ?></td>
						<td><?php echo $r['tanggal'] ?></td>
						<td><?php echo $r['no_hp'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="?module=usaha&act=detailUsaha&id=<?php echo $r['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=usaha&act=editUsaha&id=<?php echo $r['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=usaha&act=hapus&id=<?php echo $r['id'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahUsaha":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Usaha</h1>

	<a href="?module=usaha" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Tambah Data Usaha</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=usaha&act=input'>
		<div class="card-body">
			<div class="row">
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
					<label class="font-weight-bold">Minat Usaha</label>
					<input autocomplete="off" type="text" name="minat" required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">No HP</label>
					<input autocomplete="off" type="text" name="no_hp" required class="form-control"/>
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
case "editUsaha":
	$edit=mysqli_query($connect,"SELECT du.*, u.id asUserId, u.name FROM usaha du inner join user u on u.id=du.id_user where du.id='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Usaha</h1>

	<a href="?module=usaha" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Data Usaha</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=usaha&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id']?>">
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
					<label class="font-weight-bold">Minat Usaha</label>
					<input autocomplete="off" type="text" name="minat" required value="<?=$r['minat']?>" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" required value="<?=$r['nama_keluarga']?>" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">No HP</label>
					<input autocomplete="off" type="text" name="no_hp" required value="<?=$r['no_hp']?>" class="form-control"/>
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
case "detailUsaha":
	$detail=mysqli_query($connect,"SELECT k.*, u.id, u.name FROM usaha k inner join user u on u.id=k.id_user where k.id='$_GET[id]'");
$r=mysqli_fetch_array($detail);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Usaha</h1>

	<a href="?module=usaha" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-eye"></i> Detail Data Usaha</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<th class="bg-light">Nama Keluarga</th>
					<td><?=$r['name']?></td>
				</tr>
				<tr>
					<th class="bg-light">Minat Usaha</th>
					<td><?=$r['minat']?></td>
				</tr>
				<tr>
					<th class="bg-light">Tanggal</th>
					<td><?=$r['tanggal']?></td>
				</tr>
				<tr>
					<th class="bg-light">No HP</th>
					<td><?=$r['no_hp']?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php
break;
}
?>
