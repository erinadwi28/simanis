<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Permohonan Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-md-4 mb-4">
			<?php
					foreach ($detail_ptsp as $detail) { ?>
			<!-- dokumen -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold">Dokumen</h6>
					</center>
				</div>

				<div class="card-body" style="padding: 15px;">
					<center>
						<?php if ($detail->dokumen != null) { ?>
						<p><?= $detail->dokumen; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href="<?= base_url() ?>../assets/pemohon/ptsp/ptsp04/<?= $detail->dokumen ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->dokumen == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Dokumen Kepegawaian, Surat,
						Piagam, Sertifikat</h6>
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
								<td><?= $detail->nama ?></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->no_hp; ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
							</tr>
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
					<?php if ($detail->status == 'Validasi Kemenag') { ?>
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>">
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
