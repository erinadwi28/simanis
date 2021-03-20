<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontoffice extends CI_Controller {

	public function index()
	{   
        $this->load->view('header');
	$this->load->view('frontoffice/sidebar_fo');
        $this->load->view('topbar');
        $this->load->view('frontoffice/dashboard_fo');
        $this->load->view('footer');
	}

	public function profil_fo()
	{   
        $this->load->view('header');
	$this->load->view('frontoffice/sidebar_fo');
        $this->load->view('topbar');
        $this->load->view('frontoffice/profil_fo');
        $this->load->view('footer');
	}
}

