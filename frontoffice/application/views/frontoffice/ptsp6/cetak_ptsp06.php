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
			margin-top: 65px;
			margin-right: -300px;
		}

		.table-bordered {
			border-color: #000;
			color: #000;
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
										<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/') ?>images/kop_surat.jpg">
									</object>
								</div>
							</div>
						</center>
						<em>//masih dalam perbaikan</em>
						<div class="badan_surat">
							<div class="no_surat">
								<?php foreach ($detail_ptsp as $detail) { ?>
									<center>
										<p><u>SURAT REKOMENDASI</u><br>
											Nomor : <?= $detail->no_surat ?></p>
									</center>
							</div>
							<div class="isi_surat">
								<p> <b> Assalamu'alaikum Wr. Wb</b></p>
								<p>Kepala Kantor Kementerian Agama Kab. Klaten dengan ini menerangkan bahwa</p>

							</div>
							<div class="">
								<table class="table table-bordered ">
									<thead>
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
											<td>1.</td>
											<td><?= $detail->nama_jamaah_haji ?></td>
											<td><?= $detail->alamat ?></td>
											<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?></td>
											<td><?= $detail->no_hp ?></td>
									</tbody>
									</tr>
								</table>

							</div>

							<br>
							<div class="isi_surat paragraf">
								<p>Adalah calon Jamaah Umrah/Haji Khusus yang terdaftar di <?= $detail->nama_ppiu_pihk ?>
									sebagai Penyelenggara Ibadah Umrah/Haji Khusus yang terdaftar resmi pada
									Kementerian Agama dengan SK Nomor <?= $detail->no_sk_ppiu_pihk ?> Tahun <?= $detail->tahun_sk ?>
								</p>
								<p>
									Rekomendasi ini dibuat sebagai pertimbangan dalam pembuatan paspor untuk
									keperluan kepergian Ibadah Umrah/Haji Khusus yang bersangkutan.
								</p>
								<p>
									Demikian rekomendasi ini kami buat untuk dipergunakan sebagimana mestinya.
								</p>
							</div>
							<div class="isi_surat">
								<p><b> Wassalmu'alaikum Wr. Wb.</b></p>
							</div>
							<div class="row bawah">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="isi_surat">
										<center>
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
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
							<div class="row kepala">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="isi_surat">
										<center>
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
											<u><b>H. Anif Solikhin, S.Ag. MSI</b></u><br>
											Nip. 197004201995031003
										</center>
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