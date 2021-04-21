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
	<link rel="shortcut icon" href="<?= base_url('assets/landing/images/') ?>title.png" />

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" />
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.kopsurat {
			width: 700px;
		}

		.card-body {
			margin-right: 50px;
		}

		.badan_surat {
			color: #000;
		}

		.badan_surat {
			font-family: 'Arial';
		}

		.no_surat {
			font-weight: bold;
			font-size: 12pt;
			text-align: center;
			margin-left: 110px;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Arial';
			text-indent: 50px;
			color: #000000 !important;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
			font-family: 'Arial';
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
			position: absolute;
			float: right;
			margin-right: 160px;
		}

		.kepala {
			display: block;
			position: absolute;
			float: left;
			margin-top: 65px;
			margin-right: -300px;
		}

		.nama-terang {
			margin-left: 220px !important;
		}

		table {
			margin-left: 30px;
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
						<center>
							<div class="kopsurat row">
								<div class="col-md-12 mb-3">
									<object data="" type="image">
										<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
									</object>
								</div>
							</div>
						</center>

						<div class="badan_surat">
							<div class="no_surat">
								<?php foreach ($detail_ptsp as $detail) { ?>
									<p><u>SURAT KETERANGAN</u><br>
										Nomor : <?= $detail->no_surat ?> </p>
								<?php } ?>
							</div>
							<div class="isi_surat paragraf">
								<?php foreach ($data_pemohon as $detail) { ?>
									<p>Menindaklanjuti surat permohonan dari Saudara <?= $detail->nama ?> tentang
										Permohonan Surat Keterangan Haji Pertama, dengan ini Kepala Kantor
										Kementrian Agama Kabupaten Klaten menerangkan bahwa :</p>
								<?php } ?>
							</div>
							<?php foreach ($detail_ptsp as $detail) { ?>
								<div class="isi_surat identitas">
									<table class="table-responsive">
										<tbody>
											<tr>
												<td>Nama</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nama ?></td>
											</tr>
											<tr>
												<td>Tempat dan Tanggal Lahir</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?> </td>
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
												<td>Nomor Porsi</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nomor_porsi ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat paragraf">
									<p>Adalah jemaah haji Kabupaten Klaten Tahun <?= $detail->tahun_hijriah ?> H / <?= $detail->tahun_masehi ?> M dan perjalanan
										ibadah hajinya merupakan yang pertama.
									</p>
									<p>
										Demikian surat keterangan ini dibuat untuk dapat dipergunakan
										sebagaimana
										mestinya
									</p>
								</div>
								<div class="row bawah">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">
										<div class="badan_surat isi_surat">
											<center>
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												Klaten, 03 Maret 2020<br>
												Kepala
											</center>
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="row ttd_kades">
								<div class="col-md-6 ">
								</div>
								<div class="col-md-6">

								</div>
							</div>
							<br> <br>
							<div class="row kepala">
								<div class="col-md-6 ">
								</div>
								<div class="col-md-6 nama-terang">
									<center>
										<div class="isi_surat">
											<u><b>H. Anif Solikhin, S.Ag. MSI</b></u><br>
											NIP. 197004201995031003
										</div>
									</center>
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
	</div>
	<!-- End of Main Content -->
</body>

</html>