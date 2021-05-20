<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();

                $this->load->model('M_pemohon', 'm_pemohon');
        }

        public function index()
        {
                $data_title['title'] = 'Pengaduan';

                $this->load->view('landing/header/header', $data_title);
                $this->load->view('landing/top_navbar/top_navbar');
                $this->load->view('landing/pengaduan');
                $this->load->view('landing/footer/footer');
        }

        // aksi tambah data warga
        public function aksi_input_pengaduan()
        {
                $captcha_response = trim($this->input->post('g-recaptcha-response'));

                if ($captcha_response != '') {
                        $keySecret = '6LcWJXwaAAAAALSGVUhbSwhMmYZJLJP4YGQlPy3A';

                        $check = array(
                                'secret' => $keySecret,
                                'response' => $this->input->post('g-recaptcha-response')
                        );

                        $startProcess = curl_init();

                        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

                        curl_setopt($startProcess, CURLOPT_POST, true);

                        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

                        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

                        curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

                        $receiveData = curl_exec($startProcess);

                        $finalResponse = json_decode($receiveData, true);

                        if ($finalResponse['success']) {

                                $data = array(
                                        'judul_laporan' => $this->input->post('judul_laporan'),
                                        'nama' => $this->input->post('nama'),
                                        'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                                        'no_hp' => $this->input->post('no_hp'),
                                        'isi_pesan' => $this->input->post('isi_pesan'),
                                        'tujuan_lapoan' => $this->input->post('tujuan_lapoan'),
                                );

                                $this->m_pemohon->insert_laporan($data);
                                $this->session->set_flashdata('success', 'laporan berhasil dikirim');
                                redirect('pengaduan');
                        } else {
                                $this->session->set_flashdata('error', '<b>Isi captcha</b> dengan benar');
                                redirect('pengaduan');
                        }
                } else {
                        $this->session->set_flashdata('error', '<b>Isi captcha</b> terlebih dahulu');
                        redirect('pengaduan');
                }
        }
}
