<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp24/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Rek. Pajak Bendaraan Bermotor Layanan Sosial Rumah Ibadah</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form_ptsp24" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp24/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="jml_roda_kendaraan" class="col-sm-3 col-form-label">Jumlah Roda Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jml_roda_kendaraan" name="jml_roda_kendaraan"
										value="<?= $detail->jml_roda_kendaraan ?>" required 
										placeholder="masukkan jumlah roda disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="merek_kendaraan" class="col-sm-3 col-form-label">Merek Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="merek_kendaraan" name="merek_kendaraan"
									 placeholder="masukkan merek kendaraan disini..."
									 value="<?= $detail->merek_kendaraan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_polisi" class="col-sm-3 col-form-label">No. Polisi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_polisi" name="no_polisi" value="<?= $detail->no_polisi ?>"
									placeholder="masukkan no polisi disini..." required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pemilik_kendaraan" class="col-sm-3 col-form-label">Pemilik Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pemilik_kendaraan" name="pemilik_kendaraan"
									 placeholder="masukkan pemilik kendaraan disini..."
									 value="<?= $detail->pemilik_kendaraan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="fungsional_kendaraan" class="col-sm-3 col-form-label">Fungsional Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="fungsional_kendaraan" name="fungsional_kendaraan"
									 placeholder="masukkan fungsional kendaraan disini..."
									 value="<?= $detail->fungsional_kendaraan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>"
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
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
