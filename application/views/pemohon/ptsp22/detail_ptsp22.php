<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<?php foreach ($detail_ptsp as $detail) { ?>
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<?php if ($detail->status == 'Validasi Kemenag') { ?>
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_validasi_kemenag') ?>">Permohonan Proses Kemenag</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
				<?php } elseif ($detail->status == 'Selesai') { ?>
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesai') ?>">Permohonan Selesai</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
				<?php } else{ ?>
					<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					<li class="breadcrumb-item active" aria-current="page">SOP</li>
					<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
					<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
				<?php } ?>
			</ol>
		</nav>
	</div>

	
	<!-- Detail input -->
	<div class="row clearfix">
	<div class="col-md-4 mb-0">
			<!-- Upload Surat Permohonan -->
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
						<a id="btn_upload" class="btn btn-sm btn-success"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp22/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
						<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_srt_permohonan_ptsp22/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="form_upload_srt_permohonan">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="srt_permohonan" value="<?= $detail->srt_permohonan ?>">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload"
											value="<?= $detail->id_permohonan_ptsp ?>">
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

			<!-- Upload Formulir -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold">Formulir</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->formulir != null) { ?>
						<p><?= $detail->formulir; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp22/formulir/<?= $detail->formulir ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->formulir == null) { ?>
						<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_formulir_ptsp22/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_formulir">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-2">pilih file...</label>
										<input type="file" class="custom-file-input" id="file-upload-2" name="formulir"
											value="<?= $detail->formulir ?>">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload"
											value="<?= $detail->id_permohonan_ptsp ?>">
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
		<div class="col-md-8 mb-2">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Rek. Rek. ID Masjid & Musala</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_masjid ?></td>
							</tr>
							<tr>
								<td><b>Tpologi </b> </td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->tipologi ?></td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->alamat ?></td>
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

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/form_ubah_ptsp22/<?= $detail->id_permohonan_ptsp ?>">
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
	</div>
<?php } ?>
	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
