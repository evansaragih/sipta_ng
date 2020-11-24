<header class="header header--bg2">
    <section class="content">
        <!-- Perhitungan Prediksi Unit Akomodasi -->
        <div class="tab-pane active">
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
        </div>
        <!-- Perhitungan Prediksi Unit Akomodasi -->
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <h2 style="color: white; font-weight: bold;">Akomodasi</h2>
                <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
                <h4 style="color: white;">Jumlah Unit</h4>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php $forecast = 1; ?>
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Regresi Linear</b> <br /><br />
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                echo number_format(($f + ($e * (($rank_RL))))); ?> <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != 0) { ?>
                                        <?php $prediksi_RL = ((($f + ($e * (($rank_RL)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
                                        (<?php if ($prediksi_RL > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format(($f + ($e * (($rank_RL + $forecast)))) - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Single Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php if ($forecast == 1) {
                                    $F_after_SES = (($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                    echo number_format($F_after_SES); ?><br />
                                    <a style="font-size: 16pt;">
                                        <?php if ($rank_RL != 0) { ?>
                                            <?php $prediksi_SES = ((round($F_after_SES) - $A_before) / $A_before) * 100; ?>
                                            (<?php if ($prediksi_SES > 0) { ?>
                                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES == 0) { ?>
                                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES < 0) { ?>
                                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else { ?>
                                            <?php } ?>)
                                        <?php } else {
                                        } ?>
                                    <?php } else {
                                    echo "-";
                                } ?>
                                    </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($F_after_SES - $A_before);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Double Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                $DES = round(($at_DES + ($bt_DES * ($forecast))));
                                echo number_format($DES); ?>
                                <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != null) { ?>
                                        <?php $prediksi_DES = (($DES - $Aktual_DES) / $Aktual_DES) * 100; ?>
                                        (<?php if ($prediksi_DES > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($DES - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Perhitungan Prediksi Kamar Akomodasi -->
        <div class="tab-pane" hidden>
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
        </div>
        <!-- Perhitungan Prediksi Kursi Akomodasi -->

        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <h4 style="color: white;">Jumlah Kamar</h4>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php $forecast = 1; ?>
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Regresi Linear</b> <br /><br />
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                echo number_format(($f + ($e * (($rank_RL))))); ?> <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != 0) { ?>
                                        <?php $prediksi_RL = ((($f + ($e * (($rank_RL)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
                                        (<?php if ($prediksi_RL > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format(($f + ($e * (($rank_RL + $forecast)))) - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Single Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php if ($forecast == 1) {
                                    $F_after_SES = (($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                    echo number_format($F_after_SES); ?><br />
                                    <a style="font-size: 16pt;">
                                        <?php if ($rank_RL != 0) { ?>
                                            <?php $prediksi_SES = ((round($F_after_SES) - $A_before) / $A_before) * 100; ?>
                                            (<?php if ($prediksi_SES > 0) { ?>
                                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES == 0) { ?>
                                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES < 0) { ?>
                                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else { ?>
                                            <?php } ?>)
                                        <?php } else {
                                        } ?>
                                    <?php } else {
                                    echo "-";
                                } ?>
                                    </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($F_after_SES - $A_before);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Double Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                $DES = round(($at_DES + ($bt_DES * ($forecast))));
                                echo number_format($DES); ?>
                                <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != null) { ?>
                                        <?php $prediksi_DES = (($DES - $Aktual_DES) / $Aktual_DES) * 100; ?>
                                        (<?php if ($prediksi_DES > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($DES - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Perhitungan Prediksi Kamar Akomodasi -->
        <div class="tab-pane" hidden>
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
                                            <td><?php echo number_format($dp['jumlah_tamu']) ?></td>
                                            <?php $total1 = $dp['jumlah_tamu'] * $rank_RL; ?>
                                            <!-- x*y -->
                                            <?php $total_Y += $dp['jumlah_tamu']; ?>
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
                                        <td><?php echo number_format($dp['jumlah_tamu']) ?></td>
                                        <td>
                                            <?php $prediksi1 = 0;
                                            $prediksi1 = $f + ($e * (($rank_RL))) ?>
                                            <?php echo number_format($prediksi1) ?>
                                        </td>
                                        <td>
                                            <?php $AD_RL = 0;
                                            $AD_RL = round(abs(($dp['jumlah_tamu']) - $prediksi1));
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
                                            if ($dp['jumlah_tamu'] != 0) {
                                                $APE_RL = round(abs($AD_RL / ($dp['jumlah_tamu']) * 100), 2);
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
                                                    <td><?php echo number_format($dp['jumlah_tamu']) ?></td>
                                                    <?php if ($rank != 0) {
                                                        $F_after = round(($alfa * $A_before) + ((1 - $alfa) * ($F_before)));
                                                    } else {
                                                        $F_after = 0;
                                                    } ?>
                                                    <td><?php echo number_format($F_after) ?></td>
                                                    <?php $AD = 0;
                                                    if ($rank != 0) {
                                                        $AD = round(abs($dp['jumlah_tamu'] - $F_after));
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
                                                        if ($dp['jumlah_tamu'] != 0  && $rank != 0) {
                                                            $APE = round(abs($AD / ($dp['jumlah_tamu']) * 100), 2);
                                                            echo $APE;
                                                        } else {
                                                            echo $APE = 0;
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php $MAPE += $APE ?>
                                                    <?php
                                                    $F_before = $F_after;
                                                    $A_before = $dp['jumlah_tamu'];  ?>
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
                                            <td><?php echo number_format($dp['jumlah_tamu']) ?></td>
                                            <?php if ($rank_SES != 0) {
                                                $F_after = round(($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                            } else {
                                                $F_after = 0;
                                            } ?>
                                            <td><?php echo number_format($F_after) ?></td>
                                            <?php $AD = 0;
                                            if ($rank_SES != 0) {
                                                $AD = round(abs($dp['jumlah_tamu'] - $F_after));
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
                                                if ($dp['jumlah_tamu'] != 0  && $rank_SES != 0) {
                                                    $APE = round(abs($AD / ($dp['jumlah_tamu']) * 100), 2);
                                                    echo $APE;
                                                } else {
                                                    echo $APE = 0;
                                                }
                                                ?>
                                            </td>
                                            <?php $MAPE_SES += $APE ?>
                                            <?php
                                            $F_before = $F_after;
                                            $A_before = $dp['jumlah_tamu'];  ?>
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
                                                    <td><?php echo $dp['jumlah_tamu'] ?></td>
                                                    <?php if ($rank_DES != 0) {
                                                        $F_after_DES = round(($alfa * $dp['jumlah_tamu']) + ((1 - $alfa) * ($F_before_DES)));
                                                    } else {
                                                        $F_after_DES = $dp['jumlah_tamu'];
                                                    } ?>
                                                    <td><?php echo number_format($F_after_DES) ?></td>

                                                    <?php $AD = 0;
                                                    if ($rank_DES != 0) {
                                                        $F_after2_DES = round(($alfa * $F_after_DES) + ((1 - $alfa) * $F_before2_DES));
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_tamu'] - $DES));
                                                    } else {
                                                        $F_after2_DES = $dp['jumlah_tamu'];
                                                        $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                        $bt_DES = round(($alfa / (1 - $alfa)) * ($F_after_DES - $F_after2_DES));
                                                        $DES = round(($at_DES + ($bt_DES)));
                                                        $AD = round(abs($dp['jumlah_tamu'] - $DES));
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
                                                        if ($dp['jumlah_tamu'] != 0  && $F_after_DES != 0) {
                                                            $APE = round(abs($AD / ($dp['jumlah_tamu']) * 100), 2);
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
                                                    $A_before_DES = $dp['jumlah_tamu'];  ?>
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
                                                <td><?php echo number_format($dp['jumlah_tamu']) ?></td>
                                                <?php if ($rank_DES != 0) {
                                                    $F_after_DES = round(($alfa_terkecil_DES * $dp['jumlah_tamu']) + ((1 - $alfa_terkecil_DES) * ($F_before_DES)));
                                                } else {
                                                    $F_after_DES = $dp['jumlah_tamu'];
                                                } ?>
                                                <td><?php echo number_format($F_after_DES) ?></td>

                                                <?php $AD = 0;
                                                if ($rank_DES != 0) {
                                                    $F_after2_DES = round(($alfa_terkecil_DES * $F_after_DES) + ((1 - $alfa_terkecil_DES) * $F_before2_DES));
                                                    $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                    $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                    $DES = round(($at_DES + ($bt_DES)));
                                                    $AD = round(abs($dp['jumlah_tamu'] - $DES));
                                                } else {
                                                    $F_after2_DES = $dp['jumlah_tamu'];
                                                    $at_DES = round((2 * $F_after_DES) - $F_after2_DES);
                                                    $bt_DES = round(($alfa_terkecil_DES / (1 - $alfa_terkecil_DES)) * ($F_after_DES - $F_after2_DES));
                                                    $DES = round(($at_DES + ($bt_DES)));
                                                    $AD = round(abs($dp['jumlah_tamu'] - $DES));
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
                                                    if ($dp['jumlah_tamu'] != 0  && $F_after_DES != 0) {
                                                        $APE = round(abs($AD / ($dp['jumlah_tamu']) * 100), 2);
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
                                                $Aktual_DES = $dp['jumlah_tamu'];
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
        </div>
        <!-- Perhitungan Prediksi Kursi Akomodasi -->

        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <h4 style="color: white;">Jumlah Tamu</h4>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php $forecast = 1; ?>
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Regresi Linear</b> <br /><br />
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                echo number_format(($f + ($e * (($rank_RL))))); ?> <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != 0) { ?>
                                        <?php $prediksi_RL = ((($f + ($e * (($rank_RL)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
                                        (<?php if ($prediksi_RL > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else if ($prediksi_RL < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_RL, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format(($f + ($e * (($rank_RL + $forecast)))) - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Single Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php if ($forecast == 1) {
                                    $F_after_SES = (($alfa_terkecil_SES * $A_before) + ((1 - $alfa_terkecil_SES) * ($F_before)));
                                    echo number_format($F_after_SES); ?><br />
                                    <a style="font-size: 16pt;">
                                        <?php if ($rank_RL != 0) { ?>
                                            <?php $prediksi_SES = ((round($F_after_SES) - $A_before) / $A_before) * 100; ?>
                                            (<?php if ($prediksi_SES > 0) { ?>
                                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES == 0) { ?>
                                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else if ($prediksi_SES < 0) { ?>
                                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_SES, 2) ?>%</span>
                                        <?php } else { ?>
                                            <?php } ?>)
                                        <?php } else {
                                        } ?>
                                    <?php } else {
                                    echo "-";
                                } ?>
                                    </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($F_after_SES - $A_before);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p><b>Double Exponential <br />Smoothing</b>
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php
                                $DES = round(($at_DES + ($bt_DES * ($forecast))));
                                echo number_format($DES); ?>
                                <br />
                                <a style="font-size: 16pt;">
                                    <?php if ($rank_RL != null) { ?>
                                        <?php $prediksi_DES = (($DES - $Aktual_DES) / $Aktual_DES) * 100; ?>
                                        (<?php if ($prediksi_DES > 0) { ?>
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES == 0) { ?>
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else if ($prediksi_DES < 0) { ?>
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($prediksi_DES, 2) ?>%</span>
                                    <?php } else { ?>
                                        <?php } ?>)
                                    <?php } else {
                                    } ?>
                                </a>
                            </p>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan:
                        <?php if ($rank_RL != 0) {
                            echo number_format($DES - $Aktual_DES);
                        } else {
                            echo "0";
                        } ?>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</header>