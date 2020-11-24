<!-- Default box -->
<div id="konten">
    <div class="kotak-prediksi box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori Kebangsaan</button>
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Waktu</button>
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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_Wisman/cari_blok2") ?>">
                        <div class="col-md-2">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
                                for ($x = $year_now; $x >= 2001; $x--) {
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
                <div class="col-md-8 blok2A">
                    <!-- ini tabel -->
                    <table id="blok2A" class="table table-bordered table-striped" style="text-align: right">
                        <thead>
                            <tr style="background-color:#6e0006; color:white;">
                                <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun</th>
                                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">bulan</th>
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
                                    <td><?php echo $dp['bulan'] ?></td>
                                    <td><?php echo number_format($dp['jumlah']) ?></td>
                                    <?php $total1 = $dp['jumlah'] * $rank_RL; ?>
                                    <!-- x*y -->
                                    <?php $total_Y += $dp['jumlah']; ?>
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
                                <td><?php echo $rank; ?></td>
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
                            if ($rank != 0) {
                                $rata_X = $total_X / $rank_RL;
                                $rata_Y = $total_Y / $rank_RL;
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
                    Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali
                    <?php
                    echo "  Sampai Tahun " . $tahun ?>
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="box-body blok2B">
                <!-- ini tabel -->
                <table id="blok2B" class="table table-bordered table-striped" style="text-align: right">
                    <thead>
                        <tr style="background-color:#6e0006; color:white;">
                            <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Periode</th>
                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Tahun</th>
                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Bulan</th>
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
                                <td><?php echo $dp['bulan'] ?></td>
                                <td><?php echo number_format($dp['jumlah']) ?></td>
                                <td>
                                    <?php $prediksi1 = 0;
                                    $prediksi1 = $f + ($e * (($rank_RL))) ?>
                                    <?php echo number_format($prediksi1) ?>
                                </td>
                                <td>
                                    <?php $AD_RL = 0;
                                    $AD_RL = round(abs(($dp['jumlah']) - $prediksi1));
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
                                    if ($dp['jumlah'] != 0) {
                                        $APE_RL = round(abs($AD_RL / ($dp['jumlah']) * 100), 2);
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

    <!-- DE -->
    <div class="panel box box-danger" hidden>
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseDE">
                    <p class="box-title" style="text-align: center; font-size: 13pt;">DSE Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali
                        <?php $tahun_data = $tahun - 1;
                        echo " Sampai Tahun " . $tahun_data; ?></p>
                </a>
            </h4>
        </div>
        <div id="collapseDE" class="panel-collapse collapse in">
            <div class="box-body">
                <!-- MENCARI ALFA DAN MAPE TERKECIL -->
                <?php $MAPE_terkecil = 100;
                $alfa_terkecil = 0;
                $MAPE_now = 0;
                $alfa_now = 0; ?>
                <?php for (
                    $alfa = 0.01;
                    $alfa < 1.0;
                    $alfa = $alfa + 0.01
                ) { ?>
                    <div class="box box-solid" id="tabel2_blok2" hidden>
                        <div class="box-header with-border">
                            <center>
                                <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali
                                    <?php $tahun_data = $tahun - 1;
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
                                    $rank = 0;
                                    $F_before = 0;
                                    $F_after = 0;
                                    $F_before2 = 0;
                                    $F_after2 = 0;
                                    $A_before = 0;
                                    $MAPE = 0;
                                    $MAD = 0;
                                    $MSE = 0;
                                    $DES = 0;
                                    $at = 0;
                                    $bt = 0;  ?>
                                    <?php foreach ($data as $dp) { ?>
                                        <tr>

                                            <td style="text-align: left;"><?php echo $rank ?></td>
                                            <td><?php echo $dp['tahun'] ?></td>
                                            <td><?php echo $dp['jumlah'] ?></td>
                                            <?php if ($rank != 0) {
                                                $F_after = round(($alfa * $dp['jumlah']) + ((1 - $alfa) * ($F_before)));
                                            } else {
                                                $F_after = $dp['jumlah'];
                                            } ?>
                                            <td><?php echo number_format($F_after) ?></td>

                                            <?php $AD = 0;
                                            if ($rank != 0) {
                                                $F_after2 = round(($alfa * $F_after) + ((1 - $alfa) * $F_before2));
                                                $at = round((2 * $F_after) - $F_after2);
                                                $bt = round(($alfa / (1 - $alfa)) * ($F_after - $F_after2));
                                                $DES = round(($at + ($bt)));
                                                $AD = round(abs($dp['jumlah'] - $DES));
                                            } else {
                                                $F_after2 = $dp['jumlah'];
                                                $at = round((2 * $F_after) - $F_after2);
                                                $bt = round(($alfa / (1 - $alfa)) * ($F_after - $F_after2));
                                                $DES = round(($at + ($bt)));
                                                $AD = round(abs($dp['jumlah'] - $DES));
                                            } ?>
                                            <?php $MAD += $AD ?>
                                            <td><?php echo number_format($F_after2) ?></td>
                                            <td><?php echo number_format($at) ?></td>
                                            <td><?php echo number_format($bt) ?></td>
                                            <td><?php echo round(($at + $bt), 2) ?></td>
                                            <td><?php echo number_format($DES);  ?></td>
                                            <td><?php echo number_format($AD) ?></td>
                                            <?php $SE = 0;
                                            $SE = round(pow($AD, 2), 2); ?>
                                            <td><?php echo number_format($SE); ?></td>
                                            <?php $MSE += $SE ?>
                                            <td>
                                                <?php $APE = 0;
                                                if ($dp['jumlah'] != 0  && $F_after != 0) {
                                                    $APE = round(abs($AD / ($dp['jumlah']) * 100), 2);
                                                    echo $APE;
                                                } else {
                                                    echo $APE = 0;
                                                }
                                                ?>
                                            </td>
                                            <?php $MAPE += $APE ?>
                                            <?php
                                            $F_before = $F_after;
                                            $F_before2 = $F_after2;
                                            $A_before = $dp['jumlah'];  ?>
                                        </tr>
                                        <?php $rank++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Info Boxes Style 2 -->
                    <div class="row" hidden>
                        <div class="col-md-4">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">MAPE <?= $alfa ?></span>
                                    <span class="info-box-number">
                                        <?php if ($rank != 0) {
                                            echo round($MAPE / $rank, 2) . "%";
                                        } else {
                                            echo "0%";
                                        }
                                        ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php if ($rank != 0) {
                                                                                    echo round($MAPE / $rank, 2) . "%";
                                                                                } else {
                                                                                    echo "0%";
                                                                                } ?>"></div>
                                    </div>
                                    <span class="progress-description"> <?php if ($rank != 0) {
                                                                            $TEST = round($MAPE / $rank, 2);
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
                                        <?php if ($rank != 0) {
                                            echo number_format(round($MAD / $rank));
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
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">MSE</span>
                                    <span class="info-box-number">
                                        <?php if ($rank != 0) {
                                            echo number_format(round($MSE / $rank));
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
                    <?php $MAPE_now = $MAPE;
                    if ($rank != 0) {
                        if ($MAPE_terkecil > round($MAPE_now / $rank, 2)) {
                            $MAPE_terkecil = round($MAPE_now / $rank, 2);
                            $alfa_terkecil = $alfa;
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
                <?php echo 'alfa terkecil' . $alfa_terkecil . ' MAPE terkecil ' . round($MAPE_terkecil, 2) ?>
                <div id="tabel1_blok2">
                    <div class="box-body blok2A">
                        <!-- ini tabel -->
                        <table id="blok2A" class="table table-bordered table-striped" style="text-align: right">
                            <thead>
                                <tr style="background-color:#6e0006; color:white;">
                                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">periode (x)</th>
                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">tahun </th>
                                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">bulan </th>
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
                                $rank = 0;
                                $F_before = 0;
                                $F_after = 0;
                                $F_before2 = 0;
                                $F_after2 = 0;
                                $A_before = 0;
                                $MAPE = 0;
                                $MAD = 0;
                                $MSE = 0;
                                $DES = 0;
                                $at = 0;
                                $bt = 0;  ?>
                                <?php foreach ($data as $dp) { ?>
                                    <tr>

                                        <td style="text-align: left;"><?php echo $rank ?></td>
                                        <td><?php echo $dp['tahun'] ?></td>
                                        <td><?php echo $dp['bulan'] ?></td>
                                        <td><?php echo number_format($dp['jumlah']) ?></td>
                                        <?php if ($rank != 0) {
                                            $F_after = round(($alfa_terkecil * $dp['jumlah']) + ((1 - $alfa_terkecil) * ($F_before)));
                                        } else {
                                            $F_after = $dp['jumlah'];
                                        } ?>
                                        <td><?php echo number_format($F_after) ?></td>

                                        <?php $AD = 0;
                                        if ($rank != 0) {
                                            $F_after2 = round(($alfa_terkecil * $F_after) + ((1 - $alfa_terkecil) * $F_before2));
                                            $at = round((2 * $F_after) - $F_after2);
                                            $bt = round(($alfa_terkecil / (1 - $alfa_terkecil)) * ($F_after - $F_after2));
                                            $DES = round(($at + ($bt)));
                                            $AD = round(abs($dp['jumlah'] - $DES));
                                        } else {
                                            $F_after2 = $dp['jumlah'];
                                            $at = round((2 * $F_after) - $F_after2);
                                            $bt = round(($alfa_terkecil / (1 - $alfa_terkecil)) * ($F_after - $F_after2));
                                            $DES = round(($at + ($bt)));
                                            $AD = round(abs($dp['jumlah'] - $DES));
                                        } ?>
                                        <?php $MAD += $AD ?>
                                        <td><?php echo number_format($F_after2) ?></td>
                                        <td><?php echo number_format($at) ?></td>
                                        <td><?php echo number_format($bt) ?></td>
                                        <td><?php echo number_format($at + $bt) ?></td>
                                        <td><?php echo number_format($AD) ?></td>
                                        <?php $SE = 0;
                                        $SE = round(pow($AD, 2), 2); ?>
                                        <td><?php echo number_format($SE); ?></td>
                                        <?php $MSE += $SE ?>
                                        <td>
                                            <?php $APE = 0;
                                            if ($dp['jumlah'] != 0  && $F_after != 0) {
                                                $APE = round(abs($AD / ($dp['jumlah']) * 100), 2);
                                                echo $APE;
                                            } else {
                                                echo $APE = 0;
                                            }
                                            ?>
                                        </td>
                                        <?php $MAPE += $APE ?>
                                        <?php
                                        $F_before = $F_after;
                                        $F_before2 = $F_after2;
                                        $Aktual_DES = $dp['jumlah'];
                                        // $A_before = $dp['jumlah'];  
                                        ?>
                                        <?php $rank++; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir DE -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel box box-danger">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Grafik Garis Prediksi
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="box-body">
                        <div id="prediksi_jwisman_blok2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel box box-danger">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Grafik Batang Prediksi
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="box-body">
                        <div id="prediksi_jwisman_blok2b" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Grafik Prediksi
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="box-body blok2C">
                        <!-- ini tabel -->
                        <table class="table table-bordered table-striped" id="blok2C" style="text-align: right">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Prediksi Regresi Linear</th>
                                    <th>Prediksi Double <br />Exponential Smoothing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DES = 0;
                                $total_prediksi = 0; ?>
                                <?php $month = array(
                                    "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                                    "Agustus", "September", "Oktober", "November", "Desember"
                                ); ?>
                                <?php for (
                                    $forecast = 0;
                                    $forecast <= 11;
                                    $forecast++
                                ) { ?>
                                    <tr>
                                        <td style="text-align: left;"><?php echo $rank + $forecast ?></td>
                                        <td><?php echo $tahun ?>
                                        <td><?php echo $month[$forecast] ?></td>
                                        <td><?php
                                            echo number_format(($f + ($e * (($rank + $forecast))))); ?>
                                            <?php if ($rank != 0) { ?>
                                                <?php $prediksi_RL = ((($f + ($e * (($rank + $forecast)))) - $Aktual_DES) / $Aktual_DES) * 100;  ?>
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
                                        <td><?php
                                            $DES = round(($at + ($bt * ($forecast + 1))));
                                            echo number_format($DES); ?>
                                            <?php if ($rank != null) { ?>
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
                        <span class="info-box-text">MAPE Double Exponential Smoothing</span>
                        <span class="info-box-number">
                            <?php if ($rank != 0) {
                                echo round($MAPE / $rank, 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php if ($rank != 0) {
                                                                        echo round($MAPE / $rank, 2) . "%";
                                                                    } else {
                                                                        echo "0%";
                                                                    } ?>"></div>
                        </div>
                        <span class="progress-description"> <?php if ($rank != 0) {
                                                                $TEST = round($MAPE / $rank, 2);
                                                            } else {
                                                                $TEST_RL = 51;
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

<table id="data_prediksi_wisman_blok2" border="1" hidden>
    <thead>
        <tr>
            <th>Waktu</th>
            <th>Tahun Aktual</th>
            <th>Tahun Prediksi RL</th>
            <th>Tahun Prediksi DES</th>
        </tr>
    </thead>
    <tbody>
        <?php $rank_grafik = 0;
        $y_grafik = 0; ?>
        <?php
        $rank = 0;
        $F_before = 0;
        $F_after = 0;
        $F_before2 = 0;
        $F_after2 = 0;
        $A_before = 0;
        $DES = 0;
        $at = 0;
        $bt = 0;  ?>
        <?php foreach ($data as $dp) { ?>
            <?php $prediksi_grafik = 0;
            $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
            <?php round($prediksi_grafik) ?>
            <?php $y_grafik++; ?>
            <?php $rank_grafik++ ?>
            <?php if ($rank != 0) {
                $F_after = round(($alfa_terkecil * $dp['jumlah']) + ((1 - $alfa_terkecil) * ($F_before)));
            } else {
                $F_after = $dp['jumlah'];
            } ?>

            <?php
            if ($rank != 0) {
                $F_after2 = round(($alfa_terkecil * $F_after) + ((1 - $alfa_terkecil) * $F_before2));
                $at = round((2 * $F_after) - $F_after2);
                $bt = round(($alfa_terkecil / (1 - $alfa_terkecil)) * ($F_after - $F_after2));
                $DES = round(($at + ($bt)));
            } else {
                $F_after2 = $dp['jumlah'];
                $at = round((2 * $F_after) - $F_after2);
                $bt = round(($alfa_terkecil / (1 - $alfa_terkecil)) * ($F_after - $F_after2));
                $DES = round(($at + ($bt)));
            } ?>
            <?php $DES;  ?>
            <?php
            $F_before = $F_after;
            $F_before2 = $F_after2;
            $A_before = $dp['jumlah'];  ?>
            <?php $rank++; ?>
        <?php } ?>
        <?php $month = array(
            "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober", "November", "Desember"
        ); ?>
        <?php for (
            $forecast = 0;
            $forecast <= 11;
            $forecast++
        ) { ?>
            <tr>
                <td><?php echo $month[$forecast] . '' . $tahun ?>
                <td></td>
                <td><?php
                    echo round(($f + ($e * (($rank + ($forecast + 1)))))); ?>
                </td>
                <td><?php
                    $DES = round(($at + ($bt * ($forecast + 1))));
                    echo $DES;
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#blok2A').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA</h4>'
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
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA</h4>'
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

<script>
    $(document).ready(function() {
        var table = $('#blok2C').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                    echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                        echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?> - SIPTA</h4>'
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
            .appendTo('.blok2C .col-sm-6:eq(0)');
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
            useHTML: true,
            text: "<h4>Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah Wisatawan'
            }
        },
        xAxis: {
            allowDecimals: false,
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
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('prediksi_jwisman_blok2b', {
        data: {
            table: 'data_prediksi_wisman_blok2'
        },
        chart: {
            type: 'bar'
        },
        title: {
            useHTML: true,
            text: "<h4>Prediksi Wisatawan Mancanegara ke Bali <?php $tahun_data = $tahun + 4;
                                                                echo " Tahun " . $tahun . " - Tahun " . $tahun_data; ?></h4>"
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah Wisatawan'
            }
        },
        xAxis: {
            allowDecimals: false,
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
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ';
            }
        }
    });
</script>