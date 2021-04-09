<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
				<a href="<?= base_url() ?>dashboard/detail_ptsp26/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru , Haji</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form5" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp26/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="Nama" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama" value="<?= $detail->nama; ?>">
									
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="masukkan alamat disini..."><?= $detail->alamat ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $detail->pekerjaan ?>" placeholder="masukkan Pekerjaan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp_aktif" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tujuan_permohonan" class="col-sm-3 col-form-label">Tujuan permohonan data</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tujuan_permohonan_data" name="tujuan_permohonan_data" value="<?= $detail->tujuan_permohonan_data ?>" placeholder="masukkan Permohonan data disini...">
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
