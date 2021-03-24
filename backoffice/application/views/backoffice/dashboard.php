<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->

  <div class="judullist">
    <center>
      <h3>Halaman Utama Back Office</h3>
    </center>
  </div>
  <!-- Page Heading Data Permohonan PTSP-->
  <div class="card shadow h-100 p-0 mb-3">
    <div class="card-body px-3 py-2" style="background-color: #5EC275; border-radius: 5px;">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h5 mb-0 text-light">Data Permohonan PTSP</h1>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Data Proses Validasi Kemenag -->
    <div class="col-xl-4 col-md-3 mb-3">
      <div class="card border-left-warning shadow h-100 p-0">
        <div class="card-body px-3 py-3 ">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="h6 font-weight-bold text-warning text-uppercase mb-1">
                Permohonan Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                foreach ($total_notif as $total_notif) { ?>
                  <?= $total_notif->total_notif; ?>
                <?php } ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa fa-envelope-open-text fa-2x text-gray-300"></i>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <a href="#" class="btn btn-warning float-right"><i class="far fa-eye nav-icon"></i> Tampilkan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Data Permohonan Ditolak -->
    <div class="col-xl-4 col-md-3 mb-4">
      <div class="card border-left-danger shadow h-100 p-0">
        <div class="card-body px-3 py-3 ">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="h6 font-weight-bold text-danger text-uppercase mb-1">
                Permohonan Di Tolak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">5
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file-excel fa-2x text-gray-300"></i>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <a href="" class="btn btn-danger float-right"><i class="far fa-eye nav-icon"></i> Tampilkan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Data Permohonan Selesai -->
    <div class="col-xl-4 col-md-3 mb-3">
      <div class="card border-left-success shadow h-100 p-0">
        <div class="card-body px-3 py-3 ">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="h6 font-weight-bold text-success text-uppercase mb-1">
                Permohonan Selesai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
            </div>
            <div class="col-auto">
              <i class="fa fa fa-clipboard-check fa-2x text-gray-300"></i>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <center>
                <a href="" class="btn btn-success float-right"><i class="far fa-eye nav-icon"></i> Tampilkan</a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Heading Data Laynan PTSP-->
  <div class="card shadow h-100 p-0 mb-3">
    <div class="card-body px-3 py-2" style="background-color: #5EC275; border-radius: 5px;">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h5 mb-0 text-light">Daftar Layanan PTSP</h1>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer" style="background-color: #007530;">
  <div class="container my-auto">
    <div class="copyright text-center my-auto text-white">
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