<!-- Begin Page Content -->
<div class="container-fluid">

	<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4 judullist">
		<h3>Form Ubah Permohonan</h3>
		<a href="<?= base_url() ?>dashboard/detail_ptsp02/<?= $detail->id_permohonan_ptsp ?>">
			<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
				<i class="fa fa-arrow-left">
				</i> Kembali
			</button>
		</a>
	</div>

	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-xs-12 col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Kegiatan Keagamaan</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formubah_ptsp2" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp02/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="pemohon" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pemohon" name="pemohon" value="<?= $detail->pemohon; ?>"
										placeholder="masukkan nama disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp_aktif" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input class="form-control" id="no_hp" name="no_hp" rows="1"
										placeholder="masukkan no hp disini..." required data-parsley-type="number"
										minlength="11" value="<?= $detail->no_hp; ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat
								Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan"
										name="tgl_srt_permohonan" value="<?= $detail->tgl_srt_permohonan; ?>"
										placeholder="masukkan tgl surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_srt_permohonan" class="col-sm-3 col-form-label">No Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_permohonan"
										name="no_srt_permohonan" value="<?= $detail->no_srt_permohonan; ?>"
										placeholder="masukkan nomor surat permohonan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="hari_kegiatan" class="col-sm-3 col-form-label">Hari Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line">
									<select class="form-control" id="hari_kegiatan" name="hari_kegiatan" required>
										<option selected value="<?= $detail->hari_kegiatan; ?>" class="form-user-input">pilih hari...</option>
										<option value="Senin" class="form-user-input">Senin</option>
										<option value="Selasa" class="form-user-input">Selasa</option>
										<option value="Rabu" class="form-user-input">Rabu</option>
										<option value="Kamis" class="form-user-input">Kamis</option>
										<option value="Jumat" class="form-user-input">Jumat</option>
										<option value="Sabtu" class="form-user-input">Sabtu</option>
										<option value="Minggu" class="form-user-input">Minggu</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_kegiatan" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan"
										value="<?= $detail->tgl_kegiatan; ?>" placeholder="masukkan tgl kegiatan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="waktu_kegiatan" class="col-sm-3 col-form-label">Waktu Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan"
										value="<?= $detail->waktu_kegiatan; ?>" placeholder="contoh: 12.00" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_kegiatan" class="col-sm-3 col-form-label">Tempat Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan"
										value="<?= $detail->tempat_kegiatan; ?>" placeholder="masukkan tempat kegiatan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
										value="<?= $detail->nama_kegiatan; ?>" placeholder="masukkan nama kegiatan disini..." required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jml_peserta" class="col-sm-3 col-form-label">Jumlah Peserta</label>
							<div class="col-sm-9">
								<div class="form-line">
									<input type="number" min="1" class="form-control" id="jml_peserta"
										name="jml_peserta" rows="1" placeholder="masukkan jumlah peserta disini..."
										required data-parsley-type="number" value="<?= $detail->jml_peserta; ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="agenda_kegiatan" class="col-sm-3 col-form-label">Agenda Kegiatan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="agenda_kegiatan" name="agenda_kegiatan"
										value="<?= $detail->agenda_kegiatan; ?>" placeholder="masukkan agenda kegiatan disini..." required>
								</div>
							</div>
						</div>
				</div>
				<div class="card-footer">
					<div class="float-right">
						<a href="#">
							<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
								<i class="far fa-save nav-icon">
								</i> Simpan
							</button>
						</a>
					</div>
				</div>
			</div>
			</form>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
</div>
<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
