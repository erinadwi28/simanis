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
			font-size: 11pt;
			margin-bottom: 0;
			padding-bottom: 0;
			font-family: 'Times New Roman';
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
			margin-top: 15px;
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
			font-family: 'Times New Roman';
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
			margin-left: 40px;
			margin-right: 50px;
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
							<?php foreach ($detail_ptsp as $detail) { ?>
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
											<h6><b>PIAGAM IZIN OPERASIONAL MAJELIS TAKLIM</b> <br>
												<b>Nomor: <?= $detail->no_surat ?></b>
											</h6>
										</div>
									</center>
								</div><br>
								<div class="isi_surat">
									
										Dengan ini Kepala Kantor Kementrian Agama Kabupaten Klaten memberikan Nomor Statistik Majelis Taklim Kepada :
									
								</div>
								<div class="identitas">
									<table width="600px" class="table_sertif">
										<tbody>
											<tr>
												<td width="150px">Nama Majelis Taklim</td>
												<td width="5px">:</td>
												<td><?= $detail->nama_majelis_taklim ?></td>
											</tr>
											<tr>
												<td valign="top">Alamat</td>
												<td valign="top">:</td>
												<td><?= $detail->alamat ?></td>
											</tr>
											<tr>
												<td>Desa</td>
												<td>:</td>
												<td><?= $detail->desa ?></td>
											</tr>
											<tr>
												<td>Kecamatan</td>
												<td>:</td>
												<td><?= $detail->kecamatan ?></td>
											</tr>
											<tr>
												<td>Kabupaten</td>
												<td>:</td>
												<td><?= $detail->kabupaten ?></td>
											</tr>
											<tr>
												<td>Provinsi</td>
												<td>:</td>
												<td><?= $detail->provinsi ?></td>
											</tr>
											<tr>
												<td>Tahun Berdiri</td>
												<td>:</td>
												<td><?= $detail->tahun_berdiri ?></td>
											</tr>
											<tr>
												<td>Nomor Statistik</td>
												<td>:</td>
												<td><?= $detail->no_statistik ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat">
									dan Majelis Taklim tersebut telah terdaftar pada Kantor
										&emsp; &emsp;Kementrian Agama Kabupaten Klaten
									<br>
									Demikian untuk dapat digunakan sebagimana mestinya.
								</div>
								<br>
								<div class="row">
									
									<div class="col">
										<div class="ttd_surat" style="margin-left: 350px;">
											<P>
												Diterapkan di : Klaten <br>
												Pada Tanggal : <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
												Kepala,
												<br><br><br>
												<?php } ?>
												<?php
										foreach ($data_kepala as $detail) { ?>
												<u><b><?= $detail->nama ?></b></u><br>
												Nip. <?= $detail->nip ?>
										<?php } ?>
											</P>
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