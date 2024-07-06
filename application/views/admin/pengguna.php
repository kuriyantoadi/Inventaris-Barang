<!-- Awal Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
             <?= form_open('Admin/pengguna_tambah_up'); ?>
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control"  id="" required>
                                <option value="">Pilihan</option>
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

<!-- Akhir Modal Edit -->

<!-- Awal Modal Tambah -->
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

<!-- Akhir Modal Tambah -->



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Pengguna</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>

                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>No</th>
                            <th>Username</th>
                            <th>Status</th>
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
                            <td><?= $row->username ?></td>
                            <td><?= $row->status ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <!-- <a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a> -->
                                            <button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id_user ?>">
                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit
                                            </button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
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

