<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp23') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Mutasi GPAI PNS</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp23" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp23') ?>" method="POST">
						<div class="form-group row">
							<label for="nama_sekolah_satmikal" class="col-sm-3 col-form-label"> Nama Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_satmikal" name="nama_sekolah_satmikal"
										value="" required 
										placeholder="masukkan nama sekolah disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan_sekolah_satmikal" class="col-sm-3 col-form-label">Kecamatan Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan_sekolah_satmikal" name="kecamatan_sekolah_satmikal" 
									 placeholder="masukkan kecamatan sekolah disini..."
									 value="" required>
								</div>
							</div>
						</div>						
						<div class="form-group row">
							<label for="kabupaten_sekolah_satmikal" class="col-sm-3 col-form-label">Kabupaten Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_sekolah_satmikal" name="kabupaten_sekolah_satmikal" 
										value="" required
										placeholder="masukkan Kabupaten Sekolah disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" 
									value="" required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_persetujuan_pengawas_pai" class="col-sm-3 col-form-label"> Tgl srt Persetujuan Pengawas PAI</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tgl_srt_persetujuan_pengawas_pai" name="tgl_srt_persetujuan_pengawas_pai" 
										value="" required
										placeholder="masukkan tgl persetujuan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_pns" class="col-sm-3 col-form-label">Nama PNS</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_pns" name="nama_pns" 
										value="" required
										placeholder="masukkan nama PNS disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nip" class="col-sm-3 col-form-label">NIP</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nip" name="nip"
									 placeholder="masukkan desa disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pangkat_pns" class="col-sm-3 col-form-label">Pangkat PNS</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pangkat_pns" name="pangkat_pns"
									 placeholder="masukkan Pangkat disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jabatan" name="jabatan"
									 placeholder="masukkan Jabatan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Nama Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan"
									 placeholder="masukkan nama sekolah tujuan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan_sekolah_tujuan" class="col-sm-3 col-form-label">Kecamatan Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan_sekolah_tujuan" name="kecamatan_sekolah_tujuan"
									 placeholder="masukkan Pangkat disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten_sekolah_tujuan" class="col-sm-3 col-form-label">Kabupaten Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_sekolah_tujuan" name="kabupaten_sekolah_tujuan"
									 placeholder="masukkan kabupaten sekolah tujuan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_mulai_mengajar" class="col-sm-3 col-form-label">Tgl. Mulai Mengajar</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_mulai_mengajar" name="tgl_mulai_mengajar" 
									value=""  >
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
						<?php } ?>
				</div>
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
					<li> Surat permohonan ditujukan kepada Kepala Kantor Kemenag Kab. Klaten dilampiri </li>
						<li> Surat permohonan penambahan tugas mengajar dari GPAI PNS.</li>
						<li> Surat pernyataan tidak berkeberatan dari Kepala Sekolah Satminkal.</li>
						<li> Surat pernyataan tidak berkeberatan menerima GPAI PNS dari Kepala Sekolah Satminkal tambahan mengajar.</li>
						<li> Surat persetujuan dari pengawas PAI yang membawahi wilayah kerjanya.</li>
						<li> Pemohon mengunggah Surat Permohonan dan Surat Pernyataan yang telah diisi/dibuat dalam 1 file. <br> (Format: PDF, Ukuran: Max 10 MB)</li>
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
