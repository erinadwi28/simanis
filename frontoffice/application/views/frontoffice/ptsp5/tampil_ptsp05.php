        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Page Heading -->
        	<div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
        		<h3>Tampil Permohonan</h3>
        		<a href="<?= base_url('warga') ?>">
        			<button id="btn_kembali" class="btn btn-sm btn-warning" type="submit">
        				<i class="fa fa-arrow-left">
        				</i> Kembali
        			</button>
        		</a>
        	</div>
        	<!-- Content Row line 1-->
        	<div class="row">
        		<div class="col-md-1 mb-4">
        		</div>
        		<div class="col-md-10 mb-4">
        			<!-- Detail Data -->
        			<div class="row">
        				<div class="col-md-12 mb-3">
        					<!-- Detail Data -->
        					<div class="card shadow mb-3">
        						<div class="card-header">
        							<center>
        								<h6 class="m-0 font-weight-bold">Preview Surat Permohonan Haji Pertama</h6>
        							</center>
        						</div>
        						<div class="card-body">

        							<div class="kopsurat row">
        								<div class="col-md-12 mb-3">
        									<object data="" type="image">
        										<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/') ?>images/kop_surat.jpg">
        									</object>
        								</div>
        							</div>
        							<div class="no_surat">
        								<center>
        									<p><u><b>SURAT KETERANGAN</b></u><br>
        										<b>Nomor :</b>
        									</p>
        								</center>
        							</div>
        							<div class="isi_surat">
        								<?php foreach ($data_pemohon as $detail) { ?>
        									<p> Menindaklanjuti surat permohonan dari Saudara <?= $detail->nama ?> tentang
        										Permohonan Surat Keterangan Haji Pertama, dengan ini Kepala Kantor
        										Kementrian Agama Kabupaten Klaten menerangkan bahwa :</p>
        								<?php } ?>
        							</div>
        							<?php foreach ($detail_ptsp as $detail) { ?>
        								<div class="isi_surat identitas">
        									<table class="table-responsive">
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
        												<td><b>Tempat dan Tanggal Lahir</b></td>
        												<td> </td>
        												<td> </td>
        												<td>:</td>
        												<td> </td>
        												<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?> </td>
        											</tr>
        											<tr>
        												<td><b>Alamat</b></td>
        												<td> </td>
        												<td> </td>
        												<td>:</td>
        												<td> </td>
        												<td><?= $detail->alamat ?></td>
        											</tr>
        											<tr>
        												<td><b>Nomor Porsi</b></td>
        												<td> </td>
        												<td> </td>
        												<td>:</td>
        												<td> </td>
        												<td><?= $detail->nomor_porsi ?></td>
        											</tr>
        										</tbody>
        									</table>
        								</div>
        								<br>
        								<div class="isi_surat paragraf">
        									<p>Adalah jemaah haji Kabupaten Klaten Tahun <?= $detail->tahun_hijriah ?> H / <?= $detail->tahun_masehi ?> M dan perjalanan
        										ibadah hajinya merupakan yang pertama.
        									</p>
        									<p>
        										Demikian surat keterangan ini dibuat untuk dapat dipergunakan
        										sebagaimana
        										mestinya
        									</p>
        								</div>
        								<div class="row">
        									<div class="col-md-6">
        									</div>
        									<div class="col-md-6">
        										<div class="badan_surat isi_surat">
        											<center>
        												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
        												Klaten, 03 Maret 2020<br>
        												Kepala
        											</center>
        										</div>
        									</div>
        								</div>
        							<?php } ?>
        							<div class="row ttd_kades">
        								<div class="col-md-6 ">
        								</div>
        								<div class="col-md-6">

        								</div>
        							</div>
        							<br> <br>
        							<div class="row">
        								<div class="col-md-6">
        								</div>
        								<div class="col-md-6">
        									<div class="badan_surat isi_surat">
        										<center>
        											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
        											<u><b>H. Anif Solikhin, S.Ag. MSI</b></u><br>
        											Nip. 197004201995031003
        										</center>
        									</div>
        								</div>
        							</div>
        						</div>
        						<div class="card-footer">
        							<?php foreach ($detail_ptsp as $detail) { ?>
        								<center>
        									<a href="<?= base_url() ?>dashboard/cetak_ptsp05/<?= $detail->id_permohonan_ptsp ?>">
        										<button class="btn btn-sm btn-success" type="submit"><i class="fa fa-print"></i>
        											Cetak</button>
        									</a>
        								</center>
        							<?php } ?>
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