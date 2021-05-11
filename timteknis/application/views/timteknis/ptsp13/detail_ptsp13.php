<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	foreach ($detail_ptsp as $detail) { ?>
		<?php if ($detail->status == 'Proses Tim Teknis') { ?>
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
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_selesai_tim_teknis') ?>">Permohonan Selesai Tim Teknis</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } ?>
		<div class="row clearfix">
			<div class="col-md-4 mb-0">
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
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp13/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
				<!-- Proposal -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Proposal</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->proposal != null) { ?>
								<p><?= $detail->proposal; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp13/proposal/<?= $detail->proposal ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->proposal == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>

				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Unggah Berita Acara Verifikasi Dokumen terlebih dahulu untuk menyetujui</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->berita_acara_verifikasi_dok != null) { ?>
								<p><?= $detail->berita_acara_verifikasi_dok; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp13/berita_acara_verifikasi_dok/<?= $detail->berita_acara_verifikasi_dok ?>" target="_blank">

									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->berita_acara_verifikasi_dok == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Proses Tim Teknis') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/upload_berita_acara_verifikasi_dok/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="berita_acara_verifikasi_dok">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="berita_acara_verifikasi_dok" value="">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
												<input type="hidden" class="form-control form-user-input" name="id_layanan" id="file-upload" value="<?= $detail->id_layanan ?>">
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

				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Unggah Berita Acara Verifikasi Lapangan terlebih dahulu untuk menyetujui</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->berita_acara_verifikasi_lap != null) { ?>
								<p><?= $detail->berita_acara_verifikasi_lap; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp13/berita_acara_verifikasi_lap/<?= $detail->berita_acara_verifikasi_lap ?>" target="_blank">

									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->berita_acara_verifikasi_lap == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Proses Tim Teknis') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/upload_berita_acara_verifikasi_lap/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="berita_acara_verifikasi_lap">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="berita_acara_verifikasi_lap" value="">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
												<input type="hidden" class="form-control form-user-input" name="id_layanan" id="file-upload" value="<?= $detail->id_layanan ?>">
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
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Ijin Operasional Lembaga Baru
						</h6>
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
								<?php if ($detail->no_berita_acara_verifikasi_dok != null) { ?>
									<tr>
										<td><b>Nomor Berita Acara Verifikasi Dokumen</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->no_berita_acara_verifikasi_dok ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_berita_acara_verifikasi_dok != null) { ?>
									<tr>
										<td><b>Tanggal Berita Acara Verifikasi Dokumen</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_berita_acara_verifikasi_dok)); ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->no_berita_acara_verifikasi_lap != null) { ?>
									<tr>
										<td><b>Nomor Berita Acara Verifikasi Lapangan</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->no_berita_acara_verifikasi_lap ?></td>
									</tr>
								<?php } ?>
								<?php if ($detail->tgl_berita_acara_verifikasi_lap != null) { ?>
									<tr>
										<td><b>Tanggal Berita Acara Verifikasi Lapangan</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_berita_acara_verifikasi_lap)); ?></td>
									</tr>
								<?php } ?>
								<tr>
									<td><b>Nama Yayasan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_yayasan ?></td>
								</tr>
								<tr>
									<td><b>No. Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_srt_pemohon ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_srt_pemohon)); ?></td>
								</tr>
								<tr>
									<td><b>Hal Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->hal_srt_pemohon ?></td>
								</tr>
								<tr>
									<td><b>Nama Calon Madrasah</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_calon_madrasah ?></td>
								</tr>
								<tr>
									<td><b>Alamat Calon Madrasah</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->alamat_calon_madrasah ?></td>
								</tr>
								<tr>
									<td><b>Nama Calon Penyelenggara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_calon_penyelenggara ?></td>
								</tr>
								<tr>
									<td><b>No. Akte Notaris</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->akte_notaris ?></td>
								</tr>
								<tr>
									<td><b>No. Pengesahan Akte Notaris</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->pengesahan_akte_notaris ?></td>
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
									<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
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
								<?php if ($detail->tgl_persetujuan_tim_teknis != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Tim Teknis</b></td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= format_indo(date($detail->tgl_persetujuan_tim_teknis)); ?></td>
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
				</div>
				<?php if ($detail->status == 'Proses Tim Teknis') { ?>
					<!-- form berita acara -->
					<div class="card shadow mb-4">
						<div class="card-header">
							<center>
								<h6 class="m-0 font-weight-bold">Isi Data Berita Acara terlebih dahulu untuk menyetujui</h6>
							</center>
						</div>
						<div class="card-body">
							<form class="form-horizontal mt-4" id="formba_ptsp13" enctype="multipart/form-data" action="<?= base_url('dashboard/update_data_berita_acara_ptsp13/' . $detail->id_ptsp) ?>" method="POST">
								<div class="form-group row">
									<label for="no_berita_acara_verifikasi_dok" class="col-sm-3 col-form-label">No. Berita Acara
										Verifikasi Dokumen</label>
									<div class="col-sm-8 ml-1">
										<div class="form-line focused">
											<input type="text" class="form-control" id="no_berita_acara_verifikasi_dok" name="no_berita_acara_verifikasi_dok" value="" placeholder="masukkan no berita acara verifikasi dok disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_berita_acara_verifikasi_dok" class="col-sm-3 col-form-label">Tgl. Berita
										Acara
										Verifikasi Dokumen</label>
									<div class="col-sm-8 ml-1">
										<div class="form-line focused">
											<input type="date" class="form-control" id="tgl_berita_acara_verifikasi_dok" name="tgl_berita_acara_verifikasi_dok" value="" required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_berita_acara_verifikasi_lap" class="col-sm-3 col-form-label">No. Berita Acara
										Verifikasi lapangan</label>
									<div class="col-sm-8 ml-1">
										<div class="form-line focused">
											<input type="text" class="form-control" id="no_berita_acara_verifikasi_lap" name="no_berita_acara_verifikasi_lap" value="" placeholder="masukkan no berita acara verifikasi lap disini..." required>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_berita_acara_verifikasi_lap" class="col-sm-3 col-form-label">Tgl. Berita
										Acara
										Verifikasi Lapangan</label>
									<div class="col-sm-8 ml-1">
										<div class="form-line focused">
											<input type="date" class="form-control" id="tgl_berita_acara_verifikasi_lap" name="tgl_berita_acara_verifikasi_lap" value="" required>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
								<input type="hidden" class="form-control form-user-input" name="id_layanan" id="file-upload" value="<?= $detail->id_layanan ?>">

						</div>
						<div class="card-footer">
							<!-- Button Simpan -->
							<div class="row clearfix float-right px-2">
								<div class="float-right">
									<a href="#">
										<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
											<i class="far fa-save nav-icon">
											</i> Simpan
										</button>
									</a>
								</div>
							</div>
						</div>
						</form>
					</div>
				<?php } ?>
			</div>
		</div>


		<!-- Button Tolak & Setujui BA -->
		<div class="row clearfix float-right px-2">
			<?php if ($detail->status == 'Proses Tim Teknis') { ?>
				<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
					<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
					<button id="btn_termia" class="btn btn-sm btn-primary" type="submit">
						<i class="fas fa-check-circle">
						</i> Terima
					</button>
				</a>
			<?php } ?>
		</div>
		<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php } ?>