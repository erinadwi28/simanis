<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar');
        $this->load->view('kepala/dashboard');
        $this->load->view('footer');
    }
}
