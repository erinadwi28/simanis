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
		}

		.logosurat {
			height: 130px;
			width: 130px;
			margin-top: -20px;
			margin-left: 15px;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}

		.card-body {
			padding: 5rem;
		}

		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			font-family: 'Times New Roman';
			margin-left: 60px;
		}

		.kepala_sertifikat {
			font-weight: bold;
			font-size: 14pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
		}

		.no_surat {
			font-size: 14pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Times New Roman';
			text-indent: 50px;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
			font-family: 'Times New Roman';
		}

		.identitas {
			margin-left: 2.8125em;
			margin-bottom: 0.3125em;
		}

		.img_ttd {
			width: 200px;
			margin-right: 110px;
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
			padding-right: 0.75rem;
			padding-left: 0.75rem;
			margin-right: auto;
			margin-left: auto;
		}

		.bawah {
			display: block;
			position: absolute;
			float: right;
			margin-right: 160px;
		}

		.kepala {
			display: block;
			position: absolute;
			float: left;
			margin-top: 200px;
			margin-right: -500px;
		}

		.table {
			color: #000;
		}

		.table-bordered {
			border-width: 2px;
			border-color: #000;
			margin-left: 15px;
		}

		.card {
			position: relative;
			background: url(<?= base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp14.png') ?>) no-repeat;
			background-size: cover;
			overflow: hidden;
		}
	</style>

</head>

<body class="body" id="page-top">
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">
							<center>
								<div class="logosurat row">
									<div class="col-md-12 mb-3">
										<object data="" type="image">
											<img class="logosurat" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
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
											<h5><b>PIAGAM TANDA DAFTAR</b></h5>
											<h5><b>LEMBAGA PENDIDIKAN AL-QUR'AN (LPQ)</b></h5>
											<p><b> Nomor:.../Kk.11.10/.../PP.00.1/.../......</b></p>
										</div>
									</center>
									<br>
									<div class="isi_surat">
										<p>&nbsp; &nbsp; &nbsp; Diberikan kepada :</p>
									</div>
									<div class="isi_surat identitas">
										<table class="table-responsive">
											<tbody>
												<tr>
													<td>Nama LPQ</td>
													<td> </td>
													<td> </td>
													<td>:</td>
													<td> </td>
													<td><?= $detail->nama_lpq ?></td>
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
													<td>Yayasan</td>
													<td> </td>
													<td> </td>
													<td>:</td>
													<td> </td>
													<td><?= $detail->yayasan ?></td>
												</tr>
												<tr>
													<td>SK Menkumham RI</td>
													<td> </td>
													<td> </td>
													<td>:</td>
													<td> </td>
													<td><?= $detail->sk_menkumham ?></td>
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
													<td>Berlaku</td>
													<td> </td>
													<td> </td>
													<td>:</td>
													<td> </td>
													<td><?= format_indo(date($detail->berlaku)) ?></td>
												</tr>

											</tbody>
										</table>
									</div>
									<div class="isi_surat">
										<p>&nbsp;&nbsp; &nbsp; Dengan Nomor Statistik Pendidikan Al-Qur'an :</p>
									</div>
									<div class="">
										<table class="table table-bordered ">
											<tbody>
												<tr>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
													<td>xx</td>
											</tbody>
											</tr>
										</table>

									</div>
									<div class="no_statistik">

									</div>
									<br> <br>
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<div class="badan_surat isi_surat">
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												<p>Klaten, 03 Maret 2020</p>
												<h6>MENTERI AGAMA</h6>
												Kepala Kantor Kementerian Agama
												Kabupaten Klaten<br><br><br><br>
												<b>Anif Solikhin</b><br>
											</div>
										</div>
									</div>
								<?php } ?>
								</div>
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