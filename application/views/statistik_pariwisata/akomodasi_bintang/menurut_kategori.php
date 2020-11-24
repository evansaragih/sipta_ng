<!-- Default box -->
<div class="kotak-sp_akomodasi box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" onclick="menurut_kategori()">Menurut Kategori Kelas Bintang</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_wilayah()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_waktu()">Menurut Waktu</button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SP_Akomodasi') ?>">Akomodasi</a>
                        <a type="button" class="btn btn-success active" href="#">Hotel Bintang</a>
                    </div>
                </div>
                <form method="post" id="akomodasi_kategori" action="<?php echo base_url("SP_AkomodasiBintang/cari_kategori") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <option value="all">Semua Kota/Kabupaten</option>
                            <?php foreach ($kabupaten as $a) { ?>
                                <option value="<?php echo $a['id_kabupaten']; ?>" <?= $kab == $a['id_kabupaten'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            $year_now = date('Y');
                            $year_search = $year_now - 1;
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

<div class="box box-solid" id="tabel_akomodasi">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_batang_vertikal()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_lingkaran()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body kategori">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></p>
        <table id="kategori" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Kategori</th>
                    <th colspan="2" style="text-align: center;">Akomodasi</th>
                </tr>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center;">Unit</th>
                    <th style="text-align: center;">Room</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                $jlh_ako = 0;
                $jlh_kamar = 0; ?>
                <?php foreach ($data_akomodasi as $dp) {
                ?>
                    <tr><?php $no++ ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo 'Bintang ' . $dp['akomodasi']; ?></td>
                        <td><?php echo $dp['jlh_akomodasi'];
                            $jlh_ako += $dp['jlh_akomodasi']; ?></td>
                        <td><?php echo $dp['jlh_kamar'];
                            $jlh_kamar += $dp['jlh_kamar']; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td colspan="1" style="text-align: center;">Jumlah</td>
                    <td><?php echo $jlh_ako ?></td>
                    <td><?php echo $jlh_kamar ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik_batang-vertikal">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_batang_vertikal()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_lingkaran()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-kategori_akomodasi_1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik_lingkaran_a">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_batang_vertikal()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_lingkaran()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_lingkaran()">Unit</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_lingkaran2()">Room</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-kategori_akomodasi_2a" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>

    <table id="data_akomodasi_kategori_pie_1" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_akomodasi as $dp) { ?>
                <tr>
                    <th><?php echo '⭐' . $dp['akomodasi']; ?></th>
                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="box box-solid" id="grafik_lingkaran_b">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_batang_vertikal()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_lingkaran()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_lingkaran()">Unit</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_lingkaran2()">Room</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-kategori_akomodasi_2b" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <table id="data_akomodasi_kategori_pie_2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Kamar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_akomodasi as $dp) { ?>
                <tr>
                    <th><?php echo '⭐' . $dp['akomodasi']; ?></th>
                    <td><?php echo $dp['jlh_kamar']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="box box-solid" id="grafik_batang-horizontal">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_batang_vertikal()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_lingkaran()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-kategori_akomodasi_3" style="min-width: 310px; height: 700px; margin: 0 auto"></div>
    </div>
    <table id="data_akomodasi_kategori" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Unit</th>
                <th>Kamar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_akomodasi as $dp) { ?>
                <tr>
                    <th><?php echo '⭐' . $dp['akomodasi']; ?></th>
                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                    <td><?php echo $dp['jlh_kamar']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var table = $('#kategori').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false
        });

        table.buttons().container()
            .appendTo('.kategori .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-kategori_akomodasi_1', {
        data: {
            table: 'data_akomodasi_kategori'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></center></h4>'
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
                return '<b> Bintang ' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-kategori_akomodasi_2a', {
        data: {
            table: 'data_akomodasi_kategori_pie_1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Unit Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></center></h4>'
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
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-kategori_akomodasi_2b', {
        data: {
            table: 'data_akomodasi_kategori_pie_2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Kamar Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></center></h4>'
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
    Highcharts.chart('grafik-kategori_akomodasi_3', {
        data: {
            table: 'data_akomodasi_kategori'
        },
        chart: {
            type: 'bar'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></center></h4>'
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
                return '<b>Hotel ' + this.point.name + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_akomodasi").slideDown();
        document.getElementById("grafik_batang-horizontal").setAttribute("hidden", "hidden");
        document.getElementById("grafik_lingkaran_a").setAttribute("hidden", "hidden");
        document.getElementById("grafik_lingkaran_b").setAttribute("hidden", "hidden");
        document.getElementById("grafik_batang-vertikal").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_lingkaran() {
        $("#grafik_batang-vertikal").slideUp();
        $("#grafik_batang-horizontal").slideUp();
        $("#tabel_akomodasi").slideUp();
        $("#grafik_lingkaran_b").slideUp();
        $("#grafik_lingkaran_a").slideDown();
    }

    function grafik_lingkaran2() {
        $("#grafik_batang-vertikal").slideUp();
        $("#grafik_batang-horizontal").slideUp();
        $("#tabel_akomodasi").slideUp();
        $("#grafik_lingkaran_a").slideUp();
        $("#grafik_lingkaran_b").slideDown();
    }

    function tabel() {
        $("#grafik_batang-vertikal").slideUp();
        $("#grafik_batang-horizontal").slideUp();
        $("#grafik_lingkaran_a").slideUp();
        $("#grafik_lingkaran_b").slideUp();
        $("#tabel_akomodasi").slideDown();
    }

    function grafik_batang_horizontal() {
        $("#grafik_batang-vertikal").slideUp();
        $("#grafik_lingkaran_a").slideUp();
        $("#grafik_lingkaran_b").slideUp();
        $("#tabel_akomodasi").slideUp();
        $("#grafik_batang-horizontal").slideDown();
    }

    function grafik_batang_vertikal() {
        $("#grafik_batang-horizontal").slideUp();
        $("#grafik_lingkaran_a").slideUp();
        $("#grafik_lingkaran_b").slideUp();
        $("#tabel_akomodasi").slideUp();
        $("#grafik_batang-vertikal").slideDown();
    }
</script>