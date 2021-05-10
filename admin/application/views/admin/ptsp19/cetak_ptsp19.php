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
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.body {
			color: #000;
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
		}

		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			font-family: 'Times New Roman';
			margin-left: 60px;
		}

		.kepala_sertifikat {
			font-weight: bold;
			font-size: 14pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
		}

		.row {
			font-size: 14pt;
			font-family: 'Times New Roman';
		}

		.no_surat {
			font-size: 14pt;
		}

		.tujuan_surat {
			font-size: 14pt;
			font-family: 'Times New Roman';
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Times New Roman';
			text-indent: 50px;
			font-size: 14pt;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 14pt;
			line-height: 1.2em;
			font-family: 'Times New Roman';
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
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="row">
								<div class="col-md-10">
									<table>
										<tbody>
											<tr>
												<td>Nomor</td>
												<td></td>
												<td>:</td>
												<td><?= $detail->no_surat ?></td>
											</tr>
											<tr>
												<td>Sifat</td>
												<td></td>
												<td>:</td>
												<td><?= $detail->sifat ?></td>
											</tr>
											<tr>
												<td>Lampiran</td>
												<td></td>
												<td>:</td>
												<td><?= $detail->jml_lampiran ?> Lembar</td>
											</tr>
											<tr>
												<td>Hal</td>
												<td></td>
												<td>:</td>
												<td>Jadwal Petugas siaran Keagamaan</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-2">
									<p><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></p>
								</div>
							</div>
							<br> <br>

							<div class="isi_surat paragraf">
								<p>Yth. Kepala <?= $detail->nama_studio ?> <br> di <?= $detail->kabupaten_studio ?></p> <br>
								<p>Assalamu'alaikum wr.wb. </p>
								<p align="justify">&emsp;&emsp; Memenuhi permohonan dari kepala <?= $detail->nama_studio ?> Nomor : <?= $detail->no_srt_permohonan ?> tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?>
									perihal sebagaimana tersebut dalam pokok surat, dengan ini kami sampaikan nama-nama Petugas Siaran Keagamaan <?= $detail->agama ?>
									pada bulan <?= $detail->bln_siaran ?> 2021 RSPD Klaten sebagaimana terlampir.</p>
								<p>&emsp;&emsp; Demikian atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>
								<p>Wassalamu'alaikum wr.wb.</p> <br><br>
							</div>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											Klaten, <?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?> <br>
											Kepala
										</center>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<div class="badan_surat isi_surat">
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
											<u><b><?= $detail->nama ?></b></u><br>
											Nip. <?= $detail->nip ?>
										</center>
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
	</div>
	<!-- /.container-fluid -->

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
						foreach ($detail_ptsp as $detail) {  ?>
							<div class="no_surat">
								<center>
									<p><u><b>SURAT TUGAS</b></u><br>
										<b>Nomor :<?= $detail->no_surat_tugas ?> </b>
									</p>
								</center>
							</div>
						<?php } ?>
						<br>
						<div>

							<P><b>Menimbang : </b>
							<p align="justify">&emsp;&emsp;bahwa sehubungan dengan pelaksanaan tugas dan fungsi
								organisasi lingkungan Kantor Kementrian Agama Kabupaten Klaten dipandang perlu membuat
								surat tugas dinas pada Kantor Kementrian Agama Kabupaten Klaten
							</p>
							</P>
						</div>
						<div>
							<P><b>Dasar : </b>
							<ol type="1" class="ml-0 list-syarat">
								<li>Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara</li>
								<li>Peraturan Menteri Agama Nomor 19 Tahun 2019 tentang Organisasi dan
									Tata Kerja Instansi Vertikal Kementerian Agama</li>
								<li>Surat dari Kepala Studio Radio RSPD Klaten Nomor
									<br> 005/70/RSPD/III/2021 Tanggal 9 Maret 2021
								</li>
							</ol>
							</p>
						</div>
						<div class="no_surat">
							<center>
								<p>Memberi Tugas</p>
							</center>
						</div>
						<div>
							<P><b>Kepada Untuk : </b> Penyuluh Agama Islam Sebagaimana terlampir
							<ol type="1" class="ml-0 list-syarat">
								<li>Melaksanakan tugas dan fungsi organisasi di lingkungan Kantor</li>
								<li>Melaksanakan siaran keagamaan Islam di RSPD Klaten pada bulan
									April 2021(Jadwal terlampir)</li>
								<li>Adapun Ketentuan penyelenggaraan siaran sebagai berikut.
									<br> a. 30 menit sebelum siaran dimulai harus sudah siap di Studio
									dengan perlengkapan yang diperlukan
									<br> b. Acara sewaktu waktu dapat diadakan perubahan.
									<br> c. Siaran berupa kaset/CD dapat dibatalkan penyiaran apabila hasil rekaman tidah baik
									<br> d. Rekaman dapat dilakukan di LPPL RSPD Klaten dengan pemberitahuan
									maksimal (2) dua hari sebelum tanggal penyiaran disertai dengan
									matrai siaran pada hari dan jam kerja Senin s/d Kamis pukul 05.30/06.00 wib
								</li>
								<li>Setelah selesai melaksanakan tugas ini segera melaporkan kepada pimpinan</li>

							</ol>
							</p>
						</div>
						<br> <br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											Klaten,<?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?> <br>
											Kepala
										</center>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<br> <br>
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<div class="badan_surat isi_surat">
								<?php
								foreach ($data_kepala as $detail) { ?>
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
											<u><b><?= $detail->nama ?></b></u><br>
											Nip. <?= $detail->nip ?>
										</center>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php
					foreach ($detail_ptsp as $detail) { ?>
						<div class="isi_surat">
							<p>Tembusan :</p>
							<ol>
								<li>Kepala Studio <?= $detail->nama_studio ?></li>
							</ol>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- /.container-fluid -->
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="row">
							<div class="col-md-10">
								<p>Lampiran</p>
								<p>Jadwal Petugas Siaran Keagamaan Islam RSPD Klaten</p>
								<p>Bulan April 2021</p>
							</div>
						</div>
						<br>
						<CENTER>
							<div class="isi_surat identitas">

								<table border="1" cellpadding=2 cellspacing=3>
									<tr>
										<td>No</td>
										<td>NAMA PETUGAS SIARAN</td>
										<td>HARI TANGGAL SIARAN</td>
										<td>JAM SIARAN</td>
										<td>MATA SIARAN</td>
									</tr>
									<tr>
										<td> 1 </td>
										<td>H. Lagimin, S.Ag,M.Ag</td>
										<td>Kamis, 1 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 2 </td>
										<td>Ahmad Royani, S.Ag,</td>
										<td>Senin, 5 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 3 </td>
										<td>Drs.Abdul Basir</td>
										<td>Selasa, 6 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 4 </td>
										<td>Dra.Hj.Istikomah,M.Ag</td>
										<td>Rabu, 7 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 5 </td>
										<td>M.Zuhri,S.Ag.M.Si</td>
										<td>Kamis, 8 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 6 </td>
										<td>Andrianto Heri W, S.H.I.M.Ag</td>
										<td>Senin, 12 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 7 </td>
										<td>Moh Suryana,S.Pd.I.S.H.Ag</td>
										<td>Selasa, 13 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 8 </td>
										<td>H. Sunarso, S.Ag,M.Ag</td>
										<td>Rabu, 14 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 9 </td>
										<td>Nur Amini, S.Ag</td>
										<td>Kamis, 15 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 10</td>
										<td>H.Rusdi Santoso, S.Ag,M.Ag</td>
										<td>Senin, 19 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 11 </td>
										<td>Sudarmaji, S.Ag</td>
										<td>Selasa, 20 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 12 </td>
										<td>Rohmatul Umah, S.Ag</td>
										<td>Rabu, 21 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 13 </td>
										<td>Hj.Herita Fatmawati S.Ag</td>
										<td>Kamis, 22 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 14 </td>
										<td>Hj. Budi Suprapti S.Pd</td>
										<td>Senin, 26 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 15 </td>
										<td>Dra.Hj Ummi Saidah</td>
										<td>Selasa, 27 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 16 </td>
										<td>Hj.Endag Siti Winarsih S.Ag</td>
										<td>Rabu, 28 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
									<tr>
										<td> 17 </td>
										<td>H. Lagimin, S.Ag,M.Ag</td>
										<td>Kamis, 29 April 2021</td>
										<td>05.30-06.00</td>
										<td>Pagi Beriman Agama Islam</td>
									</tr>
								</table>
							</div>
						</CENTER>
						<br><br><br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<?php
								foreach ($detail_ptsp as $detail) { ?>
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											Klaten,<?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?><br>
											Kepala
										</center>
									</div>
								<?php } ?>
							</div>
						</div>
						<br> <br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="badan_surat isi_surat">
									<?php
									foreach ($data_kepala as $detail) { ?>
										<div class="badan_surat isi_surat">
											<center>
												<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
												<u><b><?= $detail->nama ?></b></u><br>
												Nip. <?= $detail->nip ?>
											</center>
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
	</div>
	<!-- /.container-fluid -->
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						<CENTER>
							<div class="row">
								<div class="col-md-10">
									<p>&emsp;&emsp;&emsp;&emsp;DAFTAR HADIR
										<br>&emsp;&emsp;PETUGAS SIARAN RSPD KLATEN BULAN APRIL 2021
									</p>

								</div>
							</div>
						</CENTER>
						<br>
						<CENTER>
							<div class="isi_surat identitas">
								<table border="1" cellpadding=2 cellspacing=3>
									<tr>
										<td>No</td>
										<td>NAMA PETUGAS SIARAN</td>
										<td>HARI TANGGAL SIARAN</td>
										<td>MATA ACARA</td>
										<td>TANDA TANGAN</td>
									</tr>
									<tr>
										<td> 1 </td>
										<td>H. Lagimin, S.Ag,M.Ag</td>
										<td>Kamis, 1 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>1.</td>
									</tr>
									<tr>
										<td> 2 </td>
										<td>Ahmad Royani, S.Ag,</td>
										<td>Senin, 5 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>2.</td>
									</tr>
									<tr>
										<td> 3 </td>
										<td>Drs.Abdul Basir</td>
										<td>Selasa, 6 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>3.</td>
									</tr>
									<tr>
										<td> 4 </td>
										<td>Dra.Hj.Istikomah,M.Ag</td>
										<td>Rabu, 7 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>4.</td>
									</tr>
									<tr>
										<td> 5 </td>
										<td>M.Zuhri,S.Ag.M.Si</td>
										<td>Kamis, 8 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>5.</td>
									</tr>
									<tr>
										<td> 6 </td>
										<td>Andrianto Heri W, S.H.I.M.Ag</td>
										<td>Senin, 12 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>6.</td>
									</tr>
									<tr>
										<td> 7 </td>
										<td>Moh Suryana,S.Pd.I.S.H.Ag</td>
										<td>Selasa, 13 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>7.</td>
									</tr>
									<tr>
										<td> 8 </td>
										<td>H. Sunarso, S.Ag,M.Ag</td>
										<td>Rabu, 14 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>8.</td>
									</tr>
									<tr>
										<td> 9 </td>
										<td>Nur Amini, S.Ag</td>
										<td>Kamis, 15 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>9.</td>
									</tr>
									<tr>
										<td> 10</td>
										<td>H.Rusdi Santoso, S.Ag,M.Ag</td>
										<td>Senin, 19 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>10.</td>
									</tr>
									<tr>
										<td> 11 </td>
										<td>Sudarmaji, S.Ag</td>
										<td>Selasa, 20 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>11.</td>
									</tr>
									<tr>
										<td> 12 </td>
										<td>Rohmatul Umah, S.Ag</td>
										<td>Rabu, 21 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>12.</td>
									</tr>
									<tr>
										<td> 13 </td>
										<td>Hj.Herita Fatmawati S.Ag</td>
										<td>Kamis, 22 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>13.</td>
									</tr>
									<tr>
										<td> 14 </td>
										<td>Hj. Budi Suprapti S.Pd</td>
										<td>Senin, 26 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>14.</td>
									</tr>
									<tr>
										<td> 15 </td>
										<td>Dra.Hj Ummi Saidah</td>
										<td>Selasa, 27 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>14.</td>
									</tr>
									<tr>
										<td> 16 </td>
										<td>Hj.Endag Siti Winarsih S.Ag</td>
										<td>Rabu, 28 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>16.</td>
									</tr>
									<tr>
										<td> 17 </td>
										<td>H. Lagimin, S.Ag,M.Ag</td>
										<td>Kamis, 29 April 2021</td>
										<td>Pagi Beriman Agama Islam</td>
										<td>17.</td>
									</tr>
								</table>
							</div>
						</CENTER>
						<br><br><br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="badan_surat isi_surat">
									<center>
										<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
										Klaten,....../..../...... <br>
										Kepala
									</center>
								</div>
							</div>
						</div>
						<br> <br>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="badan_surat isi_surat">
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
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

	<!-- End of Main Content -->
</body>

</html>