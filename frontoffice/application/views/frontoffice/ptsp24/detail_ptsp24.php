<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h1>
			<nav aria-label="breadcrumb" class="nav-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item" aria-current="page"><a
							href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
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
			<!-- Jadwal dan Ketentuan siaran -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Jadwal dan Ketentuan siaran</h6>
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
			<!-- DISESUAIKAN BE YAA DATANYA -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Rek. Pajak Bendaraan Bermotor Layanan Sosial Rumah Ibadah</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
						<tr>
								<td><b>Jumlah Roda Kendaraan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Merek Kendaraan </b> </td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>No. Polisi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Pemilik Kendaraan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td></td>
							</tr>
							<tr>
								<td><b>Fungsional Kendaraan</b></td>
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
						</tbody>
					</table>
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

			<!-- Button Setujui Final & No Surat -->
			<div class="row clearfix">
				<div class="col-md-12">
					<form class="form-horizontal" id="no_surat_ptsp24" enctype="multipart/form-data"
						action=""
						method="POST">
						<div class="input-group mb-3 col-md-6 float-right p-0">
							<input type="text" class="form-control " id="no_surat" name="no_surat"
								value="944/ Kk.11.10/8/KS.01.5/2/2021" required>
							<button class="btn btn-sm btn-primary" type="submit" id="button-addon2"><i
									class="fas fa-check-circle">
								</i> Terima</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>

	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
