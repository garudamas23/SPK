<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Diagnosa</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">

                        <h6>Pastikan semua kolom terisi guna mendapatkan hasil yang lebih akurat.</h6>

                        <form method="post" action="<?= base_url('diagnosa/diagnosa'); ?>">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($pernyataan as $g) {
                                        $no++;
                                        $kode_pernyataan = $g['kode_pernyataan'];
                                        $daftar_pernyataan = $g['daftar_pernyataan'];
                                    ?>
                                        <tr>
                                            <td><?= $no; ?>.</td>
                                            <td>Apakah anda <?= $daftar_pernyataan; ?>?</td>
                                            <td>
                                                <div class="row">
                                                    <?php foreach ($kondisi as $k) :
                                                    ?>
                                                        <div class="col-md-4">
                                                            <div class="radiobtn">
                                                                <input type="radio" id="kondisi_<?= $kode_pernyataan; ?>_<?= $k['nilai']; ?>" name="kondisi[<?= $kode_pernyataan; ?>]" value="<?= $k['nilai']; ?>" />
                                                                <label for="kondisi_<?= $kode_pernyataan; ?>_<?= $k['nilai']; ?>"><?= $k['kondisi']; ?></label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-info btn-block"><i class="fa fa-spinner"></i> Proses</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>