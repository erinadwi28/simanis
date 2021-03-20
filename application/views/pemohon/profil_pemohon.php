<!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
                <h3>Profil Saya</h3>
                <a href="">
                    <button id="btn_kembali" class="btn btn-sm btn-warning" type="submit">
                        <i class="fa fa-arrow-left">
                        </i> Kembali
                    </button>
                </a>
            </div>
        
            <!-- Content Row line 1-->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <!-- Foto Profil -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <center> 
                                <h6 class="m-0 font-weight-bold">Foto Profil</h6>
                            </center>
                        </div>
                        <center>
                        <div class="card-body" style="padding: 15px;">
                        </div>
                        </center>
                        
                        <!-- Upload Foto Profil -->
                        <div class="card-footer py-3">
                            <form action="<?= base_url('warga/upload_foto_profil') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_foto_profil">
                                            <?php
                            foreach ($detail_profil_saya as $saya) { ?>
                                <div class="form-group ml-2 mr-2">
                                    <div class="input-group">
                                        <div class="form-group-upload">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="file-upload-profil">pilih foto
                                                profil...</label>
                                            <input type="file" class="custom-file-input" id="file-upload-profil" name="berkas">
                                            <input type="hidden" class="form-control form-user-input" name="id_warga" id="id_warga" value="<?= $saya->id_warga; ?>">
                                            <!-- <i class=" fas fa-exclamation-circle"></i>
                                            <h6>Error massage</h6> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <center>
                                <button class="btn btn-sm btn-primary" type="submit">
                                    <i class="fa fa-upload">
                                    </i> Upload
                                </button>
                            </center>		
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <!-- Detail Data -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- <?php
                            foreach ($detail_profil_saya as $detail) { ?> -->
                                <table class="table-hover table-responsive">
                                    <tbody>
                                        <tr>
                                            <td><b>NIK</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->nik; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Nama Lengkap</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->nama; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Tempat Lahir</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->tempat_lahir; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Lahir</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Kelamin</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->jenis_kelamin; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Golongan Darah</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->golongan_darah; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Agama</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->agama; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Alamat</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->alamat; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>RT</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->rt; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Kelurahan</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->kelurahan; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Kecamatan</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->kecamatan; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Status Perkawinan</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->status_perkawinan; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Pekerjaan</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->pekerjaan; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Kewarganegaraan</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->kewarganegaraan; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Nomor Kartu Keluarga</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->no_kk; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Pendidikan Terakhir</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->pendidikan_terakhir; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Status Hubungan Dalam Keluarga</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->status_hub_kel; ?></td> -->
                                        </tr>
                                        <tr>
                                            <td><b>Nomor HandPhone</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td>:</td>
                                            <td> </td>
                                            <td> </td>
                                            <!-- <td><?= $detail->no_hp; ?></td> -->
                                        </tr>
                                    <!-- <?php } ?> -->
                                    </tbody>
                                </table>
                        </div>
                        <div class="card-footer">
                        <em class="float-center small text-danger">*Anda bisa mengubah Kata Sandi serta Foto Profil, Foto KTP, dan Foto KK. <br> 
                        Untuk ubah data harap hubungi Nomor Telepon berikut : <br>
                        No Telepon : 085713609299</em>
        
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
