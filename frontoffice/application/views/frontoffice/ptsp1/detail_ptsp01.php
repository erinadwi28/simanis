<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<?php
	foreach ($detail_ptsp as $detail) {
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
		<?php } elseif ($detail->status === 'Pending') { ?>
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
		<?php } elseif ($detail->id_fo != null) { ?>
			<div class="d-sm-flex align-items-center justify-content-between">
				<h3 class="judullist py-3">Detail Permohonan</h1>
					<nav aria-label="breadcrumb" class="nav-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_selesaiFO') ?>">Permohonan Selesai FO</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } elseif ($detail->status === 'Proses BO') { ?>
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
		<?php } elseif ($detail->status === 'Proses Kasi') { ?>
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
		<?php } elseif ($detail->status === 'Proses Kasubag') { ?>
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
		<?php } elseif ($detail->status === 'Selesai') { ?>
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
			<div class="col-md-4 mb-4">
				<!-- Surat Permohonan -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<center>
							<h6 class="m-0 font-weight-bold">Surat Permohonan</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp01/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
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

			<div class="col-md-8 mb-4">
				<!-- Detail Data -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rohaniawan dan Petugas Do'a</h6>
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
										<td><b>Lampiran</b></td>
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
									<td><b>Nama Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_acara; ?></td>
								</tr>
								<tr>
									<td><b>Hari Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->hari_acara; ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_acara)); ?></td>
								</tr>
								<tr>
									<td><b>Waktu Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->waktu_acara; ?></td>
								</tr>
								<tr>
									<td><b>Tempat Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tempat_acara; ?></td>
								</tr>
								<tr>
									<td><b>Jumlah Petugas Do'a</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jml_petugas_doa; ?></td>
								</tr>

								<!-- DINAMIS MENYESUAIKAN JUMLAH PETUGAS DOA -->
								<!-- <?php if ($detail->nama_petugas_doa != null) { ?>
							<tr>
								<td><b>Nama Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_petugas_doa; ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->nip_petugas_doa != null) { ?>
							<tr>
								<td><b>NIP Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nip_petugas_doa; ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->pangkat_doa != null) { ?>
							<tr>
								<td><b>Pangkat Doa Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->pangkat_doa; ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->jabatan_petugas_doa != null) { ?>
							<tr>
								<td><b>Jabatan Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->jabatan_petugas_doa; ?></td>
							</tr>
							<?php } ?> -->

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
						<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
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
				<?php
				if ($detail->status == 'Selesai') { ?>
					<div class="row clearfix">
						<div class="col-md-12">
							<form class="form-horizontal" id="no_surat_ptsp01" enctype="multipart/form-data" action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp01/<?= $detail->id_permohonan_ptsp ?>" method="POST">
								<div class="row clearfix">
									<div class="col-md-1"></div>
									<div class="input-group col-md-3 px-2 mb-2">
										<input type="text" class="form-control " id="no_surat" name="no_surat" value=".../Kk.11.10/05/Hj.00/<?= date("m/Y") ?>" required>
									</div>
									<div class="input-group col-md-3 px-2 mb-2">
										<input type="text" class="form-control " id="sifat" name="sifat" value="" placeholder="sifat surat..." required>
									</div>
									<div class="input-group col-md-3 px-2 mb-2">
										<input type="number" min="0" class="form-control " id="jml_lampiran" name="jml_lampiran" value="" placeholder="jumlah lampiran..." required>
									</div>
									<button class="btn btn-sm btn-primary mb-2 float-right px-2" type="submit" id="button-addon2"><i class="fas fa-check-circle">
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