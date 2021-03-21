        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
        		<h3>Detail Permohonan Legalisir Ijazah<h3>
        				<!-- <a href="<?= base_url('warga') ?>"> -->
        				<button id="btn_kembali" class="btn btn-sm btn-warning" type="">
        					<i class="fa fa-arrow-left">
        					</i> Kembali
        				</button>
        				<!-- </a> -->
        	</div>

        	<!--Begin Content Profile-->
        	<div class="row clearfix">
        		<div class="col-md-4 mb-4">
        			<div class="card shadow mb-3">
        				<div class="card-header py-3">
        					<center>
        						<h6 class="m-0 font-weight-bold">Dokumen Fotocopyan</h6>
        					</center>
        				</div>
        				<center>
        					<div class="card-body" style="padding: 15px;">
        						<!-- <?php foreach ($foto_profil as $saya) { ?>
                        <a href="<?= base_url(); ?>/assets/uploads/warga/<?= $saya->foto_profil_warga; ?>" data-gallery="mygallery" data-title="Foto Profil" data-toggle="lightbox">
                            <img src="<?= base_url(); ?>/assets/uploads/warga/<?= $saya->foto_profil_warga; ?>" alt="foto profil" class="img-fluid">
                        </a>
                    <?php } ?> -->
        					</div>
        				</center>

        				<!-- Upload File Berita -->
        				<div class="card-footer py-3">
        					<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
        						id="form_upload_lampiran_berita">
        						<!-- <?php
                    foreach ($detail_profil_saya as $saya) { ?> -->
        						<!-- <?php } ?> -->
        						<center>
        							<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
        								<i class="fas fa-times-circle">
        								</i> Tolak
        							</button>
        							<!-- </a> -->
        							<!-- <a href="<?= base_url() ?>warga/update_status_permohonan/<?= $w->id_permohonan_surat ?>/<?= $warga['id_warga'] ?>"> -->
        							<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
        								<i class="fas fa-check-circle">
        								</i> Terima
        							</button>
        						</center>
        					</form>

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
        					<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div> -->
        					<!-- <?php if ($this->session->flashdata('success')) : ?>
                <?php endif; ?> -->
        					<table class="table-hover table-responsive">
        						<tbody>
        							<!-- <?php
                    foreach ($detail_suket as $w) {
                    ?> -->
        							<tr>
        								<td><b>Nama</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td> </td>
        								<!-- <td><?= $w->nama ?></td> -->
        							</tr>
        							<tr>
        								<td><b>No. Handphone</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td> </td>
        								<!-- <td><?= $w->no_hp_aktif ?></td> -->
        							</tr>
        							<!-- <?php } ?> -->

        							<!-- <?php foreach ($detail_permohonan as $d) { ?> -->
        							<tr>
        								<td><b>Tanggal Permohonan</b></td>
        								<td> </td>
        								<td> </td>
        								<td>:</td>
        								<td> </td>
        								<td> </td>
        							</tr>
        							<!-- <?php } ?> -->
        						</tbody>
        					</table>
        				</div>
        				<div class="card-footer">
        					<div class="float-right">
        						<!-- <?php foreach ($detail_suket as $w) { ?> -->
        						<!-- <a href="<?= base_url() ?>warga/form_ubah_suket005/<?= $w->id_surat ?>"> -->
        						<button id=" btn_tolak" class="btn btn-sm btn-danger" type="submit">
        							<i class="fas fa-times-circle">
        							</i> Tolak
        						</button>
        						<!-- </a> -->
        						<!-- <a href="<?= base_url() ?>warga/update_status_permohonan/<?= $w->id_permohonan_surat ?>/<?= $warga['id_warga'] ?>"> -->
        						<button id="btn_termia" class="btn btn-sm btn-success" type="submit">
        							<i class="fas fa-check-circle">
        							</i> Terima
        						</button>
        						<!-- </a> -->
        						<!-- <?php } ?> -->
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>

        	<!--End Content Profile-->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
