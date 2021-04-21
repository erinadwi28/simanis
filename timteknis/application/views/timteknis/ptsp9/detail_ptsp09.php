<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan
						Masuk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>

	<?php foreach ($detail_ptsp as $detail) { ?>
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-md-8 mb-4">
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU</h6>
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
								<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
							</tr>
							<?php if ($detail->tgl_persetujuan_fo != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Front Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_fo)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_bo != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Back Office</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_bo)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_kasi != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Kasi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_kasi)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->tgl_persetujuan_kasubag != null) { ?>
							<tr>
								<td><b>Tanggal Persetujuan Kasubag</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
							</tr>
							<?php } ?>
							<?php if ($detail->keterangan != null && $detail->status != 'Selesai') { ?>
							<tr>
								<td><b>Keterangan Permohonan Pending</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->keterangan; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2"></div>
	</div>

	<!-- Unggah dokumen -->
	<div class="row clearfix">
		<!-- Surat Permohonan -->
		<div class="col-xs-12 col-sm-3">
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
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
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

		<!-- Akte Notaris -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Akte Notaris</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">

							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Izin usaha pendirian perjalanan wisata -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Izin usaha pendirian perjalanan wisata</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->ktp != null) { ?>
						<p><?= $detail->ktp; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/<?= $detail->ktp ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->ktp == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Surat Keterangan Domisili Usaha -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Keterangan Domisili Usaha</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->bukti_pelunasan != null) { ?>
						<p><?= $detail->bukti_pelunasan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/<?= $detail->bukti_pelunasan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->bukti_pelunasan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<!-- NPWP Perusahaan dan Pimpinan -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">NPWP Perusahaan dan Pimpinan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_permohonan != null) { ?>
						<p><?= $detail->srt_permohonan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
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

		<!-- Surat Rekomendasi dari Instansi Pemkab setempat -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Rekomendasi dari Instansi Pemkab setempat</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">

							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Laporan keuangan perusahaan yang sehat selama 1 tahun terakhir -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Laporan keuangan perusahaan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Susunan Pengurus Perusahaan -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Susunan Pengurus Perusahaan</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<!-- Data Pemegang Saham -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Data Pemegang Saham</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->srt_permohonan != null) { ?>
						<p><?= $detail->srt_permohonan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
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

		<!-- Anggota direksi dan komisaris -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Anggota Direksi dan Komisaris</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

		<!-- Berita Acara -->
		<div class="col-xs-12 col-sm-3">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Berita Acara</h6>
					</center>
				</div>
				<div class="card-body">
					<center>
						<?php if ($detail->srt_pernyataan != null) { ?>
						<p><?= $detail->srt_pernyataan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_pernyataan == null) { ?>
						<p class="mb-0">Belum ada</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
	</div>

	<!-- Unggah Berita Acara -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-6"></div>
		<div class="col-xs-12 col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Unggah Berita Acara terlebih dahulu untuk menyetujui</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->bukti_pelunasan != null) { ?>
						<p><?= $detail->bukti_pelunasan; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/<?= $detail->bukti_pelunasan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->bukti_pelunasan == null) { ?>
						<p class="mb-0">Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>

				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_srt_permohonan_ptsp05/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formupload_ptsp07_1">
						<div class="input-group px-4">
							<div class="custom-file">
								<label class="custom-file-label" for="file-upload">pilih
									file...</label>
								<input type="file" class="custom-file-input" id="file-upload" name="srt_permohonan"
									value="<?= $detail->srt_permohonan ?>" required>
								<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp"
									id="file-upload" value="<?= $detail->id_permohonan_ptsp ?>">
							</div>
							<div class="input-group-append">
								<button class="btn btn-sm btn-primary" type="submit" id="inputGroupFileAddon04">
								<i class="fa fa-upload"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Button Tolak & Setujui Awal Surat Masuk -->
	<div class="row clearfix float-right px-2">
		<?php if ($detail->status == 'Validasi Kemenag') { ?>
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
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
