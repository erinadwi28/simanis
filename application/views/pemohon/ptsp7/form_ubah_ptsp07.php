<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
				<a href="<?= base_url() ?>dashboard/detail_ptsp07/<?= $detail->id_permohonan_ptsp ?>">
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Izin Pendirian KBIHU</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="formubah_ptsp07" enctype="multipart/form-data" 
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp07/<?= $detail->id_permohonan_ptsp ?>" method="POST">
							<div class="form-group row">
								<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?= $detail->nama_pemohon; ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_yayasan" class="col-sm-3 col-form-label">Nama Yayasan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_yayasan" name="nama_yayasan" value="<?= $detail->nama_yayasan; ?>" placeholder="masukkan nama yayasan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_kelompok_bimbingan" class="col-sm-3 col-form-label">Nama Kelompok Bimbingan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_kelompok_bimbingan" name="nama_kelompok_bimbingan" value="<?= $detail->nama_kelompok_bimbingan; ?>" placeholder="masukkan nama kel.bimbingan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="domisili_kelompok_bimbingan" class="col-sm-3 col-form-label">Domisili Kelompok Bimbingan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="domisili_kelompok_bimbingan" name="domisili_kelompok_bimbingan" value="" placeholder="masukkan domisili kel.bimbingan disini..."
										required><?= $detail->domisili_kelompok_bimbingan; ?></textarea>
									</div>
								</div>
							</div>							
							<div class="form-group row">
								<label for="alamat_kantor" class="col-sm-3 col-form-label">Alamat Kantor</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<textarea type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" value="" placeholder="masukkan alamat kantor disini..."
										required><?= $detail->alamat_kantor; ?></textarea>
									</div>
								</div>
							</div>							
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp; ?>"
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