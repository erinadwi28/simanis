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
			<div class="col-xs-12 col-sm-2"></div>
			<div class="col-md-8 mb-4">
				<!-- Detail Data -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Perpanjang Operasional <br>
							Penyelengara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)
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
								<tr>
									<td><b>Nama Pemohon</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_pemohon ?></td>
								</tr>
								<tr>
									<td><b>Nama Perusahaan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_pt ?></td>
								</tr>
								<tr>
									<td><b>Nama Kantor Cabang</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->nama_kantor_cabang ?></td>
								</tr>
								<tr>
									<td><b>Domisili Kantor Cabang</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->domisili_kantor_cabang ?></td>
								</tr>
								<tr>
									<td><b>Alamat Kantor Cabang</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->alamat_kantor_cabang ?></td>
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
			</div>
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
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- SK -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">SK PPIU yang masih berlaku</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->sk != null) { ?>
								<p><?= $detail->sk; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/sk/<?= $detail->sk ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->sk == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- Akte Notaris -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Akte Notaris</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->akte_notaris != null) { ?>
								<p><?= $detail->akte_notaris; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/akte_notaris/<?= $detail->akte_notaris ?>" target="_blank">

									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->akte_notaris == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- SuKet. Izin Usaha -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">SuKet. Izin Usaha</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->izin_usaha != null) { ?>
								<p><?= $detail->izin_usaha; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/izin_usaha/<?= $detail->izin_usaha ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->izin_usaha == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-3">
				<!-- SuKet. Domisili Usaha -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">SuKet. Domisili Usaha</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->skud != null) { ?>
								<p><?= $detail->skud; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/skud/<?= $detail->skud ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->skud == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- NPWP -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">NPWP</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->npwp != null) { ?>
								<p><?= $detail->npwp; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/npwp/<?= $detail->npwp ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->npwp == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- SuRek. PEMKAB -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">SuRek. PEMKAB</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->srt_rekomendasi_pemkab != null) { ?>
								<p><?= $detail->srt_rekomendasi_pemkab; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/srt_rekomendasi_pemkab/<?= $detail->srt_rekomendasi_pemkab ?>" target="_blank">

									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_rekomendasi_pemkab == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- Laporan Keuangan -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Laporan Keuangan</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->laporan_keuangan != null) { ?>
								<p><?= $detail->laporan_keuangan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/laporan_keuangan/<?= $detail->laporan_keuangan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->laporan_keuangan == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>

		</div>
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-3">
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- Susunan Pengurus -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Susunan Pengurus</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->susunan_pengurus != null) { ?>
								<p><?= $detail->susunan_pengurus; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/susunan_pengurus/<?= $detail->susunan_pengurus ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->susunan_pengurus == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3">
				<!-- Bukti Pemberangkatan -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Bukti Pemberangkatan</h6>
						</center>
					</div>
					<div class="card-body">
						<center>
							<?php if ($detail->bukti_pemberangkatan != null) { ?>
								<p><?= $detail->bukti_pemberangkatan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/bukti_pemberangkatan/<?= $detail->bukti_pemberangkatan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->bukti_pemberangkatan == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>

			<!-- Unggah Berita Acara -->

			<div class="col-xs-12 col-sm-3">
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Unggah Berita Acara terlebih dahulu untuk menyetujui</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->berita_acara != null) { ?>
								<p><?= $detail->berita_acara; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp10/berita_acara/<?= $detail->berita_acara ?>" target="_blank">

									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->berita_acara == null) { ?>
								<p class="mb-0">Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
					<?php if ($detail->status == 'Proses Tim Teknis') { ?>
						<div class="card-footer">
							<form action="<?= base_url('dashboard/upload_berita_acaraptsp10/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_berita_acara_10">
								<div class="form-group">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-2">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload-2" name="berita_acara" value="" required>
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
		</div>

		<!--End Content Profile-->
</div>
<!-- Button Tolak & Setujui Awal Surat Masuk -->
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

<?php } ?>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
