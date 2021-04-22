<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Permohonan</h1>
			<nav aria-label="breadcrumb" class="nav-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item" aria-current="page"><a
							href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
			</nav>
	</div>

	<!-- Detail Surat -->
	<div class="row clearfix">
		<div class="col-md-4 mb-4">
			<?php
			foreach ($detail_ptsp as $detail) { ?>
			<!-- ijazah -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Surat Permohonan</h6>
				</div>

				<!-- DISESUAIKAN BE YA -->
				<div class="card-body">
					<center>
						<?php if ($detail->ijazah != null) { ?>
						<p><?= $detail->ijazah; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp03/<?= $detail->ijazah ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($sm->lampiran == null) { ?>
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
								<td><?= $detail->tgl_srt_permohonan; ?></td>
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
								<td><?= $detail->tgl_acara; ?></td>
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

							<!-- DINAMIS MENYESUAIKAN JUMLAH PETUGAS DOA -->
							<tr>
								<td><b>Nama Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama_petugas_doa; ?></td>
							</tr>
							<tr>
								<td><b>NIP Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nip_petugas_doa; ?></td>
							</tr>
							<tr>
								<td><b>Pangkat Doa Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->pangkat_doa; ?></td>
							</tr>
							<tr>
								<td><b>Jabatan Petugas Do'a 1</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->jabatan_petugas_doa; ?></td>
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
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>Aku Erina Dwi Utami</td>
								<td>123456789</td>
								<td>pangkat doa</td>
								<td>sekretaris 1</td>
								<td class="text-center px-2">
									<a href="" class="btn btn-tolak btn-sm">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
							</tr>
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
					<form class="form-horizontal" id="formpetugas_ptsp01" enctype="multipart/form-data" action=""
						method="POST">
						<div class="form-group row">
							<label for="nama_petugas_doa" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_petugas_doa"
										name="nama_petugas_doa" value="" placeholder="masukkan nama disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nip_petugas_doa" class="col-sm-3 col-form-label">NIP</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nip_petugas_doa" name="nip_petugas_doa"
										value="" placeholder="masukkan NIP disini..." required data-parsley-type="number">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pangkat_doa" class="col-sm-3 col-form-label">Pangkat Do'a</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pangkat_doa" name="pangkat_doa" value=""
										placeholder="masukkan pangkat do'a disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jabatan_petugas_doa" class="col-sm-3 col-form-label">Jabatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jabatan_petugas_doa"
										name="jabatan_petugas_doa" value="" placeholder="masukkan jabatan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row px-2 float-right mb-0">
							<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
								<i class="far fa-save nav-icon">
								</i> Simpan
							</button>
						</div>
					</form>
				</div>
			</div>

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<?php if ($detail->status == 'Proses BO') { ?>
				<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>"
					class="mr-2">
					<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
						<i class="fas fa-times-circle">
						</i> Tolak
					</button>
				</a>
				<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
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
