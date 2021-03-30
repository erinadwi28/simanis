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

        $data['total_notif'] = $this->m_kasi->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_kasi->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('kasi/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasi/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
	//profil
	public function profil()
        {
                $this->load->view('header');
                $this->load->view('kasi/sidebar');
                $this->load->view('topbar');
                $this->load->view('kasi/profil');
                $this->load->view('footer');
        }
	//ubahsandi
	public function ubahsandi()
        {
                $this->load->view('header');
                $this->load->view('kasi/sidebar');
                $this->load->view('topbar');
                $this->load->view('kasi/ubahsandi');
                $this->load->view('footer');
        }
}
