<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Sidebar -->
	<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
			<div class="">
				<img src="<?= base_url('../assets/landing/images/logo_dashboard.png') ?>" width="45">
			</div>
			<div class="sidebar-brand-text mx-3">FRONT OFFICE </div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			MENU
		</div>

		<!-- Nav Item - Main Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menupermohonanptsp" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-book"></i>
				<span>Permohonan PTSP</span>
			</a>
			<div id="menupermohonanptsp" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_pending') ?>">Permohonan Pending</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_backoffice') ?>">Permohonan Selesai FO</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_kasi') ?>">Proses BO</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_timteknis') ?>">Proses Kasi</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_kasubag') ?>">Proses Kasubag</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_kasubag') ?>">Proses Tim Teknis</a>
					<a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_selesai') ?>">Proses Selesai</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatapemohon" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Pemohon</span>
			</a>
			<div id="menudatapemohon" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_pemohon') ?>">Data Pemohon</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_pemohon') ?>">Ubah
						Password Pemohon</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatabackoffice" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Back Office</span>
			</a>
			<div id="menudatabackoffice" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_backoffice') ?>">Data Back Office</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_backoffice') ?>">Ubah
						Password Back Office</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatakasi" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Kasi</span>
			</a>
			<div id="menudatakasi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_kasi') ?>">Data Kasi</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_kasi') ?>">Ubah
						Password Kasi</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatatimteknis" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Tim Teknis</span>
			</a>
			<div id="menudatatimteknis" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_timteknis') ?>">Data Tim Teknis</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_timteknis') ?>">Ubah
						Password Tim Teknis</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatakasubag" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Kasubag</span>
			</a>
			<div id="menudatakasubag" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_kasubag') ?>">Data Kasubag</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_kasubag') ?>">Ubah
						Password Kasubag</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatakepala" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-user"></i>
				<span>Data Kepala</span>
			</a>
			<div id="menudatakepala" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_kepala') ?>">Data Kepala</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/form_cari_nik_ubah_kata_sandi_kepala') ?>">Ubah
						Password Kepala</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link " href="<?= base_url('frontoffice/list_berita') ?>">
				<i class="fa fa-book"></i>
				<span>Berita</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menudatalaporan" for=""
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fa fa-book"></i>
				<span>Laporan</span>
			</a>
			<div id="menudatalaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('frontoffice/list_data_permohonan_selesai') ?>">Lap. Permohonan
						Selesai</a>
					<a class="collapse-item" href="<?= base_url('frontoffice/lsit_data_pengaduan') ?>">Lap. Pengaduan</a>
				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
	</ul>
	<!-- End of Sidebar -->
