<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php
    foreach ($detail_profil_saya as $detail) { ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4 judullist">
            <h3>Profil Kasi</h3>
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
                            <h6 class="m-0 font-weight-bold ">Foto Profil</h6>
                        </center>
                    </div>
                    <center>
                        <div class="card-body" style="padding: 15px;">
                            <img src="<?= base_url(); ?>../assets/dashboard/images/kasi/profil/<?= $kasi['foto_profil_kasi'] ?>" alt="foto profil" class="img-fluid">
                        </div>
                    </center>

                    <!-- Upload Foto Profil -->
                    <div class="card-footer py-3">
                        <form action="<?= base_url('dashboard/upload_foto_profil') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form_upload_foto_profil">
                            <?php
                            foreach ($detail_profil_saya as $saya) { ?>
                                <div class="form-group ml-2 mr-2">
                                    <div class="input-group">
                                        <div class="form-group-upload">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="file-upload-profil">pilih foto
                                                    profil...</label>
                                                <input type="file" class="custom-file-input" id="file-upload-profil" name="berkas">
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

                        <table class="table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td><b>Nama Lengkap</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td> </td>
                                    <td><?= $detail->nama; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td> </td>
                                    <td><?= $detail->email; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor HP</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td> </td>
                                    <td><?= $detail->no_hp; ?></td>
                                </tr>

                            <?php } ?>
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