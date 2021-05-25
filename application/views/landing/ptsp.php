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

<!-- Header -->
<header class="text-center">
	<div class="container-fluid">
		<div class="row banner-profile">
			<div class="col-md-12">
				<h1>LAYANAN PTSP</h1>
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
	<section class="ptsp">
		<div class="container">
			<div class="row">
				<div class="col text-center section-tata-cara mt-0">
					<p>
						Berikut beberapa permohonan yang termasuk dalam
						<br>
						Pelayanan Terpadu Satu Pintu (PTSP)
					</p>
				</div>
			</div>
			<!-- <div class="row mb-2">
				<div class="col text-center section-tata-cara mt-0">
					<div class="input-group mb-3 cari-permohonan">
						<input type="text" class="form-control" placeholder="Cari permohonan...."
							aria-label="Cari permohonan...." aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn" type="button" id="button-cari"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div> -->
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card item-1 shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										1
									</div>
									<div class="col-md-10 content-list mb-0">
										<p class="card-text">
											Permohonan Rohaniawan
											dan Petugas Do'a
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_1')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										2
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Rekomendasi Kegiatan Keagamaan
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_2')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										3
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Legalisir Ijazah
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_3')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card item-1 shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										4
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_4')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										5
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Surat Keterangan Haji Pertama
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_5')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item px-0 px-3 py-3">
								<div class="row">
									<div class="round-number">
										6
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Paspor Haji dan Umrah
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_6')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card item-1 shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										7
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Izin Pendirian KBIHU
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_7')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										8
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_8')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3 item-big">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										9
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh
											(PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_9')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card item-1 shadow text-center d-flex flex-column mb-3 item-big">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										10
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara
											Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_10')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										11
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Pindah Siswa Madrasah
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_11')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										12
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Bantuan RA/Madrasah
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_12')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										13
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Rekomendasi Ijin Operasional Lembaga Baru
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_13')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										14
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Ijop LPQ
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_14')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										15
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Ijop Madin
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_15')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card item-1 shadow text-center d-flex flex-column mb-3 item-big">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										16
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Rekomendasi Proposal PD Pontren (Bantuan Sarpras/Pembangunan/Rehabilitasi Bangunan)
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_16')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										17
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Tambahan Jam Mengajar Guru
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_17')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										18
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Rekomendasi Permohonan Bantuan Masjid
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_18')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										19
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Petugas Siaran Keagamaan
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_19')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										20
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Ijin Operasional Majelis Taklim 
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_20')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										21
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Arah Ukur Kiblat
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_21')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										22
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Rekomendasi Permohonan ID Masjid dan Musala
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_22')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										23
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Mutasi GPAI PNS
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_23')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-2">
								<div class="row">
									<div class="round-number">
										24
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_24')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										25
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Konsultasi dan Informasi Sertifikasi Halal, Zakat dan Wakaf
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_25')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-2">
								<div class="row">
									<div class="round-number">
										26
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru, Haji
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_26')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-ptsp">
					<div class="card shadow text-center d-flex flex-column mb-3">
						<div class="card-body justify-content-center">
							<div class="content-item mb-0 px-0 py-3">
								<div class="row">
									<div class="round-number">
										27
									</div>
									<div class="col-md-10 justify content-list mb-0">
										<p class="card-text">
											Permohonan Surat Keterangan Tambahan Penghasilan
										</p>
									</div>
								</div>
							</div>
							<a href="<?= base_url('ptsp/detail_permohonan_27')?>"
								class="card-link float-right">Selengkapnya &nbsp;<i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
