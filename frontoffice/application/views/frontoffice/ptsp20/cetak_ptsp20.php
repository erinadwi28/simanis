<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIMELATI: Cetak Surat</title>

	<!--Tittle Icon-->
	<link rel="shortcut icon" href="<?= base_url('../assets/landing/images/') ?>title.png" />

	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.body {
			color: #000;
			font-family: Calibri, Helvetica, Arial, sans-serif;
			font-size: 11pt;
		}

		.logosurat {
			height: 130px;
			width: 130px;
			margin-top: -20px;
			margin-left: 170px;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;

		}

		/* .card-body {
			padding: 5rem;
		} */

		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			margin-left: 60px;
		}

		.row {
			font-size: 11pt;
		}

		.no_surat {
			font-size: 11pt;
		}

		.tujuan_surat {
			font-size: 11pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			text-indent: 50px;
			font-size: 11pt;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.5em;
			text-align: justify;
			margin-top: 5x;
		}

		.identitas {
			margin-left: 2.8125em;
			margin-bottom: 0.3125em;
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


		.table {
			color: #000;
		}

		.table-bordered {
			border-width: 2px;
			border-color: #000;
			margin-left: 15px;
		}

		tbody {
			line-height: 1.5em;
		}

		.petugas>.nomor {
			padding-right: 0px;
		}

		.petugas>.data {
			padding-left: -0px;
			margin-left: -15px;
		}

		p {
			margin-bottom: 0px;
		}

		.pelaksanaan {
			margin-left: 0px;
		}

		.ketentuan {
			margin-left: 10px;
		}

		.tgl {
			text-align: right;
		}

		.kpl {
			margin-left: 509px;
		}

		.rekomendasi {
			text-align: center;
		}

		.img {
			padding-top: 10px;
		}

		.img img {
			padding-left: 10px;
		}

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
			margin-top: 5px;
			margin-right: 17px;
		}

		.ttd_surat {
			font-size: 11pt;
			margin-left: 350px;
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
								<div class="logosurat row ">
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
											<h6><b>KANTOR KEMENTRIAN KABUPATEN KLATEN </b></h6>
											<p>Jalan Ronggowarsito Klaten <br>
												Telepon/Faksimili (0272)321154 <br>
												Website : http://klaten.kemenag.go.id <br> <br> </p>
										</div>
									</center>
									<p style="margin-left: 90px;">&emsp;<b>PIAGAM IZIN OPERASIONAL MAJELIS TAKLIM</b>
										<br><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nomor : <?= $detail->no_surat ?></b>
									</p>
									</center>
								</div><br>
								<div class="isi_surat">
									<p align="justify">&emsp;&emsp;
										Dengan ini Kepala Kantor Kementrian Agama Kabupaten Klaten memberikan Nomor Statistik Majelis Taklim Kepada :
									</p>
								</div>
								<div class="isi_surat identitas">
									<table>
										<tbody>
											<tr>
												<td>&emsp;&emsp;Nama Majelis Taklim </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nama_majelis_taklim ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Alamat </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->alamat ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Desa </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->desa ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Kecamatan </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->kecamatan ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Kabupaten </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->kabupaten ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Provinsi </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->provinsi ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Tahun Berdiri </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->tahun_berdiri ?></td>
											</tr>
											<tr>
												<td>&emsp;&emsp;Nomor Statistik </td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->no_statistik ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat">
									<p align="justify">dan Majelis Taklim tersebut telah terdaftar pada Kantor
										&emsp; &emsp;Kementrian Agama Kabupaten Klaten
									</p>
									<p>Demikian untuk dapat digunakan sebagimana mestinya.</p>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">
										<div class="badan_surat ttd_surat">
											<P>
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												Diterapkan di : Klaten <br>
												Pada Tanggal : <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
												Kepala,
											</P>
										</div>
									</div>
								</div>
							<?php } ?>
							<br> <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<div class="badan_surat ttd_surat">
										<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
										<?php
										foreach ($data_kepala as $detail) { ?>
											<P>
												<u><b><?= $detail->nama ?></b></u><br>
												Nip. <?= $detail->nip ?>
											</P>
										<?php } ?>
									</div>
								</div>
							</div>
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