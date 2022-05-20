<div class="mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Selamat datang <span class="text-uppercase"><b><?php echo $_SESSION['nama']; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
    </div>
    <?php
		if ($_SESSION['role']=="admin"){
	?>
	<div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <canvas id="myBarChart" width="400" height="400"></canvas>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <canvas id="myAreaChart" width="400" height="400"></canvas>
        </div>
		<div class="col-xl-4 col-md-6 mb-4">
            <canvas id="myBarChart2" width="400" height="400"></canvas>
        </div>
		
    </div>
	<?php
	}
	?>
</div>
