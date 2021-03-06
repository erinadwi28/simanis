<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp05') ?>">SOP</a></li>
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
					</div>
					<div class="card-body">
						<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i class="fas fa-info-circle"></i></button>
						<br>
						<form class="form-horizontal mt-4" id="form_ptsp05" enctype="multipart/form-data" action="<?= base_url('dashboard/aksi_pengajuan_ptsp05') ?>" method="POST">
							<div class="form-group row">
								<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" 
										value="<?= $detail->nama ?>" placeholder="masukkan nama disini..." required>
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
							<div class="form-group row">
								<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="" placeholder="masukkan tempat lahir disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="masukkan alamat disini..."
										required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nomor_porsi" class="col-sm-3 col-form-label">No. Porsi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nomor_porsi" name="nomor_porsi" value="" placeholder="masukkan no porsi disini..."
										required data-parsley-type="number">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tahun_angkatan_haji_hijriah" class="col-sm-3 col-form-label">Tahun Angkatan Haji Hijriah</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_angkatan_haji_hijriah" name="tahun_angkatan_haji_hijriah" value="" placeholder="masukkan tahun Hijriah disini..."
										required data-parsley-type="number">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tahun_angkatan_haji_masehi" class="col-sm-3 col-form-label">Tahun Angkatan Haji Masehi</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tahun_angkatan_haji_masehi" name="tahun_angkatan_haji_masehi" value="" placeholder="masukkan tahun Masehi disini..."
										required data-parsley-type="number">
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
						<li>Pemohon mengunduh Surat Permohonan, <br> unduh dengan <b><a href="<?= base_url() ?>assets/dashboard/unduhan/pemohon/ptsp5/Template%20Surat%20Permohonan.docx">[klik disini]</a></b></li>
						<li>Pemohon mengunduh Surat Pernyataan Pergi Haji Pertama, <br> unduh dengan <b><a href="<?= base_url() ?>assets/dashboard/unduhan/pemohon/ptsp5/Template%20Surat%20Pernyataan.docx">[klik disini]</a></b></li>
						<li>Pemohon mengisi Surat Permohonan yang ditujukan kepada Kepala Kantor Kemenag Klaten.</li>
						<li>Pemohon mengisi Surat Pernyataan Pergi Haji Pertama dengan memberikan materai Rp.10.000.</li>
						<li>Pemohon mengisi formulir dalam aplikasi ini.</li>
						<li>Pemohon mengunggah Surat Permohonan dan Surat Pernyataan yang telah diisi. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah FC (Fotocopy) KTP (Kartu Tanda Penduduk). <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah bukti pelunasan. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
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
