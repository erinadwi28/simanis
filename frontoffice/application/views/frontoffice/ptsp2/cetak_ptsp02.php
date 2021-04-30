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
            margin-left: 50px;
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
											<td>4763/Kk.11.10/8/HM.00/06/2021</td>
										</tr>
										<tr>
											<td>Sifat</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>Segera</td>
										</tr>
										<tr>
											<td>Lampiran</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>2 lembar</td>
										</tr>
										<tr>
											<td>Hal</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td> </td>
											<td>Surat Ijin Rekomendasi Kegiatan</td>
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
							<p>Kepada Yth. <br>
								Panitia PRE-EVENT ASIAN YOTUH DAY III <br>
								Orang Muda Katolik (OMK)
								Rayon Klaten <br>
								Di tempat
							</p>
						</div>

                        <br>

                        <!-- Paragraf 1 -->
						<div class="isi_surat">
							<p>&emsp;&emsp;&emsp;Diberitahukan dengan hormay, setelah membaca an memperhatikan surat permohonan Rekomendasi
							dari Pantia PRE-EVEN ASIAN YOUTH DAY III Orang Muda Katolik (OMK) Rayon Klaten, Nomor
							A/32/BYGK/OMK-RK/V/2017, tanggal 09 Juni 2017 perihal seperti pokok surat dengan mengadakan
							kegiatan yang akan dilaksanakan pada:
							</p>
						</div>

                        <!-- Pelaksanaan -->
						<div class="pelaksanaan">
							<table>
								<tbody>
									<tr>
										<td>Hari</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxx</td>
									</tr>
									<tr>
										<td>Tempat</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxx</td>
									</tr>
									<tr>
										<td>Waktu</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxx WIB</td>
									</tr>
									<tr>
										<td>Acara</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxxx</td>
									</tr>
									<tr>
										<td>Jumlah Peserta</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxxx</td>
									</tr>
									<tr>
										<td>Agenda Kegiatan</td>
										<td> </td>
										<td> </td>
										<td>:</td>
										<td> </td>
										<td>xxxx</td>
									</tr>
								</tbody>
							</table>
						</div>

                        <br>

						<div class="isi_surat">
							<p><b>Maka dengan ini kami memberi Rekomendasi atas kegiatan tersebut dengan ketentuan:</b>
							</p>
						</div>

						<!-- ketentuan -->
						<div class="ketentuan">
							<ol type="1">
								<li>Tetap menjaga persatuan dan kesatuan dalam kegiatan dan masyarakat.</li>
								<li>Menjaga kondusifitas lingkungan / wilayah Kabupaten Klaten.</li>
								<li>Agar tetap berkoordinasi dengan pihak keamanan serta pihak terkait.</li>
								<li>Agar menjauhkan dari paham-paham Radikalisme serta menghindari dari unsur SARA.</li>
							</ol>
						</div>

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
