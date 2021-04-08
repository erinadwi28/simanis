<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<!-- <a href="<?= base_url('warga') ?>"> -->
		<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
			<i class="fa fa-arrow-left">
			</i> Kembali
		</button>
		<!-- </a> -->
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<?php foreach ($detail_ptsp as $detail) { ?>
		<!-- DETAIL DISESUAIKAN BE YAAA -->
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Permohonan Bantuan Masjid
					</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form5" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp05/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="no_surat_takmir" class="col-sm-3 col-form-label">No Surat Takmir Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_surat_takmir" name="no_surat_takmir"
										value="<?= $detail->nama ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_masjid" class="col-sm-3 col-form-label">Nama Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_masjid" name="nama_masjid"
										value="<?= $detail->no_hp ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_ketua" class="col-sm-3 col-form-label">Nama Ketua Takmir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_ketua" name="nama_ketua"
										value="<?= $detail->tempat_lahir ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_masjid" class="col-sm-3 col-form-label">Alamat Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="alamat_masjid" name="alamat_masjid"
										value="<?= $detail->tanggal_lahir ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_id_masjid" class="col-sm-3 col-form-label">No ID Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="no_id_masjid" name="no_id_masjid"
										value="<?= $detail->alamat ?>"><?= $detail->alamat ?></textarea>
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
			</form>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
