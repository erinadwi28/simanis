<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<!-- <a href="<?= base_url('warga') ?>"> -->
		<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
			<i class="fa fa-arrow-left">
			</i> Kembali
		</button>
		<!-- </a> -->
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form6" enctype="multipart/form-data"
						action=""
						method="POST">
						<div class="form-group row">
							<label for="Nama" class="col-sm-3 col-form-label">Nama Jamaah Haji</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama" value="">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="masukkan alamat disini..."></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="" placeholder="masukkan tempat lahir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="" placeholder="masukkan no handpone disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Nama_agen" class="col-sm-3 col-form-label">Nama PPIU/PIHK</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_agen" name="nama_agen" value="" placeholder="masukkan nama PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_sk_agen" class="col-sm-3 col-form-label">No SK PPIU/PIHK</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_sk_agen" name="no_sk_agen" value="" placeholder="masukkan no SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tahun_sk_agen" class="col-sm-3 col-form-label">Tahun SK </label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tahun_sk_agen" name="tahun_sk_agen" value="" placeholder="masukkan tahun SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
				</div>
				<div class="card-footer">
					<a href="#">
						<button id="btn_simpan" class="btn btn-sm btn-primary float-right" type="submit">
							<i class="far fa-save nav-icon">
							</i> Simpan
						</button>
					</a>
				</div>
				</form>
			</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
