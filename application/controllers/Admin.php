<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
