<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<?php
	foreach ($detail_ptsp as $detail) { ?>
		<?php if ($detail->status === 'Pending') { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail</h3>
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasi') ?>">Permohonan Pending</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
					</ol>
				</nav>
			</div>
		<?php } elseif ($detail->status === 'Validasi Kemenag') { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail</h3>
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasi') ?>">Permohonan Proses FO</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
					</ol>
				</nav>
			</div>
		<?php } elseif ($detail->status === 'Proses BO') { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail</h3>
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasi') ?>">Permohonan Proses BO</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
					</ol>
				</nav>
			</div>
		<?php } elseif ($detail->status === 'Proses Kasi') { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail</h3>
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Proses Kasi</a></li>
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
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasi') ?>">Permohonan Selesai</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
					</ol>
				</nav>
			</div>
		<?php } elseif ($detail->status === 'Proses Kasubag') { ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail</h3>
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasubag') ?>">Permohonan Selesai</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
					</ol>
				</nav>
			</div>
		<?php } ?>
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-2">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Pindah Siswa Madrasah</h6>
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
								<td><b>Nama Lengkap Siswa</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_siswa ?></td>
							</tr>
							<tr>
								<td><b>Tempat Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->tempat_lahir_siswa ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= format_indo(date($detail->tgl_lahir_siswa)) ?></td>
							</tr>
							<tr>
								<td><b>Nisn</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nisn ?></td>
							</tr>
							<tr>
								<td><b>Kelas</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kelas ?></td>
							</tr>
							<tr>
								<td><b>Nama Sekolah Tujuan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_sekolah_tujuan ?></td>
							</tr>
							<tr>
								<td><b>Nama Sekolah Asal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_sekolah_asal ?></td>
							</tr>
							<tr>
								<td><b>No. Surat Rek. Sekolah Asal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->no_srt_rek_sekolah_asal ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Surat Rek. Sekolah Asal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= format_indo(date($detail->tgl_srt_rek_sekolah_asal)) ?></td>
							</tr>
							<tr>
								<td><b>Alasan Pindah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->alasan_pindah ?></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
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
								<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
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
		</div>
	</div>
	<div class="row clearfix">
	<div class="col-xs-12 col-sm-1"></div>
		<div class="col-xs-12 col-sm-3 mr-5">
			<!-- Surat Rekomendasi -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Rekomendasi</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->srt_rekomendasi != null) { ?>
						<p><?= $detail->srt_rekomendasi; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp11/srt_rekomendasi/<?= $detail->srt_rekomendasi ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_rekomendasi == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>

			</div>
		</div>
		<div class="col-xs-12 col-sm-3 mr-5">
			<!-- Surat Penerimaan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Penerimaan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_penerimaan != null) { ?>
						<p><?= $detail->srt_penerimaan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp11/srt_penerimaan/<?= $detail->srt_penerimaan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_penerimaan == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- fc rapot -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">FC Rapot Terakhir</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->raport != null) { ?>
						<p><?= $detail->raport; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp11/raport/<?= $detail->raport ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->raport == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>

			</div>
		</div>
	</div>

	<!-- Button Setujui -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Proses Kasi') { ?>
		<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
			<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
				<i class="fas fa-check-circle">
				</i> Terima
			</button>
		</a>
		<?php } ?>
	</div>
	<?php }?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
