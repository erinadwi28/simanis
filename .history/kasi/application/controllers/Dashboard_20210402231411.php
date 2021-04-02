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
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['permohonan_selesaiKasi'] = $this->m_kasi->jml_permohonan_selesaiKasi($sie)->result();
        $data_permohonan['permohonan_prosesKasubag'] = $this->m_kasi->jml_permohonan_prosesKasubag($sie)->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/dashboard', $data_permohonan);
        $this->load->view('footer');
    }

    //profil
    public function profil()
    {
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $detailhere = array('id_kasi' => $this->session->userdata('id_kasi'));
        $data_detail['detail_profil_saya'] = $this->m_kasi->get_detail_profil_saya($detailhere, 'kasi')->result();

        $this->load->view('header');
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
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();
        $data_permohonan['total_notif'] = $this->m_kasi->jml_notif()->result();

        $this->load->view('header');
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
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan('Proses Kasi', $sie)->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui kasi
    public function list_permohonan_selesaiKasi()
    {
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan_selesaiKasi($sie)->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_selesaiKasi', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui kasi
    public function list_permohonan_prosesKasubag()
    {
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['data_permohonan'] = $this->m_kasi->get_list_data_permohonan_prosesKasubag('Proses Kasubag')->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/list_permohonan_prosesKasubag', $data_detail);
        $this->load->view('footer');
    }

    //tampil detail ptsp05
    public function detail_ptsp05($id_permohonan_ptsp)
    {
        $data['kasi'] = $this->db->get_where('kasi', ['id_kasi' =>
        $this->session->userdata('id_kasi')])->row_array();

        $sie = $this->session->userdata('sie');
        $data['total_notif'] = $this->m_kasi->jml_notif($sie)->result();

        $data_detail['detail_permohonan'] = $this->m_kasi->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_kasi->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar', $data);
        $this->load->view('topbar');
        $this->load->view('kasi/ptsp5/detail_ptsp05', $data_detail);
        $this->load->view('footer');
    }
}
