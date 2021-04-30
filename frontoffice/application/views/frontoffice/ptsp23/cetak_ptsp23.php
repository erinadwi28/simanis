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
		.row{
			font-size: 14pt;
			font-family: 'Times New Roman';
		}
		.no_surat {
			font-size: 14pt;
		}

		.tujuan_surat{
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
										<img class="img-fluid" alt="logo_kop_surat"
											src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
									</object>
								</div>
							</div>
                            <div class="no_surat">
								<center>
									<p><u><b>SURAT TUGAS</b></u><br>
										<b>Nomor : </b>
									</p>
								</center>
							</div><br>
							<div class="isi_surat">
								<p align="justify">
									&emsp;&emsp; Dengan ini Kepala Kantor Kementrian Agama Kabupaten Klaten berdasarkan surat permohonan 
									Kepala SD Negri Sapen Kec. Manisrenggo Kab. Klaten tanggal 31 Desember 2019 tentang Permohonan 
									Guru Pendidikan Agama Islam dan persetujuan Kepala Seksi Pendidikan Agama Islam tanggal 04 Februari 2020, 
									memerintahkan kepada Pegawai Negri Sipil :   
								</p>
							</div>
							<div class="isi_surat identitas">
								<table class="table-responsive">
									<tbody>
										<tr>
											<td>&emsp;&emsp; Nama</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; NIP</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Pangkat/Gol. Ruang</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Jabatan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Ditugaskan di</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Terhitung mulai tanggal</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div><br>
							<div class="isi_surat">
								<p align="justify">
									untuk segera melaksanakan tugas sebagai Guru Pertama pada Kantor Kementrian Agama kab. Klaten 
									ditugaskan di SD Negri 1 Sukorini Kec. Manisrenggo Kab. Klaten dan SD Negri Sapen Kec. Manisrenggo Kab. Klaten.  
								</p>
								<p align="justify">
									&emsp;&emsp; Demikian untuk maklum dan dilaksanakan sebagaimana mestinya. 
								</p>
							</div><br><br><br>
							<div class="row">
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
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
											<u><b>H. Anif Solikhin, S.Ag. MSI</b></u><br>
											Nip. 197004201995031003
										</center>
									</div>
								</div>
							</div>

							<div class="isi_surat">
								<p>Tembusan :</p>
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