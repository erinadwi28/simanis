<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_fo extends CI_Controller {

	public function index()
	{   
        $this->load->view('header_masuk');
        $this->load->view('masuk_fo');
        $this->load->view('footer_masuk');
	}
}

