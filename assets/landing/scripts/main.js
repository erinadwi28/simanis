$(function () {
	'use strict';

	$('.form-control').on('input', function () {
		var $field = $(this).closest('.form-group');
		if (this.value) {
			$field.addClass('field--not-empty');
		} else {
			$field.removeClass('field--not-empty');
		}
	});

});

// SEJARAH
$(function () {
	$(".sejarah-all").hide();
	$(".baca_selengkapnya").click(function () {
		$(".sejarah-all").slideDown('slow');
		$(this).hide();

	})
});

$(function () {
	$(".selesai_baca").click(function () {
		$(".sejarah-all").slideUp('slow');
		$(".sejarah-all").hide();
		$(".baca_selengkapnya").show();
	})
});

// Pengaduan
$('#form_pengaduan').parsley();

// Masuk pengguna
$('#form_masuk').parsley();
// Daftar pengguna
$('#form_daftar').parsley();

// Masuk fo
$('#form_masuk_fo').parsley();
// Daftar pengguna
$('#form_daftar_fo').parsley();

// Masuk bo
$('#form_masuk_bo').parsley();
// Daftar bo
$('#form_daftar_bo').parsley();

// Masuk kasi
$('#form_masuk_kasi').parsley();
// Daftar kasi
$('#form_daftar_kasi').parsley();

// Masuk kasubag
$('#form_masuk_kasubag').parsley();
// Daftar kasubag
$('#form_daftar_kasubag').parsley();

// Masuk kepala
$('#form_masuk_kepala').parsley();
// Daftar kepala
$('#form_daftar_kepala').parsley();

// Masuk tim teknis
$('#form_masuk_timteknis').parsley();
// Daftar tim teknis
$('#form_daftar_timteknis').parsley();




