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

  public function barang_masuk_laporan_xls($start_date, $end_date) {
    $this->db->where('tgl_barang_masuk >=', $start_date);
    $this->db->where('tgl_barang_masuk <=', $end_date);
    $this->db->join('tb_barang', 'tb_barang_masuk.id_barang = tb_barang.id_barang');
    $query = $this->db->get('tb_barang_masuk'); // ganti 'your_table_name' dengan nama tabel Anda
    return $query->result();
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

  public function barang_keluar_detail($id_barang_keluar)
  {
    $this->db->from('tb_barang_keluar');
    $this->db->join('tb_barang', 'tb_barang_keluar.id_barang = tb_barang.id_barang');
    $this->db->where('id_barang_keluar', $id_barang_keluar);
    $query = $this->db->get()->result();
    return $query;
  }

  function siswa_detail($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $this->db->where('id_siswa', $ses_id);
    $query = $this->db->get()->result();
    return $query;
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

  public function barang_keluar_hapus($id_barang_keluar)
  {
    $this->db->where($id_barang_keluar);
    $this->db->delete('tb_barang_keluar');
  }

  function barang_keluar_edit_up($data_edit, $id_barang_keluar)
  {
    $this->db->where('id_barang_keluar', $id_barang_keluar);
    $this->db->update('tb_barang_keluar', $data_edit);
  }

  function photo_barang_hapus($data_edit, $kode_barang)
  {
    $this->db->where($kode_barang);
    $this->db->update('tb_barang', $data_edit);
  }
  // akhir input barang keluar


  public function get_total_barang_keluar() {
      $this->db->select_sum('jumlah_barang_keluar');
      $query = $this->db->get('tb_barang_keluar');
      if ($query->num_rows() > 0) {
          return $query->row()->jumlah_barang_keluar;
      }
      return 0;
  }

  public function get_total_barang_masuk() {
      $this->db->select_sum('jumlah_barang_masuk');
      $query = $this->db->get('tb_barang_masuk');
      if ($query->num_rows() > 0) {
          return $query->row()->jumlah_barang_masuk;
      }
      return 0;
  }

  public function get_total_barang_rusak() {
      $this->db->select_sum('jumlah_barang');
      $this->db->where('kondisi_barang', 'rusak');
      $query = $this->db->get('tb_barang');
      if ($query->num_rows() > 0) {
          return $query->row()->jumlah_barang;
      }
      return 0;
  }

  // awal mutasi

  public function mutasi()
  {
      $this->db->select('tb_mutasi.*, tb_barang.*, ruangan_awal.nama_ruangan AS nama_ruangan_awal, ruangan_tujuan.nama_ruangan AS nama_ruangan_tujuan');
      $this->db->from('tb_mutasi');
      $this->db->join('tb_barang', 'tb_mutasi.id_barang = tb_barang.id_barang');
      $this->db->join('tb_ruangan AS ruangan_awal', 'tb_mutasi.id_ruangan_awal = ruangan_awal.id_ruangan');
      $this->db->join('tb_ruangan AS ruangan_tujuan', 'tb_mutasi.id_ruangan_tujuan = ruangan_tujuan.id_ruangan');
      $query = $this->db->get()->result();
      return $query;
  }


  public function mutasi_tambah_up($data_tambah)
  {
    $this->db->insert('tb_mutasi', $data_tambah);
  }

  public function mutasi_hapus($id_mutasi)
  {
    $this->db->where($id_mutasi);
    $this->db->delete('tb_mutasi');
  }

  function mutasi_edit_up($data_edit, $id_mutasi)
  {
    $this->db->where('id_mutasi', $id_mutasi);
    $this->db->update('tb_mutasi', $data_edit);
  }

  // akhir mutasi


}

 ?>
