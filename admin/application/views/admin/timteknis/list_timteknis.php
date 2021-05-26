<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Data Tim Teknis</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Tim Teknis</li>
			</ol>
		</nav>
	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<!-- btn tambah -->
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fa fa-plus fa-sm text-white-50"></i> Tambah
				Data</a>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Email</th>
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
							<td><?= $data->email ?></td>
							<td><?= $data->nama ?></td>

							<td class="text-center">
								<a href="<?= base_url() ?>dashboard/detail_data_timteknis/<?= $data->id_tim_teknis ?>" class="btn btn-primary btn-sm">
									<i class="fas fa-search"></i>
								</a>
								<a href="#" class="btn btn-tolak btn-sm">
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
