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
		$data['tampil_ruangan'] = $this->M_admin->ruangan();

		$this->load->view('template/header-admin');
		$this->load->view('admin/barang', $data);
		$this->load->view('template/footer-admin');
	}

	// public function barang_tambah_up()
	// {
	// 	$this->form_validation->set_rules('nama_barang','Nama_barang', 'trim','required','min_length[1]');
	// 	$this->form_validation->set_rules('id_kategori_barang','Id_kategori_barang', 'trim','required','min_length[1]');
	// 	$this->form_validation->set_rules('kondisi_barang','Kondisi_barang', 'trim','required','min_length[1]');

	// 	if ($this->form_validation->run() == FALSE) {
		
	// 	echo 'validasi error';  
	// 	$test = $this->form_validation->error_array();
    //  	echo validation_errors();

	// 	} else {

	// 		// awal cek dan upload file skl
	// 		$config['upload_path'] = 'assets/photo_barang';
	//     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heif|heic|raw'; //type yang dapat diakses bisa anda sesuaikan
	// 		$config['max_size'] = '1000'; //MB
	// 		$config['encrypt_name']     = TRUE;

	// 		$this->load->library('upload', $config);
	// 		$this->upload->initialize($config);

	// 		if (!$this->upload->do_upload('photo_barang')) {

	// 		$error = array('error' => $this->upload->display_errors());
	// 				echo var_dump($error);
	// 				exit();

	// 		} else {
	// 			$upload_barang = $this->upload->data();
	// 		}
	// 		// akhir cek dan upload file skl

	// 	$data_tambah = array(
	// 		'nama_barang' => set_value('nama_barang'),
	// 		'id_kategori_barang' => set_value('id_kategori_barang'),
	// 		'kondisi_barang' => set_value('kondisi_barang'),
	// 		'photo_barang' => $upload_barang['file_name'],
	// 	);

	// 	$this->M_admin->barang_tambah_up($data_tambah);

	// 	$this->session->set_flashdata('msg', '
	// 		<div class="alert alert-info alert-dismissible fade show" role="alert">
	// 			Tambah Data Barang Berhasil
	// 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	// 		</div>');
	// 		// var_dump($id_siswa);
	// 	redirect('Admin/barang/');

	// 	}

	// }

	public function barang_tambah_up()
	{
		// Form validation rules
		$this->form_validation->set_rules('nama_barang', 'Nama_barang', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('id_kategori_barang', 'Id_kategori_barang', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('kondisi_barang', 'Kondisi_barang', 'trim|required|min_length[1]');

		// If form validation fails
		if ($this->form_validation->run() == FALSE) {
			echo 'Validasi error';  
			$test = $this->form_validation->error_array();
			echo validation_errors();
		} else {
			// File upload configuration
			$config['upload_path'] = 'assets/photo_barang';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heif|heic|raw';
			$config['max_size'] = '1000'; // in KB
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// If file upload fails
			if (!$this->upload->do_upload('photo_barang')) {
				$error = array('error' => $this->upload->display_errors());
				echo var_dump($error);
				exit();
			} else {
				// If file upload is successful
				$upload_barang = $this->upload->data();
			}

			// Prepare data to be inserted
			$data_tambah = array(
				'nama_barang' => set_value('nama_barang'),
				'id_kategori_barang' => set_value('id_kategori_barang'),
				'kondisi_barang' => set_value('kondisi_barang'),
				'photo_barang' => $upload_barang['file_name'],
			);

			// Insert data into the database
			$this->M_admin->barang_tambah_up($data_tambah);

			// Set success message and redirect
			$this->session->set_flashdata('msg', '
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					Tambah Data Barang Berhasil
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('Admin/barang/');
		}
	}

	public function photo_barang_hapus($id_barang, $photo_barang)
    {
        $kode_barang = array('id_barang' => $id_barang);

        $hapus_photo = "assets/photo_barang/" . $photo_barang;
        unlink($hapus_photo);

        $data_edit = array(
            'photo_barang' => '',
        );

        $this->M_admin->photo_barang_hapus($data_edit, $kode_barang);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-info alert-dismissible fade show" role="alert">
							Hapus Photo Barang Berhasil Berhasil
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>');
        redirect('Admin/barang/');
    }


	public function barang_edit_up()
	{
		$id_barang = $this->input->post('id_barang');
		$photo_barang = $this->input->post('photo_barang');
		$this->form_validation->set_rules('nama_barang','Nama_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('id_kategori_barang','Id_kategori_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('kondisi_barang','Kondisi_barang', 'trim','required','min_length[1]');

	
		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

			if($photo_barang == 'ada'){

				//jika photo tidak berubah
				$data_edit = array(
					'nama_barang' => set_value('nama_barang'),
					'id_kategori_barang' => set_value('id_kategori_barang'),
					'kondisi_barang' => set_value('kondisi_barang'),
				);

			}else{
				// jikaphoto berubah
				// File upload configuration
				$config['upload_path'] = 'assets/photo_barang';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heif|heic|raw';
				$config['max_size'] = '1000'; // in KB
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// If file upload fails
				if (!$this->upload->do_upload('photo_barang')) {
					$error = array('error' => $this->upload->display_errors());
					echo var_dump($error);
					// exit();
				} else {
					// If file upload is successful
					$upload_barang = $this->upload->data();
				}

				$data_edit = array(
					'nama_barang' => set_value('nama_barang'),
					'id_kategori_barang' => set_value('id_kategori_barang'),
					'kondisi_barang' => set_value('kondisi_barang'),
					'photo_barang' => $upload_barang['file_name'],
				);
			}

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
		redirect('Admin/kategori_barang');
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

	// barang masuk 

	public function barang_masuk()
	{
	    $data['tampil'] = $this->M_admin->barang_masuk();

		$this->load->view('template/header-admin');
		$this->load->view('admin/barang_masuk', $data);
		$this->load->view('template/footer-admin');
	}

	public function barang_masuk_tambah_up()
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

	public function input_barang_masuk_up()
	{
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang_masuk = $this->input->post('jumlah_barang_masuk');

		//ubah tanggal barang masuk
		$tgl_barang_masuk_format = new DateTime($this->input->post('tgl_barang_masuk'));
		$tgl_barang_masuk = $tgl_barang_masuk_format->format('d-m-Y');
		// var_dump($tgl_barang_masuk);
		// exit();

		$this->form_validation->set_rules('id_barang','Id_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('jumlah_barang_masuk','Jumlah_barang_masuk', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('tgl_barang_masuk','Tgl_barang_masuk', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('kondisi_barang_masuk','Kondisi_barang_masuk', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('sumber_barang','Sumber_barang', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		var_dump($test);

		} else {

		$data_tambah = array(
			'id_barang' => set_value('id_barang'),
			'jumlah_barang_masuk' => set_value('jumlah_barang_masuk'),
			'tgl_barang_masuk' => $tgl_barang_masuk,
			'kondisi_barang_masuk' => set_value('kondisi_barang_masuk'),
			'sumber_barang' => set_value('sumber_barang'),
		);

		$this->M_admin->input_barang_masuk_up($data_tambah);


		// update jumlah barang masuk
		$this->M_admin->input_barang_masuk_up_jumlah($jumlah_barang_masuk, $id_barang);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Input Barang Masuk Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/barang/');

		}
	}
	
	// akhir input barang masuk

	// awal input barang keluar

	public function barang_keluar()
	{
	    $data['tampil'] = $this->M_admin->barang_keluar();
		$data['tampil_ruangan'] = $this->M_admin->ruangan();

		$this->load->view('template/header-admin');
		$this->load->view('admin/barang_keluar', $data);
		$this->load->view('template/footer-admin');
	}

	public function input_barang_keluar_up()
	{
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang_keluar = $this->input->post('jumlah_barang_keluar');

		//ubah tanggal barang keluar
		$tgl_barang_keluar_format = new DateTime($this->input->post('tgl_barang_keluar'));
		$tgl_barang_keluar = $tgl_barang_keluar_format->format('d-m-Y');
		// var_dump($tgl_barang_keluar);
		// exit();

		$this->form_validation->set_rules('id_barang','Id_barang', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('jumlah_barang_keluar','Jumlah_barang_keluar', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('tgl_barang_keluar','Tgl_barang_keluar', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('kondisi_barang_keluar','Kondisi_barang_keluar', 'trim','required','min_length[1]');
		$this->form_validation->set_rules('id_ruangan','Id_ruangan', 'trim','required','min_length[1]');

		if ($this->form_validation->run() == FALSE) {
		
		echo 'validasi error';  
		$test = $this->form_validation->error_array();
		// var_dump($test);

		} else {

		$data_tambah = array(
			'id_barang' => set_value('id_barang'),
			'jumlah_barang_keluar' => set_value('jumlah_barang_keluar'),
			'tgl_barang_keluar' => $tgl_barang_keluar,
			'kondisi_barang_keluar' => set_value('kondisi_barang_keluar'),
			'id_ruangan' => set_value('id_ruangan'),
		);

		$this->M_admin->input_barang_keluar_up($data_tambah);


		// update jumlah barang keluar
		// $this->M_admin->input_barang_keluar_up_jumlah($jumlah_barang_keluar, $id_barang);

		$this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Input Barang Keluar Berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// var_dump($id_siswa);
		redirect('Admin/barang/');

		}
	}

	// awal laporan


	public function barang_masuk_laporan()
	{
	    $data['tampil'] = $this->M_admin->barang_masuk();

		// $this->load->view('template/header-admin');
		$this->load->view('admin/barang_masuk_laporan', $data);
		// $this->load->view('template/footer-admin');
	}

	public function barang_keluar_laporan()
	{
	    $data['tampil'] = $this->M_admin->barang_keluar();

		$this->load->view('admin/barang_keluar_laporan', $data);
	}

	public function barang_laporan()
	{
	    $data['tampil'] = $this->M_admin->barang();

		// $this->load->view('template/header-admin');
		$this->load->view('admin/barang_laporan', $data);
		// $this->load->view('template/footer-admin');
	}

	// akhir laporan

	// akhir input barang keluar

    public function select()
	{
		$this->load->view('admin/select');
	}

}
