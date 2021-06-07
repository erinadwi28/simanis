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
	<link
		href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.body {
			color: #000;
			font-size: 14pt;
		}

		.logosurat {
			height: 130px;
			width: 130px;
			margin-top: 0px;
			margin-left: 15px;
		}

		.kopsurat p {
			font-weight: bold;
			line-height: 1em;
		}


		.badan_surat {
			color: #000;
		}

		.badan_surat .row {
			color: #000;
		}

		.badan_surat {
			font-family: 'Times New Roman';
			margin-left: 10px;
			font-size: 14pt;
		}

		.kepala_sertifikat {
			margin-top: 2px;
		}

		.alamat_kantor {
			font-size: 11pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
			font-size: 9pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Times New Roman';
			text-indent: 50px;
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
			font-size: 14pt;
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
			padding-right: 0.25rem;
			padding-left: 0.25rem;
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

		.ttd_surat {
			font-size: 14pt;
		}

		.body {
			line-height: 23.5px;
			background-image: <?=base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp14.png') ?>;
		}

	/* css untuk surat keterangan */
		.body-2{
			/* color: #000;
			font-family: Calibri, Helvetica, Arial, sans-serif;
			font-size: 11pt; */
		}

		.isi_suket{
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
			text-align: justify;
		}

		.identitassuket {
			margin-left: 2.8125em;
			margin-bottom: 0.3125em;
		}

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
			margin-top: 5px;
			margin-right: 17px;
		}


		.ttd_surat_2 {
			font-size: 11pt;
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
						<div class="card-body">
							<div class="badan_surat">
								<center>
									<div class="kepala_Sertifikat">
										<object data="" type="image">
											<img class="logosurat" alt="logo_kop_surat"
												src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp14.png') ?>">
										</object>
										<h4 style="margin-top: 10px;"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA <br>
												KANTOR KABUPATEN KLATEN </b></h4>
										<p>Jalan Ronggowarsito Klaten <br>
											Telepon/Faksimili (0272)321154 <br>
											Website : http://klaten.kemenag.go.id</p>
									</div>
								</center>
								<center>
									<div class="no_surat">
										<h5><b>PIAGAM TANDA DAFTAR</b> <br>
											<b>LEMBAGA PENDIDIKAN AL-QUR'AN (LPQ)</b> <br>
											<b> Nomor:</b>
										</h5>
									</div>
								</center>
								<div class="isi_surat">
									<p>&nbsp; &nbsp; &nbsp; Diberikan kepada :</p>
								</div>
								<div class="identitas">
									<table>
										<tbody>
											<tr>
												<td>Nama LPQ</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Desa</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Kecamatan</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Kabupaten</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Provinsi</td>
												<td> </td>
												<td> </td>
												<td>:</td>
											</tr>
											<tr>
												<td>Yayasan</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>SK Menkumham RI</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Tahun Berdiri</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
											<tr>
												<td>Berlaku</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat">
									<p>&nbsp;&nbsp; &nbsp; Dengan Nomor Statistik Pendidikan Al-Qur'an : <br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</p>
								</div>
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="ttd_surat">
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											<p> <br>

												<b>a.n. MENTERI AGAMA</b> <br>
												Kepala Kantor Kementerian Agama
												Kabupaten Klaten<br><br><br>
												<b></b>
											</p>
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

<body class="body-2" id="page-top">
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
						<div class="no_surat">
							<center>
								<p><b>SURAT KETERANGAN </b><br>
									<b>Nomor : .../Kk.11.10/3/PP.00.4/05/2021</b>
								</p>
							</center>
						</div>
						<br>

						<div class="identitassuket">
							<table>
								<tbody>
									<tr>
										<td>Yang bertanda tangan di bawah ini :</td>
									</tr>
									<tr>
										<td>Nama</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>H.Anif Solikhin, S.Ag., M.SI</td>
									</tr>
									<tr>
										<td>NIP</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>XXX</td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Kepala Kantor Kementerian Agama Kab. Klaten</td>
									</tr>
									<tr>
										<td>Dengan ini menerangkan bahwa :</td>
									</tr>
									<tr>
										<td>Nama Lembaga</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>NSTPQ</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>Desa</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>Kecamatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>Yayasan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>SK Menkumham RI</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
									<tr>
										<td>Masa Berlaku</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Xxx</td>
									</tr>
								</tbody>
							</table>
						</div>
						<br>
						<div class="identitassuket">
							Bahwa lembaga tersebut telah mendapat izin operasional dari Kantor Kementerian Agama
							Kabupaten Klaten dan berkomitmen untuk melaksanakan semua kegiatan sesuai dengan tuntunan
							Islam dan peraturan
							perundang-undangan yang berlaku serta selalu berkoordinasi dengan Dinas/Instansi terkait.
							<br>
							Demikian untuk menjadikan perhatian dan dapat dipergunakan sebagaimana mestinya
						</div>
						<div class="row">
							<div class="col-md-9">
							</div>
							<div class="col-md-3">
								<div class="ttd_surat_2">
									<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
									Klaten, ......<br>
									Kepala
								</div>
							</div>
						</div>
						<br> <br> <br> <br>
						<div class="row">
							<div class="col-md-9">
							</div>
							<div class="col-md-3">

								<div class="ttd_surat_2">
									<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
									Anif Solikhin
								</div>
							</div>
						</div>

						<div>
							Tembusan: <br>
							1. Yth. Ka. Kesbangpol Linmas Kab.Klaten; <br>
							2. Yth. Camat ........; <br>
							3. Yth. Ka. KUA Kec.......; <br>
							4. Kepala Desa.......

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
