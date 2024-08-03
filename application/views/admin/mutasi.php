<!-- Awal Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Barang Mutasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/mutasi_tambah_up'); ?>
                <table class="table">
                     <tr>
                        <td>Tanggal Barang Mutasi</td>
                        <td>
                           <input type="date" name="tgl_mutasi" class="form-control"  id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Barang Mutasi</td>
                        <td>
                           <select name="id_barang" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
                                <?php foreach ($tampil_barang as $row_2) : ?>
                                  <option value="<?= $row_2->id_barang ?>"><?= $row_2->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan Awal</td>
                        <td>
                           
                            <select name="id_ruangan_awal" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
                                <?php foreach ($tampil_ruangan as $row_2): ?>
                                  <option value="<?= $row_2->id_ruangan ?>"><?= $row_2->nama_ruangan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Ruangan Tujuan</td>
                        <td>
                           
                            <select name="id_ruangan_tujuan" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
                                <?php foreach ($tampil_ruangan as $row_2) { ?>
                                  <option value="<?= $row_2->id_ruangan ?>"><?= $row_2->nama_ruangan ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Jumlah Mutasi</td>
                        <td>
                           <input type="number" name="jumlah_mutasi" class="form-control"  id="" required>
                        </td>
                    </tr>
                </table>
               
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
            </div>
             <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Akhir Modal Tambah -->


<!-- Awal Modal Edit -->
<?php foreach ($tampil as $row): ?>


<div class="modal fade" id="modalEditMutasi<?= $row->id_mutasi ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Barang Mutasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/mutasi_edit_up'); ?>
                <table class="table">
                     <tr>
                        <td>Tanggal Barang Mutasi</td>
                        <td>
                            <input type="hidden" name="id_mutasi" class="form-control" value="<?= $row->id_mutasi ?>"  id="" required>
                            <input type="date" name="tgl_mutasi" class="form-control" value="<?= $row->tgl_mutasi ?>"  id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Barang Mutasi</td>
                        <td>
                           <select name="id_barang" class="form-control"  id="" required>
                                <option value="<?= $row->id_barang ?>">Pilihan Awal = <?= $row->nama_barang ?></option>
                                <?php foreach ($tampil_barang as $row_2) : ?>
                                  <option value="<?= $row_2->id_barang ?>"><?= $row_2->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan Awal</td>
                        <td>
                           
                            <select name="id_ruangan_awal" class="form-control"  id="" required>
                                <option value="<?= $row->id_ruangan_awal ?>">Pilihan Awal = <?= $row->nama_ruangan_awal ?></option>
                                <?php foreach ($tampil_ruangan as $row_2): ?>
                                  <option value="<?= $row_2->id_ruangan ?>"><?= $row_2->nama_ruangan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Ruangan Tujuan</td>
                        <td>
                           
                            <select name="id_ruangan_tujuan" class="form-control"  id="" required>
                                <option value="<?= $row->id_ruangan_tujuan ?>">Pilihan Awal = <?= $row->nama_ruangan_tujuan ?></option>
                                <?php foreach ($tampil_ruangan as $row_2) { ?>
                                  <option value="<?= $row_2->id_ruangan ?>"><?= $row_2->nama_ruangan ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Jumlah Mutasi</td>
                        <td>
                           <input type="number" name="jumlah_mutasi" class="form-control" value="<?= $row->jumlah_mutasi ?>"  id="" required>
                        </td>
                    </tr>
                </table>
               
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
            </div>
             <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Akhir Modal Edit -->




<!-- Awal Tabel -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Barang Mutasi Barang</h5>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
                <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Mutasi</button>
                <!-- <a href="<?= base_url() ?>Admin/barang_keluar_laporan" type="button" class="btn btn-sm btn-success btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Keluar XLS</a> -->
                <!-- <a href="<?= base_url() ?>Admin/barang_keluar_laporan_pdf" type="button" class="btn btn-sm btn-danger btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Keluar PDF</a> -->

                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Tanggal Barang Mutasi</th>
                            <th>Nama Barang Mutasi</th>
                            <th>Ruangan Awal</th>
                            <th>Ruangan Tujuan</th>
                            <th>Jumlah Barang</th>
                            <th>Opsi</th>                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tampil as $row) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->tgl_mutasi ?></td>
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->nama_ruangan_awal ?></td>
                            <td><?= $row->nama_ruangan_tujuan ?></td>
                            <td><?= $row->jumlah_mutasi ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalEditMutasi<?= $row->id_mutasi ?>">
                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit Mutasi Barang
                                            </button>
                                        </li>
                                        
                                        <li>
                                            <a type="button" class="dropdown-item remove-item-btn" href="<?= site_url('Admin/mutasi_hapus/'.$row->id_mutasi) ?>" onclick="return confirm('Anda yakin menghapus data mutasi barang <?= $row->nama_barang ?> ?')">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus Mutasi
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
        </div>
    </div><!--end col-->
</div><!--end row-->

<!-- Akhir Tabel -->
