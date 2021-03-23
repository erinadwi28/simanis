        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
            <h3>Data Permohonan Surat Dalam Proses FO</h3>
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
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_permohonan as $permohonan) {
                    ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $permohonan->nama_layanan ?></td>
                        <td><?= $permohonan->tgl_permohonan ?></td>
                        <td><label class="badge badge-info"><i class="far fa-clock"><?= $permohonan->status ?></i>
                          </label></td>
                        <td>
                          <div>
                            <a href="<?= base_url() ?>dashboard/detail_data_permohonan/<?= $permohonan->id_permohonan_ptsp ?>/<?= $permohonan->id_layanan ?>" class="btn btn-primary btn-sm">
                              <i class="far fa-eye nav-icon"></i>
                              Detail
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->