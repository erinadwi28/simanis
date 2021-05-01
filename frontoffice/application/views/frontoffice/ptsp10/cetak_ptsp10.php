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
			font-size: 11pt;
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
			font-size: 11pt;
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

		.table {
			color: #000;
		}

		.table-bordered {
			border-width: 2px;
			border-color: #000;
			margin-left: 15px;
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
			margin-left: 400px;
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
						<?php
						foreach ($detail_ptsp as $detail) { ?>
						<!-- KOP SURAT -->
						<center>
							<table width="530">
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
						<div class="no_surat">
							<center>
								<p><b>REKOMENDASI </b><br>
									Nomor: <?= $detail->no_surat ?>
								</p>
							</center>
						</div>
						<div class="isi_surat">
							<p> Assalamu'alaikum Wr. Wb.
							</p>
						</div>
						<div class="isi_surat">
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan permohonan dari Saudara <?= $detail->nama_pemohon ?> selaku Pimpinan PT
								<?= $detail->nama_pt ?> perihal
								Rekomendasi Perpanjang Izin Operasional Kantor Cabang PPIU. Setelah dilakukan peninjauan
								terhadap Kantor
								Cabang PT <?= $detail->nama_pt ?> yang berdomisili di
								<?= $detail->domisili_kantor_cabang ?> maka Kepala Kantor Kementerian Agama Kab. Klaten
								dengan ini
								memberikan rekomendasi kepada:
							</p>
						</div>

						<div class="isi_surat identitas">
							<table>
								<tbody>
									<tr>
										<td>Nama Kantor Cabang</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->nama_kantor_cabang ?></td>
									</tr>
									<tr>
										<td>Alamat Kantor Cabang</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td><?= $detail->alamat_kantor_cabang ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="isi_surat">
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rekomendasi ini dibuat untuk menjadi pertimbangan Perpanjangan Izin Operasional Kantor
								Cabang PPIU sebagai Penyelenggara
								Perjalanan Ibadah Umrah di Kabupaten Klaten.
							</p>
						</div>
						<div class="isi_surat">
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian rekomendasi ini kami buat untuk dipergunakan sebagaimana mestinya.
							</p>
						</div>
						<div class="isi_surat">
							<p>Wassalamu'alaikum Wr. Wb.
							</p>
						</div>
						<div class="row">
							<div class="col-md-9">
							</div>
							<div class="col-md-3">
								<div class="ttd_surat">
									<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
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
							<div class="col-md-3">
								<div class="ttd_surat">
									<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
									Anif Solikhin<br>
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
