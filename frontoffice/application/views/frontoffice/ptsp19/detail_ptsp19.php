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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Petugas Siaran Keagamaan</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
						<tr>
								<td><b>Nama Studio</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Kabupaten Studio</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>No. Surat Petugas Siaran Keagamaan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Tgl. Surat Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Agamar</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Bulan Siaran</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<a href=""
					class="mr-2">
					<button id="" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="">
					<button id="" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
			</div> 
			<!-- Button Setujui Final & No Surat -->
			<div class="row clearfix float-right px-2">
				<form class="form-horizontal" id="no_surat_ptsp05" enctype="multipart/form-data"
					action=""
					method="POST">
					<div class="row clearfix float-right px-2">
						<div class="input-group col-md-3 px-2 mb-2 ">
							<input type="text" class="form-control " id="no_surat" name="no_surat"
								value=".../Kk.11.10/05/Hj.00/" required>
						</div>
						<div class="input-group col-md-3 px-2 mb-2">
							<input type="text" min="0" class="form-control " id="nomor_surat_tugas"
								name="nomor_surat_tugas" value="" placeholder="No. Surat Tugas" required>
						</div>
						<div class="input-group col-md-2 px-2 mb-2">
							<input type="text" class="form-control " id="sifat" name="sifat" value=""
								placeholder="Sifat surat" required>
						</div>
						<div class="input-group col-md-2 px-2 mb-2">
							<input type="number" min="0" class="form-control " id="jml_lampiran"
								name="jml_lampiranjml_lampiran" value="" placeholder="Lampiran" required>
						</div>
						<div class="input-group col-md-2 px-2 mb-2">
							<button id="" class="btn btn-sm btn-primary" type="submit">
								<i class="fas fa-check-circle">
								</i> Terima
							</button>
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
