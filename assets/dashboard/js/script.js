// UPLOAD FILE LABEL CHANGE
$('#file-upload').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-2').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-2')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-3').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-3')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-4').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-4')[0].files[0].name;
	if (file.length > 28){
		file = file.substring(0, 28) + '...' ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-5').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-5')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-6').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-6')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-7').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-7')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-8').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-8')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-9').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-9')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

$('#file-upload-10').change(function () {
	var i = $(this).prev('label').clone();
	var file = $('#file-upload-10')[0].files[0].name;
	if (file.length > 25){
		file = file.substr(0, 15) + '...' +  file.substr(-10) ;
	}
	$(this).prev('label').text(file);
});

// Pemohon
// Ubah pass
$('#ubah_pass').parsley();

$(document).ready(function() {
		var cek = $(".form-checkbox").val();
		$(".form-checkbox").click(function() {
			if ($(this).is(":checked")) {
				$(".form-password").attr("type", "text");
			} else {
				$(".form-password").attr("type", "password");
			}
		});
});

// Upload Foto Profil
$('#form_upload_foto_profil').parsley();

// PTSP01
$('#form_ptsp01').parsley();

$('#formupload_ptsp01_1').parsley();

$('#formubah_ptsp01').parsley();

$('#no_surat_ptsp01').parsley();

$('#formpetugas_ptsp01').parsley();

// PTSP02
$('#form_ptsp02').parsley();

$('#formupload_ptsp02_1').parsley();

$('#formubah_ptsp02').parsley();

$('#no_surat_ptsp02').parsley();

// PTSP03
$('#form_ptsp03').parsley();

$('#formupload_ptsp03_1').parsley();

$('#formubah_ptsp03').parsley();

// PTSP04
$('#form_ptsp04').parsley();

$('#formupload_ptsp04_1').parsley();

$('#formubah_ptsp04').parsley();

// PTSP05
$('#form_ptsp05').parsley();

$('#formupload_ptsp05_1').parsley();

$('#formupload_ptsp05_2').parsley();

$('#formupload_ptsp05_3').parsley();

$('#formupload_ptsp05_4').parsley();

$('#formubah_ptsp05').parsley();

$('#no_surat_ptsp05').parsley();

// PTSP06
$('#form_ptsp06').parsley();

$('#formupload_ptsp06_1').parsley();

$('#formupload_ptsp06_2').parsley();

$('#formupload_ptsp06_3').parsley();

$('#formupload_ptsp06_4').parsley();

$('#formupload_ptsp06_5').parsley();

$('#formubah_ptsp06').parsley();

$('#no_surat_ptsp06').parsley();

// PTSP07
$('#form_ptsp07').parsley();

$('#formupload_ptsp07_1').parsley();

$('#formupload_ptsp07_2').parsley();

$('#formupload_ptsp07_3').parsley();

$('#formupload_ptsp07_4').parsley();

$('#formupload_ptsp07_5').parsley();

$('#formupload_ptsp07_6').parsley();

$('#formupload_berita_acara_07').parsley();


$('#formubah_ptsp07').parsley();

$('#no_surat_ptsp07').parsley();

$('#ba_ptsp07').parsley();

// PTSP08
$('#form_ptsp08').parsley();

$('#formupload_ptsp08_1').parsley();

$('#formupload_ptsp08_2').parsley();

$('#formupload_ptsp08_3').parsley();

$('#formupload_ptsp08_4').parsley();

$('#formupload_ptsp08_5').parsley();

$('#formupload_ptsp08_6').parsley();

$('#formupload_ptsp08_7').parsley();

$('#formupload_ptsp08_8').parsley();

$('#formupload_ptsp08_9').parsley();

$('#formupload_ptsp08_10').parsley();

$('#formupload_berita_acara_08').parsley();

$('#formubah_ptsp08').parsley();

$('#no_surat_ptsp08').parsley();

$('#ba_ptsp08').parsley();

// PTSP09
$('#form_ptsp09').parsley();

$('#formupload_ptsp09_1').parsley();

$('#formupload_ptsp09_2').parsley();

$('#formupload_ptsp09_3').parsley();

$('#formupload_ptsp09_4').parsley();

$('#formupload_ptsp09_5').parsley();

$('#formupload_ptsp09_6').parsley();

$('#formupload_ptsp09_7').parsley();

$('#formupload_ptsp09_8').parsley();

$('#formupload_ptsp09_9').parsley();

$('#formupload_ptsp09_10').parsley();

$('#formupload_berita_acara_09').parsley();

