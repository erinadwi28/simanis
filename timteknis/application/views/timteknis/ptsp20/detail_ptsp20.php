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
			<!-- Surat Rekomendasi KUA -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Rekomendasi KUA</h6>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional Majelis Taklim</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Majelis Taklim</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
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
								<td><b>Kabupaten</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Provinsi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tahun Berdiri</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td/td>
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
		<div class="col-xs-12 col-sm-6"></div>
		<div class="col-xs-8 mb-0">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Unggah Berita Acara terlebih dahulu untuk menyetujui</h6>
					</center>
				</div>

				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp07_1">
						<div class="form-group row">
							<label for="nama" class="col-sm-3 col-form-label">No. Statsitik</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">Berita Acara Dokumen</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="file-upload">pilih
												file...</label>
											<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan"
												value="" required>
											<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp"
												id="file-upload" value="">
										</div>
										<div class="input-group-append">
											<button class="btn btn-sm btn-primary" type="submit" id="inputGroupFileAddon04">
											<i class="fa fa-upload"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Button Tolak & Setujui Awal Surat Masuk -->
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
