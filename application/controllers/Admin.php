<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');

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

	public function pengguna()
	{
	    $data['tampil'] = $this->M_admin->pengguna();

		$this->load->view('template/header-admin');
		$this->load->view('admin/pengguna', $data);
		$this->load->view('template/footer-admin');
	}

	public function pengguna_tambah_up()
	{
		$this->form_validation->set_rules('username','Username', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('password','Password', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('status','Status', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_tambah = array(

			'username' => set_value('username'),
			'password' => sha1(set_value('password')),
			'status' => set_value('status'),

		);

		$this->M_admin->pengguna_tambah_up($data_tambah);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Tambah Data Pengguna Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/pengguna/');

		}

	}

    public function Login()
	{
		$this->load->view('welcome_message');
	}

}
