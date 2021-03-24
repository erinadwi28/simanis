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
        $data['tim_teknis'] = $this->db->get_where('tim_teknis', ['id_tim_teknis' =>
        $this->session->userdata('id_tim_teknis')])->row_array();

        $data['total_notif'] = $this->m_tim_teknis->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_tim_teknis->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('timteknis/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('timteknis/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
}
