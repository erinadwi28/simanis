<?php
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
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_validasi_kemenag'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_pending'] = $this->m_fo->jml_permohonan_pending()->result();
                $data_permohonan['permohonan_selesai'] = $this->m_fo->jml_permohonan_selesai()->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/dashboard_fo', $data_permohonan);
                $this->load->view('footer');
        }

        public function profil_fo()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/profil_fo', $data_detail);
                $this->load->view('footer');
        }

        //ubah foto profil
        public function upload_foto_profil()
        {

                $id_fo = $this->session->userdata('id_fo');

                $config['upload_path']          = './../assets/frontoffice/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);
                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {

                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = './../assets/frontoffice/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;

                                $config['new_image'] = './../assets/frontoffice/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();

                                $item = $this->db->where('id_fo', $id_fo)->get('fo')->row();

                                //replace foto lama 
                                if ($item->foto_profil_fo != "placeholder_profil.png") {
                                        $target_file = './../assets/frontoffice/profil/' . $item->foto_profil_fo;
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

        //list permohonan masuk
        public function list_permohonan_masuk()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Validasi Kemenag')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan pending
        public function list_permohonan_pending()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Pending')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_pending', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan selesai
        public function list_permohonan_selesai()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['data_permohonan'] = $this->m_fo->get_list_data_permohonan('Selesai')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_selesai', $data_detail);
                $this->load->view('footer');
        }

        //detail data permohonan
        public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['detail_permohonan'] = $this->m_fo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp01($id_permohonan_ptsp)->result();
                } elseif ($id_layanan == 3) {
                        $data_detail['detail_ptsp'] = $this->m_fo->get_detail_ptsp03($id_permohonan_ptsp)->result();
                }

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('frontoffice/ptsp1/detail_ptsp01', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                }
                $this->load->view('footer');
        }

        //tampil detail
        public function detail_ptsp03()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                $this->load->view('footer');
        }

        //update status permohonan

        //aksi setujui
        public function aksi_setujui_permohonan($id_permohonan_ptsp)
        {
                $data = array(
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
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan bahwasannya permohonan <b>Legalisir Ijazah</b> anda telah <b>disetujui</b>, dan sudah bisa diambil di Kantor Kementrian Agama Kabupaten Klaten yang berada di JL.Ronggowarsito Klaten<br><br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

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
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
                $id_permohonan_ptsp])->row_array();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo');
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/form_input_keterangan', $data_detail);
                $this->load->view('footer');
        }

        //aksi tolak permohonan
        public function kirim_alasn_permohonan()
        {
                $data = array(
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
                $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan kepada pemohon bahwasannya permohonan <b>Legalisir Ijazah</b> anda dipending dikarenakan ' . $this->input->post('keterangan') . ', mohon pemberitahuan ini untuk segera ditindak lanjuti. <br>Terimakasih<br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

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
}
