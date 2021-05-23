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
						<div class="kopsurat row">
							<div class="col-md-12 mb-3">
								<object data="" type="image">
									<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
								</object>
							</div>
						</div>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="no_surat">
								<center>
									<p><u><b>SURAT TUGAS</b></u><br>
										<b>Nomor : <?= $detail->no_surat ?> </b>
									</p>
								</center>
							</div>
							<br>
							<div class="isi_surat">
								<p align="justify">
									&emsp;&emsp; Dengan ini Kepala Kantor Kementrian Agama Kabupaten Klaten berdasarkan surat permohonan
									Kepala <?= $detail->nama_sekolah_satmikal ?> Kec. <?= $detail->kecamatan_sekolah_satmikal ?> Kab. <?= $detail->kabupaten_sekolah_satmikal ?> tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?> tentang Permohonan
									Guru Pendidikan Agama Islam dan persetujuan Kepala Seksi Pendidikan Agama Islam tanggal <?= format_indo(date($detail->tgl_srt_persetujuan_pengawas_pai)); ?>,
									memerintahkan kepada Pegawai Negri Sipil :
								</p>
							</div>
							<div class="isi_surat identitas">
								<table >
									<tbody>
										<tr>
											<td>&emsp;&emsp; Nama</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_pns ?></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; NIP</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nip ?></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Pangkat/Gol. Ruang</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->pangkat_pns ?></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Jabatan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->jabatan ?></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Ditugaskan di</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_sekolah_tujuan ?></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Terhitung mulai tanggal</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= format_indo(date($detail->tgl_mulai_mengajar)); ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="isi_surat">
								<p align="justify">
									untuk segera melaksanakan tugas sebagai Guru Pertama pada Kantor Kementrian Agama kab. Klaten
									ditugaskan di <?= $detail->nama_sekolah_tujuan ?> Kec. <?= $detail->kecamatan_sekolah_tujuan ?> Kab. <?= $detail->kabupaten_sekolah_tujuan ?> dan <?= $detail->nama_sekolah_satmikal ?> Kec. <?= $detail->kecamatan_sekolah_satmikal ?> Kab. <?= $detail->kabupaten_sekolah_satmikal ?>.
								</p>
								<p align="justify">
									&emsp;&emsp; Demikian untuk maklum dan dilaksanakan sebagaimana mestinya.
								</p>
							</div><br><br>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="badan_surat ttd_surat">
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
											Kepala
											<br><br>
											Anif Solokin
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
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="badan_surat ttd_surat">
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
											<u><b><?= $detail->nama ?></b></u><br>
											Nip. <?= $detail->nip ?>
									</div>
								<?php } ?>
							</div>
						</div>

						<div class="badan_surat">
							<small>Tembusan :</small>
							<ol>
								<li>Kepala Seksi PAIS KanKemenag Kab. Klaten,</li>
								<li>Korwil Pendidikan Kec. Manisrenggo,</li>
								<li>Kepala SD Negri 1 Sukorini Kec. Manisrenggo,</li>
								<li>Kepala SD Negri Sapen Kec. Manisrenggo,</li>
								<li>Sdr. Riyadi Tri Hidayat, S.Pd.I. NIP. 19741221 200501 1 002,</li>
								<li>Arsip.</li>
							</ol>
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