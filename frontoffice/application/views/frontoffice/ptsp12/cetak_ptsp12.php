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
			font-size: 14pt;
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
						<div class="kopsurat row">
							<div class="col-md-12 mb-3">
								<object data="" type="image">
									<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
								</object>
							</div>
						</div>
						<div class="row">
							<?php foreach ($detail_ptsp as $detail) { ?>
								<div class="col-md-10">
									<table>
										<tbody>
											<tr>
												<td>Nomor</td>
												<td></td>
												<td>:</td>
												<td></td>
												<td><?= $detail->no_surat ?></td>
											</tr>
											<tr>
												<td>Sifat</td>
												<td></td>
												<td>:</td>
												<td></td>
												<td><?= $detail->sifat ?></td>
											</tr>
											<tr>
												<td>Lampiran</td>
												<td></td>
												<td>:</td>
												<td></td>
												<td><?= $detail->jml_lampiran; ?></td>
											</tr>
											<tr>
												<td>Hal</td>
												<td></td>
												<td>:</td>
												<td></td>
												<td>Rekomendasi</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-2">
									<p><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></p>
								</div>
							<?php } ?>
						</div>
						<br> <br>
						<?php foreach ($detail_ptsp as $detail) { ?>
							<div class="tujuan_surat">
								<p>Yth. <?= $detail->nama_tujuan; ?> <br>
									di <?= $detail->tempat_tujuan; ?></p>
							</div>
						<?php }  ?>

						<?php foreach ($detail_ptsp as $detail) { ?>
							<div class="isi_surat paragraf">
								<p> Menindaklanjuti surat permohonan dari Kepala <?= $detail->nama_sekolah ?> Nomor : <?= $detail->no_srt_permohonan ?>
									tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?> perihal sebagaimana dalam pokok surat, maka dengan ini Kepala Kantor Kementerian Agma Kabupaten Klaten
									memberikan rekomendasi untuk mengajukan bantuan sarana prasarana </p>
							</div>
							<div class="isi_surat paragraf">
								<p>
									Demikian rekomendasi ini dibuat untuk keperluan mendapatkan bantuan hibah Bupati Klaten
								</p>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="badan_surat isi_surat">
									<center>
										Kepala
									</center>
								</div>
							</div>
						</div>
						<div class="row ttd_kepala">
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
								<div class="badan_surat isi_surat">
									<center>
										<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
										<u><b>Anif Solikhin</b></u>
									</center>
								</div>
							</div>
						</div>
						<div>
							Tempusan Yth: <br>
							Ka. Kanwil. Kemenag. Prov. Jateng</div>
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