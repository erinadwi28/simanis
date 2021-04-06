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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Jamaah Haji</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Rahma</td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tempat Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tanggal Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>22/07/2000</td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>085712166795</td>
							</tr>
							<tr>
								<td><b>Nama PPIU/PIHK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>RM Haji Tour & Travel</td>
							</tr>
							<tr>
								<td><b>No. SK PPIU/PIHK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>SK015</td>
							</tr>
							<tr>
								<td><b>Tahun SK PPIU/PIHK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>2015</td>
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
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>

					</center>
				</div>
				<div class="card-footer">
					<form action=""
						enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="form_upload_srt_permohonan">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload"
											value="">
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
			<!-- Surat Pernyataan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Pernyataan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					
					</center>
				</div>
				<div class="card-footer">
					<form action=""
						enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="form_upload_srt_pernyataan">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-2">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload-2"
											name="srt_pernyataan" value="">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload-2"
											value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload">
								</i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- fc ktp -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">FC KTP</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						
					</center>
				</div>
				<div class="card-footer">
					<form action=""
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_fc_ktp">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-3">pilih file...</label>
										<input type="file" class="custom-file-input" id="file-upload-3"
											name="fc_ktp" value="">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload-3"
											value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload">
								</i>
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- Bukti Pelunasan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Bukti Pelunasan</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					
					</center>
				</div>
				<div class="card-footer">
					<form action=""
						enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="form_upload_bukti_pelunasan">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-4">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload-4"
											name="bukti_pelunasan" value="">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload-4"
											value="">
									</div>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-upload">
								</i>
							</button>
						</center>
					</form>
				</div>
			</div>
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
