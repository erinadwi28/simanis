<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp18/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Rekomendasi Bantuan Masjid</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form5" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp18/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="no_surat_takmir" class="col-sm-3 col-form-label">No. Surat Takmir Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_surat" name="no_surat"
										value="<?= $detail->no_surat ?>" placeholder="masukkan no surat takmir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_masjid" class="col-sm-3 col-form-label">Nama Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_masjid" name="nama_masjid"
										value="<?= $detail->nama_masjid ?>" placeholder="masukkan nama masjid disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_surat_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_surat_permohonan" name="tgl_surat_permohonan" 
									value="<?= $detail->tgl_surat_permohonan ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_ketua_takmir" class="col-sm-3 col-form-label">Nama Ketua Takmir</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_ketua_takmir" name="nama_ketua_takmir"
										value="<?= $detail->nama_ketua_takmir ?>" placeholder="masukkan tempat lahir disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_masjid" class="col-sm-3 col-form-label">Alamat Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<textarea type="text" class="form-control" id="alamat_masjid" name="alamat_masjid" value=""
										placeholder="masukkan alamat masjid disini..."><?= $detail->alamat_masjid ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_id_masjid" class="col-sm-3 col-form-label">No. ID Masjid</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_id_masjid" name="no_id_masjid" 
									value="<?= $detail->no_id_masjid ?>" placeholder="masukkan no ID masjid disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" 
									value="<?= $detail->no_hp ?>" placeholder="masukkan no handpone disini...">
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
