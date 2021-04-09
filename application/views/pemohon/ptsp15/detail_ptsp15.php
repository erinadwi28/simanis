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
	
	<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Detail input -->
	<div class="row clearfix">
	<!-- Unggah Dokumen -->
	<div class="col-md-4 mb-0">
			<!-- Proposal Permohonan -->
			<div class="card shadow mb-4">
				<div class="card-header">
					<center>
						<h6 class="m-0 font-weight-bold">Proposal Permohonan</h6>
					</center>
				</div>

				<div class="card-body">
					<center>
					<?php if ($detail->proposal_permohonan  != null) { ?>
						<p><?= $detail->proposal_permohonan ; ?></p>
						<a id="btn_upload" class="btn btn-sm btn-primary"
							href="<?= base_url() ?>./assets/dashboard/pemohon/ptsp/ptsp15/proposal_permohonan/<?= $detail->proposal_permohonan ?>"
							target="_blank">
							<i class="fa fa-download nav-icon">
							</i> Klik untuk melihat
						</a>
					<?php } elseif ($detail->proposal_permohonan  == null) { ?>
						<p class="mb-0">Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
					<?php } ?>
					</center>
				</div>
			<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<form action="<?= base_url('dashboard/update_proposal_permohonan_ptsp15/' . $detail->id_ptsp) ?>"
						enctype="multipart/form-data" method="post" accept-charset="utf-8"
						id="form_upload_proposal_permohonan">
						<div class="form-group">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload">pilih
											file...</label>
										<input type="file" class="custom-file-input" id="file-upload"
											name="proposal_permohonan" value="<?= $detail->proposal_permohonan ?>">
										<input type="hidden" class="form-control form-user-input"
											name="id_permohonan_ptsp" id="file-upload"
											value="<?= $detail->id_permohonan_ptsp ?>">
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
		<div class="col-md-8 mb-0">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional Madin</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>No. Surat</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->no_surat ?></td>
							</tr>
							<tr>
								<td><b>Nama Madrasah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama_madrasah ?></td>
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
					<em class="small text-danger float-right mt-2 mb-0">*Pastikan data benar dan Unggah semua dokumen
						dibawah</em>
				</div>
				
			<?php if ($detail->status == 'Pending') { ?>
				<div class="card-footer">
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/form_ubah_ptsp15/<?= $detail->id_permohonan_ptsp ?>">
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