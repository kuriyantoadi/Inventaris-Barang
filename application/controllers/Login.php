<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_login');
      $this->load->model('M_siswa');
	}

  public function index()
  {
    $this->load->view('siswa/login');
  }

  //Login Siswa Tekno Awal
  public function login_siswa()
  {
    $nisn_siswa = htmlspecialchars($this->input->post('nisn_siswa', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    $cek_login = $this->M_login->login_siswa($nisn_siswa, $password);

    if ($cek_login->num_rows() > 0) {
     $data = $cek_login->row_array();

      if ($data['status_siswa']=='siswa') {
        $this->session->set_userdata('siswa', true);
        $this->session->set_userdata('ses_id', $data['id_siswa']);
        $this->session->set_userdata('ses_nisn', $data['nisn_siswa']);
        redirect('index.php/Siswa/index');

      }else {
        $url = site_url('index.php/Login/index');
        echo $this->session->set_flashdata('msg', '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          NISN atau Password Salah<br> Silahkan Login Kembali
        </div>
        ');
        redirect($url);

      }

      // $url = site_url('index.php/C_login/siswa_tekno');
      $url = site_url('index.php/Login/index');
      echo $this->session->set_flashdata('msg', '

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        NISN atau Password Salah<br> Silahkan Login Kembali
      </div>
      ');
      redirect($url);
    }

    $url = site_url('index.php/Login/index');
      echo $this->session->set_flashdata('msg', '

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        NISN atau Password Salah<br> Silahkan Login Kembali
      </div>
      ');
      redirect($url);

  }


// Login Admin

  public function fa()
  {
    $this->load->view('admin/login');
  }

  public function admin_login()
  {
    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    $cek_login = $this->M_login->admin_login($username, $password);

    if ($cek_login->num_rows() > 0) {
      $data = $cek_login->row_array();

      if ($data['status']=='xeimaiPh9ahs4ie') {
        $this->session->set_userdata('xeimaiPh9ahs4ie', true);
        $this->session->set_userdata('ses_id', $data['id_user']);
        $this->session->set_userdata('ses_user', $data['username']);
        redirect('index.php/Admin/index');

       }elseif ($data['status']=='opver_all'){
        $this->session->set_userdata('opver_all', true);
        $this->session->set_userdata('ses_id', $data['id_user']);
        $this->session->set_userdata('ses_user', $data['username']);
        $this->session->set_userdata('ses_status_kompetensi', $data['status_kompetensi']);

        redirect('index.php/Op_ver/index');
        
      }else{
        echo $this->session->set_flashdata('msg', '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Login Gagal, cek ulang username dan password anda.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('index.php/Login/fa');
      }
      
      echo "test";

    }

    $this->session->set_flashdata('msg', '
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Login Gagal, cek ulang username dan password anda.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ');
    redirect('index.php/Login/fa');
  }

  public function siswa_logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('msg', '
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      Anda Berhasil Logout dari Sistem PPDB
    </div>
    ');
    $url = base_url();
    redirect('index.php/Login');
  }

  public function admin_logout()
  {
    $this->session->sess_destroy();
    $url = base_url();
    redirect('index.php/Login/fa');
  }

}
