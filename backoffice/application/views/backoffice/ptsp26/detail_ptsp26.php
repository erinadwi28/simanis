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

		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Data Lembaga Agama dan Keagamaan, Rumah
						Ibadah, Peristiwa Nikah, Jumlah Guru , Haji,</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Alamat</b> </td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Pekerjaan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
							</tr>
							<tr>
								<td><b>No.handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Tujuan permohonan data</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
							</tr>

						</tbody>
					</table>

				</div>
			</div>

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<?php if ($detail->status == 'Proses BO') { ?>
				<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>"
					class="mr-2">
					<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
					<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
