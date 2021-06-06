<!-- Footer -->
<footer class="sticky-footer bg-white shadow-lg mt-4">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>2021 Copyright &copy; Kementrian Agama Kab. Klaten</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar ?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Tekan Keluar untuk melanjutkan <br>
				Tekan Batal untuk membatalkan
			</div>
			<div class="modal-footer">
				<button class="btn btn-tolak btn-sm" type="button" data-dismiss="modal">
					Batal
				</button>
				<a class="btn btn-primary btn-sm" href="<?= base_url('masuk/logout') ?>">Keluar</a>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('../assets/dashboard/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('../assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('../assets/dashboard/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('../assets/dashboard/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('../assets/dashboard/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('../assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('../assets/dashboard/js/demo/datatables-demo.js') ?>"></script>

<!-- Parsley -->
<script src="<?= base_url('../assets/dashboard/library/parsley/parsley.js') ?>"></script>

<script src="<?= base_url('../assets/dashboard/js/script.js') ?>"></script>

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
</body>

</html>
