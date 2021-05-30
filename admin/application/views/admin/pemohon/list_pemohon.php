<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Data Pemohon</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pemohon</li>
			</ol>
		</nav>
	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('success') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php elseif ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('error') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>
			<!-- btn tambah -->
			<a href="<?= base_url() ?>dashboard/tambah_data_pemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fa fa-plus fa-sm text-white-50"></i> Tambah
				Data</a>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						foreach ($data_user as $data) {
						?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $data->nik ?></td>
							<td><?= $data->nama ?></td>

							<td class="text-center">
								<a href="<?= base_url() ?>dashboard/detail_data_pemohon/<?= $data->id_pemohon ?>" class="btn btn-primary btn-sm">
									<i class="fas fa-search"></i>
								</a>
								<a href="#" class="btn btn-tolak btn-sm" data-toggle="modal" data-target="#pemohonDeleteModal<?= $data->id_pemohon ?>">
									<i class="fas fa-trash-alt"></i>
								</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- pemohon delete Modal-->
<?php
foreach ($data_user as $data) {
?>
<div class="modal fade" id="pemohonDeleteModal<?= $data->id_pemohon ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Menghapus Data Pemohon ?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Tekan Hapus untuk melanjutkan <br>
				Tekan Batal untuk membatalkan
			</div>
			<div class="modal-footer">
				<a class="btn btn-primary btn-sm" href="<?= base_url('dashboard/aksi_hapus_pemohon/' . $data->id_pemohon) ?>">Hapus</a>
				<button class="btn btn-tolak btn-sm" type="button" data-dismiss="modal">
					Batal
				</button>
			</div>
		</div>
	</div>
</div> <?php }?>