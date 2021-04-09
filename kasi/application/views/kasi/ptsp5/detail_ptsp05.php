        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
        		<h3>Detail Permohonan Surat Keterangan Haji Pertama</h3>

        	</div>

        	<div class="row">
        		<div class="col-md-3 mb-4 ml-5">
        			<?php
					foreach ($detail_ptsp as $detail) { ?>
        				<!-- Surat Permohonan -->
        				<div class="card shadow mb-4">
        					<div class="card-header py-3">
        						<center>
        							<h6 class="m-0 font-weight-bold">Surat Permohonan</h6>
        						</center>
        					</div>

        					<div class="card-body" style="padding: 15px;">
        						<center>
        							<?php if ($detail->srt_permohonan != null) { ?>
        								<p><?= $detail->srt_permohonan; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/<?= $detail->srt_permohonan ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->srt_permohonan == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>
        				</div>
        				<!-- Surat Pernyataan -->
        				<div class="card shadow mb-4">
        					<div class="card-header py-3">
        						<center>
        							<h6 class="m-0 font-weight-bold">Surat Pernyataan</h6>
        						</center>
        					</div>

        					<div class="card-body" style="padding: 15px;">
        						<center>
        							<?php if ($detail->srt_pernyataan != null) { ?>
        								<p><?= $detail->srt_pernyataan; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/<?= $detail->srt_pernyataan ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->srt_pernyataan == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>
        				</div>
        				<!-- FC KTP -->
        				<div class="card shadow mb-4">
        					<div class="card-header py-3">
        						<center>
        							<h6 class="m-0 font-weight-bold">FC KTP</h6>
        						</center>
        					</div>

        					<div class="card-body" style="padding: 15px;">
        						<center>
        							<?php if ($detail->ktp != null) { ?>
        								<p><?= $detail->ktp; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/<?= $detail->ktp ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->ktp == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>
        				</div>
        				<!-- Bukti Pelunasan -->
        				<div class="card shadow mb-4">
        					<div class="card-header py-3">
        						<center>
        							<h6 class="m-0 font-weight-bold">Bukti Pelunasan</h6>
        						</center>
        					</div>

        					<div class="card-body" style="padding: 15px;">
        						<center>
        							<?php if ($detail->bukti_pelunasan != null) { ?>
        								<p><?= $detail->bukti_pelunasan; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/<?= $detail->bukti_pelunasan ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($detail->bukti_pelunasan == null) { ?>
        								<p>Belum ada lampiran</p>
        							<?php } ?>
        						</center>
        					</div>
        				</div>
        		</div>
        		<div class="col-md-8 mb-4">
        			<!-- Detail Data -->
        			<div class="card shadow mb-4">
        				<div class="card-header py-3">
        					<h6 class="m-0 font-weight-bold text-center">Permohonan Surat Keterangan Haji Pertama</h6>
        				</div>
        				<div class="card-body">
        					<table class="table-hover table-responsive">
        						<tbody>
        							<tr>
        								<td><b>Nama Lengkap</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td><?= $detail->nama ?></td>
        							</tr>
        							<tr>
        								<td><b>No. Handphone</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td><?= $detail->no_hp ?></td>
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
        								<td><?= $detail->tanggal_lahir ?></td>
        							</tr>
        							<tr>
        								<td><b>Alamat Lengkap</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td><?= $detail->alamat ?></td>
        							</tr>
        							<tr>
        								<td><b>No. Porsi</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td><?= $detail->nomor_porsi ?></td>
        							</tr>
        							<tr>
        								<td><b>Tahun Angkatan Haji</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td><?= $detail->tahun_hijriah ?> H / <?= $detail->tahun_masehi ?> M</td>
        							</tr>
        							<tr>
        								<td><b>No. Handphone</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td>nanti ditambahkan ya sementara gini dulu</td>
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
        				<div class="card-footer">
        					<?php if ($detail->status == 'Proses Kasi') { ?>
        						<div class="float-right">
        							<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>">
        								<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
        									<i class="fas fa-times-circle">
        									</i> Tolak
        								</button>
        							</a>
        							<a href="<?= base_url() ?>dashboard/aksi_update_status_setujui/<?= $detail->id_permohonan_ptsp ?>">
        								<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
        									<i class="fas fa-check-circle">
        									</i> Terima
        								</button>
        							</a>
        						</div>
        					<?php } ?>
        				</div>
        			</div>
        		</div>
        	</div>
        <?php } ?>
        <!--End Content Profile-->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->