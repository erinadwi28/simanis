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
						href="<?= base_url('dashboard/list_permohonan_selesaiKasubag') ?>">Permohonan Selesai</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>
	<?php } ?>
	<div class="row clearfix">
		<div class="col-md-4 mb-0">
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
							<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp25/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
							<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
			<!-- FC Dokumen -->
			<?php if ($detail->jadwal != null) { ?>
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<center>
							<h6 class="m-0 font-weight-bold">Jadwal Konsultasi</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<p><?= $detail->jadwal; ?></p>
							<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp25/jadwal/<?= $detail->jadwal ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						</center>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-8 mb-0">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Konsultasi dan informasi sertifikasi halal, zakat dan
						wakaf</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<?php if ($detail->hari_konsultasi != null) { ?>
								<tr>
									<td><b>Hari Konsultasi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->hari_konsultasi ?></td>
								</tr>
							<?php } ?>
							<?php if ($detail->jam_konsultasi != null) { ?>
								<tr>
									<td><b>Jam Konsultasi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jam_konsultasi ?></td>
								</tr>
							<?php } ?>
							<?php if ($detail->nama_petugas != null) { ?>
								<tr>
									<td><b>Nama Petugas</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_petugas ?></td>
								</tr>
							<?php } ?>
							<?php if ($detail->nip_petugas != null) { ?>
								<tr>
									<td><b>NIP Petugas</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nip_petugas ?></td>
								</tr>
							<?php } ?>
							<?php if ($detail->pangkat_golongan != null) { ?>
								<tr>
									<td><b>Pangkat Golongan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->pangkat_golongan ?></td>
								</tr>
							<?php } ?>
							<?php if ($detail->jabatan != null) { ?>
								<tr>
									<td><b>Jabatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jabatan ?></td>
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
								<td><b>Alamat Pemohon</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->alamat ?></td>
							</tr>
							<tr>
								<td><b>Pekerjaan Pemohon</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->pekerjaan ?></td>
							</tr>
							<tr>
								<td><b>No.handphone Pemohon</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->no_hp ?></td>
							</tr>
							<tr>
								<td><b>Perihal Konsultasi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->perihal_konsultasi ?></td>
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
							<?php if ($detail->tgl_persetujuan_tim_teknis != null) { ?>
								<tr>
									<td><b>Tanggal Persetujuan Tim Teknis</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_persetujuan_tim_teknis)); ?></td>
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
				<div class="card-footer">
					<div class="float-right">
						<?php if ($detail->status == 'Proses Kasubag') { ?>
						<a href="<?= base_url() ?>dashboard/aksi_setujui_permohonan/<?= $detail->id_permohonan_ptsp ?>">
							<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
								<i class="fas fa-check-circle">
								</i> Terima
							</button>
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
