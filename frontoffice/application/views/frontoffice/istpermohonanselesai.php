
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
              <h3>Data Permohonan Surat Selesai</h3>
          </div>
      
          <!-- DataTables Warga -->
          <div class="card shadow mb-4">
              <div class="card-body">
                  
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Jenis Layanan</th>
                                  <th>Tgl Permohonan</th>
                                  <th>Tgl Disetujui</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              
                                  <tr>
                                      <td>1</td>
                                      <td>KBHIU</td>
                                      <td>25/08/2020</td>
                                      <td>28/08/2020</td>
                                      <td><label class="badge badge-success"><i class="far fa-times-cicrle"></i> Selesai</label></td>
                                      <td>
                                          <form role="form" action="<?= base_url() ?>warga/lihat_surat/<?= $w->id_permohonan_surat ?>/<?= $w->id_nama_surat ?>" method="post" id="formUbah">
                                              <div>
                                                  <div class="float-right">
                                                      <a href="">
                                                          <button id="btn_simpan" class="btn btn-sm btn-info" type="submit">
                                                              <i class="far fa-eye nav-icon"></i>
                                                              Lihat Surat
                                                          </button>
                                                      </a>
                                                  </div>
                                              </div>
                                              <input type="hidden" class="form-control form-user-input " name="notif" id="notif" value="Dibaca">
                                          </form>
                                      </td>
                                  </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
