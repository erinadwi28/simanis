<!-- Begin Page Content -->
<div class="container-fluid">
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Siswa Madarasah</h6>
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
									<td><?= $detail->nama_siswa ?></td>
								</tr>
								<tr>
									<td><b>Tempat Lahir</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tempat_lahir_siswa ?></td>
								</tr>
								<tr>
									<td><b>Jenis Kelamin</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jenis_kelamin ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Lahir</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_lahir_siswa)); ?></td>
								</tr>
								<tr>
									<td><b>NISN</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nisn ?></td>
								</tr>
								<tr>
									<td><b>Kelas</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->kelas ?></td>
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
									<td><b>Nama Sekolah Asal</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_sekolah_asal ?></td>
								</tr>
								<tr>
									<td><b>No. Surat Rek. Sekolah Asal</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_srt_rek_sekolah_asal ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Surat Rek. Sekolah Asal</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_srt_rek_sekolah_asal)); ?></td>
								</tr>
								<tr>
									<td><b>Alasan Pindah</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->alasan_pindah ?></td>
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
						<?php if ($detail->status == 'Pending') { ?>
							<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen dibawah</em>
						<?php } ?>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<div class="float-right">
								<a href="<?= base_url() ?>dashboard/form_ubah_ptsp11/<?= $detail->id_permohonan_ptsp ?>">
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
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-1"></div>
			<div class="col-xs-12 col-sm-3 mr-5">
				<!-- Surat Rekomendasi -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Surat Rekomendasi</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->srt_rekomendasi != null) { ?>
								<p><?= $detail->srt_rekomendasi; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp11/srt_rekomendasi/<?= $detail->srt_rekomendasi ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_rekomendasi == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_srt_rekomendasi_ptsp11/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp11_1">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload">pilih
													file...</label>
												<input type="file" class="custom-file-input" id="file-upload" name="srt_rekomendasi" value="<?= $detail->srt_rekomendasi ?>" required>
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
				<!-- Surat Penerimaan  -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Surat Penerimaan</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->srt_penerimaan != null) { ?>
								<p><?= $detail->srt_penerimaan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp11/srt_penerimaan/<?= $detail->srt_penerimaan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_penerimaan == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_srt_penerimaan_ptsp11/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp11_2">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="srt_penerimaan" value="<?= $detail->srt_penerimaan ?>" required>
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
				<!-- FC Raport Terakhir -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">FC Raport Terakhir</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->raport != null) { ?>
								<p><?= $detail->raport; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp11/raport/<?= $detail->raport ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->raport == null) { ?>
								<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_raport_ptsp11/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp11_3">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-3">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-3" name="raport" value="<?= $detail->raport ?>" required>
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
