<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{   
        $data_title['title'] = 'Profil';

                $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/profil');
        $this->load->view('landing/footer/footer');
	}
}
