<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp21/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Arah Ukur Kiblat</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form_ptsp21" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp21/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="Nama_Masjid" class="col-sm-3 col-form-label">Nama Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_masjid" name="nama_masjid"
										value="<?= $detail->nama_masjid ?>" required 
										placeholder="masukkan nama masjid disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Dukuh" class="col-sm-3 col-form-label">Dukuh</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="dukuh" name="dukuh" 
										value="<?= $detail->dukuh ?>" required
										placeholder="masukkan Dukuh disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Rt" class="col-sm-3 col-form-label">RT</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="rt" name="rt" 
										value="<?= $detail->rt ?>" required
										placeholder="masukkan RT disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Rw" class="col-sm-3 col-form-label">RW</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="rw" name="rw" 
										value="<?= $detail->rw ?>" required
										placeholder="masukkan  RW disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="desa" class="col-sm-3 col-form-label">Desa</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="desa" name="desa"
									 placeholder="masukkan desa disini..."
									 value="<?= $detail->desa ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" 
									 placeholder="masukkan kecamatan disini..."
									 value="<?= $detail->kecamatan ?>" required>
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
