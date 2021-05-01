<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_kasubag', 'm_kasubag');

                if (!$this->session->userdata('role_kasubag')) {
                        redirect('masuk');
                }
        }

        public function index()
        {
                $data_title['title'] = 'SIMANIS: Dashboard';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();

                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
                $data_permohonan['total_notif'] = $this->m_kasubag->jml_notif()->result();
                $data_permohonan['permohonan_selesaiKasubag'] = $this->m_kasubag->jml_permohonan_selesaiKasubag()->result();

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/dashboard', $data_permohonan);
                $this->load->view('footer');
        }
        //profil
        public function profil()
        {
                $data_title['title'] = 'Profil Saya';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();

                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
                $detailhere = array('id_kasubag' => $this->session->userdata('id_kasubag'));
                $data_detail['detail_profil_saya'] = $this->m_kasubag->get_detail_profil_saya($detailhere, 'kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/profil', $data_detail);
                $this->load->view('footer');
        }

        //ubah foto profil
        public function upload_foto_profil()
        {
                $id_kasubag = $this->session->userdata('id_kasubag');

                $config['upload_path']          = './../assets/dashboard/images/kasubag/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);

                if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {
                                $uploadData = $this->upload->data();

                                //Compres Foto
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = './../assets/dashboard/images/kasubag/profil/' . $uploadData['file_name'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['quality'] = '100%';
                                $config['width'] = 480;
                                $config['height'] = 640;
                                $config['new_image'] = './../assets/dashboard/images/kasubag/profil/' . $uploadData['file_name'];
                                $this->load->library('image_lib', $config);
                                $this->image_lib->resize();
                                $item = $this->db->where('id_kasubag', $id_kasubag)->get('kasubag')->row();

                                //replace foto lama 
                                if ($item->foto_profil_kasubag != "placeholder_profil.png") {
                                        $target_file = './../assets/dashboard/images/kasubag/profil/' . $item->foto_profil_kasubag;
                                        unlink($target_file);
                                }
                                $data['foto_profil_kasubag'] = $uploadData['file_name'];
                                $this->db->where('id_kasubag', $id_kasubag);
                                $this->db->update('kasubag', $data);
                        }
                }
                $this->session->set_flashdata('success', 'diubah');
                redirect('dashboard/profil');
        }

        //menampilkan halaman form ubah kata sandi
        public function form_ubahsandi()
        {
                $data_title['title'] = 'Ubah Kata Sandi Saya';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();

                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/ubahsandi');
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

                $where = $this->session->userdata('id_kasubag');

                $fo = $this->m_kasubag->get_kasubag($where);

                if ($konfirmasi === $kata_sandi_baru) {
                        if ($data_lama === $fo['kata_sandi']) {
                                $this->m_kasubag->update_sandi($where, $data_baru, 'kasubag');
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


        //list data permohonan masuk
        public function list_permohonan_masuk()
        {
                $data_title['title'] = 'List Permohonan Masuk';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();

                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
                $data_detail['data_permohonan'] = $this->m_kasubag->get_list_data_permohonan('Proses Kasubag')->result();

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/list_permohonan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list data permohonan yang teralh disetujui
        public function list_permohonan_selesaiKasubag()
        {
                $data_title['title'] = 'List Permohonan Selesai Kasubag';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();

                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
                $data_detail['data_permohonan'] = $this->m_kasubag->get_list_data_permohonan_selesaiKasubag()->result();

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/list_permohonan_selesaiKasubag', $data_detail);
                $this->load->view('footer');
        }

        //menampilkan detail data permohonan dari list permohonan
        public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
        {
                $data_title['title'] = 'Detail Permohonan';
                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();
                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();

                $data_detail['detail_permohonan'] = $this->m_kasubag->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

                if ($id_layanan == 1) {
                        $data_detail['data_petugas_doa'] = $this->m_kasubag->data_petugas_doa($id_permohonan_ptsp)->result();
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
                } elseif ($id_layanan == 2) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp02')->result();
                } elseif ($id_layanan == 3) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
                } elseif ($id_layanan == 4) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
                } elseif ($id_layanan == 5) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
                } elseif ($id_layanan == 6) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
                } elseif ($id_layanan == 7) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
                } elseif ($id_layanan == 8) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
                } elseif ($id_layanan == 9) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
                } elseif ($id_layanan == 10) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
                } elseif ($id_layanan == 11) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
                } elseif ($id_layanan == 12) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
                } elseif ($id_layanan == 13) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
                } elseif ($id_layanan == 14) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
                } elseif ($id_layanan == 15) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
                } elseif ($id_layanan == 16) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
                } elseif ($id_layanan == 17) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
                } elseif ($id_layanan == 18) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
                } elseif ($id_layanan == 19) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
                } elseif ($id_layanan == 20) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
                } elseif ($id_layanan == 21) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
                } elseif ($id_layanan == 22) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
                } elseif ($id_layanan == 23) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
                } elseif ($id_layanan == 24) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
                } elseif ($id_layanan == 25) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
                } elseif ($id_layanan == 26) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
                } elseif ($id_layanan == 27) {
                        $data_detail['detail_ptsp'] = $this->m_kasubag->get_detail_ptsp($id_permohonan_ptsp, 'ptsp27')->result();
                }

                $this->load->view('header', $data_title);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                if ($id_layanan == 1) {
                        $this->load->view('kasubag/ptsp1/detail_ptsp01', $data_detail);
                } elseif ($id_layanan == 2) {
                        $this->load->view('kasubag/ptsp2/detail_ptsp02', $data_detail);
                } elseif ($id_layanan == 3) {
                        $this->load->view('kasubag/ptsp3/detail_ptsp03', $data_detail);
                } elseif ($id_layanan == 4) {
                        $this->load->view('kasubag/ptsp4/detail_ptsp04', $data_detail);
                } elseif ($id_layanan == 5) {
                        $this->load->view('kasubag/ptsp5/detail_ptsp05', $data_detail);
                } elseif ($id_layanan == 6) {
                        $this->load->view('kasubag/ptsp6/detail_ptsp06', $data_detail);
                } elseif ($id_layanan == 7) {
                        $this->load->view('kasubag/ptsp7/detail_ptsp07', $data_detail);
                } elseif ($id_layanan == 8) {
                        $this->load->view('kasubag/ptsp8/detail_ptsp08', $data_detail);
                } elseif ($id_layanan == 9) {
                        $this->load->view('kasubag/ptsp9/detail_ptsp09', $data_detail);
                } elseif ($id_layanan == 10) {
                        $this->load->view('kasubag/ptsp10/detail_ptsp10', $data_detail);
                } elseif ($id_layanan == 11) {
                        $this->load->view('kasubag/ptsp11/detail_ptsp11', $data_detail);
                } elseif ($id_layanan == 12) {
                        $this->load->view('kasubag/ptsp12/detail_ptsp12', $data_detail);
                } elseif ($id_layanan == 13) {
                        $this->load->view('kasubag/ptsp13/detail_ptsp13', $data_detail);
                } elseif ($id_layanan == 14) {
                        $this->load->view('kasubag/ptsp14/detail_ptsp14', $data_detail);
                } elseif ($id_layanan == 15) {
                        $this->load->view('kasubag/ptsp15/detail_ptsp15', $data_detail);
                } elseif ($id_layanan == 16) {
                        $this->load->view('kasubag/ptsp16/detail_ptsp16', $data_detail);
                } elseif ($id_layanan == 17) {
                        $this->load->view('kasubag/ptsp17/detail_ptsp17', $data_detail);
                } elseif ($id_layanan == 18) {
                        $this->load->view('kasubag/ptsp18/detail_ptsp18', $data_detail);
                } elseif ($id_layanan == 19) {
                        $this->load->view('kasubag/ptsp19/detail_ptsp19', $data_detail);
                } elseif ($id_layanan == 20) {
                        $this->load->view('kasubag/ptsp20/detail_ptsp20', $data_detail);
                } elseif ($id_layanan == 21) {
                        $this->load->view('kasubag/ptsp21/detail_ptsp21', $data_detail);
                } elseif ($id_layanan == 22) {
                        $this->load->view('kasubag/ptsp22/detail_ptsp22', $data_detail);
                } elseif ($id_layanan == 23) {
                        $this->load->view('kasubag/ptsp23/detail_ptsp23', $data_detail);
                } elseif ($id_layanan == 24) {
                        $this->load->view('kasubag/ptsp24/detail_ptsp24', $data_detail);
                } elseif ($id_layanan == 25) {
                        $this->load->view('kasubag/ptsp25/detail_ptsp25', $data_detail);
                } elseif ($id_layanan == 26) {
                        $this->load->view('kasubag/ptsp26/detail_ptsp26', $data_detail);
                } elseif ($id_layanan == 27) {
                        $this->load->view('kasubag/ptsp27/detail_ptsp27', $data_detail);
                }
                $this->load->view('footer');
        }

        //update status permohonan menjadi selesai
        public function aksi_setujui_permohonan($id_permohonan_ptsp)
        {
                $data = array(
                        'id_kasubag' => $this->session->userdata('id_kasubag'),
                        'notif_pemohon' => 'Belum Dibaca',
                        'status' => 'Selesai',
                        'tgl_persetujuan_kasubag' => date("Y/m/d")
                );
                $permohonan = $this->m_kasubag->get_data_permohonan_ptsp($id_permohonan_ptsp);
                $email = $this->m_kasubag->get_data_pemohon($permohonan->id_pemohon);
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

                $this->m_kasubag->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

                $this->session->set_flashdata('success', 'permohonan sukses disetujui');
                redirect('dashboard/list_permohonan_selesaiKasubag');
        }

        //aksi tolak
        //tampil form tolak permohonan
        public function form_input_keterangan($id_permohonan_ptsp)
        {
                $data_title['title'] = 'Form Keterangan Revisi Permohonan';

                $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
                $this->session->userdata('id_kasubag')])->row_array();
                $data['total_notif'] = $this->m_kasubag->jml_notif()->result();

                $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
                $id_permohonan_ptsp])->row_array();

                $this->load->view('header', $data_detail);
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar', $data);
                $this->load->view('kasubag/form_input_keterangan', $data_detail);
                $this->load->view('footer');
        }

        //aksi tolak permohonan
        public function kirim_alasn_permohonan()
        {
                $data = array(
                        'id_kasubag' => $this->session->userdata('id_kasubag'),
                        'keterangan' => $this->input->post('keterangan'),
                        'notif_pemohon' => 'Belum Dibaca',
                        'status' => 'Pending',
                        'tgl_persetujuan_kasubag' => date("Y/m/d")
                );

                $detailhere = $this->input->post('id_permohonan_ptsp');

                $email = $this->m_kasubag->get_data_pemohon($this->input->post('id_pemohon'));
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

                $this->m_kasubag->update_status_permohonan($detailhere, $data, 'permohonan_ptsp');

                if ($this->m_kasubag->update_status_permohonan($detailhere, $data, 'permohonan_ptsp')); {
                        $this->session->set_flashdata('success', 'ditolak');
                        redirect('dashboard/list_permohonan_pending');
                }
        }
}
