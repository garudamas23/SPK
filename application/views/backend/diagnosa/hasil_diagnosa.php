<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Hasil Diagnosa</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Riwayat Diagnosa</h2>
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
                                                <th>Diagnosa ID</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            foreach ($diagnosa as $d) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?>.</td>
                                                    <td><?= $d["diagnosa_id"]; ?></td>
                                                    <td><?= $d["nama_lengkap"]; ?></td>
                                                    <td><?= date("d-m-Y H:i:s", strtotime($d['created_at'])); ?></td>
                                                    <td>
                                                        <a href="<?= base_url("diagnosa/diagnosa_result/") . $d["diagnosa_id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Show
                                                            
                                                        </a>
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