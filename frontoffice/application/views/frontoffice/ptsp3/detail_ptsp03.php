        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
        		<h3>Detail Permohonan Legalisir Ijazah</h3>

        	</div>

        	<div class="row">
        		<div class="col-md-4 mb-4">
        			<?php
					foreach ($detail_ptsp as $detail) { ?>
        				<!-- ijazah -->
        				<div class="card shadow mb-4">
        					<div class="card-header py-3">
        						<center>
        							<h6 class="m-0 font-weight-bold">Ijazah</h6>
        						</center>
        					</div>

        					<div class="card-body" style="padding: 15px;">
        						<center>
        							<?php if ($detail->ijazah != null) { ?>
        								<p><?= $detail->ijazah; ?></p>
        								<a id="btn_upload" class="btn btn-sm btn-success" href="<?= base_url() ?>../assets/pemohon/ptsp/ptsp03/<?= $detail->ijazah ?>" target="_blank">
        									<i class="fa fa-download nav-icon">
        									</i> Klik untuk melihat
        								</a>
        							<?php } elseif ($sm->lampiran == null) { ?>
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
        					<h6 class="m-0 font-weight-bold text-center">Permohonan Legalisir Ijazah</h6>
        				</div>
        				<div class="card-body">
        					<table class="table-hover table-responsive">
        						<tbody>
        							<tr>
        								<td><b>Nama</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td><?= $detail->nama ?></td>
        							</tr>
        							<tr>
        								<td><b>No. Handphone</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td><?= $detail->no_hp; ?></td>
        							</tr>
        							<tr>
        								<td><b>Tanggal Permohonan</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td><?= $detail->tgl_permohonan ?></td>
        							</tr>
        						</tbody>
        					</table>
        				</div>
        				<div class="card-footer">
        					<div class="float-right">
        						<a href="<?= base_url() ?>dashboard/form_input_keterangan/<?= $detail->id_permohonan_ptsp ?>">
        							<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
        								<i class="fas fa-times-circle">
        								</i> Tolak
        							</button>
        						</a>
        						<a href="<?= base_url() ?>dashboard/aksi_update_status_permohonan/<?= $detail->id_permohonan_ptsp ?>">
        							<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
        								<i class="fas fa-check-circle">
        								</i> Terima
        							</button>
        						</a>
        					</div>
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