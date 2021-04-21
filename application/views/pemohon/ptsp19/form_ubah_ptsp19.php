<!-- Begin Page Content -->
<div class="container-fluid">

<?php foreach ($detail_ptsp as $detail) { ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
		<h3>Form Ubah Permohonan</h3>
				<a href="<?= base_url() ?>dashboard/detail_ptsp19/<?= $detail->id_permohonan_ptsp ?>">
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
					<h6 class="m-0 font-weight-bold text-center">Petugas Siaran Keagamaan</h6>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="formubah_ptsp03" enctype="multipart/form-data"
						action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp19/<?= $detail->id_permohonan_ptsp ?>"
						method="POST">
						<div class="form-group row">
							<label for="Nama_Studio" class="col-sm-3 col-form-label">Nama Studio</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_studio" name="nama_studio"
										value="<?= $detail->nama_studio ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten_Studio" class="col-sm-3 col-form-label">Kabupaten Studio</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_studio" name="kabupaten_studio" 
									placeholder="masukkan kabupaten disini..."
									value="<?= $detail->kabupaten_studio ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_surat_takmir" class="col-sm-3 col-form-label">No. Surat Petugas Siaran Keagamaan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_permohonan" name="no_srt_permohonan"
									 value="<?= $detail->no_srt_permohonan ?>" 
									 required placeholder="masukkan no surat petugas siaran disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_surat_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" 
									value="<?= $detail->tgl_srt_permohonan ?>" required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Agama" class="col-sm-3 col-form-label">Agama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="agama" name="agama" 
									placeholder="masukkan Agama disini..."
									value="<?= $detail->agama ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Bulan_Siaran" class="col-sm-3 col-form-label">Bulan Siaran</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="bln_siaran" name="bln_siaran" 
									value="<?= $detail->bln_siaran ?>" required  placeholder="masukkan Bulan disini...">
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
					<div class="float-right">
						<a href="#">
							<button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
								<i class="far fa-save nav-icon">
								</i> Simpan
							</button>
						</a>
					</div>
				</div>
				</form>
			</div>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
</div>
<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
