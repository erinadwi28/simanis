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

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}

		/* margin baru ditanyakan pihak kemenag */
		/* .card-body {
			padding: 5rem;
		} */

		.badan_surat {
			color: #000;

			font-size: 11pt;
		}

		.badan_surat .row {
			color: #000;
		}

		.no_surat {
			font-size: 11pt;
		}

		.paragraf {
			text-align: justify;

			text-indent: 50px;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;

		}


		.ttd_surat {

			font-size: 11pt;
			margin-left: 400px;
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
			margin-left:30px ;
        }
		.table-bordered
		{border: 1px solid #000;

		}
        .table-bordered thead tr,
		.table-bordered thead th
		{
			border: 1px solid #000;

		}
        .table-bordered tbody td {
            border: 1px solid #000;
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
								<center>
									<p><b>REKOMENDASI</b><br>
										Nomor : <?= $detail->no_surat ?></p>
								</center>
							</div>
							<div class="isi_surat">
								<p>Assalamu'alaikum Wr. Wb</p>
							</div>
							<div class="isi_surat paragraf">
								<p>Kepala Kantor Kementerian Agama Kab. Klaten dengan ini menerangkan bahwa:</p>
							</div>
							<div class="">
								<table class="table table-bordered" cellspacing="0">
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
											<td><?= $detail->nama ?></td>
											<td><?= $detail->alamat ?></td>
											<td><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?></td>
											<td><?= $detail->no_hp ?></td>
											</tr>
									</tbody>
									
								</table>
							</div>
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
							</div>
							<div class="isi_surat">
								<p>Wassalmu'alaikum Wr. Wb.</p>
							</div>
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
							<br> <br> <br> <br>
							<div class="row">
								<div class="col-md-9">
								</div>
								<div class="col-md-3">
									<div class="ttd_surat">
										Anif Solikhin<br>

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
