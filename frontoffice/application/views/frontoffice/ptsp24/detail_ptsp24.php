<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<?php foreach ($detail_ptsp as $detail) {
		if ($detail->status == 'Validasi Kemenag') { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status == 'Pending') { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_pending') ?>">Permohonan Pending</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status == 'Proses BO') { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_prosesBO') ?>">Permohonan Proses BO</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status == 'Proses Kasi') { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_prosesKasi') ?>">Permohonan Proses Kasi</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status == 'Proses Kasubag') { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_prosesKasubag') ?>">Permohonan Proses Kasubag</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status_cetak == 1) { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_arsip') ?>">Arsip</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } else { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_selesai') ?>">Permohonan Selesai</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } ?>

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
							<?php
							if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp24/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
				<!-- Jadwal dan Ketentuan siaran -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">FC Dokumen</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php
							if ($detail->fc_dokumen != null) { ?>
								<p><?= $detail->fc_dokumen; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp24/fc_dokumen/<?= $detail->fc_dokumen ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->fc_dokumen == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-md-8 mb-0">
				<!-- Detail Data -->
				<!-- DISESUAIKAN BE YAA DATANYA -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Rek. Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah</h6>
					</div>
					<div class="card-body">
						<table class="table-hover table-responsive">
							<tbody>
								<?php if ($detail->no_surat != null) { ?>
									<tr>
										<td><b>Nomor Surat</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->no_surat ?></td>
									</tr>
								<?php } ?>
								<tr>
									<td><b>Pemilik Kendaraan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->pemilik_kendaraan ?></td>
								</tr>
								<tr>
									<td><b>Jumlah Roda Kendaraan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jml_roda_kendaraan ?></td>
								</tr>
								<tr>
									<td><b>Merek Kendaraan </b> </td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->merek_kendaraan ?></td>
								</tr>
								<tr>
									<td><b>No. Polisi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_polisi ?></td>
								</tr>
								<tr>
									<td><b>Fungsional Kendaraan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->fungsional_kendaraan ?></td>
								</tr>
								<tr>
									<td><b>No. HandPhone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_hp ?></td>
								</tr>

								<tr>
									<td><b>Tanggal Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_permohonan)); ?></td>
								</tr>
								<?php if ($detail->tgl_persetujuan_fo != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Front Office</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_fo)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_persetujuan_bo != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Back Office</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_bo)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_persetujuan_kasi != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Kasi</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_kasi)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_persetujuan_kasubag != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Kasubag</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->keterangan != null && $detail->status == 'Pending') { ?>
									<tr>
										<td><b>Keterangan Permohonan Pending</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->keterangan; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Button Tolak & Setujui Awal Surat Masuk -->
				<div class="row clearfix float-right px-2">
					<?php if ($detail->status == 'Validasi Kemenag') { ?>
						<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2" class="mr-2">
							<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
								<i class="fas fa-times-circle">
								</i> Tolak
							</button>
						</a>
						<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
							<button id="btn_termia" class="btn btn-sm btn-primary" type="submit">
								<i class="fas fa-check-circle">
								</i> Terima
							</button>
						</a>
					<?php } ?>
				</div>

				<!-- Button Setujui Final & No Surat -->
				<?php if ($detail->status === 'Selesai' && $detail->no_surat == null) { ?>
					<div class="row clearfix">
						<div class="col-md-12">
							<form class="form-horizontal" id="no_surat_ptsp24" enctype="multipart/form-data" action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp24/<?= $detail->id_permohonan_ptsp ?>" method="POST">
								<div class="input-group mb-3 col-md-6 float-right p-0">
									<input type="text" class="form-control " id="no_surat" name="no_surat" value="" required>
									<button class="btn btn-sm btn-primary" type="submit" id="button-addon2"><i class="fas fa-check-circle">
										</i> Terima</button>
								</div>
							</form>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->