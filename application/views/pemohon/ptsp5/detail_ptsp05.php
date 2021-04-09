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
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-2"></div>
			<div class="col-md-8 mb-2">
				<!-- Detail Data -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
					</div>
					<div class="card-body">
						<table class="table-hover table-responsive">
							<tbody>
								<tr>
									<td><b>Nama Lengkap</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>	
									<td> </td>
									<td><?= $detail->nama ?></td>
								</tr>
								<tr>
									<td><b>Nomor HP</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_hp ?></td>
								</tr>
								<tr>
									<td><b>Tempat Lahir</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tempat_lahir ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Lahir</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tanggal_lahir)); ?></td>
								</tr>
								<tr>
									<td><b>Alamat Lengkap</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->alamat ?></td>
								</tr>
								<tr>
									<td><b>No. Porsi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nomor_porsi ?></td>
								</tr>
								<tr>
									<td><b>Tahun Angkatan Haji</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tahun_hijriah ?> H / <?= $detail->tahun_masehi ?> M</td>
								</tr>
								<tr>
									<td><b>Tanggal Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
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
			<div class="col-xs-12 col-sm-2"></div>
		</div>
		<!-- Unggah dokumen -->
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-3">
				<!-- Surat Permohonan -->
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
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>

						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_srt_permohonan_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_srt_permohonan">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload">pilih
													file...</label>
												<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan" value="<?= $detail->srt_permohonan ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
											</div>
										</div>
									</div>
								</div>
								<center>
									<button class="btn btn-sm btn-primary" type="submit">
										<i class="fa fa-upload"></i>
									</button>
								</center>
							</form>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- Surat Pernyataan -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Surat Pernyataan</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->srt_pernyataan != null) { ?>
								<p><?= $detail->srt_pernyataan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_pernyataan == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_srt_pernyataan_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_srt_pernyataan">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih
													file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="srt_pernyataan" value="<?= $detail->srt_pernyataan ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload-2" value="<?= $detail->id_permohonan_ptsp ?>">
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
			<div class="col-xs-12 col-sm-3">
				<!-- fc ktp -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">FC KTP</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->ktp != null) { ?>
								<p><?= $detail->ktp; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/<?= $detail->ktp ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->ktp == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_fc_ktp_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_fc_ktp">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-3">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-3" name="fc_ktp" value="<?= $detail->ktp ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload-3" value="<?= $detail->id_permohonan_ptsp ?>">
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
			<div class="col-xs-12 col-sm-3">
				<!-- Bukti Pelunasan -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Bukti Pelunasan</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->bukti_pelunasan != null) { ?>
								<p><?= $detail->bukti_pelunasan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/<?= $detail->bukti_pelunasan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->bukti_pelunasan == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_bukti_pelunasan_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_bukti_pelunasan">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-4">pilih
													file...</label>
												<input type="file" class="custom-file-input" id="file-upload-4" name="bukti_pelunasan" value="<?= $detail->bukti_pelunasan ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload-4" value="<?= $detail->id_permohonan_ptsp ?>">
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