<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
				<a href="">
		<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
			<i class="fa fa-arrow-left">
			</i> Kembali
		</button>
		</a>
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
			<div class="col-xs col-sm-8">
				<div class="card shadow mb-5">
					<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Perpanjang Operasional <br>
					Penyelengara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)
				</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="formubah_ptsp10" enctype="multipart/form-data" 
						action="" method="POST">
						<div class="form-group row">
								<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Pemohon</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value=""	placeholder="masukkan nama pemohon disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_pt" class="col-sm-3 col-form-label">Nama PT</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pt" name="nama_pt" value="" placeholder="masukkan nama pt disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_kantor_cabang" class="col-sm-3 col-form-label">Nama Kantor Cabang</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_kantor_cabang" name="nama_kantor_cabang" value="" placeholder="masukkan nama kantor cabang disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat_kantor_cabang" class="col-sm-3 col-form-label">Alamat Kantor Cabang</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat_kantor_cabang" name="alamat_kantor_cabang" value="" placeholder="masukkan alamat kantor cabang disini..."
										required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value=""
										placeholder="masukkan no hp disini..." 
										required data-parsley-type="number" minlength="11">
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