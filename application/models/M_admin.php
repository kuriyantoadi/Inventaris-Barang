<?php

class M_admin extends CI_Model{


  // awal user
  public function pengguna()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $query = $this->db->get()->result();
    return $query;
  }

  public function pengguna_tambah_up($data_tambah)
  {
    $this->db->insert('tb_user', $data_tambah);
  }

  function pengguna_edit_up($data_edit, $id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data_edit);
  }


  public function pengguna_hapus($id_user)
  {
    $this->db->where($id_user);
    $this->db->delete('tb_user');
  }

  // akhir user


  // awal barang

   public function barang()
  {
    $this->db->select('*');
    $this->db->from('tb_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $query = $this->db->get()->result();
    return $query;
  }

  public function barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_barang', $data_tambah);
  }

  function barang_edit_up($data_edit, $id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    $this->db->update('tb_barang', $data_edit);
  }


  public function barang_hapus($id_barang)
  {
    $this->db->where($id_barang);
    $this->db->delete('tb_barang');
  }

  // akhir barang


  // awal kategori barang

  public function kategori_barang()
  {
    $this->db->select('*');
    $this->db->from('tb_kategori_barang');
    $query = $this->db->get()->result();
    return $query;
  }

  public function kategori_barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_kategori_barang', $data_tambah);
  }

  function kategori_barang_edit_up($data_edit, $id_kategori_barang)
  {
    $this->db->where('id_kategori_barang', $id_kategori_barang);
    $this->db->update('tb_kategori_barang', $data_edit);
  }


  public function kategori_barang_hapus($id_kategori_barang)
  {
    $this->db->where($id_kategori_barang);
    $this->db->delete('tb_kategori_barang');
  }


  // akhir kategori barang

  public function user_kompetensi()
  {
    $this->db->select('*');
    $this->db->from('tb_user_kompetensi');
    $query = $this->db->get()->result();
    return $query;
  }

  public function status()
  {
    $this->db->select('*');
    $this->db->from('tb_status');
    $query = $this->db->get()->result();
    return $query;
  }

  public function user_tambah($data_tambah)
  {
    $this->db->insert('tb_user', $data_tambah);
  }

  public function user_hapus($id_user)
  {
    $this->db->where($id_user);
    $this->db->delete('tb_user');
  }

  // akhir user

  // awal ruangan
  public function ruangan()
  {
    $this->db->select('*');
    $this->db->from('tb_ruangan');
    $query = $this->db->get()->result();
    return $query;
  }

  public function ruangan_tambah_up($data_tambah)
  {
    $this->db->insert('tb_ruangan', $data_tambah);
  }

  function ruangan_edit_up($data_edit, $id_ruangan)
  {
    $this->db->where('id_ruangan', $id_ruangan);
    $this->db->update('tb_ruangan', $data_edit);
  }


  public function ruangan_hapus($id_ruangan)
  {
    $this->db->where($id_ruangan);
    $this->db->delete('tb_ruangan');
  }

  // akhir ruangan

  // awal barang masuk

  public function barang_masuk()
  {
    $this->db->select('*');
    $this->db->from('tb_barang_masuk');
    $this->db->join('tb_barang', 'tb_barang_masuk.id_barang = tb_barang.id_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $query = $this->db->get()->result();
    return $query;
  }

  public function barang_masuk_tambah_up($data_tambah)
  {
    $this->db->insert('tb_barang_masuk', $data_tambah);
  }

  function barang_masuk_edit_up($data_edit, $id_barang_masuk)
  {
    $this->db->where('id_barang_masuk', $id_barang_masuk);
    $this->db->update('tb_barang_masuk', $data_edit);
  }


  public function barang_masuk_hapus($id_barang_masuk)
  {
    $this->db->where($id_barang_masuk);
    $this->db->delete('tb_barang_masuk');
  }


  // akhir barang masuk


  // awal input barang masuk
  public function input_barang_masuk_up($data_tambah)
  {
    $this->db->insert('tb_barang_masuk', $data_tambah);
  }

  public function input_barang_masuk_up_jumlah($jumlah_barang_masuk, $id_barang) {
    // Ambil nilai awal dari database
    $this->db->select('jumlah_barang');
    $this->db->from('tb_barang');
    $this->db->where('id_barang', $id_barang); // Pastikan untuk menyesuaikan kondisi 'where' sesuai dengan kebutuhan Anda
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
          $row = $query->row();
          $nilai_awal = $row->jumlah_barang;

          // Tambahkan inputan ke nilai awal
          $hasil_akhir = $nilai_awal + $jumlah_barang_masuk;

          // Update database
          $this->db->set('jumlah_barang', $hasil_akhir);
          $this->db->where('id_barang', $id_barang); // Pastikan untuk menyesuaikan kondisi 'where' sesuai dengan kebutuhan Anda
          $this->db->update('tb_barang'); // Ganti 'tb_barang' dengan nama tabel Anda

          if ($this->db->affected_rows() > 0) {
              // echo "Nilai berhasil diupdate menjadi $hasil_akhir";
          } else {
              // echo "Tidak ada perubahan yang dilakukan.";
          }

      } else {
          // echo "Data tidak ditemukan.";
      }
  }

  // akhir input barang masuk


  // awal input barang keluar
  public function input_barang_keluar_up($data_tambah)
  {
    $this->db->insert('tb_barang_keluar', $data_tambah);
  }

  public function barang_keluar()
  {
    $this->db->select('*');
    $this->db->from('tb_barang_keluar');
    $this->db->join('tb_barang', 'tb_barang_keluar.id_barang = tb_barang.id_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $this->db->join('tb_ruangan', 'tb_barang_keluar.id_ruangan = tb_ruangan.id_ruangan');
    $query = $this->db->get()->result();
    return $query;
  }

  function photo_barang_hapus($data_edit, $kode_barang)
  {
    $this->db->where($kode_barang);
    $this->db->update('tb_barang', $data_edit);
  }
  // akhir input barang keluar


  // bagian siswa

  //awal siswa
  public function siswa_hapus($id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->delete('tb_pendaftar');
  }

  public function siswa_edit($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->join('tb_kompetensi_2', 'tb_pendaftar.id_kompetensi_2 = tb_kompetensi_2.id_kompetensi_2');
    $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }

  // function siswa_edit_up($data_edit, $id_siswa)
  // {
  //   $this->db->where('id_siswa', $id_siswa);
  //   $this->db->update('tb_pendaftar', $data_edit);
  // }
  // akhir siswa


  // dashboard awal
  function count_siswa($ses_kompetensi)
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->where('short_kompetensi_1', $ses_kompetensi);
    $query = $this->db->count_all_results();
    return $query;
  }

  function count_terverifikasi($ses_kompetensi)
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->where('short_kompetensi_1', $ses_kompetensi);
    $this->db->where('status_verifikasi', 'Data Sesuai');
    $query = $this->db->count_all_results();
    return $query;
  }

  // dashboard akhir

  // awal operator adm

  function count_adm(){
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $query = $this->db->count_all_results();
    return $query;
  }

  function count_selesai_adm(){
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    // $this->db->where('short_kompetensi_1', $ses_kompetensi);
    $this->db->where('status_seleksi_administrasi', 'Data Sesuai');
    $query = $this->db->count_all_results();
    return $query;
  }

  function count_selesai_akademik(){
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->where('status_tes_akademik', 'Sudah Tes');
    $query = $this->db->count_all_results();
    return $query;
  }


  // awal akademik
  function count_selesai_wawancara($ses_kompetensi){
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->where('status_tes_wawancara', 'Sudah Tes');
    $this->db->where('short_kompetensi_1', $ses_kompetensi);
    $query = $this->db->count_all_results();
    return $query;
  }

  // akhir akademik


  function count_semua_siswa()
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $query = $this->db->count_all_results();
    return $query;
  }

  public function tampil_adm()
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->join('tb_kompetensi_2', 'tb_pendaftar.id_kompetensi_2 = tb_kompetensi_2.id_kompetensi_2');
    // $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }

   public function detail_a()
  {
    $this->db->select('*');
    $this->db->from('tb_pendaftar');
    $this->db->join('tb_kompetensi_1', 'tb_pendaftar.id_kompetensi_1 = tb_kompetensi_1.id_kompetensi_1');
    $this->db->join('tb_kompetensi_2', 'tb_pendaftar.id_kompetensi_2 = tb_kompetensi_2.id_kompetensi_2');
    // $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }
  // akhir operator adm


  // awal asal sekolah

  function asal_sekolah_edit_up($data_edit, $id_asal_sekolah)
  {
    $this->db->where('id_asal_sekolah', $id_asal_sekolah);
    $this->db->update('tb_asal_sekolah', $data_edit);
  }

  public function asal_sekolah_hapus($id_asal_sekolah)
  {
    $this->db->where($id_asal_sekolah);
    $this->db->delete('tb_asal_sekolah');
  }

  public function asal_sekolah_edit($id_asal_sekolah)
  {
    $this->db->select('*');
    $this->db->from('tb_asal_sekolah');
    $this->db->where('id_asal_sekolah', $id_asal_sekolah);
    $query = $this->db->get()->result();
    return $query;
  }

  // akhir asal sekolah


}

 ?>
