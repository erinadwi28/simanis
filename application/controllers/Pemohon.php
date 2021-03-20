<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon extends CI_Controller {

	public function index()
	{   
        $this->load->view('header');
		$this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar');
        $this->load->view('pemohon/dashboard_pemohon');
        $this->load->view('footer');
	}

	public function profil_pemohon()
	{   
        $this->load->view('header');
		$this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar');
        $this->load->view('pemohon/profil_pemohon');
        $this->load->view('footer');
	}

}

