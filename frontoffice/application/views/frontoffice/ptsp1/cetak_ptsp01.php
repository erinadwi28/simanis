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
	
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			font-family: 'Arial';
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			font-family: 'Arial';
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-family: 'Arial';
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
	
	<?php foreach ($detail_ptsp as $detail) { ?>
		<table width="530">
			<tr>
				<td><img src="<?= base_url('http://localhost/simanis/assets/dashboard/images/frontoffice/ptsp/logo_kemenag_hitamputih.png') ?>" width="80" height="80"></td>
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
				<td colspan="2"><hr></td>
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