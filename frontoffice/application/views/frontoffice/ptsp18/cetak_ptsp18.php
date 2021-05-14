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
			font-family: Calibri, Helvetica, Arial, sans-serif;
			font-size: 11pt;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}

		.card-body {
			color: black;
		}

		.badan_surat {
			font-size: 11pt;
		}

		.no_surat {
			font-weight: bold;
			font-size: 12pt;
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
						<div class="badan_surat">
							<?php foreach ($detail_ptsp as $detail) { ?>
								<div class="no_surat">
									<center>
										<p><b>REKOMENDASI</b><br>
											<b>Nomor : <?= $detail->no_surat ?></b>
										</p>
									</center>
								</div>
								<div class="isi_surat">
						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Berdasarkan surat dari Takmir Masjid <?= $detail->nama_masjid ?> Nomor :
										<?= $detail->no_srt_permohonan ?>
										tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?> perihal Permohonan Surat Rekomendasi dan
										memperhatikan kelengkapan
										proposal yang diajukan, dengan ini kami memberikan rekomendasi kepada :
									</p>
								</div>
								<div class="isi_surat identitas">
									<table>
										<tbody>
											<tr>
												<td>Nama Masjid</td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nama_masjid ?></td>
											</tr>
											<tr>
												<td>Nama Ketua Takmir</td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nama_ketua_takmir ?></td>
											</tr>
											<tr>
												<td>Alamat Masjid</td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->alamat_masjid ?></td>
											</tr>
											<tr>
												<td>Nomor ID Masjid</td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->no_id_masjid ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat">
									<p>untuk mendapatkan bantuan renovasi masjid dari Gubernur Jawa Tengah.</p>
									<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Demikian rekomendasi ini kami buat untuk dipergunakan sebagimana mestinya.</p>
								</div>
								<br> <br>
								<div class="row">
									<div class="col-md-9">
									</div>
									<div class="col-md-3">
										<div class="ttd_surat">
												Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
												Kepala
										</div>
									</div>
								</div>
							<?php } ?>
							<br> <br> <br> <br>
							<div class="row">
								<div class="col-md-9">
								</div>
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="col-md-3">
										<div class="ttd_surat">
												<u><b><?= $detail->nama ?></b></u><br>
												Nip. <?= $detail->nip ?>
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
	</div>
	<!-- End of Main Content -->
</body>

</html>
