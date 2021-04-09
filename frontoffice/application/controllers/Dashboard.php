<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_fo', 'm_fo');

                if (!$this->session->userdata('role_fo')) {
                        redirect('masuk');
                }
        }

        public function index()
        {
                $data_title['title'] = 'SIMANIS: Dashboard';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_validasi_kemenag'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_pending'] = $this->m_fo->jml_permohonan_pending()->result();
                $data_permohonan['permohonan_selesaiFO'] = $this->m_fo->jml_permohonan_selesaiFO()->result();
                $data_permohonan['permohonan_prosesBO'] = $this->m_fo->jml_permohonan_prosesBO()->result();
                $data_permohonan['permohonan_prosesKasi'] = $this->m_fo->jml_permohonan_prosesKasi()->result();
                $data_permohonan['permohonan_prosesKasubag'] = $this->m_fo->jml_permohonan_prosesKasubag()->result();
                $data_permohonan['permohonan_selesai'] = $this->m_fo->jml_permohonan_selesai()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/dashboard_fo', $data_permohonan);
                $this->load->view('footer');
        }

        public function profil_fo()
        {
                $data_title['title'] = 'Profil Saya';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/profil_fo', $data_detail);
                $this->load->view('footer');
        }

        //ubah foto profil
        public function upload_foto_profil()
        {
                $id_fo = $this->session->userdata('id_fo');

                $config['upload_path']          = './../assets/dashboard/images/frontoffice/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = './../assets/dashboard/images/frontoffice/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = './../assets/dashboard/images/frontoffice/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_fo', $id_fo)->get('fo')->row();

                                //replace foto lama 
                                if ($item->foto_profil_fo != "placeholder_profil.png") {
                                        $target_file = './../assets/dashboard/images/frontoffice/profil/' . $item->foto_profil_fo;
                                        unlink($target_file);
                                }

                                $data['foto_profil_fo'] = $uploadData['file_name'];

                                $this->db->where('id_fo', $id_fo);
                                $this->db->update('fo', $data);
                        }
                }

                $this->session->set_flashdata('success', 'diubah');
                redirect('dashboard/profil_fo');
        }

        //menampilkan halaman form ubah kata sandi
        public function form_ubahsandi()
        {
                $data_title['title'] = 'Ubah Kata Sandi Saya';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ubahsandifo', $data_detail);
                $this->load->view('footer');
        }

        // aksi ubah kata
        public function ubah_sandi()
        {
                $kata_sandi_awal = $this->input->post('kata_sandi_awal');
                $data_lama = sha1($kata_sandi_awal);

                $kata_sandi_baru = $this->input->post('kata_sandi_baru');
                $kata_sandi_hash = sha1($kata_sandi_baru);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $konfirmasi = $this->input->post('konfirmasi');

                $where = $this->session->userdata('id_fo');

                $fo = $this->m_fo->get_fo($where);

                if ($konfirmasi === $kata_sandi_baru) {
                        if ($data_lama === $fo['kata_sandi']) {
                                $this->m_fo->update_sandi($where, $data_baru, 'fo');
                                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                                redirect('dashboard/form_ubahsandi');
                        } else {
                                $this->session->set_flashdata('error', '<b>Kata Sandi Lama</b> Salah');
                                redirect('dashboard/form_ubahsandi');
                        }
                } else {
                        $this->session->set_flashdata('error', 'Konfirmasi Sandi<b> Tidak Sesuai</b>');
                        redirect('dashboard/form_ubahsandi');
                }
        }

        //list permohonan masuk
        public function list_permohonan_masuk()
        {
                $data_title['title'] = 'List Permohonan Masuk';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Validasi Kemenag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan pending
        public function list_permohonan_pending()
        {
                $data_title['title'] = 'List Permohonan Pending';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Pending')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_pending', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan yang sudah mendapat aksi fo
        public function list_permohonan_selesaiFO()
        {
                $data_title['title'] = 'List Permohonan Selesai FO';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan_selesaiFO()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_selesaiFO', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan proses bo
        public function list_permohonan_prosesBO()
        {
                $data_title['title'] = 'List Permohonan Proses BO';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Proses BO')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_prosesBO', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan proses kasi
        public function list_permohonan_prosesKasi()
        {
                $data_title['title'] = 'List Permohonan Proses BO';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Proses Kasi')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_prosesKasi', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan proses kasubag
        public function list_permohonan_prosesKasubag()
        {
                $data_title['title'] = 'List Permohonan Proses Kasubag';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Proses Kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_prosesKasubag', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan selesai
        public function list_permohonan_selesai()
        {
                $data_title['title'] = 'List Permohonan Selesai';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Selesai')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_selesai', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data permohonan dari list permohonan
        public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 3) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
                } elseif ($id_layanan == 4) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                }

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('frontoffice/ptsp1/detail_ptsp01', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                } elseif ($id_layanan == 4) {
                        $this->load->view('frontoffice/ptsp4/detail_ptsp04', $data_detail);
                } elseif ($id_layanan == 5) {
                        $this->load->view('frontoffice/ptsp5/detail_ptsp05', $data_detail);
                } elseif ($id_layanan == 6) {
                        $this->load->view('frontoffice/ptsp6/detail_ptsp06', $data_detail);
                } elseif ($id_layanan == 14) {
                        $this->load->view('frontoffice/ptsp14/detail_ptsp14', $data_detail);
                } elseif ($id_layanan == 15) {
                        $this->load->view('frontoffice/ptsp15/detail_ptsp15', $data_detail);
                } elseif ($id_layanan == 18) {
                        $this->load->view('frontoffice/ptsp18/detail_ptsp18', $data_detail);
                } elseif ($id_layanan == 25) {
                        $this->load->view('frontoffice/ptsp25/detail_ptsp25', $data_detail);
                }
               
                $this->load->view('footer');
        }

        //update status permohonan menjadi Proses BO
        public function aksi_update_status_setujui($id_permohonan_ptsp)
        {
                $data = array(
                        'id_fo' => $this->session->userdata('id_fo'),
                        'notif_pemohon' => 'Belum Dibaca',
                        'status' => 'Proses BO',
                        'tgl_persetujuan_fo' => date("Y/m/d")
                );

                $this->m_fo->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

                $this->session->set_flashdata('success', 'permohonan sukses disetujui');
                redirect('dashboard/list_permohonan_masuk');
        }

        //update status permohonan menjadi selesai
        public function aksi_setujui_permohonan($id_permohonan_ptsp)
        {
                $data = array(
                        'id_fo' => $this->session->userdata('id_fo'),
                        'notif_pemohon' => 'Belum Dibaca',
                        'status' => 'Selesai',
                        'tgl_persetujuan_fo' => date("Y/m/d")
                );
                $permohonan = $this->m_fo->get_data_permohonan_ptsp($id_permohonan_ptsp);
                $email = $this->m_fo->get_data_pemohon($permohonan->id_pemohon);
                // Konfigurasi email
                $config = [
                        'mailtype'  => 'html',
                        'charset'   => 'utf-8',
                        'protocol'  => 'smtp',
                        'smtp_host' => 'smtp.gmail.com',
                        'smtp_user' => 'klatenkemenag7@gmail.com',  // Email gmail
                        'smtp_pass'   => 'dpdzadjbieahxykx',  // Password gmail
                        'smtp_crypto' => 'ssl',
                        'smtp_port'   => 465,
                        'crlf'    => "\r\n",
                        'newline' => "\r\n"
                ];

                // Load library email dan konfigurasinya
                $this->load->library('email', $config);

                // Email dan nama pengirim
                $this->email->from('no-reply@simanisklaten.com', 'simanisklaten.com');

                // Email penerima
                $this->email->to($email->email); // Ganti dengan email tujuan

                // Lampiran email, isi dengan url/path file
                //     $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

                // Subject email
                $this->email->subject('Informasi Permohonan Anda');

                // Isi email
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan bahwasannya permohonan anda telah <b>disetujui</b>, dan sudah bisa diambil di Kantor Kementrian Agama Kabupaten Klaten yang berada di JL.Ronggowarsito Klaten<br><br>Terimakasih<br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {
                        echo 'Sukses! email berhasil dikirim.';
                } else {
                        echo 'Error! email tidak dapat dikirim.';
                }

                $this->m_fo->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

                $this->session->set_flashdata('success', 'permohonan sukses disetujui');
                redirect('dashboard/list_permohonan_selesai');
        }

        //aksi tolak
        //tampil form tolak permohonan
        public function form_input_keterangan($id_permohonan_ptsp)
        {
                $data_title['title'] = 'Form Keterangan Revisi Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
                $id_permohonan_ptsp])->row_array();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/form_input_keterangan', $data_detail);
                $this->load->view('footer');
        }

        //aksi tolak permohonan
        public function kirim_alasn_permohonan()
        {
                $data = array(
                        'id_fo' => $this->session->userdata('id_fo'),
                        'keterangan' => $this->input->post('keterangan'),
                        'notif_pemohon' => 'Belum Dibaca',
                        'status' => 'Pending',
                        'tgl_persetujuan_fo' => date("Y/m/d")
                );

                $detailhere = $this->input->post('id_permohonan_ptsp');

                $email = $this->m_fo->get_data_pemohon($this->input->post('id_pemohon'));
                // Konfigurasi email
                $config = [
                        'mailtype'  => 'html',
                        'charset'   => 'utf-8',
                        'protocol'  => 'smtp',
                        'smtp_host' => 'smtp.gmail.com',
                        'smtp_user' => 'klatenkemenag7@gmail.com',  // Email gmail
                        'smtp_pass'   => 'dpdzadjbieahxykx',  // Password gmail
                        'smtp_crypto' => 'ssl',
                        'smtp_port'   => 465,
                        'crlf'    => "\r\n",
                        'newline' => "\r\n"
                ];

                // Load library email dan konfigurasinya
                $this->load->library('email', $config);

                // Email dan nama pengirim
                $this->email->from('no-reply@simanisklaten.com', 'simanisklaten.com');

                // Email penerima
                $this->email->to($email->email); // Ganti dengan email tujuan

                // Lampiran email, isi dengan url/path file
                //     $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

                // Subject email
                $this->email->subject('Informasi Permohonan Anda');

                // Isi email
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan kepada pemohon bahwasannya permohonan anda dipending dikarenakan ' . $this->input->post('keterangan') . ', mohon pemberitahuan ini untuk segera ditindak lanjuti. <br>Terimakasih<br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {
                        echo 'Sukses! email berhasil dikirim.';
                } else {
                        echo 'Error! email tidak dapat dikirim.';
                }

                $this->m_fo->update_status_permohonan($detailhere, $data, 'permohonan_ptsp');

                if ($this->m_fo->update_status_permohonan($detailhere, $data, 'permohonan_ptsp')); {
                        $this->session->set_flashdata('success', 'ditolak');
                        redirect('dashboard/list_permohonan_pending');
                }
        }

        //lihat surat
        public function lihat_surat($id_permohonan_ptsp, $id_layanan)
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_title['title'] = 'Previe Surat Permohonan Rohaniawan dan Petugas Doa';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 3) {
                        $data_title['title'] = 'Permohonan Legalisir Ijazah';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
                } elseif ($id_layanan == 4) {
                        $data_title['title'] = 'Permohonan Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat ';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
                } elseif ($id_layanan == 5) {
                        $data_title['title'] = 'Permohonan Surat Keterangan Haji Pertama';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $data_title['title'] = 'Permohonan Rekomendasi Paspor Haji dan Umrah';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 14) {
                        $data_title['title'] = 'Permohonan Ijop LPQ';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_title['title'] = 'Permohonan Ijop Madin';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 18) {
                        $data_title['title'] = 'Rekomendasi Permohonan Bantuan Masjid';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 25) {
                        $data_title['title'] = 'Konsultasi dan informasi sertifikasi halal, zakat dan wakaf';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                }

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('frontoffice/ptsp1/detail_ptsp01', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                } elseif ($id_layanan == 4) {
                        $this->load->view('frontoffice/ptsp4/detail_ptsp04', $data_detail);
                } elseif ($id_layanan == 5) {
                        $this->load->view('frontoffice/ptsp5/tampil_ptsp05', $data_detail);
                } elseif ($id_layanan == 6) {
                        $this->load->view('frontoffice/ptsp6/tampil_ptsp06', $data_detail);
                } elseif ($id_layanan == 14) {
                        $this->load->view('frontoffice/ptsp14/tampil_ptsp14', $data_detail);
                } elseif ($id_layanan == 15) {
                        $this->load->view('frontoffice/ptsp15/tampil_ptsp15', $data_detail);
                } elseif ($id_layanan == 18) {
                        $this->load->view('frontoffice/ptsp18/tampil_ptsp18', $data_detail);
                } elseif ($id_layanan == 25) {
                        $this->load->view('frontoffice/ptsp25/tampil_ptsp25', $data_detail);
                }

                $this->load->view('footer');
        }

        public function cetak_ptsp05($id_permohonan_ptsp)
        {

                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp5/cetak_ptsp05', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Permohonan Surat Keterangan Haji Pertama');
        }
        public function cetak_ptsp06($id_permohonan_ptsp)
        {

                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp6/cetak_ptsp06', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Permohonan Rekomendasi Paspor Haji dan Umrah');
        }
        //tampil detail ptsp14
        public function detail_ptsp14()
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp14/detail_ptsp14');
                $this->load->view('footer');
        }
        //tampil preview ptsp14
        public function tampil_ptsp14()
        {
                $data_title['title'] = 'Tampil Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp14/tampil_ptsp14');
                $this->load->view('footer');
        }
        //tampil cetak ptsp14
        public function cetak_ptsp14($id_permohonan_ptsp)
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp14/cetak_ptsp14', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Permohonan Ijop LPQ');
        }
        //tampil detail ptsp15
        public function detail_ptsp15()
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp15/detail_ptsp15');
                $this->load->view('footer');
        }
        //tampil preview ptsp15
        public function tampil_ptsp15()
        {
                $data_title['title'] = 'Tampil Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp15/tampil_ptsp15');
                $this->load->view('footer');
        }
        //tampil cetak ptsp15
        public function cetak_ptsp15($id_permohonan_ptsp)
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp15/cetak_ptsp15', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Permohonan Ijop Madin');
        }

        // Tampil cetak  Ptsp18
        public function cetak_ptsp18($id_permohonan_ptsp)
        {

                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp18/cetak_ptsp18', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Rekomendasi Permohonan Bantuan Masjid');
        }
        // Tampil cetak ptsp25
        public function cetak_ptsp25($id_permohonan_ptsp)
        {

                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
                $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();


                $dompdf = new Dompdf();

                $html = $this->load->view('frontoffice/ptsp25/cetak_ptsp25', $data_detail, true);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('Konsultasi dan informasi sertifikasi halal,zakat dan wakaf');
        }

        //tampil detail ptsp26
	public function detail_ptsp26()
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp26/detail_ptsp26');
                $this->load->view('footer');
        }
	//tampil detail ptsp20
	public function detail_ptsp20()
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp20/detail_ptsp20');
                $this->load->view('footer');
        }
	//tampil preview ptsp20
	public function tampil_ptsp20()
        {
                $data_title['title'] = 'Tampil Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp20/tampil_ptsp20');
                $this->load->view('footer');
        }
	//tampil cetak ptsp20
	public function cetak_ptsp20()
        {
                $this->load->view('frontoffice/ptsp20/cetak_ptsp20');
        }
}
