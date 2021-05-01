<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp11/<?= $detail->id_permohonan_ptsp ?>">
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
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp11/<?= $detail->id_permohonan_ptsp ?>" method="POST">
						<div class="form-group row">
								<label for="nama_siswa" class="col-sm-3 col-form-label">Nama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $detail->nama_siswa ?>" placeholder="masukkan nama siswa disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir_siswa" class="col-sm-3 col-form-label">Tempat lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" value="<?= $detail->tempat_lahir_siswa ?>" placeholder="masukkan tempat lahir disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_lahir_siswa" class="col-sm-3 col-form-label">Tanggal lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" value="<?= $detail->tgl_lahir_siswa ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $detail->jenis_kelamin ?>"
											placeholder="masukkan jenis kelamin disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nisn" name="nisn" value="<?= $detail->nisn ?>"
										placeholder="masukkan nisn disini..." 
										required data-parsley-type="number" >
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kelas" name="kelas" value="<?= $detail->kelas ?>" placeholder="masukkan kelas disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan" 
										value="<?= $detail->nama_sekolah_tujuan ?>" placeholder="masukkan nama sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_asal" class="col-sm-3 col-form-label">Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_asal" name="nama_sekolah_asal" 
										value="<?= $detail->nama_sekolah_asal ?>" placeholder="masukkan nama sekolah asal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">No. Surat Rek. Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_srt_rek_sekolah_asal" name="no_srt_rek_sekolah_asal" 
										value="<?= $detail->no_srt_rek_sekolah_asal ?>" placeholder="masukkan nama sekolah asal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">Tanggal Surat Rek. Sekolah Asal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_srt_rek_sekolah_asal" name="tgl_srt_rek_sekolah_asal" 
										value="<?= $detail->tgl_srt_rek_sekolah_asal ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="alasan_pindah" class="col-sm-3 col-form-label">Alasan Pindah</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alasan_pindah" name="alasan_pindah" value="" placeholder="masukkan alasan pindah disini..."
										required><?= $detail->alasan_pindah ?></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>"
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
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->