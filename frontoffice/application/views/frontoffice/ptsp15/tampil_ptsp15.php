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
									<h6 class="m-0 font-weight-bold">Ijin Operasional Madin</h6>
								</center>
							</div>
							<div class="card-body">
								<div class="card-body">
									<center>
										<div class="logosurat row">
											<div class="col-md-12 mb-3">
												<object data="" type="image">
													<img class="logosurat" alt="logo_kop_surat" style="width: 80px;" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
												</object>
											</div>
										</div>
									</center>

									<?php foreach ($detail_ptsp as $detail) { ?>
										<div class="badan_surat">
											<center>
												<div class="kepala_Sertifikat">
													<h5 style="margin-top: 20px;"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA</b></h5>
													<h6><b>KANTOR KABUPATEN KLATEN </b></h6>
													<p>Jalan Ronggowarsito Klaten <br>
														Telepon/Faksimili (0272)321154 <br>
														Website : http://klaten.kemenag.go.id <br> <br> </p>
												</div>
											</center>
											<center>
												<div class="no_surat">
													<h5><b>PIAGAM PENYELENGARAAN</b></h5>
													<h5><b>MADRASAH DINIYAH TAKMILIYAH (MDT)</b></h5>
													<p><b> Nomor:<?= $detail->no_surat ?></b></p>
												</div>
											</center>
											<br>
											<div class="isi_surat">
												<p>Dengan ini Kepala Kantor Kementerian Agama Kabupaten Klaten <br> memberikan NSMDT
													kepada :</p>
											</div>
											<div class="isi_surat identitas">
												<table class="table-responsive">
													<tbody>
														<tr>
															<td>Nama MDT</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->nama_madrasah ?></td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->alamat ?></td>
														</tr>
														<tr>
															<td>Desa</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->desa ?></td>
														</tr>
														<tr>
															<td>Kecamatan</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->kecamatan ?></td>
														</tr>
														<tr>
															<td>Kabupaten</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->kabupaten ?></td>
														</tr>
														<tr>
															<td>Provinsi</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->provinsi ?></td>
														</tr>
														<tr>
															<td>Tahun Berdiri</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->tahun_berdiri ?></td>
														</tr>
														<tr>
															<td>No Telp</td>
															<td> </td>
															<td> </td>
															<td>:</td>
															<td> </td>
															<td><?= $detail->no_hp ?></td>
														</tr>

													</tbody>
												</table>
											</div>
											<br>
											<div class="isi_surat">
												<p>Madrasah Diniyah Taklimiyah (MDT) tersebut telah terdaftar di <br>
													Kantor Kementerian Agama Kabupaten Klaten sebagai Lembaga <br>
													Pendidikan Keagamaan Islam.</p>
												<p>Demikian untuk dapat digunakan sebagaimana mestinya.</p>
											</div>
											<div class="no_statistik">

											</div>
											<br>
											<div class="row">
												<div class="col-md-6"></div>
												<div class="col-md-6">
													<div class="badan_surat isi_surat">
														<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
														<p>Ditetapkan di : Klaten <br>
															Pada Tanggal : &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 20 <br>
															Kepala </p><br><br><br>
														<b>Anif Solikhin</b><br>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="card-footer">
								<center>
									<a href="<?= base_url() ?>dashboard/cetak_ptsp15/<?= $detail->id_permohonan_ptsp ?>">
										<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-print"></i>
											Cetak</button>
									</a>
								</center>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->