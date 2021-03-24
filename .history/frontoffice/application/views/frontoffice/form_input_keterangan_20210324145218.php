<div class="row px-4 mb-2">
    <div class="col-md-12 ">
        <a href="<?= base_url('admin/list_data_permohonan') ?>" class="float-right">
            <button id="btn_simpan" class="btn btn-sm btn-warning" type="submit">
                <i class="fa fa-arrow-left">
                </i> Kembali
            </button>
        </a>
    </div>
</div>

<div class="row py-2 px-3">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-2">
            <div class="card-body">
                <div class="preview">
                    <center>
                        <h1 class="h3 text-gray-800">Form Inputan Keterangan Revisian Permohonan</h1>
                    </center>
                </div>
                <div class="preview mt-0">
                    <center>
                        <div class="col-md-12 m-0">
                            <br>
                            <em class="float-center small text-danger">*Masukkan keterangan dengan lengkap, alasan ini akan
                                dikirim ke pemohon agar mengetahuinya</em>

                            <form role="form" action="<?= base_url('dashboard/kirim_alasn_permohonan') ?>" method="post" id="formketerangan">
                                <div class="form-row align-items-center">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mt-4 mb-2">
                                        <div class="form-group-surat">
                                            <textarea type="text" class="form-control mb-2" name="keterangan" id="keterangan" placeholder="Masukan keterangan disini..."></textarea>
                                            <!-- <i class="fas fa-check-circle"></i>
                                            <i class="fas fa-exclamation-circle"></i>
                                            <small> Error Message </small> -->
                                        </div>
                                        <input type="hidden" class="form-control form-user-input" name="id_permohonan_ptsp" id="id_permohonan_ptsp" value="<?= $id_permohonan_ptsp['id_permohonan_ptsp']; ?>">
                                        <input type="hidden" class="form-control form-user-input" name="nama" id="nama" value="<?= $nama['nama']; ?>">
                                    </div>
                                    <div class="col-md-2"> </div>
                                </div>
                                <div class="form-row align-items-center">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <a href="">
                                            <button id="btn_simpan" class="btn btn-sm btn-primary" type="submit">
                                                Kirim Ke Pemohon <i class="fas fa-paper-plane fa-sm">
                                                </i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-2"> </div>
                                </div>
                            </form>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</div>