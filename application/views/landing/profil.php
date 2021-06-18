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
							<a href="<?= base_url('profil')?>" class="nav-link active">Profil</a>
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
			<h1>PROFIL</h1>
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
							<h4>SEJARAH</h4>
						</div>
						<div class="card-body px-5">
							<div class="sejarah-short">
								<p class="card-text">
									Bangsa Indonesia adalah bangsa yang religius. Hal tersebut tercermin baik dalam
									kehidupan bermasyarakat maupun dalam kehidupan bernegara. Di lingkungan
									masyarakat-terlihat terus meningkat kesemarakan dan kekhidmatan kegiatan keagamaan
									baik
									dalam bentuk ritual, maupun dalam bentuk sosial keagamaan. Semangat keagamaan
									tersebut,
									tercermin pula dalam kehidupan bernegara yang dapat dijumpai dalam dokumen-dokumen
									kenegaraan tentang falsafah negara Pancasila, UUD 1945, GBHN, dan buku Repelita
									serta
									memberi jiwa dan warna pada pidato-pidato kenegaraan.
									<br>
									Dalam pelaksanaan pembangunan nasional semangat keagamaan tersebut menjadi lebih
									kuat
									dengan ditetapkannya asas keimanan dan ketaqwaan terhadap Tuhan yang Maha Esa
									sebagai
									salah satu asas pembangunan. Hal ini berarti bahwa segala usaha dan kegiatan
									pembangunan
									nasional dijiwai, digerakkan dan dikendalikan oleh keimanan dan ketaqwaan terhadap
									Tuhan
									Yang Maha Esa sebagai nilai luhur yang menjadi landasan spiritual, moral dan etik
									pembangunan. <span class="baca_selengkapnya"><em>[Baca Selengkapnya...]</em></span>
								</p>
							</div>
							<div class="sejarah-all">
								<p class="card-text">
									<br>
									Secara historis benang merah nafas keagamaan tersebut dapat ditelusuri sejak abad V
									Masehi, dengan berdirinya kerajaan Kutai yang bercorak Hindu di Kalimantan melekat
									pada
									kerajaan-kerajaan di pulau Jawa, antara lain kerajaan Tarumanegara di Jawa Barat,
									dan
									kerajaan Purnawarman di Jawa Tengah.
									<br>
									Pada abad VIII corak agama Budha menjadi salah satu ciri kerajaan Sriwijaya yang
									pengaruhnya cukup luas sampai ke Sri Lanka, Thailand dan India. Pada masa Kerajaan
									Sriwijaya, candi Borobudur dibangun sebagai lambang kejayaan agama Budha. Pemerintah
									kerajaan Sriwijaya juga membangun sekolah tinggi agama Budha di Palembang yang
									menjadi
									pusat studi agama Budha se-Asia Tenggara pada masa itu. Bahkan beberapa siswa dari
									Tiongkok yang ingin memperdalam agama Budha lebih dahulu beberapa tahun membekali
									pengetahuan awal di Palembang sebelum melanjutkannya ke India.
									<br>
									Menurut salah satu sumber Islam mulai memasuki Indonesia sejak abad VII melalui para
									pedagang Arab yang telah lama berhubungan dagang dengan kepulauan Indonesia tidak
									lama
									setelah Islam berkembang di jazirah Arab. Agama Islam tersiar secara hampir merata
									di
									seluruh kepulauan nusantara seiring dengan berdirinya kerajaan-kerajaan Islam
									seperti
									Perlak dan Samudera Pasai di Aceh, kerajaan Demak, Pajang dan Mataram di Jawa
									Tengah,
									kerajaan Cirebon dan Banten di Jawa Barat, kerajaan Goa di Sulawesi Selatan,
									kerajaan
									Tidore dan Ternate di Maluku, keraj aan Banjar di Kalimantan, dan lain-lain.
									<br>
									Dalam sejarah perjuangan bangsa Indonesia menentang penjajahan Belanda banyak raja
									dan
									kalangan bangsawan yang bangkit menentang penjajah. Mereka tercatat sebagai pahlawan
									bangsa, seperti Sultan Iskandar Muda, Teuku Cik Di Tiro, Teuku Umar, Cut Nyak Dien,
									Panglima Polim, Sultan Agung Mataram, Imam Bonjol, Pangeran Diponegoro, Sultan Agung
									Tirtayasa, Sultan Hasanuddin, Sultan Goa, Sultan Ternate, Pangeran Antasari, dan
									lain-lain.
									<br>
									Pola pemerintahan kerajaan-kerajaan tersebut diatas pada umumnya selalu memiliki dan
									melaksanakan fungsi sebagai berikut:
									<br>
									<ol type="1" class="ml-4">
										<li>Bagi golongan Nasrani dijamin hak hidup dan kedaulatan organisasi agama dan
											gereja, tetapi harus ada izin bagi guru agama, pendeta dan petugas
											misi/zending
											dalam melakukan pekerjaan di suatu daerah tertentu.</li>
										<li>
											Bagi penduduk pribumi yang tidak memeluk agama Nasrani, semua urusan agama
											diserahkan pelaksanaan dan perigawasannya kepada para raja, bupati dan
											kepala
											bumiputera lainnya.
										</li>
									</ol>
									Berdasarkan kebijaksanaan tersebut, pelaksanaannya secara teknis dikoordinasikan
									oleh
									beberapa instansi di pusat yaitu:
									<br>
									<ol type="1" class="ml-4">
										<li>Soal peribadatan umum, terutama bagi golongan Nasrani menjadi wewenang
											Departement van Onderwijs en Eeredienst (Departemen Pengajaran dan Ibadah).
										</li>
										<li>
											Soal pengangkatan pejabat agama penduduk pribumi, soal perkawinan,
											kemasjidan,
											haji, dan lainlain, menjadi urusan Departement van Binnenlandsch Bestuur
											(Departemen Dalam Negeri).
										</li>
										<li>
											Soal Mahkamah Islam Tinggi atau Hofd voor Islamietische Zaken menjadi
											wewenang
											Departement van Justitie (Departemen Kehakiman). Pada masa penjajahan Jepang
											kondisi tersebut pada dasarnya tidak berubah. Pemerintah Jepang membentuk
											Shumubu, yaitu kantor agama pusat yang berfungsi sama dengan Kantoor voor
											Islamietische Zaken dan mendirikan Shumuka, kantor agama karesidenan, dengan
											menempatkan tokoh pergerakan Islam sebagai pemimpin kantor. Penempatan tokoh
											pergerakan Islam tersebut merupakan strategi Jepang untuk menarik simpati
											umat
											Islam agar mendukung cita-cita persemakmuran Asia Raya di bawah pimpinan Dai
											Nippon.
										</li>
									</ol>
									Secara filosofis, sosio politis dan historis agama bagi bangsa Indonesia sudah
									berurat
									dan berakar dalam kehidupan bangsa. Itulah sebabnya para tokoh dan pemuka agama
									selalu
									tampil sebagai pelopor pergerakan dan perjuangan kemerdekaan baik melalui partai
									politik
									maupun sarana lainnya. Perjuangan gerakan kemerdekaan tersebut melalui jalan yang
									panjang sejak jaman kolonial Belanda sampai kalahnya Jepang pada Perang Dunia ke II.
									Kemerdekaan Indonesia diproklamasikan pada tanggal 17 Agustus 1945. Pada masa
									kemerdekaan kedudukan agama menjadi lebih kokoh dengan ditetapkannya Pancasila
									sebagai
									ideologi dan falsafah negara dan UUD 1945. Sila Ketuhanan Yang Maha Esa yang diakui
									sebagai sumber dari sila-sila lainnya mencerminkan karakter bangsa Indonesia yang
									sangat
									religius dan sekaligus memberi makna rohaniah terhadap kemajuankemajuan yang akan
									dicapai. Berdirinya Departemen Agama pada 3 Januari 1946, sekitar lima bulan setelah
									proklamasi kemerdekaan kecuali berakar dari sifat dasar dan karakteristik bangsa
									Indonesia tersebut di atas juga sekaligus sebagai realisasi dan penjabaran ideologi
									Pancasila dan UUD 1945. Ketentuan juridis tentang agama tertuang dalam UUD 1945 BAB
									E
									pasal 29 tentang Agama ayat 1, dan 2:
									<br>
									<ol type="1" class="ml-4">
										<li>Negara berdasarkan atas Ketuhanan Yang Maha Esa;</li>
										<li>
											Negara menjamin kemerdekaan tiap-tiap penduduk untuk memeluk agamanya
											masing-masing dan beribadah menurut agamanya dan kepercayaannya itu.Dengan
											demikian agama telah menjadi bagian dari sistem kenegaraan sebagai hasil
											konsensus nasional dan konvensi dalam_praktek kenegaraan Republik Indonesia
											yang
											berdasarkan Pancasila dan UUD 1945.
										</li>
									</ol>
									Selanjutnya dengan adanya perjuangan dengan dilandasi pancasila dan bhinika tunggal
									ika,
									demi menciptakan peradilan bangsa indonesia.Kementerian Agama membuka Beberapa
									Organisasi yang merupakan jalan alternatif yang mampu membimbing membina dan
									mengarahkan
									masyarakat untuk menentukan hak dan kewajiban sebagai masyarakat berbangsa dan
									bernegara.
									<br>
									<b>Periode Kepala Kantor Departemen Agama dan Kepala Kantor Kementerian Agama
										Kabupaten
										Klaten dari masa ke masa :</b>
									<ol type="1" class="ml-4">
										<li>H. Amir Ma’sum (1969-1980)</li>
										<li>Asmuni Fatah (1981-1985)</li>
										<li>Drs. H. Muh Suchron, BcHK (1986-1992)</li>
										<li>Drs. H. Djam’an (1993-1999)</li>
										<li>H. Ichsan (2000-2002)</li>
										<li>Drs. H.M. Sya’roni, MM (2003-2005)</li>
										<li>Drs. H. Fatah Asyhari (2006-2008)</li>
										<li>Drs. H. Mustari, M.Pd.I (2009-2016)</li>
										<li>DR. H. Masmin Afif, M.Ag (2017-2018)</li>
										<li>H. Anif Solikhin, S.Ag, MSI (2019- sekarang)</li>
									</ol>
									<span class="selesai_baca"><em>[Selesai Baca...]</em></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="visimisi">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-12">
					<div class="card shadow">
						<div class="card-header text-center mb-0 py-1">
							<h4>VISI DAN MISI</h4>
						</div>
						<div class="card-body px-5">
							<div class="visi">
								<p class="card-text">
									<h5>
										VISI
									</h5>
									“Kementerian Agama yang profesional dan andal dalam membangun masyarakat yang saleh,
									moderat, cerdas dan unggul untuk mewujudkan Indonesia maju yang berdaulat, mandiri,
									dan berkepribadian berdasarkan gotong royong”.
									<br>
									(Peraturan Menteri Agama Nomor 18 Tahun 2020)
								</p>
							</div>
							<div class="misi">
								<p class="card-text">
									<h5>
										MISI
									</h5>
									<ol type="1" class="ml-4 mb-0">
										<li>meningkatkan kualitas kesalehan umat beragama;</li>
										<li>memperkuat moderasi beragama dan kerukunan umat beragama;</li>
										<li>meningkatkan layanan keagamaan yang adil, mudah dan merata;</li>
										<li>meningkatkan layanan pendidikan yang merata dan bermutu;</li>
										<li>meningkatkan produktivitas dan daya saing pendidikan;</li>
										<li>memantapkan tata kelola pemerintahan yang baik (Good Governance).</li>
									</ol>
									(Peraturan Menteri Agama Nomor 18 Tahun 2020)
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="tugasfungsi">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-12">
					<div class="card shadow">
						<div class="card-header text-center mb-0 py-1">
							<h4>TUGAS DAN FUNGSI</h4>
						</div>
						<div class="card-body px-5">
							<div class="tugas">
								<p class="card-text">
									<h5>
										TUGAS
									</h5>
									Kantor Kementerian Agama kabupaten/kota bertugas melaksanakan tugas dan fungsi
									Kementerian Agama dalam wilayah kabupaten/kota berdasarkan kebijakan Kepala Kantor
									Wilayah Kementerian Agama provinsi dan ketentuan peraturan perundang-undangan.
								</p>
							</div>
							<div class="fungsi">
								<p class="card-text">
									<h5>
										FUNGSI
									</h5>
									Kantor Kementerian Agama kabupaten/kota menyelenggarakan fungsi:
									<ol type="a" class="ml-4 mb-0">
										<li>perumusan dan penetapan visi, misi, dan kebijakan teknis di bidang pelayanan dan bimbingan kehidupan beragama kepada masyarakat di kabupaten/kota;</li>
										<li>pelayanan, bimbingan, dan pembinaan kehidupan beragama;</li>
										<li>pelayanan, bimbingan, dan pembinaan haji dan umrah, serta zakat dan wakaf;</li>
										<li>pelayanan, bimbingan, dan pembinaan di bidang pendidikan madrasah, pendidikan agama, dan pendidikan keagamaan;</li>
										<li>pembinaan kerukunan umat beragama;</li>
										<li>pelaksanaan kebijakan teknis di bidang pengelolaan administrasi dan informasi;</li>
										<li>pengoordinasian perencanaan, pengendalian, pengawasan, dan evaluasi program; dan</li>
										<li>pelaksanaan hubungan dengan pemerintah daerah, instansi terkait, dan lembaga masyarakat dalam rangka pelaksanaan tugas Kementerian Agama di kabupaten/kota.</li>
									</ol>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="kontak">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-12">
					<div class="card shadow">
						<div class="card-header text-center mb-0 py-1">
							<h4>KONTAK KAMI</h4>
						</div>
						<div class="card-body px-5">
							<table class="kontak-kami">
                                <tr>
                                    <th width="20%">Alamat</th>
                                    <td width="50%" >Ronggowarsito Klaten</td>
                                </tr>
                                <tr>
                                    <th width="20%">Telp</th>
                                    <td width="50%" >0272-321154</td>
                                </tr>
                                <tr>
                                    <th width="20%">Fax</th>
                                    <td width="50%" >0272-321154</td>
                                </tr>
                                <tr>
                                    <th width="20%">Haji</th>
                                    <td width="50%" >08112650662 (Telp/WA)</td>
                                </tr>
                                <tr>
                                    <th width="20%">Email</th>
                                    <td width="50%" >kabklaten@kemenag.go.id</td>
                                </tr>
                                <tr>
                                    <th width="20%">Web</th>
                                    <td width="50%" >klaten.kemenag.go.id</td>
                                </tr>
                            </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
