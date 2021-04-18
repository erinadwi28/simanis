<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasi', 'm_kasi');

        if (!$this->session->userdata('role_kasi')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['permohonan_selesaiKasi'] = $this->m_kasi->jml_permohonan_selesaiKasi($sie)->result();
        $data_permohonan['permohonan_prosesKasubag'] = $this->m_kasi->jml_permohonan_prosesKasubag($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/dashboard', $data_permohonan);
        $this->load->view('footer');
    }

    //profil
    public function profil()
    {
        $data_title['title'] = 'Profil Saya';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $detailhere = array('id_kasi' => $this->session->userdata('id_kasi'));
        $data_detail['detail_profil_saya'] = $this->m_kasi->get_detail_profil_saya($detailhere, 'kasi')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_kasi = $this->session->userdata('id_kasi');

        $config['upload_path']          = './../assets/dashboard/images/kasi/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/dashboard/images/kasi/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/dashboard/images/kasi/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_kasi', $id_kasi)->get('kasi')->row();

                //replace foto lama 
                if ($item->foto_profil_kasi != "placeholder_profil.png") {
                    $target_file = './../assets/dashboard/images/kasi/profil/' . $item->foto_profil_kasi;
                    unlink($target_file);
                }
                $data['foto_profil_kasi'] = $uploadData['file_name'];
                $this->db->where('id_kasi', $id_kasi);
                $this->db->update('kasi', $data);
            }
        }
        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data_title['title'] = 'Ubah Kata Sandi Saya';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['total_notif'] = $this->m_kasi->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/ubahsandi');
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

        $where = $this->session->userdata('id_kasi');

        $fo = $this->m_kasi->get_kasi($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_kasi->update_sandi($where, $data_baru, 'kasi');
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
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan('Proses Kasi', $sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan pending
    public function list_permohonan_pending()
    {
        $data_title['title'] = 'List Permohonan Pending';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan('Pending', $sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui kasi
    public function list_permohonan_selesaiKasi()
    {
        $data_title['title'] = 'List Permohonan Selesai Kasi';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan_selesaiKasi($sie)->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_selesaiKasi', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui kasi
    public function list_permohonan_prosesKasubag()
    {
        $data_title['title'] = 'List Permohonan Proses Kasubag';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan_prosesKasubag('Proses Kasubag')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_prosesKasubag', $data_detail);
        $this->load->view('footer');
    }

    //tampil detail data permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['detail_permohonan'] = $this->m_kasi->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
        if ($id_layanan == 1) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
        } elseif ($id_layanan == 3) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
        } elseif ($id_layanan == 4) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
        } elseif ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
        } elseif ($id_layanan == 6) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
        } elseif ($id_layanan == 14) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
        } elseif ($id_layanan == 15) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
        } elseif ($id_layanan == 18) {
            $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
        }

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        if ($id_layanan == 1) {
            $this->load->view('kasi/ptsp1/detail_ptsp01', $data_detail);
        } elseif ($id_layanan == 3) {
            $this->load->view('kasi/ptsp3/detail_ptsp03', $data_detail);
        } elseif ($id_layanan == 4) {
            $this->load->view('kasi/ptsp4/detail_ptsp04', $data_detail);
        } elseif ($id_layanan == 5) {
            $this->load->view('kasi/ptsp5/detail_ptsp05', $data_detail);
        } elseif ($id_layanan == 6) {
            $this->load->view('kasi/ptsp6/detail_ptsp06', $data_detail);
        } elseif ($id_layanan == 14) {
            $this->load->view('kasi/ptsp14/detail_ptsp14', $data_detail);
        } elseif ($id_layanan == 15) {
            $this->load->view('kasi/ptsp15/detail_ptsp15', $data_detail);
        } elseif ($id_layanan == 18) {
            $this->load->view('kasi/ptsp18/detail_ptsp18', $data_detail);
        } elseif ($id_layanan == 26) {
            $this->load->view('kasi/ptsp26/detail_ptsp26', $data_detail);
        }
        $this->load->view('footer');
    }

    //update status permohonan menjadi Proses kasubag
    public function aksi_update_status_setujui($id_permohonan_ptsp, $id_layanan)
    {
        $data = array(
            'id_kasi' => $this->session->userdata('id_kasi'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Proses Kasubag',
            'tgl_persetujuan_kasi' => date("Y/m/d"),

        );

        $no_surat = array(
            'no_surat' => $this->input->post('no_surat'),
        );

        $this->m_kasi->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

        if ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp05', $no_surat);
        } elseif ($id_layanan == 6) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp06', $no_surat);
        } elseif ($id_layanan == 7) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp07', $no_surat);
        } elseif ($id_layanan == 8) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp08', $no_surat);
        } elseif ($id_layanan == 9) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp09', $no_surat);
        } elseif ($id_layanan == 10) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp10', $no_surat);
        } elseif ($id_layanan == 11) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp11', $no_surat);
        } elseif ($id_layanan == 12) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp12', $no_surat);
        } elseif ($id_layanan == 13) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp13', $no_surat);
        } elseif ($id_layanan == 14) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp14', $no_surat);
        } elseif ($id_layanan == 15) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp15', $no_surat);
        } elseif ($id_layanan == 16) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp16', $no_surat);
        } elseif ($id_layanan == 17) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp17', $no_surat);
        } elseif ($id_layanan == 18) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp18', $no_surat);
        } elseif ($id_layanan == 19) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp19', $no_surat);
        } elseif ($id_layanan == 20) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp20', $no_surat);
        } elseif ($id_layanan == 21) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp21', $no_surat);
        } elseif ($id_layanan == 22) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp22', $no_surat);
        } elseif ($id_layanan == 23) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp23', $no_surat);
        } elseif ($id_layanan == 24) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp24', $no_surat);
        } elseif ($id_layanan == 25) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp25', $no_surat);
        } elseif ($id_layanan == 26) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp26', $no_surat);
        } elseif ($id_layanan == 27) {
            $data_detail['detail_ptsp'] = $this->m_kasi->insert_no_surat($id_permohonan_ptsp, 'ptsp27', $no_surat);
        }

        $this->session->set_flashdata('success', 'permohonan sukses disetujui');
        redirect('dashboard/list_permohonan_masuk');
    }

    //aksi tolak
    //tampil form tolak permohonan
    public function form_input_keterangan($id_permohonan_ptsp)
    {
        $data_title['title'] = 'Form Keterangan Revisi';
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
        $id_permohonan_ptsp])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/form_input_keterangan', $data_detail);
        $this->load->view('footer');
    }

    //aksi tolak permohonan
    public function kirim_alasn_permohonan()
    {
        $data = array(
            'id_kasi' => $this->session->userdata('id_kasi'),
            'keterangan' => $this->input->post('keterangan'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Pending',
            'tgl_persetujuan_kasi' => date("Y/m/d")
        );

        $detailhere = $this->input->post('id_permohonan_ptsp');

        $email = $this->m_kasi->get_data_pemohon($this->input->post('id_pemohon'));
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

        $this->m_kasi->update_status_permohonan($detailhere, $data, 'permohonan_ptsp');

        if ($this->m_kasi->update_status_permohonan($detailhere, $data, 'permohonan_ptsp')); {
            $this->session->set_flashdata('success', 'ditolak');
            redirect('dashboard/list_permohonan_masuk');
        }
    }
}
