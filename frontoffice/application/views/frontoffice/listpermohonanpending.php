
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
            <h3>Data Permohonan PTSP Pending</h3>
          </div>
          <!-- DataTables Warga -->
          <div class="card shadow mb-4">
            <div class="card-body">
        
              <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
              <?php if ($this->session->flashdata('success')) : ?>
              <?php endif; ?> -->
        
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Layanan PTSP</th>
                      <th>Tanggal Permohonan</th>
                      <th>Tanggal Pengecekan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <?php
                    $no = 1;
                    foreach ($data_permohonan_ditolak as $permohonan) {
                    ?> -->
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><label class="badge badge-danger"><i class="far fa-times-circle">Pending</i></label></td>
                        <td></td>
                        <td>
                          <form role="form" action="<?= base_url() ?>warga/detail_data_permohonan/<?= $permohonan->id_permohonan_surat ?>/<?= $permohonan->id_nama_surat ?>" method="post" id="formUbah">
                            <div>
                              <div class="float-right">
                                <a href="">
                                  <button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
                                    <i class="far fa-eye nav-icon"></i>
                                    Detail
                                  </button>
                                </a>
                              </div>
                            </div>
                            <input type="hidden" class="form-control form-user-input " name="notif" id="notif" value="Dibaca">
                          </form>
                        </td>
                      </tr>
                    <!-- <?php } ?> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
