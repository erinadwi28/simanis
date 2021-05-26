<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptsp extends CI_Controller {

	public function index()
	{   
        $data_title['title'] = 'Layanan PTSP';

                $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/header/header');
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/ptsp');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_1()
	{   
        $data_title['title'] = "Permohonan Rohaniawan dan Petugas Do'a";

                $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_1');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_2()
	{   
                $data_title['title'] = 'Rekomendasi Kegiatan Keagamaan';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_2');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_3()
	{   
                        $data_title['title'] = 'Legalisir Ijazah';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_3');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_4()
	{   
                        $data_title['title'] = 'Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_4');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_5()
	{   
                        $data_title['title'] = 'Permohonan Surat Keterangan Haji Pertama';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_5');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_6()
	{   
        $data_title['title'] = 'Permohonan Rekomendasi Paspor Haji dan Umrah';
        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_6');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_7()
	{   
        $data_title['title'] = 'Permohonan Rekomendasi Izin Pendirian KBIHU';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_7');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_8()
	{   
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_8');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_9()
	{   
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_9');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_10()
	{   
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_10');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_11()
	{   
                        $data_title['title'] = 'Permohonan Rekomendasi Pindah Siswa Madrasah';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_11');
        $this->load->view('landing/footer/footer');
	}

        public function detail_permohonan_12()
	{   
                        $data_title['title'] = 'Permohonan Rekomendasi Bantuan RA/Madrasah';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_12');
        $this->load->view('landing/footer/footer');
	}

	public function detail_permohonan_13()
	{   
        $data_title['title'] = 'Permohonan Rekomendasi Ijin Operasional Lembaga Baru';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_13');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_14()
	{   
        $data_title['title'] = 'Permohonan Ijop LPQ';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_14');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_15()
	{   
        $data_title['title'] = 'Permohonan Ijop Madin';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_15');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_16()
	{   
        $data_title['title'] = 'Rekomendasi Proposal PD Pontren (Bantuan Sarpras/Pembangunan/Rehabilitasi Bangunan)';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_16');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_17()
	{   
        $data_title['title'] = 'Permohonan Tambahan Jam Mengajar Guru';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_17');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_18()
	{   
        $data_title['title'] = 'Rekomendasi Permohonan Bantuan Masjid';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_18');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_19()
	{   
        $data_title['title'] = 'Permohonan Petugas Siaran Keagamaan';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_19');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_20()
	{   
        $data_title['title'] = 'Permohonan Ijin Operasional Majelis Taklim';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_20');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_21()
	{   
        $data_title['title'] = 'Permohonan Arah Ukur Kiblat';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_21');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_22()
	{   
        $data_title['title'] = 'Rekomendasi Permohonan ID Masjid dan Musala';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_22');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_23()
	{   
        $data_title['title'] = 'Permohonan Mutasi GPAI PNS';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_23');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_24()
	{   
        $data_title['title'] = 'Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_24');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_25()
	{   
        $data_title['title'] = 'Konsultasi dan Informasi Sertifikasi Halal, Zakat dan Wakaf';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_25');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_26()
	{   
        $data_title['title'] = 'Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru, Haji';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_26');
        $this->load->view('landing/footer/footer');
	}
	public function detail_permohonan_27()
	{   
        $data_title['title'] = 'Permohonan Surat Keterangan Tambahan Penghasilan';

        $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/detail_ptsp/detail_27');
        $this->load->view('landing/footer/footer');
	}
}
