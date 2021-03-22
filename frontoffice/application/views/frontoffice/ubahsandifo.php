<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIMANIS - Dashboard</title>

    <!-- Custom fonts for this template-->
  
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  
    <!-- Custom styles for this template-->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
      style="background: -webkit-linear-gradient(top, #10DB63 0%, #007530 100%);" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="">
        <img src="img/logo_SIRA.png" width="90">
        </div>
        <div class="sidebar-brand-text mx-3">FRONT OFFICE</div>
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
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menupermohonanptsp" for=""
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-book"></i>
          <span>Laporan</span>
        </a>
        <div id="menupermohonanptsp" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Kata Sandi
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
                <h3>Form Ubah Kata Sandi Saya</h3>
                <a href="<?= base_url('warga') ?>">
                    <button id="btn_kembali" class="btn btn-sm btn-warning" type="submit">
                        <i class="fa fa-arrow-left">
                        </i> Kembali
                    </button>
                </a>
            </div>
        
            <!-- <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php elseif($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>
                </div>
                <div class="col-md-2"></div>
            </div> -->
        
            <!-- Content Row line 1-->
            <div class="row">
                <div class="col-md-2 mb-4">
                    <!-- Foto -->
                    <div class="mb-4">
        
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <!-- Detail Data -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <!-- Detail Data -->
                            <div class="card shadow mb-3">
                                <div class="card-body">
                                    <form role="form" action="<?= base_url() ?>warga/aksi_ubah_kata_sandi_profil_saya/"
                                        method="post" id="ubah_pass">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group-pass">
                                                    <label class="label-control" for="kata_sandi_awal"><b>Masukkan Kata Sandi
                                                            yang lama</b></label>
                                                    <input type="password" placeholder="masukkan disini..."
                                                        class="form-control form-user-input form-password"
                                                        name="kata_sandi_awal" id="kata_sandi_awal">
        
                                                    <input type="hidden" class="form-control form-user-input " name="id_warga"
                                                        id="id_warga" value="<?= $warga['id_warga'] ?>">
                                                    <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> -->
                                                </div>
                                                <div class="form-group-pass mt-3">
                                                    <label class="label-control" for="kata_sandi"><b>Masukkan Kata Sandi yang
                                                            baru</b></label>
                                                    <input type="password" placeholder="masukkan disini..."
                                                        class="form-control form-user-input form-password" name="kata_sandi"
                                                        id="kata_sandi">
                                                    <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> <br> -->
                                                </div>
                                                <div class="form-group-pass mt-3">
                                                    <label class="label-control" for="kata_sandi"><b>Masukkan Kata Sandi yang
                                                            baru</b></label>
                                                    <input type="password" placeholder="masukkan disini..."
                                                        class="form-control form-user-input form-password" name="kata_sandi"
                                                        id="kata_sandi">
                                                    <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> <br> -->
                                                    <input type="checkbox" class="form-checkbox" /> lihat
                                                    kata sandi
                                                    <br />
                                                </div>
                                                <center>
                                                    <a href="">
                                                        <button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
                                                            <i class="far fa-save nav-icon">
                                                            </i> Simpan
                                                        </button>
                                                    </a>
                                                </center>
        
                                            </div>
        
                                        </div>
                                    </form>
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

      <!-- Footer -->
      <footer class="sticky-footer" style="background-color: #007530;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto text-white">
            <span>2021 Copyright &copy; Kementrian Agama Kab. Klaten</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>