<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemohon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemohon', 'm_pemohon');

        if (!$this->session->userdata('role_pemohon')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_permohonan['permohonan_validasi_kemenag'] = $this->m_pemohon->jml_permohonan_validasi_kemenag()->result();
        $data_permohonan['permohonan_pending'] = $this->m_pemohon->jml_permohonan_pending()->result();
        $data_permohonan['permohonan_selesai'] = $this->m_pemohon->jml_permohonan_selesai()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/dashboard_pemohon', $data_permohonan);
        $this->load->view('footer');
    }

    // public function profil_pemohon()
    // {   
    //     $this->load->view('header');
    // 	$this->load->view('pemohon/sidebar_pemohon');
    //     $this->load->view('topbar');
    //     $this->load->view('pemohon/profil_pemohon');
    //     $this->load->view('footer');
    // }

    //tampil halaman profil saya
    public function profil_pemohon()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/profil_pemohon', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan masuk
    public function list_permohonan_validasi_kemenag()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_validasi_kemenag', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan pending
    public function list_permohonan_pending()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan selesai
    public function list_permohonan_selesai()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_selesai', $data_detail);
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp03
    public function form_ptsp03()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/form_ptsp03', $data_detail);
        $this->load->view('footer');
    }

    // aksi pengajuan ptsp03
    public function aksi_pengajuan_ptsp03()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '3',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_surat' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $id_ptsp03 = $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp03');

        if ($_FILES != null) {
            $this->aksi_upload_ptsp03($id_ptsp03);
        }


        $this->session->set_flashdata('success', 'disimpan');
        redirect('pemohon/detail_ptsp03/' . $id_permohonan);
    }

    //upload lampiran surat masuk langsung dari saat insert pertama kali
    private function aksi_upload_ptsp03($id_ptsp03)
    {
        $config['upload_path']          = './assets/pemohon/ptsp/ptsp03/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'lampiran_surat_masuk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {

                $uploadData = $this->upload->data();

                $data['ijazah'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp03);
                $this->db->update('ptsp03', $data);
            }
        }
    }

    public function detail_ptsp03()
    {
        // $id_permohonan

        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        // $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/detail_ptsp03');
        $this->load->view('footer');
    }

    public function form_ubah_ptsp03()
    {
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        // $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/form_ubah_ptsp03');
        $this->load->view('footer');
    }

    //aksi ubah



}
