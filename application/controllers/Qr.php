<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('ciqrcode');
        $this->load->helper('url');
    }

    public function index() {
        // Konfigurasi untuk QR Code
        $qr['data'] = 'https://localhost/inventaris-barang/assets/token'; // link dari qrcode
        $qr['level'] = 'H'; // Level koreksi kesalahan tinggi
        $qr['size'] = 10; // Ukuran QR Code
        $qr['savename'] = FCPATH.'assets/qr/qr.png'; // Menyimpan gambar di folder assets/qr

        // Menghasilkan QR Code
        $this->ciqrcode->generate($qr);

        // Mengirim URL gambar ke view
        $data['qr_image'] = base_url('assets/qr/qr.png');
        $this->load->view('barcode_view', $data); // Memuat view untuk menampilkan gambar QR
    }
}
