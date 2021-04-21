<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp22/<?= $detail->id_permohonan_ptsp ?>">
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
					<form class="form-horizontal" id="form_ptsp22" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp22/<?= $detail->id_permohonan_ptsp ?>"
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
							<label for="Tipologi" class="col-sm-3 col-form-label">Tipologi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tipologi" name="tipologi"
									 placeholder="masukkan tipologi disini..."
									 value="<?= $detail->tipologi ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
								<label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat" name="alamat" 
										value="" placeholder="masukkan alamat disini..."><?= $detail->alamat ?></textarea>
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
