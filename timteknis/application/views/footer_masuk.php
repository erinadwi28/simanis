<script src="<?= base_url('../assets/landing/libraries/jquery/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('../assets/landing/libraries/bootstrap/js/bootstrap.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/landing/libraries/retina/retina.min.js') ?>"></script> -->
    <script src="<?= base_url('../assets/landing/libraries/owl_carousel/dist/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('../assets/landing/scripts/main.js') ?>"></script>

    <!--google recaptcha-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
    	$(document).ready(function () {
    		$(".toggle-password").click(function () {
    			$(this).toggleClass("fa-eye fa-eye-slash");
    			var input = $($(this).attr("toggle"));
    			if (input.attr("type") == "password") {
    				input.attr("type", "text");
    			} else {
    				input.attr("type", "password");
    			}
    		});
    	});
    </script>

    </body>

    </html>