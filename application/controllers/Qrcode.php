<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
        $this->load->model('M_admin');

	}

    //Login User
    public function index()
    {
        $this->load->view('login_tekno');
    }

    //Login Tekno
    public function bismen($token)
    {
        // jika token salah
        if($token == NULL OR $this->M_admin->siswa_check_bismen($token) == NULL){
        redirect('Login');
        }

        $data['tampil'] = $this->M_admin->siswa_check_bismen($token);
        $data['profil_sekolah'] = $this->M_admin->profil_sekolah();

        $this->load->view('siswa_bismen/cek_skl', $data);
    }

    public function tekno($token)
    {
        // jika token salah
        if($token == NULL OR $this->M_admin->siswa_check_tekno($token) == NULL){
        redirect('Login');
        }

        $data['tampil'] = $this->M_admin->siswa_check_tekno($token);
        $data['profil_sekolah'] = $this->M_admin->profil_sekolah();

        $this->load->view('siswa_tekno/cek_skl', $data);
    }



}
