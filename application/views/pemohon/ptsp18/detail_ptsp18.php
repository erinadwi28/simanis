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

	<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Detail input -->

	<!-- DETAIL DISESUAIKAN BE YAAA -->
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
						<?php if ($detail->ijazah != null) { ?>
						<p><?= $detail->ijazah; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href="<?= base_url() ?>assets/pemohon/ptsp/ptsp03/<?= $detail->ijazah ?>" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->ijazah == null) { ?>
						<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_ijazah_ptsp03/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_ijazah">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih file...</label>
										<input type="file" class="custom-file-input" id="file-upload" name="berkas"
											value="<?= $detail->ijazah ?>">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="id_permohonan_ptsp"
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

			<!-- Upload Proposal -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold">Proposal</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->ijazah != null) { ?>
						<p><?= $detail->ijazah; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-success"
							href="<?= base_url() ?>assets/pemohon/ptsp/ptsp03/<?= $detail->ijazah ?>" target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->ijazah == null) { ?>
						<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_ijazah_ptsp03/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_ijazah">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-2">pilih file...</label>
										<input type="file" class="custom-file-input" id="file-upload-2" name="berkas"
											value="<?= $detail->ijazah ?>">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="id_permohonan_ptsp"
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
		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Permohonan Bantuan Masjid
					</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>No Surat Takmir Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama ?></td>
							</tr>
							<tr>
								<td><b>Nama Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_hp ?></td>
							</tr>
							<tr>
								<td><b>Nama Ketua Takmir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->tempat_lahir ?></td>
							</tr>
							<tr>
								<td><b>Alamat Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tanggal_lahir)); ?></td>
							</tr>
							<tr>
								<td><b>No ID Masjid</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->alamat ?></td>
							</tr>
						</tbody>
					</table>
					<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen
						dibawah</em>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/form_ubah_ptsp05/<?= $detail->id_permohonan_ptsp ?>">
							<button id="btn_ubah" class="btn btn-sm btn-warning" type="submit">
								<i class="fa fa-edit nav-icon">
								</i> Ubah
							</button>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Button Selesai -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Pending') { ?>
		<a href="<?= base_url() ?>dashboard/aksi_update_status_permohonan/<?= $detail->id_permohonan_ptsp ?>">
			<button id="btn_selesai" class="btn btn-sm btn-primary" type="submit">
				<i class="far fa-save nav-icon">
				</i> Selesai
			</button>
		</a>
		<?php } ?>
	</div>
	<?php } ?>
	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
