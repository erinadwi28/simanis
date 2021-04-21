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

			<!-- Proposal Permohonan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Proposal  </h6>
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
		<div class="col-md-8 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Bantuan RA/Madrasah</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Tujuan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Tempat Tujuan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Nama Sekolah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td>xxx</td>
							</tr>
							<tr>
								<td><b>Nomor Surat Permohonan</b></td>
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
								<td><b>Keperluan</b></td>
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

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<a href="" class="mr-2">
					<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="<">
					<button id="btn_termia" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
			</div>

			<!-- Button Setujui Final & No Surat -->
			<div class="row clearfix">
				<div class="col-md-12">
					<form class="form-horizontal" id="no_surat_ptsp12" enctype="multipart/form-data" action=""
						method="POST">
						<div class="row clearfix">
							<div class="col-md-1"></div>
							<div class="input-group col-md-3 px-2 mb-2">
								<input type="text" class="form-control " id="no_surat" name="no_surat"
									value=".../Kk.11.10/2/PP.04/bln/tahun" required>
							</div>
							<div class="input-group col-md-3 px-2 mb-2">
								<input type="text" class="form-control " id="sifat" name="sifat" value=""
									placeholder="sifat surat..." required>
							</div>
							<div class="input-group col-md-3 px-2 mb-2">
								<input type="number" min="0" class="form-control " id="jml_lampiran"
									name="jml_lampiranjml_lampiran" value="" placeholder="jumlah lampiran..." required>
							</div>
							<button class="btn btn-sm btn-primary mb-2 float-right px-2" type="submit"
								id="button-addon2"><i class="fas fa-check-circle">
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
