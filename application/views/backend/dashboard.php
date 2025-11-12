<div class="right_col" role="main">
    <div class="">

        <div class="row">
            <div class="col-md-12">

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

                <div class="">
                    <div class="x_content">

                        <?php if ($user['level'] == 'Administrator') { ?>
                            <div class="row">
                                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
                                    <a href="<?= base_url('hasil-diagnosa'); ?>">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-file-text-o"></i>
                                            </div>
                                            <div class="count"><?= $hasil_diagnosa; ?></div>

                                            <h3 class="mt-4">Hasil Diagnosa</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                                    <a href="<?= base_url('pernyataan'); ?>">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-cubes"></i>
                                            </div>
                                            <div class="count"><?= $pernyataan['hasil']; ?></div>

                                            <h3 class="mt-4">Pernyataan</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                                    <a href="<?= base_url('kepribadian'); ?>">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-cubes"></i>
                                            </div>
                                            <div class="count"><?= $kepribadian['hasil']; ?></div>

                                            <h3 class="mt-4">Kepribadian</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                    <a href="<?= base_url('karir'); ?>">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-rss"></i>
                                            </div>
                                            <div class="count"><?= $karir['hasil']; ?></div>

                                            <h3 class="mt-4">Karir</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                    <a href="<?= base_url('kondisi'); ?>">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-hourglass"></i>
                                            </div>
                                            <div class="count"><?= $kondisi['hasil']; ?></div>

                                            <h3 class="mt-4">Kondisi</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <a href="<?= base_url('hasil-diagnosa'); ?>">
                                    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 ">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-file-text-o"></i>
                                            </div>
                                            <div class="count"><?= $hasil_diagnosa; ?></div>

                                            <h3 class="mt-4">Hasil Diagnosa</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>