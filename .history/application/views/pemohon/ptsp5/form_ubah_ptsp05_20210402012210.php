        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
            <h3>Form Ubah Permohonan Surat Keterangan Haji Pertama<h3>
                <!-- <a href="<?= base_url('warga') ?>"> -->
                <button id="btn_kembali" class="btn btn-sm btn-warning" type="">
                  <i class="fa fa-arrow-left">
                  </i> Kembali
                </button>
                <!-- </a> -->
          </div>

          <!--Begin Content Profile-->
          <div class="row clearfix">
            <div class="col-md-2 mb-4">
              
          </div>
          <?php
          foreach ($detail_ptsp as $detail) { ?>
					<div class="col-xs col-sm-8">
                <div class="card shadow mb-5">
                  <div class="body">
                    <form class="form-horizontal" id="form5" enctype="multipart/form-data" action="<?= base_url() ?>dashboard/aksi_update_pengajuan_ptsp05/<?= $detail->id_permohonan_ptsp ?>" method="POST">
                      <div class="form-group">
                        <div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $detail->nama ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
												<div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail->tempat_lahir ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
												<div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $detail->tanggal_lahir ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
												<div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
																<textarea type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail->alamat ?>"></textarea>
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
												<div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="No_porsi" class="col-sm-3 col-form-label">No. Porsi</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="nomor_porsi" name="nomor_porsi" value="<?= $detail->nomor_porsi ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
												<div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Tahun_angkatan_haji" class="col-sm-3 col-form-label">Tahun Angkatan Haji Hijriah</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="tahun_hijriah" name="tahun_hijriah" value="<?= $detail->tahun_hijriah ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Tahun_angkatan_haji" class="col-sm-3 col-form-label">Tahun Angkatan Haji Masehi</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="tahun_hijriah" name="tahun_masehi" value="<?= $detail->tahun_masehi ?>">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <input type="hidden" class="form-control" id="id_nama_surat" name="id_nama_surat" value="5">
                      <input type="hidden" class="form-control" id="id_warga" name="id_warga" value=">
                      <input type="hidden" class="form-control" id="status" name="status" value="Belum Tuntas"> -->
                  </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="#">
                      <button id="btn_simpan" class="btn btn-sm btn-success" type="submit">
                        <i class="far fa-save nav-icon">
                        </i> Simpan
                      </button>
                    </a>
                  </div>
                </div>
                </form>
                </div>
                </form>
              </div>
        <?php } ?>
        </div>
        <!--End Content Profile-->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->