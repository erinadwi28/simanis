<!-- Begin Page Content -->
<div class="container-fluid">

	<?php foreach ($detail_ptsp as $detail) { ?>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4 judullist">
			<h3>Form Ubah Permohonan</h3>
			<a href="<?= base_url() ?>dashboard/detail_ptsp01/<?= $detail->id_permohonan_ptsp ?>">
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
						<h6 class="m-0 font-weight-bold text-center">Permohonan Rohaniawan dan Petugas Do'a</h6>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="formubah_ptsp01" enctype="multipart/form-data" action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp01/<?= $detail->id_permohonan_ptsp ?>" method="POST">
							<div class="form-group row">
								<label for="pemohon" class="col-sm-3 col-form-label">Nama</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="pemohon" name="pemohon" value="<?= $detail->pemohon ?>" placeholder="masukkan nama disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-3 col-form-label">No. Handphone</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $detail->no_hp ?>" placeholder="masukkan no handphone disini..." required data-parsley-type="number" minlength="11">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_srt_permohonan" class="col-sm-3 col-form-label">Tanggal Surat
									Permohonan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" value="<?= $detail->tgl_srt_permohonan ?>" placeholder="masukkan tgl surat permohonan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_srt_permohonan" class="col-sm-3 col-form-label">No Surat Permohonan</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="no_srt_permohonan" name="no_srt_permohonan" value="<?= $detail->no_srt_permohonan ?>" placeholder="masukkan nomor surat permohonan disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_acara" class="col-sm-3 col-form-label">Nama Acara</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="nama_acara" name="nama_acara" value="<?= $detail->nama_acara ?>" placeholder="masukkan nama acara disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="hari_acara" class="col-sm-3 col-form-label">Hari Acara</label>
								<div class="col-sm-9">
									<div class="form-line">
										<select class="form-control" id="hari_acara" name="hari_acara" required>
											<option value="Senin" <?= ($detail->hari_acara == 'Senin' ? ' selected' : ''); ?> class="form-user-input">Senin</option>
											<option value="Selasa" <?= ($detail->hari_acara == 'Selasa' ? ' selected' : ''); ?> class="form-user-input">Selasa</option>
											<option value="Rabu" <?= ($detail->hari_acara == 'Rabu' ? ' selected' : ''); ?> class="form-user-input">Rabu</option>
											<option value="Kamis" <?= ($detail->hari_acara == 'Kamis' ? ' selected' : ''); ?> class="form-user-input">Kamis</option>
											<option value="Jumat" <?= ($detail->hari_acara == 'Jumat' ? ' selected' : ''); ?> class="form-user-input">Jumat</option>
											<option value="Sabtu" <?= ($detail->hari_acara == 'Sabtu' ? ' selected' : ''); ?> class="form-user-input">Sabtu</option>
											<option value="Minggu" <?= ($detail->hari_acara == 'Minggu' ? ' selected' : ''); ?> class="form-user-input">Minggu</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_acara" class="col-sm-3 col-form-label">Tanggal Acara</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="date" class="form-control" id="tgl_acara" name="tgl_acara" value="<?= $detail->tgl_acara ?>" placeholder="masukkan tgl acara disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="waktu_acara" class="col-sm-3 col-form-label">Waktu Acara</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="waktu_acara" name="waktu_acara" value="<?= $detail->waktu_acara ?>" placeholder="contoh: 12.00" required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_acara" class="col-sm-3 col-form-label">Tempat Acara</label>
								<div class="col-sm-9">
									<div class="form-line focused">
										<input type="text" class="form-control" id="tempat_acara" name="tempat_acara" value="<?= $detail->tempat_acara ?>" placeholder="masukkan tempat acara disini..." required>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="Jml_petugas_doa" class="col-sm-3 col-form-label">Jumlah Petugas Do'a</label>
								<div class="col-sm-9">
									<div class="form-line">
										<input type="text" min="1" max="5" class="form-control" id="Jml_petugas_doa" name="Jml_petugas_doa" rows="1" value="<?= $detail->jml_petugas_doa ?>" placeholder="masukkan jumlah petugas disini..." required data-parsley-type="number">

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