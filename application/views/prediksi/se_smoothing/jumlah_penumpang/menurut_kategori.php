<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Pintu Masuk</button>
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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("Prediksi_DES_Penumpang/cari_blok1") ?>">
                        <div class="col-md-4">
                            <select class="form-control select2" id="id_pintu" name="id_pintu" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php foreach ($pintu_masuk as $a) { ?>
                                    <option value="<?php echo $a['id_pintu_masuk']; ?>" <?= $id_pintu == $a['id_pintu_masuk'] ? "selected" : null  ?>><?php echo $a['pintu_masuk']; ?></option>
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
    <div class="panel box box-danger">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali
                        <?php $tahun_data = $tahun - 1;
                        echo " Sampai Tahun " . $tahun_data; ?></p>
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
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
                    <div class="box box-solid" id="tabel2_blok1" hidden>
                        <div class="box-header with-border">
                            <center>
                                <p class="box-title" style="text-align: center; font-size: 13pt;">Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali
                                    <?php $tahun_data = $tahun - 1;
                                    echo "<br/> Sampai Tahun " . $tahun_data; ?></p>
                            </center>
                        </div>
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
                                            <td><?php echo number_format($dp['jumlah']) ?></td>
                                            <?php if ($rank != 0) {
                                                $F_after = round(($alfa * $A_before) + ((1 - $alfa) * ($F_before)));
                                            } else {
                                                $F_after = 0;
                                            } ?>
                                            <td><?php echo number_format($F_after) ?></td>
                                            <?php $AD = 0;
                                            if ($rank != 0) {
                                                $AD = round(abs($dp['jumlah'] - $F_after));
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
                                                if ($dp['jumlah'] != 0  && $rank != 0) {
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
                                            $A_before = $dp['jumlah'];  ?>
                                        </tr>
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
                                            } else if ($TEST > 10) {
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
                
                    <div class="box-body blok1A">
                        <!-- ini tabel -->
                        <table id="blok1A" class="table table-bordered table-striped" style="text-align: right">
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
                                        <td><?php echo number_format($dp['jumlah']) ?></td>
                                        <?php if ($rank != 0) {
                                            $F_after = round(($alfa_terkecil * $A_before) + ((1 - $alfa_terkecil) * ($F_before)));
                                        } else {
                                            $F_after = 0;
                                        } ?>
                                        <td><?php echo number_format($F_after) ?></td>
                                        <?php $AD = 0;
                                        if ($rank != 0) {
                                            $AD = round(abs($dp['jumlah'] - $F_after));
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
                                            if ($dp['jumlah'] != 0  && $rank != 0) {
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
                                        $A_before = $dp['jumlah'];  ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <!-- /.box -->

    <!-- Info Boxes Style 2 -->
    <div class="row">
        <div class="col-md-4">
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="ion ion-ios-calculator"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">MAPE dengan a = <?= $alfa_terkecil ?></span>
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
                            } else if ($TEST > 10) {
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
    <!-- /. Info Boxes Style 2 -->

    <div class="panel box box-danger">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Hasil Prediksi
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="box-body">
                <div id="prediksi_jwisman" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div class="box-body blok1B">
                <!-- ini tabel -->
                <table id="blok1B" class="table table-bordered table-striped" style="text-align: right">
                    <thead>
                        <tr style="background-color:#6e0006; color:white;">
                            <th>Tahun</th>
                            <th>Hasil Prediksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $tahun; ?></td>
                            <td><?php
                                $F_after = (($alfa_terkecil * $A_before) + ((1 - $alfa_terkecil) * ($F_before)));
                                echo number_format($F_after) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<table id="data_prediksi_wisman" border="1" hidden>
    <thead>
        <tr>
            <th>Tahun</th>
            <th>Data Aktual</th>
            <th>Hasil Prediksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rank = -1;
        $F_before = 0;
        $F_after = 0;
        $A_before = 0; ?>
        <?php foreach ($data as $dp) { ?>
            <tr>
                <?php $rank++; ?>
                <td><?php echo $dp['tahun'] ?></td>
                <td><?php echo $dp['jumlah'] ?></td>
                <?php if ($rank != 0) {
                    $F_after = round(($alfa_terkecil * $A_before) + ((1 - $alfa_terkecil) * ($F_before)));
                } else {
                    $F_after = 0;
                } ?>
                <td><?php echo $F_after;
                    $A_before = $dp['jumlah'];
                    $F_before = $F_after; ?></td>
            <?php } ?>
            </tr>
            <tr>
                <td><?php echo $tahun; ?></td>
                <td></td>
                <td><?php
                    $F_after = (($alfa_terkecil * $A_before) + ((1 - $alfa_terkecil) * ($F_before)));
                    echo round($F_after) ?>
                </td>
            </tr>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        var table = $('#blok1A').DataTable({
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
            .appendTo('.blok1A .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#blok1B').DataTable({
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
            .appendTo('.blok1B .col-sm-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#blok1C').DataTable({
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
            .appendTo('.blok1C .col-sm-6:eq(0)');
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
    Highcharts.chart('prediksi_jwisman', {
        data: {
            table: 'data_prediksi_wisman'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: "<h4>Prediksi Penumpang <?php echo $nama_pintu_masuk->pintu_masuk ?> ke Bali <?php echo " Sampai Tahun " . $tahun ?></h4>"
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah Penumpang'
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