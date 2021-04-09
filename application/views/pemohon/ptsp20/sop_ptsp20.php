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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional Majlis Taklim</h6>
				</div>
				<div class="card-body ">
					<h6><b>Persyaratan :</b></h6>
					<p class="persyaratan mb-0">
						<ol type="1" class="ml-0 list-syarat">
							<li>Pemohon mengunduh surat permohonan yang ditujukan Kepala Kemenag <a href="">Klik Disini!</a></li>
							<li>Pemohon mengunduh surat rekomendasi Kepala KUA Kecamatan <a href="">Klik Disini!</a></li>
							<li>Pemohon mengunggah surat permohonan yang ditujukan Kepala Kemenag yang telah di isi</li>
							<li>Pemohon mengunggah surat rekomendasi Kepala KUA Kecamatan yang telah di isi</li>
							<li>Pemohon Mengisi dan Melengkapi form pengajuan yang telah disediakan.</li>
							<li>Pemohon Menunggu Informasi dari Kemenag terkait proses pengajuan permohonan.</li>
						</ol>
					</p>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('dashboard/form_ptsp20') ?>">
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
