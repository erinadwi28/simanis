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

		/* margin baru ditanyakan pihak kemenag */
		.card-body {
			padding-right: 4rem;
		}

		.badan_surat {
			color: #000;
			font-size: 11pt;
		}

		.no_surat {
			font-size: 11pt;
			margin-top: 2rem;
			margin-left: 50px;
		}

		.paragraf {
			text-align: justify;
			text-indent: 3rem;
		}

		.isi_surat {
			font-size: 11pt;
			padding: 0;
		}

		p {
			margin-bottom: 0px;
			line-height: 1.5em;
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
			width: 100%;
			color: #000;
			margin-left: 0px;
			margin-bottom: 0px;
		}

		thead {
			padding: 0px;
			text-align: center;
		}

		.table-bordered {
			border: 1px solid #000;

		}

		.table-bordered thead tr,
		.table-bordered thead th {
			border: 1px solid #000;

		}

		.table-bordered tbody td {
			border: 1px solid #000;
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
			margin-left: 430px;
			margin-right: 0px;
			padding: 0;
		}

	</style>

</head>

<body class="body" id="page-top">
	<div class="container-fluid">
		<div class="row">
			<div class="card mb-4 col-12">
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
								<td width="400" style="padding-left: 10px;">
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

					<!-- REK & NO -->
					<?php foreach ($detail_ptsp as $detail) { ?>
					<center>
						<p class="no_surat"><b>REKOMENDASI</b><br>
							Nomor : <?= $detail->no_surat ?></p>
					</center>

					<br>
					<!-- ISI -->
					<div class="badan_surat isi_surat">

						<p>Assalamu'alaikum Wr. Wb</p>
						<div class="paragraf">
							<p>Kepala Kantor Kementerian Agama Kab. Klaten dengan ini menerangkan bahwa:</p>
							<br>
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 30px; padding:2px">No</th>
									<th style="width: 160px; padding:0px">Nama</th>
									<th style="width: 190px; padding:0px">Alamat</th>
									<th style="width: 130px; padding:0px">Tempat/Tgl Lahir</th>
									<th style="width: 120px; padding:0px">No.Telp</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="text-align: center; padding:2px">12</td>
									<td style="padding:2px">Erina Dwi Utami</td>
									<td style="padding:2px">Mudal, Argomulyo, Cangkringan, SLeman, DIY</td>
									<td style="padding:2px">Sleman, <?= $detail->tanggal_lahir ?></td>
									<td style="padding:2px">+6285716609299</td>
								</tr>
							</tbody>

							<!-- <thead>
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
									<td style="text-align: center;">1.</td>
									<td><?= $detail->nama ?></td>
									<td><?= $detail->alamat ?></td>
									<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?></td>
									<td><?= $detail->no_hp ?></td>
								</tr>
							</tbody> -->
						</table>

						<div class="isi_surat paragraf">
							<p>Adalah calon Jamaah Umrah/Haji Khusus yang terdaftar di <?= $detail->nama_agen ?>
								sebagai Penyelenggara Ibadah Umrah/Haji Khusus yang terdaftar resmi pada
								Kementerian Agama dengan SK Nomor: <?= $detail->no_sk_agen ?> Tahun
								<?= $detail->tahun_sk ?>.
							</p>
							<p>Rekomendasi ini dibuat sebagai pertimbangan dalam pembuatan paspor untuk
								keperluan kepergian Ibadah Umrah/Haji Khusus yang bersangkutan.
							</p>
							<p>Demikian rekomendasi ini kami buat untuk dipergunakan sebagimana mestinya.
							</p>
							<br>
						</div>

						<p>Wassalmu'alaikum Wr. Wb.</p>
						<br>
					</div>

					<!-- TTD -->
					<div class="row">
						<div class="ttd_surat col">
							Klaten, 23 September 2021 <br>
							<!-- Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?> <br> -->
							Kepala<br><br><br><br>Anif Solikhin
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
