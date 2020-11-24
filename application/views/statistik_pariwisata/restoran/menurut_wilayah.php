<!-- Default box -->
<div class="kotak-sp_restoran box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Restoran</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Waktu</button>
                    </div>
                </td>
                <td class="col-xs-1">
                    <img src="<?php echo base_url("assets/dist/img/logo-sipta2.png") ?>" style="width: 100px;" alt="homepage" class="dark-logo" />
                </td>
            </tr>
        </table>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="callout callout-picture">
            <div class="row">
                <form method="post" id="akomodasi_wilayah" action="<?php echo base_url("SP_Restoran/cari_wilayah") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_jenis_wisatawan" name="id_jenis_wisatawan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($jenis_wisman as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_jenis == $a['id'] ? "selected" : null  ?>><?php echo $a['jenis_wisatawan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            $year_now = date('Y');
                            $year_search = $year_now;
                            for ($x = $year_search; $x >= 2000; $x--) {
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
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body blok2">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?>
            <table id="blok2" class="table table-bordered table-striped">
                <thead>
                    <tr style="background-color:#6e0006; color:white;">
                        <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Wilayah</th>
                        <th colspan="2" style="text-align: center;">Restoran</th>
                    </tr>
                    <tr style="background-color:#6e0006; color:white;">
                        <th style="text-align: center;">Unit</th>
                        <th style="text-align: center;">Pengunjung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    $jumlah_unit = 0;
                    $jumlah_pengunjung = 0; ?>
                    <?php foreach ($data_objek_wisata as $dp) {
                    ?>
                        <tr><?php $no++ ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dp['kabupaten']; ?></td>
                            <td><?php echo number_format($dp['jumlah_unit']);
                                $jumlah_unit += $dp['jumlah_unit']; ?></td>
                            <td><?php echo number_format($dp['jumlah_pengunjung']);
                                $jumlah_pengunjung += $dp['jumlah_pengunjung']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td colspan="1" style="text-align: center;">Jumlah</td>
                        <td><?php echo number_format($jumlah_unit) ?></td>
                        <td><?php echo number_format($jumlah_pengunjung) ?></td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

<div class="box box-solid" id="grafik-1A_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok2-objek_wisata" style="max-width: 1080px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_2A_blok2()">Unit</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_2B_blok2()">Pengunjung</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok2-objek_wisata" style="max-width: 1080px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2B_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_2A_blok2()">Unit</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_2B_blok2()">Pengunjung</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2B_blok2-objek_wisata" style="max-width: 1080px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3A_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3A_blok2-objek_wisata" style="max-width: 1080px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-4A_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_4A_blok2()">Unit</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_4B_blok2()">Pengunjung</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-4A_blok2-objek_wisata" style="max-width: 1280px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-4B_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_3A_blok2()"><i class="fa fa-align-left"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Map" onclick="grafik_4A_blok2()"><i class="fa fa-map"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_4A_blok2()">Unit</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_4B_blok2()">Pengunjung</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-4B_blok2-objek_wisata" style="max-width: 1280px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<!-- //table -->
<table id="data_objek_wisata-blok1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Restoran</th>
            <th>Pengunjung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_objek_wisata as $dp) { ?>
            <tr>
                <th><?php echo '' . $dp['kabupaten']; ?></th>
                <td><?php echo $dp['jumlah_unit']; ?></td>
                <td><?php echo $dp['jumlah_pengunjung']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<table id="data_objek_wisata-blok2A" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Objek Wista</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_objek_wisata as $dp) { ?>
            <tr>
                <th><?php echo $dp['kabupaten']; ?></th>
                <td><?php echo $dp['jumlah_unit']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<table id="data_objek_wisata-blok2B" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Pengunjung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_objek_wisata as $dp) { ?>
            <tr>
                <th><?php echo $dp['kabupaten']; ?></th>
                <td><?php echo $dp['jumlah_pengunjung']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#blok2').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> - SIPTA</h4>'
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
            'autoWidth': true
        });

        table.buttons().container()
            .appendTo('.blok2 .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-1A_blok2-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok1'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?></center></h4>'
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
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok2-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok2A'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                }
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + this.series.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2B_blok2-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok2B'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                }
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + this.series.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-3A_blok2-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok1'
        },
        chart: {
            type: 'bar'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
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
                    this.point.y + ' ' + this.series.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4A_blok2-objek_wisata', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> Berdasarkan Jumlah Unit</center></h4>"
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            borderWidth: 0,
            backgroundColor: 'rgba(255,255,255,0.85)',
            floating: false,
            verticalAlign: 'bottom'
            // x: -140
        },
        tooltip: {
            backgroundColor: '#f5f5f5',
            borderWidth: 0,
            shadow: true,
            useHTML: true,
            padding: 0,
            pointFormat: ' <a style="font-size:15pt"><b>{point.name}</b></a><br>' +
                '<span style="font-size:30px">{point.value} Restoran</span>',
            positioner: function() {
                return {
                    x: 20,
                    y: 350
                };
            }
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'top'
            }
        },

        colorAxis: {
            min: "1",
            max: "<?php echo $nilai_max->max ?>",
            type: 'logarithmic',
            minColor: '#B9D5EA',
            maxColor: '#08306D',
            stops: [
                [0, '#B9D5EA'],
                [0.4, '#97C4E0'],
                [0.55, '#4E96C9'],
                [0.60, '#2E6CA5'],
                [0.98, '#08306D']
            ]
            //     labels: {
            //     format: '{value}%'
            //   }
        },

        series: [{
            name: 'Restoran Tahun <?php echo $year_search ?>',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            data: [{

                    "name": "Jembrana",
                    "value": "<?php echo $kab_jembrana->jumlah_unit ?>",
                    "path": "M126,-762,117,-772L117,-774L113,-776,111,-782,100,-792,91,-805,82,-813,71,-815,70,-816,63,-816,62,-818,59,-819,57,-820,56,-822,55,-825,55,-838,57,-840,56,-844,46,-854,34,-869,31,-876,31,-886,28,-893,24,-901,19,-906,18,-911,34,-911,33,-912,41,-912,41,-914,49,-914,48,-915,55,-915,55,-916C55,-916,74,-916,74,-916,75,-916,75,-917,75,-917L85,-917,85,-918L90,-918L90,-919,95,-919,95,-921,99,-921,100,-922,105,-922,105,-923,115,-923,115,-921,120,-922,125,-922C125,-922,127,-922,127,-922,128,-922,132,-918,132,-918L135,-914,137,-908,139,-904,142,-899,148,-896,154,-894,159,-891C159,-891,165,-889,165,-889,166,-889,172,-889,172,-889L179,-889,180,-892,181,-895,181,-897L188,-897L196,-897,198,-898,204,-903,206,-906,208,-907,210,-908L212,-908L215,-905,217,-903,220,-902,226,-901,226,-899,228,-899,228,-898,230,-897,232,-895,238,-891,242,-889,245,-887,249,-886,250,-884,254,-883,256,-882,259,-881C259,-881,260,-879,261,-879,261,-879,263,-877,263,-877,263,-877,265,-876,265,-876L265,-874,265,-868,267,-867,268,-866,270,-865,271,-864,274,-864,275,-863,283,-863,284,-861,289,-861,290,-860,291,-859,293,-857,294,-856,296,-854,298,-853,299,-851,299,-850L299,-849L300,-848,301,-846,301,-842,303,-840L303,-836L304,-835,304,-831C304,-831,305,-829,305,-829,305,-829,305,-827,305,-827L306,-826,307,-823,309,-823,310,-821,312,-819,314,-817,315,-816,317,-815,319,-813,321,-812C321,-812,323,-811,324,-811,324,-811,328,-811,328,-811L331,-809,334,-810C334,-810,336,-808,336,-808,336,-808,339,-808,339,-808L342,-808C342,-808,344,-807,344,-807,344,-807,346,-806,346,-806,346,-805,348,-803,348,-803L351,-800,354,-798,356,-798,356,-797C356,-797,357,-795,358,-795,358,-795,359,-794,359,-794,359,-794,361,-792,361,-792,361,-792,362,-790,362,-790,362,-790,363,-789,363,-789,363,-789,364,-788,364,-788,364,-788,366,-787,366,-787L367,-786,370,-785,371,-784,373,-784,374,-783,376,-783,378,-782,384,-782,390,-782,394,-782,394,-774,394,-769,396,-768,396,-765,396,-753,396,-750,398,-750L398,-734L395,-731,393,-728,388,-725,385,-723,384,-721,375,-721,372,-722,371,-723,368,-724,367,-726,364,-727,362,-729,358,-731,358,-732,355,-732L353,-732L353,-734,328,-733,327,-734,325,-739,323,-740,322,-742,319,-745,315,-748,310,-750,307,-750,304,-752,302,-752,302,-754,299,-754,298,-755,295,-755,294,-756,290,-757,290,-758,288,-758,286,-759,284,-759,283,-760,282,-760,281,-761,258,-761L258,-763L257,-763L256,-763,256,-764,254,-764,253,-765,251,-765,250,-767,249,-769,247,-770,233,-770,227,-770,226,-771,224,-771,223,-772,205,-772,203,-771,193,-771,192,-770,183,-770,183,-769,182,-769,181,-768L181,-767L176,-767,175,-766,173,-766,172,-766,171,-765,169,-764,168,-763L167,-763C167,-763,162,-762,161,-762,160,-762,160,-764,160,-764L158,-764L154,-764L152,-763,152,-762,130,-762z",
                },
                {
                    "name": "Tabanan",
                    "value": "<?php echo $kab_tabanan->jumlah_unit ?>",
                    "path": "M394,-782,406,-801,407,-806,423,-820,434,-821,449,-829,455,-831,463,-834,474,-838,482,-842,493,-843,498,-841,506,-840,506,-843,513,-843,516,-846,522,-847,525,-849,528,-848,532,-851,535,-850,537,-853,540,-853,543,-855,550,-860L577,-860L577,-854,576,-852,576,-846,576,-840,574,-841,574,-837,574,-826,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,581,-813,582,-811,582,-802,583,-801,583,-795,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,579,-761,576,-759,574,-758,570,-757,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,554,-747,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,542,-711,541,-710,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-678,523,-675,522,-674,522,-664,521,-657L520,-657L520,-653,519,-652,519,-650,515,-646,509,-641,503,-637,499,-634,494,-634,494,-633,481,-634,479,-633,477,-635,476,-637,474,-639,471,-642,468,-645,467,-645,464,-646,464,-649,462,-651,460,-653,460,-655,459,-657,455,-660,452,-666,447,-671,442,-674,437,-678,432,-683,430,-689,427,-694,425,-697,421,-698,417,-700,413,-701,408,-704,404,-706,400,-708,398,-711,394,-713,390,-715,386,-718,384,-721,393,-728,395,-731,398,-734L398,-750L396,-750,396,-752,396,-757,396,-765,396,-768,394,-769,394,-782"
                },
                {
                    "name": "Badung",
                    "value": "<?php echo $kab_badung->jumlah_unit ?>",
                    "path": "M479,-633,480,-632,482,-631,482,-629,483,-628,485,-628,485,-627,488,-627L488,-625L490,-625,490,-624,492,-622,493,-620,494,-619,494,-618,495,-616,497,-612L497,-611L499,-610L500,-610L499,-608,501,-607,502,-606,504,-604,505,-603,506,-602,507,-601,508,-600,509,-599,510,-598,511,-597L513,-597L514,-595C514,-595,515,-595,515,-595,515,-594,516,-593,516,-593L517,-592,519,-591,519,-590,520,-590,520,-589,521,-588,521,-587,522,-587,522,-586,525,-586L525,-585L526,-584,526,-584,527,-583L527,-582L528,-582,529,-581,530,-581,530,-580,531,-580,531,-578,531,-577,532,-577,532,-576,534,-576,534,-573,535,-571,535,-570,536,-570L536,-569L537,-569,537,-567,539,-567,538,-566,540,-566,540,-565,541,-565,541,-564L542,-564L544,-562,545,-560,547,-560,548,-558,550,-557,550,-554,551,-554C551,-554,552,-552,552,-551,553,-551,553,-549,553,-549,554,-549,556,-549,556,-549L559,-547,561,-546C561,-546,563,-545,563,-545,564,-544,567,-542,567,-542L568,-539,569,-538,570,-537,570,-527,569,-526,568,-523,566,-519,564,-517,563,-516,562,-511,563,-510,564,-508,565,-506,566,-503,567,-503L567,-500L569,-500,569,-497,569,-491,567,-489,565,-487C565,-487,564,-487,564,-487,563,-486,561,-484,561,-484L557,-482,547,-482,544,-481,540,-477,537,-474,531,-469C531,-469,526,-464,526,-464,526,-464,523,-462,523,-462L521,-459,514,-458,507,-457,502,-453,499,-449,499,-445C499,-445,499,-442,500,-442,500,-441,503,-441,503,-441,504,-441,507,-439,507,-439L509,-438,513,-436,516,-434C516,-434,518,-433,518,-433,519,-433,524,-433,524,-433L530,-432,546,-432,556,-433,562,-433,565,-435,569,-436,571,-438,577,-439,579,-440,585,-439C585,-439,590,-439,591,-439,591,-440,592,-441,592,-441L594,-442,599,-442,599,-443,605,-443,608,-445,609,-446L610,-446L612,-447,615,-450,620,-451,624,-455,628,-458,629,-460,629,-463,630,-464,630,-468,630,-491,630,-492,626,-495,620,-495,616,-491,612,-487,606,-483,603,-483,600,-484,598,-486,597,-488L597,-494L596,-496,595,-497,595,-507L595,-512L594,-513,593,-513,593,-516,592,-517,592,-520,590,-520,589,-521,587,-523,585,-525,585,-527,585,-537,583,-539,582,-541,580,-543,579,-545,577,-546,576,-548,575,-550L575,-557L573,-557,573,-565,572,-566,572,-568,571,-568,570,-569,570,-569,570,-571,568,-572,568,-573,567,-574,567,-589,568,-589,568,-590,570,-592,570,-598,571,-598,571,-604,572,-605,579,-605,582,-606,583,-608C583,-608,586,-609,586,-609,587,-609,589,-612,589,-612L591,-616,594,-617,597,-617,604,-621,608,-623,614,-628,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695C626,-695,631,-697,632,-698,633,-699,635,-706,635,-706L635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,615,-728,613,-730,613,-734,616,-737,622,-745C622,-745,626,-745,626,-746,627,-747,628,-756,628,-756L630,-762,635,-775,638,-779C638,-779,644,-785,644,-787,645,-788,647,-795,647,-795,647,-795,649,-800,649,-801,650,-801,651,-806,651,-806L652,-813,653,-815,653,-825,655,-828,654,-839,653,-841,653,-846,652,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,629,-890,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860L577,-860L577,-854,576,-852,576,-840,574,-841,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,582,-811,582,-802,583,-801,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,574,-758,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-675,522,-674,521,-657L520,-657L520,-653,519,-652,519,-650,509,-641,499,-634,494,-634,494,-633,481,-634z"
                },
                {
                    "name": "Denpasar",
                    "value": "<?php echo $kab_denpasar->jumlah_unit ?>",
                    "path": "M652,-557,652,-566,652,-569,653,-572,653,-574C653,-574,654,-575,654,-575,655,-575,655,-578,655,-578L656,-579,657,-581,658,-581,660,-583,661,-584,661,-588,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,633,-608,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,617,-630,616,-631,614,-628,608,-623,597,-617,594,-617,591,-616,589,-612,587,-609,583,-608,582,-606,579,-605,572,-605,571,-604,571,-598,570,-598,570,-592,568,-590,568,-589,567,-589,567,-574,568,-573,568,-572,570,-571,570,-569,570,-569,571,-568,572,-568,572,-566,573,-565,573,-557,575,-557L575,-550L576,-548,577,-546,579,-545,580,-543,582,-541,583,-539,585,-537,585,-527,585,-525C585,-525,587,-523,587,-523L589,-521,590,-520,592,-520,592,-517,593,-516,593,-513,594,-513,595,-512,595,-508,596,-508,596,-509,597,-511,599,-511,599,-512,600,-513C600,-513,601,-515,601,-515,601,-516,602,-516,602,-516L603,-517,605,-517,610,-518,612,-519,613,-521,615,-523,615,-525C615,-525,615,-526,615,-526,615,-527,616,-528,616,-528L617,-529,617,-530,618,-532,620,-534C620,-534,621,-535,621,-535,621,-535,624,-536,624,-536L627,-537C627,-537,629,-538,629,-538,629,-538,633,-537,633,-537,634,-537,638,-539,638,-539,638,-539,640,-540,640,-540,640,-540,643,-542,643,-542,643,-542,645,-543,645,-543,645,-543,645,-547,645,-547,645,-547,646,-548,647,-549,647,-549,648,-551,648,-552,648,-552,648,-554,649,-554,649,-554,651,-555,651,-555z"
                },
                {
                    "name": "Gianyar",
                    "value": "<?php echo $kab_gianyar->jumlah_unit ?>",
                    "path": "M682,-808,692,-809,693,-804,693,-802,691,-800C691,-800,690,-798,691,-797,691,-797,690,-794,690,-794L690,-791,691,-788,691,-786,692,-785,693,-783,695,-783,696,-780,698,-776L698,-774L698,-766,701,-764,704,-763,707,-761,707,-753,706,-752L706,-748L704,-747,703,-744,701,-743,700,-742,699,-740C699,-740,699,-739,698,-739,698,-738,698,-736,698,-736L697,-734,695,-733,695,-732,695,-730,694,-729,692,-727,692,-726,692,-723,691,-723,689,-719,689,-712,691,-710,691,-707,692,-706,692,-673,692,-670,693,-669,694,-667C694,-667,695,-666,695,-666,695,-665,698,-664,698,-664L699,-662C699,-662,702,-660,702,-659,703,-659,705,-657,705,-657L706,-654C706,-654,706,-654,707,-653,708,-652,709,-651,710,-650,710,-650,713,-650,713,-649,714,-648,716,-647,716,-646,716,-645,718,-644,717,-640,717,-637,717,-634,717,-634L715,-632,713,-629,711,-629,704,-628,701,-627,701,-626,700,-624,698,-621,696,-619,696,-616,693,-614,690,-613C690,-613,687,-611,686,-611,686,-611,684,-611,684,-611L682,-611C682,-611,678,-610,679,-609,679,-608,678,-606,678,-606L676,-606,674,-605,674,-602,672,-602,671,-601,671,-599,670,-599,670,-596,669,-594,667,-593,666,-592,666,-592,664,-591,662,-590,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,616,-631,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695,632,-698,635,-706,635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,613,-730,613,-734,616,-737,622,-745,624,-745,626,-746,628,-756,635,-775,638,-779,641,-783,644,-786,647,-795,649,-800,651,-806,652,-813,653,-815,653,-825,655,-828,655,-830,657,-830,658,-829,660,-827,661,-826,663,-826,664,-824,667,-822,667,-820,669,-819,671,-817,673,-814,676,-813,677,-811,679,-810,680,-809z"
                },
                {
                    "name": "Klungkung",
                    "value": "<?php echo $kab_klungkung->jumlah_unit ?>",
                    "path": "M695,-711L707,-711L711,-712L721,-712L722,-713,728,-713,730,-715,734,-714,737,-717,737,-719,739,-720,740,-722,748,-722,750,-723,758,-723,759,-721,761,-718L761,-715L762,-712L762,-705L762,-700,762,-699,764,-697,766,-694,767,-694,768,-691,768,-683L769,-683L770,-679L773,-679L776,-677,778,-676,781,-673,783,-671C783,-671,785,-670,786,-670,786,-670,806,-670,806,-670L808,-669,810,-667,813,-665,815,-662,815,-659,816,-657,817,-654,817,-651,810,-650,808,-649,805,-649,803,-647,800,-646,799,-644,796,-643,790,-642,787,-639,785,-637,781,-636,778,-635,775,-634,772,-633,767,-631,733,-632,731,-633,727,-633,726,-634,722,-634,721,-636,720,-636,719,-637,718,-637,717,-636,718,-642,717,-645,716,-647,714,-648,713,-649,710,-650,706,-654,705,-657,699,-662,698,-664,696,-666,695,-666,694,-667,693,-669,692,-670,692,-706,691,-707,691,-710L691,-710z,M838,-560L845,-560L847,-562,862,-561,864,-563,866,-563,868,-565,872,-566,876,-566,877,-564,878,-563,880,-560,880,-559,881,-559,882,-557,882,-555C882,-555,883,-554,883,-554,883,-554,885,-553,885,-553L887,-553,889,-552,890,-551,892,-549,894,-546,895,-544,896,-543,897,-541,897,-539,898,-538,899,-536,900,-535,902,-534,903,-533,905,-531,909,-529,912,-528,914,-528,915,-526,918,-526,919,-525,921,-523,923,-521,923,-519,924,-517,925,-516,925,-513,926,-512,926,-510,927,-509,927,-506,928,-505,929,-503,930,-501,930,-496,929,-494,928,-492,927,-491,927,-489C927,-489,926,-489,926,-488,926,-488,926,-487,926,-487L922,-485,921,-483,919,-480,917,-478,915,-474,914,-472,912,-468,909,-466,907,-463,905,-458,903,-455C903,-455,899,-452,899,-452,899,-452,896,-449,896,-449L894,-449,893,-448,890,-449,889,-447,886,-446,876,-446,875,-447,873,-448,872,-449,871,-450,870,-450,869,-451,866,-451,865,-452,863,-453L859,-453L858,-455,857,-455,854,-455,853,-455,851,-457L850,-457L849,-458,848,-460,847,-463L847,-467L847,-474,846,-475,845,-478,844,-479,841,-482,839,-485,835,-488,833,-489,830,-489,828,-490,827,-490,824,-493,822,-494,818,-495,817,-497,816,-498,813,-500,810,-502,807,-504,805,-506,805,-507,803,-508,802,-510,801,-512,800,-514,800,-517,798,-519,797,-520,797,-532,799,-533,801,-535,803,-537,804,-538,806,-539,807,-540,808,-541,812,-544,814,-546,817,-550,821,-553,823,-554,824,-555,825,-556,828,-558C828,-558,832,-558,832,-558,832,-558,832,-559,833,-559,833,-559,836,-559,836,-559L836,-560z"
                },
                {
                    "name": "Bangli",
                    "value": "<?php echo $kab_bangli->jumlah_unit ?>",
                    "path": "M637,-908,637,-923,639,-924,642,-926,644,-927,645,-932,646,-938,649,-940,653,-941,658,-942,660,-944,664,-948,665,-951,670,-952,672,-953,681,-953,682,-952,692,-952,694,-950,697,-951,698,-952,705,-952,706,-953L716,-953L720,-951,723,-948,725,-945,727,-943,742,-943,744,-944,751,-944,752,-942,756,-940,757,-938,764,-940,765,-938,767,-937,771,-936,774,-936,774,-934L778,-934L780,-933,782,-932,783,-931,787,-931,790,-928,792,-925,795,-923,797,-922,798,-920,800,-918,801,-916,802,-914,802,-907,803,-892,804,-889,804,-882,804,-875,802,-874,801,-872,799,-872,799,-870,798,-869,797,-868,795,-866,795,-863,795,-858,793,-858,793,-857,792,-855,790,-853,785,-848,781,-845,778,-842,775,-840,771,-837,768,-834,762,-827,759,-826,757,-825,758,-823,757,-822,757,-816,756,-815,756,-797,756,-794,754,-793,756,-791,755,-785,757,-782,759,-780,761,-779C761,-779,762,-776,762,-776,762,-776,764,-773,764,-773L763,-771,765,-770,766,-769,766,-767,767,-765,766,-762,768,-762,769,-760C769,-760,770,-758,770,-757,770,-757,770,-752,770,-752L771,-750,772,-747,773,-745,773,-741,772,-739,771,-737,770,-734,768,-731,769,-729,767,-727,766,-725,762,-723,759,-721,758,-723,750,-723,748,-722,740,-722,739,-720,737,-719,737,-717,734,-714,730,-715,728,-713,722,-713,721,-712L711,-712L707,-711L695,-711L691,-710,689,-712,689,-719,691,-723,692,-723,692,-727,695,-730,695,-732,695,-733,697,-734,698,-736,698,-738,701,-743,703,-744,704,-747,706,-748L706,-752L707,-753,707,-761,704,-763,701,-764,698,-766,698,-776,697,-778,696,-780,695,-783,693,-783,692,-785,691,-786,690,-791,690,-794,691,-797,691,-798,691,-800,693,-802,693,-804,692,-809,682,-808,680,-809,679,-810,677,-811,676,-813,673,-814,670,-818,667,-820,667,-822,663,-826,661,-826,658,-829,657,-830,655,-830,654,-839,653,-841,653,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,628,-892,629,-893,630,-895,630,-897,631,-897,633,-899,633,-901,635,-901,635,-903,636,-906,636,-907z"
                },
                {
                    "name": "Karangasem",
                    "value": "<?php echo $kab_karangasem->jumlah_unit ?>",
                    "path": "M792,-952,808,-952,810,-951,812,-951,813,-949,816,-949,818,-948,819,-947,820,-947,822,-945,825,-944,828,-940,831,-938,832,-936,836,-936,838,-934,841,-934,844,-932,847,-930,850,-928,850,-927,853,-923,855,-921,857,-918,860,-915C860,-915,863,-912,864,-911,864,-911,866,-909,866,-909,867,-909,869,-907,869,-907L877,-908,879,-906,881,-906,883,-905,886,-905,887,-904,889,-902,891,-902,893,-900,898,-900,900,-899,901,-898,902,-897,902,-895,903,-894,904,-892,904,-891,906,-888C906,-888,907,-887,907,-886,907,-886,910,-882,910,-882L910,-879,911,-878,912,-875,913,-873,914,-871,916,-869,916,-866C916,-866,917,-864,917,-863,917,-863,918,-858,918,-858L918,-856,918,-854,919,-851,919,-849,920,-848,920,-846,921,-845,922,-843,923,-841,924,-841,926,-839,927,-838,928,-837,929,-836,931,-835,933,-834L934,-834L935,-833,937,-831,938,-830,941,-828,943,-827,946,-825,947,-824,949,-824,950,-822,953,-822,954,-821,955,-821,956,-820,957,-819,959,-818,961,-818,962,-817,963,-816C963,-816,964,-815,964,-815,965,-815,967,-814,967,-814L968,-813L969,-813L971,-812,975,-812,976,-811L977,-811L980,-809,983,-808,984,-808,987,-807C987,-807,989,-806,989,-805,990,-805,992,-802,992,-802L994,-800,996,-797,996,-796,998,-795,998,-792,999,-789,1000,-787,1000,-782,1000,-778,999,-776,999,-774,999,-773,996,-771,994,-769,991,-768,989,-767,988,-766,986,-765,983,-764,983,-763,980,-763,979,-762,976,-760,974,-757,971,-755,969,-754,967,-752,966,-751,964,-750,961,-748,960,-747,958,-746,956,-745,955,-743,953,-741,951,-740,949,-737,947,-736,945,-733,943,-732,942,-729,941,-728,940,-725,938,-723,937,-721,937,-720,936,-718,934,-717,932,-716,930,-713,929,-711,929,-710,927,-708,926,-707,926,-705,924,-703,922,-701,922,-699,918,-697,915,-694,915,-692,912,-692,910,-690,907,-689,905,-688,904,-687,901,-687,894,-687,888,-687,886,-686,881,-686,881,-686,878,-687,876,-688L873,-688L871,-689,869,-690,867,-691,866,-692,865,-692,862,-693,858,-693,855,-693,854,-692,853,-691,851,-690,851,-688,850,-688,849,-686,848,-685,847,-683,848,-675,846,-675,845,-673,844,-673,843,-671,841,-671,841,-670,841,-665,840,-665,839,-664,838,-664,837,-661,835,-661C835,-661,835,-659,834,-659,834,-659,834,-657,834,-657L832,-657,830,-656,829,-656,827,-655,827,-654,826,-654,825,-653,823,-653,822,-652,821,-652,820,-651,819,-651,818,-651,817,-651,817,-654,816,-657,815,-660,813,-665,809,-668,808,-669,806,-670,786,-670,783,-671,780,-674,778,-676,776,-677,773,-679L770,-679L769,-683L768,-683L768,-691,767,-694,766,-694,764,-697,762,-699,762,-700,762,-712,761,-715L761,-718L759,-721,762,-723,766,-725,767,-727,769,-729,768,-731,770,-734,771,-737,772,-739,773,-741,773,-745,771,-750,770,-752,770,-758,769,-760,768,-762,766,-762,767,-765,766,-767,766,-769,763,-771,764,-773,762,-776,761,-779,759,-780,757,-782,755,-785,756,-791,754,-793,756,-794,756,-815,757,-816,757,-822,758,-823,757,-825,759,-826,762,-827,768,-834,771,-837,775,-840,778,-842,781,-845,785,-848,789,-852,792,-855,793,-857,793,-858,795,-858,795,-863,795,-866,797,-868,798,-869,799,-870,799,-872,801,-872,804,-875,804,-879,804,-882,804,-887,804,-889,803,-892,802,-914,800,-918,798,-920,797,-922,794,-924,787,-931,782,-932,780,-933,778,-934L774,-934L774,-936,771,-936,767,-937,765,-938,764,-940,765,-942,766,-943,766,-945,768,-946,769,-948,769,-953,769,-954,770,-955,770,-966,770,-967L771,-967L771,-966,773,-966,774,-964,775,-965,776,-964,777,-963,778,-963,778,-963,779,-962,779,-962,780,-961,780,-960,781,-960,781,-959,782,-959,783,-957,784,-957,784,-956,785,-956,786,-955,787,-954,787,-953,789,-953,789,-952z"
                },
                {
                    "name": "Buleleng",
                    "value": "<?php echo $kab_buleleng->jumlah_unit ?>",
                    "path": "M16,-916,14,-917,13,-918,12,-919,11,-921,10,-921,10,-924,9,-924,9,-930,10,-930L10,-933L11,-934,11,-936,13,-937,14,-939,15,-940,15,-941,15,-943,16,-943,16,-949,15,-949,15,-951,14,-952,12,-953,11,-953,10,-954,9,-954,7,-955,6,-955,5,-956,4,-956,3,-958,3,-957,1,-959,1,-961,0,-962,0,-990,1,-991L1,-992L3,-993,3,-994,4,-995,6,-996,6,-998,9,-1000,12,-1003,12,-1004,15,-1005,18,-1005,21,-1006,31,-1006,33,-1005,37,-1004,38,-1003C38,-1003,40,-1004,41,-1003,41,-1003,42,-1002,42,-1002L44,-1002,45,-1001,48,-1001,48,-1000,50,-999,52,-998,53,-997,54,-997,55,-996,57,-996,58,-994C58,-994,59,-994,59,-994,60,-993,61,-992,61,-992L62,-991,63,-990,64,-989,64,-988,65,-987,66,-987,66,-986,67,-986,67,-979,67,-975,66,-974,65,-974,65,-973,64,-972,64,-971,63,-970,63,-968,63,-966,63,-965,64,-965,64,-964,65,-963,65,-962,67,-962,67,-961,70,-961,71,-960,72,-959,73,-959,74,-959,79,-959,81,-959,82,-960,84,-960,84,-962,86,-963,89,-963,90,-965,93,-966,94,-967,97,-969,99,-972C99,-972,99,-973,99,-973,99,-973,100,-974,100,-974L102,-975,103,-976,105,-977,107,-979,109,-979,110,-981,112,-982,113,-983,116,-986,122,-986,126,-984,129,-982,131,-980,133,-978,150,-978,154,-978C154,-978,155,-977,155,-977,156,-977,158,-977,158,-977L159,-975L164,-975L165,-974L168,-974L170,-973,172,-973,173,-972,179,-972,178,-971C178,-971,181,-971,181,-971,182,-971,182,-969,182,-969L184,-969,187,-966,190,-964,192,-963,195,-961,197,-959,200,-959,202,-957,206,-956,222,-957,226,-955,231,-955,237,-953,242,-951,245,-951,251,-950,262,-949,265,-948,271,-947,272,-946,276,-943,277,-941,279,-941,282,-940,285,-938,288,-938,291,-937,292,-935,297,-935,303,-934,305,-933L333,-933L337,-931L359,-931L365,-934,371,-936,373,-938,386,-937,388,-939,397,-938,398,-941,406,-941,410,-941,416,-942,421,-943,423,-945,429,-946,432,-948,437,-948,440,-950L444,-950L448,-953,453,-955C453,-955,458,-957,459,-958,460,-958,463,-962,463,-962L463,-964,469,-965,471,-966,472,-969,473,-973,476,-977,481,-980,487,-982,494,-982,499,-985,503,-991,507,-995,511,-998,518,-1002,521,-1005,527,-1010,534,-1014,540,-1017,548,-1017,549,-1018,554,-1019,557,-1021,561,-1022,564,-1024,569,-1024,570,-1025,593,-1024,595,-1027,599,-1027,602,-1024,603,-1024,607,-1022,612,-1021,615,-1019,618,-1019,623,-1018,626,-1017,631,-1015,634,-1013,637,-1011,642,-1010,646,-1008,649,-1009,653,-1007,656,-1006,659,-1002,665,-999,668,-996,673,-994,693,-994,699,-993,702,-991,706,-989,708,-987,713,-986,718,-984,722,-983,725,-980,730,-979,734,-976,737,-975,741,-974,748,-975,750,-973,754,-973,756,-973,758,-971,762,-970,765,-968,770,-967,770,-955,769,-954,769,-948,768,-946,766,-945,766,-943,765,-942,764,-940,757,-938,756,-940,752,-942,751,-944,744,-944,742,-943,727,-943,725,-945,723,-948,720,-951,716,-953L706,-953L705,-952,698,-952,697,-951,694,-950,692,-952,682,-952,681,-953,672,-953,670,-952,665,-951,664,-948,658,-942,653,-941,649,-940,646,-938,645,-932,644,-927,642,-926,639,-924,637,-923,637,-908,636,-907,636,-906,635,-903,635,-901,633,-901,633,-899,631,-897,630,-897,630,-895,629,-893,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860,550,-860,543,-855,540,-853,537,-853,535,-850,532,-851,528,-848,525,-849,522,-847,516,-846,513,-843,506,-843,506,-840,498,-841,493,-843,482,-842,474,-838,449,-829,434,-821,423,-820C423,-820,407,-806,407,-806L406,-801,394,-782,378,-782,376,-783,374,-783,373,-784,371,-784,370,-785,367,-786,366,-787,364,-788,363,-789,361,-790,359,-794,357,-795,356,-798,354,-798,351,-800,346,-805,342,-808,336,-809,334,-810,331,-809,328,-811,324,-811,321,-812,319,-813,317,-815,314,-817,312,-819,310,-821,309,-823,307,-823,306,-826,305,-827,305,-829,304,-831,304,-835,303,-836L303,-840L301,-842,301,-846,300,-848,299,-849L299,-850L298,-853,296,-854,294,-856,291,-859,290,-860,289,-861,284,-861,283,-863,275,-863,274,-864,271,-864,270,-865,268,-866,267,-867,265,-868,265,-874,265,-876,263,-877,259,-881,254,-883,250,-884,249,-886,245,-887,242,-889,238,-891,233,-895,230,-897,228,-898,228,-899,226,-899,226,-901,220,-902,217,-903,212,-908L210,-908L208,-907,206,-906,204,-903,198,-898,196,-897,181,-897,180,-892,179,-889,172,-889,165,-889,159,-891,142,-899,139,-904,137,-908,135,-914,132,-918,127,-922,115,-921,115,-923,105,-923,105,-922,100,-922,99,-921,95,-921,95,-919,90,-919,90,-918L85,-918L85,-917,75,-917,74,-916,55,-916,55,-915,48,-915,49,-914,41,-914,41,-912,33,-912,34,-911,18,-911,18,-912,17,-913,16,-913,16,-914z"
                }
            ]
        }]
    });
