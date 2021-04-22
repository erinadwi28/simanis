        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Page Heading -->
        	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
        		<h3>Tampil Permohonan Legalisir</h3>
        		<a href="<?= base_url('warga') ?>">
        			<button id="btn_kembali" class="btn btn-sm btn-warning" type="submit">
        				<i class="fa fa-arrow-left">
        				</i> Kembali
        			</button>
        		</a>
        	</div>

    		<!-- Content Row line 1-->
        	<div class="row">
        		<div class="col-md-2 mb-4">
        			<!-- Foto -->
        			<div class="mb-4">

        			</div>
        		</div>
        		<div class="col-md-8 mb-4">
        			<!-- Detail Data -->
        			<div class="row">
        				<div class="col-md-12 mb-3">
        					<!-- Detail Data -->
        					<div class="card shadow mb-3">
        						<div class="card-header">
        							<center>
        								<h6 class="m-0 font-weight-bold">Hasil Legalisir Ijazah</h6>
        							</center>
        						</div>
        						<div class="card-body">
        							<center>
        								<a href="" data-gallery="mygallery" data-title="Fotocopy Ijazah"
        									data-toggle="lightbox">
        									<img src="" alt="Hasil Legalisir Ijazah" class="img-fluid" width="150px">
        								</a>
        							</center>
        						</div>
        						<div class="card-footer">
        							<center>
        								<a
        									href="<?= base_url() ?>warga/cetak_surat/<?php foreach ($detail_suket as $w) { ?><?= $w->id_permohonan_surat ?> <?php } ?>">
        									<button class="btn btn-sm btn-primary" type="submit"><i
        											class="fa fa-print"></i>
        										Cetak</button>
        								</a>
        							</center>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
