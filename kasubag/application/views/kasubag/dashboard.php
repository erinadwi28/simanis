<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0 text-gray-800">Dashboard Kasubag</h1>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Library</a></li> -->
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
		</nav>
	</div>

	<!-- Page Heading Data Permohonan PTSP -->
	<div class="card shadow h-100 p-0 mb-3">
		<div class="card-body px-3 py-2 title-track">
			<div class="align-items-center justify-content-between text-center">
				<h1 class="h5 mb-0 text-bold text-light">Data Permohonan PTSP</h1>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Data Proses Validasi Kemenag -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Permohonan Masuk</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
                foreach ($total_notif as $total_notif) { ?>
								<?= $total_notif->total_notif; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Data Pending-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-warning shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-warning">
								Permohonan Pending</div>
							<div class="h4 mb-0 text-gray-800">
								12
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_pending') ?>"
								class="badge badge-warning float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Data Selesai-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-success shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-success">
								Permohonan Selesai</div>
							<div class="h4 mb-0 text-gray-800">
								12
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/selesai') ?>" class="badge badge-success float-right"><i
									class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


