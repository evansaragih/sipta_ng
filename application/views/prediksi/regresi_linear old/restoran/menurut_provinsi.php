<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Wilayah</button>
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Provinsi</button>
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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_RL_Restoran/cari_blok2") ?>">
                        <div class="col-md-2">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
                                $year_search = $year_now - 1;
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
            <li class="active"><a href="#tab_1a_3" data-toggle="tab">Unit</a></li>
            <li><a href="#tab_2a_3" data-toggle="tab">Kamar</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-line-chart"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1a_3">
                <div class="box-body">
                    <div class="box-header with-border">
                        <center>
                            <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Restoran di Bali
                                <?php $tahun_data = $tahun - 1;
                                echo "<br/> Sampai Tahun " . $tahun_data; ?></p>
                        </center>
                    </div>
                    <div class="box-body blok3A">
                        <!-- ini tabel -->
                        <table id="blok3A" class="table table-bordered table-striped" style="text-align: right">
                            <thead>
                                <tr style="background-color:#6e0006; color:white;">
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun</th>
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah unit (y1)</th>
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">jumlah kamar (y2)</th>
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">(x).(y1)</th>
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">(x).(y2)</th>
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">x^2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total1 = 0;
                                $total2 = 0;
                                $total_Y = 0;
                                $total_Y2 = 0;
                                $total_X = 0;
                                $total_XY = 0;
                                $total_XY2 = 0;
                                $pangkat2 = 0;
                                $x_pangkat2 = 0;
                                $rank = 0; ?>
                                <?php function format_ribuan($nilai)
                                {
                                    return number_format($nilai, 0, ',', ',');
                                } ?>
                                <?php foreach ($data as $dp) { ?>
                                    <tr>
                                        <?php $rank++; ?>
                                        <td style="text-align: left;"><?php echo $rank ?></td>
                                        <td><?php echo $dp['tahun'] ?></td>
                                        <td><?php echo format_ribuan($dp['jumlah_unit']) ?></td>
                                        <td><?php echo format_ribuan($dp['jumlah_kamar']) ?></td>
                                        <?php $total1 = $dp['jumlah_unit'] * $rank; ?>
                                        <?php $total2 = $dp['jumlah_kamar'] * $rank; ?>
                                        <!-- x*y -->
                                        <?php $total_Y += $dp['jumlah_unit']; ?>
                                        <?php $total_Y2 += $dp['jumlah_kamar']; ?>
                                        <?php $total_X += $rank; ?>
                                        <?php $total_XY += $total1; ?>
                                        <?php $total_XY2 += $total2; ?>
                                        <td><?php echo format_ribuan($total1) ?></td>
                                        <td><?php echo format_ribuan($total2) ?></td>
                                        <?php $pangkat2 = pow($rank, 2); ?>
                                        <td><?php echo $pangkat2 ?></td>
                                        <?php $x_pangkat2 += $pangkat2; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2a_3">
                <div class="box-body">
                    <table class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr style="background-color:#6e0006; color:white;">
                                <th>Data</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah Data (n)</td>
                                <td><?php echo $rank; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑X</td>
                                <td><?php echo format_ribuan($total_X); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑Y1</td>
                                <td><?php echo format_ribuan($total_Y); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑Y2</td>
                                <td><?php echo format_ribuan($total_Y2); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑XY</td>
                                <td><?php echo format_ribuan($total_XY); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑XY2</td>
                                <td><?php echo format_ribuan($total_XY2); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑X^2</td>
                                <td><?php echo format_ribuan($x_pangkat2); ?></td>
                            </tr>
                            <?php $rata_X = 0;
                            $rata_Y = 0;
                            $rata_Y2 = 0;
                            if ($rank != 0) {
                                $rata_X = $total_X / $rank;
                                $rata_Y = $total_Y / $rank;
                                $rata_Y2 = $total_Y2 / $rank;
                            } else {
                                $rank = 1;
                            } ?>
                            <tr>
                                <td>Rata-rata X</td>
                                <td><?php echo round($rata_X, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Rata-rata Y</td>
                                <td><?php echo round($rata_Y, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Rata-rata Y2</td>
                                <td><?php echo round($rata_Y2, 2); ?></td>
                            </tr>
                            <?php $persamaan1 = 0;
                            $persamaan2 = 0;
                            $persamaan3 = 0;
                            $persamaan4 = 0;
                            $persamaan1 = $total_Y . " = " . $rank . "a + " . $total_X . "b";
                            $persamaan2 = $total_XY . " = " . $total_X . "a + " . $x_pangkat2 . "b";
                            $persamaan3 = $total_Y2 . " = " . $rank . "c + " . $total_X . "d";
                            $persamaan4 = $total_XY2 . " = " . $total_X . "c + " . $x_pangkat2 . "d";
                            ?>
                            <tr>
                                <td>Persamaan 1 (∑y = a.n + b. ∑x)</td>
                                <td><?php echo $persamaan1; ?></td>
                            </tr>
                            <tr>
                                <td>Persamaan 2 (∑xy = a.∑x + b.∑x^2)</td>
                                <td><?php echo $persamaan2; ?></td>
                            </tr>
                            <tr>
                                <td>Persamaan 3 (∑y = c.n + d. ∑x)</td>
                                <td><?php echo $persamaan3; ?></td>
                            </tr>
                            <tr>
                                <td>Persamaan 4 (∑xy = c.∑x + d.∑x^2)</td>
                                <td><?php echo $persamaan4; ?></td>
                            </tr>
                            <?php $a = 0;
                            $b = 0;
                            $c = 0;
                            $d = 0;
                            $e = 0;
                            $f = 0;
                            $g = 0;
                            $h = 0;
                            //nilai B
                            // $a = $rank*$total_X; //a
                            $a = $total_X * $total_X; //b
                            $b = $total_Y * $total_X; //sigmaY Persamaan 1
                            // $d = $total_X*$rank; //a
                            $c = $x_pangkat2 * $rank; //b
                            $d = $total_XY * $rank; //sigmaXY Persamaan 2

                            if ($a - $c != 0) {
                                $e = ($b - $d) / ($a - $c); //nilai B
                            } else {
                                $e = 0;
                            }
                            //nilai A
                            $f = (($total_Y - $total_X * $e)) / $rank;

                            //nilai D
                            $a = $total_X * $total_X; //b
                            $b = $total_Y2 * $total_X; //sigmaY Persamaan 1
                            $c = $x_pangkat2 * $rank; //b
                            $d = $total_XY2 * $rank; //sigmaXY Persamaan 2

                            if ($a - $c != 0) {
                                $g = ($b - $d) / ($a - $c); //nilai B
                            } else {
                                $g = 0;
                            }
                            //nilai C SAMA seperti Nilai A
                            $h = (($total_Y2 - $total_X * $g)) / $rank;
                            ?>
                            <tr>
                                <td>Nilai A</td>
                                <td><?php echo round($f, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Nilai B</td>
                                <td><?php echo round($e, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Nilai C</td>
                                <td><?php echo round($h, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Nilai D</td>
                                <td><?php echo round($g, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->

    <div class="box box-solid" id="tabel3_blok3">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Restoran di Bali
                    <?php
                    echo "<br/> Sampai Tahun " . $tahun ?></p>
            </center>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box-body blok3B">
                    <!-- ini tabel -->
                    <table id="blok3B" class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Tahun</th>
                                <th>Tahun Aktual Unit</th>
                                <th>Tahun Prediksi</th>
                                <th>AD</th>
                                <th>SE</th>
                                <th>APE(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rank1 = 0;
                            $MAPE = 0;
                            $MAD = 0;
                            $MSE = 0;
                            $y = 0; ?>
                            <?php foreach ($data_MAPE as $dp) { ?>
                                <tr> <?php $rank1++ ?>
                                    <td style="text-align: left;"><?php echo $rank1 ?></td>
                                    <td><?php echo $dp['tahun'] ?></td>
                                    <td><?php echo format_ribuan($dp['jumlah_unit']) ?></td>
                                    <td>
                                        <?php $prediksi1 = 0;
                                        $prediksi1 = $f + ($e * (($rank1))) ?>
                                        <?php echo format_ribuan($prediksi1) ?>
                                        <?php $y++; ?>
                                    </td>
                                    <td>
                                        <?php $AD = 0;
                                        $AD = round(abs(($dp['jumlah_unit']) - $prediksi1));
                                        echo number_format($AD); ?>
                                        <?php $MAD += $AD ?>
                                    </td>
                                    <td>
                                        <?php $SE = 0;
                                        $SE = round(pow($AD, 2),2);
                                        echo number_format($SE); ?>
                                        <?php $MSE += $SE ?>
                                    </td>
                                    <td>
                                        <?php $APE = 0;
                                        if ($dp['jumlah_unit'] != 0) {
                                            $APE = round(abs($AD / ($dp['jumlah_unit']) * 100), 2);
                                            echo $APE;
                                        } else {
                                            echo $APE = 0;
                                        }
                                        ?>
                                        <?php $MAPE += $APE ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MAPE</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo round($MAPE / $rank1, 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php if ($rank1 != 0) {
                                                                        echo round($MAPE / $rank1, 2) . "%";
                                                                    } else {
                                                                        echo "0%";
                                                                    } ?>"></div>
                        </div>
                        <span class="progress-description"> <?php if ($rank1 != 0) {
                                                                $TEST = round($MAPE / $rank1, 2);
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
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MAD</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo number_format(round($MAD / $rank1));
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0"></div>
                        </div>
                        <span class="progress-description">
                            <?php echo "Total MAD " . number_format($MAD) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MSE</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo number_format(round($MSE / $rank1));
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0"></div>
                        </div>
                        <span class="progress-description">
                            <?php echo "Total MSE " . number_format($MSE) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- Info Boxes Style 2 -->
    <div class="box box-solid" id="tabel3_blok1">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Restoran di Bali
                    <?php
                    echo "<br/> Sampai Tahun " . $tahun ?></p>
            </center>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box-body blok3C">
                    <!-- ini tabel -->
                    <table id="blok3C" class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Tahun</th>
                                <th>Tahun Aktual Unit</th>
                                <th>Tahun Prediksi</th>
                                <th>AD</th>
                                <th>SE</th>
                                <th>APE(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rank1 = 0;
                            $MAPE = 0;
                            $MAD = 0;
                            $MSE = 0;
                            $y = 0; ?>
                            <?php foreach ($data_MAPE as $dp) { ?>
                                <tr> <?php $rank1++ ?>
                                    <td style="text-align: left;"><?php echo $rank1 ?></td>
                                    <td><?php echo $dp['tahun'] ?></td>
                                    <td><?php echo format_ribuan($dp['jumlah_kamar']) ?></td>
                                    <td>
                                        <?php $prediksi1 = 0;
                                        $prediksi1 = $h + ($g * (($rank1))) ?>
                                        <?php echo format_ribuan($prediksi1) ?>
                                        <?php $y++; ?>
                                    </td>
                                    <td>
                                        <?php $AD = 0;
                                        $AD = round(abs(($dp['jumlah_kamar']) - $prediksi1));
                                        echo number_format($AD); ?>
                                        <?php $MAD += $AD ?>
                                    </td>
                                    <td>
                                        <?php $SE = 0;
                                        $SE = round(pow($AD, 2),2);
                                        echo number_format($SE); ?>
                                        <?php $MSE += $SE ?>
                                    </td>
                                    <td>
                                        <?php $APE = 0;
                                        if ($dp['jumlah_kamar'] != 0) {
                                            $APE = round(abs($AD / ($dp['jumlah_kamar']) * 100), 2);
                                            echo $APE;
                                        } else {
                                            echo $APE = 0;
                                        }
                                        ?>
                                        <?php $MAPE += $APE ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MAPE</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo round($MAPE / $rank1, 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php if ($rank1 != 0) {
                                                                        echo round($MAPE / $rank1, 2) . "%";
                                                                    } else {
                                                                        echo "0%";
                                                                    } ?>"></div>
                        </div>
                        <span class="progress-description"> <?php if ($rank1 != 0) {
                                                                $TEST = round($MAPE / $rank1, 2);
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
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MAD</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo number_format(round($MAD / $rank1));
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0"></div>
                        </div>
                        <span class="progress-description">
                            <?php echo "Total MAD " . number_format($MAD) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MSE</span>
                        <span class="info-box-number">
                            <?php if ($rank1 != 0) {
                                echo number_format(round($MSE / $rank1));
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0"></div>
                        </div>
                        <span class="progress-description">

                            <?php echo "Total MSE " . number_format($MSE) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>

    <div class="box box-solid" id="grafik-A_blok1">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Restoran di Bali
                    <?php
                    echo "<br/> Sampai Tahun " . $tahun ?></p>
            </center>
        </div>
        <div class="box-body blok3D">
            <!-- ini tabel -->
            <table class="table table-bordered table-striped" id="blok3D" style="text-align: right">
                <thead>
                    <tr>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Tahun Aktual</th>
                        <th>Tahun Prediksi</th>
                        <th>APE(%)</th>
                        <th>Tahun Aktual</th>
                        <th>Tahun Prediksi</th>
                        <th>APE(%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank_grafik = 0;
                    $MAPE_grafik = 0; ?>
                    <?php foreach ($data_MAPE as $dp) { ?>
                        <tr> <?php $rank_grafik++ ?>
                            <td style="text-align: left;"><?php echo $rank_grafik ?></td>
                            <td><?php echo $dp['tahun'] ?></td>
                            <td><?php echo format_ribuan($dp['jumlah_unit']) ?></td>
                            <td>
                                <?php $prediksi_grafik = 0;
                                $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                                <?php echo format_ribuan($prediksi_grafik) ?>
                            </td>
                            <td>
                                <?php $APE_grafik = 0;
                                if ($dp['jumlah_unit'] != 0) {
                                    $APE_grafik = round(abs(((($dp['jumlah_unit']) - round($prediksi_grafik)) / ($dp['jumlah_unit'])) * 100), 2);
                                    echo $APE_grafik;
                                } else {
                                    echo $APE_grafik = 0;
                                }
                                ?>
                                <?php $MAPE_grafik += $APE_grafik ?>
                            </td>
                            <td><?php echo format_ribuan($dp['jumlah_kamar']) ?></td>
                            <td>
                                <?php $prediksi_grafik2 = 0;
                                $prediksi_grafik2 = $h + ($g * (($rank_grafik))) ?>
                                <?php echo format_ribuan($prediksi_grafik2) ?>
                            </td>
                            <td>
                                <?php $APE_grafik = 0;
                                if ($dp['jumlah_kamar'] != 0) {
                                    $APE_grafik = round(abs((($dp['jumlah_kamar']) - round($prediksi_grafik2)) / ($dp['jumlah_kamar']) * 100), 2);
                                    echo $APE_grafik;
                                } else {
                                    echo $APE_grafik = 0;
                                }
                                ?>
                                <?php $MAPE_grafik += $APE_grafik ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1b_3" data-toggle="tab">Unit</a></li>
            <li><a href="#tab_2b_3" data-toggle="tab">Kamar</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-line-chart"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1b_3">
                <div class="box-body">
                    <div id="prediksi_akomodasi_unit_3" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2b_3">
                <div class="box-body">
                    <div id="prediksi_akomodasi_kamar_3" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<table id="data_akomodasi_unit_3" border="1">
    <thead>
        <tr>
            <th>Tahun</th>
            <th>Tahun Aktual</th>
            <th>Tahun Prediksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $rank_grafik = 0; ?>
        <?php foreach ($data_MAPE as $dp) { ?>
            <tr> <?php $rank_grafik++ ?>
                <td><?php echo $dp['tahun'] ?></td>
                <td><?php echo $dp['jumlah_unit'] ?></td>
                <td>
                    <?php $prediksi_grafik = 0;
                    $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                    <?php echo round($prediksi_grafik) ?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td><?php echo $tahun; ?></td>
            <td></td>
            <td><?php echo round($f + ($e * (($rank+1)))) ?></td>
        </tr>
    </tbody>
</table>
<table id="data_akomodasi_kamar_3" border="1">
    <thead>
        <tr>
            <th>Tahun</th>
            <th>Tahun Aktual</th>
            <th>Tahun Prediksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $rank_grafik = 0; ?>
        <?php foreach ($data_MAPE as $dp) { ?>
            <tr> <?php $rank_grafik++ ?>
                <td><?php echo $dp['tahun'] ?></td>
                <td><?php echo $dp['jumlah_kamar'] ?></td>
                <td>
                    <?php $prediksi_grafik = 0;
                    $prediksi_grafik = $h + ($g * (($rank_grafik))) ?>
                    <?php echo round($prediksi_grafik) ?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td><?php echo $tahun; ?></td>
            <td></td>
            <td><?php echo round($h + ($g * (($rank+1)))) ?></td>
        </tr>
    </tbody>
</table>

</div>

<script>
    $(document).ready(function() {
        var table = $('#blok3A').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
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
            .appendTo('.blok3A .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#blok3B').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
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
            .appendTo('.blok3B .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#blok3C').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
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
            .appendTo('.blok3C .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#blok3D').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
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
            .appendTo('.blok3D .col-sm-6:eq(0)');
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
    Highcharts.chart('prediksi_akomodasi_unit_3', {
        data: {
            table: 'data_akomodasi_unit_3'
        },
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Prediksi'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('prediksi_akomodasi_kamar_3', {
        data: {
            table: 'data_akomodasi_kamar_3'
        },
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Prediksi'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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