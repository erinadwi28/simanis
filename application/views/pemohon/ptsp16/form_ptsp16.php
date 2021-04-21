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

		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Proposal PD Pontren</h6>
					<h6 class="m-0 font-weight-bold text-center">(Bantuan Sarpras/Pembangunan/Rebahilitasi Bangunan)</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp16" enctype="multipart/form-data"
						action="" method="POST">
						<div class="form-group row">
							<label for="nama_tujuan" class="col-sm-3 col-form-label">Nama Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" value=""
										placeholder="masukkan nama tujuan (cth. Gubernur Jawa Tengah) disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_tujuan" class="col-sm-3 col-form-label">Tempat Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tempat_tujuan"
										name="tempat_tujuan" value="" placeholder="masukkan tempat tujuan (cth. Semarang) disini..."
										required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_instansi_pemohon" class="col-sm-3 col-form-label">Nama Instansi Pemohon</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_instansi_pemohon"
										name="nama_instansi_pemohon" value=""
										placeholder="masukkan nama instansipemohon disini..." required>
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
							<label for="alamat_instansi_pemohon" class="col-sm-3 col-form-label">Alamat Instansi Pemohon</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat_instansi_pemohon" name="alamat_instansi_pemohon"
										value="" placeholder="masukkan alamat instansi pemohon disini..." required></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_bantuan" class="col-sm-3 col-form-label">Jenis Bantuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jenis_bantuan" name="jenis_bantuan" value=""
										placeholder="masukkan jenis bantuan disini..." required>
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
						<li>Pemohon Mengunggah Proposal Memuat:<br></li>
						<ol type="a" class="ml-0 list-syarat">
							<li>Surat Permohonan yang ditujukan Kepala Kemenag Kab. Klaten</li>
							<li>Surat Keterangan dari Yayasan/Badan Hukum beserta FC Akta Kemenkumhamnya</li>
							<li>Visi dan Misi</li>
							<li>Susunan Kepengurusan</li>
							<li>FC KTP Susunan Kepengurusan</li>
							<li>FC KTP Guru</li>
							<li>Kurikulum Pelajaran</li>
							<li>Jadwal Pelajaran</li>
							<li>Daftar Santri</li>
							<li>Sarana Prasarana yang Di Miliki</li>
							<li>Foto Gedung</li>
							<li>Kegiatan dan Papan Nama</li>
							<li>Memiliki Guru</li>
							<li>Santri Aktif Minimal 15 Orang</li>
							<li>Pernyataan Setia pada NKRI Bermaterai</li>
						</ol>
						<li>Pemohon Mengisi dan Melengkapi form pengajuan yang telah disediakan.</li>
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
