<!-- Navbar -->
<div class="container-fluid">
	<div class="row bg-white">
		<nav class="col navbar navbar-expand-lg navbar-light bg-white shadow px-0 py-0">
			<div class="container">
				<a href="#" class="navbar-brand">
					<img src="<?= base_url('assets/landing/images/logo.png')?>" alt="Logo SIMANIS" class="img-fluid">
				</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
					data-target="#navb">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navb">
					<ul class="navbar-nav ml-auto mr-3">
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('beranda')?>" class="nav-link">Beranda</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('profil')?>" class="nav-link">Profil</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('ptsp')?>" class="nav-link active">Layanan PTSP</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('pengaduan')?>" class="nav-link">Pengaduan</a>
						</li>
					</ul>

					<!-- mobile button -->
					<form class="form-inline d-sm-block d-md-none" method="post" action="<?= base_url('masuk')?>">
						<button class="btn btn-login my-2 my-sm-0 px-3">Masuk | Daftar</button>
					</form>

					<!-- desktop button -->
					<form class="form-inline my-2 my-lg-0 d-none d-md-block" method="post"
						action="<?= base_url('masuk')?>">
						<button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-3">Masuk | Daftar</button>
					</form>
				</div>
			</div>
		</nav>
	</div>
</div>
</div>

<!-- Chat Haji & Umrah -->
<div class="container haji-umrah">
	<div class="sticky-container">
		<ul class="sticky">
			<li>
				<img src="<?= base_url('assets/landing/images/wa.png')?>" width="32" height="32">
				<p><a href="https://api.whatsapp.com/send?phone=628112650662&text=Info" target="_blank">Chat Haji <br> & Umrah</a></p>
			</li>
		</ul>
	</div>
</div>

<!-- Main Content -->
<main>
	<section class="detail-ptsp-title">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h4>Permohonan Surat Keterangan Haji Pertama</h4>
				</div>
			</div>
		</div>
	</section>
	<section class="detail-ptsp">
		<div class="container">
			<div class="row py-4">
				<div class="col-md-6 text-center">
					<img class="img-fluid" src="<?= base_url('assets/landing/images/pelayanan.png')?>" alt="">
				</div>
				<div class="col-md-6 content-detail text-center">
					<div class="row mb-4">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header text-center mb-0 py-1">
									<h4>Waktu</h4>
								</div>
								<div class="card-body">
									<p class="card-text">1 hari
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-12 syarat">
							<div class="card shadow">
								<div class="card-header text-center mb-0 py-1">
									<h4>Persyaratan</h4>
								</div>
								<div class="card-body">
									<ol type="1" class="ml-3 list">
										<li>Surat Permohonan ditujukan kepada Kepala Kantor Kemenag Kab. Klaten;</li>
										<li>FC KTP;</li>
										<li>Surat Peryataan Pergi Haji Pertama bermaterai Rp. 10.000;</li>
										<li>Bukti pelunasan;</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
