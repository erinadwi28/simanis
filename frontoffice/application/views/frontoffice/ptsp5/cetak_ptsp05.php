<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIMELATI: Cetak Surat</title>
	
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
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

	</style>
</head>
<body>
	<center>
		<table width="530">
			<tr>
				<td><img src="logo_kemenag.png" width="80" height="80"></td>
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
				<td colspan="5"><hr></td>
			</tr>
		</table>

	<?php foreach ($detail_ptsp as $detail) { ?>
		<table width="530">
			<tr>
			<td>
				<center>
				<font size="3"></font><b>SURAT KETERANGAN</b> </font><br>
				<font size="2">Nomor : <?= $detail->no_surat ?> </font>
				</center>
			</td>
			</tr>
		</table>
		<br>
		<table width="530">
			<tr  text-align= "justify">
		       <td>
			       <font size="2">
					    &ensp;&ensp; Menindak lanjuti surat permohonan dari Saudara <?= $detail->nama_pemohon ?> 
				   		tentang Permohonan Surat Keterangan Haji Pertama, dengan ini Kepala Kantor Kementrian Agama 
						Kabupaten Klaten menerangkan bahwa :
				   </font>
		       </td>
		    </tr>
		</table>
		<br>
		<table>
			<tr class="text2">
				<td></td>
				<td>Nama</td>
				<td>: <?= $detail->nama_pemohon ?> </td>
			</tr>
			<tr>
				<td></td>
				<td>Tempat dan Tanggal Lahir</td>
				<td>: <?= format_indo(date($detail->tanggal_lahir)); ?> </td>
			</tr>
			<tr>
				<td></td>
				<td>Alamat </td>
				<td>: <?= $detail->alamat ?> </td>
			</tr>
			<tr>
				<td></td>
				<td>Nomor Porsi</td>
				<td>: <?= $detail->nomor_porsi ?> </td>
			</tr>
		</table>
		<table width="530">
			<tr>
		       <td>
			       <font size="2">adalah jemaah haji Kabupaten Klaten Tahun 
					   <?= $detail->tahun_angkatan_haji_hijriah ?> H / <?= $detail->tahun_angkatan_haji_masehi ?> M 
					   dan perjalanan ibadah hajinya merupakan yang pertama.</font>
			       <font size="2">&ensp;&ensp; Demikian surat ini kami sampaikan untuk dapat di pergunakan sebagaimana mestinya.<br></font>
		       </td>
		    </tr>
		</table>
		<br>
		<table width="530">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala<br><br><br><br>Arif Solikhin</td>
			</tr>
	     </table>		 
		<?php } ?>
	</center>
</body>
</html>