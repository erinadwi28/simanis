<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp03') ?>">SOP</a></li>
				<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
			</ol>
		</nav>
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<?php foreach ($detail_profil_saya as $detail) { ?>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Ijazah</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp03" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp03') ?>" method="POST">
						<div class="form-group row">
							<label for="Nama" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama"
										value="<?= $detail->nama ?>" placeholder="masukkan nama disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp_aktif" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input class="form-control" id="no_hp" name="no_hp" rows="1"
										placeholder="masukkan no hp disini..." required data-parsley-type="number"
										minlength="11" value="">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="keperluan_legalisir_ijazah" class="col-sm-3 col-form-label">Keperluan Untuk</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input class="form-control" id="keperluan_legalisir_ijazah" name="keperluan_legalisir_ijazah" rows="1"
										placeholder="masukkan keperluan legalisir disini..." required value="">
								</div>
							</div>
						</div>
				</div>
				<?php } ?>
				<div class="card-footer">
					<a href="#">
						<button id="btn_simpan" class="btn btn-sm btn-buat float-right" type="submit">
							<i class="far fa-save nav-icon">
							</i> Simpan
						</button>
					</a>
				</div>
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
				<p class="persyaratan mb-0">
					Pemohon adalah pemilik ijazah/STTB/SKP ijazah yang mengajukan permohonan pengesahan atau yang
					diberikan kuasa oleh pemiliknya.
					<ol type="1" class="ml-0 list-syarat modal-content-syarat">
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah FC (Fotocopy) Ijazah/STTB/SKP yang akan disahkan. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses pengesahan telah selesai.</li>
						<li>Pemohon mengambil dokumen legalisir dengan membawa dokumen asli.</li>
						<li>Jika Pengambilan dokumen legalisir diwakilkan maka wajib membawa <b> <a href="<?= base_url() ?>assets/pemohon/sop/ptsp03/FM-PI-01.pdf" target="_blank">FM-PI-01</a></b> dan <b><a href="<?= base_url() ?>assets/pemohon/sop/ptsp03/FM-PI-02.pdf" target="_blank">FM-PI-02</a></b>.</li>
					</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
