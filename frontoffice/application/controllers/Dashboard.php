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

        //list permohonan proses Tim teknis
        public function list_permohonan_prosesTimTeknis()
        {
                $data_title['title'] = 'List Permohonan Proses Tim Teknis';
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

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

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['data_petugas_doa'] = $this->m_fo->data_petugas_doa($id_permohonan_ptsp)->result();
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 2) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                } elseif ($id_layanan == 3) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
                } elseif ($id_layanan == 4) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 7) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                } elseif ($id_layanan == 8) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                } elseif ($id_layanan == 9) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                } elseif ($id_layanan == 10) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                } elseif ($id_layanan == 11) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                } elseif ($id_layanan == 12) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                } elseif ($id_layanan == 13) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 16) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                } elseif ($id_layanan == 17) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 19) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
                } elseif ($id_layanan == 20) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                } elseif ($id_layanan == 21) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                } elseif ($id_layanan == 22) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                } elseif ($id_layanan == 23) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                } elseif ($id_layanan == 24) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                } elseif ($id_layanan == 26) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
                } elseif ($id_layanan == 27) {
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
                        'no_surat' => $this->input->post('no_surat')
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
                redirect('dashboard/detail_data_permohonan/' . $permohonan . '/25');
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
                redirect('dashboard/detail_data_permohonan/' . $permohonan . '/26');
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
                redirect('dashboard/detail_data_permohonan/' . $permohonan . '/27');
        }

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
                } elseif ($id_layanan == 2) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                } elseif ($id_layanan == 3) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 4) {
                        redirect('dashboard/list_permohonan_selesai');
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 7) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                } elseif ($id_layanan == 8) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                } elseif ($id_layanan == 9) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                } elseif ($id_layanan == 10) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                } elseif ($id_layanan == 11) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                } elseif ($id_layanan == 12) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                } elseif ($id_layanan == 13) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 16) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                } elseif ($id_layanan == 17) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 19) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
                } elseif ($id_layanan == 20) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                } elseif ($id_layanan == 21) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                } elseif ($id_layanan == 22) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                } elseif ($id_layanan == 23) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                } elseif ($id_layanan == 24) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                } elseif ($id_layanan == 26) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
                } elseif ($id_layanan == 27) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp27')->result();
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
                        $html = $this->load->view('frontoffice/ptsp15/cetak_ptsp15', $data_detail, true);
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
                $dompdf->setPaper('A4', 'portrait');
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
                        $dompdf->stream('Permohonan Rekomendasi Bantuan RA/Madrasah');
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
}
