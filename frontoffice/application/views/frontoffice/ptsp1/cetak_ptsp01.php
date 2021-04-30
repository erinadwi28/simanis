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
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}

		table tr td {
			font-size: 13px;
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
			font-size: 12pt;
		}

		.no_surat {
			font-size: 12pt;
		}

		.tujuan_surat {
			font-size: 12pt;
		}

		.paragraf {
			/* text-indent: 2.8125em; */
			text-align: justify;
			text-indent: 50px;
			font-size: 12pt;
		}

		.isi_surat {
			margin-left: 0.0375em;
			font-size: 12pt;
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

		hr {
		height: 4px;
		}

	</style>
</head>
<body>
	<center>
	
	<?php foreach ($detail_ptsp as $detail) { ?>
		<table width="530">
			<tr>
				<td><img src="<?= base_url('../assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>" width="80" height="80"></td>
				<td>
				<center>
					<font size="4"><b>KEMENTRIAN AGAMA REPUBLIK INDONESIA</b></font><br>
					<font size="3">KANTOR KEMENTRIAN AGAMA KABUPATEN KLATEN</font><br>
					<font size="2"><i>Jalan Ronggowarsito Klaten</i></font><br>
					<font size="2"><i>Telepon/Faksimili (0272) 321154</i></font><br>
					<font size="2"><i>Website http://klaten.kemenag.go.id</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
		<table width="530">
			<tr>
				<td class="text2"><?= format_indo(date($detail->tgl_persetujuan_kasubag)); ?></td>
			</tr>
		</table>
		</table>
		
		<table>
			<tr class="text2">
				<td width="40" >Nomer</td>
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
				<td>: Petugas Rohaniawan dan Petugas Do'a</td>
			</tr>
		</table>
		<br>
		<table width="530">
			<tr>
		       <td>
			       <font size="2">Kpd yth.<br><?= $detail->pemohon ?><br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<table width="530">
			<tr>
		       <td>
			       <font size="2">&emsp;&emsp; Berkenaan dengan surat Saudara Nomor <?= $detail->no_srt_permohonan ?> tanggal <?= format_indo(date($detail->tgl_srt_permohonan)); ?> perihal
					Permohonan Petugas Rohaniawan dan Pembaca Do'a, dengan ini kami sampaikan Petugas
					sebagai berikut:</font>
		       </td>
		    </tr>
		</table>
		<?php } ?>
		<br>

		<?php $no = 1;
		foreach ($data_petugas_doa as $detail) { ?>
		<table width="530">
			<tr class="text2">
				<td width="20"><?= $no++ ?>.</td>
				<td width="120">Nama</td>
				<td>: <?= $detail->nama_petugas_doa; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>: <?= $detail->nip_petugas_doa; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Pangkat, Gol/Ruang</td>
				<td>: <?= $detail->pangkat_petugas_doa; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td>: <?= $detail->jabatan_petugas_doa; ?></td>
			</tr>
		</table>
		<?php } ?>
		
		<?php foreach ($detail_ptsp as $detail) { ?>
		<table width="530">
			<tr>
		       <td>
			       <font size="2">&emsp;&emsp; untuk menjadi Petugas Rohaniawan dan Pembaca Do'a dalam Acara <?= $detail->nama_acara ?>, pada :<br></font>
		       </td>
		    </tr>
		</table>
		<table width="530">
			<tr class="text2">
				<td width="20"></td>
				<td width="60">Hari</td>
				<td>: <?= $detail->hari_acara ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Tanggal</td>
				<td>: <?= format_indo(date($detail->tgl_acara)); ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Waktu</td>
				<td>: <?= $detail->waktu_acara ?> WIB</td>
			</tr>
			<tr>
				<td></td>
				<td>Tempat</td>
				<td>: <?= $detail->tempat_acara ?></td>
			</tr>
		</table>
		<?php } ?>

		<table width="530">
			<tr>
		       <td>
			       <font size="2">&emsp;&emsp; Demikian surat ini kami sampaikan untuk dapat di pergunakan sebagaimana mestinya.<br></font>
		       </td>
		    </tr>
		</table>
		<br>
		<table width="500">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala<br><br><br><br>Arif Solikhin</td>
			</tr>
	     </table>
	</center>
</body>
</html>