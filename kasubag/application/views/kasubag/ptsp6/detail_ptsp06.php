        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Permohonan Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>

	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-4">
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Paspor Haji dan Umrah</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Jamaah Haji</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Alamat Lengkap</b></td>
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
								<td></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Nama PPIU/PIHK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>No. SK PPIU/PIHK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tahun SK</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>

							<tr>
								<td><b>Keterangan Permohonan Pending</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td></td>
							</tr>
						</tbody>
					</table>
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

						<p class="mb-0">Belum ada lampiran</p>


					</center>
				</div>

				<div class="card-footer">
					
				</div>

			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- FC Surat Ijin Operasional -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">FC Surat Ijin Operasional</h6>
					</center>
				</div>
				<div class="card-body">
					<center>

						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-success" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>

						<p class="mb-0">Belum ada lampiran</p>

					</center>
				</div>

				<div class="card-footer">
					
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

						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-success" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>

						<p class="mb-0">Belum ada lampiran</p>

					</center>
				</div>

				<div class="card-footer">
					
				</div>

			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- FC KK -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">FC KK</h6>
					</center>
				</div>

				<div class="card-body">
					<center>

						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-success" href="" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>

						<p class="mb-0">Belum ada lampiran</p>

					</center>
				</div>

				<div class="card-footer">
					
				</div>

			</div>
		</div>
	</div>
	<!-- Button Tolak & Setujui -->
	<div class="row clearfix float-right px-2">
		<a href="">
			<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
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
