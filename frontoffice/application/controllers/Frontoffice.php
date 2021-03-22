<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontoffice extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_fo', 'm_fo');

                if (!$this->session->userdata('role_fo')) {
                        redirect('masuk_fo');
                }
        }

        public function index()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_validasi_kemenag'] = $this->m_fo->jml_notif()->result();
                $data_permohonan['permohonan_pending'] = $this->m_fo->jml_permohonan_pending()->result();
                $data_permohonan['permohonan_selesai'] = $this->m_fo->jml_permohonan_selesai()->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/dashboard_fo', $data_permohonan);
                $this->load->view('footer');
        }

        public function profil_fo()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/profil_fo', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan masuk
        public function list_permohonan_masuk()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_masuk', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan pending
        public function list_permohonan_pending()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_pending', $data_detail);
                $this->load->view('footer');
        }

        //list permohonan selesai
        public function list_permohonan_selesai()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/list_permohonan_selesai', $data_detail);
                $this->load->view('footer');
        }

        //tampil detail
        public function detail_ptsp03()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('frontoffice/ptsp3/detail_ptsp03', $data_detail);
                $this->load->view('footer');
        }

        //aksi setujui dan aksi tolak

        //form untuk menginputkan keterangan pada permohonan yang belum memenui syarat
        public function form_keterangan()
        {
                $data['fo'] = $this->db->get_where('fo', ['id_fo' =>
                $this->session->userdata('id_fo')])->row_array();
                $data['total_notif'] = $this->m_fo->jml_notif()->result();

                $detailhere = array('id_fo' => $this->session->userdata('id_fo'));
                $data_detail['detail_profil_saya'] = $this->m_fo->get_detail_profil_saya($detailhere, 'fo')->result();

                $this->load->view('header');
                $this->load->view('frontoffice/sidebar_fo', $data);
                $this->load->view('topbar', $data);
                $this->load->view('ptsp/form_keterangan', $data_detail);
                $this->load->view('footer');
        }
}
