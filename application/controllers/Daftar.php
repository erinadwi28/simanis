<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function index()
	{   
        $this->load->view('landing/header/header');
        $this->load->view('landing/daftar');
        $this->load->view('landing/footer/footer_masuk');
	}
}
