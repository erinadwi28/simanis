<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp18') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Bantuan Masjid</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form5" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp18') ?>" method="POST">
						<div class="form-group row">
							<label for="no_surat_takmir" class="col-sm-3 col-form-label">No. Surat Takmir Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_surat" name="no_surat"
										value="" placeholder="masukkan no surat takmir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_masjid" class="col-sm-3 col-form-label">Nama Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_masjid" name="nama_masjid"
										value="" placeholder="masukkan nama masjid disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_surat_permohonan" class="col-sm-3 col-form-label">No. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_surat_permohonan" name="no_surat_permohonan"
										value="" placeholder="masukkan no surat takmir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_surat_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_surat_permohonan" name="tgl_surat_permohonan" value="">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_ketua_takmir" class="col-sm-3 col-form-label">Nama Ketua Takmir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_ketua_takmir" name="nama_ketua_takmir"
										value="" placeholder="masukkan tempat lahir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_masjid" class="col-sm-3 col-form-label">Alamat Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat_masjid" name="alamat_masjid" value=""
										placeholder="masukkan alamat masjid disini..."></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_id_masjid" class="col-sm-3 col-form-label">No. ID Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_id_masjid" name="no_id_masjid" value=""
										placeholder="masukkan no ID masjid disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value="" placeholder="masukkan no handpone disini...">
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
						<li>Pemohon mengunduh surat permohonan ditujukan kepada Kepala Kantor Kemenag Klaten
							ditandatangani oleh
							takmir masjid yang bersangkutan. Untuk mengunduh <br> <a href="#" class="klik-unduh">Klik
								disini!</a></li>
						<li>Pemohon mengisi surat permohonan yang telah diunduh tersebut.</li>
						<li>Pemohon membuat proposal yang memuat:
							<ol type="a">
								<li>Surat Permohonan Bantuan ditanda tangan Lurah, Camat, Kepala KUA.</li>
								<li>RAB.</li>
								<li>Susunan Pengurus.</li>
								<li>Gambar Kegiatan.</li>
								<li>Fotocopy KTP Pengurus.</li>
								<li>Rekening atas nama Takmir / Panitia.</li>
								<li>Nomor Identitas Masjid.</li>
								<li>Surat keterangan domisili masjid.</li>
								<li>Fotocopy sertifikat wakaf/ Ikrar wakaf/ surat keterangan dari pejabat berwenang jika
									tanah kas.</li>
							</ol>
						</li>
						<li>Pemohon mengisi dan melengkapi form pengajuan yang telah disediakan.</li>
						<li>Pemohon mengunggah surat permohonan dan proposal pada form pengajuan.</li>
						<li>Pemohon menunggu informasi dari Kemenag terkait proses pengajuan permohonan dan pengambilan
							surat yang sudah jadi.</li>
					</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
