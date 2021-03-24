<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?= base_url('../assets/landing/images/login_form.png') ?>" alt="Image" class="img-fluid">
			</div>
			<div class="col-md-6 contents">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="mb-4">
							<h3>Masuk | Kasubag </h3>
							<p class="mb-4">masuk ke akun Anda untuk menggunakan layanan ini.</p>
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

						<form action="<?= base_url('masuk/aksi_login'); ?>" method="post">
							<div class="form-group first shadow">
								<label for="email">Email | contoh@email.com</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group last mb-4 shadow">
								<label for="kata_sandi">Kata Sandi</label>
								<input type="password" class="form-control" id="kata_sandi" name="kata_sandi">
							</div>

							<div class="d-flex mb-3 align-items-center">
								<span class="ml-auto"><a href="#" class="lupa_sandi"> <small> Lupa Kata Sandi
											?</small></a></span>
							</div>

							<div class="g-recaptcha mb-2" data-sitekey="6LcWJXwaAAAAAJpeWzQao7fZOgv3zBsUTCLH4t0b">
							</div>

							<input type="submit" value="Masuk" class="btn btn-block btn-primary">
							<center class="mt-3">
								<small class="daftar">
									<i class="fas fa-user"></i> Belum punya akun ? <a href="<?= base_url('daftar') ?>">Daftar Sekarang</a>
								</small>
							</center>
							<center class="mt-1">
								<a href="<?= base_url('beranda') ?>">
									<small>
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