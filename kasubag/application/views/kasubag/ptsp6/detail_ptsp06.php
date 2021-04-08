        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<?php
			foreach ($detail_ptsp as $detail) { ?>
        		<?php if ($detail->status === 'Proses Kasubag') { ?>
        			<!-- Page Heading -->
        			<div class="d-sm-flex align-items-center justify-content-between">
        				<h3 class="judullist py-3">Detail</h3>
        				<nav aria-label="breadcrumb" class="nav-breadcrumb">
        					<ol class="breadcrumb">
        						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_masuk') ?>">Permohonan Masuk</a></li>
        						<li class="breadcrumb-item active" aria-current="page">Detail</li>
        					</ol>
        				</nav>
        			</div>
        		<?php } elseif ($detail->status === 'Selesai') { ?>
        			<!-- Page Heading -->
        			<div class="d-sm-flex align-items-center justify-content-between">
        				<h3 class="judullist py-3">Detail</h3>
        				<nav aria-label="breadcrumb" class="nav-breadcrumb">
        					<ol class="breadcrumb">
        						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        						<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_permohonan_selesaiKasubag') ?>">Permohonan Selesai</a></li>
        						<li class="breadcrumb-item active" aria-current="page">Detail</li>
        					</ol>
        				</nav>
        			</div>
        		<?php } ?>
        		<div class="row clearfix">
        			<div class="col-xs-12 col-sm-2"></div>
        			<div class="col-md-8 mb-4">
        				<div class="card shadow">
        					<div class="card-header py-3">
        						<h6 class="m-0 font-weight-bold text-center">Permohonan Rekomendasi Paspor Haji dan Umrah</h6>
        					</div>
        					<div class="card-body">
        						<table class="table-hover table-responsive">
        							<tbody>
        								<tr>
        									<td><b>Nama Jamaah Haji</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->nama_jamaah_haji ?></td>
        								</tr>
        								<tr>
        									<td><b>Alamat Lengkap</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->alamat ?></td>
        								</tr>
        								<tr>
        									<td><b>Tempat Lahir</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->tempat_lahir ?></td>
        								</tr>
        								<tr>
        									<td><b>Tanggal Lahir</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= format_indo(date($detail->tanggal_lahir)) ?></td>
        								</tr>
        								<tr>
        									<td><b>No. Handphone</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->no_hp ?></td>
        								</tr>
        								<tr>
        									<td><b>Nama PPIU/PIHK</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->nama_ppiu_pihk ?></td>
        								</tr>
        								<tr>
        									<td><b>No. SK PPIU/PIHK</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->no_sk_ppiu_pihk ?></td>
        								</tr>
        								<tr>
        									<td><b>Tahun SK</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= $detail->tahun_sk ?></td>
        								</tr>
        								<tr>
        									<td><b>Tanggal Permohonan</b></td>
        									<td> </td>
        									<td> </td>
        									<td>:</td>
        									<td><?= format_indo(date($detail->tgl_permohonan)) ?></td>
        								</tr>
        								<?php if ($detail->keterangan != null && $detail->status != 'Selesai') { ?>
        									<tr>
        										<td><b>Keterangan Permohonan Pending</b></td>
        										<td> </td>
        										<td> </td>
        										<td>:</td>
        										<td><?= $detail->keterangan; ?></td>
        									</tr>
        								<?php } ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-2"></div>
        		</div>

        		<!-- Unggah dokumen -->
        		<div class="row clearfix">
        			<div class="col-xs-12 col-sm-3">
        				<!-- Surat Permohonan -->
        				<div class="card shadow mb-4">
        					<div class="card-header">
        						<center>
        							<h6 class="m-0 font-weight-bold">Surat Permohonan</h6>
        						</center>
        					</div>

        					<div class="card-body">
        						<center>
        							<?php if ($detail->srt_permohonan != null) { ?>
        								<p><?= $detail->srt_permohonan; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp06/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->srt_permohonan == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>

        					<div class="card-footer">

        					</div>

        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-3">
        				<!-- FC Surat Ijin Operasional -->
        				<div class="card shadow mb-4">
        					<div class="card-header">
        						<center>
        							<h6 class="m-0 font-weight-bold">FC Surat Ijin Operasional</h6>
        						</center>
        					</div>
        					<div class="card-body">
        						<center>
        							<?php if ($detail->sk_ijin_oprasional != null) { ?>
        								<p><?= $detail->sk_ijin_oprasional; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp06/sk_ijin_oprasional/<?= $detail->sk_ijin_oprasional ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->sk_ijin_oprasional == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>

        					<div class="card-footer">

        					</div>

        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-3">
        				<!-- fc ktp -->
        				<div class="card shadow mb-4">
        					<div class="card-header">
        						<center>
        							<h6 class="m-0 font-weight-bold">FC KTP</h6>
        						</center>
        					</div>

        					<div class="card-body">
        						<center>
        							<?php if ($detail->ktp != null) { ?>
        								<p><?= $detail->ktp; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp06/ktp/<?= $detail->ktp ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->ktp == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>

        					<div class="card-footer">

        					</div>

        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-3">
        				<!-- FC KK -->
        				<div class="card shadow mb-4">
        					<div class="card-header">
        						<center>
        							<h6 class="m-0 font-weight-bold">FC KK</h6>
        						</center>
        					</div>

        					<div class="card-body">
        						<center>
        							<?php if ($detail->kk != null) { ?>
        								<p><?= $detail->kk; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp06/kk/<?= $detail->kk ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->kk == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>

        					<div class="card-footer">

        					</div>

        				</div>
        			</div>
        		</div>
        		<!-- Button Tolak & Setujui -->
        		<div class="row clearfix float-right px-2">
        			<?php if ($detail->status == 'Proses Kasubag') { ?>
        				<a href="<?= base_url() ?>dashboard/aksi_setujui_permohonan/<?= $detail->id_permohonan_ptsp ?>">
        					<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
        						<i class="fas fa-check-circle">
        						</i> Terima
        					</button>
        				</a>
        			<?php } ?>
        		</div>
        	<?php } ?>
        	<!--End Content Profile-->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->