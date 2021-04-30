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
			font-size: 11;
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
						<!-- KOP SURAT -->
						<div class="kopsurat row">
							<div class="col-md-12 mb-3">
								<object data="" type="image">
									<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
								</object>
							</div>
						</div>

						<!-- NO SURAT -->
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="no_surat row">
								<div class="col-12 rekomendasi">
									<p><b>REKOMENDASI</b></p>
									<p>Nomor: <?= $detail->no_surat ?></p>
								</div>
							</div>

							<!-- PEMBUKA -->
							<div class="no_surat">
								<br>
								<p>Assalamu'alaikum Wr.Wb</p>
								<br>
							</div>

							<!-- Paragraf 1 -->
							<div class="isi_surat paragraf">
								<p>Berdasarkan permohonan dari Saudara <?= $detail->nama_pemohon ?> selaku ketua Yayasan <?= $detail->nama_yayasan ?> perihal Rekomendasi
									Perpanjangan Izin Operasional Kelompok Bimbingan <?= $detail->nama_kelompok_bimbingan ?>. Setelah dilakukan peninjauan terhadap Kantor Sekretariat Kelompok Bimbingan
									<?= $detail->nama_kelompok_bimbingan ?> yang berdomisili di <?= $detail->domisili_kelompok_bimbingan ?> maka Kepala Kantor Kementerian Agama Kab. Klaten dengan ini memberikan rekomendasi
									kepada:
								</p>
								<br>
							</div>

							<!-- Pelaksanaan -->
							<div class="pelaksanaan">
								<table>
									<tbody>
										<tr>
											<td>Nama Kelompok Bimbingan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_kelompok_bimbingan ?></td>
										</tr>
										<tr>
											<td>Alamat Kantor</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->alamat_kantor ?></td>
										</tr>
									</tbody>
								</table>
							</div>

							<br>

							<!-- Paragraf 2 -->
							<div class="isi_surat paragraf">
								<p>Rekomendasi ini dibuat sebagai pertimbangan untuk mendapatkan Perpanjangan Izin Operasional
									Kelompok Bimbingan <?= $detail->nama_kelompok_bimbingan ?> sebagai Penyelenggara Bimbingan Ibadah Haji di Kabupaten Klaten.</p>
								<p>Demikian surat ini kami sampaikan untuk dapat dipergunakan sebagaimana
									mestinya.
								</p>
							</div>

							<!-- PENUTUP -->
							<div class="no_surat">
								<br>
								<p>Wassalamu'alaikum Wr.Wb</p>
							</div>

							<br>

							<!-- Tanggal -->
							<div class="row">
							<div class="col-md-9">
								</div>
								<div class="col-md-3">
								<div class="ttd_surat">
									Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?> <br>
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
