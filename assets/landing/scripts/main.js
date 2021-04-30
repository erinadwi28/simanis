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

// Masuk
$('#form_masuk').parsley();



