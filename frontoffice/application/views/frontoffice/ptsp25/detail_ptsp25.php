<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>


	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-4">
			<?php foreach ($detail_ptsp as $detail) { ?>
				<div class="card shadow">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Konsultasi dan informasi sertifikasi halal,zakat dan wakaf</h6>
					</div>
					<div class="card-body">
						<table class="table-hover table-responsive">
							<tbody>
								<tr>
									<td><b>Nama</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->nama ?></td>
								</tr>
								<tr>
									<td><b>Alamat</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->alamat ?></td>
								</tr>
								<tr>
									<td><b>Pekerjaan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->pekerjaan ?></td>
								</tr>
								<tr>
									<td><b>No.handphone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->no_hp ?></td>
								</tr>
								<tr>
									<td><b>Perihal Konsultasi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->perihal_konsultasi ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
	<!-- Button Tolak & Setujui -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Validasi Kemenag') { ?>
			<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
				<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
					<i class="fas fa-times-circle">
					</i> Tolak
				</button>
			</a>
			<a href="<?= base_url() ?>dashboard/aksi_setujui_permohonan/<?= $detail->id_permohonan_ptsp ?>">
				<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
					<i class="fas fa-check-circle">
					</i> Terima
				</button>
			</a>
		<?php } ?>
	</div>
<?php } ?>
<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->