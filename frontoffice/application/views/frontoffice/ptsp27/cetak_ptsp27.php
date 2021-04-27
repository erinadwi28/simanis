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
					
				<div class="card-body p-4">

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
									<p><u><b>SURAT KETERANGAN</b></u><br>
										<b>Nomor : </b>
									</p>
								</center>
							</div><br>
							<div class="isi_surat">
								<p align="justify">&emsp;&emsp;
									Yang bertanda tangan dibawah ini, Bendahara Pengeluaran KEMENTRIAN AGAMA KAB. KLATEN 
									menerangkan bahwa pemegang surat ini :
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
											<td>H. Anif Solikhin, S.Ag. MSI</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; NIP</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td>197004201995031003</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Pangkat/Golongan</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td>Pembina</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Gaji Pokok</td>
											<td> </td>
											<td> </td>
											<td>:</td>
											<td> </td>
											<td>Rp 4.024.400,00</td>
										</tr>
									</tbody>
								</table>
							</div><br>
							
							<div class="isi_surat identitas">
								<table class="table-responsive">
									<p>I. PENGHASILAN</p>
									<tbody>
										<tr>
											<td width="380px">&emsp;&emsp; Gaji</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Istri/Suami</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Anak</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Jabatan</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Perbaikan Penghasilan</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Lain</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Umum</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Papua</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Daerah Terpencil/Sangat Terpencil</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Beras</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunjangan Khusus Pajak</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Pembulatan</td>
											<td></td>
											<td>Rp. 1.000.000,00</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; JUMLAH PENGHASILAN</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 1.000.000,00</b></td>
										</tr>
									</tbody>
								</table>
							</div> <br>
							<div class="isi_surat identitas">
								<table class="table-responsive">
									<p>II. POTONGAN-POTONGAN</p>
									<tbody>
										<tr>
											<td width="380px">&emsp;&emsp; Potongan IWP + BPJS</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Potongan Beras</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Sewa Rumah</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Hutang Lebih</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tunggakan</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Tabungan Perumahan</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Potongan Lain-lain</td>
											<td></td>
											<td>Rp. 0</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; PPh Pasal 21</td>
											<td></td>
											<td>Rp. 1.000.000,00</td>
										</tr>
										<tr>
											<td>&emsp;&emsp; JUMLAH POTONGAN</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 1.000.000,00</b></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; PENGHASILAN BERSIH</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 0</b></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; PENGHASILAN LAIN</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 0</b></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; TOTAL PENGHASILAN</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 0</b></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; JUMLAH PENGHASILAN</td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Rp. 0</b></td>
										</tr>
										<tr>
											<td>&emsp;&emsp; Dengan huruf &emsp;<b>***Empat Juta***</b></td>
										</tr>
									</tbody>
								</table>
							</div><br>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="badan_surat isi_surat">
										<center>
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											Klaten, 03 Maret 2020 <br>
											BENDAHARA PENGELUARAN KEMENTRIAN <br>
											AGAMA KANTOR KAB. KLATEN
										</center>
									</div>
								</div>
							</div>
							
							<div class="row ttd_kades">
								<div class="col-md-2 ">
								</div>
								<div class="col-md-2">

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
											<u><b>AULIA NOOR HAYATI</b></u><br>
											Nip. 198312202011012006
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