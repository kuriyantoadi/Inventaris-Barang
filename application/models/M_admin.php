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
    $query = $this->db->get()->result();
    return $query;
  }

  public function barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_barang', $data_tambah);
  }

  function barang_edit_up($data_edit, $id_barang)
  {
    $this->db->where('tb_barang', $id_barang);
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
