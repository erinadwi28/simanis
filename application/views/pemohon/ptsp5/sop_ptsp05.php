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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
				</div>
				<div class="card-body ">
					<h6><b>Persyaratan :</b></h6>
					<p class="persyaratan mb-0">
					<ol type="1" class="ml-0 list-syarat">
						<li>Pemohon mengunduh Surat Permohonan, <br> unduh dengan <b><a href="<?= base_url() ?>assets/dashboard/unduhan/pemohon/ptsp5/Template%20Surat%20Permohonan.docx">[klik disini]</a></b></li>
						<li>Pemohon mengunduh Surat Pernyataan Pergi Haji Pertama, <br> unduh dengan <b><a href="<?= base_url() ?>assets/dashboard/unduhan/pemohon/ptsp5/Template%20Surat%20Pernyataan.docx">[klik disini]</a></b></li>
						<li>Pemohon mengisi Surat Permohonan yang ditujukan kepada Kepala Kantor Kemenag Klaten.</li>
						<li>Pemohon mengisi Surat Pernyataan Pergi Haji Pertama dengan memberikan materai Rp.10.000.</li>
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah Surat Permohonan dan Surat Pernyataan yang telah diisi. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah FC (Fotocopy) KTP (Kartu Tanda Penduduk). <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah bukti pelunasan. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.</li>
					</ol>
					</p>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('dashboard/form_ptsp05') ?>">
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