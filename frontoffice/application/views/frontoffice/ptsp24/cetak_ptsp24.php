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

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/vendor/fontawesome-free/css/all.min.css') ?>" />
	<link
		href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
		rel="stylesheet">
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
			margin-left: 15px;
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

		.kepala_sertifikat {
			font-weight: bold;
			font-size: 14pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
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
			font-size: 14pt;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
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

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
			margin-top: 5px;
			margin-right: 17px;
		}

		.ttd_surat {
			font-size: 11pt;
			margin-left: 470px;
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
						<!-- KOP SURAT -->
						<center>
							<table width="478">
								<tr>
									<td></td>
									<td class="img">
										<center>
											<img src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>"
												width="100" height="100">
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
						<div class="isi_surat identitas">
							<table>
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<tbody>
										<tr>
											<td>Nomor</td>
											<td> </td>
											<td>:</td>
											<td> <?= $detail->no_surat?></td>
										</tr>
										<tr>
											<td>Hal</td>
											<td> </td>
											<td>:</td>
											<td>Permohonan keringanan biaya Pajak Kendaraan</td>
										</tr>
									</tbody>
								<?php } ?>
							</table>
						</div>
						<br>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="isi_surat  paragraf">
								<p>Kepada Yth.
								<br> Sdr. <?= $detail->pemilik_kendaraan ?>
								<br> Di Klaten</p>
								<p>Dengan Hormat, </p>
								<p>ini kami menerangkan bahwa :</p>
							</div>
						<?php } ?>
						<div class="isi_surat identitas">
							<table>
								<tbody>
									<tr>
										<td>Nama</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Drs. YB Heru Kristomo</td>
									</tr>
									<tr>
										<td>NIP</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>19670909 200003 1001</td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Penyelenggara Bimas Katolik Kantor Kementrian Agama Kab. Klaten</td>
									</tr>
								</tbody>
							</table>
						</div><br>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="isi_surat paragraf">
								<p align="justify">&emsp;&emsp; Menerangkan bahwa kendaraan roda <?= $detail->jml_roda_kendaraan ?> <?= $detail->merek_kendaraan ?> dengan Nomor Polisi <?= $detail->no_polisi ?>,
									milik PGPM Paroki Bunda Maria Dari Sakramen Mahakudus sebagai <?= $detail->fungsional_kendaraan ?> di wilayah Klaten Kota dan sekitarnya untuk itu <b>mohon keringanan pajak kendaraan.</b>
									<br>&emsp;&emsp; Demikian permohonan ini dibuat, agar digunakan sebagaimana mestinya.
									<br>Terima kasih.
								</p>
							</div>
						<?php } ?>
						<br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="badan_surat ttd_surat">
										<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
										Klaten, 03 Maret 2020<br>
										An. Kepala Penyelenggara Katolik
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
								<div class="badan_surat ttd_surat">
										<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
										<u><b>Drs. YB.Heru Kristomo</b></u><br>
								</div>
							</div>
						</div>
						<br><br><br>
						<div class="isi_surat">
							<p>Tembusan :</p>
							<ol>
								<li>KanKemenag Kab. Klaten</li>
								<li>Gereja Katolik Paroki Bunda Maria dan Sakramen Mahakudus di Klaten</li>
							</ol>
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