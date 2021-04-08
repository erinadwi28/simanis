<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h1>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-md-4 mb-0">
			<?php
			foreach ($detail_ptsp as $detail) { ?>
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
							<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp18/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
							<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>

			<!-- Proposal -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold">Proposal</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->proposal != null) { ?>
							<p><?= $detail->proposal; ?></p>
							<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp18/proposal/<?= $detail->proposal ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->proposal == null) { ?>
							<p>Belum ada lampiran</p>
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Permohonan Bantuan Masjid</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>No Surat Takmir Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_surat_permohonan ?></td>
							</tr>
							<tr>
								<td><b>Nama Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama_masjid ?></td>
							</tr>
							<tr>
								<td><b>Nama Ketua Takmir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama_ketua_takmir ?></td>
							</tr>
							<tr>
								<td><b>Alamat Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->alamat_masjid ?></td>
							</tr>
							<tr>
								<td><b>No ID Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_id_masjid ?></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_hp ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_surat_permohonan)) ?></td>
							</tr>
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
				<div class="card-footer">
					<?php if ($detail->status == 'Proses BO') { ?>
						<div class="float-right">
							<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>">
								<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
									<i class="fas fa-times-circle">
									</i> Tolak
								</button>
							</a>
							<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
								<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
									<i class="fas fa-check-circle">
									</i> Terima
								</button>
							</a>
						</div>
					<?php } ?>
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
