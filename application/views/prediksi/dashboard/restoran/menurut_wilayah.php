<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Wilayah</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Provinsi</button>
                        </div>
                    </td>
                    <td class="col-xs-1" rowspan="2">
                        <img src="<?php echo base_url("assets/dist/img/logo-sipta.png") ?>" style="width: 100px;" alt="homepage" class="dark-logo" />
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="callout callout-picture">
                <div class="row">
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_Restoran/cari_blok1") ?>">
                        <div class="col-md-3">
                            <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <option value="">Semua Kota/Kabupaten</option>
                                <?php foreach ($kabupaten as $a) { ?>
                                    <option value="<?php echo $a['id']; ?>" <?= $id_pintu == $a['id'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
                                $year_search = $year_now;
                                for ($x = $year_search; $x >= 2001; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>" <?= $tahun == $x ? "selected" : null  ?>><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1b" data-toggle="tab">Unit</a></li>
            <li><a href="#tab_2b" data-toggle="tab">Pengunjung</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-line-chart"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1b">
                <!-- RL -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Pencarian Nilai a dan b
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="col-md-8">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr style="background-color:#6e0006; color:white;">
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah (y)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">(x).(y)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">x^2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total1 = 0;
                                        $total_Y = 0;
                                        $total_X = 0;
                                        $total_XY = 0;
                                        $pangkat2 = 0;
                                        $x_pangkat2 = 0;
                                        $rank_RL = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <td style="text-align: left;"><?php echo $rank_RL ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                                <?php $total1 = $dp['jumlah_unit'] * $rank_RL; ?>
                                                <!-- x*y -->
                                                <?php $total_Y += $dp['jumlah_unit']; ?>
                                                <?php $total_X += $rank_RL; ?>
                                                <?php $total_XY += $total1; ?>
                                                <td><?php echo number_format($total1) ?></td>
                                                <?php $pangkat2 = pow($rank_RL, 2); ?>
                                                <td><?php echo $pangkat2 ?></td>
                                                <?php $x_pangkat2 += $pangkat2; ?>
                                                <?php $rank_RL++; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jumlah Data (n)</td>
                                            <td><?php echo $rank_RL; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑X</td>
                                            <td><?php echo number_format($total_X); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑Y</td>
                                            <td><?php echo number_format($total_Y); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑XY</td>
                                            <td><?php echo number_format($total_XY); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑X^2</td>
                                            <td><?php echo number_format($x_pangkat2); ?></td>
                                        </tr>
                                        <?php $rata_X = 0;
                                        $rata_Y = 0;
                                        if ($rank_RL != 0) {
                                            $rata_X = $total_X / $rank_RL;
                                            $rata_Y = $total_Y / $rank_RL;
                                        } else {
                                            $rank_RL = 1;
                                        } ?>
                                        <tr>
                                            <td>Rata-rata X</td>
                                            <td><?php echo round($rata_X, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rata-rata Y</td>
                                            <td><?php echo round($rata_Y, 2); ?></td>
                                        </tr>
                                        <?php $persamaan1 = 0;
                                        $persamaan2 = 0;
                                        $persamaan1 = $total_Y . " = " . $rank_RL . "a + " . $total_X . "b";
                                        $persamaan2 = $total_XY . " = " . $total_X . "a + " . $x_pangkat2 . "b";
                                        ?>
                                        <tr>
                                            <td>Persamaan 1 (∑y = a.n + b. ∑x)</td>
                                            <td><?php echo $persamaan1; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Persamaan 2 (∑xy = a.∑x + b.∑x^2)</td>
                                            <td><?php echo $persamaan2; ?></td>
                                        </tr>
                                        <?php $a = 0;
                                        $b = 0;
                                        $c = 0;
                                        $d = 0;
                                        $e = 0;
                                        $f = 0;
                                        //nilai B
                                        // $a = $rank*$total_X; //a
                                        $a = $total_X * $total_X; //b
                                        $b = $total_Y * $total_X; //sigmaY Persamaan 1
                                        // $d = $total_X*$rank; //a
                                        $c = $x_pangkat2 * $rank_RL; //b
                                        $d = $total_XY * $rank_RL; //sigmaXY Persamaan 1

                                        if ($a - $c != 0) {
                                            $e = ($b - $d) / ($a - $c); //nilai B
                                        } else {
                                            $e = 0;
                                        }
                                        //nilai A
                                        $f = (($total_Y - $total_X * $e)) / $rank_RL;
                                        ?>
                                        <tr>
                                            <td>Nilai A</td>
                                            <td><?php echo round($f, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai B</td>
                                            <td><?php echo round($e, 2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Jumlah Penumpang ke Bali
                                <?php
                                echo "  Sampai Tahun " . $tahun ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- ini tabel -->
                            <table class="table table-bordered table-striped" style="text-align: right">
                                <thead>
                                    <tr style="background-color:#6e0006; color:white;">
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Periode</th>
                                        <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Tahun</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Aktual (y)</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $rank_RL = 0;
                                    $MAPE_RL = 0;
                                    $MAD_RL = 0;
                                    $MSE_RL = 0; ?>
                                    <?php foreach ($data as $dp) { ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $rank_RL ?></td>
                                            <td><?php echo $dp['tahun'] ?></td>
                                            <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                            <td>
                                                <?php $prediksi1 = 0;
                                                $prediksi1 = $f + ($e * (($rank_RL))) ?>
                                                <?php echo number_format($prediksi1) ?>
                                            </td>
                                            <td>
                                                <?php $AD_RL = 0;
                                                $AD_RL = round(abs(($dp['jumlah_unit']) - $prediksi1));
                                                echo number_format($AD_RL); ?>
                                                <?php $MAD_RL += $AD_RL ?>
                                            </td>
                                            <td>
                                                <?php $SE_RL = 0;
                                                $SE_RL = round(pow($AD_RL, 2), 2);
                                                echo number_format($SE_RL); ?>
                                                <?php $MSE_RL += $SE_RL ?>
                                            </td>
                                            <td>
                                                <?php $APE_RL = 0;
                                                if ($dp['jumlah_unit'] != 0) {
                                                    $APE_RL = round(abs($AD_RL / ($dp['jumlah_unit']) * 100), 2);
                                                    echo $APE_RL;
                                                } else {
                                                    echo $APE_RL = 0;
                                                }
                                                ?>
                                                <?php $MAPE_RL += $APE_RL ?>
                                            </td>
                                            <?php $rank_RL++ ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SES -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <p class="box-title" style="text-align: center; font-size: 13pt;">Akomodasi <?php echo $nama_pintu_masuk->kategori ?> di Bali
                                    <?php $tahun_data = $tahun - 1;
                                    echo " Sampai Tahun " . $tahun_data; ?>
                                </p>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php $MAPE_terkecil = 100;
                            $alfa_terkecil_SES = 0;
                            $MAPE_now = 0;
                            $alfa_now = 0; ?>
                            <?php for (
                                $alfa = 0.01;
                                $alfa < 1.0;
                                $alfa = $alfa + 0.01
                            ) { ?>
                                <div class="box box-solid" id="tabel2_blok1" hidden>
                                    <div class="box-body blok_cari_alfa">
                                        <!-- ini tabel -->
                                        <table id="blok_loop" class="table table-bordered table-striped" style="text-align: right">
                                            <thead>
                                                <tr style="background-color:#6e0006; color:white;">
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rank = -1;
                                                $F_before = 0;
                                                $F_after = 0;
                                                $A_before = 0;
                                                $MAPE = 0;
                                                $MAD = 0;
                                                $MSE = 0; ?>
                                                <?php foreach ($data as $dp) { ?>
                                                    <tr>
                                                        <?php $rank++; ?>
                                                        <td style="text-align: left;"><?php echo $rank ?></td>
                                                        <td><?php echo $dp['tahun'] ?></td>
                                                        <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                                        <?php if ($rank != 0) {
                                                            $F_after = round(($alfa * $A_before) + ((1 - $alfa) * ($F_before)));
                                                        } else {
                                                            $F_after = 0;
                                                        } ?>
                                                        <td><?php echo number_format($F_after) ?></td>
                                                        <?php $AD = 0;
                                                        if ($rank != 0) {
                                                            $AD = round(abs($dp['jumlah_unit'] - $F_after));
                                                        } else {
                                                            $AD = 0;
                                                        } ?>
                                                        <?php $MAD += $AD ?>
                                                        <td><?php echo number_format($AD) ?></td>
                                                        <?php $SE = 0;
                                                        $SE = round(pow($AD, 2), 2); ?>
                                                        <td><?php echo number_format($SE); ?></td>
                                                        <?php $MSE += $SE ?>
                                                        <td>
                                                            <?php $APE = 0;
                                                            if ($dp['jumlah_unit'] != 0  && $rank != 0) {
                                                                $APE = round(abs($AD / ($dp['jumlah_unit']) * 100), 2);
                                                                echo $APE;
                                                            } else {
                                                                echo $APE = 0;
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php $MAPE += $APE ?>
                                                        <?php
                                                        $F_before = $F_after;
                                                        $A_before = $dp['jumlah_unit'];  ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $MAPE_now = $MAPE;
                                if ($rank != 0) {
                                    if ($MAPE_terkecil > round($MAPE_now / $rank, 2)) {
                                        $MAPE_terkecil = round($MAPE_now / $rank, 2);
                                        $alfa_terkecil_SES = $alfa;
                                    } else {
                                        $MAPE_now = round($MAPE_terkecil / $rank, 2);
                                        $alfa_now = $alfa;
                                    }
                                } else {
                                    $MAPE_now = 0;
                                    $alfa_now = 0;
                                }
                                ?>
                            <?php
                            } ?>
                            <!-- AKHIR MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php echo 'alfa terkecil' . $alfa_terkecil_SES . ' MAPE terkecil ' . round($MAPE_terkecil, 2) ?>
                            <div class="box-body">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr style="background-color:#6e0006; color:white;">
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank_SES = -1;
                                        $F_before = 0;
                                        $F_after = 0;
                                        $A_before = 0;
                                        $MAPE_SES = 0;
                                        $MAD_SES = 0;
                                        $MSE_SES = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <?php $rank_SES++; ?>
                                                <td style="text-align: left;"><?php echo $rank_SES ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                                <?php if ($rank_SES != 0) {
                                                    $F_after = round(($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                                } else {
                                                    $F_after = 0;
                                                } ?>
                                                <td><?php echo number_format($F_after) ?></td>
                                                <?php $AD = 0;
                                                if ($rank_SES != 0) {
                                                    $AD = round(abs($dp['jumlah_unit'] - $F_after));
                                                } else {
                                                    $AD = 0;
                                                } ?>
                                                <?php $MAD_SES += $AD ?>
                                                <td><?php echo number_format($AD) ?></td>
                                                <?php $SE = 0;
                                                $SE = round(pow($AD, 2), 2); ?>
                                                <td><?php echo number_format($SE); ?></td>
                                                <?php $MSE_SES += $SE ?>
                                                <td>
                                                    <?php $APE = 0;
                                                    if ($dp['jumlah_unit'] != 0  && $rank_SES != 0) {
                                                        $APE = round(abs($AD / ($dp['jumlah_unit']) * 100), 2);
                                                        echo $APE;
                                                    } else {
                                                        echo $APE = 0;
                                                    }
                                                    ?>
                                                </td>
                                                <?php $MAPE_SES += $APE ?>
                                                <?php
                                                $F_before = $F_after;
                                                $A_before = $dp['jumlah_unit'];  ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SES-->

                <!-- DES -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDE">
                                <p class="box-title" style="text-align: center; font-size: 13pt;">DSE Jumlah Penumpang ke Bali
                                    <?php $tahun_data = $tahun;
                                    echo " Sampai Tahun " . $tahun_data; ?></p>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDE" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php $MAPE_terkecil = 100;
                            $alfa_terkecil_DES = 0;
                            $MAPE_now = 0;
                            $alfa_now = 0; ?>
                            <?php for (
                                $alfa = 0.01;
                                $alfa < 1.0;
                                $alfa = $alfa + 0.01
                            ) { ?>
                                <div class="box box-solid" id="tabel2_blok1">
                                    <div class="box-header with-border">
                                        <center>
                                            <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Penumpang ke Bali
                                                <?php $tahun_data = $tahun;
                                                echo "<br/> Sampai Tahun " . $tahun_data; ?></p>
                                        </center>
                                    </div>
                                    <div class="box-body blok_cari_alfa">
                                        <!-- ini tabel -->
                                        <table id="blok_cari_alfa" class="table table-bordered table-striped" style="text-align: right">
                                            <thead>
                                                <tr style="background-color:#6e0006; color:white;">
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St')</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St'')</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">bt</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at+bt</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">DES</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rank_DES = 0;
                                                $F_before_DES = 0;
                                                $F_after_DES = 0;
                                                $F_before2_DES = 0;
                                                $F_after2_DES = 0;
                                                $A_before_DES = 0;
                                                $MAPE_DES = 0;
                                                $MAD_DES = 0;
                                                $MSE_DES = 0;
                                                $DES_DES = 0;
                                                $at_DES = 0;
                                                $bt_DES = 0;  ?>
                                                <?php foreach ($data as $dp) { ?>
                                                    <tr>

                                                        <td style="text-align: left;"><?php echo $rank_DES ?></td>
                                                        <td><?php echo $dp['tahun'] ?></td>
                                                        <td><?php echo $dp['jumlah_unit'] ?></td>
                                                        <?php if ($rank_DES != 0) {
                                                            $F_after_DES = round(($alfa * $dp['jumlah_unit']) + ((1 - $alfa) * ($F_before_DES)));
                                                        } else {
                                                            $F_after_DES = $dp['jumlah_unit'];
                                                        } ?>
                                                        <td><?php echo number_format($F_after_DES) ?></td>

                                                        <?php $AD = 0;
                                                        if ($rank_DES != 0) {
                                                            $F_after2_DES = round(($alfa * $F_after_DES) + ((1 - $alfa) * $F_before2_DES));
                                                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                            $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                            $DES = round(($at_DES + ($bt_DES)));
                                                            $AD = round(abs($dp['jumlah_unit'] - $DES));
                                                        } else {
                                                            $F_after2_DES = $dp['jumlah_unit'];
                                                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                            $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                            $DES = round(($at_DES + ($bt_DES)));
                                                            $AD = round(abs($dp['jumlah_unit'] - $DES));
                                                        } ?>
                                                        <?php $MAD_DES += $AD ?>
                                                        <td><?php echo number_format($F_after2_DES) ?></td>
                                                        <td><?php echo number_format($at_DES) ?></td>
                                                        <td><?php echo number_format($bt_DES) ?></td>
                                                        <td><?php echo round(($at_DES + $bt_DES), 2) ?></td>
                                                        <td><?php echo number_format($DES);  ?></td>
                                                        <td><?php echo number_format($AD) ?></td>
                                                        <?php $SE = 0;
                                                        $SE = round(pow($AD, 2), 2); ?>
                                                        <td><?php echo number_format($SE); ?></td>
                                                        <?php $MSE_DES += $SE ?>
                                                        <td>
                                                            <?php $APE = 0;
                                                            if ($dp['jumlah_unit'] != 0  && $F_after_DES != 0) {
                                                                $APE = round(abs($AD / ($dp['jumlah_unit']) * 100), 2);
                                                                echo $APE;
                                                            } else {
                                                                echo $APE = 0;
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php $MAPE_DES += $APE ?>
                                                        <?php
                                                        $F_before_DES = $F_after_DES;
                                                        $F_before2_DES = $F_after2_DES;
                                                        $A_before_DES = $dp['jumlah_unit'];  ?>
                                                    </tr>
                                                    <?php $rank_DES++; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Info Boxes Style 2 -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MAPE <?= $alfa ?></span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: <?php if ($rank_DES != 0) {
                                                                                                echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                                                            } else {
                                                                                                echo "0%";
                                                                                            } ?>"></div>
                                                </div>
                                                <span class="progress-description"> <?php if ($rank_DES != 0) {
                                                                                        $TEST = round($MAPE_DES / $rank_DES, 2);
                                                                                    } else {
                                                                                        $TEST = 51;
                                                                                    } ?>
                                                    <?php if ($TEST <= 10) {
                                                        echo "Akurasi Prediksi <b>Tinggi</b>";
                                                    } else if ($TEST > 10) {
                                                        if ($TEST > 50) {
                                                            echo "Akurasi Prediksi <b>Rendah</b>";
                                                        } else if ($TEST > 20) {
                                                            echo "Akurasi Prediksi <b>Reasonable</b>";
                                                        } else if ($TEST > 11) {
                                                            echo "Akurasi Prediksi <b>Baik</b>";
                                                        }
                                                    } ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MAD</span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo number_format(round($MAD_DES / $rank_DES));
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0"></div>
                                                </div>
                                                <span class="progress-description">
                                                    <?php echo "Total MAD " . number_format($MAD_DES) ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MSE</span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo number_format(round($MSE_DES / $rank_DES));
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0"></div>
                                                </div>
                                                <span class="progress-description">
                                                    <?php echo "Total MSE " . number_format($MSE_DES) ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                </div>
                                <?php $MAPE_now = $MAPE_DES;
                                if ($rank_DES != 0) {
                                    if ($MAPE_terkecil > round($MAPE_now / $rank_DES, 2)) {
                                        $MAPE_terkecil = round($MAPE_now / $rank_DES, 2);
                                        $alfa_terkecil_DES = $alfa;
                                    } else {
                                        $MAPE_now = round($MAPE_terkecil / $rank_DES, 2);
                                        $alfa_now = $alfa;
                                    }
                                } else {
                                    $MAPE_now = 0;
                                    $alfa_now = 0;
                                }
                                ?>
                            <?php
                            } ?>
                            <!-- AKHIR MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php echo 'alfa terkecil' . $alfa_terkecil_DES . ' MAPE terkecil ' . round($MAPE_terkecil, 2) ?>
                            <div id="tabel1_blok1">
                                <div class="box-body">
                                    <!-- ini tabel -->
                                    <table class="table table-bordered table-striped" style="text-align: right">
                                        <thead>
                                            <tr style="background-color:#6e0006; color:white;">
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St')</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St'')</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">bt</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at+bt</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rank_DES = 0;
                                            $F_before_DES = 0;
                                            $F_after_DES = 0;
                                            $F_before2_DES = 0;
                                            $F_after2_DES = 0;
                                            $A_before_DES = 0;
                                            $MAPE_DES = 0;
                                            $MAD_DES = 0;
                                            $MSE_DES = 0;
                                            $DES_DES = 0;
                                            $at_DES = 0;
                                            $bt_DES = 0;  ?>
                                            <?php foreach ($data as $dp) { ?>
                                                <tr>

                                                    <td style="text-align: left;"><?php echo $rank_DES ?></td>
                                                    <td><?php echo $dp['tahun'] ?></td>
                                                    <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                                    <?php if ($rank_DES != 0) {
                                                        $F_after_DES = round(($alfa_terkecil_DES * $dp['jumlah_unit']) + ((1 - $alfa_terkecil_DES) * ($F_before_DES)));
                                                    } else {
                                                        $F_after_DES = $dp['jumlah_unit'];
                                                    } ?>
                                                    <td><?php echo number_format($F_after_DES) ?></td>

                                                    <?php $AD = 0;
                                                    if ($rank_DES != 0) {
                                                        $F_after2_DES = round(($alfa_terkecil_DES * $F_after_DES) + ((1 - $alfa_terkecil_DES) * $F_before2_DES));
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_unit'] - $DES));
                                                    } else {
                                                        $F_after2_DES = $dp['jumlah_unit'];
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_unit'] - $DES));
                                                    } ?>
                                                    <?php $MAD_DES += $AD ?>
                                                    <td><?php echo number_format($F_after2_DES) ?></td>
                                                    <td><?php echo number_format($at_DES) ?></td>
                                                    <td><?php echo number_format($bt_DES) ?></td>
                                                    <td><?php echo number_format($at_DES + $bt_DES) ?></td>
                                                    <td><?php echo number_format($AD) ?></td>
                                                    <?php $SE = 0;
                                                    $SE = round(pow($AD, 2), 2); ?>
                                                    <td><?php echo number_format($SE); ?></td>
                                                    <?php $MSE_DES += $SE ?>
                                                    <td>
                                                        <?php $APE = 0;
                                                        if ($dp['jumlah_unit'] != 0  && $F_after_DES != 0) {
                                                            $APE = round(abs($AD / ($dp['jumlah_unit']) * 100), 2);
                                                            echo $APE;
                                                        } else {
                                                            echo $APE = 0;
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php $MAPE_DES += $APE ?>
                                                    <?php
                                                    $F_before_DES = $F_after_DES;
                                                    $F_before2_DES = $F_after2_DES;
                                                    $Aktual_DES = $dp['jumlah_unit'];
                                                    // $A_before = $dp['jumlah'];  
                                                    ?>
                                                    <?php $rank_DES++; ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir DES -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseBlok2A">
                                        Grafik Garis Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseBlok2A" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div id="prediksi_akomodasi_unit_2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseBlok2A">
                                        Grafik Batang Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseBlok2A" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div id="prediksi_akomodasi_unit_2b" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a>
                                        Data Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse in">
                                <div class="box-body blok2A">
                                    <!-- ini tabel -->
                                    <table class="table table-bordered table-striped" id="blok2A" style="text-align: right">
                                        <thead>
                                            <tr>
                                                <th hidden>Periode</th>
                                                <th>Tahun</th>
                                                <th>Prediksi Regresi Linear</th>
                                                <th>Prediksi Single Exponential Smoothing</th>
                                                <th>Prediksi Double Exponential Smoothing</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $DES = 0;
                                            $total_prediksi = 0; ?>
                                            <?php for (
                                                $forecast = 0;
                                                $forecast <= 4;
                                                $forecast++
                                            ) { ?>
                                                <tr>
                                                    <td style="text-align: left;" hidden><?php echo $rank_RL + $forecast ?></td>
                                                    <td><?php echo $tahun + ($forecast); ?>
                                                    <td><?php
                                                        echo number_format(($f + ($e * (($rank_RL + $forecast))))); ?>
                                                        <?php if ($rank_RL != 0) { ?>
                                                            <?php $prediksi_RL = ((($f + ($e * (($rank_RL + $forecast)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
                                                            (<?php if ($prediksi_RL > 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else if ($prediksi_RL == 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else if ($prediksi_RL < 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else { ?>
                                                            <?php } ?>)
                                                        <?php } else {
                                                        } ?>
                                                    </td>
                                                    <td><?php if ($forecast == 0) {
                                                            $F_after_SES = (($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                                            echo number_format($F_after_SES); ?>
                                                            <?php if ($rank_RL != 0) { ?>
                                                                <?php $prediksi_SES = ((round($F_after_SES) - $A_before) / $A_before) * 100; ?>
                                                                (<?php if ($prediksi_SES > 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else if ($prediksi_SES == 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else if ($prediksi_SES < 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else { ?>
                                                                <?php } ?>)
                                                            <?php } else {
                                                            } ?>
                                                        <?php } else {
                                                            echo "-";
                                                        } ?>
                                                    </td>
                                                    <td><?php
                                                        $DES = round(($at_DES + ($bt_DES * ($forecast + 1))));
                                                        echo number_format($DES); ?>
                                                        <?php if ($rank_RL != null) { ?>
                                                            <?php $prediksi_DES = (($DES - $Aktual_DES) / $Aktual_DES) * 100; ?>
                                                            (<?php if ($prediksi_DES > 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else if ($prediksi_DES == 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else if ($prediksi_DES < 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else { ?>
                                                            <?php } ?>)
                                                        <?php } else {
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Regresi Linear</span>
                                    <span class="info-box-number">
                                        <?php if ($rank_RL != 0) {
                                            echo round($MAPE_RL / $rank_RL, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_RL != 0) {
                                                                                    echo round($MAPE_RL / $rank_RL, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_RL != 0) {
                                                                            $TEST_RL = round($MAPE_RL / $rank_RL, 2);
                                                                        } else {
                                                                            $TEST_RL = 51;
                                                                        } ?>
                                        <?php if ($TEST_RL <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST_RL > 10) {
                                            if ($TEST_RL > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST_RL > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST_RL > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Single Exponential Smoothing <?php echo $alfa_terkecil_SES ?></span>
                                    <span class="info-box-number">
                                        <?php if ($rank_SES != 0) {
                                            echo round($MAPE_SES / $rank_SES, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_SES != 0) {
                                                                                    echo round($MAPE_SES / $rank_DES, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_SES != 0) {
                                                                            $TEST = round($MAPE_SES / $rank_SES, 2);
                                                                        } else {
                                                                            $TEST = 51;
                                                                        } ?>
                                        <?php if ($TEST <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST > 10) {
                                            if ($TEST > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Double Exponential Smoothing <?php echo $alfa_terkecil_DES ?></span>
                                    <span class="info-box-number">
                                        <?php if ($rank_DES != 0) {
                                            echo round($MAPE_DES / $rank_DES, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_DES != 0) {
                                                                                    echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_DES != 0) {
                                                                            $TEST = round($MAPE_DES / $rank_DES, 2);
                                                                        } else {
                                                                            $TEST = 51;
                                                                        } ?>
                                        <?php if ($TEST <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST > 10) {
                                            if ($TEST > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel grafik prediksi -->
            <table id="data_prediksi_akomodasi_unit_2" border="1" hidden>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Prediksi Regresi Linear</th>
                        <th>Prediksi Single Exponential Smoothing</th>
                        <th>Prediksi Double Exponential Smoothing</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank_grafik = 0; ?>
                    <?php
                    $rank = 0;
                    $rank_SES = -1;
                    $prediksi_grafik = 0;
                    $F_before_SES = 0;
                    $F_after_SES = 0;
                    $F_before2_SES = 0;
                    $F_after2_SES = 0;
                    $A_before_SES = 0;
                    $F_before_DES = 0;
                    $F_after_DES = 0;
                    $F_before2_DES = 0;
                    $F_after2_DES = 0;
                    $A_before_DES = 0;
                    $DES = 0;
                    $at_DES = 0;
                    $bt_DES = 0;  ?>
                    <?php foreach ($data as $dp) { ?>
                        <!-- RL -->
                        <?php
                        $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                        <?php ($prediksi_grafik) ?>
                        <?php $rank_grafik++; ?>
                        <!--  ./RL -->
                        <!-- SE -->
                        <?php $rank_SES++; ?>
                        <?php if ($rank_SES != 0) {
                            $F_after_SES = round(($alfa_terkecil_SES * $A_before_SES) + ((1 - $alfa_terkecil_SES) * ($F_before_SES)));
                        } else {
                            $F_after_SES = 0;
                        } ?>
                        <?php $F_after_SES;
                        $A_before_SES = $dp['jumlah_unit'];
                        $F_before_SES = $F_after_SES; ?>
                        <!-- ./SE -->

                        <?php if ($rank != 0) {
                            $F_after_DES = round(($alfa_terkecil_DES * $dp['jumlah_unit']) + ((1 - $alfa_terkecil_DES) * ($F_before_DES)));
                        } else {
                            $F_after_DES = $dp['jumlah_unit'];
                        } ?>

                        <?php
                        if ($rank != 0) {
                            $F_after2_DES = round(($alfa_terkecil_DES * $F_after_DES) + ((1 - $alfa_terkecil_DES) * $F_before2_DES));
                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                            $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                            $DES = round(($at_DES + ($bt_DES)));
                        } else {
                            $F_after2_DES = $dp['jumlah_unit'];
                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                            $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                            $DES = round(($at_DES + ($bt_DES)));
                        } ?>
                        <?php $DES;  ?>
                        <?php
                        $F_before_DES = $F_after_DES;
                        $F_before2_DES = $F_after2_DES;
                        $A_before_DES = $dp['jumlah_unit'];  ?>
                        <?php $rank++; ?>
                    <?php } ?>
                    <?php for (
                        $forecast = 0;
                        $forecast <= 4;
                        $forecast++
                    ) { ?>
                        <tr>
                            <td><?php echo $tahun + ($forecast); ?>
                            <td><?php
                                echo round(($f + ($e * (($rank_grafik + $forecast))))); ?>
                            </td>
                            <td><?php if ($forecast == 0) {
                                    $F_after_SES = (($alfa_terkecil_SES * $A_before_SES) + ((1 - $alfa_terkecil_SES) * ($F_before_SES)));
                                    echo round($F_after_SES);
                                } else {
                                    echo "-";
                                } ?>
                            </td>
                            <td><?php
                                $DES = round(($at_DES + ($bt_DES * ($forecast + 1))));
                                echo $DES;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.Tabel grafik prediksi -->
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2b">
                <!-- RL -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Pencarian Nilai a dan b
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="col-md-8">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr style="background-color:#6e0006; color:white;">
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah (y)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">(x).(y)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">x^2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total1 = 0;
                                        $total_Y = 0;
                                        $total_X = 0;
                                        $total_XY = 0;
                                        $pangkat2 = 0;
                                        $x_pangkat2 = 0;
                                        $rank_RL = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <td style="text-align: left;"><?php echo $rank_RL ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                                <?php $total1 = $dp['jumlah_kamar'] * $rank_RL; ?>
                                                <!-- x*y -->
                                                <?php $total_Y += $dp['jumlah_kamar']; ?>
                                                <?php $total_X += $rank_RL; ?>
                                                <?php $total_XY += $total1; ?>
                                                <td><?php echo number_format($total1) ?></td>
                                                <?php $pangkat2 = pow($rank_RL, 2); ?>
                                                <td><?php echo $pangkat2 ?></td>
                                                <?php $x_pangkat2 += $pangkat2; ?>
                                                <?php $rank_RL++; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jumlah Data (n)</td>
                                            <td><?php echo $rank_RL; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑X</td>
                                            <td><?php echo number_format($total_X); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑Y</td>
                                            <td><?php echo number_format($total_Y); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑XY</td>
                                            <td><?php echo number_format($total_XY); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah ∑X^2</td>
                                            <td><?php echo number_format($x_pangkat2); ?></td>
                                        </tr>
                                        <?php $rata_X = 0;
                                        $rata_Y = 0;
                                        if ($rank_RL != 0) {
                                            $rata_X = $total_X / $rank_RL;
                                            $rata_Y = $total_Y / $rank_RL;
                                        } else {
                                            $rank_RL = 1;
                                        } ?>
                                        <tr>
                                            <td>Rata-rata X</td>
                                            <td><?php echo round($rata_X, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rata-rata Y</td>
                                            <td><?php echo round($rata_Y, 2); ?></td>
                                        </tr>
                                        <?php $persamaan1 = 0;
                                        $persamaan2 = 0;
                                        $persamaan1 = $total_Y . " = " . $rank_RL . "a + " . $total_X . "b";
                                        $persamaan2 = $total_XY . " = " . $total_X . "a + " . $x_pangkat2 . "b";
                                        ?>
                                        <tr>
                                            <td>Persamaan 1 (∑y = a.n + b. ∑x)</td>
                                            <td><?php echo $persamaan1; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Persamaan 2 (∑xy = a.∑x + b.∑x^2)</td>
                                            <td><?php echo $persamaan2; ?></td>
                                        </tr>
                                        <?php $a = 0;
                                        $b = 0;
                                        $c = 0;
                                        $d = 0;
                                        $e = 0;
                                        $f = 0;
                                        //nilai B
                                        // $a = $rank*$total_X; //a
                                        $a = $total_X * $total_X; //b
                                        $b = $total_Y * $total_X; //sigmaY Persamaan 1
                                        // $d = $total_X*$rank; //a
                                        $c = $x_pangkat2 * $rank_RL; //b
                                        $d = $total_XY * $rank_RL; //sigmaXY Persamaan 1

                                        if ($a - $c != 0) {
                                            $e = ($b - $d) / ($a - $c); //nilai B
                                        } else {
                                            $e = 0;
                                        }
                                        //nilai A
                                        $f = (($total_Y - $total_X * $e)) / $rank_RL;
                                        ?>
                                        <tr>
                                            <td>Nilai A</td>
                                            <td><?php echo round($f, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai B</td>
                                            <td><?php echo round($e, 2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Jumlah Penumpang ke Bali
                                <?php
                                echo "  Sampai Tahun " . $tahun ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- ini tabel -->
                            <table class="table table-bordered table-striped" style="text-align: right">
                                <thead>
                                    <tr style="background-color:#6e0006; color:white;">
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Periode</th>
                                        <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Tahun</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Aktual (y)</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $rank_RL = 0;
                                    $MAPE_RL = 0;
                                    $MAD_RL = 0;
                                    $MSE_RL = 0; ?>
                                    <?php foreach ($data as $dp) { ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $rank_RL ?></td>
                                            <td><?php echo $dp['tahun'] ?></td>
                                            <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                            <td>
                                                <?php $prediksi1 = 0;
                                                $prediksi1 = $f + ($e * (($rank_RL))) ?>
                                                <?php echo number_format($prediksi1) ?>
                                            </td>
                                            <td>
                                                <?php $AD_RL = 0;
                                                $AD_RL = round(abs(($dp['jumlah_kamar']) - $prediksi1));
                                                echo number_format($AD_RL); ?>
                                                <?php $MAD_RL += $AD_RL ?>
                                            </td>
                                            <td>
                                                <?php $SE_RL = 0;
                                                $SE_RL = round(pow($AD_RL, 2), 2);
                                                echo number_format($SE_RL); ?>
                                                <?php $MSE_RL += $SE_RL ?>
                                            </td>
                                            <td>
                                                <?php $APE_RL = 0;
                                                if ($dp['jumlah_kamar'] != 0) {
                                                    $APE_RL = round(abs($AD_RL / ($dp['jumlah_kamar']) * 100), 2);
                                                    echo $APE_RL;
                                                } else {
                                                    echo $APE_RL = 0;
                                                }
                                                ?>
                                                <?php $MAPE_RL += $APE_RL ?>
                                            </td>
                                            <?php $rank_RL++ ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SES -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <p class="box-title" style="text-align: center; font-size: 13pt;">Akomodasi <?php echo $nama_pintu_masuk->kategori ?> di Bali
                                    <?php $tahun_data = $tahun - 1;
                                    echo " Sampai Tahun " . $tahun_data; ?>
                                </p>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php $MAPE_terkecil = 100;
                            $alfa_terkecil_SES = 0;
                            $MAPE_now = 0;
                            $alfa_now = 0; ?>
                            <?php for (
                                $alfa = 0.01;
                                $alfa < 1.0;
                                $alfa = $alfa + 0.01
                            ) { ?>
                                <div class="box box-solid" id="tabel2_blok1" hidden>
                                    <div class="box-body blok_cari_alfa">
                                        <!-- ini tabel -->
                                        <table id="blok_loop" class="table table-bordered table-striped" style="text-align: right">
                                            <thead>
                                                <tr style="background-color:#6e0006; color:white;">
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rank = -1;
                                                $F_before = 0;
                                                $F_after = 0;
                                                $A_before = 0;
                                                $MAPE = 0;
                                                $MAD = 0;
                                                $MSE = 0; ?>
                                                <?php foreach ($data as $dp) { ?>
                                                    <tr>
                                                        <?php $rank++; ?>
                                                        <td style="text-align: left;"><?php echo $rank ?></td>
                                                        <td><?php echo $dp['tahun'] ?></td>
                                                        <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                                        <?php if ($rank != 0) {
                                                            $F_after = round(($alfa * $A_before) + ((1 - $alfa) * ($F_before)));
                                                        } else {
                                                            $F_after = 0;
                                                        } ?>
                                                        <td><?php echo number_format($F_after) ?></td>
                                                        <?php $AD = 0;
                                                        if ($rank != 0) {
                                                            $AD = round(abs($dp['jumlah_kamar'] - $F_after));
                                                        } else {
                                                            $AD = 0;
                                                        } ?>
                                                        <?php $MAD += $AD ?>
                                                        <td><?php echo number_format($AD) ?></td>
                                                        <?php $SE = 0;
                                                        $SE = round(pow($AD, 2), 2); ?>
                                                        <td><?php echo number_format($SE); ?></td>
                                                        <?php $MSE += $SE ?>
                                                        <td>
                                                            <?php $APE = 0;
                                                            if ($dp['jumlah_kamar'] != 0  && $rank != 0) {
                                                                $APE = round(abs($AD / ($dp['jumlah_kamar']) * 100), 2);
                                                                echo $APE;
                                                            } else {
                                                                echo $APE = 0;
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php $MAPE += $APE ?>
                                                        <?php
                                                        $F_before = $F_after;
                                                        $A_before = $dp['jumlah_kamar'];  ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $MAPE_now = $MAPE;
                                if ($rank != 0) {
                                    if ($MAPE_terkecil > round($MAPE_now / $rank, 2)) {
                                        $MAPE_terkecil = round($MAPE_now / $rank, 2);
                                        $alfa_terkecil_SES = $alfa;
                                    } else {
                                        $MAPE_now = round($MAPE_terkecil / $rank, 2);
                                        $alfa_now = $alfa;
                                    }
                                } else {
                                    $MAPE_now = 0;
                                    $alfa_now = 0;
                                }
                                ?>
                            <?php
                            } ?>
                            <!-- AKHIR MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php echo 'alfa terkecil' . $alfa_terkecil_SES . ' MAPE terkecil ' . round($MAPE_terkecil, 2) ?>
                            <div class="box-body">
                                <!-- ini tabel -->
                                <table class="table table-bordered table-striped" style="text-align: right">
                                    <thead>
                                        <tr style="background-color:#6e0006; color:white;">
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank_SES = -1;
                                        $F_before = 0;
                                        $F_after = 0;
                                        $A_before = 0;
                                        $MAPE_SES = 0;
                                        $MAD_SES = 0;
                                        $MSE_SES = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <?php $rank_SES++; ?>
                                                <td style="text-align: left;"><?php echo $rank_SES ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                                <?php if ($rank_SES != 0) {
                                                    $F_after = round(($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                                } else {
                                                    $F_after = 0;
                                                } ?>
                                                <td><?php echo number_format($F_after) ?></td>
                                                <?php $AD = 0;
                                                if ($rank_SES != 0) {
                                                    $AD = round(abs($dp['jumlah_kamar'] - $F_after));
                                                } else {
                                                    $AD = 0;
                                                } ?>
                                                <?php $MAD_SES += $AD ?>
                                                <td><?php echo number_format($AD) ?></td>
                                                <?php $SE = 0;
                                                $SE = round(pow($AD, 2), 2); ?>
                                                <td><?php echo number_format($SE); ?></td>
                                                <?php $MSE_SES += $SE ?>
                                                <td>
                                                    <?php $APE = 0;
                                                    if ($dp['jumlah_kamar'] != 0  && $rank_SES != 0) {
                                                        $APE = round(abs($AD / ($dp['jumlah_kamar']) * 100), 2);
                                                        echo $APE;
                                                    } else {
                                                        echo $APE = 0;
                                                    }
                                                    ?>
                                                </td>
                                                <?php $MAPE_SES += $APE ?>
                                                <?php
                                                $F_before = $F_after;
                                                $A_before = $dp['jumlah_kamar'];  ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SES-->

                <!-- DES -->
                <div class="panel box box-danger" hidden>
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDE">
                                <p class="box-title" style="text-align: center; font-size: 13pt;">DSE Jumlah Penumpang ke Bali
                                    <?php $tahun_data = $tahun;
                                    echo " Sampai Tahun " . $tahun_data; ?></p>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDE" class="panel-collapse collapse in">
                        <div class="box-body">
                            <!-- MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php $MAPE_terkecil = 100;
                            $alfa_terkecil_DES = 0;
                            $MAPE_now = 0;
                            $alfa_now = 0; ?>
                            <?php for (
                                $alfa = 0.01;
                                $alfa < 1.0;
                                $alfa = $alfa + 0.01
                            ) { ?>
                                <div class="box box-solid" id="tabel2_blok1">
                                    <div class="box-header with-border">
                                        <center>
                                            <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Penumpang ke Bali
                                                <?php $tahun_data = $tahun;
                                                echo "<br/> Sampai Tahun " . $tahun_data; ?></p>
                                        </center>
                                    </div>
                                    <div class="box-body blok_cari_alfa">
                                        <!-- ini tabel -->
                                        <table id="blok_cari_alfa" class="table table-bordered table-striped" style="text-align: right">
                                            <thead>
                                                <tr style="background-color:#6e0006; color:white;">
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St')</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St'')</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">bt</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at+bt</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">DES</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rank_DES = 0;
                                                $F_before_DES = 0;
                                                $F_after_DES = 0;
                                                $F_before2_DES = 0;
                                                $F_after2_DES = 0;
                                                $A_before_DES = 0;
                                                $MAPE_DES = 0;
                                                $MAD_DES = 0;
                                                $MSE_DES = 0;
                                                $DES_DES = 0;
                                                $at_DES = 0;
                                                $bt_DES = 0;  ?>
                                                <?php foreach ($data as $dp) { ?>
                                                    <tr>

                                                        <td style="text-align: left;"><?php echo $rank_DES ?></td>
                                                        <td><?php echo $dp['tahun'] ?></td>
                                                        <td><?php echo $dp['jumlah_kamar'] ?></td>
                                                        <?php if ($rank_DES != 0) {
                                                            $F_after_DES = round(($alfa * $dp['jumlah_kamar']) + ((1 - $alfa) * ($F_before_DES)));
                                                        } else {
                                                            $F_after_DES = $dp['jumlah_kamar'];
                                                        } ?>
                                                        <td><?php echo number_format($F_after_DES) ?></td>

                                                        <?php $AD = 0;
                                                        if ($rank_DES != 0) {
                                                            $F_after2_DES = round(($alfa * $F_after_DES) + ((1 - $alfa) * $F_before2_DES));
                                                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                            $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                            $DES = round(($at_DES + ($bt_DES)));
                                                            $AD = round(abs($dp['jumlah_kamar'] - $DES));
                                                        } else {
                                                            $F_after2_DES = $dp['jumlah_kamar'];
                                                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                            $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                            $DES = round(($at_DES + ($bt_DES)));
                                                            $AD = round(abs($dp['jumlah_kamar'] - $DES));
                                                        } ?>
                                                        <?php $MAD_DES += $AD ?>
                                                        <td><?php echo number_format($F_after2_DES) ?></td>
                                                        <td><?php echo number_format($at_DES) ?></td>
                                                        <td><?php echo number_format($bt_DES) ?></td>
                                                        <td><?php echo round(($at_DES + $bt_DES), 2) ?></td>
                                                        <td><?php echo number_format($DES);  ?></td>
                                                        <td><?php echo number_format($AD) ?></td>
                                                        <?php $SE = 0;
                                                        $SE = round(pow($AD, 2), 2); ?>
                                                        <td><?php echo number_format($SE); ?></td>
                                                        <?php $MSE_DES += $SE ?>
                                                        <td>
                                                            <?php $APE = 0;
                                                            if ($dp['jumlah_kamar'] != 0  && $F_after_DES != 0) {
                                                                $APE = round(abs($AD / ($dp['jumlah_kamar']) * 100), 2);
                                                                echo $APE;
                                                            } else {
                                                                echo $APE = 0;
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php $MAPE_DES += $APE ?>
                                                        <?php
                                                        $F_before_DES = $F_after_DES;
                                                        $F_before2_DES = $F_after2_DES;
                                                        $A_before_DES = $dp['jumlah_kamar'];  ?>
                                                    </tr>
                                                    <?php $rank_DES++; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Info Boxes Style 2 -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MAPE <?= $alfa ?></span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: <?php if ($rank_DES != 0) {
                                                                                                echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                                                            } else {
                                                                                                echo "0%";
                                                                                            } ?>"></div>
                                                </div>
                                                <span class="progress-description"> <?php if ($rank_DES != 0) {
                                                                                        $TEST = round($MAPE_DES / $rank_DES, 2);
                                                                                    } else {
                                                                                        $TEST = 51;
                                                                                    } ?>
                                                    <?php if ($TEST <= 10) {
                                                        echo "Akurasi Prediksi <b>Tinggi</b>";
                                                    } else if ($TEST > 10) {
                                                        if ($TEST > 50) {
                                                            echo "Akurasi Prediksi <b>Rendah</b>";
                                                        } else if ($TEST > 20) {
                                                            echo "Akurasi Prediksi <b>Reasonable</b>";
                                                        } else if ($TEST > 11) {
                                                            echo "Akurasi Prediksi <b>Baik</b>";
                                                        }
                                                    } ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MAD</span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo number_format(round($MAD_DES / $rank_DES));
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0"></div>
                                                </div>
                                                <span class="progress-description">
                                                    <?php echo "Total MAD " . number_format($MAD_DES) ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">MSE</span>
                                                <span class="info-box-number">
                                                    <?php if ($rank_DES != 0) {
                                                        echo number_format(round($MSE_DES / $rank_DES));
                                                    } else {
                                                        echo "0%";
                                                    }
                                                    ?>
                                                </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0"></div>
                                                </div>
                                                <span class="progress-description">
                                                    <?php echo "Total MSE " . number_format($MSE_DES) ?>
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                </div>
                                <?php $MAPE_now = $MAPE_DES;
                                if ($rank_DES != 0) {
                                    if ($MAPE_terkecil > round($MAPE_now / $rank_DES, 2)) {
                                        $MAPE_terkecil = round($MAPE_now / $rank_DES, 2);
                                        $alfa_terkecil_DES = $alfa;
                                    } else {
                                        $MAPE_now = round($MAPE_terkecil / $rank_DES, 2);
                                        $alfa_now = $alfa;
                                    }
                                } else {
                                    $MAPE_now = 0;
                                    $alfa_now = 0;
                                }
                                ?>
                            <?php
                            } ?>
                            <!-- AKHIR MENCARI ALFA DAN MAPE TERKECIL -->
                            <?php echo 'alfa terkecil' . $alfa_terkecil_DES . ' MAPE terkecil ' . round($MAPE_terkecil, 2) ?>
                            <div id="tabel1_blok1">
                                <div class="box-body">
                                    <!-- ini tabel -->
                                    <table class="table table-bordered table-striped" style="text-align: right">
                                        <thead>
                                            <tr style="background-color:#6e0006; color:white;">
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah Aktual</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St')</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah Prediksi (St'')</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">bt</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">at+bt</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">AD</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">SE</th>
                                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">APE(%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rank_DES = 0;
                                            $F_before_DES = 0;
                                            $F_after_DES = 0;
                                            $F_before2_DES = 0;
                                            $F_after2_DES = 0;
                                            $A_before_DES = 0;
                                            $MAPE_DES = 0;
                                            $MAD_DES = 0;
                                            $MSE_DES = 0;
                                            $DES_DES = 0;
                                            $at_DES = 0;
                                            $bt_DES = 0;  ?>
                                            <?php foreach ($data as $dp) { ?>
                                                <tr>

                                                    <td style="text-align: left;"><?php echo $rank_DES ?></td>
                                                    <td><?php echo $dp['tahun'] ?></td>
                                                    <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                                    <?php if ($rank_DES != 0) {
                                                        $F_after_DES = round(($alfa_terkecil_DES * $dp['jumlah_kamar']) + ((1 - $alfa_terkecil_DES) * ($F_before_DES)));
                                                    } else {
                                                        $F_after_DES = $dp['jumlah_kamar'];
                                                    } ?>
                                                    <td><?php echo number_format($F_after_DES) ?></td>

                                                    <?php $AD = 0;
                                                    if ($rank_DES != 0) {
                                                        $F_after2_DES = round(($alfa_terkecil_DES * $F_after_DES) + ((1 - $alfa_terkecil_DES) * $F_before2_DES));
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_kamar'] - $DES));
                                                    } else {
                                                        $F_after2_DES = $dp['jumlah_kamar'];
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_kamar'] - $DES));
                                                    } ?>
                                                    <?php $MAD_DES += $AD ?>
                                                    <td><?php echo number_format($F_after2_DES) ?></td>
                                                    <td><?php echo number_format($at_DES) ?></td>
                                                    <td><?php echo number_format($bt_DES) ?></td>
                                                    <td><?php echo number_format($at_DES + $bt_DES) ?></td>
                                                    <td><?php echo number_format($AD) ?></td>
                                                    <?php $SE = 0;
                                                    $SE = round(pow($AD, 2), 2); ?>
                                                    <td><?php echo number_format($SE); ?></td>
                                                    <?php $MSE_DES += $SE ?>
                                                    <td>
                                                        <?php $APE = 0;
                                                        if ($dp['jumlah_kamar'] != 0  && $F_after_DES != 0) {
                                                            $APE = round(abs($AD / ($dp['jumlah_kamar']) * 100), 2);
                                                            echo $APE;
                                                        } else {
                                                            echo $APE = 0;
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php $MAPE_DES += $APE ?>
                                                    <?php
                                                    $F_before_DES = $F_after_DES;
                                                    $F_before2_DES = $F_after2_DES;
                                                    $Aktual_DES = $dp['jumlah_kamar'];
                                                    // $A_before = $dp['jumlah'];  
                                                    ?>
                                                    <?php $rank_DES++; ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir DES -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseBlok2B">
                                        Grafik Garis Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseBlok2B" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div id="prediksi_akomodasi_kamar_2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseBlok2B">
                                        Grafik Batang Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseBlok2B" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div id="prediksi_akomodasi_kamar_2b" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a>
                                        Data Prediksi
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse in">
                                <div class="box-body blok2B">
                                    <!-- ini tabel -->
                                    <table id="blok2B" class="table table-bordered table-striped" style="text-align: right">
                                        <thead>
                                            <tr>
                                                <th hidden>Periode</th>
                                                <th>Tahun</th>
                                                <th>Prediksi Regresi Linear</th>
                                                <th>Prediksi Single Exponential Smoothing</th>
                                                <th>Prediksi Double Exponential Smoothing</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $DES = 0;
                                            $total_prediksi = 0; ?>
                                            <?php for (
                                                $forecast = 0;
                                                $forecast <= 4;
                                                $forecast++
                                            ) { ?>
                                                <tr>
                                                    <td style="text-align: left;" hidden><?php echo $rank_RL + $forecast ?></td>
                                                    <td><?php echo $tahun + ($forecast); ?>
                                                    <td><?php
                                                        echo number_format(($f + ($e * (($rank_RL + $forecast))))); ?>
                                                        <?php if ($rank_RL != 0) { ?>
                                                            <?php $prediksi_RL = ((($f + ($e * (($rank_RL + $forecast)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
                                                            (<?php if ($prediksi_RL > 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else if ($prediksi_RL == 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else if ($prediksi_RL < 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                                        <?php } else { ?>
                                                            <?php } ?>)
                                                        <?php } else {
                                                        } ?>
                                                    </td>
                                                    <td><?php if ($forecast == 0) {
                                                            $F_after_SES = (($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                                            echo number_format($F_after_SES); ?>
                                                            <?php if ($rank_RL != 0) { ?>
                                                                <?php $prediksi_SES = ((round($F_after_SES) - $A_before) / $A_before) * 100; ?>
                                                                (<?php if ($prediksi_SES > 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else if ($prediksi_SES == 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else if ($prediksi_SES < 0) { ?>
                                                                <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                                            <?php } else { ?>
                                                                <?php } ?>)
                                                            <?php } else {
                                                            } ?>
                                                        <?php } else {
                                                            echo "-";
                                                        } ?>
                                                    </td>
                                                    <td><?php
                                                        $DES = round(($at_DES + ($bt_DES * ($forecast + 1))));
                                                        echo number_format($DES); ?>
                                                        <?php if ($rank_RL != null) { ?>
                                                            <?php $prediksi_DES = (($DES - $Aktual_DES) / $Aktual_DES) * 100; ?>
                                                            (<?php if ($prediksi_DES > 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else if ($prediksi_DES == 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else if ($prediksi_DES < 0) { ?>
                                                            <span class="description-percentage text-black"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                                        <?php } else { ?>
                                                            <?php } ?>)
                                                        <?php } else {
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Regresi Linear</span>
                                    <span class="info-box-number">
                                        <?php if ($rank_RL != 0) {
                                            echo round($MAPE_RL / $rank_RL, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_RL != 0) {
                                                                                    echo round($MAPE_RL / $rank_RL, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_RL != 0) {
                                                                            $TEST_RL = round($MAPE_RL / $rank_RL, 2);
                                                                        } else {
                                                                            $TEST_RL = 51;
                                                                        } ?>
                                        <?php if ($TEST_RL <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST_RL > 10) {
                                            if ($TEST_RL > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST_RL > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST_RL > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Single Exponential Smoothing <?php echo $alfa_terkecil_SES ?></span>
                                    <span class="info-box-number">
                                        <?php if ($rank_SES != 0) {
                                            echo round($MAPE_SES / $rank_SES, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_SES != 0) {
                                                                                    echo round($MAPE_SES / $rank_DES, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_SES != 0) {
                                                                            $TEST = round($MAPE_SES / $rank_SES, 2);
                                                                        } else {
                                                                            $TEST = 51;
                                                                        } ?>
                                        <?php if ($TEST <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST > 10) {
                                            if ($TEST > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE Double Exponential Smoothing <?php echo $alfa_terkecil_DES ?></span>
                                    <span class="info-box-number">
                                        <?php if ($rank_DES != 0) {
                                            echo round($MAPE_DES / $rank_DES, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank_DES != 0) {
                                                                                    echo round($MAPE_DES / $rank_DES, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank_DES != 0) {
                                                                            $TEST = round($MAPE_DES / $rank_DES, 2);
                                                                        } else {
                                                                            $TEST = 51;
                                                                        } ?>
                                        <?php if ($TEST <= 10) {
                                            echo "Akurasi Prediksi <b>Tinggi</b>";
                                        } else if ($TEST > 10) {
                                            if ($TEST > 50) {
                                                echo "Akurasi Prediksi <b>Rendah</b>";
                                            } else if ($TEST > 20) {
                                                echo "Akurasi Prediksi <b>Reasonable</b>";
                                            } else if ($TEST > 11) {
                                                echo "Akurasi Prediksi <b>Baik</b>";
                                            }
                                        } ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel grafik prediksi -->
            <table id="data_prediksi_akomodasi_kamar_2" border="1" hidden>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Prediksi Regresi Linear</th>
                        <th>Prediksi Single Exponential Smoothing</th>
                        <th>Prediksi Double Exponential Smoothing</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank_grafik = 0; ?>
                    <?php
                    $rank = 0;
                    $rank_SES = -1;
                    $prediksi_grafik = 0;
                    $F_before_SES = 0;
                    $F_after_SES = 0;
                    $F_before2_SES = 0;
                    $F_after2_SES = 0;
                    $A_before_SES = 0;
                    $F_before_DES = 0;
                    $F_after_DES = 0;
                    $F_before2_DES = 0;
                    $F_after2_DES = 0;
                    $A_before_DES = 0;
                    $DES = 0;
                    $at_DES = 0;
                    $bt_DES = 0;  ?>
                    <?php foreach ($data as $dp) { ?>
                        <!-- RL -->
                        <?php
                        $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                        <?php ($prediksi_grafik) ?>
                        <?php $rank_grafik++; ?>
                        <!--  ./RL -->
                        <!-- SE -->
                        <?php $rank_SES++; ?>
                        <?php if ($rank_SES != 0) {
                            $F_after_SES = round(($alfa_terkecil_SES * $A_before_SES) + ((1 - $alfa_terkecil_SES) * ($F_before_SES)));
                        } else {
                            $F_after_SES = 0;
                        } ?>
                        <?php $F_after_SES;
                        $A_before_SES = $dp['jumlah_kamar'];
                        $F_before_SES = $F_after_SES; ?>
                        <!-- ./SE -->

                        <?php if ($rank != 0) {
                            $F_after_DES = round(($alfa_terkecil_DES * $dp['jumlah_kamar']) + ((1 - $alfa_terkecil_DES) * ($F_before_DES)));
                        } else {
                            $F_after_DES = $dp['jumlah_kamar'];
                        } ?>

                        <?php
                        if ($rank != 0) {
                            $F_after2_DES = round(($alfa_terkecil_DES * $F_after_DES) + ((1 - $alfa_terkecil_DES) * $F_before2_DES));
                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                            $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                            $DES = round(($at_DES + ($bt_DES)));
                        } else {
                            $F_after2_DES = $dp['jumlah_kamar'];
                            $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                            $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                            $DES = round(($at_DES + ($bt_DES)));
                        } ?>
                        <?php $DES;  ?>
                        <?php
                        $F_before_DES = $F_after_DES;
                        $F_before2_DES = $F_after2_DES;
                        $A_before_DES = $dp['jumlah_kamar'];  ?>
                        <?php $rank++; ?>
                    <?php } ?>
                    <?php for (
                        $forecast = 0;
                        $forecast <= 4;
                        $forecast++
                    ) { ?>
                        <tr>
                            <td><?php echo $tahun + ($forecast); ?>
                            <td><?php
                                echo round(($f + ($e * (($rank_grafik + $forecast))))); ?>
                            </td>
                            <td><?php if ($forecast == 0) {
                                    $F_after_SES = (($alfa_terkecil_SES * $A_before_SES) + ((1 - $alfa_terkecil_SES) * ($F_before_SES)));
                                    echo round($F_after_SES);
                                } else {
                                    echo "-";
                                } ?>
                            </td>
                            <td><?php
                                $DES = round(($at_DES + ($bt_DES * ($forecast + 1))));
                                echo $DES;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.Tabel grafik prediksi -->
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->

    <script>
        $(document).ready(function() {
            var table = $('#blok2A').DataTable({
                'buttons': [{
                        extend: 'csvHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'print',
                        title: '<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                            echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA</h4>'
                    }
                    // {
                    //   extend: 'colvis',
                    //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                    // }
                ],
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true
            });

            table.buttons().container()
                .appendTo('.blok2A .col-sm-6:eq(0)');
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#blok2B').DataTable({
                'buttons': [{
                        extend: 'csvHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA'
                    },
                    {
                        extend: 'print',
                        title: '<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                            echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> SIPTA</h4>'
                    }
                    // {
                    //   extend: 'colvis',
                    //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                    // }
                ],
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true
            });

            table.buttons().container()
                .appendTo('.blok2B .col-sm-6:eq(0)');
        });
    </script>

    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('prediksi_akomodasi_unit_2', {
            data: {
                table: 'data_prediksi_akomodasi_unit_2'
            },
            chart: {
                type: 'line'
            },
            title: {
                useHTML: true,
                text: "<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Unit'
                }
            },
            xAxis: {
                allowDecimals: false
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ';
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('prediksi_akomodasi_unit_2b', {
            data: {
                table: 'data_prediksi_akomodasi_unit_2'
            },
            chart: {
                type: 'bar'
            },
            title: {
                useHTML: true,
                text: "<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Unit'
                }
            },
            xAxis: {
                allowDecimals: false
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ';
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('prediksi_akomodasi_kamar_2', {
            data: {
                table: 'data_prediksi_akomodasi_kamar_2'
            },
            chart: {
                type: 'line'
            },

            title: {
                useHTML: true,
                text: "<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Kamar'
                }
            },
            xAxis: {
                allowDecimals: false
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ';
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('prediksi_akomodasi_kamar_2b', {
            data: {
                table: 'data_prediksi_akomodasi_kamar_2'
            },
            chart: {
                type: 'bar'
            },

            title: {
                useHTML: true,
                text: "<h4>Prediksi Restoran di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4;
                                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Kamar'
                }
            },
            xAxis: {
                allowDecimals: false
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ';
                }
            }
        });
    </script>