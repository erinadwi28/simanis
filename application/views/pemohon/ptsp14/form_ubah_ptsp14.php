<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4 judullist">
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
		<?php foreach ($detail_ptsp as $detail) { ?>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Ijin Operasional LPQ</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form6" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp14/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="No_Surat" class="col-sm-3 col-form-label">No. Surat</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->no_surat ?>" placeholder="masukkan nomor surat disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Nama_lpq" class="col-sm-3 col-form-label">Nama LPQ</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_lpq" name="nama_lpq" value="<?= $detail->nama_lpq ?>" placeholder="masukkan nama lpq disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail->alamat ?>" placeholder="masukkan alamat disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="desa" class="col-sm-3 col-form-label">Desa</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="desa" name="desa" value="<?= $detail->desa ?>" placeholder="masukkan desa disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $detail->kecamatan ?>" placeholder="masukkan kecamatan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $detail->kabupaten ?>" placeholder="masukkan kabupaten disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $detail->provinsi ?>" placeholder="masukkan provinsi disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="yayasan" class="col-sm-3 col-form-label">Yayasan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="yayasan" name="yayasan" value="<?= $detail->yayasan ?>" placeholder="masukkan yayayan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="sk_menkumham" class="col-sm-3 col-form-label">SK Menkumham RI</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="sk_menkumham" name="sk_menkumham" value="<?= $detail->sk_menkumham ?>" placeholder="masukkan no SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Tahun_berdiri" class="col-sm-3 col-form-label">Tahun Berdiri</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="<?= $detail->tahun_berdiri ?>" placeholder="masukkan tahun SK PPIU/PIHK disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="berlaku" class="col-sm-3 col-form-label">Berlaku</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="berlaku" name="berlaku" value="<?= $detail->berlaku ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_Statistik_Pendidikan_Alquran" class="col-sm-3 col-form-label">No. Statistik Pendidikan Alquran</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_statistik_pend_alquran" name="no_statistik_pend_alquran" value="<?= $detail->no_statistik_pend_alquran ?>" placeholder="masukkan no statistik pendidikan alquran disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>" placeholder="masukkan no handpone disini...">
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
