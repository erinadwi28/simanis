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
					<?php } else { ?>
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
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-2">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Tambahan Jam Mengajar Guru</h6>
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
							<tr>
								<td><b>Nama PNS</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_pns ?></td>
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
								<td><b>Kecamatan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kecamatan ?></td>
							</tr>
							<tr>
								<td><b>Nama Sekolah Stminkal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_sekolah_satmikal ?></td>
							</tr>
							<tr>
								<td><b>Kecamatan Sekolah Satminkal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kecamatan_sekolah_satmikal ?></td>
							</tr>
							<tr>
								<td><b>Kabupaten Sekolah Satminkal</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kabupaten_sekolah_satmikal ?></td>
							</tr>
							<tr>
								<td><b>Agama</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->agama ?></td>
							</tr>
							<tr>
								<td><b>Nip</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nip ?></td>
							</tr>
							<tr>
								<td><b>Pangkat/Golongan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->pangkat_gol ?></td>
							</tr>
							<tr>
								<td><b>Jabatan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->jabatan ?></td>
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
								<td><b>Kecamatan Sekolah Tujuan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kecamatan_sekolah_tujuan ?></td>
							</tr>
							<tr>
								<td><b>Kabupaten Sekolah Tujuan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->kabupaten_sekolah_tujuan ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Mulai Mengajar</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= format_indo(date($detail->tgl_mulai_mengajar)); ?></td>
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
					<?php if ($detail->status == 'Belum Tuntas') { ?>
						<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen disamping</em>
					<?php } ?>
				</div>
				<?php if ($detail->status == 'Belum Tuntas') { ?>
					<div class="card-footer">
						<div class="float-right">
							<a href="<?= base_url() ?>dashboard/form_ubah_ptsp17/<?= $detail->id_permohonan_ptsp ?>">
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
		<div class="col-xs-12 col-sm-1"></div>
		<div class="col-xs-12 col-sm-3 mr-5">
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
							<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp17/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
							<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>
				<?php if ($detail->status == 'Belum Tuntas') { ?>
					<div class="card-footer">
						<form action="<?= base_url('dashboard/update_srt_permohonan_ptsp17/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp17_1">
							<div class="form-group">
								<div class="input-group">
									<div class="form-group-upload">
										<div class="custom-file">
											<label class="custom-file-label" for="file-upload">pilih
												file...</label>
											<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan" value="<?= $detail->srt_permohonan ?>" required>
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

		<div class="col-xs-12 col-sm-3 mr-5">
			<!-- srt_persetujuan_sekolah_satmikal  -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Persetujuan Sekolah Satminkal</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_persetujuan_sekolah_satmikal != null) { ?>
							<p><?= $detail->srt_persetujuan_sekolah_satmikal; ?></p>
							<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_satmikal/<?= $detail->srt_persetujuan_sekolah_satmikal ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->srt_persetujuan_sekolah_satmikal == null) { ?>
							<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>
				<?php if ($detail->status == 'Belum Tuntas') { ?>
					<div class="card-footer">
						<form action="<?= base_url('dashboard/update_srt_persetujuan_sekolah_satmikal_ptsp17/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp17_2">
							<div class="form-group">
								<div class="input-group">
									<div class="form-group-upload">
										<div class="custom-file">
											<label class="custom-file-label" for="file-upload-2">pilih file...</label>
											<input type="file" class="custom-file-input" id="file-upload-2" name="srt_persetujuan_sekolah_satmikal" value="<?= $detail->srt_persetujuan_sekolah_satmikal ?>" required>
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

		<div class="col-xs-12 col-sm-3 mr-5">
			<!-- srt_persetujuan_sekolah_tujuan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Persetujuan Sekolah Tujuan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_persetujuan_sekolah_tujuan != null) { ?>
							<p><?= $detail->srt_persetujuan_sekolah_tujuan; ?></p>
							<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_tujuan/<?= $detail->srt_persetujuan_sekolah_tujuan ?>" target="_blank">
								<i class="fa fa-download nav-icon">
								</i> Klik untuk melihat
							</a>
						<?php } elseif ($detail->srt_persetujuan_sekolah_tujuan == null) { ?>
							<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
						<?php } ?>
					</center>
				</div>
				<?php if ($detail->status == 'Belum Tuntas') { ?>
					<div class="card-footer">
						<form action="<?= base_url('dashboard/update_srt_persetujuan_sekolah_tujuan_ptsp17/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp17_3">
							<div class="form-group">
								<div class="input-group">
									<div class="form-group-upload">
										<div class="custom-file">
											<label class="custom-file-label" for="file-upload-3">pilih file...</label>
											<input type="file" class="custom-file-input" id="file-upload-3" name="srt_persetujuan_sekolah_tujuan" value="<?= $detail->srt_persetujuan_sekolah_tujuan ?>" required>
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
	</div>
	
	<!-- Button Selesai -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Belum Tuntas') { ?>
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
