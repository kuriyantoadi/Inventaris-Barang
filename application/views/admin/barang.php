<!-- Awal Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/barang_tambah_up'); ?>
                <table class="table">
                    <tr>
                        <td>Nama Barang</td>
                        <td>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Barang</td>
                        <td>
                            
                            <select name="id_kategori_barang" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
                                <?php foreach ($tampil_kategori as $row_2) { ?>
                                  <option value="<?= $row_2->nama_kategori_barang ?>"><?= $row_2->nama_kategori_barang ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Kondisi Barang</td>
                        <td>
                            <select name="kondisi" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
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

<!-- Akhir Modal Tambah -->

<!-- Awal Modal Edit -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalEdit<?= $row->id_user ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/pengguna_edit_up'); ?>
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="<?= $row->username ?>" class="form-control" required>
                            <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" class="form-control" required>
                        </td>
                    </tr> -->
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control"  id="" required>
                                <option value="<?= $row->status ?>">Pilihan Awal (<?= $row->status ?>)</option>
                                <option value="admin">Admin</option>
                                <option value="waka_sarpras">Waka Sarpras</option>
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

<!-- Awal Modal Password -->
<?php foreach ($tampil as $row): ?>

<div class="modal fade" id="modalPassword<?= $row->id_user ?>" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/pengguna_edit_up'); ?>
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="<?= $row->username ?>" class="form-control" readonly>
                            <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <input type="text" name="status" value="<?= $row->status ?>" class="form-control" readonly>                           
                        </td>
                    </tr>
                    <tr>
                        <td>Password Baru</td>
                        <td>
                            <input type="password" name="password" class="form-control" value=""  required>
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

<!-- Akhir Modal Password -->


<!-- Awal Tabel -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Barang</h5>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
                <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>

                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Kategori Barang</th>
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
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->jumlah_barang ?></td>
                            <td><?= $row->nama_kategori_barang ?></td>
                            <td><?= $row->kondisi_barang ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id_user ?>">
                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit
                                            </button>
                                        </li>
                                         <li>
                                            <button type="button" class="dropdown-item remove-item-btn" data-bs-toggle="modal" data-bs-target="#modalPassword<?= $row->id_user ?>">
                                                <i class="ri-key-line align-bottom me-2 text-muted"></i> Reset Password
                                            </button>
                                        </li>
                                        <li>
                                            <a type="button" class="dropdown-item remove-item-btn" href="<?= site_url('Admin/pengguna_hapus/'.$row->id_user) ?>" onclick="return confirm('Anda yakin menghapus data pengguna <?= $row->username ?> ?')">
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
