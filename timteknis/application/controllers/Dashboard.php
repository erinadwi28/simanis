<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tim_teknis', 'm_tim_teknis');

        if (!$this->session->userdata('role_tim_teknis')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();
        $data_permohonan['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();
        $data_permohonan['permohonan_selesai_tim_teknis'] = $this->m_tim_teknis->permohonan_selesai_tim_teknis($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();
        $detailhere = array('id_tim_teknis' => $this->session->userdata('id_tim_teknis'));
        $data_detail['detail_profil_saya'] = $this->m_tim_teknis->get_detail_profil_saya($detailhere, 'tim_teknis')->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_tim_teknis = $this->session->userdata('id_tim_teknis');

        $config['upload_path']          = './../assets/dashboard/images/timteknis/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/dashboard/images/timteknis/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/dashboard/images/timteknis/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_tim_teknis', $id_tim_teknis)->get('tim_teknis')->row();

                //replace foto lama 
                if ($item->foto_profil_tim_teknis != "placeholder_profil.png") {
                    $target_file = './../assets/dashboard/images/timteknis/profil/' . $item->foto_profil_tim_teknis;
                    unlink($target_file);
                }
                $data['foto_profil_tim_teknis'] = $uploadData['file_name'];
                $this->db->where('id_tim_teknis', $id_tim_teknis);
                $this->db->update('tim_teknis', $data);
            }
        }
        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ubahsandi');
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

        $where = $this->session->userdata('id_tim_teknis');

        $fo = $this->m_tim_teknis->get_tim_teknis($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_tim_teknis->update_sandi($where, $data_baru, 'tim_teknis');
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
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_tim_teknis->get_list_data_permohonan('Proses Tim Teknis', $sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan masuk
    public function list_permohonan_pending()
    {
        $data_title['title'] = 'List Permohonan Pending';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_tim_teknis->get_list_data_permohonan('Pending', $sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui
    public function list_permohonan_selesai_tim_teknis()
    {
        $data_title['title'] = 'List Permohonan Selesai Tim Teknis';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_tim_teknis->get_list_data_permohonan_selesai_tim_teknis($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/list_permohonan_selesai_tim_teknis', $data_detail);
        $this->load->view('footer');
    }

    //menampilkan detail data permohonan dari list permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $data_detail['detail_permohonan'] = $this->m_tim_teknis->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

        if ($id_layanan == 7) {
            $data_detail['detail_ptsp'] = $this->m_tim_teknis->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
        } elseif ($id_layanan == 8) {
            $data_detail['detail_ptsp'] = $this->m_tim_teknis->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
        } elseif ($id_layanan == 9) {
            $data_detail['detail_ptsp'] = $this->m_tim_teknis->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
        } elseif ($id_layanan == 10) {
            $data_detail['detail_ptsp'] = $this->m_tim_teknis->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
        } elseif ($id_layanan == 18) {
            $data_detail['detail_ptsp'] = $this->m_tim_teknis->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
        }

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        if ($id_layanan == 7) {
            $this->load->view('timteknis/ptsp7/detail_ptsp07', $data_detail);
        } elseif ($id_layanan == 8) {
            $this->load->view('timteknis/ptsp8/detail_ptsp08', $data_detail);
        } elseif ($id_layanan == 9) {
            $this->load->view('timteknis/ptsp9/detail_ptsp09', $data_detail);
        } elseif ($id_layanan == 10) {
            $this->load->view('timteknis/ptsp10/detail_ptsp10', $data_detail);
        } elseif ($id_layanan == 18) {
            $this->load->view('timteknis/ptsp18/detail_ptsp18', $data_detail);
        }
        $this->load->view('footer');
    }

    //tampil form tolak permohonan
    public function form_input_keterangan($id_permohonan_ptsp)
    {
        $data_title['title'] = 'Form Keterangan Pending';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
        $id_permohonan_ptsp])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/form_input_keterangan', $data_detail);
        $this->load->view('footer');
    }

    //aksi tolak permohonan
    public function kirim_alasn_permohonan()
    {
        $data = array(
            'id_tim_teknis' => $this->session->userdata('id_tim_teknis'),
            'keterangan' => $this->input->post('keterangan'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Pending',
            'tgl_persetujuan_fo' => date("Y/m/d")
        );

        $detailhere = $this->input->post('id_permohonan_ptsp');

        $email = $this->m_tim_teknis->get_data_pemohon($this->input->post('id_pemohon'));
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

        $this->m_tim_teknis->update_status_permohonan($detailhere, $data, 'permohonan_ptsp');

        if ($this->m_tim_teknis->update_status_permohonan($detailhere, $data, 'permohonan_ptsp')); {
            $this->session->set_flashdata('success', 'ditolak');
            redirect('dashboard/list_permohonan_masuk');
        }
    }

    //update status permohonan menjadi Proses Kasi
    public function aksi_update_status_setujui($id_permohonan_ptsp)
    {
        $data = array(
            'id_tim_teknis' => $this->session->userdata('id_tim_teknis'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Proses Kasi',
            'tgl_persetujuan_tim_teknis' => date("Y/m/d")
        );

        $this->m_tim_teknis->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

        $this->session->set_flashdata('success', 'permohonan sukses disetujui');
        redirect('dashboard/list_permohonan_masuk');
    }

    //tampil detail ptsp10
    public function detail_ptsp10()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp10/detail_ptsp10');
        $this->load->view('footer');
    }
    //tampil detail ptsp13
    public function detail_ptsp13()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp13/detail_ptsp13');
        $this->load->view('footer');
    }
    //tampil detail ptsp14
    public function detail_ptsp14()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp14/detail_ptsp14');
        $this->load->view('footer');
    }
    //tampil detail ptsp15
    public function detail_ptsp15()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp15/detail_ptsp15');
        $this->load->view('footer');
    }

    //tampil detail ptsp20
    public function detail_ptsp20()
    {
        $data_title['title'] = 'List Permohonan Masuk';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp20/detail_ptsp20');
        $this->load->view('footer');
    }

    //tampil detail ptsp21
    public function detail_ptsp21()
    {
        $data_title['title'] = 'List Permohonan Masuk';
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_tim_teknis->jml_notif($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/ptsp21/detail_ptsp21');
        $this->load->view('footer');
    }

    // upload berita acara ptsp07
    public function upload_berita_acaraptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_berita_acaraptsp07($id_ptsp);
        }
        $id_permohonan_ptsp = $this->input->post('id_permohonan_ptsp');
        $id_layanan = $this->input->post('id_layanan');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_data_permohonan/' . $id_permohonan_ptsp . '/' . $id_layanan);
    }

    //upload jadwal siaran ptsp07
    private function aksi_upload_berita_acaraptsp07($id_ptsp)
    {
        $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp07/berita_acara/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'berita_acara-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berita_acara']['name'])) {
            if ($this->upload->do_upload('berita_acara')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->berita_acara != null) {
                    $target_file = '../assets/dashboard/pemohon/ptsp/ptsp07/berita_acara/' . $item->berita_acara;
                    unlink($target_file);
                }

                $data['berita_acara'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp);
                $this->db->update('ptsp07', $data);
            }
        }
    }

    // upload berita acara ptsp08
    public function upload_berita_acaraptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_berita_acaraptsp08($id_ptsp);
        }
        $id_permohonan_ptsp = $this->input->post('id_permohonan_ptsp');
        $id_layanan = $this->input->post('id_layanan');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_data_permohonan/' . $id_permohonan_ptsp . '/' . $id_layanan);
    }

    //upload jadwal siaran ptsp08
    private function aksi_upload_berita_acaraptsp08($id_ptsp)
    {
        $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp08/berita_acara/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'berita_acara-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berita_acara']['name'])) {
            if ($this->upload->do_upload('berita_acara')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->berita_acara != null) {
                    $target_file = '../assets/dashboard/pemohon/ptsp/ptsp08/berita_acara/' . $item->berita_acara;
                    unlink($target_file);
                }

                $data['berita_acara'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp);
                $this->db->update('ptsp08', $data);
            }
        }
    }

    // upload berita acara ptsp09
    public function upload_berita_acaraptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_berita_acaraptsp09($id_ptsp);
        }
        $id_permohonan_ptsp = $this->input->post('id_permohonan_ptsp');
        $id_layanan = $this->input->post('id_layanan');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_data_permohonan/' . $id_permohonan_ptsp . '/' . $id_layanan);
    }

    //upload jadwal siaran ptsp09
    private function aksi_upload_berita_acaraptsp09($id_ptsp)
    {
        $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp09/berita_acara/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'berita_acara-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berita_acara']['name'])) {
            if ($this->upload->do_upload('berita_acara')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->berita_acara != null) {
                    $target_file = '../assets/dashboard/pemohon/ptsp/ptsp09/berita_acara/' . $item->berita_acara;
                    unlink($target_file);
                }

                $data['berita_acara'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp);
                $this->db->update('ptsp09', $data);
            }
        }
    }

    // upload berita acara ptsp09
    public function upload_berita_acaraptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_berita_acaraptsp10($id_ptsp);
        }
        $id_permohonan_ptsp = $this->input->post('id_permohonan_ptsp');
        $id_layanan = $this->input->post('id_layanan');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_data_permohonan/' . $id_permohonan_ptsp . '/' . $id_layanan);
    }

    //upload jadwal siaran ptsp09
    private function aksi_upload_berita_acaraptsp10($id_ptsp)
    {
        $config['upload_path']          = '../assets/dashboard/pemohon/ptsp/ptsp10/berita_acara/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'berita_acara-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berita_acara']['name'])) {
            if ($this->upload->do_upload('berita_acara')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->berita_acara != null) {
                    $target_file = '../assets/dashboard/pemohon/ptsp/ptsp10/berita_acara/' . $item->berita_acara;
                    unlink($target_file);
                }

                $data['berita_acara'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp);
                $this->db->update('ptsp10', $data);
            }
        }
    }
}
