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
	//ubahsandi
	public function ubahsandi()
        {
                $this->load->view('header');
                $this->load->view('kasubag/sidebar');
                $this->load->view('topbar');
                $this->load->view('kasubag/ubahsandi');
                $this->load->view('footer');
        }
}
