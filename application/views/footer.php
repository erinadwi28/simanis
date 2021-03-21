<!-- Bootstrap core JavaScript-->
<link rel="stylesheet" href="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>" />

<!-- Core plugin JavaScript-->
<link rel="stylesheet" href="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>" />

<!-- Custom scripts for all pages-->
<link rel="stylesheet" href="<?= base_url('assets/js/sb-admin-2.min.js') ?>" />

<!-- Lightbox Ekko -->
<link rel="stylesheet" href="<?= base_url('assets/vendor/lightbox/dist/ekko-lightbox.min.js') ?>" />

<!-- Script Lightbox Ekko -->
<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});
</script>
</body>

</html>
