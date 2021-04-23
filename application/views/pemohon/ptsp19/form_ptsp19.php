<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp19') ?>">SOP</a></li>
				<li class="breadcrumb-item active" aria-current="page">Form Permohonan</li>
			</ol>
		</nav>
	</div>

	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<?php foreach ($detail_profil_saya as $detail) { ?>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-center">Petugas Siaran Keagamaan</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp19" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp19') ?>" method="POST">
						<div class="form-group row">
							<label for="Nama_Studio" class="col-sm-3 col-form-label">Nama Studio</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama_studio" name="nama_studio"
									value="" required
									placeholder="masukkan Nama Studio disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kabupaten_Studio" class="col-sm-3 col-form-label">Kabupaten Studio</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="kabupaten_studio" name="kabupaten_studio" 
									placeholder="masukkan kabupaten disini..."
									value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_surat_takmir" class="col-sm-3 col-form-label">No. Surat Petugas Siaran Keagamaan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_srt_permohonan" name="no_srt_permohonan"
									 value=""  required placeholder="masukkan no surat petugas siaran disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_surat_permohonan" class="col-sm-3 col-form-label">Tgl. Surat Permohonan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="date" class="form-control" id="tgl_srt_permohonan" name="tgl_srt_permohonan" 
									value="" required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Agama" class="col-sm-3 col-form-label">Agama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="agama" name="agama" 
									placeholder="masukkan Agama disini..."
									value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="Bulan_Siaran" class="col-sm-3 col-form-label">Bulan Siaran</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="bln_siaran" name="bln_siaran" 
									value="" required  placeholder="masukkan Bulan disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" 
									value="" placeholder="masukkan no handpone disini...">
								</div>
							</div>
						</div>	
				</div>
				<?php } ?>
				<div class="card-footer">
					<a href="#">
						<button id="btn_simpan" class="btn btn-sm btn-buat float-right" type="submit">
							<i class="far fa-save nav-icon">
							</i> Simpan
						</button>
					</a>
				</div>
			</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="sopModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Standar Operasional Prosedur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="modal-title-syarat"><b>Persyaratan :</b></h6>
				<p class="modal-content-syarat mb-0">
				<ol type="1" class="ml-0 list-syarat modal-content-syarat">
					<li>Pemohon membuat surat permohonan ditujukan kepada Kepala Kantor Kementerian Agama Kab. Klaten</li>
					<li>Pemohon mengisi Jadwal dan ketentuan Siaran.</li>
					<li>Pemohon mengunggah surat permohonan yang telah dibuat. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
					<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.</li>
					</ol>
				</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
