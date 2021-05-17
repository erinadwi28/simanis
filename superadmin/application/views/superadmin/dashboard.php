<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0">Dashboard</h1>
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
				<h1 class="h5 mb-0 text-bold text-light">Data Pengguna</h1>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- Data Pemohon -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Pemohon</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_pemohon') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Front Office -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Front Office</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesBO') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Back Office -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Back Office</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesTimTeknis') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Kasi-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Kasi</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesKasi') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Data Kasubag -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Kasubag</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_masuk') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Kepala -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-user shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-user">
								Kepala</div>
							<div class="h4 mb-0 text-gray-800">
								10
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesBO') ?>" class="badge badge-user float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
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
		<!-- Data Proses FO -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses FO</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($total_notif as $total_notif) { ?>
									<?= $total_notif->total_notif; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_masuk') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Proses BO -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses BO</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_prosesBO as $prosesBO) { ?>
									<?= $prosesBO->permohonan_prosesBO; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesBO') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Proses Tim Teknis -->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses Tim Teknis</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_prosesTimTeknis as $prosesTimTeknis) { ?>
									<?= $prosesTimTeknis->permohonan_prosesTimTeknis; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesTimTeknis') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data Proses Kasi-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses Kasi</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_prosesKasi as $prosesKasi) { ?>
									<?= $prosesKasi->permohonan_prosesKasi; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesKasi') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">

		<!-- Data Proses Kasubag-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses Kasubag</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_prosesKasubag as $prosesKasubag) { ?>
									<?= $prosesKasubag->permohonan_prosesKasubag; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_prosesKasubag') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Data Pending-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-danger shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-danger">
								Pending</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_pending as $pending) { ?>
									<?= $pending->permohonan_pending; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_pending') ?>" class="badge badge-danger float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Permohonan Selesai-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-success shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-success">
								Selesai Validasi</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_selesai as $selesai) { ?>
									<?= $selesai->permohonan_selesai; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_selesai') ?>" class="badge badge-success float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Permohonan Arsip-->
		<div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-info shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-info">
								Arsip Permohonan</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_arsip as $arsip) { ?>
									<?= $arsip->permohonan_arsip; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_arsip') ?>" class="badge badge-info float-right"><i class="far fa-eye nav-icon"></i>
								Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Data Selesai FO-->
		<!-- <div class="col-xl-3 col-md-3 mb-3">
			<div class="card border-left-warning shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-warning">
								Permohonan Selesai FO</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_selesaiFO as $selesaiFO) { ?>
									<?= $selesaiFO->permohonan_selesaiFO; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_selesaiFO') ?>" class="badge badge-warning float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->

	</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->