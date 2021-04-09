<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
    <h3>Form Ubah Kata Sandi Saya</h3>
    <a href="">
      <button id="btn_kembali" class="btn btn-sm btn-warning" type="submit">
        <i class="fa fa-arrow-left">
        </i> Kembali
      </button>
    </a>
  </div>

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

  <!-- Content Row line 1-->
  <div class="row">
    <div class="col-md-2 mb-4">
      <!-- Foto -->
      <div class="mb-4">

      </div>
    </div>
    <div class="col-md-8 mb-4">
      <!-- Detail Data -->
      <div class="row">
        <div class="col-md-12 mb-3">
          <!-- Detail Data -->
          <div class="card shadow mb-3">
            <div class="card-body">
              <form role="form" action="<?= base_url() ?>dashboard/ubah_sandi" method="post" id="ubah_pass">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group-pass">
                      <label class="label-control" for="kata_sandi_awal"><b>Masukkan Kata Sandi
                          yang lama</b></label>
                      <input type="password" placeholder="masukkan disini..." class="form-control form-user-input form-password" name="kata_sandi_awal" id="kata_sandi_awal">


                      <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> -->
                    </div>
                    <div class="form-group-pass mt-3">
                      <label class="label-control" for="kata_sandi_baru"><b>Masukkan Kata Sandi yang
                          baru</b></label>
                      <input type="password" placeholder="masukkan disini..." class="form-control form-user-input form-password" name="kata_sandi_baru" id="kata_sandi_baru">
                      <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> <br> -->
                    </div>
                    <div class="form-group-pass mt-3">
                      <label class="label-control" for="konfirmasi"><b>Ulangi Kata Sandi yang
                          baru</b></label>
                      <input type="password" placeholder="masukan konfirmasi sandi disini..." class="form-control form-user-input form-password" name="konfirmasi" id="konfirmasi">
                      <!-- <i class="fas fa-check-circle"></i>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <small>Error Message</small> <br> -->
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
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->