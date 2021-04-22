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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru , Haji,</h6>
					</div>
					<div class="card-body">
						<table class="table-hover table-responsive">
							<tbody>
								<tr>
									<td><b>Nama</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td></td>
								</tr>
								<tr>
									<td><b>Alamat</b> </td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td></td>
								</tr>
								<tr>
									<td><b>Pekerjaan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td></td>
								</tr>
								<tr>
									<td><b>No.handphone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td></td>
								</tr>
								<tr>
									<td><b>Tujuan permohonan data</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<!-- Unggah Berita Acara -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-6"></div>
		<div class="col-xs-12 col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Upload Data</h6>
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
						
						<p class="mb-0">Belum ada lampiran</p>
						
					</center>
				</div>

				<div class="card-footer">
					<form action=""
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="">
						<div class="input-group px-4">
							<div class="custom-file">
								<label class="custom-file-label" for="file-upload">pilih
									file...</label>
								<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan"
									value="" required>
								<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp"
									id="file-upload" value="">
							</div>
							<div class="input-group-append">
								<button class="btn btn-sm btn-primary" type="submit" id="inputGroupFileAddon04"><i
										class="fa fa-upload"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				
				<a href=""
					class="mr-2">
					<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="">
					<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
				
			</div>
			
		</div>
	</div>

	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->