$('#formubah_ptsp09').parsley();

$('#no_surat_ptsp09').parsley();

$('#ba_ptsp09').parsley();

// PTSP10
$('#form_ptsp10').parsley();

$('#formubah_ptsp10').parsley();

$('#formupload_ptsp10_1').parsley();

$('#formupload_ptsp10_2').parsley();

$('#formupload_ptsp10_3').parsley();

$('#formupload_ptsp10_4').parsley();

$('#formupload_ptsp10_5').parsley();

$('#formupload_ptsp10_6').parsley();

$('#formupload_ptsp10_7').parsley();

$('#formupload_ptsp10_8').parsley();

$('#formupload_ptsp10_9').parsley();

$('#formupload_ptsp10_10').parsley();

$('#formupload_berita_acara_10').parsley();

$('#no_surat_ptsp10').parsley();

$('#formba_ptsp10').parsley();


// PTSP11
$('#form_ptsp11').parsley();

$('#formupload_ptsp11').parsley();

$('#formubah_ptsp11').parsley();

$('#formupload_ptsp11_1').parsley();

$('#formupload_ptsp11_2').parsley();

$('#formupload_ptsp11_3').parsley();

$('#no_surat_ptsp11').parsley();

// PTSP12
$('#form_ptsp12').parsley();

$('#formupload_ptsp12_1').parsley();

$('#formubah_ptsp12').parsley();

$('#no_surat_ptsp12').parsley();


// PTSP13
$('#form_ptsp13').parsley();

$('#formupload_ptsp13_1').parsley();

$('#formupload_ptsp13_2').parsley();

$('#formubah_ptsp13').parsley();

$('#no_surat_ptsp13').parsley();

$('#formba_ptsp13').parsley();

// PTSP14
$('#form_ptsp14').parsley();

$('#formupload_ptsp14_1').parsley();

$('#formubah_ptsp14').parsley();

$('#no_surat_ptsp14').parsley();

$('#formba_ptsp14').parsley();

// PTSP15
$('#form_ptsp15').parsley();

$('#formupload_ptsp15_1').parsley();

$('#formubah_ptsp15').parsley();

$('#no_surat_ptsp15').parsley();

$('#formba_ptsp15').parsley();

// PTSP16
$('#form_ptsp16').parsley();

$('#formupload_ptsp16_1').parsley();

$('#formupload_ptsp16_2').parsley();

$('#formubah_ptsp16').parsley();

$('#no_surat_ptsp16').parsley();

// PTSP17
$('#form_ptsp17').parsley();

$('#formupload_ptsp17').parsley();

$('#formubah_ptsp17').parsley();

$('#formupload_ptsp17_1').parsley();

$('#formupload_ptsp17_2').parsley();

$('#formupload_ptsp17_3').parsley();

$('#no_surat_ptsp17').parsley();

// PTSP18
$('#form_ptsp18').parsley();

$('#formupload_ptsp18_1').parsley();

$('#formupload_ptsp18_2').parsley();

$('#formubah_ptsp18').parsley();

$('#no_surat_ptsp18').parsley();

// PTSP019
$('#form_ptsp19').parsley();

$('#formubah_ptsp19').parsley();

$('#formupload_ptsp19_1').parsley();

$('#formupload_ptsp19_2').parsley();

// PTSP20
$('#no_surat_ptsp20').parsley();

$('#form_ptsp20').parsley();

$('#formupload_ptsp20_1').parsley();

$('#formubah_ptsp20').parsley();

// PTSP021
$('#form_ptsp21').parsley();

$('#formubah_ptsp21').parsley();

$('#formupload_ptsp21_1').parsley();

// PTSP022
$('#form_ptsp22').parsley();

$('#formubah_ptsp22').parsley();

$('#formupload_ptsp22_1').parsley();

$('#formupload_ptsp22_2').parsley();

// PTSP023
$('#form_ptsp23').parsley();

$('#formubah_ptsp23').parsley();

$('#formupload_ptsp23_1').parsley();

// PTSP024
$('#form_ptsp24').parsley();

$('#formubah_ptsp24').parsley();

$('#formupload_ptsp24_1').parsley();

$('#formupload_ptsp24_2').parsley();

// PTSP025
$('#form_ptsp25').parsley();

$('#formubah_ptsp25').parsley();

// PTSP026
$('#form_ptsp26').parsley();

$('#formubah_ptsp26').parsley();

// PTSP027
$('#form_ptsp27').parsley();

$('#formubah_ptsp27').parsley();

$('#formupload_ptsp27_1').parsley();

