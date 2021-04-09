<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="">
        <img src="<?= base_url('../assets/landing/images/logo_dashboard.png') ?>" width="45">
      </div>
      <div class="sidebar-brand-text mx-3">KEPALA</div>
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
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menupermohonanptsp" for="" aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-book"></i>
        <span>Permohonan PTSP</span>
      </a>
      <div id="menupermohonanptsp" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_pending') ?>">Permohonan Pending</a>
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_prosesFO') ?>">Permohonan Proses FO</a>
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_prosesBO') ?>">Permohonan Proses BO</a>
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_prosesKasi') ?>">Permohonan Proses Kasi</a>
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_prosesKasubag') ?>">Permohonan Proses Kasubag</a>
          <a class="collapse-item" href="<?= base_url('dashboard/list_permohonan_selesai') ?>">Permohonan Selesai</a>
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