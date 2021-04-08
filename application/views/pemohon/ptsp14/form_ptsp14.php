<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp03') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional LPQ</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form5" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp05') ?>" method="POST">
						<div class="form-group row">
							<label for="Nama_lpq" class="col-sm-3 col-form-label">Nama LPQ</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_lpq" name="nama_lpq" value="" placeholder="masukkan nama lpq disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="masukkan alamat disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="desa" class="col-sm-3 col-form-label">Desa</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="desa" name="desa" value="" placeholder="masukkan desa disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" placeholder="masukkan kecamatan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten" name="kabupaten" value="" placeholder="masukkan kabupaten disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="provinsi" name="provinsi" value="" placeholder="masukkan provinsi disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="yayayan" class="col-sm-3 col-form-label">Yayayan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="yayayan" name="yayayan" value="" placeholder="masukkan yayayan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="sk_menkumhan_ri" class="col-sm-3 col-form-label">SK Menkumham RI</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="sk_menkumhan_ri" name="sk_menkumhan_ri" value="" placeholder="masukkan no SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tahun_berdiri" class="col-sm-3 col-form-label">Tahun Berdiri</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="" placeholder="masukkan tahun SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="berlaku" class="col-sm-3 col-form-label">Berlaku</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="berlaku" name="berlaku" value="" placeholder="masukkan masa berlaku disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="" placeholder="masukkan no handpone disini...">
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
