<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 sidebar-toggle">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Welcome -->
			<div class="topbar-welcome ml-2 text-gray-600">
				<i class="fas fa-calendar-alt"></i>&nbsp; <span id="top-info-date" class="top-info-date"></span>&nbsp; | &nbsp;<span class="mb-0 ">Halo, Admin !</span>
			</div>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nama'] ?></span>
						<img class="img-profile rounded-circle" src="<?= base_url(); ?>../assets/dashboard/images/admin/profil/<?= $admin['foto_profil'] ?>">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('dashboard/profil') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profil Saya
						</a>
						<a class="dropdown-item" href="<?= base_url() ?>dashboard/form_ubahsandi">
							<i class="fas fa-user-lock fa-sm fa-fw mr-2 text-gray-400"></i>
							Ubah Kata Sandi
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Keluar
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->