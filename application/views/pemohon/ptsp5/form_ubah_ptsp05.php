<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
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
			<div class="col-xs col-sm-8">
				<div class="card shadow mb-5">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="form5" enctype="multipart/form-data" action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp05/<?= $detail->id_permohonan_ptsp ?>" method="POST">
							<div class="form-group row">
								<label for="Nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama" name="nama" value="<?= $detail->nama ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Nama" class="col-sm-3 col-form-label">Nomor HP</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail->tempat_lahir ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $detail->tanggal_lahir ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail->alamat ?>"><?= $detail->alamat ?></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="No_porsi" class="col-sm-3 col-form-label">No. Porsi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nomor_porsi" name="nomor_porsi" value="<?= $detail->nomor_porsi ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Tahun_angkatan_haji" class="col-sm-3 col-form-label">Tahun Angkatan Haji Hijriah</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_hijriah" name="tahun_hijriah" value="<?= $detail->tahun_hijriah ?>">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Tahun_angkatan_haji" class="col-sm-3 col-form-label">Tahun Angkatan Haji Masehi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_hijriah" name="tahun_masehi" value="<?= $detail->tahun_masehi ?>">
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