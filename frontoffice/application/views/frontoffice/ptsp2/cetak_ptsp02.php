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
		table ol li {
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
		<br>
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
		<table width="500">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala<br><br><br><br>Arif Solikhin</td>
			</tr>
	     </table>
	</center>
</body>
</html>