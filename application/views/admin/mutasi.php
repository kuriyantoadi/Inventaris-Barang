<!-- Awal Modal Edit -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalMutasi<?= $row->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Mutasi Barang Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/mutasi_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang Mutasi</td>
                        <td>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" disabled>
                            <input type="hidden" name="id_barang_keluar" class="form-control" value="<?= $row->id_barang_keluar ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan</td>
                        <td>                            
                            <select name="id_ruangan" class="form-control"  id="" required>
                                <option value="<?= $row->id_ruangan ?>">Pilihan Awal ( <?= $row->nama_ruangan ?> )</option>
                                <?php foreach ($tampil_ruangan as $row_2) { ?>
                                  <option value="<?= $row_2->id_ruangan ?>"><?= $row_2->nama_ruangan ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kondisi Barang Keluar</td>
                        <td>
                            <select name="kondisi_barang_keluar" class="form-control"  id="" required>
                                <option value="<?= $row->kondisi_barang_keluar ?>">Pilihan Awal ( <?= $row->kondisi_barang_keluar ?> )</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
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



<!-- Awal Modal Input Barang Keluar -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalInputBarangKeluar<?= $row->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Input Barang Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/barang_edit_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang Keluar</td>
                        <td>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" required>
                            <input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Barang Keluar</td>
                        <td>
                            
                            <select name="id_kategori_barang" class="form-control"  id="" required>
                                <option value="<?= $row->id_kategori_barang ?>">Pilihan Awal ( <?= $row->nama_kategori_barang ?> )</option>
                                <?php foreach ($tampil_kategori as $row_2) { ?>
                                  <option value="<?= $row_2->id_kategori_barang ?>"><?= $row_2->nama_kategori_barang ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kondisi Barang Keluar</td>
                        <td>
                            <select name="kondisi_barang" class="form-control"  id="" required>
                                <option value="<?= $row->kondisi_barang ?>">Pilihan Awal ( <?= $row->kondisi_barang ?> )</option>
                                <option value="baik">baik</option>
                                <option value="rusak">rusak</option>
                            </select>
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

<!-- Akhir Modal Input Barang Keluar -->




<!-- Awal Tabel -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Barang Mutasi Barang</h5>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
                <a href="<?= base_url() ?>Admin/barang_keluar_laporan" type="button" class="btn btn-sm btn-success btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Keluar XLS</a>
                <a href="<?= base_url() ?>Admin/barang_keluar_laporan_pdf" type="button" class="btn btn-sm btn-danger btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Keluar PDF</a>

                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Tanggal Barang Keluar</th>
                            <th>Nama Barang Keluar</th>
                            <th>Ke Ruangan</th>
                            <th>Jumlah Barang</th>
                            <th>Kondisi Barang</th>
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
                            <td><?= $row->tgl_barang_keluar ?></td>
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->nama_ruangan ?></td>
                            <td><?= $row->jumlah_barang_keluar ?></td>
                            <td><?= $row->kondisi_barang_keluar ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalMutasi<?= $row->id_barang ?>">
                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Mutasi Barang
                                            </button>
                                        </li>
                                        
                                        <!-- <li>
                                            <a type="button" class="dropdown-item remove-item-btn" href="<?= site_url('Admin/barang_hapus/'.$row->id_barang) ?>" onclick="return confirm('Anda yakin menghapus data barang <?= $row->nama_barang ?> ?')">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li> -->
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
