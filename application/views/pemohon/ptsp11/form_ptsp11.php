<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp11') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Pindah Siswa Madrasah</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp11" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp11') ?>" method="POST">
						<div class="form-group row">
							<label for="nama_siswa" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $detail->nama ?>"
										placeholder="masukkan nama siswa disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_lahir_siswa" class="col-sm-3 col-form-label">Tempat lahir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tempat_lahir_siswa"
										name="tempat_lahir_siswa" value="" placeholder="masukkan tempat lahir disini..."
										required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_lahir_siswa" class="col-sm-3 col-form-label">Tanggal lahir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_lahir_siswa"
										name="tgl_lahir_siswa" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value=""
										placeholder="masukkan jenis kelamin disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nisn" name="nisn" value=""
										placeholder="masukkan nisn disini..." required data-parsley-type="number">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kelas" name="kelas" value=""
										placeholder="masukkan kelas disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_tujuan"
										name="nama_sekolah_tujuan" value=""
										placeholder="masukkan nama sekolah tujuan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_sekolah_asal" class="col-sm-3 col-form-label">Sekolah Asal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_asal"
										name="nama_sekolah_asal" value=""
										placeholder="masukkan nama sekolah asal disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">No. Surat Rek. Sekolah
								Asal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_rek_sekolah_asal"
										name="no_srt_rek_sekolah_asal" value=""
										placeholder="masukkan nama sekolah asal disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_rek_sekolah_asal" class="col-sm-3 col-form-label">Tanggal Surat Rek.
								Sekolah Asal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_rek_sekolah_asal"
										name="tgl_srt_rek_sekolah_asal" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alasan_pindah" class="col-sm-3 col-form-label">Alasan Pindah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alasan_pindah" name="alasan_pindah"
										value="" placeholder="masukkan alasan pindah disini..." required></textarea>
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
				<?php } ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="#">
							<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
								<i class="far fa-save nav-icon">
								</i> Simpan
							</button>
						</a>
					</div>
				</div>
				</form>
			</div>
		</div>
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
					<ol type="1" class="ml-0 list-syarat modal-content-syarat">
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah surat rekomendasi dari madrasah asal. <br> (Format: PDF, Ukuran: Max
							1 MB)</li>
						<li>Pemohon mengunggah surat penerimaan/kuota dari sekolah yang akan dituju. <br> (Format:
							PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah rapot terakhir. <br> (Format: PDF, Ukuran: Max 10 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.
						</li>
					</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
