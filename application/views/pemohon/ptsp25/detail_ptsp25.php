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

	
	<!-- Detail input -->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<?php foreach ($detail_ptsp as $detail) { ?>
		<div class="col-md-8 mb-2">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Konsultasi dan informasi sertifikasi halal,zakat dan wakaf</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama ?></td>
							</tr>
							<tr>
								<td><b>Alamat</b> </td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->alamat ?></td>
							</tr>
							<tr>
								<td><b>Pekerjaan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->pekerjaan ?></td>
							</tr>
							<tr>
								<td><b>No.handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_hp ?></td>
							</tr>
							<tr>
								<td><b>Perihal Konsultasi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->perihal_konsultasi ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= format_indo(date($detail->tgl_permohonan)); ?></td>
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
					<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen dibawah</em>
				</div>

				<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/form_ubah_ptsp25/<?= $detail->id_permohonan_ptsp ?>">
							<button id=" btn_ubah" class="btn btn-sm btn-warning" type="submit">
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
