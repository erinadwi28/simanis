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
							<a href="<?= base_url('beranda')?>" class="nav-link active">Beranda</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('profil')?>" class="nav-link">Profil</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('ptsp')?>" class="nav-link">Layanan PTSP</a>
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

<!-- Header -->
<header>
	<div class="owl-carousel owl-theme">
		<div class="slide slide-1">
		</div>
		<div class="slide slide-2">
		</div>
		<div class="slide slide-3">
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
	<section class="terkini-profile">
		<div class="container">
			<div class="section-terkini-profile row justify-content-center">
				<div class="col-md-6">
					<div class="card shadow mb-2 px-4">
						<div class="card-body">
							<h3 class="card-title terkini-title">Terkini</h3>
							<hr>
							<div class="terkini-content px-2 py-2">
								<div class="terkini-item">
									<div class="terkini-entry-title">
										<div class="row mb-2">
											<div class="round-number">
												1
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														Peringati Milad ke 24, MTsN 5 Klaten Bagikan 305 Paket Sembako
													</p>
												</a>

												<p class="terkini-date mb-0">
													Sabtu, 13 Maret 2021
												</p>
											</div>
										</div>
										<div class="row mb-2">
											<div class="round-number">
												2
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														Persiapan Ujian Madrasah, Kemenag Klaten Adakan Rakor
													</p>
												</a>

												<p class="terkini-date mb-0">
													Selasa, 9 Maret 2021
												</p>
											</div>
										</div>
										<div class="row mb-2">
											<div class="round-number">
												3
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														Serahkan SK PAK Non PNS, Kakankemenag Minta Ciptakan Toleransi
														dan Kerukunan
													</p>
												</a>

												<p class="terkini-date mb-0">
													Kamis, 4 Maret 2021
												</p>
											</div>
										</div>
										<div class="row mb-2">
											<div class="round-number">
												4
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														Penggunaan BOP RA Harus Sesuai Juknis
													</p>
												</a>

												<p class="terkini-date mb-0">
													Kamis, 4 Maret 2021
												</p>
											</div>
										</div>
										<div class="row mb-2">
											<div class="round-number">
												5
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														Verifikasi Rekomendasi IMB Rumah Ibadah, Kemenag Klaten Adakan
														Survey Lapangan
													</p>
												</a>

												<p class="terkini-date mb-0">
													Rabu, 3 Maret 2021
												</p>
											</div>
										</div>
										<div class="row mb-2">
											<div class="round-number">
												6
											</div>
											<div class="col-md-11 justify terkini-list-title mb-0">
												<a href="#">
													<p class="card-text">
														TPQ Tanamkan Akhlak Anak Bangsa
													</p>
												</a>

												<p class="terkini-date mb-0">
													Senin, 1 Maret 2021
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a href="#" class="card-link float-right">Selengkapnya &nbsp;<i
									class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col text-center section-profile-heading">
							<h2>Profil</h2>
							<p class="mb-1">Mengenal Kementerian Agama
								<br>
								Kabupaten Klaten
							</p>
							<div class="image-office mb-2">
								<img class="img-fluid" src="<?= base_url('assets/landing/images/kantor.png')?>"
									alt="kantor kemenag">
								<center>
									<figcaption>Kantor Kemenag Klaten</figcaption>
								</center>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col justify-content-center section-profile-content">
							<p class="mb-0">
								Kantor Kementerian Agama Kabupaten Klaten merupakan salah
								satu instansi vertical Kementerian Agama yang berada dibawah
								dan bertanggung jawab kepada Kementerian Agama Provinsi
								Jawa Tengah.
							</p>
							<p class="my-0">
								Selengkapnya klik dibawah ini:
							</p>
							<p><a href="<?= base_url('profil')?>">Sejarah, Visi & Misi, Struktur Organisasi, Kontak
									Kami, Peta Lokasi</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="user-guide-heading" id="user-guide">
		<div class="container">
			<div class="row">
				<div class="col text-center section-popular-heading mt-4">
					<h2>Tata Cara Penggunaan</h2>
					<p>
						Kini Pelayanan Terpadu Satu Pintu
						<br>
						akan lebih mudah
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="user-guide-content">
		<div class="container">
			<div class="section-user-guide row justify-content-center">
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="card shadow text-center d-flex flex-column">
						<div class="card-body justify-content-center">
							<div class="content-guide">
								<div class="image-guide align-items-center px-2 py-3">
									<img src="<?= base_url('assets/landing/images/login.png')?>" alt=""
										class="img-fluid">
								</div>
								<div class="title-guide">
									<h5>Masuk/Daftar</h5>
								</div>
								<div class="content-guide mb-0">
									<p class="mb-0">
										Pemohon masuk ke akunnya dengan
										menggunakan Email dan Kata Sandi
										yang telah terdaftar, Jika pemohon belum
										memiliki akun maka harus mendaftar
										terlebih dahulu.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="card shadow text-center d-flex flex-column">
						<div class="card-body justify-content-center">
							<div class="content-guide">
								<div class="image-guide align-items-center px-2 py-3">
									<img src="<?= base_url('assets/landing/images/prosedur.png')?>" alt=""
										class="img-fluid">
								</div>
								<div class="title-guide">
									<h5>Persyaratan Permohonan</h5>
								</div>
								<div class="content-guide mb-0">
									<p class="mb-0">
										Pemohon mencari dan memilih
										jenis pelayanan yang dibutuhkan.
										Kemudian memahami persyaratan
										dan prosedur yang berlaku.
									</p>

								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="card shadow text-center d-flex flex-column">
						<div class="card-body justify-content-center">
							<div class="content-guide">
								<div class="image-guide align-items-center px-2 py-3">
									<img src="<?= base_url('assets/landing/images/isi_form.png')?>" alt=""
										class="img-fluid">
								</div>
								<div class="title-guide">
									<h5>Ajukan Permohonan</h5>
								</div>
								<div class="content-guide mb-0">
									<p class="mb-0">
										Pemohon mengajukan permohonan
										melalui dashboard masing-masing
										dengan mengisi form yang
										tersedia dan melengkapi
										dokumen yang dibutuhkan.
									</p>

								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="card shadow text-center d-flex flex-column">
						<div class="card-body justify-content-center">
							<div class="content-guide">
								<div class="image-guide align-items-center px-2 py-3">
									<img src="<?= base_url('assets/landing/images/notif.png')?>" alt=""
										class="img-fluid">
								</div>
								<div class="title-guide">
									<h5>Hasil Permohonan</h5>
								</div>
								<div class="content-guide mb-0">
									<p class="mb-0">
										Pemohon menunggu notifikasi
										permohonan yang telah diajukan,
										jika permohonan telah selesai
										dapat di ambil maupun langsung
										di cetak (masih nggantung).
									</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-app" id="apps">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h2>Aplikasi SIMANIS</h2>
					<p>Untuk install aplikasi SIMANIS berbasis
						<br>
						android di SmartPhone Anda. Silahkan
						<br>
						unduh terlebih dahulu. di Play Store atau <br> tekan tombol Download dibawah.
					</p>
					<div class="row">
						<div class="download-apk">
							<a href="#">
								<img src="<?= base_url('assets/landing/images/playstore.png')?>" alt=""
									class="img-fluid">
							</a>
							<a href="#">
								<button type="submit" class="btn btn-primary float-right mt-3">Download
									Sekarang</button>
							</a>
						</div>
					</div>

				</div>
				<div class="col-md-8 text-center image-app">
					<img class="img-fluid" src="<?= base_url('assets/landing/images/apps.png')?>" alt="logo partner"
						class="img-partner">
				</div>
			</div>
		</div>
	</section>
</main>
