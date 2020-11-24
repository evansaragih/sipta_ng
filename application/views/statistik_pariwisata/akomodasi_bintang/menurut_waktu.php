<!-- Default box -->
<div class="kotak-sp_akomodasi box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_kategori()">Menurut Kategori Kelas Bintang</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_wilayah()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_waktu()">Menurut Waktu</button>
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
                <form method="post" id="akomodasi_kategori" action="<?php echo base_url("SP_AkomodasiBintang/cari_waktu") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_kategori" name="id_kategori" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <option value="1" <?= $kat == 1 ? "selected" : null  ?>>Hotel Bintang 1</option>
                            <option value="2" <?= $kat == 2 ? "selected" : null  ?>>Hotel Bintang 2</option>
                            <option value="3" <?= $kat == 3 ? "selected" : null  ?>>Hotel Bintang 3</option>
                            <option value="4" <?= $kat == 4 ? "selected" : null  ?>>Hotel Bintang 4</option>
                            <option value="5" <?= $kat == 5 ? "selected" : null  ?>>Hotel Bintang 5</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">

                            <?php foreach ($kabupaten as $a) { ?>
                                <option value="<?php echo $a['id_kabupaten']; ?>" <?= $kab == $a['id_kabupaten'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box box-solid" id="tabel_akomodasi2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_batang_vertikal()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_lingkaran()"><i class="fa fa-bar-chart"></i></button>
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body waktu">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></p>
        <table id="waktu" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Tahun</th>
                    <th colspan="2" style="text-align: center;">Akomodasi</th>
                </tr>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center;">Unit</th>
                    <th style="text-align: center;">Room</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($data_akomodasi as $dp) {
                ?>
                    <tr><?php $no++ ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dp['tahun']; ?></td>
                        <td><?php echo $dp['jlh_akomodasi']; ?></td>
                        <td><?php echo $dp['jlh_kamar']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik_batang-vertikal2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_batang_vertikal()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_lingkaran()"><i class="fa fa-bar-chart"></i></button>
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-waktu_akomodasi_1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik_lingkaran2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis active" onclick="grafik_batang_vertikal()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang" onclick="grafik_lingkaran()"><i class="fa fa-bar-chart"></i></button>
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-waktu_akomodasi_2" style="min-width: 310px; height: 1000px; margin: 0 auto"></div>
    </div>
    <table id="data_akomodasi_wilayah_pie" hidden>
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
                    <th><?php echo '' . $dp['tahun']; ?></th>
                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                    <td><?php echo $dp['jlh_kamar']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="box box-solid" id="grafik_batang-horizontal2">
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
        <div id="grafik-waktu_akomodasi_3" style="min-width: 310px; height: 700px; margin: 0 auto"></div>
    </div>
    <table id="data_akomodasi_waktu" hidden>
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
                    <th><?php echo '' . $dp['tahun']; ?></th>
                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                    <td><?php echo $dp['jlh_kamar']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
        var table = $('#waktu').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'lengthChange': true
        });

        table.buttons().container()
            .appendTo('.waktu .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-waktu_akomodasi_1', {
        data: {
            table: 'data_akomodasi_waktu'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></center></h4>'
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
                return '<b>' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-waktu_akomodasi_2', {
        data: {
            table: 'data_akomodasi_wilayah_pie'
        },
        chart: {
            type: 'bar',
            options3d: {
                enabled: false,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            }
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        xAxis: {
            title: {
                text: 'Tahun'
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
                return '<b>' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-waktu_akomodasi_3', {
        data: {
            table: 'data_akomodasi_waktu'
        },
        chart: {
            type: 'line',
            inverted: true
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo 'Hotel Bintang ' . $kat ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>Tahun ' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_akomodasi2").slideDown();
        document.getElementById("grafik_batang-horizontal2").setAttribute("hidden", "hidden");
        document.getElementById("grafik_lingkaran2").setAttribute("hidden", "hidden");
        document.getElementById("grafik_batang-vertikal2").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_lingkaran() {
        $("#grafik_batang-vertikal2").slideUp();
        $("#grafik_batang-horizontal2").slideUp();
        $("#tabel_akomodasi2").slideUp();
        $("#grafik_lingkaran2").slideDown();
    }

    function tabel() {
        $("#grafik_batang-vertikal2").slideUp();
        $("#grafik_batang-horizontal2").slideUp();
        $("#grafik_lingkaran2").slideUp();
        $("#tabel_akomodasi2").slideDown();
    }

    function grafik_batang_horizontal() {
        $("#grafik_batang-vertikal2").slideUp();
        $("#grafik_lingkaran2").slideUp();
        $("#tabel_akomodasi2").slideUp();
        $("#grafik_batang-horizontal2").slideDown();
    }

    function grafik_batang_vertikal() {
        $("#grafik_batang-horizontal2").slideUp();
        $("#grafik_lingkaran2").slideUp();
        $("#tabel_akomodasi2").slideUp();
        $("#grafik_batang-vertikal2").slideDown();
    }
</script>