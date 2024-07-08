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


	// awal pengguna
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

	public function pengguna_edit_up()
	{
		$id_user = $this->input->post('id_user');
		$this->form_validation->set_rules('username','Username', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('password','Password', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('status','Status', 'trim','required','min_length[1]');
	
		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_edit = array(

			'username' => set_value('username'),
			'password' => sha1(set_value('password')),
			'status' => set_value('status'),

		);

		$this->M_admin->pengguna_edit_up($data_edit, $id_user);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Edit Pengguna Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('Admin/pengguna/');

		}
	}

	public function pengguna_hapus($id_user){
		$id_user = array('id_user' => $id_user);

		$success = $this->M_admin->user_hapus($id_user);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Hapus Data User Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('Admin/pengguna');
	}

	// akhir pengguna

	
	// awal barang

	public function barang()
	{
	    $data['tampil'] = $this->M_admin->barang();
		$data['tampil_kategori'] = $this->M_admin->kategori_barang();

		$this->load->view('template/header-admin');
		$this->load->view('admin/barang', $data);
		$this->load->view('template/footer-admin');
	}

	public function barang_tambah_up()
	{
		$this->form_validation->set_rules('nama_barang','Nama_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('id_kategori_barang','Id_kategori_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('kondisi_barang','Kondisi_barang', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_tambah = array(
			'nama_barang' => set_value('nama_barang'),
			'id_kategori_barang' => set_value('id_kategori_barang'),
			'kondisi_barang' => set_value('kondisi_barang'),
		);

		$this->M_admin->barang_tambah_up($data_tambah);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Tambah Data Barang Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/barang/');

		}

	}

	public function barang_edit_up()
	{
		$id_barang = $this->input->post('id_barang');
		$this->form_validation->set_rules('nama_barang','Nama_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('id_kategori_barang','Id_kategori_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('kondisi_barang','Kondisi_barang', 'trim','required','min_length[1]');

	
		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_edit = array(
			'nama_barang' => set_value('nama_barang'),
			'id_kategori_barang' => set_value('id_kategori_barang'),
			'kondisi_barang' => set_value('kondisi_barang'),
		);

		$this->M_admin->barang_edit_up($data_edit, $id_barang);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Edit Data Barang Berhasil Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('Admin/barang/');

		}
	}

	public function barang_hapus($id_barang){
		$id_barang = array('id_barang' => $id_barang);

		$success = $this->M_admin->barang_hapus($id_barang);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Hapus Data Barang Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('Admin/barang');
	}

	// akhir barang


	// awal kategori Barang

	public function kategori_barang()
	{
	    $data['tampil'] = $this->M_admin->kategori_barang();

		$this->load->view('template/header-admin');
		$this->load->view('admin/kategori_barang', $data);
		$this->load->view('template/footer-admin');
	}

	public function kategori_barang_tambah_up()
	{
		$this->form_validation->set_rules('nama_kategori_barang','Nama_kategori_barang', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_tambah = array(
			'nama_kategori_barang' => set_value('nama_kategori_barang'),
		);

		$this->M_admin->kategori_barang_tambah_up($data_tambah);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Tambah Data Kategori Barang Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/kategori_barang/');

		}

	}

	public function kategori_barang_edit_up()
	{
		$id_kategori_barang = $this->input->post('id_kategori_barang');
		$this->form_validation->set_rules('nama_kategori_barang','Nama_kategori_barang', 'trim','required','min_length[1]');

	
		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_edit = array(
			'nama_kategori_barang' => set_value('nama_kategori_barang'),
		);

		$this->M_admin->kategori_barang_edit_up($data_edit, $id_kategori_barang);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Edit Kategori Barang Berhasil Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('Admin/kategori_barang/');

		}
	}

	public function kategori_barang_hapus($id_kategori_barang){
		$id_kategori_barang = array('id_kategori_barang' => $id_kategori_barang);

		$success = $this->M_admin->kategori_barang_hapus($id_kategori_barang);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Hapus Data User Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('Admin/pengguna');
	}


	// akhir kategori barang


	// awal ruangan

	public function ruangan()
	{
	    $data['tampil'] = $this->M_admin->ruangan();

		$this->load->view('template/header-admin');
		$this->load->view('admin/ruangan', $data);
		$this->load->view('template/footer-admin');
	}

	public function ruangan_tambah_up()
	{
		$this->form_validation->set_rules('nama_ruangan','Nama_ruangan', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_tambah = array(
			'nama_ruangan' => set_value('nama_ruangan'),
		);

		$this->M_admin->ruangan_tambah_up($data_tambah);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Tambah Data Ruang Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/ruangan/');

		}

	}

	public function ruangan_edit_up()
	{
		$id_ruangan = $this->input->post('id_ruangan');
		$this->form_validation->set_rules('nama_ruangan','Nama_ruangan', 'trim','required','min_length[1]');
	
		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_edit = array(
			'nama_ruangan' => set_value('nama_ruangan'),
		);

		$this->M_admin->ruangan_edit_up($data_edit, $id_ruangan);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Edit Data Ruang Berhasil Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('Admin/ruangan/');

		}
	}

	public function ruangan_hapus($id_ruangan){
		$id_ruangan = array('id_ruangan' => $id_ruangan);

		$success = $this->M_admin->ruangan_hapus($id_ruangan);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Hapus Data Ruang Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('Admin/ruangan');
	}


	// akhir barang

    public function Login()
	{
		$this->load->view('welcome_message');
	}

}
