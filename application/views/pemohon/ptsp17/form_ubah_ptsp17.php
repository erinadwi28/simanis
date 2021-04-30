<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp17/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Permohonan Tambahan Jam Mengajar Guru</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formubah_ptsp11" enctype="multipart/form-data" 
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp17/<?= $detail->id_permohonan_ptsp ?>" method="POST">
						<div class="form-group row">
								<label for="nama_pns" class="col-sm-3 col-form-label">Nama PNS</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_pns" name="nama_pns" 
										value="<?= $detail->nama_pns ?>" placeholder="masukkan nama pns disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat Permohonan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" 
										value="<?= $detail->tgl_srt_permohonan ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan" name="kecamatan" 
										value="<?= $detail->kecamatan ?>" placeholder="masukkan kecamatan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_satmikal" class="col-sm-3 col-form-label">Nama Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_satmikal" name="nama_sekolah_satmikal" 
										value="<?= $detail->nama_sekolah_satmikal ?>" placeholder="masukkan nama sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan_sekolah_satmikal" class="col-sm-3 col-form-label">Kecamatan Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan_sekolah_satmikal" name="kecamatan_sekolah_satmikal" 
										value="<?= $detail->kecamatan_sekolah_satmikal ?>" placeholder="masukkan kecamatan sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kabupaten_sekolah_satmikal" class="col-sm-3 col-form-label">Kabupaten Sekolah Satminkal</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kabupaten_sekolah_satmikal" name="kabupaten_sekolah_satmikal" 
										value="<?= $detail->kabupaten_sekolah_satmikal ?>" placeholder="masukkan keabupaten sekolah satminkal disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-sm-3 col-form-label">Agama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="agama" name="agama" 
										value="<?= $detail->agama ?>" placeholder="masukkan agama disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-3 col-form-label">Nip</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nip" name="nip" 
										value="<?= $detail->nip ?>" placeholder="masukkan nip disini..." required data-parsley-type="number" minlength="16">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Golongan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol" 
										value="<?= $detail->pangkat_gol ?>" placeholder="masukkan pangkat/golongan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="jabatan" name="jabatan" 
										value="<?= $detail->jabatan ?>" placeholder="masukkan jabatan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Nama Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan" 
										value="<?= $detail->nama_sekolah_tujuan ?>" placeholder="masukkan nama sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kecamatan_sekolah_tujuan" class="col-sm-3 col-form-label">Kecamatan Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kecamatan_sekolah_tujuan" name="kecamatan_sekolah_tujuan" 
										value="<?= $detail->kecamatan_sekolah_tujuan ?>" placeholder="masukkan kecamatan sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="kabupaten_sekolah_tujuan" class="col-sm-3 col-form-label">Kabupaten Sekolah Tujuan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="kabupaten_sekolah_tujuan" name="kabupaten_sekolah_tujuan" 
										value="<?= $detail->kabupaten_sekolah_tujuan ?>" placeholder="masukkan keabupaten sekolah tujuan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_mulai_mengajar" class="col-sm-3 col-form-label">Tanggal Mulai Mengajar</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_mulai_mengajar" name="tgl_mulai_mengajar" 
										value="<?= $detail->tgl_mulai_mengajar ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" 
										value="<?= $detail->no_hp ?>" placeholder="masukkan no hp disini..." required data-parsley-type="number" minlength="11">
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
