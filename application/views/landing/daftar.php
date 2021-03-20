<div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url('/assets/landing/images/login_form.png') ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Daftar</h3>
                                <p class="mb-4">daftar dan miliki akun Anda untuk menggunakan layanan ini.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="form-group first shadow">
                                    <label for="nik">NIK | 3404123456789</label>
                                    <input type="text" class="form-control" id="nik">
                                </div>
                                <div class="form-group first shadow">
                                    <label for="email">Email | contoh@email.com</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group first shadow">
                                    <label for="nama">Nama | Erina Dwi U</label>
                                    <input type="nama" class="form-control" id="nama">
                                </div>
                                <div class="form-group last shadow">
                                    <label for="kata_sandi">Kata Sandi</label>
                                    <input type="password" class="form-control" id="kata_sandi">
                                </div>
                                <div class="form-group last shadow">
                                    <label for="konfirmasi_kata_sandi">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="konfirmasi_kata_sandi">
                                </div>

                                <input type="submit" value="Daftar" class="btn btn-block btn-primary mt-4">
									<center class="mt-3">
                                        <small class="daftar">
                                            <i class="fas fa-user"></i> Sudah punya akun ? <a href="<?= base_url('masuk')?>">Masuk Sekarang</a> 
                                        </small>
                                            
                                        
                                    </center>
									<center class="mt-1">
                                        <a href="<?= base_url('beranda')?>"> <small>
                                            <i class="fas fa-arrow-left"></i> Kembali Ke Beranda
                                        </small>
                                            
                                        </a>
                                    </center>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>