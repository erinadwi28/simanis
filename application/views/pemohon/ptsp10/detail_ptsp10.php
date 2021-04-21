<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
				<li class="breadcrumb-item active" aria-current="page">SOP</li>
				<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
				<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
			</ol>
		</nav>
	</div>

	<!-- Detail input -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-2">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Perpanjang Operasional <br>
						Penyelengara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)
					</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Pemohon</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Nama PT</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Nama Kantor Cabang</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Alamat Kantor Cabang</b></td>
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
								<td><b>Tanggal Persetujuan XXX</b></td>
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
					<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen
						dibawah</em>
				</div>

				<div class="card-footer">
					<div class="float-right">
						<a href="">
							<button id="btn_ubah" class="btn btn-sm btn-warning" type="submit">
								<i class="fa fa-edit nav-icon">
								</i> Ubah
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!-- Unggah dokumen -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-3">
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
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_1">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- SK -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">SK</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_2">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- Akte Notaris -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Akte Notaris</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_3">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- SuKet. Izin Usaha -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">SuKet. Izin Usaha</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_4">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-3">
			<!-- SuKet. Domisili Usaha -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">SuKet. Domisili Usaha</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_5">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- NPWP -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">NPWP</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_6">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- SuRek. PEMKAB -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">SuRek. PEMKAB</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_7">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- Laporan Keuangan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Laporan Keuangan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_8">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>

	</div>
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-3">
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- Susunan Pengurus -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Susunan Pengurus</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_9">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- Bukti Pemberangkatan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Bukti Pemberangkatan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					</center>
				</div>
				<div class="card-footer">
					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="formupload_ptsp10_10">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload col-md-12">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="" required>
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload" value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload"></i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
		</div>
	</div>
	<!-- Button Selesai -->
	<div class="row clearfix float-right px-2">
		<a href="">
			<button id="btn_selesai" class="btn btn-sm btn-primary" type="submit">
				<i class="far fa-save nav-icon">
				</i> Selesai
			</button>
		</a>
	</div>
	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
