<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Welcome -->
			<div class="topbar-welcome ml-2">
				<p class="mb-0 ">Halo, Admin Back Office !</p>
			</div>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Nav Item - Alerts -->
				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-bell fa-fw"></i>
						<!-- Counter - Alerts -->
						<span class="badge badge-danger badge-counter">
							<?php
							foreach ($total_notif as $total_notif) { ?>
								<?= $total_notif->total_notif; ?>
							<?php } ?>
						</span>
					</a>

				</li>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $bo['nama'] ?></span>
						<img class="img-profile rounded-circle" src="<?= base_url(); ?>../assets/backoffice/profil/<?= $bo['foto_profil_bo'] ?>">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url() ?>dashboard/profil">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<a class="dropdown-item" href="<?= base_url() ?>dashboard/form_ubahsandi">
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