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
			margin-left: 20px;
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
			margin-left: 90px;
		}

		.kepala_sertifikat {
			font-weight: bold;
			font-size: 14pt;
		}

		.kepala_sertifikat p {
			margin-top: 3px;
		}

		.no_surat {
			font-size: 14pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Times New Roman';
			text-indent: 50px;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 11pt;
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
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">
							<center>
								<div class="logosurat row">
									<div class="col-md-12 mb-3">
										<object data="" type="image">
											<img class="logosurat" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
										</object>
									</div>
								</div>
							</center>
								<div class="badan_surat">
									<center>
										<div class="kepala_Sertifikat">
											<h3style="margin-top: 20px;"><b>SERTIFIKAT</b></h3style=>
											<h5><b>Nomor : ...../Kk.11.10/6/HK.03.2/..../20.... </b></h5>
											<p>Kepala Kantor Kementrian Agama Kabupaten Klaten Menerangkan bahwa : </p>
										</div>
									</center>
									<center>
										<div class="no_surat">
											<h5><b>MASJID/MUSHALLA......................</b></h5>
											<p>Dukuh,....RT,.....RW,.......Desa,....Kecamatan,.......Kabupaten Klaten</p>
										</div>
									</center>
									<br>
									<center>
									<div class="isi_surat">
										<p>Telah dilakukan pengukuran arah kiblat :
											<br> Oleh Tim Sertifikat Arah Kiblat Kabupaten Klaten</p>
										<p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;....................20...M
										<br> Pada hari,.....tanggal,............................................
										<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;...................14...H
										</p>
										<p>Dengan rashadul kiblat/waktu pengukuran pukul ......... WIB</p>
									</center>
									
									<br> <br>
									<CENTER>
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<div class="badan_surat isi_surat">
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												<p>Klaten,..........................,20... <br>
													Kepala, </p><br><br><br><br>
												<b>H. Anif Solikhin, S.Ag. MSI</b><br>
												Nip. 197004201995031003
											</div>
										</div>
									</div>
									</CENTER>
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
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">
								<div class="badan_surat">
									<center>
										<div class="kepala_Sertifikat">
											<h4style="margin-top: 20px;"><b>BERITA ACARA PENGUKURAN ARAH KIBLAT</b></h4style=>
											<P><b>MASJID/MUSHALLA..............</b></P>
											<p>Dukuh,....RT,.....RW,.......Desa,....Kecamatan,.......Kabupaten Klaten</p>
										</div>
									</center>
									<br>
									<div class="isi_surat">
										<p>Data Astronomi dengan menggunakan Ephimeris :
											<br> Hari : ..........,...............20........</p>
									<div class="isi_surat identitas">
								
								<table border="1" cellpadding=2 cellspacing=3 align=left >
     								 <tr>
        								<td WIDTH = 200 >Lintang Tempat</td>
        								<td WIDTH = 100 >.......&ordm;......&ordm;.....&ordm;</td>	
      								</tr>
									<tr>
        								<td >Bujur Tempat</td>
        								<td>.......&ordm;......&ordm;.....&ordm;</td>	
      								</tr>
									<tr>
        								<td>Waktu Pengukuran</td>
        								<td>.......,......WIB</td>	
      								</tr>
									<tr>
        								<td>Dekhinasi Matahari</td>
        								<td></td>	
      								</tr>
									  <tr>
        								<td>True Norht</td>
        								<td></td>	
      								</tr>
									<tr>
        								<td>Sudut Waktu Matahari</td>
        								<td></td>	
      								</tr>
									<tr>
        								<td>Azimuth Matahari</td>
        								<td></td>	
      								</tr>
									  <tr>
        								<td>Azimuth Kiblat</td>
        								<td>.......&ordm;......&ordm;.....&ordm;</td>	
      								</tr>
									<tr>
        								<td>Rashdul Kiblat</td>
        								<td></td>	
      								</tr>
									<tr>
        								<td>Tim Pengukur</td>
        								<td>1.</td>	
      								</tr>
									<tr>
        								<td></td>
        								<td>2.</td>	
      								</tr>
									  <tr>
        								<td></td>
        								<td>3.</td>	
      								</tr>
									 <tr>
        								<td><br></td>
        								<td></td>	
      								</tr>
									  <tr>
        								<td>Saksi<br><br><br> </td>
										<td>1.
										<br>2.
										<br>3. </td>
      								</tr>	
								 </table>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
									<CENTER>
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<div class="badan_surat isi_surat">
												<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
												<p>Klaten,..........................,20... <br>
													Kepala, </p><br><br><br><br>
												<b>H. Anif Solikhin, S.Ag. MSI</b><br>
												Nip. 197004201995031003
											</div>
										</div>
									</div>
									</CENTER>
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