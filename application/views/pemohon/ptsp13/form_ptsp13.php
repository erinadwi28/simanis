<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp12') ?>">SOP</a></li>
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
				<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Ijin Operasional Lembaga Baru</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp13" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp13') ?>" method="POST">
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
							<label for="no_srt_pemohon" class="col-sm-3 col-form-label">No. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_pemohon" name="no_srt_pemohon" value=""
										placeholder="masukkan no surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_pemohon" class="col-sm-3 col-form-label">Tanggal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_pemohon"
										name="tgl_srt_pemohon" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="hal_srt_pemohon" class="col-sm-3 col-form-label">Hal Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="hal_srt_pemohon" name="hal_srt_pemohon" value=""
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
						<li>Pemohon mengunduh Surat Permohonan, unduh dengan <b><a
									href="https://ijopmadrasah.kemenag.go.id/swasta/pendaftaran/login"
									target="_blank">[klik disini]</a></b></li>
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah surat permohonan yang diperoleh dari situs ijin operasional. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah proposal permohonan. <br> (Format: PDF, Ukuran: Max 10 MB) </li>
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
