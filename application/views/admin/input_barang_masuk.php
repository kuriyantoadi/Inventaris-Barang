
<!-- Awal Modal Input Barang Masuk -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalInputBarangMasuk<?= $row->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Input Barang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/input_barang_masuk_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang</td>
                        <td>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" disabled>
                            <input type="hidden" name="id_barang" class="form-control" value="<?= $row->id_barang ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang Masuk</td>
                        <td>
                            <input type="number" name="jumlah_barang_masuk" class="form-control" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Barang Masuk</td>
                        <td>
                            <input type="date" name="tgl_barang_masuk" class="form-control" value="" required>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kondisi Barang</td>
                        <td>
                            <select name="kondisi_barang_masuk" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
                                <option value="baik">baik</option>
                                <option value="rusak">rusak</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Sumber Barang</td>
                        <td>
                            <input type="text" name="sumber_barang" class="form-control" value="" required>
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
                <h5 class="card-title mb-0">Input Barang Masuk</h5>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
                <!-- <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button> -->
                <!-- <a href="<?= base_url() ?>Admin/barang_laporan" type="button" class="btn btn-sm btn-success btn-label mb-2"><i class="ri-file-download-line label-icon align-middle fs-16 me-2"></i> Download Laporan Barang XLS</a> -->

                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Photo Barang</th>
                            <!-- <th>Jumlah Barang</th> -->
                            <th>Kategori Barang</th>
                            <!-- <th>Kondisi Barang</th> -->
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
                            <td><?= $row->nama_barang ?></td>
                            <td><img src="<?= base_url('assets/photo_barang/' . $row->photo_barang) ?>" alt="<?= $row->nama_barang ?>" style="max-width: 200px; max-height: 200px;"></td>
                            <!-- <td><?= $row->jumlah_barang ?></td> -->
                            <td><?= $row->nama_kategori_barang ?></td>
                            <!-- <td><?= $row->kondisi_barang ?></td> -->
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalInputBarangMasuk<?= $row->id_barang ?>">
                                                <i class=" ri-add-fill align-bottom me-2 text-muted"></i>Input Barang Masuk
                                            </button>
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
