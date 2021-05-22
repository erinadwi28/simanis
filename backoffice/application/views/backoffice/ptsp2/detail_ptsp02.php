<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	foreach ($detail_ptsp as $detail) { ?>
		<?php if ($detail->status == 'Proses BO') { ?>
			<!-- Page Heading -->
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
		<?php } else { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_selesaiBO') ?>">Permohonan Selesai BO</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } ?>

		<!-- Detail Surat -->
		<div class="row clearfix">
			<div class="col-md-4 mb-4">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Surat Permohonan</h6>
					</div>

					<!-- DISESUAIKAN BE YA -->
					<div class="card-body">
						<center>
							<?php if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp02/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p>Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>

			<div class="col-md-8 mb-0">
				<!-- Detail Data -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Kegiatan Keagamaan</h6>
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
								<?php if ($detail->sifat != null) { ?>
									<tr>
										<td><b>Sifat</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->sifat ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->jml_lampiran != null) { ?>
									<tr>
										<td><b>Jumlah Lampiran</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->jml_lampiran ?></td>
									</tr>
								<?php } ?>
								<tr>
									<td><b>Nama</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->pemohon ?></td>
								</tr>
								<tr>
									<td><b>No HandPhone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_hp ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_srt_permohonan)); ?></td>
								</tr>
								<tr>
									<td><b>No Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_srt_permohonan; ?></td>
								</tr>
								<tr>
									<td><b>Hari Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->hari_kegiatan; ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_kegiatan)); ?></td>
								</tr>
								<tr>
									<td><b>Waktu Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->waktu_kegiatan; ?></td>
								</tr>
								<tr>
									<td><b>Tempat Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tempat_kegiatan; ?></td>
								</tr>
								<tr>
									<td><b>Nama Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_kegiatan; ?></td>
								</tr>
								<tr>
									<td><b>Jumlah Peserta</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jml_peserta; ?></td>
								</tr>
								<tr>
									<td><b>Agenda Kegiatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->agenda_kegiatan; ?></td>
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
								<?php if ($detail->tgl_persetujuan_kasubag != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Kasubag TU</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->keterangan != null && $detail->status != 'Selesai') { ?>
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
					<?php if ($detail->status == 'Proses BO') { ?>
						<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
							<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
								<i class="fas fa-times-circle">
								</i> Tolak
							</button>
						</a>
						<a href="<?= base_url() ?>dashboard/aksi_update_status_proses_kasubag/<?= $detail->id_permohonan_ptsp ?>">
							<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
								<i class="fas fa-check-circle">
								</i> Terima
							</button>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->