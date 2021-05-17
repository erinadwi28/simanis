<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();

                $this->load->model('M_super_admin', 'm_super_admin');
        }

        public function index()
        {
                if ($this->session->userdata('role')) {
                        redirect('dashboard');
                }
                $this->load->view('header_masuk');
                $this->load->view('masuk');
                $this->load->view('footer_masuk');
        }

        public function aksi_login()
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

                                $email = $this->input->post('email');
                                $kata_sandi = $this->input->post('kata_sandi');
                                $kata_sandi_hash = sha1($kata_sandi);
                                $status_delete = '0';

                                $super_admin = $this->m_super_admin->cek_email($email, $status_delete);

                                if ($super_admin) {
                                        //fo ada
                                        if ($kata_sandi_hash === $super_admin['kata_sandi']) {
                                                //kata sandi benar

                                                $data = [
                                                        'email' => $super_admin['email'],
                                                        'id_super_admin' => $super_admin['id_super_admin'],
                                                        'role' => $super_admin['role'],
                                                ];

                                                $this->session->set_userdata($data);

                                                redirect('dashboard');
                                        } else {
                                                //kata sandi salah
                                                $this->session->set_flashdata('error', '<b>Kata Sandi</bIsi> salah');
                                                redirect('masuk');
                                        }
                                } else {
                                        //gagal login
                                        $this->session->set_flashdata('error', '<b>Email</b> tidak terdaftar sebagai Super Admin');
                                        redirect('masuk');
                                }
                        } else {
                                $this->session->set_flashdata('error', '<b>Isi captcha</b> dengan benar');
                                redirect('masuk');
                        }
                } else {
                        $this->session->set_flashdata('error', '<b>Isi captcha</b> terlebih dahulu');
                        redirect('masuk');
                }
        }

        public function logout()
        {
                //untuk membersihkan session dan mengembalikannya ke halaman login
                $this->session->unset_userdata('role');

                $this->session->set_flashdata('success', 'Berhasil <b>Logout</b>');
                redirect('masuk');
        }
}
