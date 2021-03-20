<!-- Footer -->
    <footer class="section-footer">
        <hr>
        <div class="container pt-5 pb-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>MENU</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Beranda</a></li>
                                <li><a href="#">Profil</a></li>
                                <li><a href="#">Tata Cara</a></li>
                                <li><a href="#">Layanan PTSP</a></li>
                                <li><a href="#">Pengaduan</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-lg-3">
                            <h5>MEDIA SOSIAL </h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-lg-3">
                            <h5>LINK APPS</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Klik disini</a></li>
                                <li><a href="#">V.1</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-lg-3">
                            <h5>KANTOR</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Jalan Ronggowarsito, Kab. Klaten,</a></li>
                                <li><a href="#">Jawa Tengah, Indonesia</a></li>
                                <li><a href="#">0272-321154</a></li>
                                <li><a href="#">kabklaten@kemenag.go.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-items-center pt-4">
                <div class="col-auto text-gray-500 font-weight-light mb-4">
                    2021 Copyright Kementerian Agama Kab. Klaten • All rights reserved
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url('assets/landing/libraries/jquery/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/landing/libraries/bootstrap/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/landing/libraries/retina/retina.min.js') ?>"></script>
    <script src="<?= base_url('assets/landing/libraries/owl_carousel/dist/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/landing/scripts/main.js') ?>"></script>
    <!-- Date -->
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "Nopember", "Desember");
        document.getElementById("top-info-date").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] +
            " " + tahun + " ";
    </script>
    <!-- Carousel -->
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 1000,
                smartSpeed: 1500,
            });
        });
    </script>
</body>

</html>