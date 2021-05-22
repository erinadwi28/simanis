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

			<div class="col-md-8 mb-0 col-xs-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Konsultasi dan informasi sertifikasi halal,zakat dan
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
										<td><?= $detail->hari_konsultasi ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_konsultasi != null) { ?>
									<tr>
										<td><b>Tanggal Konsultasi</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= format_indo(date($detail->tgl_konsultasi)) ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->jam_konsultasi != null) { ?>
									<tr>
										<td><b>Jam KOnsultasi</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= $detail->jam_konsultasi ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->nama_petugas != null) { ?>
									<tr>
										<td><b>Nama Petugas</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= $detail->nama_petugas ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->nip_petugas != null) { ?>
									<tr>
										<td><b>NIP Petugas</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= $detail->nip_petugas ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->pangkat_golongan != null) { ?>
									<tr>
										<td><b>Pangkat Golongan</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= $detail->pangkat_golongan ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->jabatan != null) { ?>
									<tr>
										<td><b>Jabatan</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= $detail->jabatan ?></td>
									</tr>
								<?php } ?>
								<tr>
									<td><b>Nama Pemohon</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->nama_pemohon ?></td>
								</tr>
								<tr>
									<td><b>Alamat Pemohon</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->alamat ?></td>
								</tr>
								<tr>
									<td><b>Pekerjaan Pemohon</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->pekerjaan ?></td>
								</tr>
								<tr>
									<td><b>No.handphone Pemohon</b></td>
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
								<?php if ($detail->tgl_persetujuan_tim_teknis != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Tim Teknis</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td><?= format_indo(date($detail->tgl_persetujuan_tim_teknis)); ?></td>
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
				<?php if ($detail->status == 'Proses BO') { ?>
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-center">Form Input Jadwal Konsultasi</h6>
						</div>
						<div class="card-body">
							<form class="form-horizontal" id="formpetugas_ptsp01" enctype="multipart/form-data" action="<?= base_url('dashboard/jadwal_konsultasi') ?>" method="POST">
								<div class="form-group row">
									<label for="hari_konsultasi" class="col-sm-3 col-form-label">Hari Konsultasi</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="hari_konsultasi" name="hari_konsultasi" value="" placeholder="masukkan hari disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_konsultasi" class="col-sm-3 col-form-label">Tanggal Konsultasi</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="date" class="form-control" id="tgl_konsultasi" name="tgl_konsultasi" value="" placeholder="masukkan tanggal disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="jam_konsultasi" class="col-sm-3 col-form-label">Jam Konsultasi</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="jam_konsultasi" name="jam_konsultasi" value="" placeholder="masukkan jam disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_petugas" class="col-sm-3 col-form-label">Nama Petugas</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="" placeholder="masukkan nama petugas disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="nip_petugas" class="col-sm-3 col-form-label">NIP Petugas</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="nip_petugas" name="nip_petugas" value="" placeholder="masukkan jabatan disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="pangkat_golongan" class="col-sm-3 col-form-label">Pangkat Petugas</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="pangkat_golongan" name="pangkat_golongan" value="" placeholder="masukkan pangkat do'a disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="jabatan" class="col-sm-3 col-form-label">Jabatan Petugas</label>
									<div class="col-sm-9">
										<div class="form-line focused">
											<input type="text" class="form-control" id="jabatan" name="jabatan" value="" placeholder="masukkan jabatan disini..." required>
										</div>
									</div>
								</div>
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<input type="hidden" class="form-control" id="id_ptsp" name="id_ptsp" value="<?= $detail->id_ptsp ?>">
									<input type="hidden" class="form-control" id="id_permohonan_ptsp" name="id_permohonan_ptsp" value="<?= $detail->id_permohonan_ptsp ?>">
									<input type="hidden" class="form-control" id="id_layanan" name="id_layanan" value="<?= $detail->id_layanan ?>">
								<?php } ?>
								<div class="form-group row px-2 float-right mb-0">
									<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
										<i class="far fa-save nav-icon">
										</i> Simpan
									</button>

								</div>
							</form>
						</div>
					</div>
				<?php } ?>
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
				<a href="<?= base_url() ?>dashboard/aksi_update_status_proses_kasi/<?= $detail->id_permohonan_ptsp ?>">
					<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>