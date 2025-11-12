<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</span></a>
            </li>
        </ul>
    </div>

    <!--start menu untuk administrator-->
    <?php if ($user['level'] == 'Administrator') { ?>
        <div class="menu_section">
            <h3>Diagnosa</h3>
            <ul class="nav side-menu">
                <li class="<?= $this->uri->segment(1) == 'hasil-diagnosa' || $this->uri->segment(2) == 'diagnosa_result'  ? 'active' : '' ?>">
                    <a href="<?= base_url('hasil-diagnosa'); ?>"><i class="fa fa-file-text-o"></i> Hasil Diagnosa</span></a>
                </li>
            </ul>
        </div>
        <div class="menu_section">
            <h3>MENU</h3>
            <ul class="nav side-menu">
                <li class="<?= $this->uri->segment(1) == 'pengetahuan' ? 'active' : '' ?>">
                    <a href="<?= base_url('pengetahuan'); ?>"><i class="fa fa-trophy"></i> Pengetahuan</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'kepribadian' ? 'active' : '' ?>">
                    <a href="<?= base_url('kepribadian'); ?>"><i class="fa fa-cubes"></i> Kepribadian</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'pernyataan' ? 'active' : '' ?>">
                    <a href="<?= base_url('pernyataan'); ?>"><i class="fa fa-rss"></i> Pernyataan</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'karir' ? 'active' : '' ?>">
                    <a href="<?= base_url('karir'); ?>"><i class="fa fa-check"></i> Karir</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'kondisi' ? 'active' : '' ?>">
                    <a href="<?= base_url('kondisi'); ?>"><i class="fa fa-hourglass"></i> Kondisi</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                    <a href="<?= base_url('users'); ?>"><i class="fa fa-users"></i> Users</span></a>
                </li>
            </ul>
        </div>
     <!--end menu untuk administrator-->
    <!--start menu untuk siswa-->
    <?php } else { ?>
        <div class="menu_section">
            <h3>MENU</h3>
            <ul class="nav side-menu">
                <li class="<?= $this->uri->segment(1) == 'diagnosa' ? 'active' : '' ?>">
                    <a href="<?= base_url('diagnosa'); ?>"><i class="fa fa-wpforms"></i> Diagnosa</span></a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'hasil-diagnosa' || $this->uri->segment(2) == 'diagnosa_result'  ? 'active' : '' ?>">
                <a href="<?= base_url('hasil-diagnosa'); ?>"><i class="fa fa-file-text-o"></i> Hasil Diagnosa</span></a>
                </li>
            </ul>
        </div>
    <?php } ?>
    <!--end menu selain administrator-->

    <div class="menu_section">
        <h3>Pengaturan</h3>
        <ul class="nav side-menu">
            <li>
                <a href="<?= base_url('login/logout'); ?>" class="text-danger"><i class="fa fa-sign-out"></i> Logout</span></a>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url(); ?>assets/uploads/users/<?= $user['foto']; ?>" alt=""><?= $user['nama_lengkap']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#Modal_updateProfile"> Update Profile</a>
                        <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#Modal_changepass"> Ubah Password</a>
                        <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</div>

<div id="Modal_updateProfile" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('users/update'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="Laki-Laki" <?php if ($user['jenis_kelamin'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($user['jenis_kelamin'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Tgl Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $user['alamat']; ?>" required>
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
                    <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="Modal_changepass" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('users/change_password'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" name="password_lama" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Passoword Baru</label>
                                <input type="password" class="form-control" name="password1" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="password2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /top navigation -->