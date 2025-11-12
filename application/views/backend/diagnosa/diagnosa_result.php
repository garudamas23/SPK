<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="<?= base_url('hasil-diagnosa'); ?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                <h3>Hasil Diagnosa</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="stats-overview">
                    <li>
                        <span class="name"> User </span>
                        <span class="value text-success"><?= $user_diagnosa->nama_lengkap; ?></span>
                    </li>
                    <li>
                        <span class="name"> Diagnosa ID </span>
                        <span class="value text-success" id="diagnosaId"><?= $user_diagnosa->diagnosa_id; ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div >
                    <h2>Hasil Diagnosa</h2>
                    <a href="javascript:window.print();" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                    <hr />                   
                        <div class="card card-body">
                            <div class="x_content">
                                <?php
                                    $datakepribadian = 1;
                                    $cfheight = array();
                                    foreach($diagnosa as $data)
                                    {
                                        if($datakepribadian != $data['kode_kepribadian'])
                                        {
                                            echo '<table id="'.$data['kode_kepribadian'].'" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width:50%">Daftar Pernyataan</th>
                                                    <th>CF Pakar</th>
                                                    <th>CF User</th>
                                                    <th>CF(H|E)</th>
                                                </tr>
                                            </thead>';

                                            echo '<h6 style="font-size:14px"><b>kepribadian: '.$data['daftar_kepribadian'].'</b></h6>';
                                            echo '<h6 style="font-size:14px"><b>Kode Kepribadian: '.$data['kode_kepribadian'].'</b></h6>';

                                            $kode_kepribadian = $data['kode_kepribadian'];
                                            $daftar_kepribadian = $data['daftar_kepribadian'];
                                            $cf_old = 0;
                                            foreach($diagnosa as $key => $value)
                                            {
                                                if($value['kode_kepribadian']==$kode_kepribadian){
                                                    $cf_old = $cf_old + $value['cf_h_e'] * (1-$cf_old);
                                                }
                                            }
                                            $cfheight[$kode_kepribadian] = $cf_old;

                                            echo '<tfoot>
                                                <tr>
                                                <tr>
                                                    <th colspan="3">CF Combination</th>
                                                    <th class="cf_combine" id="'.$data['kode_kepribadian'].'">'.round($cf_old, 3).'</th>
                                                </tr>
                                                    <th colspan="3">CF Result (%)</th>
                                                    <th>'.number_format((float)$cf_old * 100, 1, '.', '').'%</th>
                                                </tr>
                                            </tfoot>';
                                        }

                                        echo '<tbody>
                                            <tr>
                                                <td>'.$data['daftar_pernyataan'].' ('.$data['kode_pernyataan'].')</td>
                                                <td>'.$data['cf_expert'].'</td>
                                                <td>'.$data['cf_user'].'</td>
                                                <td>'.$data['cf_h_e'].'</td>
                                            </tr>
                                        </tbody>';

                                        $datakepribadian = $data['kode_kepribadian'];
                                    }
                                    echo '</table>';

                                    $bestkepribadian = '';
                                    $highestCF = 0;
                                    foreach ($cfheight as $cfh => $h) {
                                        if ($h > $highestCF) {
                                            $bestkepribadian = $cfh;
                                            $highestCF = $h;
                                        }
                                    }

                                    $kepribadian_data = array(
                                        'K01' => array(
                                            'keterangan' => 'Kamu adalah orang yang Optimis, aktif, dan sosial. Kamu suka mencari kesenangan, petualangan, dan perhatian dari orang lain. Kamu juga mudah beradaptasi, antusias, dan bersemangat. Namun, Kamu juga cenderung tidak konsisten, mudah bosan, dan kurang disiplin.',
                                            'karir' => 'Karir yang cocok dengan mu adalah Marketing, Sales, Desainer, Humas, dan Youtuber'
                                        ),
                                        'K02' => array(
                                            'keterangan' => 'Kamu adalah orang yang pemarah, cepat, dan mudah tersinggung. Kamu memiliki ambisi, kepercayaan diri, dan kemauan yang kuat. Kamu juga logis, tegas, dan mandiri. Namun, Kamu juga cenderung sombong, keras kepala, dan tidak peka.',
                                            'karir' => 'Karir yang cocok dengan mu adalah Wirausaha, Bisnis, Politik, Hukum, dan Militer'
                                        ),
                                        'K03' => array(
                                            'keterangan' => 'Kamu adalah orang yang pemarah, cepat, dan mudah tersinggung. Kamu memiliki ambisi, kepercayaan diri, dan kemauan yang kuat. Kamu juga logis, tegas, dan mandiri. Namun, Kamu juga cenderung sombong, keras kepala, dan tidak peka.',
                                            'karir' => 'Karir yang cocok dengan mu adalah Manajer, Akutan, Peneliti, Seniman, dan Staf Administrasi'
                                        ),
                                        'K04' => array(
                                            'keterangan' => 'Kamu adalah orang yang santai, damai, dan mudah diatur. Mereka memiliki toleransi, kesabaran, dan kerjasama yang baik. Mereka juga stabil, konsisten, dan dapat diandalkan. Namun, mereka juga cenderung pasif, lamban, dan kurang berinisiatif.',
                                            'karir' => 'Karir yang cocok dengan mu adalah Kesehatan, Teknisi Komputer, Kearsipan, Guru, dan Programmer'
                                        ),
                                    );
                                    
                                    
                                    $keterangan = $kepribadian_data[$bestkepribadian]['keterangan'];
                                    $karir = $kepribadian_data[$bestkepribadian]['karir'];
                                    echo '
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product_price">
                                                    <h1 class="price">Hasil</h1>
                                                    <h6 class="mt-3"> Jadi dapat disimpulkan bahwa '.$user_diagnosa->nama_lengkap.', anda memiliki kepribadian <span id="bestkepribadian"><b>'.$bestkepribadian.'</b></span> - <span><b id="namekepribadian"></b></span> dengan peresentase kepastian yaitu <span id="highestCF"><b>'.number_format((float)$highestCF * 100, 1, '.', '').'%</b></span></h6>
                                                    <h6>Keterangan: <span id="keterangan"><b>'.$keterangan.'</b></span></h6>
                                                    <h6>Karir: <span id="karir"><b>'.$karir.'</b></span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                    
                                ?>
                                
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="mt-3">
                        <a href="https://api.whatsapp.com/send?phone=6285779365705" target="_blank" class="btn btn-success btn-block"><i class="fa fa-tty"></i> Konsultasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>