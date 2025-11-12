<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url(); ?>assets/backend/images/depression.png" type="image/ico" />

    <title>Login - Pemilihan Karir Berdasarkan Kepribadian Siswa</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>assets/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(); ?>assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url(); ?>assets/backend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>assets/backend/css/custom.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    <?= $this->session->flashdata('message'); ?>

                    <form action="<?= base_url('login'); ?>" method="post">
                        <h5>Login</h5>
                        <div class="form-group row">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group row">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit" style="font-size:14px">Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Ingin Mendaftar ?
                                <a href="#signup" class="to_register"> Klik Registrasi </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Pemilihan Karir Berdasarkan Kepribadian Siswa</h1>
                            </div>
                        </div>
                    </form>

                </section>
            </div>

        </div>

        <div class="register_wrapper">
            <div id="register" class="animate form registration_form">
                <section class="login_content">

                    <?= $this->session->flashdata('message'); ?>

                    <form method="POST" action="<?= base_url("login/register"); ?>">
                        <h1>Daftar Akun</h1>
                        
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tgl Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="">Select</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit" style="font-size:14px">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Memiliki Akun ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Pemilihan Karir Berdasarkan Kepribadian Siswa</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>