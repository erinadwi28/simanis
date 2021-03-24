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
}
