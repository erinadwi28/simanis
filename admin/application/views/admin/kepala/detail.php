<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading --> 
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Detail Data Kepala</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_data_kepala') ?>">Kepala</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
	</div>
	<?php foreach ($detail_kepala as $detail) {
		?>
	<!-- Detail input -->
	<div class="row clearfix">
		<div class="col-md-4 mb-4">
                <!-- Foto Profil -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <center>
                            <h6 class="m-0 font-weight-bold">Foto Profil</h6>
                        </center>
                    </div>
                    <center>
                        <div class="card-body">
                            <img src="<?= base_url() ?>../assets/dashboard/images/kepala/profil/<?= $detail->foto_profil_kepala ?>" alt="foto profil" class="img-fluid">
                        </div>
                    </center>

                    <!-- Upload Foto Profil -->
                    <div class="card-footer py-3">
                        <form action="<?= base_url('dashboard/upload_foto_profil_kepala/' . $detail->id_kepala) ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8" id="form_upload_foto_profil">
                                <div class="form-group ml-2 mr-2">
                                    <div class="input-group">
                                        <div class="form-group-upload">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="file-upload">pilih foto
                                                    profil...</label>
                                                <input type="file" class="custom-file-input" id="file-upload" name="berkas" value="<?= $detail->foto_profil_kepala; ?>" required>
                                                <input type="hidden" class="form-control form-user-input" name="id_kepala" id="file-upload" value="<?= $detail->id_kepala ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <center>
                                <button class="btn btn-sm btn-primary" type="submit">
                                    <i class="fa fa-upload"></i> 
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
		<div class="col-md-8 mb-4">
			<!-- Detail Data -->
			<div class="card shadow mb-4">
				<div class="card-body">
					<table class="table-hover table-responsive">
						<tbody>
							<tr>
								<td><b>NIP</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nip ?></td>
							</tr>
							<tr>
								<td><b>Nama</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->nama ?></td>
							</tr>
							<tr>
								<td><b>Email</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->email ?></td>
							</tr>
							<tr>
								<td><b>No Handphone</b></td>
								<td> </td>
								<td> </td>
								<td>:</td>
								<td> </td>
								<td><?= $detail->no_hp ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<div class="float-right">
						<a href="<?= base_url() ?>dashboard/ubah_sandi_kepala/<?= $detail->id_kepala ?>">
							<button id="btn_ubah" class="btn btn-sm btn-primary mr-1" type="submit">
								<i class="fa fa-lock nav-icon">
								</i> Ubah Sandi
							</button>
						</a>
						<a href="<?= base_url() ?>dashboard/ubah_kepala/<?= $detail->id_kepala ?>">
							<button id="btn_ubah" class="btn btn-sm btn-primary" type="submit">
								<i class="fa fa-edit nav-icon">
								</i> Ubah Data
							</button>
						</a>
						<!-- <a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>" class="mr-2">
							<button id=" btn_tolak" class="btn btn-sm btn-tolak" type="submit">
								<i class="fas fa-times-circle">
								</i> Tolak
							</button>
						</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!--End Content-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
