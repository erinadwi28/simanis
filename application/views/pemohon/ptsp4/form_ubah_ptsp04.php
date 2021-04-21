<!-- Begin Page Content -->
<div class="container-fluid">

	<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan<h3>
				<a href="<?= base_url() ?>dashboard/detail_ptsp04/<?= $detail->id_permohonan_ptsp ?>">
					<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
						<i class="fa fa-arrow-left">
						</i> Kembali
					</button>
				</a>
	</div>

	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Dokumen Kepegawaian, Surat,
						Piagam,
						Sertifikat</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formubah_ptsp04" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp04/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="Nama" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama"
										value="<?= $detail->nama ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input class="form-control" id="no_hp" name="no_hp" rows="1"
										placeholder="masukkan no hp disini..." required data-parsley-type="number"
										minlength="11" value="<?= $detail->no_hp ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="keperluan_legalisir_dokumen" class="col-sm-3 col-form-label">Keperluan
								Untuk</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input class="form-control" id="keperluan_legalisir_dokumen"
										name="keperluan_legalisir_dokumen" rows="1"
										placeholder="masukkan keperluan legalisir disini..." required value="<?= $detail->keperluan_legalisir_dokumen ?>">
								</div>
							</div>
						</div>
				</div>
				<div class="card-footer">
					<a href="#">
						<button id="btn_simpan" class="btn btn-sm btn-primary float-right" type="submit">
							<i class="far fa-save nav-icon">
							</i> Simpan
						</button>
					</a>
				</div>
				</form>
			</div>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
