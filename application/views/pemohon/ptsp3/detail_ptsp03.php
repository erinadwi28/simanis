<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Detail Permohonan Legalisir Ijazah</h3>

	</div>

	<div class="row">
		<div class="col-md-4 mb-4">

			<!-- Foto Profil -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold">Fotocopy Ijazah</h6>
					</center>
				</div>

				<div class="card-body" style="padding: 15px;">
					<center>
						<a href="" data-gallery="mygallery" data-title="Fotocopy Ijazah" data-toggle="lightbox">
							<img src="" alt="foto Ijazah" class="img-fluid" width="150px">
						</a>
					</center>
				</div>

				<div class="card-footer py-3">
					<form action="" enctype="multipart/form-data" method="post"
						accept-charset="utf-8" id="form_upload_ijazah">
						<div class="form-group ml-2 mr-2">
							<div class="input-group">
								<div class="form-group-upload">
									<div class="custom-file">
										<label class="custom-file-label" for="file-upload-ktp">pilih fotocopy ijazah...</label>
										<input type="file" class="custom-file-input" id="file-upload-ktp" name="berkas">
										<input type="hidden" class="form-control form-user-input" name="id_surat" id="id_surat"
											value="">
										<input type="hidden" class="form-control form-user-input" name="id_permohonan_surat"
											id="id_permohonan_surat" value="">
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
				</div>
			</div>
		</div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Ijazah</h6>
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
								<td> </td>
							</tr>
							<tr>
								<td><b>No. Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td><b>Tanggal Permohonan</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td> </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<div class="float-right">
						
						<!-- <a href="<?= base_url() ?>warga/form_ubah_suket005/<?= $w->id_surat ?>"> -->
						<button id=" btn_ubah" class="btn btn-sm btn-primary" type="submit">
							<i class="fa fa-edit nav-icon">
							</i> Ubah
						</button>
						<!-- </a> -->
						<!-- <a href="<?= base_url() ?>warga/update_status_permohonan/<?= $w->id_permohonan_surat ?>/<?= $warga['id_warga'] ?>"> -->
						<button id="btn_selesai" class="btn btn-sm btn-success" type="submit">
							<i class="far fa-save nav-icon">
							</i> Selesai
						</button>
						<!-- </a> -->
					
					</div>
				</div>
			</div>
		</div>


	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
