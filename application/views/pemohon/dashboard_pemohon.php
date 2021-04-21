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

	<!-- Page Heading Data Permohonan PTSP-->
	<div class="card shadow h-100 p-0 mb-3">
		<div class="card-body px-3 py-2 title-track">
			<div class="align-items-center justify-content-between text-center">
				<h1 class="h5 mb-0 text-bold text-light">Proses Permohonan</h1>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Data Proses Validasi Kemenag -->
		<div class="col-xl-4 col-md-3 mb-3">
			<div class="card border-left-primary shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-primary">
								Proses Validasi Kemenag</div>
							<div class="h4 mb-0 text-gray-800">
								<?php
								foreach ($permohonan_validasi_kemenag as $validasi_kemenag) { ?>
									<?= $validasi_kemenag->permohonan_validasi_kemenag; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/list_permohonan_validasi_kemenag') ?>" class="badge badge-primary float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Data Permohonan Pending -->
		<div class="col-xl-4 col-md-3 mb-3">
			<div class="card border-left-danger shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-danger">
								Permohonan Pending</div>
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

		<!-- Data Permohonan Selesai -->
		<div class="col-xl-4 col-md-3 mb-3">
			<div class="card border-left-success shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-success">
								Permohonan Selesai</div>
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
							<center>
								<a href="<?= base_url('dashboard/list_permohonan_selesai') ?>" class="badge badge-success float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Page Heading Data Laynan PTSP-->
	<div class="card shadow h-100 p-0 mb-3 mt-2">
		<div class="card-body px-3 py-2 title-track">
			<div class="align-items-center justify-content-between text-center">
				<h1 class="h5 mb-0 text-light">Daftar Layanan PTSP</h1>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Data Permohonan Selesai -->
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								1. Rohaniawan dan Petugas Do'a</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp01') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								2. Rek. Keg. Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp02') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								3. Legalisir Ijazah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp03') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								4. Legalisir Dokumen</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp04') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								5. Suket. Haji Pertama</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp05') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								6. Rek. Paspor Haji & Umrah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp06') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								7. Rek. Izin Pendirian KBIHU</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp07') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								8. Rek. Izin Perpanjang Operasional KBIHU</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp08') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								9. Rek. Izin Pendirian PPIU & PIHK</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp09') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								10. Rek. Izin Perpanjang Operasional PPIU & PIHK</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp10') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								11. Rek. Pindah Siswa Madrasah</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp11') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								12. Rek. Bantuan RA/Madrasah</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp12') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								13. Rek. Izin Operasional Lembaga Baru</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp13') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								14. Izin Operasional LPQ</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp14') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								15. Izin Operasioanl Madin</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp15') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								16. Rek. Proposal Pontren</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp16') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								17. Tambahan Jam Mengajar Guru</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp17') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								18. Rek. Bantuan Masjid</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp18') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								19. Petugas Siaran Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								20. Ijin Operasional Majlis Taklim</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp20') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								21. Arah Ukur Kiblat</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								22. Rek. ID Masjid & Musala</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								23. Mutasi GPAI PNS</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								24. Rek. Pajak Bendaraan Bermotor Layanan Sosial Rumah Ibadah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								25. Konsultasi & Informasi Sertifikasi Halal, Zakat & Wakaf</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="<?= base_url('dashboard/sop_ptsp25') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								26. Data Lembaga Agama & Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="<?= base_url('dashboard/sop_ptsp26') ?>" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4 ptsp">
			<div class="card border-left-success shadow-lg h-100 p-0">
				<div class="card-body px-3 py-3 ">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-md text-success  mb-1">
								27. Suket. Tambahan Penghasilan</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i class="fas fa-arrow-right"></i></a>
							</center>
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
