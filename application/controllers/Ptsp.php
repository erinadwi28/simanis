<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptsp extends CI_Controller {

	public function index()
	{   
        $this->load->view('landing/header/header');
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/ptsp');
        $this->load->view('landing/footer/footer');
	}
}
