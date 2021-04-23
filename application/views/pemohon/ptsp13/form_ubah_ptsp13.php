<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp13/<?= $detail->id_permohonan_ptsp ?>">
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
				<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Ijin Operasional Lembaga Baru</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formubah_ptsp13" enctype="multipart/form-data" 
					action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp13/<?= $detail->id_permohonan_ptsp ?>" method="POST">
					<div class="form-group row">
							<label for="nama_yayasan" class="col-sm-3 col-form-label">Nama Yayasan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_yayasan" name="nama_yayasan" value="<?= $detail->nama_yayasan ?>"
										placeholder="masukkan nama yayasan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_srt_pemohon" class="col-sm-3 col-form-label">No. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_pemohon" name="no_srt_pemohon" value="<?= $detail->no_srt_pemohon ?>"
										placeholder="masukkan no surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_pemohon" class="col-sm-3 col-form-label">Tanggal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_pemohon"
										name="tgl_srt_pemohon" value="<?= $detail->tgl_srt_pemohon ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="hal_srt_pemohon" class="col-sm-3 col-form-label">Hal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="hal_srt_pemohon" name="hal_srt_pemohon" value="<?= $detail->hal_srt_pemohon ?>"
										placeholder="masukkan hal surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_calon_madrasah" class="col-sm-3 col-form-label">Nama Calon Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_calon_madrasah"
										name="nama_calon_madrasah" value="<?= $detail->nama_calon_madrasah ?>"
										placeholder="masukkan nama calon madrasah disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_calon_madrasah" class="col-sm-3 col-form-label">Alamat Calon Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat_calon_madrasah" name="alamat_calon_madrasah"
										value="" placeholder="masukkan alamat instansi pemohon disini..." required><?= $detail->alamat_calon_madrasah ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_calon_madrasah" class="col-sm-3 col-form-label">Nama Calon Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_calon_madrasah" name="nama_calon_madrasah" value="<?= $detail->nama_calon_madrasah ?>"
										placeholder="masukkan nomor akte notaris disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="akte_notaris" class="col-sm-3 col-form-label">No. Akte Notaris</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="akte_notaris" name="akte_notaris" value="<?= $detail->akte_notaris ?>"
										placeholder="masukkan nomor akte notaris disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pengesahan_akte_notaris" class="col-sm-3 col-form-label">No. pengesahan akte Notaris</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pengesahan_akte_notaris" name="pengesahan_akte_notaris" 
									value="<?= $detail->pengesahan_akte_notaris ?>" placeholder="masukkan nomor pengesahan akte notaris disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>"
										placeholder="masukkan no hp disini..." required data-parsley-type="number"
										minlength="11">
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
