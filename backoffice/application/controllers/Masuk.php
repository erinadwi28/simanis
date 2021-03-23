<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function index()
        {
            $this->load->view('header_masuk');
            $this->load->view('masuk');
            $this->load->view('footer_masuk');
        }
}
