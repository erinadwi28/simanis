<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h1>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
			</ol>
		</nav>
	</div>

	<div class="row">
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
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
					</center>
				</div>
			
				<div class="card-footer">
					
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
					
						<p></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href=""
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
					
					</center>
				</div>
			
				<div class="card-footer">
					
				</div>
			
			</div>
		</div>
		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<!-- DISESUAIKAN BE YAA DATANYA -->
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
								<td>Majelis Taklim Al-Hidayah</td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Tempel</td>
							</tr>
							<tr>
								<td><b>Desa</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Selomartani</td>
							</tr>
							<tr>
								<td><b>Kecamatan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Kalasan</td>
							</tr>
							<tr>
								<td><b>Kabupaten</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Sleman</td>
							</tr>
							<tr>
								<td><b>Provinsi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>Yk</td>
							</tr>
							<tr>
								<td><b>Tahun Berdiri</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>2000</td>
							</tr>
							<tr>
								<td><b>No. Statistik</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>ST0123</td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td>123</td>
							</tr>	
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<div class="float-right">
						<a href="">
							<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
								<i class="fas fa-times-circle">
								</i> Tolak
							</button>
						</a>
						<a href="">
							<button id="btn_terima" class="btn btn-sm btn-success" type="submit">
								<i class="fas fa-check-circle">
								</i> Terima
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->