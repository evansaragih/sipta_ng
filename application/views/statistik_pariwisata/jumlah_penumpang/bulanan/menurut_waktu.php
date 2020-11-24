<!-- Default box -->
<?php function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
} ?>
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Pintu Masuk</button>
                    </div>
                </td>
                <td class="col-xs-1">
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
                <form method="post" id="jpenumpang-waktu" action="<?php echo base_url("SPB_JumlahPenumpang/cari_blok2") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_pintu_masuk" name="id_pintu_masuk" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($option_pintu as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_pintu_masuk == $a['id'] ? "selected" : null  ?>><?php echo $a['pintu_masuk']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="bulan" name="bulan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($option_bulan as $a) { ?>
                                <option value="<?php echo $a['bulan']; ?>" <?= $bulan == $a['bulan'] ? "selected" : null  ?>><?php echo $a['bulan']; ?></option>
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

<div class="box box-solid" id="tabel_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok2()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok2()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok2()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body wilayah">
        <!-- nama wilayah kalo bisa di seragamin itu untuk buat print !!!! -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Jumlah Penumpang </p>
        <table id="wilayah" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle;">Tahun</th>
                    <th style="text-align: center;">Penumpang Domestik</th>
                    <th style="text-align: center;">Penumpang Internasional</th>
                    <th style="text-align: center;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $tahun ?></td>
                    <?php $total1 = 0; ?>
                    <?php foreach ($data_tahun1 as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total1 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total1) ?></td>
                </tr>
                <tr>
                    <td><?= $tahun - 1 ?></td>
                    <?php $total2 = 0; ?>
                    <?php foreach ($data_tahun2 as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total2 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total2) ?></td>
                </tr>
                <tr>
                    <td><?= $tahun - 2 ?></td>
                    <?php $total3 = 0; ?>
                    <?php foreach ($data_tahun3 as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total3 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total3) ?></td>
                </tr>
                <tr>
                    <td><?= $tahun - 3 ?></td>
                    <?php $total4 = 0; ?>
                    <?php foreach ($data_tahun4 as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total4 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total4) ?></td>
                </tr>
                <tr>
                    <td><?= $tahun - 4 ?></td>
                    <?php $total5 = 0; ?>
                    <?php foreach ($data_tahun5 as $dp) { ?>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total5 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo number_format($total5) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: left;">Total Penumpang</td>
                    <td><?php echo number_format($total1 + $total2 + $total3 + $total4 + $total5) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik-1A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_1A_blok2()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok2()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok2()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok2-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok2()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Kolom" onclick="grafik_2A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok2()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok2()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok2-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok2()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis Area" onclick="grafik_3A_blok2()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok2()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3A_blok2-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-4A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok2()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Kolom" onclick="grafik_2A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis Area" onclick="grafik_3A_blok2()"><i class="fa fa-area-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_4A_blok2()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-4A_blok2-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<!-- Tabel Grafik -->
<table id="grafik-data_penumpang-blok2" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Penumpang Internasional</th>
            <th>Penumpang Domestik</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $bulan . ' ' . ($tahun) ?></td>
            <?php foreach ($data_tahun1 as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td><?= $bulan . ' ' . ($tahun - 1) ?></td>
            <?php foreach ($data_tahun2 as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td><?= $bulan . ' ' . ($tahun - 2) ?></td>
            <?php foreach ($data_tahun3 as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td><?= $bulan . ' ' . ($tahun - 3) ?></td>
            <?php foreach ($data_tahun4 as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td><?= $bulan . ' ' . ($tahun - 4) ?></td>
            <?php foreach ($data_tahun5 as $dp) { ?>
                <td><?php echo $dp['jumlah'] ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<table id="grafik-data_total_penumpang-blok2" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Total Penumpang</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;">Januari <?= $tahun ?></td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Januari <?= ($tahun - 1) ?></td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Januari <?= ($tahun - 2) ?></td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Januari <?= ($tahun - 3) ?></td>
            <td><?php echo $total1 ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Januari <?= ($tahun - 4) ?></td>
            <td><?php echo $total1 ?></td>
        </tr>
    </tbody>
</table>
<!-- ./Tabel Grafik -->

<script>
    $(document).ready(function() {
        var table = $('#wilayah').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Data Jumlah Penumpang - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Jumlah Penumpang - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Jumlah Penumpang Tahun - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Data Jumlah Penumpang Tahun  - SIPTA</h4>'
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
            'info': false,
            'autoWidth': false
        });

        table.buttons().container()
            .appendTo('.wilayah .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-1A_blok2-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok2'
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
    Highcharts.chart('grafik-2A_blok2-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok2'
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
    Highcharts.chart('grafik-3A_blok2-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok2'
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
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-4A_blok2-jpenumpang', {
        data: {
            table: 'grafik-data_total_penumpang-blok2'
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
                    format: '<b>{series.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                }
            }
        }
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok2").slideDown();
        document.getElementById("grafik-2A_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3A_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-4A_blok2").setAttribute("hidden", "hidden");
    });

    function tabel_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#tabel_blok2").slideDown();
    }

    function grafik_1A_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-1A_blok2").slideDown();
    }

    function grafik_2A_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-2A_blok2").slideDown();
    }

    function grafik_3A_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-3A_blok2").slideDown();
    }

    function grafik_4A_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-4A_blok2").slideDown();
    }
</script>