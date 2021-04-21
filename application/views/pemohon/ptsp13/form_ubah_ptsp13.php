<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="#">
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
					<form class="form-horizontal" id="formubah_ptsp13" enctype="multipart/form-data" action="" method="POST">
					<div class="form-group row">
							<label for="nama_yayasan" class="col-sm-3 col-form-label">Nama Yayasan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_yayasan" name="nama_yayasan" value=""
										placeholder="masukkan nama yayasan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_srt_permohonan" class="col-sm-3 col-form-label">No. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_permohonan" name="no_srt_permohonan" value=""
										placeholder="masukkan no surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan"
										name="tgl_srt_permohonan" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="hal_srt_permohonan" class="col-sm-3 col-form-label">Hal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="hal_srt_permohonan" name="hal_srt_permohonan" value=""
										placeholder="masukkan hal surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_calon_madrasah" class="col-sm-3 col-form-label">Nama Calon Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_calon_madrasah"
										name="nama_calon_madrasah" value=""
										placeholder="masukkan nama calon madrasah disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_calon_madrasah" class="col-sm-3 col-form-label">Alamat Calon Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat_calon_madrasah" name="alamat_calon_madrasah"
										value="" placeholder="masukkan alamat instansi pemohon disini..." required></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="akte_notaris" class="col-sm-3 col-form-label">No. Akte Notaris</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="akte_notaris" name="akte_notaris" value=""
										placeholder="masukkan nomor akte notaris disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pengesahan_akte_notaris" class="col-sm-3 col-form-label">No. pengesahan akte Notaris</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pengesahan_akte_notaris" name="pengesahan_akte_notaris" value=""
										placeholder="masukkan nomor pengesahan akte notaris disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value=""
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
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
