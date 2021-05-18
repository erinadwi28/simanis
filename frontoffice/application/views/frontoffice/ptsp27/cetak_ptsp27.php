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
			margin-left: 150px;
		}
	</style>
</head>

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
									<img class="img-fluid" alt="logo_kop_surat" src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/kop_surat.png') ?>">
								</object>
							</div>
						</div>
						<?php
						foreach ($detail_ptsp as $detail) { ?>
							<div class="no_surat">
								<center>
									<p><u><b>SURAT KETERANGAN</b></u><br>
										<b>Nomor : </b>
									</p>
								</center>
							</div>
						<?php } ?>
						<br>
						<div class="isi_surat">
							<p align="justify">&emsp;&emsp;
								Yang bertanda tangan dibawah ini, Bendahara Pengeluaran KEMENTRIAN AGAMA KAB. KLATEN
								menerangkan bahwa pemegang surat ini :
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
										<td>H. Anif Solikhin, S.Ag. MSI</td>
									</tr>
									<tr>
										<td> NIP</td>
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
							<table>
								<p>I. PENGHASILAN</p>
								<tbody>
									<tr>
										<td> Gaji</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Istri/Suami</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Anak</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Jabatan</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Perbaikan Penghasilan</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Lain</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Umum</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Papua</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Daerah Terpencil/Sangat Terpencil</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Beras</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunjangan Khusus Pajak</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Pembulatan</td>
										<td></td>
										<td>Rp.0</td>
									</tr>
									<tr>
										<td>JUMLAH PENGHASILAN</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp.0</b></td>
									</tr>
								</tbody>
							</table>
						</div> <br>
						<div class="isi_surat identitas">
							<table>
								<p>II. POTONGAN-POTONGAN</p>
								<tbody>
									<tr>
										<td> Potongan IWP + BPJS</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Potongan Beras</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Sewa Rumah</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td> Hutang Lebih</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tunggakan</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Tabungan Perumahan</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>Potongan Lain-lain</td>
										<td></td>
										<td>Rp. 0</td>
									</tr>
									<tr>
										<td>PPh Pasal 21</td>
										<td></td>
										<td>Rp.0</td>
									</tr>
									<tr>
										<td>JUMLAH POTONGAN</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp.0</b></td>
									</tr>
									<tr>
										<td>PENGHASILAN BERSIH</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp. 0</b></td>
									</tr>
									<tr>
										<td>PENGHASILAN LAIN</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp. 0</b></td>
									</tr>
									<tr>
										<td>TOTAL PENGHASILAN</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp. 0</b></td>
									</tr>
									<tr>
										<td>JUMLAH PENGHASILAN</td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Rp. 0</b></td>
									</tr>
									<tr>
										<td>&emsp;&emsp; Dengan huruf &emsp;<b>***NOL RUPIAH***</b></td>
									</tr>
								</tbody>
							</table>
						</div>
						<br><br><br><br>
						<div class="row">
							<div class="col-md-6">
								<div class="badan_surat ">									
									<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
								<table>
									<tr>
										<td width="300px">Pejabat Pembuat Komitmen<br><br><br><br></td>
										<td>Klaten, 03 Maret 2020<br>
										Bendahara Pengeluaran Kementrian <br>
										Agama Kantor Kab. Klaten<br><br><br><br></td>
									</tr>
									
									<tr>
										<td><u><b>DRS. H. WAHIB</b></u><br>
										Nip. 196805281995031001 </td>
										<td><u><b>AULIA NOOR HAYATI</b></u><br>
										Nip. 198312202011012006 </td>
									</tr>
								</table>	
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