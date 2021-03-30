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
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_kasubag->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar');
        $this->load->view('kasubag/profil');
        $this->load->view('footer');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();

        $this->load->view('header');
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
}
