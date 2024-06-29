<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_admin');

      // session login
		if ($this->session->userdata('admin') != true) {
			$url = base_url('Login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('template/header-admin');
		$this->load->view('admin/index');
		$this->load->view('template/footer-admin');
	}

    public function Login()
	{
		$this->load->view('welcome_message');
	}

}
