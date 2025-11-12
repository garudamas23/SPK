<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php }
        if ($this->session->flashdata('warning')) { ?>
            <div class="alert alert-warning alert-dismissible show fade">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= $this->session->flashdata('warning'); ?>
            </div>
        <?php }
        if ($this->session->flashdata('info')) { ?>
            <div class="alert alert-info alert-dismissible show fade">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= $this->session->flashdata('info'); ?>
            </div>
        <?php }
        if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible show fade">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Users</h2>
                        <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#Modal_add"><i class="fa fa-plus"></i> Tambah User</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Foto</th>
                                                <th>Username</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            foreach ($users as $u) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info  btn-sm">Action</button>
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal_edit<?= $u['id']; ?>">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal_delete<?= $u['id']; ?>">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url(); ?>assets/uploads/users/<?= $u['foto']; ?>" alt="Image" width="50">
                                                    </td>
                                                    <td><?= $u['username']; ?></td>
                                                    <td><?= $u['nama_lengkap']; ?></td>
                                                    <td><?= $u['email']; ?></td>
                                                    <td>
                                                        <?php if ($u['level'] == 'Administrator') { ?>
                                                            <span class="badge badge-primary"><?= $u['level']; ?></span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-info"><?= $u['level']; ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $u['status']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="Modal_add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('users/save'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option>- Pilih -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--div class="form-group row">
                                <label>Telepon</label>
                                <input type="number" class="form-control" name="telepon" required>
                            </div-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Level</label>
                                <select class="form-control" name="level" required>
                                    <option>- Pilih -</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Siswa">Siswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option>- Pilih -</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
foreach ($users as $u) : ?>
    <div id="Modal_edit<?= $u['id']; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>

                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('users/update'); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $u['username']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?= $u['nama_lengkap']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="Laki-Laki" <?php if ($u['jenis_kelamin'] == 'Laki-Laki') {
                                                                        echo 'selected';
                                                                    } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($u['jenis_kelamin'] == 'Perempuan') {
                                                                        echo 'selected';
                                                                    } ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $u['email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--div class="form-group row">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control" name="telepon" value="<?= $u['telepon']; ?>" required>
                                </div-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $u['alamat']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Level</label>
                                    <select class="form-control" name="level" required>
                                        <option value="Administrator" <?php if ($u['level'] == 'Administrator') {
                                                                            echo 'selected';
                                                                        } ?>>Administrator</option>
                                        <option value="Siswa" <?php if ($u['level'] == 'Siswa') {
                                                                    echo 'selected';
                                                                } ?>>Siswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="Aktif" <?php if ($u['status'] == 'Aktif') {
                                                                    echo 'selected';
                                                                } ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php if ($u['status'] == 'Tidak Aktif') {
                                                                        echo 'selected';
                                                                    } ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $u['id']; ?>">
                        <input type="hidden" name="file_name" value="<?= $u['foto']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($users as $u) : ?>
    <div id="Modal_delete<?= $u['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <form action="<?= base_url('users/delete'); ?>" method="post">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-sm" role="document">

                <div class="modal-content bg-outline-primary">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Delete</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Yakin Ingin Menghapus Users?</h4>
                            <input type="hidden" name="id" value="<?= $u['id']; ?>">
                            <input type="hidden" name="filename" value="<?= $u['foto']; ?>">
                            <p class="mt-2">Users <strong><?= $u['nama_lengkap']; ?></strong></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger ml-auto" style="text-decoration: none;font-weight: 700">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>