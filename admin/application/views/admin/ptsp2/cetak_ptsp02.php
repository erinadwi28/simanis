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

	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('../assets/dashboard/css/sb-admin-2.min.css') ?>" />
	<style>
		.body {
			color: #000000;
			font-family: Calibri, Helvetica, Arial, sans-serif;
		}

		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
			color: #000000;
		}

		table tr .text2 {
			text-align: right;
			font-size: 11pt;
		}

		table tr .text {
			text-align: center;
			font-size: 11pt;
		}

		table tr td {
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

		/* 
		.card-body {
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

		.img {
			padding-top: 37px;
		}

		.img img {
			padding-left: 10px;
		}

		.garis {
			border: 2px;
			border-style: solid;
			color: #000000 !important;
		}
	</style>
</head>

<body>
	<center>

		<?php foreach ($detail_ptsp as $detail) { ?>
			<table width="530">
				<tr>
					<td></td>
					<td class="img">
						<center>
							<img src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>" width="110" height="110">
						</center>
					</td>
					<td width="400">
						<center>
							<font size="4"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA</b></font><br>
							<font size="3">KANTOR KEMENTERIAN AGAMA KABUPATEN KLATEN</font><br>
							<font size="2"><i>Jalan Ronggowarsito Klaten</i></font><br>
							<font size="2"><i>Telepon/Faksimili (0272) 321154</i></font><br>
							<font size="2"><i>Website http://klaten.kemenag.go.id</i></font>
						</center>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="garis"></div>
					</td>
				</tr>
				<table width="530">
					<tr>
						<td class="text2"><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
					</tr>
				</table>
			</table>

			<table>
				<tr class="text2">
					<td width="40">Nomer</td>
					<td>: <?= $detail->no_surat ?></td>
				</tr>
				<tr>
					<td>Sifat</td>
					<td>: <?= $detail->sifat ?></td>
				</tr>
				<tr>
					<td>Lampiran</td>
					<td>: <?= $detail->jml_lampiran ?></td>
				</tr>
				<tr>
					<td>Hal</td>
					<td>: Surat Ijin Rekomendasi Kegiatan</td>
				</tr>
			</table>
			<br>
			<!-- KEPADA -->
			<table width="530">
				<tr>
					<td>
						<font size="2">Kpd yth.<br><?= $detail->pemohon ?><br>Di tempat</font>
					</td>
				</tr>
			</table>
			<br>
			<!-- Paragraf 1 / isi surat-->
			<table width="530">
				<tr>
					<td>
						<font size="2">&emsp;&emsp; Diberitahukan dengan hormat, setelah membaca dan memperhatikan surat permohonan Rekomendasi dari
							<?= $detail->pemohon ?>, Nomor<?= $detail->no_srt_permohonan ?>, tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?>
							perihal seperti pokok surat dengan mengadakan kegiatan yang akan dilaksanakan pada:</font>
					</td>
				</tr>
			</table>
		<?php } ?>
		<!-- Pelaksanaan -->
		<?php foreach ($detail_ptsp as $detail) { ?>
			<table width="530">
				<tr class="text2">
					<td width="20"></td>
					<td width="120">Hari</td>
					<td>: <?= $detail->hari_kegiatan ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Tempat</td>
					<td>: <?= $detail->tempat_kegiatan ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Waktu</td>
					<td>: <?= $detail->waktu_kegiatan ?> WIB</td>
				</tr>
				<tr>
					<td></td>
					<td>Acara</td>
					<td>:<?= $detail->nama_kegiatan ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Jumlah Peserta</td>
					<td>:<?= $detail->jml_peserta ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Agenda Kegiatan</td>
					<td>:<?= $detail->agenda_kegiatan ?></td>
				</tr>
			</table>
		<?php } ?>
		<br>
		<!-- ketentuan -->
		<table>
			<tr>
				<td colspan="2"><b>Maka dengan ini kami memberi Rekomendasi atas kegiatan tersebut dengan ketentuan:</b></td>
			</tr>
			<tr>
				<td width="10"></td>
				<td>1. Tetap menjaga persatuan dan kesatuan dalam kegiatan dan masyarakat.</td>
			</tr>
			<tr>
				<td></td>
				<td>2. Menjaga kondusifitas lingkungan / wilayah Kabupaten Klaten.</td>
			</tr>
			<tr>
				<td></td>
				<td>3. Agar tetap berkoordinasi dengan pihak keamanan serta pihak terkait.</td>
			</tr>
			<tr>
				<td></td>
				<td>4. Agar menjauhkan dari paham-paham Radikalisme serta menghindari dari unsur SARA.</td>
			</tr>
		</table>

		<table width="530">
			<tr>
				<td>
					<font size="2">Demikian surat ini kami sampaikan untuk dapat di pergunakan sebagaimana mestinya.<br></font>
				</td>
			</tr>
		</table>
		<br>
		<?php foreach ($data_kepala as $detail) { ?>
			<table width="500">
				<tr>
					<td width="300"><br><br><br><br></td>
					<td class="text" align="center">Kepala Kantor Kementrian Agama <br> Kabupaten Klaten<br><br><br><br>
						<u style="color: #000000;"><?= $detail->nama ?></u><br><?= $detail->nip ?>
					</td>
				</tr>
			</table>
		<?php } ?>
	</center>
</body>

</html>