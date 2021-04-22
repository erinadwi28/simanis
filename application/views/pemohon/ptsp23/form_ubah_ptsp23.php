<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp23/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Mutasi GPAI PNS</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="form_ptsp23" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp23/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="nama_sekolah_satmikal" class="col-sm-3 col-form-label">Nama Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_satmikal" name="nama_sekolah_satmikal"
										value="<?= $detail->nama_sekolah_satmikal ?>" required 
										placeholder="masukkan nama sekolah disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan_sekolah_satmikal" class="col-sm-3 col-form-label">Kecamatan Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan_sekolah_satmikal" name="kecamatan_sekolah_satmikal" 
									 placeholder="masukkan kecamatan sekolah disini..."
									 value="<?= $detail->kecamatan_sekolah_satmikal ?>" required>
								</div>
							</div>
						</div>						
						<div class="form-group row">
							<label for="kabupaten_sekolah_satmikal" class="col-sm-3 col-form-label">Kabupaten Sekolah Satmikal</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_sekolah_satmikal" name="kabupaten_sekolah_satmikal" 
										value="<?= $detail->kabupaten_sekolah_satmikal ?>" required
										placeholder="masukkan Kabupaten Sekolah disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" 
									value="<?= $detail->tgl_srt_permohonan ?>" required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_persetujuan_pengawas_pai" class="col-sm-3 col-form-label">Tgl. srt Persetujuan Pengawas PAI</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tgl_srt_persetujuan_pengawas_pai" name="tgl_srt_persetujuan_pengawas_pai" 
										value="<?= $detail->tgl_srt_persetujuan_pengawas_pai ?>" required
										placeholder="masukkan tgl persetujuan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_pns" class="col-sm-3 col-form-label">Nama PNS</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_pns" name="nama_pns" 
										value="<?= $detail->nama_pns ?>" required
										placeholder="masukkan nama PNS disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nip" class="col-sm-3 col-form-label">NIP</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nip" name="nip"
									 placeholder="masukkan desa disini..."
									 value="<?= $detail->nip ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pangkat_pns" class="col-sm-3 col-form-label">Pangkat PNS</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pangkat_pns" name="pangkat_pns"
									 placeholder="masukkan Pangkat disini..."
									 value="<?= $detail->pangkat_pns ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jabatan" name="jabatan"
									 placeholder="masukkan Jabatan disini..."
									 value="<?= $detail->jabatan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_sekolah_tujuan" class="col-sm-3 col-form-label">Nama Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_sekolah_tujuan" name="nama_sekolah_tujuan"
									 placeholder="masukkan nama sekolah tujuan disini..."
									 value="<?= $detail->nama_sekolah_tujuan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kecamatan_sekolah_tujuan" class="col-sm-3 col-form-label">Kecamatan Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kecamatan_sekolah_tujuan" name="kecamatan_sekolah_tujuan"
									 placeholder="masukkan Pangkat disini..."
									 value="<?= $detail->kecamatan_sekolah_tujuan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten_sekolah_tujuan" class="col-sm-3 col-form-label">Kabupaten Sekolah Tujuan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_sekolah_tujuan" name="kabupaten_sekolah_tujuan"
									 placeholder="masukkan kabupaten sekolah tujuan disini..."
									 value="<?= $detail->kabupaten_sekolah_tujuan ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_mulai_mengajar" class="col-sm-3 col-form-label">Tgl. Mulai mengajar</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_mulai_mengajar" name="tgl_mulai_mengajar" 
									value="<?= $detail->tgl_mulai_mengajar ?>"  >
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
