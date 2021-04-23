<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Standar Operasional Prosedur</h3>
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
			<div class="card shadow mb-4 card-syarat">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Mutasi GPAI PNS</h6>
				</div>
				<div class="card-body ">
					<h6><b>Persyaratan :</b></h6>
					<p class="persyaratan mb-0">
						Pemohon membuat surat permohonan beserta lampiran sesuai persyaratan dalam 1 file PDF
						<ol type="1" class="ml-0 list-syarat">
						<li> Surat permohonan ditujukan kepada Kepala Kantor Kemenag Kab. Klaten dilampiri </li>
						<li> Surat permohonan penambahan tugas mengajar dari GPAI PNS.</li>
						<li> Surat pernyataan tidak berkeberatan dari Kepala Sekolah Satminkal.</li>
						<li> Surat pernyataan tidak berkeberatan menerima GPAI PNS dari Kepala Sekolah Satminkal tambahan mengajar.</li>
						<li> Surat persetujuan dari pengawas PAI yang membawahi wilayah kerjanya.</li>
						<li> Pemohon mengunggah Surat Permohonan dan Surat Pernyataan yang telah diisi/dibuat dalam 1 file. <br> (Format: PDF, Ukuran: Max 10 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.</li>
						</ol>
					</p>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('dashboard/form_ptsp23') ?>">
						<button id="btn_buat" class="btn btn-sm btn-buat float-right" type="submit">
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
