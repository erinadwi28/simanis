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
        <div class="sidebar-brand-text mx-3">KEPALA</div>
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
            <a class="collapse-item"href="">Proses Pending</a>
            <a class="collapse-item" href="">Proses Selesai</a>
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
