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
			font-size: 11pt;
			margin-bottom: 0;
			padding-bottom: 0;
		}

		.logosurat {
			height: 110px;
			width: 110px;
			margin-top: 0px;
			margin-left: 10px;
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
			margin-left: 0px;
			font-size: 11pt;
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
			margin-left: 80px;
			font-size: 11pt;
			line-height: 1.2em;
			font-family: 'Times New Roman';

		}

		.identitas {
			margin-left: 80px;
			margin-bottom: 0.3125em;
			font-size: 11pt;
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
			font-size: 11pt;
		}

		.body {
			line-height: 23.5px;
		}

		/* css untuk surat keterangan */
		.isi_suket {
			margin-left: 0.0375em;
			font-size: 11pt;
			line-height: 1.2em;
			text-align: justify;
		}

		.identitassuket {
			text-align: justify;
			font-size: 11pt;
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

		.sertif {
			background: url(<?= base_url('../assets/dashboard/images/frontoffice/ptsp/bg_ptsp14_3.png') ?>);
			background-repeat: no-repeat;
			background-size: 100% 100%;
			background-position-x: center;
			background-position-y: top;
			z-index: 200;
		}

	</style>

</head>

<body class="body " id="page-top">
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col sertif" style="padding: 0;">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-body">


							<div class="badan_surat" style="margin-top: 20px;">
								<center>
									<div class="kepala_Sertifikat">
										<object data="" type="image">
											<img class="logosurat" alt="logo_kop_surat"
												src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag.png') ?>">
										</object>
										<h5 style="margin-top: 10px;"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA <br>
												KANTOR KABUPATEN KLATEN </b></h5>
										<p>Jalan Ronggowarsito Klaten <br>
											Telepon/Faksimili (0272)321154 <br>
											Website : http://klaten.kemenag.go.id</p>
									</div>
								</center>
								<center>
									<div class="no_surat">
										<h6><b>PIAGAM TANDA DAFTAR</b> <br>
											<b>LEMBAGA PENDIDIKAN AL-QUR'AN (LPQ)</b> <br>
											<b> Nomor: </b>
										</h6>
									</div>
								</center>
								<div class="isi_surat">
									Diberikan kepada :
								</div>
								<div class="identitas">
									<table>
										<tbody>
											<tr>
												<td>Nama LPQ</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Desa</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Kecamatan</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Kabupaten</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Provinsi</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Yayasan</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>SK Menkumham RI</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Tahun Berdiri</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
											<tr>
												<td>Berlaku</td>
												<td> </td>
												<td> </td>
												<td>:</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="isi_surat">
									<table border="1" style="margin-left: 20px;">
										<tr>
											<p>Dengan Nomor Statistik Pendidikan Al-Qur'an : <br>
												<td>

												</td>
											</p>
										</tr>
									</table>
								</div>
								<div class="row">
									<div class="col">
										<div class="ttd_surat" style="margin-left: 350px;">
											<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
											<p>Klaten, <br>

												<b>a.n. MENTERI AGAMA</b> <br>
												Kepala Kantor Kementerian Agama <br>
												Kabupaten Klaten<br> <br><br>
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
		<!-- Page Heading -->
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="no_surat">
							<center>
								<p><b>KEPUTUSAN KEPALA KANTOR KEMENTERIAN AGAMA <br>
										KABUPATEN KLATEN</b><br>
									<b>Nomor : <br>
										TENTANG <br>
										PENETAPAN TANDA DAFTAR LPQ ..................................................
										<br>
										KEPALA KANTOR KEMENTERIAN AGAMA KABUPATEN KLATEN
									</b>
								</p>
							</center>
						</div>

						<div class="identitassuket">
							<table>
								<tbody>
									<tr>
										<td>Menimbang</td>
										<td>:</td>
										<td>
											<ol type="a">
												<li>bahwa dalam rangka meningkatkan mutu Lembaga Pendidikan Al-Quran,
													perlu penetapan Tanda Daftar Lembaga Pendidikan Al-Quran;
												</li>
												<li>bahwa lembaga yang tercantum di bawah ini telah memenuhi persyaratan
													administratif dan teknis, kompetensi pendidik dan tenaga pendidik,
													dan ketersediaan sarana dan prasarana;</li>
												<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a
													dan b diatas, perlu menetapkan Keputusan Kepala Kantor Kementerian
													Agama Kabupaten Klaten tentang pemberian Tanda Daftar Lembaga
													........................................</li>
											</ol>
										</td>
									</tr>
									<tr>
										<td>Mengingat</td>
										<td>:</td>
										<td>
											<ol type="1">
												<li>Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional (Lembaran Negara Republik Indonesia Tahun 2003 Nomor 78, Tambahan Lembaran Negara Republik Indonesia Nomor 4301);</li>
												<li>Undang-Undang Nomor 14 Tahun 2005 tentang Guru dan Dosen (Lembaran Negara Republik Indonesia Tahun 2005 Nomor 157, Tambahan Lembaran Negara Republik Indonesia Nomor 4586);</li>
												<li>Undang-Undang Nomor 30 Tahun 2014 tentang Administrasi Pemerintahan (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 292, Tambahan Lembaran Negara Republik Indonesia Nomor 5601);</li>
												<li>Undang-Undang Nomor 18 Tahun 2019 tentang Pesantren (Lembaran Negara Republik Indonesia Tahun 2019 Nomor 191, Tambahan Lembaran Negara Republik Indonesia Nomor 6406);</li>
												<li>Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standart Nasional Pendidikan (Lembaran Negara Republik Indonesia Tahun 2005 Nomor 41, Tambahan Lembaran Negara Republik Indonesia Nomor 4496) sebagaimana telah beberapa kali diubah terakhir dengan Peraturan Pemerintah Nomor 13 Tahun 2015 tentang Perubahan Kedua atas Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standart Nasional Pendidikan (Lembaran Negara Republik Indonesia Tahun 2015 Nomor 45, Tambahan Lembaran Negara Republik Indonesia Nomor 5670);</li>
												<li>Peraturan Pemerintah Nomor 55 Tahun 2007 tentang Pendidikan Agama dan Pendidikan Keagamaan (Lembaran Negara Republik Indonesia Tahun 2007 Nomor 124, Tambahan Lembaran Negara Republik Indonesia Nomor 4769); </li>
												<li>Peraturan Pemerintah Nomor 37 Tahun 2009 tentang Dosen (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 76, Tambahan Lembaran Negara Republik Indonesia Nomor 5007);</li>
												<li>Peraturan Presiden Nomor 7 Tahun 2015 tentang Organisasi Kementerian Negara (Lembaran Negara Republik Indonesia Tahun 2015 Nomor 8);</li>
												<li>Peraturan Presiden Nomor 83 Tahun 2015 tentang Kementerian Agama (Lembaran Negara Republik Indonesia Tahun 2015 Nomor 168);</li>
												<li>Peraturan Menteri Agama Nomor 19 Tahun 2019 tentang Organisasi dan Tata Kerja Instansi Vertikal Kementerian Agama (Berita Negara Republik Indonesia Tahun 2019 Nomor 1115);</li>
												<li>Peraturan Menteri Agama Nomor 13 Tahun 2014 tentang Pendidikan Keagamaan Islam (Berita Negara Republik Indonesia Tahun 2014 Nomor 822);</li>
												<li>Peraturan Menteri Agama Nomor 42 Tahun 2016 tentang Organisasi dan Tata Kerja Kementerian Agama (Berita Negara Republik Indonesia Tahun 2016 Nomor 1495).</li>
											</ol>
										</td>
									</tr>
									<tr>
										<td>Memperhatikan</td>
										<td>:</td>
										<td>
											<ol type="1">
												<li>Berita Acara Verifikasi Dokumen Pendaftaran Lembaga ....................... Nomor : ............. Tanggal ......................</li>
												<li>Berita Acara Verifikasi Lapangan Pendaftaran Lembaga ....................... Nomor : ............. Tanggal ......................</li>
												<li>Berita Acara Rapat Pertimbangan Pemberian Tanda Daftar Lembaga Nomor : ............. Tanggal ....................</li>
											</ol>
										</td>
									</tr>
									<center><tr>
									<td style="margin-left:400px">MEMUTUSKAN</td>
									</tr></center>
									
									
									<tr>
										<td>Menetapkan</td>
										<td>:</td>
										<td>KEPUTUSAN KEPALA KANTOR KEMENTERIAN AGAMA KABUPATEN KLATEN TENTANG PEMBERIAN TANDA DAFTAR LEMBAGA ....................
										</td>
									</tr>
									<tr>
										<td>KESATU</td>
										<td>:</td>
										<td>Memberikan Tanda Daftar Lembaga Pendidikan Al Quran :
										<ol>
										<li>Nama Lembaga &nbsp;&nbsp;&nbsp; : ...
										</li>
										<li>Nomor Statistik &nbsp;&nbsp;&nbsp; : ...
										</li>
										<li>Alamat Lembaga &nbsp; : ...
										</li>
										</ol>
										</td>
									</tr>
									<tr>
										<td>KEDUA</td>
										<td>:</td>
										<td>Tanda Daftar ini diberikan untuk jangka waktu lima (5) tahun terhitung sejak tahun pelajaran setelah ditetapkan keputusan ini dan selanjutnya dapat diperpanjang lagi sesuai dengan ketentuan perundang-undangan.
										</td>
									</tr>
									<tr>
										<td>KETIGA</td>
										<td>:</td>
										<td>Penyelenggara wajib menyampaikan perkembangan pendidikan sekurang-kurangnya satu (1) tahun ajaran kepada Kepala Kantor Kementerian Agama Kabupaten Klaten.</td>
									</tr>
									<tr>
										<td>KEEMPAT</td>
										<td>:</td>
										<td>Keputusan ini berlaku sejak tanggal ditetapkan dengan ketentuan akan diperbaiki sebagaimana mestinya, jika dikemudian hari terdapat kekeliruan.</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col">

								<div class="ttd_surat_2" style="margin-left: 450px;">
									<!-- untuk tanggal persetujuan semetrara statis, nanti ditambahkan filed di database dulu -->
									Ditetapkan di :...<br>
									Pada Tanggal  :...<br>
									a.n. Menteri Agama <br>
									Kepala Kantor Kementerian Agama 
									Kabupaten Klaten <br> <br> <br>
								</div>

								<div class="ttd_surat_2" style="margin-left: 450px;"> <br>
									<!-- untuk nama dan nip kepala semetrara statis, nanti ditambahkan filed di database dulu -->
									Anif Sholikhin
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
