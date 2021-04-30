<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
				<a href="<?= base_url() ?>dashboard/detail_ptsp05/<?= $detail->id_permohonan_ptsp ?>">
		<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
			<i class="fa fa-arrow-left">
			</i> Kembali
		</button>
		</a>
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
			<div class="col-xs col-sm-8">
				<div class="card shadow mb-5">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="formubah_ptsp05" enctype="multipart/form-data" 
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp05/<?= $detail->id_permohonan_ptsp ?>" method="POST">
							<div class="form-group row">
								<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?= $detail->nama_pemohon ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>"
										required data-parsley-type="number" minlength="11">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail->tempat_lahir ?>"
										required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $detail->tanggal_lahir ?>"
										required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat" name="alamat" required><?= $detail->alamat ?></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nomor_porsi" class="col-sm-3 col-form-label">No. Porsi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nomor_porsi" name="nomor_porsi" value="<?= $detail->nomor_porsi ?>"
										required data-parsley-type="number">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tahun_angkatan_haji_hijriah" class="col-sm-3 col-form-label">Tahun Angkatan Haji Hijriah</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_angkatan_haji_hijriah" name="tahun_angkatan_haji_hijriah" value="<?= $detail->tahun_angkatan_haji_hijriah ?>"
										required data-parsley-type="number">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tahun_angkatan_haji_masehi" class="col-sm-3 col-form-label">Tahun Angkatan Haji Masehi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_angkatan_haji_masehi" name="tahun_angkatan_haji_masehi" value="<?= $detail->tahun_angkatan_haji_masehi ?>"
										required data-parsley-type="number">
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