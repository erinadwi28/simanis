<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIMANIS - Dashboard</title>

	<!--Tittle Icon-->
	<link rel="shortcut icon" href="<?= base_url('../assets/landing/images/') ?>title.png" />

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/vendor/fontawesome-free/css/all.min.css') ?>" />
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.body {
			color: #000;
			font-size: 11pt;
			margin-bottom: 0;
			padding-bottom: 0;
		}

		.logosurat {
			height: 110px;
			width: 110px;
			margin-top: 0px;
			margin-left: 10px;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}


		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			font-family: 'Times New Roman';
			margin-left: 0px;
			font-size: 11pt;
		}


		.alamat_kantor {
			font-size: 11pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
			font-size: 9pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Times New Roman';
			text-indent: 50px;
		}

		.isi_surat {
			margin-left: 50px;
			margin-right: 50px;
			font-size: 11pt;
			line-height: 1.2em;
			font-family: 'Times New Roman';
			text-align: justify;

		}

		.identitas {
			margin-left: 2.8125em;
			margin-bottom: 0.3125em;
			font-size: 11pt;
		}

		.ttd_kepala {
			display: block;
			position: absolute;
			float: left;
			margin-right: -400px;
		}

		.img-fluid {
			max-width: 100%;
			height: auto;
		}

		.container-fluid {
			width: 100%;
			padding-right: 0.25rem;
			padding-left: 0.25rem;
			margin-right: auto;
			margin-left: auto;
		}

		.table {
			color: #000;
		}

		.table-bordered {
			border-width: 2px;
			border-color: #000;
			margin-left: 15px;
		}

		.ttd_surat {
			font-size: 11pt;
		}

		.body {
			line-height: 23.5px;
		}

		/* css untuk surat keterangan */
		.isi_suket {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
			text-align: justify;
		}

		.identitassuket {
			text-align: justify;
			font-size: 11pt;
		}

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
			margin-top: 5px;
			margin-right: 17px;
		}


		.ttd_surat_2 {
			font-size: 11pt;
		}

		.sertif {
			background: url(<?= base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp15_2.png') ?>);
			background-repeat: no-repeat;
			background-size: 100% 100%;
			background-position-x: center;
			background-position-y: top;
			z-index: 200;
		}

		.table_sertif {
			margin-left: 60px;
			margin-right: 50px;
		}
	</style>

</head>

<body class="body " id="page-top">
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col sertif" style="padding: 0;">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">
							<?php
							foreach ($detail_ptsp as $detail) { ?>
								<div class="badan_surat">
									<center>
										<div class="kepala_Sertifikat" style="margin-top: 50px;">
											<object data="" type="image">
												<img class="logosurat" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
											</object>
											<h5 style="margin-top: 8px;"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA <br>
													KANTOR KABUPATEN KLATEN </b></h5>
											<p>Jalan Ronggowarsito Klaten <br>
												Telepon/Faksimili (0272)321154 <br>
												Website : http://klaten.kemenag.go.id</p>
										</div>
									</center>
									<center>
										<div class="no_surat">
											<h6><b>PIAGAM PENYELENGARAAN</b> <br>
												<b>MADRASAH DINIYAH TAKMILIYAH (MDT)</b> <br>
												<b>Nomor: <?= $detail->no_surat ?></b>
											</h6>
										</div>
									</center>
									<div class="isi_surat">
										Dengan ini Kepala Kantor Kementerian Agama Kabupaten Klaten memberikan NSMDT
										kepada :
									</div>
									<div class="identitas">
										<table width="600px" class="table_sertif">
											<tbody>
												<tr>
													<td>Nama MDT</td>
													<td>: <?= $detail->nama_mtd ?></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td>: <?= $detail->alamat ?></td>

												</tr>
												<tr>
													<td>Desa</td>
													<td>: <?= $detail->desa ?></td>

												</tr>
												<tr>
													<td>Kecamatan</td>
													<td>: <?= $detail->kecamatan ?></td>

												</tr>
												<tr>
													<td>Kabupaten</td>
													<td>: <?= $detail->kabupaten ?></td>

												</tr>
												<tr>
													<td>Provinsi</td>
													<td>: <?= $detail->provinsi ?></td>

												</tr>
												<tr>
													<td>Tahun Berdiri</td>
													<td>: <?= $detail->tahun_berdiri ?></td>

												</tr>
												<tr>
													<td width="100px">Nomor Statistik</td>
													<td>: <?= $detail->nomor_statistik ?></td>

												</tr>
												<tr>
													<td>No Telp</td>
													<td>: <?= $detail->no_hp ?></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="isi_surat">
										<p>Madrasah Diniyah Taklimiyah (MDT) tersebut telah terdaftar di
											Kantor Kementerian Agama Kabupaten Klaten sebagai Lembaga
											Pendidikan Keagamaan Islam. <br> Demikian untuk dapat digunakan sebagaimana mestinya.</p>

									</div>
									<div class="row">
										<div class="col">
											<div class="ttd_surat" style="margin-left: 350px;">
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												<p>Ditetapkan di : Klaten <br>
													Pada Tanggal : &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
													Kepala
												<?php } ?>
												<br><br><br>
												<?php
												foreach ($data_kepala as $detail) { ?>
													<b><?= $detail->nama ?></b><br>
												<?php } ?>
												</p>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Heading -->
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						<!-- KOP SURAT -->
						<center>
							<table width="478">
								<tr>
									<td></td>
									<td class="img">
										<center>
											<img src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>" width="100" height="100">
										</center>
									</td>
									<td width="430" style="padding-left: 10px;">
										<center>
											<font size="4"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA</b></font><br>
											<font size="3">KANTOR KEMENTERIAN AGAMA KABUPATEN KLATEN</font><br>
											<font size="2"><i>Jalan Ronggowarsito Klaten</i></font><br>
											<font size="2"><i>Telepon/Faksimili (0272) 321154</i></font><br>
											<font size="2"><i>Website http://klaten.kemenag.go.id</i></font>
											<br>
										</center>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<div class="garis"></div>
									</td>
								</tr>
							</table>
						</center>
						<br>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="no_surat">
								<center>
									<p><b>SURAT KETERANGAN </b><br>
										<b>Nomor : <?= $detail->no_surat_keterangan ?></b>
									</p>
								</center>
							</div>
						<?php } ?>

						<div class="identitassuket">
							<table>
								<tbody>
									<tr>
										<td>Yang bertanda tangan di bawah ini :</td>
									</tr>
									<?php
									foreach ($data_kepala as $detail) { ?>
										<tr>
											<td>Nama</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama ?></td>
										</tr>
										<tr>
											<td>NIP</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nip ?></td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td>Kepala Kantor Kementerian Agama Kab. Klaten</td>
										</tr>
									<?php } ?>
									<tr>
										<td>Dengan ini menerangkan bahwa :</td>
									</tr>
									<?php
									foreach ($detail_ptsp as $detail) { ?>
										<tr>
											<td>Nama Lembaga</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_mtd ?></td>
										</tr>
										<tr>
											<td>NSMDT</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nomor_statistik ?></td>
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
									<?php } ?>
								</tbody>
							</table>
						</div>
						<br>
						<div class="identitassuket">
							Bahwa lembaga tersebut telah mendapat izin operasional dari Kantor Kementerian Agama
							Kabupaten Klaten dan berkomitmen untuk melaksanakan semua kegiatan sesuai dengan tuntunan
							Islam dan peraturan
							perundang-undangan yang berlaku serta selalu berkoordinasi dengan Dinas/Instansi terkait.
							<br>
							Demikian untuk menjadikan perhatian dan dapat dipergunakan sebagaimana mestinya
						</div>
						<br>
						<div class="row">
							<div class="col">
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<div class="ttd_surat_2" style="margin-left: 450px;">
										<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
										Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
										Kepala
									</div> <br>
								<?php } ?>
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="ttd_surat_2" style="margin-left: 450px;">
										<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
										<?= $detail->nama ?>
									</div>
								<?php } ?>
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<div class="ttd_surat_2">
										Tembusan: <br>
										1. Yth. Ka. Kesbangpol Linmas Kab.Klaten; <br>
										2. Yth. Camat <?= $detail->kecamatan ?>; <br>
										3. Yth. Ka. KUA Kec. <?= $detail->kecamatan ?>; <br>
										4. Kepala Desa <?= $detail->desa ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

	<!-- End of Main Content -->
</body>

</html>