        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
            <h3>Form Permohonan Surat Keterangan Haji Pertama<h3>
                <!-- <a href=""> -->
                <button id="btn_kembali" class="btn btn-sm btn-warning" type="">
                  <i class="fa fa-arrow-left">
                  </i> Kembali
                </button>
                <!-- </a> -->
          </div>

          <!--Begin Content Profile-->
          <div class="row clearfix">
            <div class="col-md-3 mb-4">
              <!-- Liat SOP -->
              <div class="card shadow mb-4">
                <div class="card-header py-2">
                  <center>
                    <h6 class="m-0 font-weight-bold">SOP</h6>
                  </center>
                </div>
                <center>
                  <div class="card-body" style="padding: 15px;">
                    <center>
                      <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-eye">
                        </i> Lihat
                      </button>
                    </center>
                  </div>
                </center>
              </div>
            </div>
            <?php
            foreach ($detail_profil_saya as $detail) { ?>
              <div class="col-xs col-sm-8">
                <div class="card shadow mb-5">
                  <div class="body">
                    <form class="form-horizontal" id="form5" enctype="multipart/form-data" action="<?= base_url('dashboard/aksi_pengajuan_ptsp05') ?>" method="POST">
                      <div class="form-group">
                        <div class="form-group">
                          <div class="form-group" style="margin-top: 15px;">
                            <div class="form-group row" style="margin-left: 10px;">
                              <label for="Nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $detail->nama; ?>">
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
                                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail->tempat_lahir; ?>">
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
                                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="">
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
																<textarea type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value=""></textarea>
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
                                  <input type="text" class="form-control" id="no_porsi" name="no_porsi" value="">
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
                              <label for="Tahun_angkatan_haji" class="col-sm-3 col-form-label">Tahun Angkatan Haji</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="tahun_angkatan_haji" name="tahun_angkatan_haji" value="">
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
                              <label for="No_hp" class="col-sm-3 col-form-label">No. Handphone</label>
                              <div class="col-sm-8">
                                <div class="form-line focused">
                                  <input type="text" class="form-control" id="no_hp" name="no_hp" value="">
                                  <!-- <i class=" fas fa-check-circle"></i>
                                  <i class="fas fa-exclamation-circle"></i>
                                  <small>Error massage</small> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="form-group row" style="margin-left: 10px;">
                          <label class="col-sm-3 col-form-label" for="file-upload-surat-permohonan">Surat Permohonan</label>
                          <div class="custom-file col-sm-7 ml-3">
                            <div class="form-line-upload">
                              <label class="custom-file-label" for="file-upload-surat-permohonan">pilih file...</label>
                              <input type="file" class="custom-file-input" id="file-upload-surat-permohonan" name="berkas">
                              <!-- <small>Error massage</small> -->
                            </div>
                          </div>
                        </div>
                      </div>
											<div class="form-group">
                        <div class="form-group row" style="margin-left: 10px;">
                          <label class="col-sm-3 col-form-label" for="file-upload-surat-pernyataan">Surat Pernyataan</label>
                          <div class="custom-file col-sm-7 ml-3">
                            <div class="form-line-upload">
                              <label class="custom-file-label" for="file-upload-surat-pernyataan">pilih file...</label>
                              <input type="file" class="custom-file-input" id="file-upload-surat-pernyataan" name="berkas">
                              <!-- <small>Error massage</small> -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- <input type="hidden" class="form-control" id="id_nama_surat" name="id_nama_surat" value="5">
                      <input type="hidden" class="form-control" id="id_warga" name="id_warga" value=">
                      <input type="hidden" class="form-control" id="status" name="status" value="Belum Tuntas"> -->
                  </div>
                  <?php } ?>
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
          </div>
          <!--End Content Profile-->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->