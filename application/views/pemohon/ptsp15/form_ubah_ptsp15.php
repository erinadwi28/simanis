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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Ijin Operasional Madin</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form15" enctype="multipart/form-data"
						action=""
						method="POST">
						<div class="form-group row">
							<label for="Nama_madarasah" class="col-sm-3 col-form-label">Nama Madrasah</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_madarasah" name="nama_madarasah" value="Ambil data">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="masukkan alamat disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="desa" class="col-sm-3 col-form-label">Desa</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="desa" name="desa" value="" placeholder="masukkan desa disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" placeholder="masukkan kecamatan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten" name="kabupaten" value="" placeholder="masukkan kabupaten disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="provinsi" name="provinsi" value="" placeholder="masukkan provinsi disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tahun_berdiri" class="col-sm-3 col-form-label">Tahun Berdiri</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="" placeholder="masukkan tahun SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_statistik" class="col-sm-3 col-form-label">No. Statistik</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_statistik" name="no_statistik" value="" placeholder="masukkan nomor statistik disini...">
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
