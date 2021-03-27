<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
			<div class="d-sm-flex align-items-center justify-content-between">
				<h1 class="h5 mb-0 text-bold text-title">Data Permohonan PTSP</h1>
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
		<div class="col-xl-4 col-md-3 mb-3">
			<div class="card border-left-warning shadow-lg">
				<div class="card-body px-3">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="h6 text-warning">
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
							<a href="<?= base_url('dashboard/list_permohonan_pending') ?>"
								class="badge badge-warning float-right"><i class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Data Selesai-->
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
							<a href="<?= base_url('dashboard/selesai') ?>" class="badge badge-success float-right"><i
									class="far fa-eye nav-icon"></i> Lihat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Page Heading Data Laynan PTSP-->
	<div class="card shadow h-100 p-0 mb-3 mt-2">
		<div class="card-body px-3 py-2 title-track">
			<div class="d-sm-flex align-items-center justify-content-between">
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
								Rohaniawan dan Petugas Do'a</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Rek. Keg. Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Legalisir Ijazah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Legalisir Dokumen</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Suket. Haji Pertama</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Rek. Paspor Haji & Umrah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Izin Pendirian KBIHU</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Izin Perpanjang Operasional KBIHU</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Izin Pendirian PPIU & PIHK</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Rek. Izin Perpanjang Operasional PPIU & PIHK</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Pindah Siswa Madrasah</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Bantuan RA/Madrasah</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Izin Operasional Lembaga Baru</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Izin Operasional LPQ</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Izin Operasioanl Madin</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Proposal Pontren</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Tambahan Jam Mengajar Guru</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Rek. Bantuan Masjid</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Petugas Siaran Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Ijin Operasional Majlis Taklim</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Arah Ukur Kiblat</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Rek. ID Masjid & Musala</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Mutasi GPAI PNS</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Rek. Pajak Bendaraan Bermotor Layanan Sosial Rumah Ibadah</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Konsultasi & Informasi Sertifikasi Halal, Zakat & Wakaf</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<a href="" class="badge badge-warning float-right">Selengkapnya <i
									class="fas fa-arrow-right"></i></a>
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
								Data Lembaga Agama & Keagamaan</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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
								Suket. Tambahan Penghasilan</div>
						</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-md-12">
							<center>
								<a href="" class="badge badge-warning float-right">Selengkapnya <i
										class="fas fa-arrow-right"></i></a>
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


