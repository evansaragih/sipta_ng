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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_RL_ObjekWisata/cari_blok1") ?>">
                        <div class="col-md-3">
                            <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <option value="">Semua Kota/Kabupaten</option>
                                <?php foreach ($kabupaten as $a) { ?>
                                    <option value="<?php echo $a['id_kabupaten']; ?>" <?= $id_pintu == $a['id_kabupaten'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
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
            <li class="active"><a href="#tab_1a_2" data-toggle="tab">Unit</a></li>
            <li><a href="#tab_2a_2" data-toggle="tab">Jumlah Pengunjung</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-line-chart"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1a_2">
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                Pencarian Nilai a dan b
                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="col-md-8 blok2A">
                                <!-- ini tabel -->
                                <table id="blok2A" class="table table-bordered table-striped" style="text-align: right">
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
                                        $rank = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <td style="text-align: left;"><?php echo $rank ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                                <?php $total1 = $dp['jumlah_unit'] * $rank; ?>
                                                <!-- x*y -->
                                                <?php $total_Y += $dp['jumlah_unit']; ?>
                                                <?php $total_X += $rank; ?>
                                                <?php $total_XY += $total1; ?>
                                                <td><?php echo number_format($total1) ?></td>
                                                <?php $pangkat2 = pow($rank, 2); ?>
                                                <td><?php echo $pangkat2 ?></td>
                                                <?php $x_pangkat2 += $pangkat2; ?>
                                                <?php $rank++; ?>
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
                                            $rata_X = $total_X / $rank;
                                            $rata_Y = $total_Y / $rank;
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

                                        if ($a - $c != 0) {
                                            $e = ($b - $d) / ($a - $c); //nilai B
                                        } else {
                                            $e = 0;
                                        }
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
                <!-- Info Boxes Style 2 -->
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                            Jumlah Objek Wisata di <?php echo $nama_kab->kabupaten ?>
                                <?php
                                echo "  Sampai Tahun " . ($tahun-1) ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse in">
                        <div class="box-body blok2B">
                            <!-- ini tabel -->
                            <table id="blok2B" class="table table-bordered table-striped" style="text-align: right">
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
                                    <?php $rank1 = 0;
                                    $MAPE = 0;
                                    $MAD = 0;
                                    $MSE = 0;
                                    $y = 0; ?>
                                    <?php foreach ($data as $dp) { ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $rank1 ?></td>
                                            <td><?php echo $dp['tahun'] ?></td>
                                            <td><?php echo number_format($dp['jumlah_unit']) ?></td>
                                            <td>
                                                <?php $prediksi1 = 0;
                                                $prediksi1 = $f + ($e * (($rank1))) ?>
                                                <?php echo number_format($prediksi1) ?>
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
                                                $SE = round(pow($AD, 2), 2);
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
                                            <?php $rank1++ ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Info Boxes Style 2 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">MAPE</span>
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
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

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
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

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
                <!-- ./Info Boxes Style 2 -->
                <!-- REFERENSI GRAFIK LINE JLH UNIT -->
                <table id="data_prediksi_ako_unit_2" border="1" hidden>
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Data Aktual</th>
                            <th>Hasil Prediksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rank_grafik = 0;
                        $y_grafik = 0; ?>
                        <?php foreach ($data as $dp) { ?>
                            <tr>
                                <td><?php echo $dp['tahun'] ?></td>
                                <td><?php echo $dp['jumlah_unit'] ?></td>
                                <td>
                                    <?php $prediksi_grafik = 0;
                                    $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                                    <?php echo round($prediksi_grafik) ?>
                                    <?php $y_grafik++; ?>
                                </td>
                                <?php $rank_grafik++ ?>
                            </tr>
                        <?php } ?>
                        <?php for (
                            $i = 0;
                            $i <= 4;
                            $i++
                        ) { ?>
                            <tr>
                                <td><?php echo $tahun + ($i); ?></td>
                                <td></td>
                                <td><?php echo round($f + ($e * (($rank + $i)))) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- AKHIR REFERENSI GRAFIK LINE JLH UNIT -->
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                Grafik Prediksi
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div id="prediksi_akomodasi_unit_2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="box-body blok2E">
                            <!-- ini tabel -->
                            <table class="table table-bordered table-striped" id="blok1F" style="text-align: right">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Tahun</th>
                                        <th>Prediksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for (
                                        $i = 0;
                                        $i <= 4;
                                        $i++
                                    ) { ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $rank + $i ?></td>
                                            <td><?php echo $tahun + ($i); ?></td>
                                            <td><?php echo number_format($f + ($e * (($rank + $i)))) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2a_2">
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                Pencarian Nilai a dan b
                            </a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="col-md-8 blok2D">
                                <!-- ini tabel -->
                                <table id="blok2D" class="table table-bordered table-striped" style="text-align: right">
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
                                        $rank = 0; ?>
                                        <?php foreach ($data as $dp) { ?>
                                            <tr>
                                                <td style="text-align: left;"><?php echo $rank ?></td>
                                                <td><?php echo $dp['tahun'] ?></td>
                                                <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                                <?php $total1 = $dp['jumlah_kamar'] * $rank; ?>
                                                <!-- x*y -->
                                                <?php $total_Y += $dp['jumlah_kamar']; ?>
                                                <?php $total_X += $rank; ?>
                                                <?php $total_XY += $total1; ?>
                                                <td><?php echo number_format($total1) ?></td>
                                                <?php $pangkat2 = pow($rank, 2); ?>
                                                <td><?php echo $pangkat2 ?></td>
                                                <?php $x_pangkat2 += $pangkat2; ?>
                                                <?php $rank++; ?>
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
                                            $rata_X = $total_X / $rank;
                                            $rata_Y = $total_Y / $rank;
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

                                        if ($a - $c != 0) {
                                            $e = ($b - $d) / ($a - $c); //nilai B
                                        } else {
                                            $e = 0;
                                        }
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
                <!-- Info Boxes Style 2 -->
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                                Jumlah Pengunjung pada Objek Wisata di <?php echo $nama_kab->kabupaten ?>
                                <?php
                                echo "  Sampai Tahun " . ($tahun-1) ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse in">
                        <div class="box-body blok2E">
                            <!-- ini tabel -->
                            <table id="blok2E" class="table table-bordered table-striped" style="text-align: right">
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
                                    <?php $rank1 = 0;
                                    $MAPE = 0;
                                    $MAD = 0;
                                    $MSE = 0;
                                    $y = 0; ?>
                                    <?php foreach ($data as $dp) { ?>
                                        <tr> 
                                            <td style="text-align: left;"><?php echo $rank1 ?></td>
                                            <td><?php echo $dp['tahun'] ?></td>
                                            <td><?php echo number_format($dp['jumlah_kamar']) ?></td>
                                            <td>
                                                <?php $prediksi1 = 0;
                                                $prediksi1 = $f + ($e * (($rank1))) ?>
                                                <?php echo number_format($prediksi1) ?>
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
                                                $SE = round(pow($AD, 2), 2);
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
                                            <?php $rank1++ ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- REFERENSI GRAFIK LINE JLH UNIT -->
                <!-- Info Boxes Style 2 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">MAPE</span>
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
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

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
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

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
                <!-- ./Info Boxes Style 2 -->
                <table id="data_prediksi_ako_kamar_2" border="1" hidden>
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Data Aktual</th>
                            <th>Hasil Prediksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rank_grafik = 0;
                        $y_grafik = 0; ?>
                        <?php foreach ($data as $dp) { ?>
                            <tr>
                                <td><?php echo $dp['tahun'] ?></td>
                                <td><?php echo $dp['jumlah_kamar'] ?></td>
                                <td>
                                    <?php $prediksi_grafik = 0;
                                    $prediksi_grafik = $f + ($e * (($rank_grafik))) ?>
                                    <?php echo round($prediksi_grafik) ?>
                                    <?php $y_grafik++; ?>
                                </td>
                                <?php $rank_grafik++ ?>
                            </tr>
                        <?php } ?>
                        <?php for (
                            $i = 0;
                            $i <= 4;
                            $i++
                        ) { ?>
                            <tr>
                                <td><?php echo $tahun + ($i); ?></td>
                                <td></td>
                                <td><?php echo round($f + ($e * (($rank + $i)))) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- AKHIR REFERENSI GRAFIK LINE JLH UNIT -->
                <div class="panel box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                Grafik Prediksi
                            </a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div id="prediksi_akomodasi_kamar_2" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="box-body blok2F">
                            <!-- ini tabel -->
                            <table class="table table-bordered table-striped" id="blok1F" style="text-align: right">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Tahun</th>
                                        <th>Prediksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for (
                                        $i = 0;
                                        $i <= 4;
                                        $i++
                                    ) { ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $rank + $i ?></td>
                                            <td><?php echo $tahun + ($i); ?></td>
                                            <td></td>
                                            <td><?php echo number_format($f + ($e * (($rank + $i)))) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                .appendTo('.blok2A .col-sm-6:eq(0)');
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#blok2B').DataTable({
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
                table: 'data_prediksi_ako_unit_2'
            },
            chart: {
                type: 'line'
            },
            title: {
                useHTML: true,
                text: "<h4>Prediksi Objek Wisata di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4; echo " Tahun ".$tahun." - Tahun ".$tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Unit'
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
                table: 'data_prediksi_ako_kamar_2'
            },
            chart: {
                type: 'line'
            },

            title: {
                useHTML: true,
                text: "<h4> Prediksi Pengunjung pada Objek Wisata di <?php echo $nama_kab->kabupaten ?><?php $tahun_data = $tahun + 4; echo " Tahun ".$tahun." - Tahun ".$tahun_data; ?></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah Unit'
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