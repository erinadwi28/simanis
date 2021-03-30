<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kepala', 'm_kepala');

        if (!$this->session->userdata('role_kepala')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data['total_notif'] = $this->m_kepala->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_kepala->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data['total_notif'] = $this->m_kepala->jml_notif()->result();
        $detailhere = array('id_kepala' => $this->session->userdata('id_kepala'));
        $data_detail['detail_profil_saya'] = $this->m_kepala->get_detail_profil_saya($detailhere, 'kepala')->result();
        
        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/profil', $data_detail);
        $this->load->view('footer');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data['total_notif'] = $this->m_kepala->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ubahsandi');
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

        $where = $this->session->userdata('id_kepala');

        $fo = $this->m_kepala->get_kepala($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_kepala->update_sandi($where, $data_baru, 'kepala');
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
}
