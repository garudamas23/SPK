<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Diagnosa</h3>
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
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <form method="post" action="<?= base_url('diagnosa/diagnosa'); ?>">
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>pernyataan</th>
                                                    <th>Pilih Kondisi</th>
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
                                                            <select class="form-control" name="kondisi[<?= $g['kode_pernyataan']; ?>]">
                                                                <option>- Pilih Kondisi -</option>
                                                                <?php foreach ($kondisi as $k) {
                                                                ?>
                                                                    <option value="<?= $k['nilai']; ?>"><?= $k['kondisi']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>

                                        </table>

                                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>