</script>

<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4B_blok2-objek_wisata', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> Restoran Tahun <?php echo $tahun ?> Berdasarkan Jumlah Pengunjung</center></h4>"
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            borderWidth: 0,
            backgroundColor: 'rgba(255,255,255,0.85)',
            floating: false,
            verticalAlign: 'bottom'
            // x: -140
        },
        tooltip: {
            backgroundColor: '#f5f5f5',
            borderWidth: 0,
            shadow: true,
            useHTML: true,
            padding: 0,
            pointFormat: ' <a style="font-size:15pt"><b>{point.name}</b></a><br>' +
                '<span style="font-size:30px">{point.value} Pengunjung</span>',
            positioner: function() {
                return {
                    x: 20,
                    y: 350
                };
            }
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'top'
            }
        },

        colorAxis: {
            min: "1",
            max: "<?php echo $nilai_max->max_kamar ?>",
            type: 'logarithmic',
            minColor: '#B9D5EA',
            maxColor: '#08306D',
            stops: [
                [0, '#B9D5EA'],
                [0.4, '#97C4E0'],
                [0.55, '#4E96C9'],
                [0.60, '#2E6CA5'],
                [0.98, '#08306D']
            ]
            //     labels: {
            //     format: '{value}%'
            //   }
        },

        series: [{
            name: 'Pengunjung Restoran Tahun <?php echo $year_search ?>',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            data: [{

                    "name": "Jembrana",
                    "value": "<?php echo $kab_jembrana->jumlah_pengunjung ?>",
                    "path": "M126,-762,117,-772L117,-774L113,-776,111,-782,100,-792,91,-805,82,-813,71,-815,70,-816,63,-816,62,-818,59,-819,57,-820,56,-822,55,-825,55,-838,57,-840,56,-844,46,-854,34,-869,31,-876,31,-886,28,-893,24,-901,19,-906,18,-911,34,-911,33,-912,41,-912,41,-914,49,-914,48,-915,55,-915,55,-916C55,-916,74,-916,74,-916,75,-916,75,-917,75,-917L85,-917,85,-918L90,-918L90,-919,95,-919,95,-921,99,-921,100,-922,105,-922,105,-923,115,-923,115,-921,120,-922,125,-922C125,-922,127,-922,127,-922,128,-922,132,-918,132,-918L135,-914,137,-908,139,-904,142,-899,148,-896,154,-894,159,-891C159,-891,165,-889,165,-889,166,-889,172,-889,172,-889L179,-889,180,-892,181,-895,181,-897L188,-897L196,-897,198,-898,204,-903,206,-906,208,-907,210,-908L212,-908L215,-905,217,-903,220,-902,226,-901,226,-899,228,-899,228,-898,230,-897,232,-895,238,-891,242,-889,245,-887,249,-886,250,-884,254,-883,256,-882,259,-881C259,-881,260,-879,261,-879,261,-879,263,-877,263,-877,263,-877,265,-876,265,-876L265,-874,265,-868,267,-867,268,-866,270,-865,271,-864,274,-864,275,-863,283,-863,284,-861,289,-861,290,-860,291,-859,293,-857,294,-856,296,-854,298,-853,299,-851,299,-850L299,-849L300,-848,301,-846,301,-842,303,-840L303,-836L304,-835,304,-831C304,-831,305,-829,305,-829,305,-829,305,-827,305,-827L306,-826,307,-823,309,-823,310,-821,312,-819,314,-817,315,-816,317,-815,319,-813,321,-812C321,-812,323,-811,324,-811,324,-811,328,-811,328,-811L331,-809,334,-810C334,-810,336,-808,336,-808,336,-808,339,-808,339,-808L342,-808C342,-808,344,-807,344,-807,344,-807,346,-806,346,-806,346,-805,348,-803,348,-803L351,-800,354,-798,356,-798,356,-797C356,-797,357,-795,358,-795,358,-795,359,-794,359,-794,359,-794,361,-792,361,-792,361,-792,362,-790,362,-790,362,-790,363,-789,363,-789,363,-789,364,-788,364,-788,364,-788,366,-787,366,-787L367,-786,370,-785,371,-784,373,-784,374,-783,376,-783,378,-782,384,-782,390,-782,394,-782,394,-774,394,-769,396,-768,396,-765,396,-753,396,-750,398,-750L398,-734L395,-731,393,-728,388,-725,385,-723,384,-721,375,-721,372,-722,371,-723,368,-724,367,-726,364,-727,362,-729,358,-731,358,-732,355,-732L353,-732L353,-734,328,-733,327,-734,325,-739,323,-740,322,-742,319,-745,315,-748,310,-750,307,-750,304,-752,302,-752,302,-754,299,-754,298,-755,295,-755,294,-756,290,-757,290,-758,288,-758,286,-759,284,-759,283,-760,282,-760,281,-761,258,-761L258,-763L257,-763L256,-763,256,-764,254,-764,253,-765,251,-765,250,-767,249,-769,247,-770,233,-770,227,-770,226,-771,224,-771,223,-772,205,-772,203,-771,193,-771,192,-770,183,-770,183,-769,182,-769,181,-768L181,-767L176,-767,175,-766,173,-766,172,-766,171,-765,169,-764,168,-763L167,-763C167,-763,162,-762,161,-762,160,-762,160,-764,160,-764L158,-764L154,-764L152,-763,152,-762,130,-762z",
                },
                {
                    "name": "Tabanan",
                    "value": "<?php echo $kab_tabanan->jumlah_pengunjung ?>",
                    "path": "M394,-782,406,-801,407,-806,423,-820,434,-821,449,-829,455,-831,463,-834,474,-838,482,-842,493,-843,498,-841,506,-840,506,-843,513,-843,516,-846,522,-847,525,-849,528,-848,532,-851,535,-850,537,-853,540,-853,543,-855,550,-860L577,-860L577,-854,576,-852,576,-846,576,-840,574,-841,574,-837,574,-826,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,581,-813,582,-811,582,-802,583,-801,583,-795,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,579,-761,576,-759,574,-758,570,-757,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,554,-747,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,542,-711,541,-710,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-678,523,-675,522,-674,522,-664,521,-657L520,-657L520,-653,519,-652,519,-650,515,-646,509,-641,503,-637,499,-634,494,-634,494,-633,481,-634,479,-633,477,-635,476,-637,474,-639,471,-642,468,-645,467,-645,464,-646,464,-649,462,-651,460,-653,460,-655,459,-657,455,-660,452,-666,447,-671,442,-674,437,-678,432,-683,430,-689,427,-694,425,-697,421,-698,417,-700,413,-701,408,-704,404,-706,400,-708,398,-711,394,-713,390,-715,386,-718,384,-721,393,-728,395,-731,398,-734L398,-750L396,-750,396,-752,396,-757,396,-765,396,-768,394,-769,394,-782"
                },
                {
                    "name": "Badung",
                    "value": "<?php echo $kab_badung->jumlah_pengunjung ?>",
                    "path": "M479,-633,480,-632,482,-631,482,-629,483,-628,485,-628,485,-627,488,-627L488,-625L490,-625,490,-624,492,-622,493,-620,494,-619,494,-618,495,-616,497,-612L497,-611L499,-610L500,-610L499,-608,501,-607,502,-606,504,-604,505,-603,506,-602,507,-601,508,-600,509,-599,510,-598,511,-597L513,-597L514,-595C514,-595,515,-595,515,-595,515,-594,516,-593,516,-593L517,-592,519,-591,519,-590,520,-590,520,-589,521,-588,521,-587,522,-587,522,-586,525,-586L525,-585L526,-584,526,-584,527,-583L527,-582L528,-582,529,-581,530,-581,530,-580,531,-580,531,-578,531,-577,532,-577,532,-576,534,-576,534,-573,535,-571,535,-570,536,-570L536,-569L537,-569,537,-567,539,-567,538,-566,540,-566,540,-565,541,-565,541,-564L542,-564L544,-562,545,-560,547,-560,548,-558,550,-557,550,-554,551,-554C551,-554,552,-552,552,-551,553,-551,553,-549,553,-549,554,-549,556,-549,556,-549L559,-547,561,-546C561,-546,563,-545,563,-545,564,-544,567,-542,567,-542L568,-539,569,-538,570,-537,570,-527,569,-526,568,-523,566,-519,564,-517,563,-516,562,-511,563,-510,564,-508,565,-506,566,-503,567,-503L567,-500L569,-500,569,-497,569,-491,567,-489,565,-487C565,-487,564,-487,564,-487,563,-486,561,-484,561,-484L557,-482,547,-482,544,-481,540,-477,537,-474,531,-469C531,-469,526,-464,526,-464,526,-464,523,-462,523,-462L521,-459,514,-458,507,-457,502,-453,499,-449,499,-445C499,-445,499,-442,500,-442,500,-441,503,-441,503,-441,504,-441,507,-439,507,-439L509,-438,513,-436,516,-434C516,-434,518,-433,518,-433,519,-433,524,-433,524,-433L530,-432,546,-432,556,-433,562,-433,565,-435,569,-436,571,-438,577,-439,579,-440,585,-439C585,-439,590,-439,591,-439,591,-440,592,-441,592,-441L594,-442,599,-442,599,-443,605,-443,608,-445,609,-446L610,-446L612,-447,615,-450,620,-451,624,-455,628,-458,629,-460,629,-463,630,-464,630,-468,630,-491,630,-492,626,-495,620,-495,616,-491,612,-487,606,-483,603,-483,600,-484,598,-486,597,-488L597,-494L596,-496,595,-497,595,-507L595,-512L594,-513,593,-513,593,-516,592,-517,592,-520,590,-520,589,-521,587,-523,585,-525,585,-527,585,-537,583,-539,582,-541,580,-543,579,-545,577,-546,576,-548,575,-550L575,-557L573,-557,573,-565,572,-566,572,-568,571,-568,570,-569,570,-569,570,-571,568,-572,568,-573,567,-574,567,-589,568,-589,568,-590,570,-592,570,-598,571,-598,571,-604,572,-605,579,-605,582,-606,583,-608C583,-608,586,-609,586,-609,587,-609,589,-612,589,-612L591,-616,594,-617,597,-617,604,-621,608,-623,614,-628,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695C626,-695,631,-697,632,-698,633,-699,635,-706,635,-706L635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,615,-728,613,-730,613,-734,616,-737,622,-745C622,-745,626,-745,626,-746,627,-747,628,-756,628,-756L630,-762,635,-775,638,-779C638,-779,644,-785,644,-787,645,-788,647,-795,647,-795,647,-795,649,-800,649,-801,650,-801,651,-806,651,-806L652,-813,653,-815,653,-825,655,-828,654,-839,653,-841,653,-846,652,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,629,-890,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860L577,-860L577,-854,576,-852,576,-840,574,-841,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,582,-811,582,-802,583,-801,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,574,-758,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-675,522,-674,521,-657L520,-657L520,-653,519,-652,519,-650,509,-641,499,-634,494,-634,494,-633,481,-634z"
                },
                {
                    "name": "Denpasar",
                    "value": "<?php echo $kab_denpasar->jumlah_pengunjung ?>",
                    "path": "M652,-557,652,-566,652,-569,653,-572,653,-574C653,-574,654,-575,654,-575,655,-575,655,-578,655,-578L656,-579,657,-581,658,-581,660,-583,661,-584,661,-588,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,633,-608,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,617,-630,616,-631,614,-628,608,-623,597,-617,594,-617,591,-616,589,-612,587,-609,583,-608,582,-606,579,-605,572,-605,571,-604,571,-598,570,-598,570,-592,568,-590,568,-589,567,-589,567,-574,568,-573,568,-572,570,-571,570,-569,570,-569,571,-568,572,-568,572,-566,573,-565,573,-557,575,-557L575,-550L576,-548,577,-546,579,-545,580,-543,582,-541,583,-539,585,-537,585,-527,585,-525C585,-525,587,-523,587,-523L589,-521,590,-520,592,-520,592,-517,593,-516,593,-513,594,-513,595,-512,595,-508,596,-508,596,-509,597,-511,599,-511,599,-512,600,-513C600,-513,601,-515,601,-515,601,-516,602,-516,602,-516L603,-517,605,-517,610,-518,612,-519,613,-521,615,-523,615,-525C615,-525,615,-526,615,-526,615,-527,616,-528,616,-528L617,-529,617,-530,618,-532,620,-534C620,-534,621,-535,621,-535,621,-535,624,-536,624,-536L627,-537C627,-537,629,-538,629,-538,629,-538,633,-537,633,-537,634,-537,638,-539,638,-539,638,-539,640,-540,640,-540,640,-540,643,-542,643,-542,643,-542,645,-543,645,-543,645,-543,645,-547,645,-547,645,-547,646,-548,647,-549,647,-549,648,-551,648,-552,648,-552,648,-554,649,-554,649,-554,651,-555,651,-555z"
                },
                {
                    "name": "Gianyar",
                    "value": "<?php echo $kab_gianyar->jumlah_pengunjung ?>",
                    "path": "M682,-808,692,-809,693,-804,693,-802,691,-800C691,-800,690,-798,691,-797,691,-797,690,-794,690,-794L690,-791,691,-788,691,-786,692,-785,693,-783,695,-783,696,-780,698,-776L698,-774L698,-766,701,-764,704,-763,707,-761,707,-753,706,-752L706,-748L704,-747,703,-744,701,-743,700,-742,699,-740C699,-740,699,-739,698,-739,698,-738,698,-736,698,-736L697,-734,695,-733,695,-732,695,-730,694,-729,692,-727,692,-726,692,-723,691,-723,689,-719,689,-712,691,-710,691,-707,692,-706,692,-673,692,-670,693,-669,694,-667C694,-667,695,-666,695,-666,695,-665,698,-664,698,-664L699,-662C699,-662,702,-660,702,-659,703,-659,705,-657,705,-657L706,-654C706,-654,706,-654,707,-653,708,-652,709,-651,710,-650,710,-650,713,-650,713,-649,714,-648,716,-647,716,-646,716,-645,718,-644,717,-640,717,-637,717,-634,717,-634L715,-632,713,-629,711,-629,704,-628,701,-627,701,-626,700,-624,698,-621,696,-619,696,-616,693,-614,690,-613C690,-613,687,-611,686,-611,686,-611,684,-611,684,-611L682,-611C682,-611,678,-610,679,-609,679,-608,678,-606,678,-606L676,-606,674,-605,674,-602,672,-602,671,-601,671,-599,670,-599,670,-596,669,-594,667,-593,666,-592,666,-592,664,-591,662,-590,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,616,-631,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695,632,-698,635,-706,635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,613,-730,613,-734,616,-737,622,-745,624,-745,626,-746,628,-756,635,-775,638,-779,641,-783,644,-786,647,-795,649,-800,651,-806,652,-813,653,-815,653,-825,655,-828,655,-830,657,-830,658,-829,660,-827,661,-826,663,-826,664,-824,667,-822,667,-820,669,-819,671,-817,673,-814,676,-813,677,-811,679,-810,680,-809z"
                },
                {
                    "name": "Klungkung",
                    "value": "<?php echo $kab_klungkung->jumlah_pengunjung ?>",
                    "path": "M695,-711L707,-711L711,-712L721,-712L722,-713,728,-713,730,-715,734,-714,737,-717,737,-719,739,-720,740,-722,748,-722,750,-723,758,-723,759,-721,761,-718L761,-715L762,-712L762,-705L762,-700,762,-699,764,-697,766,-694,767,-694,768,-691,768,-683L769,-683L770,-679L773,-679L776,-677,778,-676,781,-673,783,-671C783,-671,785,-670,786,-670,786,-670,806,-670,806,-670L808,-669,810,-667,813,-665,815,-662,815,-659,816,-657,817,-654,817,-651,810,-650,808,-649,805,-649,803,-647,800,-646,799,-644,796,-643,790,-642,787,-639,785,-637,781,-636,778,-635,775,-634,772,-633,767,-631,733,-632,731,-633,727,-633,726,-634,722,-634,721,-636,720,-636,719,-637,718,-637,717,-636,718,-642,717,-645,716,-647,714,-648,713,-649,710,-650,706,-654,705,-657,699,-662,698,-664,696,-666,695,-666,694,-667,693,-669,692,-670,692,-706,691,-707,691,-710L691,-710z,M838,-560L845,-560L847,-562,862,-561,864,-563,866,-563,868,-565,872,-566,876,-566,877,-564,878,-563,880,-560,880,-559,881,-559,882,-557,882,-555C882,-555,883,-554,883,-554,883,-554,885,-553,885,-553L887,-553,889,-552,890,-551,892,-549,894,-546,895,-544,896,-543,897,-541,897,-539,898,-538,899,-536,900,-535,902,-534,903,-533,905,-531,909,-529,912,-528,914,-528,915,-526,918,-526,919,-525,921,-523,923,-521,923,-519,924,-517,925,-516,925,-513,926,-512,926,-510,927,-509,927,-506,928,-505,929,-503,930,-501,930,-496,929,-494,928,-492,927,-491,927,-489C927,-489,926,-489,926,-488,926,-488,926,-487,926,-487L922,-485,921,-483,919,-480,917,-478,915,-474,914,-472,912,-468,909,-466,907,-463,905,-458,903,-455C903,-455,899,-452,899,-452,899,-452,896,-449,896,-449L894,-449,893,-448,890,-449,889,-447,886,-446,876,-446,875,-447,873,-448,872,-449,871,-450,870,-450,869,-451,866,-451,865,-452,863,-453L859,-453L858,-455,857,-455,854,-455,853,-455,851,-457L850,-457L849,-458,848,-460,847,-463L847,-467L847,-474,846,-475,845,-478,844,-479,841,-482,839,-485,835,-488,833,-489,830,-489,828,-490,827,-490,824,-493,822,-494,818,-495,817,-497,816,-498,813,-500,810,-502,807,-504,805,-506,805,-507,803,-508,802,-510,801,-512,800,-514,800,-517,798,-519,797,-520,797,-532,799,-533,801,-535,803,-537,804,-538,806,-539,807,-540,808,-541,812,-544,814,-546,817,-550,821,-553,823,-554,824,-555,825,-556,828,-558C828,-558,832,-558,832,-558,832,-558,832,-559,833,-559,833,-559,836,-559,836,-559L836,-560z"
                },
                {
                    "name": "Bangli",
                    "value": "<?php echo $kab_bangli->jumlah_pengunjung ?>",
                    "path": "M637,-908,637,-923,639,-924,642,-926,644,-927,645,-932,646,-938,649,-940,653,-941,658,-942,660,-944,664,-948,665,-951,670,-952,672,-953,681,-953,682,-952,692,-952,694,-950,697,-951,698,-952,705,-952,706,-953L716,-953L720,-951,723,-948,725,-945,727,-943,742,-943,744,-944,751,-944,752,-942,756,-940,757,-938,764,-940,765,-938,767,-937,771,-936,774,-936,774,-934L778,-934L780,-933,782,-932,783,-931,787,-931,790,-928,792,-925,795,-923,797,-922,798,-920,800,-918,801,-916,802,-914,802,-907,803,-892,804,-889,804,-882,804,-875,802,-874,801,-872,799,-872,799,-870,798,-869,797,-868,795,-866,795,-863,795,-858,793,-858,793,-857,792,-855,790,-853,785,-848,781,-845,778,-842,775,-840,771,-837,768,-834,762,-827,759,-826,757,-825,758,-823,757,-822,757,-816,756,-815,756,-797,756,-794,754,-793,756,-791,755,-785,757,-782,759,-780,761,-779C761,-779,762,-776,762,-776,762,-776,764,-773,764,-773L763,-771,765,-770,766,-769,766,-767,767,-765,766,-762,768,-762,769,-760C769,-760,770,-758,770,-757,770,-757,770,-752,770,-752L771,-750,772,-747,773,-745,773,-741,772,-739,771,-737,770,-734,768,-731,769,-729,767,-727,766,-725,762,-723,759,-721,758,-723,750,-723,748,-722,740,-722,739,-720,737,-719,737,-717,734,-714,730,-715,728,-713,722,-713,721,-712L711,-712L707,-711L695,-711L691,-710,689,-712,689,-719,691,-723,692,-723,692,-727,695,-730,695,-732,695,-733,697,-734,698,-736,698,-738,701,-743,703,-744,704,-747,706,-748L706,-752L707,-753,707,-761,704,-763,701,-764,698,-766,698,-776,697,-778,696,-780,695,-783,693,-783,692,-785,691,-786,690,-791,690,-794,691,-797,691,-798,691,-800,693,-802,693,-804,692,-809,682,-808,680,-809,679,-810,677,-811,676,-813,673,-814,670,-818,667,-820,667,-822,663,-826,661,-826,658,-829,657,-830,655,-830,654,-839,653,-841,653,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,628,-892,629,-893,630,-895,630,-897,631,-897,633,-899,633,-901,635,-901,635,-903,636,-906,636,-907z"
                },
                {
                    "name": "Karangasem",
                    "value": "<?php echo $kab_karangasem->jumlah_pengunjung ?>",
                    "path": "M792,-952,808,-952,810,-951,812,-951,813,-949,816,-949,818,-948,819,-947,820,-947,822,-945,825,-944,828,-940,831,-938,832,-936,836,-936,838,-934,841,-934,844,-932,847,-930,850,-928,850,-927,853,-923,855,-921,857,-918,860,-915C860,-915,863,-912,864,-911,864,-911,866,-909,866,-909,867,-909,869,-907,869,-907L877,-908,879,-906,881,-906,883,-905,886,-905,887,-904,889,-902,891,-902,893,-900,898,-900,900,-899,901,-898,902,-897,902,-895,903,-894,904,-892,904,-891,906,-888C906,-888,907,-887,907,-886,907,-886,910,-882,910,-882L910,-879,911,-878,912,-875,913,-873,914,-871,916,-869,916,-866C916,-866,917,-864,917,-863,917,-863,918,-858,918,-858L918,-856,918,-854,919,-851,919,-849,920,-848,920,-846,921,-845,922,-843,923,-841,924,-841,926,-839,927,-838,928,-837,929,-836,931,-835,933,-834L934,-834L935,-833,937,-831,938,-830,941,-828,943,-827,946,-825,947,-824,949,-824,950,-822,953,-822,954,-821,955,-821,956,-820,957,-819,959,-818,961,-818,962,-817,963,-816C963,-816,964,-815,964,-815,965,-815,967,-814,967,-814L968,-813L969,-813L971,-812,975,-812,976,-811L977,-811L980,-809,983,-808,984,-808,987,-807C987,-807,989,-806,989,-805,990,-805,992,-802,992,-802L994,-800,996,-797,996,-796,998,-795,998,-792,999,-789,1000,-787,1000,-782,1000,-778,999,-776,999,-774,999,-773,996,-771,994,-769,991,-768,989,-767,988,-766,986,-765,983,-764,983,-763,980,-763,979,-762,976,-760,974,-757,971,-755,969,-754,967,-752,966,-751,964,-750,961,-748,960,-747,958,-746,956,-745,955,-743,953,-741,951,-740,949,-737,947,-736,945,-733,943,-732,942,-729,941,-728,940,-725,938,-723,937,-721,937,-720,936,-718,934,-717,932,-716,930,-713,929,-711,929,-710,927,-708,926,-707,926,-705,924,-703,922,-701,922,-699,918,-697,915,-694,915,-692,912,-692,910,-690,907,-689,905,-688,904,-687,901,-687,894,-687,888,-687,886,-686,881,-686,881,-686,878,-687,876,-688L873,-688L871,-689,869,-690,867,-691,866,-692,865,-692,862,-693,858,-693,855,-693,854,-692,853,-691,851,-690,851,-688,850,-688,849,-686,848,-685,847,-683,848,-675,846,-675,845,-673,844,-673,843,-671,841,-671,841,-670,841,-665,840,-665,839,-664,838,-664,837,-661,835,-661C835,-661,835,-659,834,-659,834,-659,834,-657,834,-657L832,-657,830,-656,829,-656,827,-655,827,-654,826,-654,825,-653,823,-653,822,-652,821,-652,820,-651,819,-651,818,-651,817,-651,817,-654,816,-657,815,-660,813,-665,809,-668,808,-669,806,-670,786,-670,783,-671,780,-674,778,-676,776,-677,773,-679L770,-679L769,-683L768,-683L768,-691,767,-694,766,-694,764,-697,762,-699,762,-700,762,-712,761,-715L761,-718L759,-721,762,-723,766,-725,767,-727,769,-729,768,-731,770,-734,771,-737,772,-739,773,-741,773,-745,771,-750,770,-752,770,-758,769,-760,768,-762,766,-762,767,-765,766,-767,766,-769,763,-771,764,-773,762,-776,761,-779,759,-780,757,-782,755,-785,756,-791,754,-793,756,-794,756,-815,757,-816,757,-822,758,-823,757,-825,759,-826,762,-827,768,-834,771,-837,775,-840,778,-842,781,-845,785,-848,789,-852,792,-855,793,-857,793,-858,795,-858,795,-863,795,-866,797,-868,798,-869,799,-870,799,-872,801,-872,804,-875,804,-879,804,-882,804,-887,804,-889,803,-892,802,-914,800,-918,798,-920,797,-922,794,-924,787,-931,782,-932,780,-933,778,-934L774,-934L774,-936,771,-936,767,-937,765,-938,764,-940,765,-942,766,-943,766,-945,768,-946,769,-948,769,-953,769,-954,770,-955,770,-966,770,-967L771,-967L771,-966,773,-966,774,-964,775,-965,776,-964,777,-963,778,-963,778,-963,779,-962,779,-962,780,-961,780,-960,781,-960,781,-959,782,-959,783,-957,784,-957,784,-956,785,-956,786,-955,787,-954,787,-953,789,-953,789,-952z"
                },
                {
                    "name": "Buleleng",
                    "value": "<?php echo $kab_buleleng->jumlah_pengunjung ?>",
                    "path": "M16,-916,14,-917,13,-918,12,-919,11,-921,10,-921,10,-924,9,-924,9,-930,10,-930L10,-933L11,-934,11,-936,13,-937,14,-939,15,-940,15,-941,15,-943,16,-943,16,-949,15,-949,15,-951,14,-952,12,-953,11,-953,10,-954,9,-954,7,-955,6,-955,5,-956,4,-956,3,-958,3,-957,1,-959,1,-961,0,-962,0,-990,1,-991L1,-992L3,-993,3,-994,4,-995,6,-996,6,-998,9,-1000,12,-1003,12,-1004,15,-1005,18,-1005,21,-1006,31,-1006,33,-1005,37,-1004,38,-1003C38,-1003,40,-1004,41,-1003,41,-1003,42,-1002,42,-1002L44,-1002,45,-1001,48,-1001,48,-1000,50,-999,52,-998,53,-997,54,-997,55,-996,57,-996,58,-994C58,-994,59,-994,59,-994,60,-993,61,-992,61,-992L62,-991,63,-990,64,-989,64,-988,65,-987,66,-987,66,-986,67,-986,67,-979,67,-975,66,-974,65,-974,65,-973,64,-972,64,-971,63,-970,63,-968,63,-966,63,-965,64,-965,64,-964,65,-963,65,-962,67,-962,67,-961,70,-961,71,-960,72,-959,73,-959,74,-959,79,-959,81,-959,82,-960,84,-960,84,-962,86,-963,89,-963,90,-965,93,-966,94,-967,97,-969,99,-972C99,-972,99,-973,99,-973,99,-973,100,-974,100,-974L102,-975,103,-976,105,-977,107,-979,109,-979,110,-981,112,-982,113,-983,116,-986,122,-986,126,-984,129,-982,131,-980,133,-978,150,-978,154,-978C154,-978,155,-977,155,-977,156,-977,158,-977,158,-977L159,-975L164,-975L165,-974L168,-974L170,-973,172,-973,173,-972,179,-972,178,-971C178,-971,181,-971,181,-971,182,-971,182,-969,182,-969L184,-969,187,-966,190,-964,192,-963,195,-961,197,-959,200,-959,202,-957,206,-956,222,-957,226,-955,231,-955,237,-953,242,-951,245,-951,251,-950,262,-949,265,-948,271,-947,272,-946,276,-943,277,-941,279,-941,282,-940,285,-938,288,-938,291,-937,292,-935,297,-935,303,-934,305,-933L333,-933L337,-931L359,-931L365,-934,371,-936,373,-938,386,-937,388,-939,397,-938,398,-941,406,-941,410,-941,416,-942,421,-943,423,-945,429,-946,432,-948,437,-948,440,-950L444,-950L448,-953,453,-955C453,-955,458,-957,459,-958,460,-958,463,-962,463,-962L463,-964,469,-965,471,-966,472,-969,473,-973,476,-977,481,-980,487,-982,494,-982,499,-985,503,-991,507,-995,511,-998,518,-1002,521,-1005,527,-1010,534,-1014,540,-1017,548,-1017,549,-1018,554,-1019,557,-1021,561,-1022,564,-1024,569,-1024,570,-1025,593,-1024,595,-1027,599,-1027,602,-1024,603,-1024,607,-1022,612,-1021,615,-1019,618,-1019,623,-1018,626,-1017,631,-1015,634,-1013,637,-1011,642,-1010,646,-1008,649,-1009,653,-1007,656,-1006,659,-1002,665,-999,668,-996,673,-994,693,-994,699,-993,702,-991,706,-989,708,-987,713,-986,718,-984,722,-983,725,-980,730,-979,734,-976,737,-975,741,-974,748,-975,750,-973,754,-973,756,-973,758,-971,762,-970,765,-968,770,-967,770,-955,769,-954,769,-948,768,-946,766,-945,766,-943,765,-942,764,-940,757,-938,756,-940,752,-942,751,-944,744,-944,742,-943,727,-943,725,-945,723,-948,720,-951,716,-953L706,-953L705,-952,698,-952,697,-951,694,-950,692,-952,682,-952,681,-953,672,-953,670,-952,665,-951,664,-948,658,-942,653,-941,649,-940,646,-938,645,-932,644,-927,642,-926,639,-924,637,-923,637,-908,636,-907,636,-906,635,-903,635,-901,633,-901,633,-899,631,-897,630,-897,630,-895,629,-893,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860,550,-860,543,-855,540,-853,537,-853,535,-850,532,-851,528,-848,525,-849,522,-847,516,-846,513,-843,506,-843,506,-840,498,-841,493,-843,482,-842,474,-838,449,-829,434,-821,423,-820C423,-820,407,-806,407,-806L406,-801,394,-782,378,-782,376,-783,374,-783,373,-784,371,-784,370,-785,367,-786,366,-787,364,-788,363,-789,361,-790,359,-794,357,-795,356,-798,354,-798,351,-800,346,-805,342,-808,336,-809,334,-810,331,-809,328,-811,324,-811,321,-812,319,-813,317,-815,314,-817,312,-819,310,-821,309,-823,307,-823,306,-826,305,-827,305,-829,304,-831,304,-835,303,-836L303,-840L301,-842,301,-846,300,-848,299,-849L299,-850L298,-853,296,-854,294,-856,291,-859,290,-860,289,-861,284,-861,283,-863,275,-863,274,-864,271,-864,270,-865,268,-866,267,-867,265,-868,265,-874,265,-876,263,-877,259,-881,254,-883,250,-884,249,-886,245,-887,242,-889,238,-891,233,-895,230,-897,228,-898,228,-899,226,-899,226,-901,220,-902,217,-903,212,-908L210,-908L208,-907,206,-906,204,-903,198,-898,196,-897,181,-897,180,-892,179,-889,172,-889,165,-889,159,-891,142,-899,139,-904,137,-908,135,-914,132,-918,127,-922,115,-921,115,-923,105,-923,105,-922,100,-922,99,-921,95,-921,95,-919,90,-919,90,-918L85,-918L85,-917,75,-917,74,-916,55,-916,55,-915,48,-915,49,-914,41,-914,41,-912,33,-912,34,-911,18,-911,18,-912,17,-913,16,-913,16,-914z"
                }
            ]
        }]
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok2").slideDown();
    });


    function tabel_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#grafik-1A_blok2").slideUp();
        $("#tabel_blok2").slideDown();
    }

    function grafik_1A_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-1A_blok2").slideDown();
    }

    function grafik_2A_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-2A_blok2").slideDown();
    }

    function grafik_2B_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-2B_blok2").slideDown();
    }

    function grafik_3A_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-3A_blok2").slideDown();
    }

    function grafik_4A_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-4B_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-4A_blok2").slideDown();
    }

    function grafik_4B_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-2B_blok2").slideUp();
        $("#grafik-3A_blok2").slideUp();
        $("#grafik-4A_blok2").slideUp();
        $("#grafik-1A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-4B_blok2").slideDown();
    }
</script>