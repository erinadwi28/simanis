<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
			foreach ($detail_ptsp as $detail) { ?>
	<?php if ($detail->status === 'Proses Kasubag') { ?>
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
	<?php } elseif ($detail->status === 'Selesai') { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a
						href="<?= base_url('dashboard/list_permohonan_selesaiKasubag') ?>">Permohonan
						Selesai</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>
	<?php } ?>


	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Perpanjangan Operasional
						KBIHU</h6>
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
								<td><?= $detail->no_surat ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td><b>Nama Pemohon</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_pemohon ?></td>
							</tr>
							<tr>
								<td><b>Nama Yayasan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_yayasan ?></td>
							</tr>
							<tr>
								<td><b>Nama Kelompok Bimbingan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_kelompok_bimbingan ?></td>
							</tr>
							<tr>
								<td><b>Domisili Kelompok Bimbingan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->domisili_kelompok_bimbingan ?></td>
							</tr>
							<tr>
								<td><b>Alamat Kantor</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->alamat_kantor ?></td>
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
								<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
							</tr>
							<?php if ($detail->tgl_persetujuan_fo != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Front Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_fo)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_bo != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Back Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_bo)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_kasi != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Kasi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_kasi)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_kasubag != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Kasubag</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->keterangan != null && $detail->status != 'Selesai') { ?>
							<tr>
								<td><b>Keterangan Permohonan Pending</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->keterangan; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>

	<!-- Unggah dokumen -->
	<div class="row clearfix">
		<!-- Surat Permohonan -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Permohonan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_permohonan != null) { ?>
						<p><?= $detail->srt_permohonan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Akte Notaris -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Akte Notaris</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">

							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Bukti foto kantor -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Bukti Kantor Sekretariat</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->ktp != null) { ?>
						<p><?= $detail->ktp; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/<?= $detail->ktp ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->ktp == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Dokumen susunan pengurus -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Dokumen susunan pengurus</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->bukti_pelunasan != null) { ?>
						<p><?= $detail->bukti_pelunasan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/<?= $detail->bukti_pelunasan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->bukti_pelunasan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<!-- Sertifikat pembimbing -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Sertifikat Pembimbing</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_permohonan != null) { ?>
						<p><?= $detail->srt_permohonan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Dokumen rencana program manasik -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Rencana Program Manasik</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">

							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Laporan Pelaksanaan Bimbingan -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Lap. Pelaksanaan Bimbingan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Sertifikat AKreditasi -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Sertifikat Akreditasi</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<!-- SK terakhir pendirian KBIHU -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">SK terakhir izin pendirian KBIHU</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->srt_permohonan != null) { ?>
						<p><?= $detail->srt_permohonan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Rincian penggunaan biaya bimbingan -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Rincian Penggunaan Biaya Bimbingan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Berita Acara -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Berita Acara</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<!-- Button Setujui -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Proses Kasubag') { ?>
		<div class="float-right">
			<a href="<?= base_url() ?>dashboard/aksi_setujui_permohonan/<?= $detail->id_permohonan_ptsp ?>">
				<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
					<i class="fas fa-check-circle">
					</i> Terima
				</button>
			</a>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
