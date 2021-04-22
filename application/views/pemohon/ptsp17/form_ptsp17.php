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
			<div class="col-xs col-sm-8">
				<div class="card shadow mb-5">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Tambahan Jam Mengajar Guru</h6>
					</div>
					<div class="card-body">
						<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i class="fas fa-info-circle"></i></button>
						<br>
						<form class="form-horizontal mt-4" id="form_ptsp17" enctype="multipart/form-data" action="" method="POST">
							<div class="form-group row">
								<label for="nama_pns" class="col-sm-3 col-form-label">Nama PNS</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pns" name="nama_pns" value="" placeholder="masukkan nama pns disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat Permohonan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" value="" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" placeholder="masukkan kecamatan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_satminkal" class="col-sm-3 col-form-label">Nama Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_satminkal" name="nama_sekolah_satminkal" value="" placeholder="masukkan nama sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan_sekolah_satminkal" class="col-sm-3 col-form-label">Kecamatan Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan_sekolah_satminkal" name="kecamatan_sekolah_satminkal" value="" placeholder="masukkan kecamatan sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kabupaten_sekolah_satminkal" class="col-sm-3 col-form-label">Kabupaten Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kabupaten_sekolah_satminkal" name="kabupaten_sekolah_satminkal" value="" placeholder="masukkan keabupaten sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-sm-3 col-form-label">Agama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="agama" name="agama" value="" placeholder="masukkan agama disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-3 col-form-label">Nip</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nip" name="nip" value=""
										placeholder="masukkan nip disini..." 
										required data-parsley-type="number" minlength="16">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Golongan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol" value="" placeholder="masukkan pangkat/golongan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="jabatan" name="jabatan" value="" placeholder="masukkan jabatan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Nama Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan" value="" placeholder="masukkan nama sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan_sekolah_tujuan" class="col-sm-3 col-form-label">Kecamatan Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan_sekolah_tujuan" name="kecamatan_sekolah_tujuan" value="" placeholder="masukkan kecamatan sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kabupaten_sekolah_tujuan" class="col-sm-3 col-form-label">Kabupaten Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kabupaten_sekolah_tujuan" name="kabupaten_sekolah_tujuan" value="" placeholder="masukkan keabupaten sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_mulai_mengajar" class="col-sm-3 col-form-label">Tanggal Mulai Mengajar</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_mulai_mengajar" name="tgl_mulai_mengajar" value="" required>
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
					<li>Pemohon Mengunduh Surat Permohonan ditujukan kepada Kepala Kantor Kemenag Klaten yang bisa di dowload <b><a href="<?= base_url() ?>assets/pemohon/sop/ptsp05/srt_permohonan.pdf" target="_blank">[di sini]</a></b></li>
					<li>Pemohon Mengunduh Surat Pernyataan Pergi Haji Pertama Bermatrai Rp.10.000 yang bisa di dowload <b><a href="<?= base_url() ?>assets/pemohon/sop/ptsp05/srt_pernyataan.pdf" target="_blank">[di sini]</a></b></li>
					<li>Pemohon Mengisi Surat Permohonan ditujukan kepada Kepala Kantor Kemenag Klaten.</li>
					<li>Pemohon Mengisi Surat Pernyataan Pergi Haji Pertama Bermatrai Rp.10.000.</li>
					<li>Pemohon Mengunggah Surat Permohonan dan Surat Pernyataan pada form pengajuan.</li>
					<li>Pemohon Mengisi dan Menlengkapi form pengajuan yang telah disediakan.</li>
					<li>Pemohon Menunggu Informasi dari Kemenag terkait proses pengajuan permohonan.</li>
				</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
