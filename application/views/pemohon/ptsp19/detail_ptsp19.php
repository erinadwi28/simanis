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
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_validasi_kemenag') ?>">Permohonan Proses
								Kemenag</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
					<?php } elseif ($detail->status == 'Selesai') { ?>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesai') ?>">Permohonan
								Selesai</a></li>
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
							<?php if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp19/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
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
							<form action="<?= base_url('dashboard/update_srt_permohonan_ptsp19/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp19_1">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload col-md-12">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan" value="<?= $detail->srt_permohonan ?>" required>
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
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

				<!-- Upload Jadwal dan Ketentuan Siaran -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<center>
							<h6 class="m-0 font-weight-bold">Jadwal dan Ketentuan Siaran</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->jadwal_siaran != null) { ?>
								<p><?= $detail->jadwal_siaran; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp19/jadwal_siaran/<?= $detail->jadwal_siaran ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->jadwal_siaran == null) { ?>
								<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
							<?php } ?>
						</center>
					</div>

					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/update_jadwal_siaran_ptsp19/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp19_2">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload col-md-12">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="jadwal_siaran" value="<?= $detail->jadwal_siaran ?>" required>
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Petugas Siaran Keagamaan</h6>
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
								<?php if ($detail->sifat != null) { ?>
									<tr>
										<td><b>Sifat</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->sifat ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->no_surat_tugas != null) { ?>
									<tr>
										<td><b>Nomor Surat Tugas</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->no_surat_tugas ?></td>
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
									<td><b>Nama Studio</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_studio ?></td>
								</tr>
								<tr>
									<td><b>Kabupaten Studio</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->kabupaten_studio ?></td>
								</tr>
								<tr>
									<td><b>No. Surat Petugas Siaran Keagamaan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_srt_permohonan ?></td>
								</tr>
								<tr>
									<td><b>Tgl. Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_srt_permohonan)); ?></td>
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
									<td><b>Bulan Siaran</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->bln_siaran ?></td>
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
							<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen disamping/em>
						<?php } ?>
					</div>

					<?php if ($detail->status == 'Pending') { ?>
						<div class="card-footer">
							<div class="float-right">
								<a href="<?= base_url() ?>dashboard/form_ubah_ptsp19/<?= $detail->id_permohonan_ptsp ?>">
									<button id="btn_ubah" class="btn btn-sm btn-warning" type="submit">
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