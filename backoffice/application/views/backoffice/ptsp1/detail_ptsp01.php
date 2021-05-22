<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	foreach ($detail_ptsp as $detail) { ?>
		<?php if ($detail->status == 'Proses BO') { ?>
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
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('dashboard/list_permohonan_selesaiBO') ?>">Permohonan Selesai BO</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
			</div>
		<?php } ?>


		<div class="row clearfix">

			<div class="col-md-4 mb-0">
				<!-- ijazah -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Surat Permohonan</h6>
					</div>

					<!-- DISESUAIKAN BE YA -->
					<div class="card-body">
						<center>
							<?php if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-primary" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp01/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p>Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
				</div>
			</div>

			<div class="col-md-8 mb-0">
				<!-- Detail Data -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rohaniawan dan Petugas Do'a</h6>
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
								<?php if ($detail->jml_lampiran != null) { ?>
									<tr>
										<td><b>Jumlah Lampiran</b></td>
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
									<td><?= $detail->pemohon ?></td>
								</tr>
								<tr>
									<td><b>No HandPhone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_hp ?></td>
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
									<td><b>No Surat Permohonan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->no_srt_permohonan; ?></td>
								</tr>
								<tr>
									<td><b>Hari Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->hari_acara; ?></td>
								</tr>
								<tr>
									<td><b>Tanggal Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= format_indo(date($detail->tgl_acara)); ?></td>
								</tr>
								<tr>
									<td><b>Waktu Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->waktu_acara; ?></td>
								</tr>
								<tr>
									<td><b>Tempat Acara</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->tempat_acara; ?></td>
								</tr>
								<tr>
									<td><b>Jumlah Petugas Do'a</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td> </td>
									<td><?= $detail->jml_petugas_doa; ?></td>
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
								<?php if ($detail->tgl_persetujuan_kasubag != null) { ?>
									<tr>
										<td><b>Tanggal Persetujuan Kasubag TU</b></td>
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
	<?php } ?>

	<!-- Input Petugas Doa -->
	<h5 class="mt-0 mb-4 text-center">Masukkan Data Petugas Do'a sesuai jumlah yang diminta</h5>
	<div class="row clearfix">
		<div class="col-md-6 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">List Petugas Do'a</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Pangkat Do'a</th>
								<th>Jabatan</th>
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<?php if ($detail->status == 'Proses BO') { ?>
										<th>Aksi</th>
									<?php } ?>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data_petugas_doa as $detail) {
							?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $detail->nama_petugas_doa; ?></td>
									<td><?= $detail->nip_petugas_doa; ?></td>
									<td><?= $detail->pangkat_petugas_doa; ?></td>
									<td><?= $detail->jabatan_petugas_doa; ?></td>
									<?php
									foreach ($detail_ptsp as $d) { ?>
										<?php if ($d->status == 'Proses BO') { ?>
											<td class="text-center px-2">
												<a href="<?= base_url() ?>dashboard/hapus_petugas_doa/<?= $detail->id_petugas_doa ?>/<?php foreach ($detail_ptsp as $d) { ?><?= $d->id_permohonan_ptsp; ?><?php } ?>/<?php foreach ($detail_ptsp as $d) { ?><?= $d->id_layanan; ?><?php } ?>" class="btn btn-tolak btn-sm">
													<i class="far fa-trash-alt"></i>
												</a>
											</td>
										<?php } ?>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Form Tambah Petugas Do'a</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formpetugas_ptsp01" enctype="multipart/form-data" action="<?= base_url('dashboard/tambah_petugas_doa') ?>" method="POST">
						<div class="form-group row">
							<label for="nama_petugas_doa" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_petugas_doa" name="nama_petugas_doa" value="" placeholder="masukkan nama disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nip_petugas_doa" class="col-sm-3 col-form-label">NIP</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nip_petugas_doa" name="nip_petugas_doa" value="" placeholder="masukkan NIP disini..." required data-parsley-type="number">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pangkat_doa" class="col-sm-3 col-form-label">Pangkat Do'a</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pangkat_petugas_doa" name="pangkat_petugas_doa" value="" placeholder="masukkan pangkat do'a disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jabatan_petugas_doa" class="col-sm-3 col-form-label">Jabatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jabatan_petugas_doa" name="jabatan_petugas_doa" value="" placeholder="masukkan jabatan disini..." required>
								</div>
							</div>
						</div>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<input type="hidden" class="form-control" id="id_ptsp" name="id_ptsp" value="<?= $detail->id_ptsp ?>">
							<input type="hidden" class="form-control" id="id_permohonan_ptsp" name="id_permohonan_ptsp" value="<?= $detail->id_permohonan_ptsp ?>">
							<input type="hidden" class="form-control" id="id_layanan" name="id_layanan" value="<?= $detail->id_layanan ?>">
						<?php } ?>
						<div class="form-group row px-2 float-right mb-0">
							<?php
							foreach ($detail_ptsp as $detail) { ?>
								<?php if ($detail->status == 'Proses BO') { ?>
									<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
										<i class="far fa-save nav-icon">
										</i> Simpan
									</button>
								<?php } ?>
							<?php } ?>
						</div>
					</form>
				</div>
			</div>

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<?php if ($detail->status == 'Proses BO') { ?>
					<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
						<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
							<i class="fas fa-times-circle">
							</i> Tolak
						</button>
					</a>
					<a href="<?= base_url() ?>dashboard/aksi_update_status_proses_kasubag/<?= $detail->id_permohonan_ptsp ?>">
						<button id="btn_terima" class="btn btn-sm btn-primary" type="submit">
							<i class="fas fa-check-circle">
							</i> Terima
						</button>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->