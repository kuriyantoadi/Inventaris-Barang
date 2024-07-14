<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_login');
      // $this->load->model('M_siswa');
	}

  public function index()
  {
    $this->load->view('admin/login');
  }

  
// Login Admin

  public function admin_login()
  {
    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    // var_dump($password);

    // exit();

    $cek_login = $this->M_login->admin_login($username, $password);

    // var_dump($cek_login);
    // exit();

    if ($cek_login->num_rows() > 0) {
      $data = $cek_login->row_array();

      if ($data['status']=='admin') {
        $this->session->set_userdata('admin', true);
        $this->session->set_userdata('ses_id', $data['id_user']);
        $this->session->set_userdata('ses_user', $data['username']);
        redirect('Admin/index');

      }elseif ($data['status']=='waka_sarpras'){
        $this->session->set_userdata('waka_sarpras', true);
        $this->session->set_userdata('ses_id', $data['id_user']);
        $this->session->set_userdata('ses_user', $data['username']);
        redirect('Sarpras/index');
        
      }else{
        echo $this->session->set_flashdata('msg', '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Login Gagal, cek ulang username dan password anda.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('Login');
      }
      
      echo "test";

    }

    $this->session->set_flashdata('msg', '
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Login Gagal, cek ulang username dan password anda.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ');

    echo "test 1";
    // redirect('Login');
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
    redirect('Login');
  }

}
