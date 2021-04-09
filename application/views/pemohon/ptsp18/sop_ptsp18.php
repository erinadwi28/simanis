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
							<li>Pemohon mengunduh surat permohonan ditujukan kepada Kepala Kantor Kemenag Klaten ditandatangani oleh 
							takmir masjid yang bersangkutan. Untuk mengunduh <b><a href="<?= base_url() ?>assets/pemohon/sop/ptsp18/srt_permohonan.doc" target="_blank">[di sini]</a></b></li>
							<li>Pemohon mengisi surat permohonan yang telah diunduh tersebut.</li>
							<li>Pemohon membuat proposal yang memuat:
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
							<li>Pemohon mengisi dan melengkapi form pengajuan yang telah disediakan.</li>
							<li>Pemohon mengunggah surat permohonan dan proposal pada form pengajuan.</li>
							<li>Pemohon menunggu informasi dari Kemenag terkait proses pengajuan permohonan dan pengambilan surat yang sudah jadi.</li>
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
