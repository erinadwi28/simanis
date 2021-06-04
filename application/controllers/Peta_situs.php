<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta_situs extends CI_Controller {

	public function index()
	{   
        $data_title['title'] = 'Peta Situs';

                $this->load->view('landing/header/header', $data_title);
        $this->load->view('landing/top_navbar/top_navbar');
        $this->load->view('landing/peta_situs');
        $this->load->view('landing/footer/footer');
	}
}
