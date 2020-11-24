<!-- Default box -->
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok3()">Menurut Pintu Masuk</button>
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
                <div class="col-md-3">
                    <div class="btn-group">
                        <a type="button" class="btn btn-success active" href="#">Bulanan</a>
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_JumlahPenumpang') ?>">Tahunan</a>
                    </div>
                </div>
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPB_JumlahPenumpang/cari_blok3") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_pintu_masuk" name="id_pintu_masuk" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($option_pintu as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_pintu_masuk == $a['id'] ? "selected" : null  ?>><?php echo $a['pintu_masuk']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            $year_now = date('Y');
                            // $year_search = $year_now;
                            for ($x = $year_now; $x >= 2000; $x--) {
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

<div class="box box-solid" id="tabel_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok3()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body growth">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Perbandingan Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?></p>
        <table id="growth" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th style="text-align: center; vertical-align: middle; width: 10px;">Bulan</th>
                    <th style="text-align: center; vertical-align: middle;">Penumpang Domestik</th>
                    <th style="text-align: center; vertical-align: middle;">Penumpang Internasional</th>
                    <th style="text-align: center; vertical-align: middle; width: 60px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: left;">Januari</td>
                    <?php $total1 = 0; ?>
                    <?php foreach ($data_januari as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total1 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total1) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">Februari</td>
                    <?php $total2 = 0; ?>
                    <?php foreach ($data_februari as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total2 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total2) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td style="text-align: left;">Maret</td>
                    <?php $total3 = 0; ?>
                    <?php foreach ($data_maret as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total3 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total3) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">4</td>
                    <td style="text-align: left;">April</td>
                    <?php $total4 = 0; ?>
                    <?php foreach ($data_april as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total4 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total4) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: left;">Mei</td>
                    <?php $total5 = 0; ?>
                    <?php foreach ($data_mei as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total5 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total5) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">6</td>
                    <td style="text-align: left;">Juni</td>
                    <?php $total6 = 0; ?>
                    <?php foreach ($data_juni as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total6 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total6) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">7</td>
                    <td style="text-align: left;">Juli</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_juli as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">8</td>
                    <td style="text-align: left;">Agustus</td>
                    <?php $total8 = 0; ?>
                    <?php foreach ($data_agustus as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total8 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total8) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">9</td>
                    <td style="text-align: left;">September</td>
                    <?php $total9 = 0; ?>
                    <?php foreach ($data_september as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total9 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total9) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">10</td>
                    <td style="text-align: left;">Oktober</td>
                    <?php $total10 = 0; ?>
                    <?php foreach ($data_oktober as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total10 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total10) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">11</td>
                    <td style="text-align: left;">November</td>
                    <?php $total11 = 0; ?>
                    <?php foreach ($data_november as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total11 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total11) ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">12</td>
                    <td style="text-align: left;">Desember</td>
                    <?php $total12 = 0; ?>
                    <?php foreach ($data_desember as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total12 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total12) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: left;">Total Penumpang</td>
                    <?php foreach ($sum_pintu as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                    <?php } ?>
                    <td><?php echo number_format($total1 + $total2 + $total3 + $total4 + $total5
                            + $total6 + $total7 + $total8 + $total9 + $total10 + $total11 + $total12) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik-1A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok3()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok3-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Kolom" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok3()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok3-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis Area" onclick="grafik_3A_blok3()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3A_blok3-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-4A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok3()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-4A_blok3-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<!-- Tabel Grafik -->
<table id="grafik-data_penumpang-blok3" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Penumpang Domestik</th>
            <th>Pelabuhan Internasional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;">Januari</td>
            <?php foreach ($data_januari as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Februari</td>
            <?php foreach ($data_februari as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Maret</td>
            <?php foreach ($data_maret as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">April</td>
            <?php foreach ($data_april as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Mei</td>
            <?php foreach ($data_mei as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Juni</td>
            <?php foreach ($data_juni as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Juli</td>
            <?php foreach ($data_juli as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Agustus</td>
            <?php foreach ($data_agustus as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">September</td>
            <?php foreach ($data_september as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Oktober</td>
            <?php foreach ($data_oktober as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">November</td>
            <?php foreach ($data_november as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Desember</td>
            <?php foreach ($data_desember as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<table id="grafik-data_total_penumpang-blok3" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Total Penumpang</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;">Januari</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Februari</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Maret</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">April</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Mei</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Juni</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Juli</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Agustus</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">September</td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Oktober</td>
            <td><?php echo $total10 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">November</td>
            <td><?php echo $total11 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Desember</td>
            <td><?php echo $total12 ?></td>
        </tr>
    </tbody>
</table>
<!-- ./Tabel Grafik -->

<script>
    $(document).ready(function() {
        var table = $('#growth').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Data Jumlah Penumpang Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Jumlah Penumpang Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Jumlah Penumpang Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Data Jumlah Penumpang Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });

        table.buttons().container()
            .appendTo('.growth .col-sm-6:eq(0)');
    });
</script>
<!-- Page script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>

<!-- Grafik -->
<script type="text/javascript">
    Highcharts.chart('grafik-1A_blok3-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok3'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Jumlah Penumpang Internasional Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok3-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok3'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Jumlah Penumpang Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-3A_blok3-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok3'
        },
        chart: {
            type: 'area'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Jumlah Penumpang Domestik Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            area: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-4A_blok3-jpenumpang', {
        data: {
            table: 'grafik-data_total_penumpang-blok3'
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Jumlah Penumpang Internasional Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?></center></h4>'
        },
        // subtitle: {
        //     text: '3D donut in Highcharts'
        // },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true
                },
                innerSize: 100,
                depth: 75,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                }
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok3").slideDown();
        document.getElementById("grafik-2A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-4A_blok3").setAttribute("hidden", "hidden");
    });

    function tabel_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-2A_blok3").slideUp();
        $("#grafik-3A_blok3").slideUp();
        $("#grafik-4A_blok3").slideUp();
        $("#tabel_blok3").slideDown();
    }

    function grafik_1A_blok3() {
        $("#grafik-2A_blok3").slideUp();
        $("#grafik-3A_blok3").slideUp();
        $("#grafik-4A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-1A_blok3").slideDown();
    }

    function grafik_2A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-3A_blok3").slideUp();
        $("#grafik-4A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-2A_blok3").slideDown();
    }

    function grafik_3A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-2A_blok3").slideUp();
        $("#grafik-4A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-3A_blok3").slideDown();
    }

    function grafik_4A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-2A_blok3").slideUp();
        $("#grafik-3A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-4A_blok3").slideDown();
    }
</script>