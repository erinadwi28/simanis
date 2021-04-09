<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-2 judullist mt-4">
		<h3>Preview Surat</h3>
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
							<b>Noted: Masih Dibenerin</b>
							<div class="kopsurat row">
								<div class="col-md-12 mb-3">
									<object data="" type="image">
										<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/') ?>images/kop_surat.jpg">
									</object>
								</div>
							</div>
							<?php foreach ($detail_ptsp as $detail) { ?>
								<div class="no_surat">
									<center>
										<p><u><b>REKOMENDASI</b></u><br>
											<b>Nomor : <?= $detail->no_surat ?></b>
										</p>
									</center>
								</div>
								<div class="isi_surat">
									<p> <b> Assalamu'alaikum Wr. Wb</b></p>
									<p>Kepala Kantor Kementerian Agama Kab. Klaten dengan ini menerangkan bahwa</p>
								</div>
								<div class="isi_surat identitas">
									<center>
										<table class="table table-bordered ">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>Tempat/Tgl Lahir</th>
													<th>No.Telp</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1.</td>
													<td><?= $detail->nama_jamaah_haji ?></td>
													<td><?= $detail->alamat ?></td>
													<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?></td>
													<td><?= $detail->no_hp ?></td>
											</tbody>
											</tr>
										</table>
									</center>
								</div>
								<br>
								<div class="isi_surat paragraf">
									<p>Adalah calon Jamaah Umrah/Haji Khusus yang terdaftar di <?= $detail->nama_ppiu_pihk ?>
										sebagai Penyelenggara Ibadah Umrah/Haji Khusus yang terdaftar resmi pada
										Kementerian Agama dengan SK Nomor <?= $detail->no_sk_ppiu_pihk ?> Tahun <?= $detail->tahun_sk ?>
									</p>
									<p>
										Rekomendasi ini dibuat sebagai pertimbangan dalam pembuatan paspor untuk
										keperluan kepergian Ibadah Umrah/Haji Khusus yang bersangkutan.
									</p>
									<p>
										Demikian rekomendasi ini kami buat untuk dipergunakan sebagimana mestinya.
									</p>
								</div>
								<div class="isi_surat">
									<p><b> Wassalmu'alaikum Wr. Wb.</b></p>
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
							<center>
								<a href="<?= base_url() ?>dashboard/cetak_ptsp06/<?= $detail->id_permohonan_ptsp ?>">
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