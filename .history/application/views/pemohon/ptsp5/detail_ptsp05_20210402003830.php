<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Detail Permohonan Surat Keterangan Haji Pertama</h3>

	</div>

	<div class="row">
		<div class="col-md-3 mb-4 ml-5" >
			<?php
			foreach ($detail_ptsp as $detail) { ?>
				<!-- Surat Permohonan -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<center>
							<h6 class="m-0 font-weight-bold">Dokumen Surat Permohonan</h6>
						</center>
					</div>

					<div class="card-body" style="padding: 15px;">
						<center>
								<?php if ($detail->srt_permohonan != null) { ?>
								<p><?= $detail->srt_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>assets/dashboard/pemohon/ptsp/ptsp05/<?= $detail->srt_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
								<?php } elseif ($detail->srt_permohonan == null) { ?>
								<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
								<?php }?>
				
						</center>
					</div>
					<div class="card-footer py-3">
						<?php if ($detail->status == 'Pending') { ?>
							<form action="<?= base_url('dashboard/update_dokumen_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_srt_permohonan">
								<div class="form-group ml-4 mr-2">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-srt_permohonan">pilih file dokumen...</label>
												<input type="file" class="custom-file-input" id="file-upload-surat-permohonan" name="srt_permohonan" value="<?= $detail->srt_permohonan ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="id_permohonan_ptsp" value="<?= $detail->id_permohonan_ptsp ?>">
												<!-- <i class=" fas fa-exclamation-circle"></i>
										<h6>Error massage</h6> -->
											</div>
										</div>
									</div>
								</div>
								<center>
									<button class="btn btn-sm btn-primary" type="submit">
										<i class="fa fa-upload">
										</i> Upload
									</button>
								</center>
							</form>
						<?php } ?> 
					</div>
				</div>
				<!-- Surat Pernyataan -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<center>
							<h6 class="m-0 font-weight-bold">Dokumen Surat Pernyataan</h6>
						</center>
					</div>

					<div class="card-body" style="padding: 15px;">
						<center>
								<?php if ($detail->srt_pernyataan != null) { ?>
								<p><?= $detail->srt_pernyataan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>assets/dashboard/pemohon/ptsp/ptsp05/<?= $detail->srt_pernyataan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
								<?php } elseif ($detail->srt_pernyataan == null) { ?>
								<p>Belum ada lampiran <br> Silahkan unggah terlebih dahulu</p>
								<?php }?>
				
						</center>
					</div>
					<div class="card-footer py-3">
						<?php if ($detail->status == 'Pending') { ?>
							<form action="<?= base_url('dashboard/update_dokumen_ptsp05/' . $detail->id_ptsp) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_srt_pernyataan">
								<div class="form-group ml-4 mr-2">
									<div class="input-group">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload-srt-pernyataan">pilih file dokumen...</label>
												<input type="file" class="custom-file-input" id="file-upload-surat-pernyataan" name="srt_pernyataan" value="<?= $detail->srt_pernyataan ?>">
												<input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="id_permohonan_ptsp" value="<?= $detail->id_permohonan_ptsp ?>">
												<!-- <i class=" fas fa-exclamation-circle"></i>
										<h6>Error massage</h6> -->
											</div>
										</div>
									</div>
								</div>
								<center>
									<button class="btn btn-sm btn-primary" type="submit">
										<i class="fa fa-upload">
										</i> Upload
									</button>
								</center>
							</form>
						<?php } ?> 
					</div>
				</div>
		</div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
				</div>
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>Nama Lengkap</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nama ?></td>
							</tr>
							<tr>
								<td><b>Tempat Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->tempat_lahir ?></td>
							</tr>
							<tr>
								<td><b>Tanggal Lahir</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= format_indo(date($detail->tanggal_lahir)); ?></td>
							</tr>
							<tr>
								<td><b>Alamat Lengkap</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->alamat ?></td>
							</tr>
							<tr>
								<td><b>No. Porsi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->nomor_porsi ?></td>
							</tr>
							<tr>
								<td><b>Tahun Angkatan Haji Hijriah</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->tahun_hijriah ?></td>
							</tr>
							<tr>
								<td><b>Tahun Angkatan Haji Masehi</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td><?= $detail->tahun_masehi ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="card-footer">
					<div class="float-right">
							<a href="">
								<button id=" btn_ubah" class="btn btn-sm btn-primary" type="submit">
									<i class="fa fa-edit nav-icon">
									</i> Ubah
								</button>
							</a>
							<a href="">
								<button id="btn_selesai" class="btn btn-sm btn-success" type="submit">
									<i class="far fa-save nav-icon">
									</i> Selesai
								</button>
							</a>
					</div>
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