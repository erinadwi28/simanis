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
							<a href="<?= base_url('ptsp')?>" class="nav-link">Layanan PTSP</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('pengaduan')?>" class="nav-link active">Pengaduan</a>
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

<!-- Header -->
<header class="text-center">
	<div class="container-fluid">
		<div class="row banner-profile">
			<div class="col-md-12">
				<h1>PENGADUAN LAYANAN</h1>
			</div>
		</div>
	</div>
</header>

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
	<section class="pengaduan">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center section-pengaduan-title mt-0 mb-2">
					<p>
						Anda ingin menyampaikan saran, kritik dan aduan terkait pelayanan di lingkungan
						<br>
						Kantor Kementerian Agama Kabupaten Klaten, silahkan isi form dibawah ini:
					</p>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col item-pengaduan">
					<div class="card item-1 shadow d-flex flex-column">
						<div class="card-body">
							<em class="small text-danger">*Data Anda Kami rahasiakan</em>
							<div class="content-item mb-0 px-3 py-3">
								<form id="form_pengaduan" method="POST">
									<div class="form-group">
										<label for="judul_laporan">Judul Laporan *</label>
										<input type="text" class="form-control" id="judul_laporan"
											placeholder="masukkan judul laporan disini..." required>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="nama_pelapor">Nama Pelapor *</label>
											<input type="text" class="form-control" id="nama_pelapor"
												placeholder="masukkan nama disini..." required>
										</div>
										<div class="form-group col-md-6">
											<label for="tgl_kejadian">Tanggal Kejadian *</label>
											<input type="date" class="form-control" id="tgl_kejadian" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="no_hp">No HandPhone Pelapor *</label>
											<input type="text" class="form-control" id="no_hp"
												placeholder="masukkan No HandPhone disini..." required data-parsley-type="number"
										minlength="11">
										</div>
									</div>
									<div class="form-group">
										<label for="isi">Isi Pesan *</label>
										<textarea type="text" class="form-control" id="isi"
											placeholder="masukkan pesan disini..." required></textarea>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="Jenis_kelamin">Tujuan Pengaduan *</label>
											<select class="form-control" id="tujuan" name="tujuan" required>
												<option selected value="">~ pilih tujuan ~</option>
												<option value="Pelayanan PTSP">Pelayanan PTSP</option>
												<option value="Pelayanan Haji">Pelayanan Haji</option>
												<option value="Pelayanan Pendidikan dan Pondok Pesantren">Pelayanan
													Pendidikan dan Pondok Pesantren</option>
												<option value="Layanan Nikah">Layanan Nikah</option>
												<option value="Layanan Rumah Ibadah">Layanan Rumah Ibadah</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="tujuan_lain">Tujuan Lainnya </label>
											<input type="text" class="form-control" id="tujuan_lain"
												placeholder="tujuan lainnya masukkan disini..." required>
										</div>
									</div>
									<button type="submit" class="btn btn-primary float-right mt-2">Kirim</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="whistleblowing">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center section-whistleblowing-title mt-2 mb-2">
					<p>
						Anda ingin menyampaikan penyimpangan di lingkungan Kementerian Agama Kabupaten Klaten,
						<br>
						silahkan Klik gambar dibawah ini :
					</p>
				</div>
			</div>
			<div class="row text-center mb-5">
				<div class="col">
					<a href="https://simwas.kemenag.go.id/~simwbs/">

						<img class="img-fluid" src="<?= base_url('assets/landing/images/whistleblowing.png')?>" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>
</main>
