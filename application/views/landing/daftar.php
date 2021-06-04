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

						<form action="<?= base_url('daftar/aksi_daftar'); ?>" method="post" id="form_daftar">
							<div class="form-group first shadow">
								<label for="nik">NIK | 3404123456789</label>
								<input type="text" class="form-control" id="nik" name="nik" required
									data-parsley-type="number">
							</div>
							<div class="form-group first shadow">
								<label for="email">Email | contoh@email.com</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="form-group first shadow">
								<label for="nama">Nama | Erina Dwi U</label>
								<input type="nama" class="form-control" id="nama" name="nama" required>
							</div>
							<div class="form-group first shadow">
								<label for="nama">No HandPhone</label>
								<input type="nama" class="form-control" id="no_hp" name="no_hp" required>
							</div>
							<div class="form-group last shadow">
								<label for="kata_sandi">Kata Sandi</label>
								<input type="password" class="form-control form-password" id="kata_sandi"
									name="kata_sandi" required>
							</div>
							<div class="form-group last shadow">
								<label for="konfirmasi_kata_sandi">Konfirmasi Kata Sandi</label>
								<input type="password" class="form-control form-password" id="konfirmasi_kata_sandi"
									name="konfirmasi_kata_sandi" required data-parsley-equalto="#kata_sandi">
							</div>

							<input type="checkbox" class="form-checkbox mt-3" /> lihat
							kata sandi
							<br>
							<div class="g-recaptcha mt-3" data-sitekey="6LcWJXwaAAAAAJpeWzQao7fZOgv3zBsUTCLH4t0b">
							</div>

							<input type="submit" value="Daftar" class="btn btn-block btn-primary mt-4">
							<center class="mt-3">
								<small class="daftar">
									<i class="fas fa-user"></i> Sudah punya akun ? <a
										href="<?= base_url('masuk') ?>">Masuk Sekarang</a>
								</small>


							</center>
							<center class="mt-1">
								<a href="<?= base_url('beranda') ?>"> <small>
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
