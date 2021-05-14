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

		.card-body {
			padding: 5rem;
			color: black;
		}

		.badan_surat {
			color: #000;
			
			margin-left: 60px;
		}

		.badan_surat .row {
			color: #000;
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

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
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

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
			margin-top: 5px;
			margin-right: 17px;
		}

		.ttd_surat {
			font-size: 11pt;
			margin-left: 470px;
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
					<center>
							<table width="478">
								<tr>
									<td></td>
									<td class="img">
										<center>
											<img src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>"
												width="100" height="100">
										</center>
									</td>
									<td width="430" style="padding-left: 10px;">
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
						<br>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="no_surat">
								<center>
									<p><b>SURAT TUGAS </b><br>
										<b>Nomor : <?= $detail->no_surat; ?></b>
									</p>
								</center>
							</div>
							<div class="isi_surat">
								<p> Dengan ini Kepala Kantor Kementerian Agama Kabupaten Klaten berdasarkan surat
									permohonan Sdr.<?= $detail->nama_pns ?> tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?>
									perihal Permohonan Tambahan Tugas Mengajar yang disetujui Pengawas Pendidikan Agama
									Islam Kec <?= $detail->kecamatan ?> dan
									surat persetujuan Kepala <?= $detail->nama_sekolah_satmikal ?> Kec. <?= $detail->kecamatan_sekolah_satmikal ?>, memerintahkan kepada
									Pegawai Negeri Sipil :
								</p>
							</div>

							<div class="isi_surat identitas">
								<table>
									<tbody>
										<tr>
											<td>Nama</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_pns ?></td>
										</tr>
										<tr>
											<td>NIP</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nip ?></td>
										</tr>
										<tr>
											<td>Pangkat/Gol. Ruang</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->pangkat_gol ?></td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->jabatan ?></td>
										</tr>
										<tr>
											<td>Ditugaskan di</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td><?= $detail->nama_sekolah_tujuan ?></td>
										</tr>
										<tr>
											<td>Terhitung mulai tanggal</td>
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
								<p>untuk segera melaksanakan tugas sebagai Guru Muda pada Kantor Kementerian Agama
									Kab. Klaten ditugaskan di <?= $detail->nama_sekolah_tujuan ?> Kec. <?= $detail->kecamatan_sekolah_tujuan ?> dan <?= $detail->nama_sekolah_satmikal ?> Kec. <?= $detail->kecamatan_sekolah_satmikal ?> Kabupaten <?= $detail->kabupaten_sekolah_satmikal ?>
								</p>
							</div>
							<div class="isi_surat paragraf">
								<p>
									Demikian untuk maklum dan dilaksanakan sebagaimana mestinya
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
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="ttd_surat">
										<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
										<?= $detail->nama ?><br>
									</div>
								<?php } ?>
							</div>
						</div>
						<br> <br> <br>
						<div>
							Tembusan: <br>
							1. Kepala Seksi PAIS Kankemenag Kab. Klaten; <br>
							2. Korwil Pendidikan Kec. Karangdowo; <br>
							3. Kepala SD Negeri 2 Demangan Kec. Karangdowo <br>
							4. Kepala SD Negeri 3 Karangwungu Kec. Karangdowo <br>
							5. Sdr. M. Zajid, S.Ag. NIP. 19740512 200501 1 003; <br>
							6. Arsip
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
