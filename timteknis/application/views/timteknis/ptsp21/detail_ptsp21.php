<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h3>
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
		<!-- Unggah Dokumen -->
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
						
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						
						<p>Belum ada lampiran</p>
						
					</center>
				</div>
			</div>
		</div>

		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Arah Ukur Kiblat</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
						<tr>
								<td><b>Nama Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Dukuh </b> </td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>RT</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>RW</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Desa</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Kecamatan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>No. HandPhone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>

							
							<tr>
								<td><b>Tanggal Persetujuan Front Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							
							<tr>
								<td><b>Tanggal Persetujuan Back Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							
							<tr>
								<td><b>Tanggal Persetujuan Kasi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							
							<tr>
								<td><b>Tanggal Persetujuan Kasubag</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							
							<tr>
								<td><b>Keterangan Permohonan Pending</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
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
					<form class="form-horizontal mt-4" id="formba_ptsp15" enctype="multipart/form-data" action=""
						method="POST">
						<div class="form-group row">
							<label for="tgl_pengukuran" class="col-sm-3 col-form-label">Tgl. Pengukuran</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
								<input type="date" class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jam_pengukuran" class="col-sm-3 col-form-label">Jam Pengukuran</label>
							<div class="col-sm-8 ml-1">
								<div class="form-line focused">
								<input type="text" class="form-control" id="jam_pengukuran" name="jam_pengukuran" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="berita_acara_verivikasi">Berita Acara</label>
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
