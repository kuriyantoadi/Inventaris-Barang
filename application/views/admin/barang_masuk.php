<!-- Awal Modal Laporan -->
<div class="modal fade" id="modalLaporan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Laporan Barang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/barang_masuk_laporan_xls'); ?>
                <table class="table">
                    <tr>
                        <td>Tanggal Awal</td>
                        <td>
                            <input type="date" name="start_date" class="form-control" required>                        
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Akhir</td>
                        <td>
                            <input type="date" name="end_date" class="form-control" required>                        
                        </td>
                    </tr>
                </table>
               
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                <input type="submit" class="btn btn-primary" value="Download"></input>
            </div>
             <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Akhir Modal Laporan -->

<!-- Awal Modal Edit -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalEdit<?= $row->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Edit Barang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/barang_masuk_edit_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang Masuk</td>
                        <td>
                            <input type="hidden" name="id_barang_masuk" value="<?= $row->id_barang_masuk ?>">
                            <select name="id_barang" class="form-control"  id="" required>
                                <option value="<?= $row->id_barang ?>">Pilihan Awal ( <?= $row->nama_barang ?> )</option>
                                <?php foreach ($tampil_barang as $row_2) { ?>
                                  <option value="<?= $row_2->id_barang ?>"><?= $row_2->nama_barang ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Barang Masuk</td>
                        <td>
                            <input type="date" name="tgl_barang_masuk" class="form-control" value="<?= $row->tgl_barang_masuk ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Jumlah Barang Masuk</td>
                        <td>
                            <input type="number" name="jumlah_barang_masuk" class="form-control" value="<?= $row->jumlah_barang_masuk ?>" required>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Kategori Barang Masuk</td>
                        <td>
                            
                            <select name="id_kategori_barang" class="form-control"  id="" required>
                                <option value="<?= $row->id_kategori_barang ?>">Pilihan Awal ( <?= $row->nama_kategori_barang ?> )</option>
                                <?php foreach ($tampil_kategori as $row_3) { ?>
                                  <option value="<?= $row_3->id_kategori_barang ?>"><?= $row_3->nama_kategori_barang ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr> -->
                    
                    <tr>
                        <td>Kondisi Barang Masuk</td>
                        <td>
                            <select name="kondisi_barang_masuk" class="form-control"  id="" required>
                                <option value="<?= $row->kondisi_barang_masuk ?>">Pilihan Awal ( <?= $row->kondisi_barang ?> )</option>
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

<!-- Akhir Modal Edit -->



<!-- Awal Modal Input Barang Masuk -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalInputBarangMasuk<?= $row->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Input Barang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/barang_edit_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang Masuk</td>
                        <td>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" required>
                            <input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Barang Masuk</td>
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
                        <td>Kondisi Barang Masuk</td>
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

<!-- Akhir Modal Input Barang Masuk -->




<!-- Awal Tabel -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Barang Masuk</h5>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
                <!-- <a href="<?= base_url() ?>Admin/barang_masuk_laporan" type="button" class="btn btn-info btn-sm mb-2">Laporan Barang Masuk XLS</a> -->
                
                <!-- <a href="<?= base_url() ?>Admin/barang_masuk_laporan" type="button" class="btn btn-sm btn-success btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Masuk XLS</a> -->
                <!-- <a href="<?= base_url() ?>Admin/barang_masuk_laporan_pdf" type="button" class="btn btn-sm btn-danger btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Laporan Barang Masuk PDF</a> -->
                <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalLaporan"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i>Laporan XLS</button>


                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Tanggal Barang Masuk</th>
                            <th>Nama Barang Masuk</th>
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
                            <td><?= $row->tgl_barang_masuk ?></td>
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->jumlah_barang_masuk ?></td>
                            <td><?= $row->kondisi_barang_masuk ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id_barang ?>">
                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit
                                            </button>
                                        </li>
                                        
                                        <li>
                                            <a type="button" class="dropdown-item remove-item-btn" href="<?= site_url('Admin/barang_masuk_hapus/'.$row->id_barang_masuk) ?>" onclick="return confirm('Anda yakin menghapus data barang <?= $row->nama_barang ?> ?')">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
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
