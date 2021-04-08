<!-- Begin Page Content -->
<div class="container-fluid">
	<?php foreach ($detail_ptsp as $detail) { ?>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between">
			<h3 class="judullist py-3">Detail</h3>
			<nav aria-label="breadcrumb" class="nav-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Permohonan Selesai</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
			</nav>
		</div>


		<div class="row clearfix">
			<div class="col-md-4 mb-0">
				<!-- Proposal Permohonan -->
				<div class="card shadow mb-4">
					<div class="card-header">
						<center>
							<h6 class="m-0 font-weight-bold">Proposal Permohonan</h6>
						</center>
					</div>

					<div class="card-body">
						<center>
							<?php if ($detail->proposal_permohonan != null) { ?>
								<p><?= $detail->proposal_permohonan; ?></p>
								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp14/proposal_permohonan/<?= $detail->proposal_permohonan ?>" target="_blank">
									<i class="fa fa-download nav-icon">
									</i> Klik untuk melihat
								</a>
							<?php } elseif ($detail->proposal_permohonan == null) { ?>
								<p>Belum ada lampiran</p>
							<?php } ?>
						</center>
					</div>
					<div class="card-footer">

					</div>
				</div>
			</div>
			<div class="col-md-8 mb-2">
				<div class="card shadow">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-center">Permohonan Ijop LPQ</h6>
					</div>
					<div class="card-body">
						<table class="table-hover table-responsive">
							<tbody>
								<tr>
									<td><b>Nama LPQ</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->nama_lpq ?></td>
								</tr>
								<tr>
									<td><b>Alamat</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->alamat ?></td>
								</tr>
								<tr>
									<td><b>Desa</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->desa ?></td>
								</tr>
								<tr>
									<td><b>Kecamatan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->kecamatan ?></td>
								</tr>
								<tr>
									<td><b>Kabupaten</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->kabupaten ?></td>
								</tr>
								<tr>
									<td><b>Provinsi</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->provinsi ?></td>
								</tr>
								<tr>
									<td><b>Yayasan</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->yayasan ?></td>
								</tr>
								<tr>
									<td><b>SK Menkumham</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->sk_menkumham ?></td>
								</tr>
								<tr>
									<td><b>Tahun Berdiri</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->tahun_berdiri ?></td>
								</tr>
								<tr>
									<td><b>Berlaku</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->berlaku ?></td>
								</tr>
								<tr>
									<td><b>No. Handphone</b></td>
									<td> </td>
									<td> </td>
									<td>:</td>
									<td><?= $detail->no_hp ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2"></div>
		</div>
	<?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->