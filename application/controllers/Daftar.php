<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();

                $this->load->model('M_pemohon', 'm_pemohon');
        }

        public function index()
        {
                $this->load->view('landing/header/header_login');
                $this->load->view('landing/daftar');
                $this->load->view('landing/footer/footer_masuk');
        }

        // aksi tambah data warga
        public function aksi_daftar()
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

                                $kata_sandi = $this->input->post('kata_sandi');
                                $kata_sandi_hash = sha1($kata_sandi);
                                $konfirmasi_kata_sandi = $this->input->post('konfirmasi_kata_sandi');

                                if ($kata_sandi === $konfirmasi_kata_sandi) {
                                        $data = array(
                                                'nik' => $this->input->post('nik'),
                                                'email' => $this->input->post('email'),
                                                'kata_sandi' => $kata_sandi_hash,
                                                'nama' => $this->input->post('nama'),
                                                'no_hp' => $this->input->post('no_hp'),
                                        );

                                        $this->m_pemohon->register($data);
                                        $this->session->set_flashdata('success', 'ditambahkan, silahkan login');
                                        redirect('masuk');
                                } else {
                                        $this->session->set_flashdata('error', 'Konfirmasi Sandi <b>Salah</b>');
                                        redirect('daftar');
                                }
                        } else {
                                $this->session->set_flashdata('error', '<b>Isi captcha</b> dengan benar');
                                redirect('daftar');
                        }
                } else {
                        $this->session->set_flashdata('error', '<b>Isi captcha</b> terlebih dahulu');
                        redirect('daftar');
                }
        }
}
