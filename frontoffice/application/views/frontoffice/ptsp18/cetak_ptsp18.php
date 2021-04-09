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
		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}

		.card-body {
			padding: 5rem;
			color: black;
		}

		.badan_surat {
			opacity: 0.8;
		}

		.badan_surat {
			font-family: 'Arial';
		}

		.no_surat {
			font-weight: bold;
			font-size: 12pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Arial';
			text-indent: 50px;
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
			display: block;
			position: absolute;
			float: right;
			margin-right: 160px;
		}

		.kepala {
			display: block;
			position: absolute;
			float: left;
			margin-top: 200px;
			margin-right: -500px;
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
										<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/') ?>images/kop_surat.png">
									</object>
								</div>
							</div>
						</center>

						<div class="badan_surat">
							<div class="no_surat">
								<center>
									<?php foreach ($detail_ptsp as $detail) { ?>
										<p><b>REKOMENDASI</b><br>
											<b>Nomor : <?= $detail->no_surat ?></b>
										</p>
									<?php } ?>
								</center>
							</div>
							<div class="isi_surat paragraf">
								<?php foreach ($detail_ptsp as $detail) { ?>
									<p class="text-justify">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Berdasarkan surat dari Takmir Masjid <?= $detail->nama_masjid ?> Nomor :
										<?= $detail->no_surat_permohonan ?>
										tanggal <?= $detail->tgl_surat_permohonan ?> perihal Permohonan Surat Rekomendasi dan
										memperhatikan kelengkapan
										proposal yang diajukan, dengan ini kami memberikan rekomendasi kepada :
									</p>
								<?php } ?>
							</div>
							<div class="isi_surat identitas">
								<?php foreach ($detail_ptsp as $detail) { ?>
									<table class="table-responsive">
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
								<?php } ?>
							</div>

							<br>
							<div class="isi_surat paragraf">
								<p>untuk mendapatkan bantuan renovasi masjid dari Gubernur Jawa Tengah.</p>
								<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Demikian rekomendasi ini kami buat untuk dipergunakan sebagimana mestinya.</p>
							</div>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="isi_surat">
										<center>

											Klaten, 03 Maret 2020<br>
											Kepala
										</center>
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
									<div class="isi_surat">
										<center>
											<u><b>H. Anif Solikhin, S.Ag. MSI</b></u><br>
											Nip. 197004201995031003
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
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->
</body>

</html>