<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
				<li class="breadcrumb-item active" aria-current="page">SOP</li>
				<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
				<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-md-4 mb-4">
			<?php
			foreach ($detail_ptsp as $detail) { ?>
				<!-- ijazah -->
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
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>assets/dashboard/pemohon/ptsp/ptsp04/<?= $detail->dokumen ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->dokumen == null) { ?>
								<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>

					<?php if ($detail->status == 'Pending') { ?>
					<div class="card-footer py-3">
							<form action="<?= base_url('dashboard/update_dokumen_ptsp04/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_ijazah">
								<div class="form-group ml-2 mr-2">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload">pilih file dokumen...</label>
												<input type="file" class="custom-file-input" id="file-upload" name="berkas" value="<?= $detail->dokumen ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="id_permohonan_ptsp" value="<?= $detail->id_permohonan_ptsp ?>">
												<!-- <i class=" fas fa-exclamation-circle"></i>
										<h6>Error massage</h6> -->
											</div>
										</div>
									</div>
								</div>
								<center>
									<button class="btn btn-sm btn-primary" type="submit">
										<i class="fa fa-upload">
										</i>
									</button>
								</center>
							</form>
						</div>
					<?php } ?>
				</div>
		</div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat</h6>
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
								<td><?= format_indo(date($detail->tgl_permohonan)); ?></td>
							</tr>
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

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<div class="float-right">
							<a href="<?= base_url() ?>dashboard/form_ubah_ptsp04/<?= $detail->id_permohonan_ptsp ?>">
								<button id=" btn_ubah" class="btn btn-sm btn-warning" type="submit">
									<i class="fa fa-edit nav-icon">
									</i> Ubah
								</button>
							</a>
							<a href="<?= base_url() ?>dashboard/aksi_update_status_permohonan/<?= $detail->id_permohonan_ptsp ?>">
								<button id="btn_selesai" class="btn btn-sm btn-primary" type="submit">
									<i class="far fa-save nav-icon">
									</i> Selesai
								</button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->