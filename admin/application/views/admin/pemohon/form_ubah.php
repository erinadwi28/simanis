<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Ubah Data Pemohon</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_data_pemohon') ?>">Pemohon</a></li>
				<li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
			</ol>
		</nav>
	</div>
	<?php foreach ($detail_pemohon as $data) { ?>
	<!--Begin Content Profile-->
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-2"></div>
		<div class="col-xs col-sm-8">
			<div class="card shadow mb-5">
				<div class="card-body">
					<form class="form-horizontal mt-4" id="form_ubah" enctype="multipart/form-data"
						action="<?= base_url('dashboard/aksi_update_pemohon/' . $data->id_pemohon) ?>" method="POST">
						<div class="form-group row">
							<label for="nik" class="col-sm-3 col-form-label">NIK</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nik" name="nik"
										value="<?= $data->nik; ?>" placeholder="<?= $data->nik; ?>" required data-parsley-type="number">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="nama" name="nama"
										value="<?= $data->nama; ?>" placeholder="<?= $data->nama; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="email" class="form-control" id="email" name="email"
										value="<?= $data->email; ?>" placeholder="<?= $data->email; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No. Handphone</label>
							<div class="col-sm-9">
								<div class="form-line focused">
									<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data->no_hp; ?>"
										placeholder="<?= $data->no_hp; ?>" required>
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
			</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-2"></div>
	</div>
	<?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
