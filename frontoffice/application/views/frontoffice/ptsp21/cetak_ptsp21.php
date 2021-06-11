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
			height: 100px;
			width: 100px;
			margin-top: 40px;
			margin-left: 0;
			text-align: center;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;

		}

		.card-body {
			padding: 0;
		}


		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			margin-left: 0;
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
			margin-left: 0;
			font-size: 11pt;
			line-height: 1.5em;
			text-align: center;
			/* margin-top: 1x; */
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
			margin-left: 0;
		}

		.tgl {
			text-align: center;
		}

		.kpl {
			margin-left: 0;
		}

		.rekomendasi {
			text-align: center;
		}

		.img {
			padding-top: 10px;
		}

		.img img {
			padding-left: 0;
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
		}
		
		.sertif {
		background: url(<?=base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp21.png') ?>);
		background-repeat: no-repeat;
		background-size:contain;
		background-position-x: center;
		background-position-y: top;
		z-index: 200;
		margin-left: 80px;
		}
	</style>
</head>
<body class="body" id="page-top">
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col sertif">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">
							<center>
								<div>
									<object data="" type="image">
										<img class="logosurat" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
									</object>
								</div>
								<div class="badan_surat">
									<?php foreach ($detail_ptsp as $detail) { ?>
										<div class="kepala_Sertifikat">
											<h4 style="margin-top: 20px;"><b>SERTIFIKAT</b></h4>
											<h6><b>Nomor : <?= $detail->no_surat ?> </b></h6>
											<p>Kepala Kantor Kementrian Agama Kabupaten Klaten Menerangkan bahwa : </p>
										</div>
										<div class="no_surat">
											<h6><b>MASJID/MUSHALLA <?= $detail->nama_masjid ?></b></h6>
											<p>Dukuh <?= $detail->dukuh ?>, RT <?= $detail->rt ?>, RW <?= $detail->rw ?>, Desa <?= $detail->desa ?>, Kecamatan <?= $detail->kecamatan ?>, Kabupaten Klaten</p>
										</div>
										<div class="isi_surat">
											<p>Telah dilakukan pengukuran arah kiblat : </p>
											<p> Oleh Tim Sertifikat Arah Kiblat Kabupaten Klaten</p>
											<p><?= format_indo(date($detail->tgl_pengukuran)); ?> M</p>
											<p>Pada hari,<?= $detail->hari_pengukuran ?> tanggal,<?= format_indo(date($detail->tgl_pengukuran)); ?></p>
											<p><?= $detail->tgl_pengukuran_hijriyah ?></p>
											</p>
											<p>Dengan rashadul kiblat/waktu pengukuran pukul <?= $detail->jam_pengukuran ?> WIB</p>
										</div>
									<?php } ?>
									<div class="row">
										<div class="col-md-6">
											<div class="badan_surat ttd_surat">
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												<?php
												foreach ($detail_ptsp as $detail) { ?>
													<p>Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?> <br>
														Kepala,
													</p>
												<?php } ?>
												<br>
												<?php
												foreach ($data_kepala as $detail) { ?>
													<br><?= $detail->nama ?></br>
													Nip. <?= $detail->nip ?>
												<?php } ?>
											</div>
										</div>
									</div>
							</center>
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