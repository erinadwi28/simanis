<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4 judullist">
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Pindah Siswa Madrasah</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="formubah_ptsp11" enctype="multipart/form-data" 
						action="" method="POST">
						<div class="form-group row">
								<label for="nama_siswa" class="col-sm-3 col-form-label">Nama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="" placeholder="masukkan nama siswa disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir_siswa" class="col-sm-3 col-form-label">Tempat lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" value="" placeholder="masukkan tempat lahir disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir_siswa" class="col-sm-3 col-form-label">Tanggal lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa" value="" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nisn" class="col-sm-3 col-form-label">Nisn</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nisn" name="nisn" value=""
										placeholder="masukkan nisn disini..." 
										required data-parsley-type="number" >
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kelas" name="kelas" value="" placeholder="masukkan kelas disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan" value="" placeholder="masukkan nama sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_asal" class="col-sm-3 col-form-label">Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_asal" name="nama_sekolah_asal" value="" placeholder="masukkan nama sekolah asal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">No. Surat Rek. Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_srt_rek_sekolah_asal" name="no_srt_rek_sekolah_asal" value="" placeholder="masukkan nama sekolah asal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">Tanggal Surat Rek. Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_srt_rek_sekolah_asal" name="tgl_srt_rek_sekolah_asal" value="" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="alasan_pindah" class="col-sm-3 col-form-label">Alasan Pindah</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alasan_pindah" name="alasan_pindah" value="" placeholder="masukkan alasan pindah disini..."
										required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value=""
										placeholder="masukkan no hp disini..." 
										required data-parsley-type="number" minlength="11">
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