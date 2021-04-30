<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp01') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rohaniawan dan Petugas Do'a</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp01" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp01') ?>" method="POST">
						<div class="form-group row">
							<label for="pemohon" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pemohon" name="pemohon"
										value="<?= $detail->nama ?>" placeholder="masukkan nama disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value=""
										placeholder="masukkan no handphone disini..." required data-parsley-type="number"
										minlength="11">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat
								Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan"
										name="tgl_srt_permohonan" value=""
										placeholder="masukkan tgl surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_srt_permohonan" class="col-sm-3 col-form-label">No Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_permohonan"
										name="no_srt_permohonan" value=""
										placeholder="masukkan nomor surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_acara" class="col-sm-3 col-form-label">Nama Acara</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_acara"
										name="nama_acara" value=""
										placeholder="masukkan nama acara disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="hari_acara" class="col-sm-3 col-form-label">Hari Acara</label>
							<div class="col-sm-9">
								<div class="form-line">
									<select class="form-control" id="hari_acara" name="hari_acara" required>
										<option selected value="" class="form-user-input">pilih hari...</option>
										<option value="Senin" class="form-user-input">Senin</option>
										<option value="Selasa" class="form-user-input">Selasa</option>
										<option value="Rabu" class="form-user-input">Rabu</option>
										<option value="Kamis" class="form-user-input">Kamis</option>
										<option value="Jumat" class="form-user-input">Jumat</option>
										<option value="Sabtu" class="form-user-input">Sabtu</option>
										<option value="Minggu" class="form-user-input">Minggu</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_acara" class="col-sm-3 col-form-label">Tanggal Acara</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_acara"
										name="tgl_acara" value=""
										placeholder="masukkan tgl acara disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="waktu_acara" class="col-sm-3 col-form-label">Waktu Acara</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="waktu_acara"
										name="waktu_acara" value=""
										placeholder="contoh: 12.00" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_acara" class="col-sm-3 col-form-label">Tempat Acara</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tempat_acara"
										name="tempat_acara" value=""
										placeholder="masukkan tempat acara disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Jml_petugas_doa" class="col-sm-3 col-form-label">Jumlah Petugas Do'a</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input type="text" min="1" max="5" class="form-control" id="Jml_petugas_doa"
										name="Jml_petugas_doa" rows="1" value=""
										placeholder="masukkan jumlah petugas disini..." required data-parsley-type="number">

								</div>
							</div>
						</div>
				</div>
				<?php } ?>
				<div class="card-footer">
					<a href="#">
						<button id="btn_simpan" class="btn btn-sm btn-buat float-right" type="submit">
							<i class="far fa-save nav-icon">
							</i> Simpan
						</button>
					</a>
				</div>
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
				<p class="persyaratan mb-0">
					<ol type="1" class="ml-0 list-syarat modal-content-syarat">
						<li>Pemohon membuat surat permohonan ditujukan kepada Kepala Kantor Kementerian Agama Kab. Klaten</li>
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah surat permohonan yang telah dibuat. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.</li>
					</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
