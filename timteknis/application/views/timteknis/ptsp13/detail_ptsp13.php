<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan
						Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>
	<div class="row clearfix">
		<div class="col-md-4 mb-0">
			<!-- Surat Permohonan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Permohonan</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p>Belum ada lampiran</p>
					</center>
				</div>
			</div>
			<!-- Proposal Permohonan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Proposal</h6>
					</center>
				</div>

				<div class="card-body">
					<center>

						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p>Belum ada lampiran</p>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-8 mb-2">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Ijin Operasional Lembaga Baru
					</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Yayasan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>No. Surat Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Tanggal Surat Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Hal Surat Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Nama Calon Madrasah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Alamat Calon Madrasah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>No. Akte Notaris</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>No. Pengesahan Akte Notaris</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Tanggal Persetujuan xxx</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Keterangan Permohonan Pending</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Unggah Berita Acara -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-4"></div>
		<div class="col-xs-12 col-sm-8">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Unggah Berita Acara terlebih dahulu untuk menyetujui</h6>
					</center>
				</div>
				<div class="card-body">
					<form class="form-horizontal mt-4" id="formba_ptsp13" enctype="multipart/form-data" action=""
						method="POST">
						<div class="form-group row">
							<label for="no_berita_acara_verifikasi_dok" class="col-sm-3 col-form-label">No. Berita Acara
								Verifikasi Dokumen</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_berita_acara_verifikasi_dok"
										name="no_berita_acara_verifikasi_dok" value=""
										placeholder="masukkan no berita acara verifikasi dok disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_berita_acara_verifikasi_dok" class="col-sm-3 col-form-label">Tgl. Berita
								Acara
								Verifikasi Dokumen</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_berita_acara_verifikasi_dok"
										name="tgl_berita_acara_verifikasi_dok" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_berita_acara_verifikasi_lap" class="col-sm-3 col-form-label">No. Berita Acara
								Verifikasi lapangan</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_berita_acara_verifikasi_lap"
										name="no_berita_acara_verifikasi_lap" value=""
										placeholder="masukkan no berita acara verifikasi lap disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_berita_acara_verifikasi_lap" class="col-sm-3 col-form-label">Tgl. Berita
								Acara
								Verifikasi Lapangan</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_berita_acara_verifikasi_lap"
										name="tgl_berita_acara_verifikasi_lap" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="berita_acara_verifikasi_dok">Berita Acara
								Dokumen</label>
							<div class="col-sm-8 ml-3">
								<div class="form-group-upload">
									<label class="custom-file-label" for="file-upload-profil">pilih file...</label>
									<input type="file" class="file-input" id="file-upload" name="berkas" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="berita_acara_verivikasi_lap">Berita Acara
								Lapangan</label>
							<div class="col-sm-8 ml-3">
								<div class="form-group-upload">
									<label class="custom-file-label" for="file-upload-profil">pilih file...</label>
									<input type="file" class="file-input" id="file-upload" name="berkas" required>
								</div>
							</div>
						</div>
				</div>
				<div class="card-footer">
					<!-- Button Simpan -->
					<div class="row clearfix float-right px-2">
						<div class="float-right">
							<a href="#">
								<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
									<i class="far fa-save nav-icon">
									</i> Simpan
								</button>
							</a>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Button Tolak & Setujui BA -->
	<div class="row clearfix float-right px-2">
		<a href="" class="mr-2">
			<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
				<i class="fas fa-times-circle">
				</i> Tolak
			</button>
		</a>
		<a href="">
			<button id="btn_termia" class="btn btn-sm btn-primary" type="submit">
				<i class="fas fa-check-circle">
				</i> Terima
			</button>
		</a>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
