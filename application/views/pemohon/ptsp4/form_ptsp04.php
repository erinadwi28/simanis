<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp04') ?>">SOP</a></li>
				<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
			</ol>
		</nav>
	</div>

	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<?php foreach ($detail_profil_saya as $detail) { ?>
			<div class="col-xs col-sm-8">
				<div class="card shadow mb-5">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Dokumen Kepegawaian, Surat, Piagam,
							Sertifikat</h6>
					</div>
					<div class="card-body">
						<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i class="fas fa-info-circle"></i></button>
						<br>
						<form class="form-horizontal mt-4" id="form_ptsp04" enctype="multipart/form-data" action="<?= base_url('dashboard/aksi_pengajuan_ptsp04') ?>" method="POST">
							<div class="form-group row">
								<label for="Nama" class="col-sm-3 col-form-label">Nama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama" name="nama" 
										value="<?= $detail->nama; ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp_aktif" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line">
									<input class="form-control" id="no_hp" name="no_hp" rows="1"
										placeholder="masukkan no hp disini..." 
										required data-parsley-type="number" minlength="11" value="<?= $detail->no_hp; ?>">
									</div>
								</div>
							</div>

					</div>
				<?php } ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="#">
							<button id="btn_simpan" class="btn btn-sm btn-buat" type="submit">
								<i class="far fa-save nav-icon">
								</i> Simpan
							</button>
						</a>
					</div>
				</div>
				</form>
				</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="sopModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Standar Operasional Prosedur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="modal-title-syarat"><b>Persyaratan :</b></h6>
				<p class="modal-content-syarat mb-0">
					Pemohon adalah pemilik asli dokumen yang mengajukan permohonan pengesahan atau yang diberikan
					kuasa oleh pemiliknya (<b> <a href="<?= base_url() ?>assets/pemohon/sop/ptsp03/FM-PI-01.pdf" target="_blank">FM-PI-01</a></b> dan <b><a href="<?= base_url() ?>assets/pemohon/sop/ptsp03/FM-PI-02.pdf" target="_blank">FM-PI-02</a></b>).
				<ol type="1" class="ml-0 list-syarat modal-content-syarat">
					<li>Mengisi dan menyelesaikan permohonan pengesahan Dokumen Kepegawaian, Surat, Piagam,
						Sertifikat.</li>
					<li>Mengupload/Mengunggah fotocopy dokumen yang akan dilakukan legalisir/pengesahan.</li>
					<li>Menunggu pemberitahuan pihak kemenag bahwa proses pengesahan telah selesai.</li>
					<li>Mengambil dokumen legalisir dengan membawa dokumen asli.</li>
				</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>