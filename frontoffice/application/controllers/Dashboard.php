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
                $data_title['title'] = 'SIMELATI: Dashboard';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();
                $data_permohonan['permohonan_validasi_kemenag'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_pending'] = $this->m_fo->jml_permohonan_pending()->result();
                $data_permohonan['permohonan_selesaiFO'] = $this->m_fo->jml_permohonan_selesaiFO()->result();
                $data_permohonan['permohonan_prosesBO'] = $this->m_fo->jml_permohonan_prosesBO()->result();
                $data_permohonan['permohonan_prosesTimTeknis'] = $this->m_fo->jml_permohonan_prosesTimTeknis()->result();
                $data_permohonan['permohonan_prosesKasi'] = $this->m_fo->jml_permohonan_prosesKasi()->result();
                $data_permohonan['permohonan_prosesKasubag'] = $this->m_fo->jml_permohonan_prosesKasubag()->result();
                $data_permohonan['permohonan_selesai'] = $this->m_fo->jml_permohonan_selesai()->result();
                $data_permohonan['permohonan_arsip'] = $this->m_fo->jml_permohonan_arsip()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }

        //menampilkan halaman form ubah kata sandi
        public function form_ubahsandi()
        {
                $data_title['title'] = 'Ubah Kata Sandi Saya';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Validasi Kemenag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list laporan masuk
        public function list_laporan_masuk()
        {
                $data_title['title'] = 'List Laporan Masuk';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_laporan'] = $this->m_fo->get_list_data_laporan_masuk()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_laporan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list laporan
        public function list_laporan()
        {
                $data_title['title'] = 'List Laporan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_laporan'] = $this->m_fo->get_list_data_laporan()->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_laporan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //detail laporan
        public function detail_laporan($id_pengaduan)
        {
                $data_title['title'] = 'Detail Laporan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $this->m_fo->insert_idfo($detailhere, $id_pengaduan);

                $data_detail['data_laporan'] = $this->m_fo->get_data_laporan($id_pengaduan)->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/detail_laporan', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan pending
        public function list_permohonan_pending()
        {
                $data_title['title'] = 'List Permohonan Pending';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Proses BO')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_prosesBO', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan proses Tim teknis
        public function list_permohonan_prosesTimTeknis()
        {
                $data_title['title'] = 'List Permohonan Proses Tim Teknis';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Proses Tim Teknis')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_prosesTimTeknis', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan proses kasi
        public function list_permohonan_prosesKasi()
        {
                $data_title['title'] = 'List Permohonan Proses Kasi';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan_selesai('Selesai')->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_selesai', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan arsip
        public function list_permohonan_arsip()
        {
                $data_title['title'] = 'Arsip Data Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan_arsip('Selesai', 1)->result();

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_arsip', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data permohonan dari list permohonan
        public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $this->ConvertImage01($id_permohonan_ptsp, $id_layanan);
                        $data_detail['data_petugas_doa'] = $this->m_fo->data_petugas_doa($id_permohonan_ptsp)->result();
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 2) {
                        $this->ConvertImage02($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                } elseif ($id_layanan == 3) {
                        $this->ConvertImage03($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
                } elseif ($id_layanan == 4) {
                        $this->ConvertImage04($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
                } elseif ($id_layanan == 5) {
                        $this->ConvertImage05($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $this->ConvertImage06($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 7) {
                        $this->ConvertImage07($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                } elseif ($id_layanan == 8) {
                        $this->ConvertImage08($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                } elseif ($id_layanan == 9) {
                        $this->ConvertImage09($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                } elseif ($id_layanan == 10) {
                        $this->ConvertImage10($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                } elseif ($id_layanan == 11) {
                        $this->ConvertImage11($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                } elseif ($id_layanan == 12) {
                        $this->ConvertImage12($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                } elseif ($id_layanan == 13) {
                        $this->ConvertImage13($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
                } elseif ($id_layanan == 14) {
                        $this->ConvertImage14($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $this->ConvertImage15($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 16) {
                        $this->ConvertImage16($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                } elseif ($id_layanan == 17) {
                        $this->ConvertImage17($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                } elseif ($id_layanan == 18) {
                        $this->ConvertImage18($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 19) {
                        $this->ConvertImage19($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
                } elseif ($id_layanan == 20) {
                        $this->ConvertImage20($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                } elseif ($id_layanan == 21) {
                        $this->ConvertImage21($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                } elseif ($id_layanan == 22) {
                        $this->ConvertImage22($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                } elseif ($id_layanan == 23) {
                        $this->ConvertImage23($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                } elseif ($id_layanan == 24) {
                        $this->ConvertImage24($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                } elseif ($id_layanan == 25) {
                        $this->ConvertImage25($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                } elseif ($id_layanan == 26) {
                        $this->ConvertImage26($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
                } elseif ($id_layanan == 27) {
                        $this->ConvertImage27($id_permohonan_ptsp, $id_layanan);
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp27')->result();
                }

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('frontoffice/ptsp1/detail_ptsp01', $data_detail);
                } elseif ($id_layanan == 2) {
                        $this->load->view('frontoffice/ptsp2/detail_ptsp02', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                } elseif ($id_layanan == 4) {
                        $this->load->view('frontoffice/ptsp4/detail_ptsp04', $data_detail);
                } elseif ($id_layanan == 5) {
                        $this->load->view('frontoffice/ptsp5/detail_ptsp05', $data_detail);
                } elseif ($id_layanan == 6) {
                        $this->load->view('frontoffice/ptsp6/detail_ptsp06', $data_detail);
                } elseif ($id_layanan == 7) {
                        $this->load->view('frontoffice/ptsp7/detail_ptsp07', $data_detail);
                } elseif ($id_layanan == 8) {
                        $this->load->view('frontoffice/ptsp8/detail_ptsp08', $data_detail);
                } elseif ($id_layanan == 9) {
                        $this->load->view('frontoffice/ptsp9/detail_ptsp09', $data_detail);
                } elseif ($id_layanan == 10) {
                        $this->load->view('frontoffice/ptsp10/detail_ptsp10', $data_detail);
                } elseif ($id_layanan == 11) {
                        $this->load->view('frontoffice/ptsp11/detail_ptsp11', $data_detail);
                } elseif ($id_layanan == 12) {
                        $this->load->view('frontoffice/ptsp12/detail_ptsp12', $data_detail);
                } elseif ($id_layanan == 13) {
                        $this->load->view('frontoffice/ptsp13/detail_ptsp13', $data_detail);
                } elseif ($id_layanan == 14) {
                        $this->load->view('frontoffice/ptsp14/detail_ptsp14', $data_detail);
                } elseif ($id_layanan == 15) {
                        $this->load->view('frontoffice/ptsp15/detail_ptsp15', $data_detail);
                } elseif ($id_layanan == 16) {
                        $this->load->view('frontoffice/ptsp16/detail_ptsp16', $data_detail);
                } elseif ($id_layanan == 17) {
                        $this->load->view('frontoffice/ptsp17/detail_ptsp17', $data_detail);
                } elseif ($id_layanan == 18) {
                        $this->load->view('frontoffice/ptsp18/detail_ptsp18', $data_detail);
                } elseif ($id_layanan == 19) {
                        $this->load->view('frontoffice/ptsp19/detail_ptsp19', $data_detail);
                } elseif ($id_layanan == 20) {
                        $this->load->view('frontoffice/ptsp20/detail_ptsp20', $data_detail);
                } elseif ($id_layanan == 21) {
                        $this->load->view('frontoffice/ptsp21/detail_ptsp21', $data_detail);
                } elseif ($id_layanan == 22) {
                        $this->load->view('frontoffice/ptsp22/detail_ptsp22', $data_detail);
                } elseif ($id_layanan == 23) {
                        $this->load->view('frontoffice/ptsp23/detail_ptsp23', $data_detail);
                } elseif ($id_layanan == 24) {
                        $this->load->view('frontoffice/ptsp24/detail_ptsp24', $data_detail);
                } elseif ($id_layanan == 25) {
                        $this->load->view('frontoffice/ptsp25/detail_ptsp25', $data_detail);
                } elseif ($id_layanan == 26) {
                        $this->load->view('frontoffice/ptsp26/detail_ptsp26', $data_detail);
                } elseif ($id_layanan == 27) {
                        $this->load->view('frontoffice/ptsp27/detail_ptsp27', $data_detail);
                }

                $this->load->view('footer');
        }

        //Convert Image PTSP01
        private function ConvertImage01($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp01/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP02
        private function ConvertImage02($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp02/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP03
        private function ConvertImage03($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->fc_ijazah != null && strlen($item->fc_ijazah) > 50) {
                        $photo = $item->fc_ijazah;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_ijazah-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp03/fc_ijazah/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_ijazah' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP04
        private function ConvertImage04($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->fc_dokumen != null && strlen($item->fc_dokumen) > 50) {
                        $photo = $item->fc_dokumen;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp04/fc_dokumen/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_dokumen' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP05
        private function ConvertImage05($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->fc_ktp != null && strlen($item->fc_ktp) > 50) {
                        $photo = $item->fc_ktp;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_ktp' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->srt_pernyataan != null && strlen($item->srt_pernyataan) > 50) {
                        $photo = $item->srt_pernyataan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_pernyataan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_pernyataan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->bukti_pelunasan != null && strlen($item->bukti_pelunasan) > 50) {
                        $photo = $item->bukti_pelunasan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'bukti_pelunasan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('bukti_pelunasan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP06
        private function ConvertImage06($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp06/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->fc_sk_ijin_operasi != null && strlen($item->fc_sk_ijin_operasi) > 50) {
                        $photo = $item->fc_sk_ijin_operasi;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_sk_ijin_operasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp06/fc_sk_ijin_operasi/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_sk_ijin_operasi' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->fc_ktp != null && strlen($item->fc_ktp) > 50) {
                        $photo = $item->fc_ktp;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp06/fc_ktp/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_ktp' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->fc_kk != null && strlen($item->fc_kk) > 50) {
                        $photo = $item->fc_kk;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_kk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp06/fc_kk/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_kk' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->fc_dokumen != null && strlen($item->fc_dokumen) > 50) {
                        $photo = $item->fc_dokumen;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp06/fc_dokumen/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_dokumen' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP07
        private function ConvertImage07($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->akte_notaris != null && strlen($item->akte_notaris) > 50) {
                        $photo = $item->akte_notaris;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/akte_notaris/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('akte_notaris' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->foto_kantor != null && strlen($item->foto_kantor) > 50) {
                        $photo = $item->foto_kantor;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'foto_kantor-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/foto_kantor/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('foto_kantor' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->susunan_pengurus != null && strlen($item->susunan_pengurus) > 50) {
                        $photo = $item->susunan_pengurus;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/susunan_pengurus/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('susunan_pengurus' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->sertifikat_pembimbing != null && strlen($item->sertifikat_pembimbing) > 50) {
                        $photo = $item->sertifikat_pembimbing;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'sertifikat_pembimbing-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/sertifikat_pembimbing/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('sertifikat_pembimbing' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->program_manasik != null && strlen($item->program_manasik) > 50) {
                        $photo = $item->program_manasik;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'program_manasik-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp07/program_manasik/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('program_manasik' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP08
        private function ConvertImage08($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->akte_notaris != null && strlen($item->akte_notaris) > 50) {
                        $photo = $item->akte_notaris;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/akte_notaris/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('akte_notaris' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->foto_kantor != null && strlen($item->foto_kantor) > 50) {
                        $photo = $item->foto_kantor;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'foto_kantor-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/foto_kantor/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('foto_kantor' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->susunan_pengurus != null && strlen($item->susunan_pengurus) > 50) {
                        $photo = $item->susunan_pengurus;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/susunan_pengurus/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('susunan_pengurus' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->sertifikat_pembimbing != null && strlen($item->sertifikat_pembimbing) > 50) {
                        $photo = $item->sertifikat_pembimbing;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'sertifikat_pembimbing-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_pembimbing/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('sertifikat_pembimbing' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->program_manasik != null && strlen($item->program_manasik) > 50) {
                        $photo = $item->program_manasik;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'program_manasik-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/program_manasik/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('program_manasik' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->laporan_bimbingan != null && strlen($item->laporan_bimbingan) > 50) {
                        $photo = $item->laporan_bimbingan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'laporan_bimbingan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/laporan_bimbingan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('laporan_bimbingan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->sertifikat_akreditasi != null && strlen($item->sertifikat_akreditasi) > 50) {
                        $photo = $item->sertifikat_akreditasi;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'sertifikat_akreditasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_akreditasi/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('sertifikat_akreditasi' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->sk_pendirian != null && strlen($item->sk_pendirian) > 50) {
                        $photo = $item->sk_pendirian;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'sk_pendirian-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/sk_pendirian/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('sk_pendirian' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->rincian_penggunaan_biaya_bimbingan != null && strlen($item->rincian_penggunaan_biaya_bimbingan) > 50) {
                        $photo = $item->rincian_penggunaan_biaya_bimbingan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'rincian_penggunaan_biaya_bimbingan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp08/rincian_penggunaan_biaya_bimbingan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('rincian_penggunaan_biaya_bimbingan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP09
        private function ConvertImage09($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp0' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->akte_notaris != null && strlen($item->akte_notaris) > 50) {
                        $photo = $item->akte_notaris;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/akte_notaris/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('akte_notaris' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->izin_usaha != null && strlen($item->izin_usaha) > 50) {
                        $photo = $item->izin_usaha;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'izin_usaha-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/izin_usaha/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('izin_usaha' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->skud != null && strlen($item->skud) > 50) {
                        $photo = $item->skud;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'skud-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/skud/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('skud' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->npwp != null && strlen($item->npwp) > 50) {
                        $photo = $item->npwp;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'npwp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/npwp/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('npwp' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->srt_rekomendasi_pemkab != null && strlen($item->srt_rekomendasi_pemkab) > 50) {
                        $photo = $item->srt_rekomendasi_pemkab;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_rekomendasi_pemkab-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/srt_rekomendasi_pemkab/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_rekomendasi_pemkab' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->laporan_keuangan != null && strlen($item->laporan_keuangan) > 50) {
                        $photo = $item->laporan_keuangan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'laporan_keuangan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/laporan_keuangan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('laporan_keuangan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->susunan_pengurus != null && strlen($item->susunan_pengurus) > 50) {
                        $photo = $item->susunan_pengurus;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/susunan_pengurus/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('susunan_pengurus' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->data_pemegang_saham != null && strlen($item->data_pemegang_saham) > 50) {
                        $photo = $item->data_pemegang_saham;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'data_pemegang_saham-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/data_pemegang_saham/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('data_pemegang_saham' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
                if ($item->data_direksi_komisaris != null && strlen($item->data_direksi_komisaris) > 50) {
                        $photo = $item->data_direksi_komisaris;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'data_direksi_komisaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp09/data_direksi_komisaris/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('data_direksi_komisaris' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp0' . $id_layanan);
                }
        }

        //Convert Image PTSP10
        private function ConvertImage10($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->sk != null && strlen($item->sk) > 50) {
                        $photo = $item->sk;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'sk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/sk/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('sk' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->akte_notaris != null && strlen($item->akte_notaris) > 50) {
                        $photo = $item->akte_notaris;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/akte_notaris/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('akte_notaris' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->izin_usaha != null && strlen($item->izin_usaha) > 50) {
                        $photo = $item->izin_usaha;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'izin_usaha-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/izin_usaha/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('izin_usaha' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->skud != null && strlen($item->skud) > 50) {
                        $photo = $item->skud;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'skud-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/skud/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('skud' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->npwp != null && strlen($item->npwp) > 50) {
                        $photo = $item->npwp;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'npwp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/npwp/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('npwp' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->srt_rekomendasi_pemkab != null && strlen($item->srt_rekomendasi_pemkab) > 50) {
                        $photo = $item->srt_rekomendasi_pemkab;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_rekomendasi_pemkab-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/srt_rekomendasi_pemkab/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_rekomendasi_pemkab' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->laporan_keuangan != null && strlen($item->laporan_keuangan) > 50) {
                        $photo = $item->laporan_keuangan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'laporan_keuangan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/laporan_keuangan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('laporan_keuangan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->susunan_pengurus != null && strlen($item->susunan_pengurus) > 50) {
                        $photo = $item->susunan_pengurus;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/susunan_pengurus/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('susunan_pengurus' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->bukti_pemberangkatan != null && strlen($item->bukti_pemberangkatan) > 50) {
                        $photo = $item->bukti_pemberangkatan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'bukti_pemberangkatan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp10/bukti_pemberangkatan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('bukti_pemberangkatan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP11
        private function ConvertImage11($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_rekomendasi != null && strlen($item->srt_rekomendasi) > 50) {
                        $photo = $item->srt_rekomendasi;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_rekomendasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp11/srt_rekomendasi/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_rekomendasi' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->srt_penerimaan != null && strlen($item->srt_penerimaan) > 50) {
                        $photo = $item->srt_penerimaan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_penerimaan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp11/srt_penerimaan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_penerimaan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->raport != null && strlen($item->raport) > 50) {
                        $photo = $item->raport;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'raport-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp11/raport/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('raport' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP12
        private function ConvertImage12($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->proposal_permohonan != null && strlen($item->proposal_permohonan) > 50) {
                        $photo = $item->proposal_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp12/proposal_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP13
        private function ConvertImage13($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp13/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->proposal != null && strlen($item->proposal) > 50) {
                        $photo = $item->proposal;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp13/proposal/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP14
        private function ConvertImage14($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->proposal_permohonan != null && strlen($item->proposal_permohonan) > 50) {
                        $photo = $item->proposal_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp14/proposal_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP15
        private function ConvertImage15($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->proposal_permohonan != null && strlen($item->proposal_permohonan) > 50) {
                        $photo = $item->proposal_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp15/proposal_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP16
        private function ConvertImage16($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp16/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->proposal != null && strlen($item->proposal) > 50) {
                        $photo = $item->proposal;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp16/proposal/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP17
        private function ConvertImage17($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp17/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->srt_persetujuan_sekolah_satmikal != null && strlen($item->srt_persetujuan_sekolah_satmikal) > 50) {
                        $photo = $item->srt_persetujuan_sekolah_satmikal;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_persetujuan_sekolah_satmikal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_satmikal/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_persetujuan_sekolah_satmikal' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->srt_persetujuan_sekolah_tujuan != null && strlen($item->srt_persetujuan_sekolah_tujuan) > 50) {
                        $photo = $item->srt_persetujuan_sekolah_tujuan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_persetujuan_sekolah_tujuan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_tujuan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_persetujuan_sekolah_tujuan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP18
        private function ConvertImage18($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp18/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->proposal != null && strlen($item->proposal) > 50) {
                        $photo = $item->proposal;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp18/proposal/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('proposal' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP19
        private function ConvertImage19($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp19/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->jadwal_siaran != null && strlen($item->jadwal_siaran) > 50) {
                        $photo = $item->jadwal_siaran;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'jadwal_siaran-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp19/jadwal_siaran/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('jadwal_siaran' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP20
        private function ConvertImage20($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp20/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->srt_rek_kua != null && strlen($item->srt_rek_kua) > 50) {
                        $photo = $item->srt_rek_kua;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_rek_kua-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp20/srt_rek_kua/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_rek_kua' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP21
        private function ConvertImage21($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp21/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP22
        private function ConvertImage22($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp22/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->formulir != null && strlen($item->formulir) > 50) {
                        $photo = $item->formulir;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'formulir-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp22/formulir/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('formulir' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP23
        private function ConvertImage23($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp23/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP24
        private function ConvertImage24($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp24/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
                if ($item->fc_dokumen != null && strlen($item->fc_dokumen) > 50) {
                        $photo = $item->fc_dokumen;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp24/fc_dokumen/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('fc_dokumen' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP25
        private function ConvertImage25($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp25/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP26
        private function ConvertImage26($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp26/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
        }

        //Convert Image PTSP27
        private function ConvertImage27($id_permohonan_ptsp, $id_layanan)
        {
                $item = $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp)->get('ptsp' . $id_layanan)->row();
                $fileName = "";
                if ($item->srt_permohonan != null && strlen($item->srt_permohonan) > 50) {
                        $photo = $item->srt_permohonan;
                        if (!empty($photo)) {
                                $entry = base64_decode($photo);
                                $fileName = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.pdf';
                                $directory = '../assets/dashboard/pemohon/ptsp/ptsp27/srt_permohonan/' . $fileName;
                                file_put_contents($directory, $entry);
                        }
                        $data_ptsp = array('srt_permohonan' => $fileName);
                        $this->m_fo->update_ptsp($id_permohonan_ptsp, $data_ptsp, 'ptsp' . $id_layanan);
                }
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
                $this->email->from('no-reply@simelati.id', 'simelati.id');

                // Email penerima
                $this->email->to($email->email); // Ganti dengan email tujuan

                // Lampiran email, isi dengan url/path file
                //     $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

                // Subject email
                $this->email->subject('Informasi Permohonan Anda');

                // Isi email
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan bahwasannya permohonan anda telah <b>disetujui</b>, dan sudah bisa diambil di Kantor Kementrian Agama Kabupaten Klaten yang berada di JL.Ronggowarsito Klaten<br><br>Terimakasih<br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

                // Tampilkan pesan sukses atau error
                $this->email->send();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

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
                $this->email->from('no-reply@simelati.id', 'simelati.id');

                // Email penerima
                $this->email->to($email->email); // Ganti dengan email tujuan

                // Lampiran email, isi dengan url/path file
                //     $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

                // Subject email
                $this->email->subject('Informasi Permohonan Anda');

                // Isi email
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan kepada pemohon bahwasannya permohonan anda dipending dikarenakan ' . $this->input->post('keterangan') . ', mohon pemberitahuan ini untuk segera ditindak lanjuti. <br>Terimakasih<br>Salam,<br><br>Kementerian Agama Kabupaten Klaten');

                // Tampilkan pesan sukses atau error
                $this->email->send();

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
                $data['total_laporan'] = $this->m_fo->jml_laporan()->result();

                $data_detail['data_pemohon'] = $this->m_fo->get_data_pemohon_ptsp($id_permohonan_ptsp)->result();

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_title['title'] = 'Permohonan Rohaniawan dan Petugas Doa';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 2) {
                        $data_title['title'] = 'Permohonan Rekomendasi Kegiatan Keagamaan';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
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
                } elseif ($id_layanan == 7) {
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Pendirian KBIHU';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                } elseif ($id_layanan == 8) {
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                } elseif ($id_layanan == 9) {
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                } elseif ($id_layanan == 10) {
                        $data_title['title'] = 'Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                } elseif ($id_layanan == 11) {
                        $data_title['title'] = 'Permohonan Rekomendasi Pindah Siswa Madrasah';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                } elseif ($id_layanan == 12) {
                        $data_title['title'] = 'Permohonan Rekomendasi Bantuan RA/Madrasah';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                } elseif ($id_layanan == 13) {
                        $data_title['title'] = 'Permohonan Rekomendasi Ijin Operasional Lembaga Baru';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
                } elseif ($id_layanan == 14) {
                        $data_title['title'] = 'Permohonan Ijop LPQ';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_title['title'] = 'Permohonan Ijop Madin';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 16) {
                        $data_title['title'] = 'Permohonan Rekomendasi Proposal PD Pontren (Bantuan Sarpras / pembangunan / rehabilitasi bangunan)';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                } elseif ($id_layanan == 17) {
                        $data_title['title'] = 'Permohonan Tambahan Jam Mengajar Guru';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                } elseif ($id_layanan == 18) {
                        $data_title['title'] = 'Rekomendasi Permohonan Bantuan Masjid';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 19) {
                        $data_title['title'] = 'Permohonan Petugas Siaran Keagamaan';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
                } elseif ($id_layanan == 20) {
                        $data_title['title'] = 'Permohonan Ijin Operasional Majlis Taklim';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                } elseif ($id_layanan == 21) {
                        $data_title['title'] = 'Permohonan Arah ukur kiblat';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                } elseif ($id_layanan == 22) {
                        $data_title['title'] = 'Rekomendasi Permohonan ID Masjid dan Musala';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                } elseif ($id_layanan == 23) {
                        $data_title['title'] = 'PERMOHONAN MUTASI GPAI PNS';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                } elseif ($id_layanan == 24) {
                        $data_title['title'] = 'Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                } elseif ($id_layanan == 25) {
                        $data_title['title'] = 'Konsultasi dan informasi sertifikasi halal, zakat dan wakaf';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                } elseif ($id_layanan == 26) {
                        $data_title['title'] = 'Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru , Haji';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
                } elseif ($id_layanan == 27) {
                        $data_title['title'] = 'Permohonan Surat Ket Tambahan Penghasilan';
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp27')->result();
                }

                $this->load->view('header', $data_title);
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('frontoffice/ptsp1/tampil_ptsp01', $data_detail);
                } elseif ($id_layanan == 2) {
                        $this->load->view('frontoffice/ptsp2/tampil_ptsp02', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('frontoffice/ptsp3/tampil_ptsp03', $data_detail);
                } elseif ($id_layanan == 4) {
                        $this->load->view('frontoffice/ptsp4/tampil_ptsp04', $data_detail);
                } elseif ($id_layanan == 5) {
                        $this->load->view('frontoffice/ptsp5/tampil_ptsp05', $data_detail);
                } elseif ($id_layanan == 6) {
                        $this->load->view('frontoffice/ptsp6/tampil_ptsp06', $data_detail);
                } elseif ($id_layanan == 7) {
                        $this->load->view('frontoffice/ptsp7/tampil_ptsp07', $data_detail);
                } elseif ($id_layanan == 8) {
                        $this->load->view('frontoffice/ptsp8/tampil_ptsp08', $data_detail);
                } elseif ($id_layanan == 9) {
                        $this->load->view('frontoffice/ptsp9/tampil_ptsp09', $data_detail);
                } elseif ($id_layanan == 10) {
                        $this->load->view('frontoffice/ptsp10/tampil_ptsp10', $data_detail);
                } elseif ($id_layanan == 11) {
                        $this->load->view('frontoffice/ptsp11/tampil_ptsp11', $data_detail);
                } elseif ($id_layanan == 12) {
                        $this->load->view('frontoffice/ptsp12/tampil_ptsp12', $data_detail);
                } elseif ($id_layanan == 13) {
                        $this->load->view('frontoffice/ptsp13/tampil_ptsp13', $data_detail);
                } elseif ($id_layanan == 14) {
                        $this->load->view('frontoffice/ptsp14/tampil_ptsp14', $data_detail);
                } elseif ($id_layanan == 15) {
                        $this->load->view('frontoffice/ptsp15/tampil_ptsp15', $data_detail);
                } elseif ($id_layanan == 16) {
                        $this->load->view('frontoffice/ptsp16/tampil_ptsp16', $data_detail);
                } elseif ($id_layanan == 17) {
                        $this->load->view('frontoffice/ptsp17/tampil_ptsp17', $data_detail);
                } elseif ($id_layanan == 18) {
                        $this->load->view('frontoffice/ptsp18/tampil_ptsp18', $data_detail);
                } elseif ($id_layanan == 19) {
                        $this->load->view('frontoffice/ptsp19/tampil_ptsp19', $data_detail);
                } elseif ($id_layanan == 20) {
                        $this->load->view('frontoffice/ptsp20/tampil_ptsp20', $data_detail);
                } elseif ($id_layanan == 21) {
                        $this->load->view('frontoffice/ptsp21/tampil_ptsp21', $data_detail);
                } elseif ($id_layanan == 22) {
                        $this->load->view('frontoffice/ptsp22/tampil_ptsp22', $data_detail);
                } elseif ($id_layanan == 23) {
                        $this->load->view('frontoffice/ptsp23/tampil_ptsp23', $data_detail);
                } elseif ($id_layanan == 24) {
                        $this->load->view('frontoffice/ptsp24/tampil_ptsp24', $data_detail);
                } elseif ($id_layanan == 25) {
                        $this->load->view('frontoffice/ptsp25/tampil_ptsp25', $data_detail);
                } elseif ($id_layanan == 26) {
                        $this->load->view('frontoffice/ptsp26/tampil_ptsp26', $data_detail);
                } elseif ($id_layanan == 27) {
                        $this->load->view('frontoffice/ptsp27/tampil_ptsp27', $data_detail);
                }
                $this->load->view('footer');
        }

        // aksi update ptsp01
        public function aksi_update_pengajuan_ptsp01($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'sifat' => $this->input->post('sifat'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp01');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp02
        public function aksi_update_pengajuan_ptsp02($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'sifat' => $this->input->post('sifat'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp02');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp05
        public function aksi_update_pengajuan_ptsp05($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp05');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp06
        public function aksi_update_pengajuan_ptsp06($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp06');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp07
        public function aksi_update_pengajuan_ptsp07($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp07');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp08
        public function aksi_update_pengajuan_ptsp08($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp08');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp09
        public function aksi_update_pengajuan_ptsp09($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp09');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp10
        public function aksi_update_pengajuan_ptsp10($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp10');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp11
        public function aksi_update_pengajuan_ptsp11($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp11');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp12
        public function aksi_update_pengajuan_ptsp12($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'sifat' => $this->input->post('sifat'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp12');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp13
        public function aksi_update_pengajuan_ptsp13($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp13');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp14
        public function aksi_update_pengajuan_ptsp14($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'no_surat_keterangan' => $this->input->post('no_surat_keterangan'),
                        'masa_berlaku' => $this->input->post('masa_berlaku')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp14');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp15
        public function aksi_update_pengajuan_ptsp15($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'no_surat_keterangan' => $this->input->post('no_surat_keterangan')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp15');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp16
        public function aksi_update_pengajuan_ptsp16($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'sifat' => $this->input->post('sifat'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp16');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp17
        public function aksi_update_pengajuan_ptsp17($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp17');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp18
        public function aksi_update_pengajuan_ptsp18($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp18');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp19
        public function aksi_update_pengajuan_ptsp19($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat'),
                        'sifat' => $this->input->post('sifat'),
                        'no_surat_tugas' => $this->input->post('no_surat_tugas'),
                        'jml_lampiran' => $this->input->post('jml_lampiran')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp19');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp20
        public function aksi_update_pengajuan_ptsp20($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp20');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp21
        public function aksi_update_pengajuan_ptsp21($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp21');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp22
        public function aksi_update_pengajuan_ptsp22($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp22');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp23
        public function aksi_update_pengajuan_ptsp23($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp23');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp24
        public function aksi_update_pengajuan_ptsp24($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp24');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }


        //upload jadwal ptsp25
        private function aksi_upload_jadwal_ptsp25($id_ptsp25)
        {
                $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp25/jadwal/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
                $config['file_name']            = 'jadwal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['jadwal']['name'])) {
                        if ($this->upload->do_upload('jadwal')) {

                                $uploadData = $this->upload->data();

                                $item = $this->db->where('id_ptsp', $id_ptsp25)->get('ptsp25')->row();

                                //replace foto lama 
                                if ($item->jadwal != null) {
                                        $target_file = '../assets/dashboard/pemohon/ptsp/ptsp25/jadwal/' . $item->jadwal;
                                        unlink($target_file);
                                }

                                $data['jadwal'] = $uploadData['file_name'];

                                $this->db->where('id_ptsp', $id_ptsp25);
                                $this->db->update('ptsp25', $data);
                        }
                }
        }
        // upload jadwal permohonan ptsp25
        public function update_jadwal_ptsp25($id_ptsp)
        {
                if ($_FILES != null) {
                        $this->aksi_upload_jadwal_ptsp25($id_ptsp);
                }
                $permohonan = $this->input->post('id_permohonan_ptsp');
                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        //upload data ptsp26
        private function aksi_upload_data_ptsp26($id_ptsp26)
        {
                $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp26/data/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
                $config['file_name']            = 'data-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['data']['name'])) {
                        if ($this->upload->do_upload('data')) {

                                $uploadData = $this->upload->data();

                                $item = $this->db->where('id_ptsp', $id_ptsp26)->get('ptsp26')->row();

                                //replace foto lama 
                                if ($item->data != null) {
                                        $target_file = '../assets/dashboard/pemohon/ptsp/ptsp26/data/' . $item->data;
                                        unlink($target_file);
                                }

                                $data['data'] = $uploadData['file_name'];

                                $this->db->where('id_ptsp', $id_ptsp26);
                                $this->db->update('ptsp26', $data);
                        }
                }
        }
        // upload data permohonan ptsp26
        public function update_data_ptsp26($id_ptsp)
        {
                if ($_FILES != null) {
                        $this->aksi_upload_data_ptsp26($id_ptsp);
                }
                $permohonan = $this->input->post('id_permohonan_ptsp');
                $this->session->set_flashdata('success', 'disimpan');
                // redirect('dashboard/detail_data_permohonan/' . $permohonan . '/26');
                redirect('dashboard/list_permohonan_selesai');
        }

        // aksi update ptsp24
        public function aksi_update_pengajuan_ptsp27($id_permohonan)
        {
                $data_ptsp = array(
                        'no_surat' => $this->input->post('no_surat')
                );

                $this->m_fo->update_ptsp($id_permohonan, $data_ptsp, 'ptsp27');

                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        //upload suket_penghasilan ptsp27
        private function aksi_upload_suket_penghasilan_ptsp27($id_ptsp27)
        {
                $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp27/suket_penghasilan/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
                $config['file_name']            = 'suket_penghasilan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['suket_penghasilan']['name'])) {
                        if ($this->upload->do_upload('suket_penghasilan')) {

                                $uploadData = $this->upload->data();

                                $item = $this->db->where('id_ptsp', $id_ptsp27)->get('ptsp27')->row();

                                //replace foto lama 
                                if ($item->suket_penghasilan != null) {
                                        $target_file = '../assets/dashboard/pemohon/ptsp/ptsp27/suket_penghasilan/' . $item->suket_penghasilan;
                                        unlink($target_file);
                                }

                                $data['suket_penghasilan'] = $uploadData['file_name'];

                                $this->db->where('id_ptsp', $id_ptsp27);
                                $this->db->update('ptsp27', $data);
                        }
                }
        }
        // upload suket_penghasilan permohonan ptsp27
        public function update_suket_penghasilan_ptsp27($id_ptsp)
        {
                if ($_FILES != null) {
                        $this->aksi_upload_suket_penghasilan_ptsp27($id_ptsp);
                }
                $permohonan = $this->input->post('id_permohonan_ptsp');
                $this->session->set_flashdata('success', 'disimpan');
                redirect('dashboard/list_permohonan_selesai');
        }

        //aksi cetak dari list permohonan selesai
        public function cetak_ptsp($id_permohonan_ptsp, $id_layanan)
        {
                $data_permohonan = array(
                        'status_cetak' => 1
                );
                $this->m_fo->tambah_permohonan($data_permohonan, $id_permohonan_ptsp);

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                        $data_detail['data_petugas_doa'] = $this->m_fo->data_petugas_doa($id_permohonan_ptsp)->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 2) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 3) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 4) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 7) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 8) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 9) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 10) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 11) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 12) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 13) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 16) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 17) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 19) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 20) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 21) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 22) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 23) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 24) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 26) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 27) {
                        redirect('dashboard/list_permohonan_selesai');
                }

                $dompdf = new Dompdf();

                if ($id_layanan == 1) {
                        $html = $this->load->view('frontoffice/ptsp1/cetak_ptsp01', $data_detail, true);
                } elseif ($id_layanan == 2) {
                        $html = $this->load->view('frontoffice/ptsp2/cetak_ptsp02', $data_detail, true);
                } elseif ($id_layanan == 3) {
                        $html = $this->load->view('frontoffice/ptsp3/cetak_ptsp03', $data_detail, true);
                } elseif ($id_layanan == 4) {
                        $html = $this->load->view('frontoffice/ptsp4/cetak_ptsp04', $data_detail, true);
                } elseif ($id_layanan == 5) {
                        $html = $this->load->view('frontoffice/ptsp5/cetak_ptsp05', $data_detail, true);
                } elseif ($id_layanan == 6) {
                        $html = $this->load->view('frontoffice/ptsp6/cetak_ptsp06', $data_detail, true);
                } elseif ($id_layanan == 7) {
                        $html = $this->load->view('frontoffice/ptsp7/cetak_ptsp07', $data_detail, true);
                } elseif ($id_layanan == 8) {
                        $html = $this->load->view('frontoffice/ptsp8/cetak_ptsp08', $data_detail, true);
                } elseif ($id_layanan == 9) {
                        $html = $this->load->view('frontoffice/ptsp9/cetak_ptsp09', $data_detail, true);
                } elseif ($id_layanan == 10) {
                        $html = $this->load->view('frontoffice/ptsp10/cetak_ptsp10', $data_detail, true);
                } elseif ($id_layanan == 11) {
                        $html = $this->load->view('frontoffice/ptsp11/cetak_ptsp11', $data_detail, true);
                } elseif ($id_layanan == 12) {
                        $html = $this->load->view('frontoffice/ptsp12/cetak_ptsp12', $data_detail, true);
                } elseif ($id_layanan == 13) {
                        $html = $this->load->view('frontoffice/ptsp13/cetak_ptsp13', $data_detail, true);
                } elseif ($id_layanan == 14) {
                        $html = $this->load->view('frontoffice/ptsp14/cetak_ptsp14', $data_detail, true);
                } elseif ($id_layanan == 15) {
                        $html = $this->load->view('frontoffice/ptsp15/cetak_ptsp15_2', $data_detail, true);
                } elseif ($id_layanan == 16) {
                        $html = $this->load->view('frontoffice/ptsp16/cetak_ptsp16', $data_detail, true);
                } elseif ($id_layanan == 17) {
                        $html = $this->load->view('frontoffice/ptsp17/cetak_ptsp17', $data_detail, true);
                } elseif ($id_layanan == 18) {
                        $html = $this->load->view('frontoffice/ptsp18/cetak_ptsp18', $data_detail, true);
                } elseif ($id_layanan == 19) {
                        $html = $this->load->view('frontoffice/ptsp19/cetak_ptsp19', $data_detail, true);
                } elseif ($id_layanan == 20) {
                        $html = $this->load->view('frontoffice/ptsp20/cetak_ptsp20', $data_detail, true);
                } elseif ($id_layanan == 21) {
                        $html = $this->load->view('frontoffice/ptsp21/cetak_ptsp21', $data_detail, true);
                } elseif ($id_layanan == 22) {
                        $html = $this->load->view('frontoffice/ptsp22/cetak_ptsp22', $data_detail, true);
                } elseif ($id_layanan == 23) {
                        $html = $this->load->view('frontoffice/ptsp23/cetak_ptsp23', $data_detail, true);
                } elseif ($id_layanan == 24) {
                        $html = $this->load->view('frontoffice/ptsp24/cetak_ptsp24', $data_detail, true);
                } elseif ($id_layanan == 25) {
                        $html = $this->load->view('frontoffice/ptsp25/cetak_ptsp25', $data_detail, true);
                } elseif ($id_layanan == 26) {
                        $html = $this->load->view('frontoffice/ptsp26/cetak_ptsp26', $data_detail, true);
                } elseif ($id_layanan == 27) {
                        $html = $this->load->view('frontoffice/ptsp27/cetak_ptsp27', $data_detail, true);
                }

                // $dompdf->loadHtml($html);
                // if ($id_layanan == 21) {
                //         $dompdf->setPaper('A4', 'landscape');
                // } elseif ($id_layanan == 14) {
                //         $dompdf->setPaper('F4', 'portrait');
                // } else {
                //         $dompdf->setPaper('A4', 'portrait');
                // }
                // $dompdf->render();

                $dompdf->loadHtml($html);
                if ($id_layanan == 21) {
                        $dompdf->setPaper('A4', 'landscape');
                } else {
                        $dompdf->setPaper('A4', 'portrait');
                }
                $dompdf->render();

                if ($id_layanan == 1) {
                        $dompdf->stream('Permohonan Rohaniawan dan Petugas Doa');
                } elseif ($id_layanan == 2) {
                        $dompdf->stream('Rekomendasi Kegiatan Keagamaan');
                } elseif ($id_layanan == 3) {
                        $dompdf->stream('Legalisir Ijazah');
                } elseif ($id_layanan == 4) {
                        $dompdf->stream('Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat');
                } elseif ($id_layanan == 5) {
                        $dompdf->stream('Permohonan Surat Keterangan Haji Pertama');
                } elseif ($id_layanan == 6) {
                        $dompdf->stream('Permohonan Rekomendasi Paspor Haji dan Umrah');
                } elseif ($id_layanan == 7) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Pendirian KBIHU');
                } elseif ($id_layanan == 8) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU');
                } elseif ($id_layanan == 9) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)');
                } elseif ($id_layanan == 10) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)');
                } elseif ($id_layanan == 11) {
                        $dompdf->stream('Permohonan Rekomendasi Pindah Siswa Madrasah');
                } elseif ($id_layanan == 12) {
                        $dompdf->stream('Permohonan Rekomendasi Bantuan RA Madrasah');
                } elseif ($id_layanan == 13) {
                        $dompdf->stream('Permohonan Rekomendasi Ijin Operasional Lembaga Baru');
                } elseif ($id_layanan == 14) {
                        $dompdf->stream('Permohonan Ijop LPQ');
                } elseif ($id_layanan == 15) {
                        $dompdf->stream('Permohonan Ijop Madin');
                } elseif ($id_layanan == 16) {
                        $dompdf->stream('Rekomendasi Proposal PD Pontren (Bantuan Sarpras / pembangunan / rehabilitasi bangunan)');
                } elseif ($id_layanan == 17) {
                        $dompdf->stream('Permohonan Tambahan Jam Mengajar Guru');
                } elseif ($id_layanan == 18) {
                        $dompdf->stream('Rekomendasi Permohonan Bantuan Masjid');
                } elseif ($id_layanan == 19) {
                        $dompdf->stream('Permohonan Petugas Siaran Keagamaan');
                } elseif ($id_layanan == 20) {
                        $dompdf->stream('Permohonan Ijin Operasional Majlis Taklim');
                } elseif ($id_layanan == 21) {
                        $dompdf->stream('Permohonan Arah ukur kiblat');
                } elseif ($id_layanan == 22) {
                        $dompdf->stream('Rekomendasi Permohonan ID Masjid dan Musala');
                } elseif ($id_layanan == 23) {
                        $dompdf->stream('PERMOHONAN MUTASI GPAI PNS');
                } elseif ($id_layanan == 24) {
                        $dompdf->stream('Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah');
                } elseif ($id_layanan == 25) {
                        $dompdf->stream('Konsultasi dan informasi sertifikasi halal, zakat dan wakaf');
                } elseif ($id_layanan == 26) {
                        $dompdf->stream('Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru , Haji');
                } elseif ($id_layanan == 27) {
                        $dompdf->stream('Permohonan Surat Ket Tambahan Penghasilan');
                }

                redirect('dashboard/list_permohonan_selesai');
        }

        //aksi cetak dari list arsip
        public function cetak_arsip($id_permohonan_ptsp, $id_layanan)
        {
                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                        $data_detail['data_petugas_doa'] = $this->m_fo->data_petugas_doa($id_permohonan_ptsp)->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 2) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 3) {
                        redirect('dashboard/list_permohonan_arsip');
                } elseif ($id_layanan == 4) {
                        redirect('dashboard/list_permohonan_arsip');
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 7) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 8) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 9) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 10) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 11) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 12) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 13) {
                        redirect('dashboard/list_permohonan_arsip');
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 16) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 17) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 19) {
                        redirect('dashboard/list_permohonan_arsip');
                } elseif ($id_layanan == 20) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 21) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 22) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 23) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 24) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                        $data_detail['data_kepala'] = $this->m_fo->get_data_kepala($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 26) {
                        redirect('dashboard/list_permohonan_arsip');
                } elseif ($id_layanan == 27) {
                        redirect('dashboard/list_permohonan_arsip');
                }

                $dompdf = new Dompdf();

                if ($id_layanan == 1) {
                        $html = $this->load->view('frontoffice/ptsp1/cetak_ptsp01', $data_detail, true);
                } elseif ($id_layanan == 2) {
                        $html = $this->load->view('frontoffice/ptsp2/cetak_ptsp02', $data_detail, true);
                } elseif ($id_layanan == 3) {
                        $html = $this->load->view('frontoffice/ptsp3/cetak_ptsp03', $data_detail, true);
                } elseif ($id_layanan == 4) {
                        $html = $this->load->view('frontoffice/ptsp4/cetak_ptsp04', $data_detail, true);
                } elseif ($id_layanan == 5) {
                        $html = $this->load->view('frontoffice/ptsp5/cetak_ptsp05', $data_detail, true);
                } elseif ($id_layanan == 6) {
                        $html = $this->load->view('frontoffice/ptsp6/cetak_ptsp06', $data_detail, true);
                } elseif ($id_layanan == 7) {
                        $html = $this->load->view('frontoffice/ptsp7/cetak_ptsp07', $data_detail, true);
                } elseif ($id_layanan == 8) {
                        $html = $this->load->view('frontoffice/ptsp8/cetak_ptsp08', $data_detail, true);
                } elseif ($id_layanan == 9) {
                        $html = $this->load->view('frontoffice/ptsp9/cetak_ptsp09', $data_detail, true);
                } elseif ($id_layanan == 10) {
                        $html = $this->load->view('frontoffice/ptsp10/cetak_ptsp10', $data_detail, true);
                } elseif ($id_layanan == 11) {
                        $html = $this->load->view('frontoffice/ptsp11/cetak_ptsp11', $data_detail, true);
                } elseif ($id_layanan == 12) {
                        $html = $this->load->view('frontoffice/ptsp12/cetak_ptsp12', $data_detail, true);
                } elseif ($id_layanan == 13) {
                        $html = $this->load->view('frontoffice/ptsp13/cetak_ptsp13', $data_detail, true);
                } elseif ($id_layanan == 14) {
                        $html = $this->load->view('frontoffice/ptsp14/cetak_ptsp14', $data_detail, true);
                } elseif ($id_layanan == 15) {
                        $html = $this->load->view('frontoffice/ptsp15/cetak_ptsp15_2', $data_detail, true);
                } elseif ($id_layanan == 16) {
                        $html = $this->load->view('frontoffice/ptsp16/cetak_ptsp16', $data_detail, true);
                } elseif ($id_layanan == 17) {
                        $html = $this->load->view('frontoffice/ptsp17/cetak_ptsp17', $data_detail, true);
                } elseif ($id_layanan == 18) {
                        $html = $this->load->view('frontoffice/ptsp18/cetak_ptsp18', $data_detail, true);
                } elseif ($id_layanan == 19) {
                        $html = $this->load->view('frontoffice/ptsp19/cetak_ptsp19', $data_detail, true);
                } elseif ($id_layanan == 20) {
                        $html = $this->load->view('frontoffice/ptsp20/cetak_ptsp20', $data_detail, true);
                } elseif ($id_layanan == 21) {
                        $html = $this->load->view('frontoffice/ptsp21/cetak_ptsp21', $data_detail, true);
                } elseif ($id_layanan == 22) {
                        $html = $this->load->view('frontoffice/ptsp22/cetak_ptsp22', $data_detail, true);
                } elseif ($id_layanan == 23) {
                        $html = $this->load->view('frontoffice/ptsp23/cetak_ptsp23', $data_detail, true);
                } elseif ($id_layanan == 24) {
                        $html = $this->load->view('frontoffice/ptsp24/cetak_ptsp24', $data_detail, true);
                } elseif ($id_layanan == 25) {
                        $html = $this->load->view('frontoffice/ptsp25/cetak_ptsp25', $data_detail, true);
                } elseif ($id_layanan == 26) {
                        $html = $this->load->view('frontoffice/ptsp26/cetak_ptsp26', $data_detail, true);
                } elseif ($id_layanan == 27) {
                        $html = $this->load->view('frontoffice/ptsp27/cetak_ptsp27', $data_detail, true);
                }

                $dompdf->loadHtml($html);
                if ($id_layanan == 21) {
                        $dompdf->setPaper('A4', 'landscape');
                } else {
                        $dompdf->setPaper('A4', 'portrait');
                }
                $dompdf->render();

                if ($id_layanan == 1) {
                        $dompdf->stream('Permohonan Rohaniawan dan Petugas Doa');
                } elseif ($id_layanan == 2) {
                        $dompdf->stream('Rekomendasi Kegiatan Keagamaan');
                } elseif ($id_layanan == 3) {
                        $dompdf->stream('Legalisir Ijazah');
                } elseif ($id_layanan == 4) {
                        $dompdf->stream('Legalisir Dokumen Kepegawaian, Surat, Piagam, Sertifikat');
                } elseif ($id_layanan == 5) {
                        $dompdf->stream('Permohonan Surat Keterangan Haji Pertama');
                } elseif ($id_layanan == 6) {
                        $dompdf->stream('Permohonan Rekomendasi Paspor Haji dan Umrah');
                } elseif ($id_layanan == 7) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Pendirian KBIHU');
                } elseif ($id_layanan == 8) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Perpanjangan Operasional KBIHU');
                } elseif ($id_layanan == 9) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Pendirian Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)');
                } elseif ($id_layanan == 10) {
                        $dompdf->stream('Permohonan Rekomendasi Izin Perpanjangan Operasional Penyelenggara Perjalanan Ibadah Umroh (PPIU) dan Perjalanan Ibadah Haji Khusus (PIHK)');
                } elseif ($id_layanan == 11) {
                        $dompdf->stream('Permohonan Rekomendasi Pindah Siswa Madrasah');
                } elseif ($id_layanan == 12) {
                        $dompdf->stream('Permohonan Rekomendasi Bantuan RA Madrasah');
                } elseif ($id_layanan == 13) {
                        $dompdf->stream('Permohonan Rekomendasi Ijin Operasional Lembaga Baru');
                } elseif ($id_layanan == 14) {
                        $dompdf->stream('Permohonan Ijop LPQ');
                } elseif ($id_layanan == 15) {
                        $dompdf->stream('Permohonan Ijop Madin');
                } elseif ($id_layanan == 16) {
                        $dompdf->stream('Rekomendasi Proposal PD Pontren (Bantuan Sarpras / pembangunan / rehabilitasi bangunan)');
                } elseif ($id_layanan == 17) {
                        $dompdf->stream('Permohonan Tambahan Jam Mengajar Guru');
                } elseif ($id_layanan == 18) {
                        $dompdf->stream('Rekomendasi Permohonan Bantuan Masjid');
                } elseif ($id_layanan == 19) {
                        $dompdf->stream('Permohonan Petugas Siaran Keagamaan');
                } elseif ($id_layanan == 20) {
                        $dompdf->stream('Permohonan Ijin Operasional Majlis Taklim');
                } elseif ($id_layanan == 21) {
                        $dompdf->stream('Permohonan Arah ukur kiblat');
                } elseif ($id_layanan == 22) {
                        $dompdf->stream('Rekomendasi Permohonan ID Masjid dan Musala');
                } elseif ($id_layanan == 23) {
                        $dompdf->stream('PERMOHONAN MUTASI GPAI PNS');
                } elseif ($id_layanan == 24) {
                        $dompdf->stream('Rekomendasi Pajak Kendaraan Bermotor Layanan Sosial Rumah Ibadah');
                } elseif ($id_layanan == 25) {
                        $dompdf->stream('Konsultasi dan informasi sertifikasi halal, zakat dan wakaf');
                } elseif ($id_layanan == 26) {
                        $dompdf->stream('Permohonan Data Lembaga Agama dan Keagamaan, Rumah Ibadah, Peristiwa Nikah, Jumlah Guru , Haji');
                } elseif ($id_layanan == 27) {
                        $dompdf->stream('Permohonan Surat Ket Tambahan Penghasilan');
                }

                redirect('dashboard/list_permohonan_arsip');
        }
}
