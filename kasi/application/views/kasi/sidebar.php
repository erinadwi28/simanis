<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
      style="background: -webkit-linear-gradient(top, #10DB63 0%, #007530 100%);" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="">
        <img src="<?= base_url('../assets/landing/images/logo.png') ?>" width="90">
        </div>
        <div class="sidebar-brand-text mx-3">KASI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="">
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
            <a class="collapse-item" href="">Proses KEMENAG</a>
            <a class="collapse-item"href="">Pending</a>
            <a class="collapse-item" href="">Selesai</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuwarga" for="" aria-expanded="true" aria-controls="collapsePages">
			<i class="fa fa-users"></i>
			<span>Data Pemohon</span>
		</a>
		<div id="menuwarga" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/list_data_warga') ?>">Data Pemohon</a>
				<a class="collapse-item" href="<?= base_url('admin/form_cari_nik_ubah_kata_sandi_warga') ?>">Ubah Password Pemohon</a>
			</div>
		</div>
	</li>
  <li class="nav-item">
		<a class="nav-link " href="<?= base_url('admin/list_feedback') ?>">
			<i class="fa fa-book"></i>
			<span>Berita</span>
		</a>
	</li>
  <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menulaporan" for=""
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-book"></i>
          <span>Laporan</span>
        </a>
        <div id="menulaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">Data Pengguna</a>
            <a class="collapse-item"href="">Lap. Permohonan Masuk</a>
            <a class="collapse-item" href="">Lap. Permohonan Selesai</a>
            <a class="collapse-item" href="">Lap. Pengaduan</a>
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
