<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Permohonan</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/sop_ptsp24') ?>">SOP</a></li>
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
					<h6 class="m-0 font-weight-bold text-center">Rek. Pajak Bendaraan Bermotor Layanan Sosial Rumah Ibadah</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#sopModal"><i
							class="fas fa-info-circle"></i></button>
					<br>
					<form class="form-horizontal mt-4" id="form_ptsp24" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_pengajuan_ptsp24') ?>" method="POST">
						<div class="form-group row">
							<label for="jml_roda_kendaraan" class="col-sm-3 col-form-label">Jumlah Roda Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="jml_roda_kendaraan" name="jml_roda_kendaraan"
										value="" required 
										placeholder="masukkan jumlah roda disini...">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="merek_kendaraan" class="col-sm-3 col-form-label">Merek Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="merek_kendaraan" name="merek_kendaraan"
									 placeholder="masukkan merek kendaraan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_polisi" class="col-sm-3 col-form-label">No. Polisi</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_polisi" name="no_polisi" value=""
									placeholder="masukkan no polisi disini..." required >
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pemilik_kendaraan" class="col-sm-3 col-form-label">Pemilik Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="pemilik_kendaraan" name="pemilik_kendaraan"
									 placeholder="masukkan pemilik kendaraan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="fungsional_kendaraan" class="col-sm-3 col-form-label">Fungsional Kendaraan</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="fungsional_kendaraan" name="fungsional_kendaraan"
									 placeholder="masukkan fungsional kendaraan disini..."
									 value="" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. HandPhone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value=""
									placeholder="masukkan no hp disini..." 
									required data-parsley-type="number" minlength="11">
								</div>
							</div>
						</div>
						<?php } ?>
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
						<li>Pemohon mengunggah surat permohonan yang telah dibuat. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon mengunggah FC (Fotocopy) SK Ijin Operasional PPIU/PIHK. <br> (Format: PDF, Ukuran: Max 1 MB)</li>
						<li>Pemohon menunggu pemberitahuan dari pihak Kemenag bahwa proses permohonan telah selesai.</li>
					</ol>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
