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

	<link
		href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
		rel="stylesheet">
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
			font-family: 'Arial';
			margin-left: 60px;
		}

		.row {
			font-size: 12pt;
			font-family: 'Arial';
		}

		.no_surat {
			font-size: 12pt;
		}

		.tujuan_surat {
			font-size: 12pt;
			font-family: 'Arial';
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			font-family: 'Arial';
			text-indent: 50px;
			font-size: 12pt;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 12pt;
			line-height: 1.5em;
			font-family: 'Arial';
			text-align: justify;
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

		/* .bawah {
			display: block;
			position: absolute;
			float: right;
			margin-right: 160px;
		} */

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

		tbody {
			line-height: 1.5em;
		}

        .petugas>.nomor{
            padding-right: 0px;
        }
        .petugas>.data{
            padding-left: -0px;
            margin-left: -15px;
        }

        p{
            margin-bottom: 0px;
        }

        .pelaksanaan {
            margin-left: 30px;
        }

		.tgl {
			text-align: right;
		}

		.kpl {
			margin-left: 509px;
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
						<div class="kopsurat row">
							<div class="col-md-12 mb-3">
								<object data="" type="image">
									<img class="img-fluid" alt="logo_kop_surat"
										src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
								</object>
							</div>
						</div>

						<!-- NO SURAT -->
						<div class="no_surat row">
							<div class="col-9">
								<table>
									<tbody>
										<tr>
											<td>Nomor</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>.../Kk.11.10/1/BA.05/1/2021</td>
										</tr>
										<tr>
											<td>Sifat</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>Penting</td>
										</tr>
										<tr>
											<td>Lampiran</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>-</td>
										</tr>
										<tr>
											<td>Hal</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>Petugas Rohaniawan dan Petugas Do'a</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-3">
								<p class="float-right">Januari 2021</p>
							</div>
						</div>

						<!-- KEPADA -->
						<div class="no_surat">
							<br>
							<p>Kepada <br>
								Yth. Erina Dwi Utami <br>
								Di Tempat
							</p>
						</div>

                        <br>

                        <!-- Paragraf 1 -->
						<div class="isi_surat">
							<p>&emsp;&emsp;&emsp;Berkenaan dengan surat Saudara Nomor .../Kk.11.10/1/BA.05/1/2021 tanggal 24 April 2021 perihal
                                Permohonan Petugas Rohaniawan dan Pembaca Do'a, dengan ini kami sampaikan Petugas
                                sebagai berikut:
							</p>
						</div>

                        <!-- Petugas -->
						<div class="petugas row">
                            <div class="col-1 nomor">
                                1.
                            </div>
                            <div class="col-11 data">
                                <table>
								<tbody>
									<tr>
										<td>Nama</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
									<tr>
										<td>NIP</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx
										</td>
									</tr>
									<tr>
										<td>Pangkat, Gol/Ruang</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
								</tbody>
							</table>
                            </div>
							
						</div>
						<div class="petugas row">
                            <div class="col-1 nomor">
                                2.
                            </div>
                            <div class="col-11 data">
                                <table>
								<tbody>
									<tr>
										<td>Nama</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
									<tr>
										<td>NIP</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx
										</td>
									</tr>
									<tr>
										<td>Pangkat, Gol/Ruang</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xx</td>
									</tr>
								</tbody>
							</table>
                            </div>
							
						</div>

                        <br>

						<div class="isi_surat">
							<p>untuk menjadi Petugas Rohaniawan dan Pembaca Do'a dalam Acara
                                Buka bersama seluruh pegawai xxx, pada:
							</p>
						</div>

						<div class="pelaksanaan">
							<table>
								<tbody>
									<tr>
										<td>Hari</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Senin</td>
									</tr>
									<tr>
										<td>Tanggal</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>03 Mei 2021</td>
									</tr>
									<tr>
										<td>Waktu</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>15.00 WIB</td>
									</tr>
									<tr>
										<td>Tempat</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>Masjid Ahmad Husain</td>
									</tr>
								</tbody>
							</table>
						</div>

                        <br>

                        <!-- Paragraf 2 -->
						<div class="isi_surat">
							<p>&emsp;&emsp;Demikian surat ini kami sampaikan untuk dapat dipergunakan sebagaimana
                                mestinya.
							</p>
						</div>

                        <br>

						<!-- Tanggal -->
						<div class="row">
						<div class="col-12 tgl">
						Klaten, 24 April 2021
						</div>
						</div>

						<!-- Kepala -->
						<div class="row">
						<div class="col-12 kpl">
						Kepala
						</div>
						</div>

						<div class="row ttd_kepala">
							<div class="col-md-6 ">
							</div>
							<div class="col-md-6">
							</div>
						</div>
						<br> <br>
						
						<div class="row">
							<div class="col-md-9">
							</div>
							<div class="col-md-3">
								<div class="badan_surat isi_surat">
									Anif Solikhin<br>
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
