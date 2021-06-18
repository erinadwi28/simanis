<?php
  //database connection config
  $hostname="localhost";
  $db_user="root";
  $db_pass="";
  $db_name="simanis";

  //connecting to database
  $connection=mysqli_connect($hostname, $db_user, $db_pass, $db_name);
  if(mysqli_connect_errno()){
    die("Error connecting to the database");
  }
  //adding new visitor
  $visitor_ip=$_SERVER['REMOTE_ADDR'];

  //checking if visitor is unique
  $query= "SELECT * FROM counter WHERE ip_address='$visitor_ip'";
  $result=mysqli_query($connection, $query);
  //checking query error
  if(!$result){
    die("Retriving Query Error <br>".$query);
  }
  $total_visitors=mysqli_num_rows($result);
  if ($total_visitors<1){
	$query= "INSERT INTO counter(ip_address) VALUES('$visitor_ip')";
	$result=mysqli_query($connection, $query);
  }
  //retriving existing visitors
  $query= "SELECT * FROM counter";
  $result=mysqli_query($connection, $query);

  //checking query error
  if(!$result){
    die("Retriving Query Error <br>".$query);
  }
  $total_visitors=mysqli_num_rows($result);

?>
<!-- Navbar -->
<div class="container-fluid">
	<div class="row bg-white">
		<nav class="col navbar navbar-expand-lg navbar-light bg-white shadow px-0 py-0">
			<div class="container">
				<a href="#" class="navbar-brand">
					<img src="<?= base_url('assets/landing/images/logo.png')?>" alt="Logo SIMANIS" class="img-fluid">
				</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
					data-target="#navb">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navb">
					<ul class="navbar-nav ml-auto mr-3">
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('beranda')?>" class="nav-link">Beranda</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('profil')?>" class="nav-link">Profil</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('ptsp')?>" class="nav-link">Layanan PTSP</a>
						</li>
						<li class="nav-item mx-md-2">
							<a href="<?= base_url('pengaduan')?>" class="nav-link">Pengaduan</a>
						</li>
					</ul>

					<!-- mobile button -->
					<form class="form-inline d-sm-block d-md-none" method="post" action="<?= base_url('masuk')?>">
						<button class="btn btn-login my-2 my-sm-0 px-3">Masuk | Daftar</button>
					</form>

					<!-- desktop button -->
					<form class="form-inline my-2 my-lg-0 d-none d-md-block" method="post"
						action="<?= base_url('masuk')?>">
						<button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-3">Masuk | Daftar</button>
					</form>
				</div>
			</div>
		</nav>
	</div>
</div>
</div>

<!-- Header -->
<header class="text-center header-profile">
<div class="container-fluid">
	<div class="row banner-profile">
		<div class="col-md-12">
			<h1>PETA SITUS</h1>
		</div>
	</div>
</div>
</header>

<!-- Chat Haji & Umrah -->
<div class="container haji-umrah">
	<div class="sticky-container">
		<ul class="sticky">
			<li>
				<img src="<?= base_url('assets/landing/images/wa.png')?>" width="32" height="32">
				<p><a href="https://api.whatsapp.com/send?phone=628112650662&text=Info" target="_blank">Chat Haji <br> & Umrah</a></p>
			</li>
			<li>	
			<p style="padding-left:30px; font-size:18pt;">
			    <?php echo $total_visitors; ?>
			</p>
			<p style="font-size:8pt; margin-left:25px; margin-top:2px;">Visitors</p>
			</li>
		</ul>
	</div>
</div>

<!-- Main Content -->
<main>
	<section class="sejarah">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-12">
					<div class="card shadow">
						<div class="card-header text-center mb-0 py-1">
							<h4></h4>
						</div>
						<div class="card-body px-5">
							<div class="peta_situs">
								<ol type="1">
                                    <li><a href="<?= base_url('beranda') ?>">Beranda</a>
                                        <ul type="disc" class="ml-4">
                                            <li><a href="<?= base_url('beranda') ?>">Profil Singkat</a></li>
                                            <li><a href="<?= base_url('beranda') ?>">Tata Cara Penggunaan</a></li>
                                            <li><a href="<?= base_url('beranda') ?>">Download Aplikasi</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('profil') ?>">Profil</a>
                                        <ul type="disc" class="ml-4">
                                            <li><a href="<?= base_url('profil') ?>">Sejarah</a></li>
                                            <li><a href="<?= base_url('profil') ?>">Visi dan Misi</a></li>
                                            <li><a href="<?= base_url('profil') ?>">Tugas dan Fungsi</a></li>
                                            <li><a href="<?= base_url('profil') ?>">Kontak Kami</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('ptsp') ?>">Layanan PTSP</a>
                                        <ul type="disc" class="ml-4">
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_1') ?>">Permohonan Rohaniawan dan Petugas Do'a</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_2') ?>">Rekomendasi Kegiatan Keagamaan</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_3') ?>">Legalisir Ijazah</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_4') ?>">Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_5') ?>">Permohonan Surat Keterangan Haji Pertama</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_6') ?>">Permohonan Rekomendasi Paspor Haji dan Umrah</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_7') ?>">Permohonan Rekomendasi Izin Pendirian KBIHU</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_8') ?>">Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_9') ?>">Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_10') ?>">Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_11') ?>">Permohonan Rekomendasi Pindah Siswa Madrasah</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_12') ?>">Permohonan Rekomendasi Bantuan RA/Madrasah</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_13') ?>">Permohonan Rekomendasi Ijin Operasional Lembaga Baru</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_14') ?>">Permohonan Ijop LPQ</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_15') ?>">Permohonan Ijop Madin</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_16') ?>">Rekomendasi Proposal PD Pontren (Bantuan Sarpras/Pembangunan/Rehabilitasi Bangunan)</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_17') ?>">Permohonan Tambahan Jam Mengajar Guru</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_18') ?>">Rekomendasi Permohonan Bantuan Masjid</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_19') ?>">Permohonan Petugas Siaran Keagamaan</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_20') ?>">Permohonan Ijin Operasional Majelis Taklim</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_21') ?>">Permohonan Arah Ukur Kiblat</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_22') ?>">Rekomendasi Permohonan ID Masjid dan Musala</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_23') ?>">Permohonan Mutasi GPAI PNS</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_24') ?>">Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_25') ?>">Konsultasi dan Informasi Sertifikasi Halal, Zakat dan Wakaf</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_26') ?>">Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru, Haji</a></li>
                                            <li><a href="<?= base_url('ptsp/detail_permohonan_27') ?>">Permohonan Surat Keterangan Tambahan Penghasilan</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('pengaduan') ?>">Pengaduan</a></li>
                                        <ul type="disc" class="ml-4">
                                            <li><a href="<?= base_url('pengaduan') ?>">Pengaduan ke Kemenag Kab. Klaten</a></li>
                                            <li><a href="<?= base_url('pengaduan') ?>">Whistleblowing System</a></li>
                                        </ul>
                                    <li><a href="<?= base_url('masuk') ?>">Masuk | Daftar</a></li>
                                        <ul type="disc" class="ml-4">
                                            <li><a href="<?= base_url('masuk') ?>">Masuk</a></li>
                                            <li><a href="<?= base_url('daftar') ?>">Daftar</a></li>
                                        </ul>
                                    <li><a href="#">Peta Situs</a></li>
                                </ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</main>
