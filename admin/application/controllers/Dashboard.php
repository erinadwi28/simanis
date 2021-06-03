<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_admin', 'm_admin');

                if (!$this->session->userdata('role')) {
                        redirect('masuk');
                }
        }

        public function index()
        {
                $data_title['title'] = 'SIMELATI: Dashboard';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();
                $data_user['pemohon'] = $this->m_admin->get_list_data_pemohon()->num_rows();
                $data_user['fo'] = $this->m_admin->get_list_data_fo()->num_rows();
                $data_user['bo'] = $this->m_admin->get_list_data_bo()->num_rows();
                $data_user['kasi'] = $this->m_admin->get_list_data_kasi()->num_rows();
                $data_user['kasubag'] = $this->m_admin->get_list_data_kasubag()->num_rows();
                $data_user['kepala'] = $this->m_admin->get_list_data_kepala()->num_rows();
                $data_user['timteknis'] = $this->m_admin->get_list_data_timteknis()->num_rows();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar', $data);
                $this->load->view('topbar', $data);
                $this->load->view('admin/dashboard', $data_user);
                $this->load->view('footer');
        }

        public function profil()
        {
                $data_title['title'] = 'Profil Saya';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $detailhere = array('id_admin' => $this->session->userdata('id_admin'));
                $data_detail['detail_profil_saya'] = $this->m_admin->get_detail_profil_saya($detailhere, 'admin')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/profil', $data_detail);
                $this->load->view('footer');
        }

        //ubah foto profil
        public function upload_foto_profil()
        {
                $id_admin = $this->session->userdata('id_admin');

                $config['upload_path']          = '../assets/dashboard/images/admin/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/admin/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/admin/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_admin', $id_admin)->get('admin')->row();

                                //replace foto lama 
                                if ($item->foto_profil != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/admin/profil/' . $item->foto_profil;
                                        unlink($target_file);
                                }

                                $data['foto_profil'] = $uploadData['file_name'];

                                $this->db->where('id_admin', $id_admin);
                                $this->db->update('admin', $data);
                        }
                }

                $this->session->set_flashdata('success', 'diubah');
                redirect('dashboard/profil');
        }

        //menampilkan halaman form ubah kata sandi
        public function form_ubahsandi()
        {
                $data_title['title'] = 'Ubah Kata Sandi Saya';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $detailhere = array('id_admin' => $this->session->userdata('id_admin'));
                $data_detail['detail_profil_saya'] = $this->m_admin->get_detail_profil_saya($detailhere, 'admin')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/ubahsandi', $data_detail);
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

                $where = $this->session->userdata('id_admin');

                $admin = $this->m_admin->get_admin($where);

                if ($konfirmasi === $kata_sandi_baru) {
                        if ($data_lama === $admin['kata_sandi']) {
                                $this->m_admin->update_sandi($where, $data_baru, 'admin');
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
        public function list_data_pemohon()
        {
                $data_title['title'] = 'List Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_pemohon()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/list_pemohon', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_pemohon_non_aktif()
        {
                $data_title['title'] = 'List Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_pemohon_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/list_pemohon_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data pemohon
        public function detail_data_pemohon($id_pemohon)
        {
                $data_title['title'] = 'Detail Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_pemohon'] = $this->m_admin->get_data_pemohon($id_pemohon, 'pemohon')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data pemohon
        public function tambah_data_pemohon()
        {
                $data_title['title'] = 'Detail Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah pemohon
        public function aksi_tambah_pemohon()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_pemohon = array(
                        'nik' => $this->input->post('nik'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'foto_profil_pemohon' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_pemohon($data_pemohon, 'pemohon');
                $this->session->set_flashdata('success', 'Pemohon berhasil ditambah');
                redirect('dashboard/list_pemohon/');
        }
        //menampilkan detail data pemohon
        public function ubah_sandi_pemohon($id_pemohon)
        {
                $data_title['title'] = 'Detail Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_pemohon'] = $this->m_admin->get_data_pemohon($id_pemohon, 'pemohon')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi pemohon
        public function aksi_ubah_sandi_pemohon($id_pemohon)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_pemohon($id_pemohon, $data_baru, 'pemohon');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_pemohon/' . $id_pemohon);
        }
        // aksi delete pemohon
        public function aksi_hapus_pemohon($id_pemohon)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_pemohon($id_pemohon, $data_baru, 'pemohon');
                $this->session->set_flashdata('success', '<b>User Pemohon</b> Berhasil Dihapus');
                redirect('dashboard/list_data_pemohon/');
        }
        //menampilkan detail data pemohon
        public function ubah_pemohon($id_pemohon)
        {
                $data_title['title'] = 'Detail Pemohon';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_pemohon'] = $this->m_admin->get_data_pemohon($id_pemohon, 'pemohon')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/pemohon/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_pemohon($id_pemohon)
        {

                $config['upload_path']          = '../assets/dashboard/images/pemohon/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/pemohon/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/pemohon/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_pemohon', $id_pemohon)->get('pemohon')->row();

                                //replace foto lama 
                                if ($item->foto_profil_pemohon != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/pemohon/profil/' . $item->foto_profil_pemohon;
                                        unlink($target_file);
                                }

                                $data['foto_profil_pemohon'] = $uploadData['file_name'];

                                $this->db->where('id_pemohon', $id_pemohon);
                                $this->db->update('pemohon', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update pemohon
        public function aksi_update_pemohon($id_pemohon)
        {
                $data_pemohon = array(
                        'nik' => $this->input->post('nik'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_pemohon($id_pemohon, $data_pemohon, 'pemohon');
                $this->session->set_flashdata('success', 'Data Pemohon berhasil diperbarui');
                redirect('dashboard/detail_data_pemohon/' . $id_pemohon);
        }

        //list fo
        public function list_data_fo()
        {
                $data_title['title'] = 'List Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_fo()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/list_fo', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_fo_non_aktif()
        {
                $data_title['title'] = 'List Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_fo_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/list_fo_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data fo
        public function detail_data_fo($id_fo)
        {
                $data_title['title'] = 'Detail Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_fo'] = $this->m_admin->get_data_fo($id_fo, 'fo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data fo
        public function tambah_data_fo()
        {
                $data_title['title'] = 'Detail Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah fo
        public function aksi_tambah_fo()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_fo = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'sie' => $this->input->post('sie'),
                        'foto_profil_fo' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_fo($data_fo, 'fo');
                $this->session->set_flashdata('success', 'Front Office berhasil ditambah');
                redirect('dashboard/list_fo/');
        }
        //menampilkan detail data fo
        public function ubah_sandi_fo($id_fo)
        {
                $data_title['title'] = 'Ubah Sandi Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_fo'] = $this->m_admin->get_data_fo($id_fo, 'fo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi fo
        public function aksi_ubah_sandi_fo($id_fo)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_fo($id_fo, $data_baru, 'fo');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_fo/' . $id_fo);
        }
        // aksi delete fo
        public function aksi_hapus_fo($id_fo)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_fo($id_fo, $data_baru, 'fo');
                $this->session->set_flashdata('success', '<b>User Front Office</b> Berhasil Dihapus');
                redirect('dashboard/list_data_fo/');
        }
        //menampilkan detail data fo
        public function ubah_fo($id_fo)
        {
                $data_title['title'] = 'Ubah Front Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_fo'] = $this->m_admin->get_data_fo($id_fo, 'fo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/frontoffice/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_fo($id_fo)
        {

                $config['upload_path']          = '../assets/dashboard/images/frontoffice/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/frontoffice/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/frontoffice/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_fo', $id_fo)->get('fo')->row();

                                //replace foto lama 
                                if ($item->foto_profil_fo != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/frontoffice/profil/' . $item->foto_profil_fo;
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
        // aksi update fo
        public function aksi_update_fo($id_fo)
        {
                $data_fo = array(
                        'sie' => $this->input->post('sie'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_fo($id_fo, $data_fo, 'fo');
                $this->session->set_flashdata('success', 'Data Front Office berhasil diperbarui');
                redirect('dashboard/detail_data_fo/' . $id_fo);
        }

        //list bo
        public function list_data_bo()
        {
                $data_title['title'] = 'List Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_bo()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/list_bo', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_bo_non_aktif()
        {
                $data_title['title'] = 'List Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_bo_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/list_bo_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data bo
        public function detail_data_bo($id_bo)
        {
                $data_title['title'] = 'Detail Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_bo'] = $this->m_admin->get_data_bo($id_bo, 'bo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data bo
        public function tambah_data_bo()
        {
                $data_title['title'] = 'Detail Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah bo
        public function aksi_tambah_bo()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_bo = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'sie' => $this->input->post('sie'),
                        'foto_profil_bo' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_bo($data_bo, 'bo');
                $this->session->set_flashdata('success', 'Back Office berhasil ditambah');
                redirect('dashboard/list_bo/');
        }
        //menampilkan detail data bo
        public function ubah_sandi_bo($id_bo)
        {
                $data_title['title'] = 'Ubah Sandi Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_bo'] = $this->m_admin->get_data_bo($id_bo, 'bo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi bo
        public function aksi_ubah_sandi_bo($id_bo)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_bo($id_bo, $data_baru, 'bo');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_bo/' . $id_bo);
        }
        // aksi delete bo
        public function aksi_hapus_bo($id_bo)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_bo($id_bo, $data_baru, 'bo');
                $this->session->set_flashdata('success', '<b>User Back Office</b> Berhasil Dihapus');
                redirect('dashboard/list_data_bo/');
        }
        //menampilkan detail data bo
        public function ubah_bo($id_bo)
        {
                $data_title['title'] = 'Ubah Back Office';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_bo'] = $this->m_admin->get_data_bo($id_bo, 'bo')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/backoffice/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_bo($id_bo)
        {

                $config['upload_path']          = '../assets/dashboard/images/backoffice/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/backoffice/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/backoffice/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_bo', $id_bo)->get('bo')->row();

                                //replace foto lama 
                                if ($item->foto_profil_bo != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/backoffice/profil/' . $item->foto_profil_bo;
                                        unlink($target_file);
                                }

                                $data['foto_profil_bo'] = $uploadData['file_name'];

                                $this->db->where('id_bo', $id_bo);
                                $this->db->update('bo', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update bo
        public function aksi_update_bo($id_bo)
        {
                $data_bo = array(
                        'sie' => $this->input->post('sie'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_bo($id_bo, $data_bo, 'bo');
                $this->session->set_flashdata('success', 'Data Back Office berhasil diperbarui');
                redirect('dashboard/detail_data_bo/' . $id_bo);
        }
        //list kasi
        public function list_data_kasi()
        {
                $data_title['title'] = 'List Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kasi()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/list_kasi', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_kasi_non_aktif()
        {
                $data_title['title'] = 'List Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kasi_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/list_kasi_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data kasi
        public function detail_data_kasi($id_kasi)
        {
                $data_title['title'] = 'Detail Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasi'] = $this->m_admin->get_data_kasi($id_kasi, 'kasi')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data kasi
        public function tambah_data_kasi()
        {
                $data_title['title'] = 'Detail Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah kasi
        public function aksi_tambah_kasi()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_kasi = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'sie' => $this->input->post('sie'),
                        'foto_profil_kasi' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_kasi($data_kasi, 'kasi');
                $this->session->set_flashdata('success', 'Kasi berhasil ditambah');
                redirect('dashboard/list_kasi/');
        }
        //menampilkan detail data kasi
        public function ubah_sandi_kasi($id_kasi)
        {
                $data_title['title'] = 'Ubah Sandi Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasi'] = $this->m_admin->get_data_kasi($id_kasi, 'kasi')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi kasi
        public function aksi_ubah_sandi_kasi($id_kasi)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_kasi($id_kasi, $data_baru, 'kasi');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_kasi/' . $id_kasi);
        }
        // aksi delete kasi
        public function aksi_hapus_kasi($id_kasi)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_kasi($id_kasi, $data_baru, 'kasi');
                $this->session->set_flashdata('success', '<b>User Kasi</b> Berhasil Dihapus');
                redirect('dashboard/list_data_kasi/');
        }
        //menampilkan detail data kasi
        public function ubah_kasi($id_kasi)
        {
                $data_title['title'] = 'Ubah Kasi';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasi'] = $this->m_admin->get_data_kasi($id_kasi, 'kasi')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasi/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_kasi($id_kasi)
        {

                $config['upload_path']          = '../assets/dashboard/images/kasi/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/kasi/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/kasi/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_kasi', $id_kasi)->get('kasi')->row();

                                //replace foto lama 
                                if ($item->foto_profil_kasi != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/kasi/profil/' . $item->foto_profil_kasi;
                                        unlink($target_file);
                                }

                                $data['foto_profil_kasi'] = $uploadData['file_name'];

                                $this->db->where('id_kasi', $id_kasi);
                                $this->db->update('kasi', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update kasi
        public function aksi_update_kasi($id_kasi)
        {
                $data_kasi = array(
                        'sie' => $this->input->post('sie'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_kasi($id_kasi, $data_kasi, 'kasi');
                $this->session->set_flashdata('success', 'Data Kasi berhasil diperbarui');
                redirect('dashboard/detail_data_kasi/' . $id_kasi);
        }
        //list kasubag
        public function list_data_kasubag()
        {
                $data_title['title'] = 'List Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kasubag()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/list_kasubag', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_kasubag_non_aktif()
        {
                $data_title['title'] = 'List Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kasubag_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/list_kasubag_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data kasubag
        public function detail_data_kasubag($id_kasubag)
        {
                $data_title['title'] = 'Detail Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasubag'] = $this->m_admin->get_data_kasubag($id_kasubag, 'kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data kasubag
        public function tambah_data_kasubag()
        {
                $data_title['title'] = 'Detail Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah kasubag
        public function aksi_tambah_kasubag()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_kasubag = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'foto_profil_kasubag' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_kasubag($data_kasubag, 'kasubag');
                $this->session->set_flashdata('success', 'Kasubag berhasil ditambah');
                redirect('dashboard/list_kasubag/');
        }
        //menampilkan detail data kasubag
        public function ubah_sandi_kasubag($id_kasubag)
        {
                $data_title['title'] = 'Ubah Sandi Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasubag'] = $this->m_admin->get_data_kasubag($id_kasubag, 'kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi kasubag
        public function aksi_ubah_sandi_kasubag($id_kasubag)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_kasubag($id_kasubag, $data_baru, 'kasubag');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_kasubag/' . $id_kasubag);
        }
        // aksi delete kasubag
        public function aksi_hapus_kasubag($id_kasubag)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_kasubag($id_kasubag, $data_baru, 'kasubag');
                $this->session->set_flashdata('success', '<b>User Kasubag</b> Berhasil Dihapus');
                redirect('dashboard/list_data_kasubag/');
        }
        //menampilkan detail data kasubag
        public function ubah_kasubag($id_kasubag)
        {
                $data_title['title'] = 'Ubah Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kasubag'] = $this->m_admin->get_data_kasubag($id_kasubag, 'kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kasubag/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_kasubag($id_kasubag)
        {

                $config['upload_path']          = '../assets/dashboard/images/kasubag/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/kasubag/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/kasubag/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_kasubag', $id_kasubag)->get('kasubag')->row();

                                //replace foto lama 
                                if ($item->foto_profil_kasubag != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/kasubag/profil/' . $item->foto_profil_kasubag;
                                        unlink($target_file);
                                }

                                $data['foto_profil_kasubag'] = $uploadData['file_name'];

                                $this->db->where('id_kasubag', $id_kasubag);
                                $this->db->update('kasubag', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update kasubag
        public function aksi_update_kasubag($id_kasubag)
        {
                $data_kasubag = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_kasubag($id_kasubag, $data_kasubag, 'kasubag');
                $this->session->set_flashdata('success', 'Data Kasubag berhasil diperbarui');
                redirect('dashboard/detail_data_kasubag/' . $id_kasubag);
        }
        //list kepala
        public function list_data_kepala()
        {
                $data_title['title'] = 'List Kepala';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kepala()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/list_kepala', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_kepala_non_aktif()
        {
                $data_title['title'] = 'List Kepala';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_kepala_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/list_kepala_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data kepala
        public function detail_data_kepala($id_kepala)
        {
                $data_title['title'] = 'Detail Kepala';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kepala'] = $this->m_admin->get_data_kepala($id_kepala, 'kepala')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data kepala
        public function tambah_data_kepala()
        {
                $data_title['title'] = 'Detail Kepala';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah kepala
        public function aksi_tambah_kepala()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_kepala = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'nip' => $this->input->post('nip'),
                        'foto_profil_kepala' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_kepala($data_kepala, 'kepala');
                $this->session->set_flashdata('success', 'Kepala berhasil ditambah');
                redirect('dashboard/list_kepala/');
        }
        //menampilkan detail data kepala
        public function ubah_sandi_kepala($id_kepala)
        {
                $data_title['title'] = 'Ubah Sandi Kepala';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kepala'] = $this->m_admin->get_data_kepala($id_kepala, 'kepala')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi kepala
        public function aksi_ubah_sandi_kepala($id_kepala)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_kepala($id_kepala, $data_baru, 'kepala');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_kepala/' . $id_kepala);
        }
        // aksi delete kepala
        public function aksi_hapus_kepala($id_kepala)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_kepala($id_kepala, $data_baru, 'kepala');
                $this->session->set_flashdata('success', '<b>User Kepala</b> Berhasil Dihapus');
                redirect('dashboard/list_data_kepala/');
        }
        //menampilkan detail data kepala
        public function ubah_kepala($id_kepala)
        {
                $data_title['title'] = 'Ubah Kasubag';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_kepala'] = $this->m_admin->get_data_kepala($id_kepala, 'kepala')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/kepala/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_kepala($id_kepala)
        {

                $config['upload_path']          = '../assets/dashboard/images/kepala/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/kepala/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/kepala/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_kepala', $id_kepala)->get('kepala')->row();

                                //replace foto lama 
                                if ($item->foto_profil_kepala != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/kepala/profil/' . $item->foto_profil_kepala;
                                        unlink($target_file);
                                }

                                $data['foto_profil_kepala'] = $uploadData['file_name'];

                                $this->db->where('id_kepala', $id_kepala);
                                $this->db->update('kepala', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update kepala
        public function aksi_update_kepala($id_kepala)
        {
                $data_kepala = array(
                        'nip' => $this->input->post('nip'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_kepala($id_kepala, $data_kepala, 'kepala');
                $this->session->set_flashdata('success', 'Data Kepala berhasil diperbarui');
                redirect('dashboard/detail_data_kepala/' . $id_kepala);
        }
        //list timteknis
        public function list_data_timteknis()
        {
                $data_title['title'] = 'List Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_timteknis()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/list_timteknis', $data_detail);
                $this->load->view('footer');
        }

        public function list_data_timteknis_non_aktif()
        {
                $data_title['title'] = 'List Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['data_user'] = $this->m_admin->get_list_data_timteknis_non_aktif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/list_timteknis_non_aktif', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data timteknis
        public function detail_data_timteknis($id_tim_teknis)
        {
                $data_title['title'] = 'Detail Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_timteknis'] = $this->m_admin->get_data_timteknis($id_tim_teknis, 'tim_teknis')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/detail', $data_detail);
                $this->load->view('footer');
        }
        //menampilkan detail data Tim teknis
        public function tambah_data_timteknis()
        {
                $data_title['title'] = 'Detail Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/form_tambah');
                $this->load->view('footer');
        }
        // aksi tambah tim teknis
        public function aksi_tambah_timteknis()
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_timteknis = array(
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'sie' => $this->input->post('sie'),
                        'foto_profil_tim_teknis' => 'placeholder_profil.png',
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->tambah_timteknis($data_timteknis, 'tim_teknis');
                $this->session->set_flashdata('success', 'Tim Teknis berhasil ditambah');
                redirect('dashboard/list_timteknis/');
        }
        //menampilkan detail data timteknis
        public function ubah_sandi_timteknis($id_tim_teknis)
        {
                $data_title['title'] = 'Ubah Sandi Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_timteknis'] = $this->m_admin->get_data_timteknis($id_tim_teknis, 'tim_teknis')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/form_ubah_sandi', $data_detail);
                $this->load->view('footer');
        }
        // aksi ubah sandi tim teknis
        public function aksi_ubah_sandi_timteknis($id_tim_teknis)
        {
                $kata_sandi = $this->input->post('kata_sandi');
                $kata_sandi_hash = sha1($kata_sandi);

                $data_baru = array(
                        'kata_sandi' => $kata_sandi_hash,
                );

                $this->m_admin->update_sandi_timteknis($id_tim_teknis, $data_baru, 'tim_teknis');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/detail_data_timteknis/' . $id_tim_teknis);
        }
        // aksi delete tim teknis
        public function aksi_hapus_timteknis($id_tim_teknis)
        {
                $data_baru = array(
                        'status_delete' => 1,
                );

                $this->m_admin->hapus_timteknis($id_tim_teknis, $data_baru, 'tim_teknis');
                $this->session->set_flashdata('success', '<b>User Tim Teknis</b> Berhasil Dihapus');
                redirect('dashboard/list_data_timteknis/');
        }
        //menampilkan detail data timteknis
        public function ubah_timteknis($id_tim_teknis)
        {
                $data_title['title'] = 'Ubah Tim Teknis';
                $data['admin'] = $this->db->get_where('admin', ['id_admin' =>
                $this->session->userdata('id_admin')])->row_array();
                $data['total_notif'] = $this->m_admin->jml_notif()->result();

                $data_detail['detail_timteknis'] = $this->m_admin->get_data_timteknis($id_tim_teknis, 'tim_teknis')->result();

                $this->load->view('header', $data_title);
                $this->load->view('admin/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('admin/timteknis/form_ubah', $data_detail);
                $this->load->view('footer');
        }
        //ubah foto profil
        public function upload_foto_profil_timteknis($id_tim_teknis)
        {

                $config['upload_path']          = '../assets/dashboard/images/timteknis/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = '../assets/dashboard/images/timteknis/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = '../assets/dashboard/images/timteknis/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_tim_teknis', $id_tim_teknis)->get('tim_teknis')->row();

                                //replace foto lama 
                                if ($item->foto_profil_tim_teknis != "placeholder_profil.png") {
                                        $target_file = '../assets/dashboard/images/timteknis/profil/' . $item->foto_profil_tim_teknis;
                                        unlink($target_file);
                                }

                                $data['foto_profil_fo'] = $uploadData['file_name'];

                                $this->db->where('id_tim_teknis', $id_tim_teknis);
                                $this->db->update('tim_teknis', $data);
                        }
                }
                $url = $_SERVER['HTTP_REFERER'];
                $this->session->set_flashdata('success', 'diubah');
                redirect($url);
        }
        // aksi update timteknis
        public function aksi_update_timteknis($id_tim_teknis)
        {
                $data_timteknis = array(
                        'sie' => $this->input->post('sie'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                );

                $this->m_admin->update_timteknis($id_tim_teknis, $data_timteknis, 'tim_teknis');
                $this->session->set_flashdata('success', 'Data Tim Teknis berhasil diperbarui');
                redirect('dashboard/detail_data_timteknis/' . $id_tim_teknis);
        }
}
