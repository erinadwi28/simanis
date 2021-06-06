<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="judullist py-3">Form Ubah Sandi Back Office</h3>
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/list_data_bo') ?>">Back Office</a></li>
				<li class="breadcrumb-item active" aria-current="page">Ubah Sandi</li>
			</ol>
		</nav>
	</div>

	<?php foreach ($detail_bo as $detail) {
		?>
	<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('success') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('error') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
    </div>
    <div class="col-md-2"></div>
  </div>
	<!--Begin Content Profile-->
	<div class="row">
		<div class="col-md-2 mb-4">
			<div class="mb-4"></div>
		</div>
		<div class="col-md-8 mb-4">
			<div class="row">
				<div class="col-md-12 mb-3">
					<div class="card shadow mb-3">
						<div class="card-body">
							<form role="form" action="<?= base_url('dashboard/aksi_ubah_sandi_bo/' . $detail->id_bo) ?>" method="post"
								id="ubah_pass">
								<div class="row">
                  <div class="col-md-12">
                    <div class="form-group-pass mt-3">
                      <label class="label-control" for="kata_sandi"><b>Masukkan Kata Sandi Baru</b></label>
                      <input type="password" placeholder="masukkan disini..." class="form-control form-user-input form-password" name="kata_sandi" id="kata_sandi" required minlength="8">
                    </div>
                    <div class="form-group-pass mt-3">
                      <label class="label-control" for="konfirmasi"><b>Ulangi Kata Sandi Baru</b></label>
                      <input type="password" placeholder="masukan ulang kata sandi baru disini..." class="form-control form-user-input form-password" name="konfirmasi" id="konfirmasi" required minlength="8" data-parsley-equalto="#kata_sandi">
                      <input type="checkbox" class="form-checkbox" /> lihat
                      kata sandi
                      <br />
                    </div>
                    <center>
                      <a href="">
                        <button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
                          <i class="far fa-save nav-icon">
                          </i> Simpan
                        </button>
                      </a>
                    </center>
                  </div>
                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php } ?>
	<!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
