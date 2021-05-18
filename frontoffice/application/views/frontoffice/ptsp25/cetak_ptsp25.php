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
			height: 130px;
			width: 130px;
			margin-top: -20px;
			margin-left: 170px;
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
			margin-top: 5x;
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
			margin-left: 350px;
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

						<div class="badan_surat">
							<div class="no_surat">
								<center>
									<p><u><b>FORMULIR KONSULTASI</u></b></p>
								</center>
							</div><br>
							<div class="isi_surat identitas">
								<table>
									<?php
									foreach ($detail_ptsp as $detail) { ?>
										<tbody>
											<tr>
												<td>NAMA</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->nama_pemohon; ?></td>
											</tr>
											<tr>
												<td>ALAMAT</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->alamat ?></td>
											</tr>
											<tr>
												<td>PEKERJAAN</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->pekerjaan ?></td>
											</tr>
											<tr>
												<td>NOMOR HP</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->no_hp ?></td>
											</tr>
											<tr>
												<td>PERIHAL KONSULTASI</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
												<td><?= $detail->perihal_konsultasi ?></td>
											</tr>
										</tbody>
									<?php } ?>
								</table>
							</div>
							<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<?php
									foreach ($detail_ptsp as $detail) { ?>
										<div class="badan_surat ttd_surat">
												Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
												Pemohon,
												<br><br>

												(<?= $detail->nama_pemohon ?>)
										</div>
									<?php } ?>
								</div>
							</div>
							</div><br><br>
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

					<div class="badan_surat">
						<div class="no_surat">
							<center>
								<p><u>LEMBAR KONSULTASI</u> </p>
							</center>
						</div>
						<div class="isi_surat identitas">
							<?php
							foreach ($detail_ptsp as $detail) { ?>
								<table border="1" cellpadding="5" width="530px">
									<br><br>
									<p>Data Pemohon Konsultasi</p>
									<tr>
										<td width="30px">1</td>
										<td width="190px">Nama</td>
										<td><?= $detail->nama_pemohon ?></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Alamat</td>
										<td><?= $detail->alamat ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Telp</td>
										<td><?= $detail->no_hp ?></td>
									</tr>
								</table>
							<?php } ?>
						</div>
						<div class="isi_surat identitas">
							<?php
							foreach ($detail_ptsp as $detail) { ?>
								<table border="1" cellpadding="5" width="530px">
									<br><br>
									<p>Petugas Penerima</p>
									<tr>
										<td width="30px">1</td>
										<td width="190px">Nama</td>
										<td><?= $detail->nama_petugas ?></td>
									</tr>
									<tr>
										<td>2</td>
										<td>NIP</td>
										<td><?= $detail->nip_petugas ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Pangkat/Golru</td>
										<td><?= $detail->pangkat_golongan ?></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Jabatan</td>
										<td><?= $detail->jabatan ?></td>
									</tr>
								</table>
							<?php } ?>
						</div>

						<div class="isi_surat identitas">
							<?php
							foreach ($detail_ptsp as $detail) { ?>
								<table border="1" cellpadding="5" width="530px">
									<br><br>
									<tr>
										<td width="30px">1</td>
										<td width="190px">Hari /Tanggal </td>
										<td colspan="3"><?= $detail->hari_konsultasi ?></td>
									</tr>
									<tr>
										<td>2<br><br><br><br><br><br> </td>
										<td>Materi Konsultasi<br><br><br><br><br><br> </td>
										<td colspan="3"> </td>
									</tr>
									<tr>
										<td>3<br><br><br><br><br><br><br><br><br><br><br> </td>
										<td>Hasil Konsultasi<br><br><br><br><br><br><br><br><br><br><br> </td>
										<td colspan="3"> </td>
									</tr>
									<tr>
										<td>4<br><br><br><br><br><br> </td>
										<td>Tindak Lanjut Konsultasi<br><br><br><br><br><br> </td>
										<td colspan="3"> </td>
									</tr>
									<tr>
										<td colspan="3"> </td>
										<td> </td>
										<td>Klaten,................</td>
									</tr>
									<tr>
										<td width="250px" colspan="3">
											<center>Petugas Penerima<br><br><br><br> (<?= $detail->nama_petugas ?>) </center>
										</td>
										<td> </td>
										<td width="250px">
											<center>Yang Berkonsultasi<br><br><br><br> (<?= $detail->nama_pemohon ?>) </center>
										</td>
									</tr>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
	</div>
</body>

</html>