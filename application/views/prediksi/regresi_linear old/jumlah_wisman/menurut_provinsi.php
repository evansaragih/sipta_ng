<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_RL_Wisman/cari_blok2") ?>">
                        
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

    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid" id="tabel_blok2">
                <div class="box-header with-border">
                    <center>
                        <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Jumlah Wisman ke Bali
                            <?php $tahun_data = $tahun - 1;
                            echo "<br/> Sampai Tahun " . $tahun_data; ?></p>
                    </center>
                </div>
                <div class="box-body blok2">
                    <!-- ini tabel -->
                    <table id="blok2" class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr style="background-color:#6e0006; color:white;">
                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun</th>
                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">bulan</th>
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
                                    <td><?php echo $dp['bulan'] ?></td>
                                    <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                                    <?php $total1 = $dp['jumlah'] * $rank; ?>
                                    <!-- x*y -->
                                    <?php $total_Y += $dp['jumlah']; ?>
                                    <?php $total_X += $rank; ?>
                                    <?php $total_XY += $total1; ?>
                                    <td><?php echo format_ribuan($total1) ?></td>
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
        <div class="col-md-4">
            <div class="box box-solid" id="">
                <div class="box-header with-border">
                    <center>
                        <p class="box-title" style="text-align: center; font-size: 13pt;">Nilai X, Y, XY, XX, Rata" X, Rata" Y <br /><?php echo "Tahun " . $tahun_data ?></p>
                    </center>
                </div>
                <div class="box-body">
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
                                <td><?php echo $rank; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑X</td>
                                <td><?php echo format_ribuan($total_X); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑Y</td>
                                <td><?php echo format_ribuan($total_Y); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑XY</td>
                                <td><?php echo format_ribuan($total_XY); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah ∑X^2</td>
                                <td><?php echo format_ribuan($x_pangkat2); ?></td>
                            </tr>
                            <?php $rata_X = 0;
                            $rata_Y = 0;
                            $rata_X = $total_X / $rank;
                            $rata_Y = $total_Y / $rank; ?>
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
                            $persamaan1 = $total_Y . " = " . $rank . "a + " . $total_X . "b";
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
                            $c = $x_pangkat2 * $rank; //b
                            $d = $total_XY * $rank; //sigmaXY Persamaan 1
                            $e = ($b - $d) / ($a - $c); //nilai B
                            //nilai A
                            $f = (($total_Y - $total_X * $e)) / $rank;
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

    <div class="box box-solid" id="">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Jumlah Wisman ke Bali
                    <?php
                    echo "<br/> Sampai Tahun " . $tahun ?></p>
            </center>
        </div>
        <div class="box-body mape_blok2">
            <!-- ini tabel -->
            <table id="mape_blok2" class="table table-bordered table-striped" style="text-align: right">
                <thead>
                    <tr>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Tahun Aktual</th>
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
                            <td><?php echo $dp['bulan'] ?></td>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <td>
                                <?php $prediksi1 = 0;
                                $prediksi1 = $f + ($e * (($rank1))) ?>
                                <?php echo format_ribuan($prediksi1) ?>
                                <?php $y++; ?>
                            </td>
                            <td>
                                <?php $AD = 0;
                                $AD = round(abs(($dp['jumlah']) - $prediksi1));
                                echo number_format($AD); ?>
                                <?php $MAD += $AD ?>
                            </td>
                            <td>
                                <?php $SE = 0;
                                $SE = round(pow($AD, 2), 2);
                                echo number_format($SE); ?>
                                <?php $MSE += $SE ?>
                            </td>
                            <td>
                                <?php $APE = 0;
                                if ($dp['jumlah'] != 0) {
                                    $APE = round(abs($AD / ($dp['jumlah']) * 100), 2);
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
    <!-- Info Boxes Style 2 -->
    <div class="row">
        <div class="col-md-4">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">MAPE</span>
                    <span class="info-box-number"><?php echo round($MAPE / $rank1, 2) . "%" ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo round($MAPE / $rank1, 2) . "%" ?>"></div>
                    </div>
                    <span class="progress-description"> <?php $TEST = round($MAPE / $rank1, 2); ?>
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
                    <span class="info-box-number"><?php echo number_format(round($MAD / $rank1)) ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 0"></div>
                    </div>
                    <span class="progress-description">
                        <?php echo "Total MAD " . number_format($MAD) ?>
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
                    <span class="info-box-number"><?php echo number_format(round($MSE / $rank1)) ?></span>
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

    <div class="box box-solid" id="grafik_blok2">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Jumlah Wisman ke Bali
                    <?php
                    echo "<br/> Sampai Tahun " . $tahun ?></p>
            </center>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box-body">
                    <div id="prediksi_jwisman_blok2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-body">
                    <!-- ini tabel -->
                    <table class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Tahun Aktual</th>
                                <th>Tahun Prediksi</th>
                                <th>APE(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Januari <?php echo $rank1 ?></td>
                                <td><?php echo format_ribuan($bulan_1->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_jan = 0;
                                    $prediksi_jan = $f + ($e * (($rank) + 1)) ?>
                                    <?php echo format_ribuan($prediksi_jan) ?>
                                </td>
                                <td>
                                    <?php $APE_jan = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_jan = round(abs((($bulan_1->jumlah) - $prediksi_jan) / ($bulan_1->jumlah) * 100), 2);
                                        echo $APE_jan;
                                    } else {
                                        $APE_jan = 0;
                                        echo $APE_jan;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Februari</td>
                                <td><?php echo format_ribuan($bulan_2->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_feb = 0;
                                    $prediksi_feb = $f + ($e * (($rank) + 2)) ?>
                                    <?php echo format_ribuan($prediksi_feb) ?>
                                </td>
                                <td>
                                    <?php $APE_feb = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_feb = round(abs((($bulan_2->jumlah) - $prediksi_feb) / ($bulan_2->jumlah) * 100), 2);
                                        echo $APE_feb;
                                    } else {
                                        $APE_feb = 0;
                                        echo $APE_feb;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Maret</td>
                                <td><?php echo format_ribuan($bulan_3->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_mar = 0;
                                    $prediksi_mar = $f + ($e * (($rank) + 3)) ?>
                                    <?php echo format_ribuan($prediksi_mar) ?>
                                </td>
                                <td>
                                    <?php $APE_mar = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_mar = round(abs((($bulan_3->jumlah) - $prediksi_mar) / ($bulan_3->jumlah) * 100), 2);
                                        echo $APE_mar;
                                    } else {
                                        $APE_mar = 0;
                                        echo $APE_mar;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>April</td>
                                <td><?php echo format_ribuan($bulan_4->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_apr = 0;
                                    $prediksi_apr = $f + ($e * (($rank) + 4)) ?>
                                    <?php echo format_ribuan($prediksi_apr) ?>
                                </td>
                                <td>
                                    <?php $APE_apr = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_apr = round(abs((($bulan_4->jumlah) - $prediksi_apr) / ($bulan_4->jumlah) * 100), 2);
                                        echo $APE_apr;
                                    } else {
                                        $APE_apr = 0;
                                        echo $APE_apr;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Mei</td>
                                <td><?php echo format_ribuan($bulan_5->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_mei = 0;
                                    $prediksi_mei = $f + ($e * (($rank) + 5)) ?>
                                    <?php echo format_ribuan($prediksi_mei) ?>
                                </td>
                                <td>
                                    <?php $APE_mei = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_mei = round(abs((($bulan_5->jumlah) - $prediksi_mei) / ($bulan_5->jumlah) * 100), 2);
                                        echo $APE_mei;
                                    } else {
                                        $APE_mei = 0;
                                        echo $APE_mei;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Juni</td>
                                <td><?php echo format_ribuan($bulan_6->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_juni = 0;
                                    $prediksi_juni = $f + ($e * (($rank) + 6)) ?>
                                    <?php echo format_ribuan($prediksi_juni) ?>
                                </td>
                                <td>
                                    <?php $APE_juni = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_juni = round(abs((($bulan_6->jumlah) - $prediksi_juni) / ($bulan_6->jumlah) * 100), 2);
                                        echo $APE_juni;
                                    } else {
                                        $APE_juni = 0;
                                        echo $APE_juni;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Juli</td>
                                <td><?php echo format_ribuan($bulan_7->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_juli = 0;
                                    $prediksi_juli = $f + ($e * (($rank) + 7)) ?>
                                    <?php echo format_ribuan($prediksi_juli) ?>
                                </td>
                                <td>
                                    <?php $APE_juli = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_juli = round(abs((($bulan_7->jumlah) - $prediksi_juli) / ($bulan_7->jumlah) * 100), 2);
                                        echo $APE_juli;
                                    } else {
                                        $APE_juli = 0;
                                        echo $APE_juli;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Agustus</td>
                                <td><?php echo format_ribuan($bulan_8->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_agt = 0;
                                    $prediksi_agt = $f + ($e * (($rank) + 8)) ?>
                                    <?php echo format_ribuan($prediksi_agt) ?>
                                </td>
                                <td>
                                    <?php $APE_agt = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_agt = round(abs((($bulan_8->jumlah) - $prediksi_agt) / ($bulan_8->jumlah) * 100), 2);
                                        echo $APE_agt;
                                    } else {
                                        $APE_agt = 0;
                                        echo $APE_agt;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>September</td>
                                <td><?php echo format_ribuan($bulan_9->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_sept = 0;
                                    $prediksi_sept = $f + ($e * (($rank) + 9)) ?>
                                    <?php echo format_ribuan($prediksi_sept) ?>
                                </td>
                                <td>
                                    <?php $APE_sept = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_sept = round(abs((($bulan_9->jumlah) - $prediksi_sept) / ($bulan_9->jumlah) * 100), 2);
                                        echo $APE_sept;
                                    } else {
                                        $APE_sept = 0;
                                        echo $APE_sept;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Oktober</td>
                                <td><?php echo format_ribuan($bulan_10->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_okt = 0;
                                    $prediksi_okt = $f + ($e * (($rank) + 10)) ?>
                                    <?php echo format_ribuan($prediksi_okt) ?>
                                </td>
                                <td>
                                    <?php $APE_okt = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_okt = round(abs((($bulan_10->jumlah) - $prediksi_okt) / ($bulan_10->jumlah) * 100), 2);
                                        echo $APE_okt;
                                    } else {
                                        $APE_okt = 0;
                                        echo $APE_okt;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>November</td>
                                <td><?php echo format_ribuan($bulan_11->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_nov = 0;
                                    $prediksi_nov = $f + ($e * (($rank) + 11)) ?>
                                    <?php echo format_ribuan($prediksi_nov) ?>
                                </td>
                                <td>
                                    <?php $APE_nov = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_nov = round(abs((($bulan_11->jumlah) - $prediksi_nov) / ($bulan_11->jumlah) * 100), 2);
                                        echo $APE_nov;
                                    } else {
                                        $APE_nov = 0;
                                        echo $APE_nov;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Desember</td>
                                <td><?php echo format_ribuan($bulan_12->jumlah) ?></td>
                                <td>
                                    <?php $prediksi_des = 0;
                                    $prediksi_des = $f + ($e * (($rank) + 12)) ?>
                                    <?php echo format_ribuan($prediksi_des) ?>
                                </td>
                                <td>
                                    <?php $APE_des = 0;
                                    if ($bulan_1->jumlah != 0) {
                                        $APE_des = round(abs((($bulan_12->jumlah) - $prediksi_des) / ($bulan_12->jumlah) * 100), 2);
                                        echo $APE_des;
                                    } else {
                                        $APE_des = 0;
                                        echo $APE_des;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <?php
                                $total_aktual = 0;
                                $total_prediksi = 0;
                                $total_APE = 0;
                                $total_aktual = $bulan_1->jumlah + $bulan_2->jumlah + $bulan_3->jumlah + $bulan_4->jumlah + $bulan_5->jumlah + $bulan_6->jumlah +
                                    $bulan_7->jumlah + $bulan_8->jumlah + $bulan_9->jumlah + $bulan_10->jumlah + $bulan_11->jumlah + $bulan_12->jumlah;
                                $total_prediksi = $prediksi_jan + $prediksi_feb + $prediksi_mar + $prediksi_apr + $prediksi_mei + $prediksi_juni + $prediksi_juli +
                                    $prediksi_agt + $prediksi_sept + $prediksi_okt + $prediksi_nov + $prediksi_des;
                                $total_APE = $APE_jan + $APE_feb + $APE_mar + $APE_apr + $APE_mei + $APE_juni + $APE_juli + $APE_agt + $APE_sept + $APE_okt + $APE_nov + $APE_des;
                                ?>
                                <td><?php echo number_format($total_aktual) ?></td>
                                <td><?php echo number_format($total_prediksi) ?></td>
                                <td><?php echo round($total_APE, 2) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<table id="data_prediksi_wisman_blok2" border="1" hidden>
    <thead>
        <tr>
            <th>Bulan</th>
            <th><?php echo $tahun . " (prediksi)" ?></th>
            <th><?php echo $tahun ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Januari</td>
            <td>
                <?php $prediksi_jan = 0;
                $prediksi_jan = $f + ($e * (($rank) + 1)) ?>
                <?php echo round($prediksi_jan) ?>
            </td>
            <td><?php echo ($bulan_1->jumlah) ?></td>
        </tr>
        <tr>
            <td>Februari</td>
            <td>
                <?php $prediksi_feb = 0;
                $prediksi_feb = $f + ($e * (($rank) + 2)) ?>
                <?php echo round($prediksi_feb) ?>
            </td>
            <td><?php echo ($bulan_2->jumlah) ?></td>
        </tr>
        <tr>
            <td>Maret</td>
            <td>
                <?php $prediksi_mar = 0;
                $prediksi_mar = $f + ($e * (($rank) + 3)) ?>
                <?php echo round($prediksi_mar) ?>
            </td>
            <td><?php echo ($bulan_3->jumlah) ?></td>
        </tr>
        <tr>
            <td>April</td>
            <td>
                <?php $prediksi_apr = 0;
                $prediksi_apr = $f + ($e * (($rank) + 4)) ?>
                <?php echo round($prediksi_apr) ?>
            </td>
            <td><?php echo ($bulan_4->jumlah) ?></td>
        </tr>
        <tr>
            <td>Mei</td>
            <td>
                <?php $prediksi_mei = 0;
                $prediksi_mei = $f + ($e * (($rank) + 5)) ?>
                <?php echo round($prediksi_mei) ?>
            </td>
            <td><?php echo ($bulan_5->jumlah) ?></td>
        </tr>
        <tr>
            <td>Juni</td>
            <td>
                <?php $prediksi_juni = 0;
                $prediksi_juni = $f + ($e * (($rank) + 6)) ?>
                <?php echo round($prediksi_juni) ?>
            </td>
            <td><?php echo ($bulan_6->jumlah) ?></td>
        </tr>
        <tr>
            <td>Juli</td>
            <td>
                <?php $prediksi_juli = 0;
                $prediksi_juli = $f + ($e * (($rank) + 7)) ?>
                <?php echo round($prediksi_juli) ?>
            </td>
            <td><?php echo ($bulan_7->jumlah) ?></td>
        </tr>
        <tr>
            <td>Agustus</td>
            <td>
                <?php $prediksi_agt = 0;
                $prediksi_agt = $f + ($e * (($rank) + 8)) ?>
                <?php echo round($prediksi_agt) ?>
            </td>
            <td><?php echo ($bulan_8->jumlah) ?></td>
        </tr>
        <tr>
            <td>September</td>
            <td>
                <?php $prediksi_sept = 0;
                $prediksi_sept = $f + ($e * (($rank) + 9)) ?>
                <?php echo round($prediksi_sept) ?>
            </td>
            <td><?php echo ($bulan_9->jumlah) ?></td>
        </tr>
        <tr>
            <td>Oktober</td>
            <td>
                <?php $prediksi_okt = 0;
                $prediksi_okt = $f + ($e * (($rank) + 10)) ?>
                <?php echo round($prediksi_okt) ?>
            </td>
            <td><?php echo ($bulan_10->jumlah) ?></td>
        </tr>
        <tr>
            <td>November</td>
            <td>
                <?php $prediksi_nov = 0;
                $prediksi_nov = $f + ($e * (($rank) + 11)) ?>
                <?php echo round($prediksi_nov) ?>
            </td>
            <td><?php echo ($bulan_11->jumlah) ?></td>
        </tr>
        <tr>
            <td>Desember</td>
            <td>
                <?php $prediksi_des = 0;
                $prediksi_des = $f + ($e * (($rank) + 12)) ?>
                <?php echo round($prediksi_des) ?>
            </td>
            <td><?php echo ($bulan_12->jumlah) ?></td>
        </tr>
    </tbody>
</table>

</div>

<script>
    $(document).ready(function() {
        var table = $('#blok2').DataTable({
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
            .appendTo('.blok2 .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#mape_blok2').DataTable({
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
            .appendTo('.mape_blok2 .col-sm-6:eq(0)');
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
    Highcharts.chart('prediksi_jwisman_blok2', {
        data: {
            table: 'data_prediksi_wisman_blok2'
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
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ';
            }
        }
    });
</script>