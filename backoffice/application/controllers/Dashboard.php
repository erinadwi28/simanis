<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bo', 'm_bo');

        if (!$this->session->userdata('role_bo')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/dashboard', $data_permohonan);
        $this->load->view('footer');
    }

    //profil
	public function profil()
        {
                $this->load->view('header');
                $this->load->view('backoffice/sidebar');
                $this->load->view('topbar');
                $this->load->view('backoffice/profil');
                $this->load->view('footer');
        }
	//ubahsandi
	public function ubahsandi()
        {
                $this->load->view('header');
                $this->load->view('backoffice/sidebar');
                $this->load->view('topbar');
                $this->load->view('backoffice/ubahsandi');
                $this->load->view('footer');
        }

    //list permohonan masuk
    public function list_permohonan_masuk()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan('Proses Backoffice')->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }
}
