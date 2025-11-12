<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pernyataan</h3>
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
                        <h2>Data Pernyataan</h2>
                        <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#Modal_add"><i class="fa fa-plus"></i> Tambah Pernyataan</button>
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
                                                <th>Kode Pernyataan</th>
                                                <th>Nama Pernyataan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            foreach ($pernyataan as $g) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $g['kode_pernyataan']; ?></td>
                                                    <td><?= $g['daftar_pernyataan']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info  btn-sm">Action</button>
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal_edit<?= $g['id']; ?>">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal_delete<?= $g['id']; ?>">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
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
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('pernyataan/save'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Kode Pernyataan</label>
                                <input type="text" class="form-control" name="kode_pernyataan" value="<?= $kode; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Nama Pernyataan</label>
                                <input type="text" class="form-control" name="daftar_pernyataan" required autofocus>
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
foreach ($pernyataan as $g) : ?>
    <div id="Modal_edit<?= $g['id']; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>

                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('pernyataan/update'); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Kode Pernyataan</label>
                                    <input type="text" class="form-control" name="kode_pernyataan" value="<?= $g['kode_pernyataan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label>Nama Pernyataan</label>
                                    <input type="text" class="form-control" name="daftar_pernyataan" value="<?= $g['daftar_pernyataan']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $g['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($pernyataan as $g) : ?>
    <div id="Modal_delete<?= $g['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <form action="<?= base_url('pernyataan/delete'); ?>" method="post">
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
                            <h4 class="heading mt-4">Yakin Ingin Menghapus Pernyataan?</h4>
                            <input type="hidden" name="id" value="<?= $g['id']; ?>">
                            <p class="mt-2"><strong><?= $g['daftar_pernyataan']; ?></strong></p>
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