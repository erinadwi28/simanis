<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Standar Operasional Prosedur</h1>
			<nav aria-label="breadcrumb" class="nav-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">SOP</li>
				</ol>
			</nav>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Bantuan Masjid</h6>
				</div>
				<div class="card-body ">
					<h6><b>Persyaratan :</b></h6>
					<p class="persyaratan mb-0">
						<ol type="1" class="ml-0 list-syarat">
							<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
							<li>Pemohon mengunggah surat permohonan yang ditujukan kepada Kepala Kemenag Kab. Kalten ditandatangi oleh takmir masjid. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
							<li>Pemohon mengunggah Proposal Memuat:<br></li>
								<ol type="a">
									<li>Surat Permohonan Bantuan ditanda tangan Lurah, Camat, Kepala KUA.</li>
									<li>RAB.</li>
									<li>Susunan Pengurus.</li>
									<li>Gambar Kegiatan.</li>
									<li>Fotocopy KTP Pengurus.</li>
									<li>Rekening atas nama Takmir / Panitia.</li>
									<li>Nomor Identitas Masjid.</li>
									<li>Surat keterangan domisili masjid.</li>
									<li>Fotocopy sertifikat wakaf/ Ikrar wakaf/ surat keterangan dari pejabat berwenang jika tanah kas.</li>
								</ol>
							</li>
							(Format: PDF, Ukuran: Max 10 MB)
							<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.
							</li>
						</ol>
					</p>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('dashboard/form_ptsp18') ?>">
						<button id="btn_kembali" class="btn btn-sm btn-primary float-right" type="submit">
							<i class="far fa-edit nav-icon">
							</i> Buat
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
