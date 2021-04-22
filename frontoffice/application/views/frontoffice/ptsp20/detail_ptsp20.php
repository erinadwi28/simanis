<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail</h1>
			<nav aria-label="breadcrumb" class="nav-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item" aria-current="page"><a
							href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
				</ol>
			</nav>
	</div>

	<div class="row clearfix">
		<div class="col-md-4 mb-0">
			<?php foreach ($detail_ptsp as $detail) { ?>
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
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp20/srt_permohonan/<?= $detail->srt_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->srt_permohonan == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
			<!-- Surat Rekomendasi KUA -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Surat Rekomendasi KUA</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
						<?php if ($detail->surat_rekomendasi != null) { ?>
						<p><?= $detail->surat_rekomendasi; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp20/surat_rekomendasi/<?= $detail->surat_rekomendasi ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
						<?php } elseif ($detail->surat_rekomendasi == null) { ?>
						<p>Belum ada lampiran</p>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<!-- DISESUAIKAN BE YAA DATANYA -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional Majelis Taklim</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Majelis Taklim</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama_majlis_taklim ?></td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->alamat ?></td>
							</tr>
							<tr>
								<td><b>Desa</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->desa ?></td>
							</tr>
							<tr>
								<td><b>Kecamatan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->kecamatan ?></td>
							</tr>
							<tr>
								<td><b>Kabupaten</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->kabupaten ?></td>
							</tr>
							<tr>
								<td><b>Provinsi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->provinsi ?></td>
							</tr>
							<tr>
								<td><b>Tahun Berdiri</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->tahun_berdiri ?></td>
							</tr>
							<tr>
								<td><b>No. Statistik</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nomor_statistik ?></td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_hp ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Button Tolak & Setujui Awal Surat Masuk -->
			<div class="row clearfix float-right px-2">
				<?php if ($detail->status == 'Validasi Kemenag') { ?>
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

			<!-- Button Setujui Final & No Surat -->
			<div class="row clearfix">
				<div class="col-md-12">
					<form class="form-horizontal" id="no_surat_ptsp20" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>/<?= $detail->id_layanan ?>"
						method="POST">
						<div class="input-group mb-3 col-md-6 float-right p-0">
							<input type="text" class="form-control " id="no_surat" name="no_surat"
								value=".../ Kk.11.10/6/BA.01.1/.../2021" required>
							<button class="btn btn-sm btn-primary" type="submit" id="button-addon2"><i
									class="fas fa-check-circle">
								</i> Terima</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
