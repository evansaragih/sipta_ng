<?php function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', ',');
} ?>
<!-- Default box -->
<div class="kotak-sp_jlh_wisman box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Growth</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Kebangsaan</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok4()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok5()">Menurut Rank</button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_JumlahWisman') ?>">Tahunan</a>
                    </div>
                </div>
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahWisman/cari_blok4") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_nationality" name="id_nationality" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($data_kebangsaan as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_nationality == $a['id'] ? "selected" : null  ?>><?php echo $a['kebangsaan']; ?></option>
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

<div class="box box-solid" id="tabel_blok4">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel_blok4()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok4()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_2A_blok4()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body blok4">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?></p>
        <table id="blok4" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 600px;">Tahun</th>
                    <th colspan="1" style="text-align: center; vertical-align: middle; ">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                $total = 0 ?>
                <?php foreach ($data_jwisman as $dp) { ?>
                    <tr><?php $no++;
                        $jumlah = 0 ?>
                        <td style="text-align: center"><?php echo $no; ?></td>
                        <td style="text-align: center"><?php echo $dp['tahun']; ?></td>
                        <td><?php echo format_ribuan($dp['jumlah']); ?></td>
                        <?php $jumlah += $dp['jumlah']; ?>
                        <?php $total += $jumlah; ?>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo format_ribuan($total); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik-1A_blok4">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok4()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok4()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_2A_blok4()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok4-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok4">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok4()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok4()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Area" onclick="grafik_2A_blok4()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok4-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_jpenumpang-int_blok4" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <?php foreach ($data_jwisman as $dp) { ?>
                <th><?php echo $dp['tahun']; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;"><?php echo $data_id_kebangsaan->kebangsaan ?></td>
            <?php foreach ($data_jwisman as $dp) { ?>
                <td><?php echo $dp['jumlah']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<table id="data_jpenumpang-dom_blok4" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th><?php echo $data_id_kebangsaan->kebangsaan ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_jwisman as $dp) { ?>
            <tr>
                <td><?php echo $dp['tahun']; ?></td>
                <td><?php echo $dp['jumlah']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#blok4').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Data Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?>  - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Data Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });

        table.buttons().container()
            .appendTo('.blok4 .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-1A_blok4-jpenumpang', {
        data: {
            table: 'data_jpenumpang-int_blok4'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?></center></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok4-jpenumpang', {
        data: {
            table: 'data_jpenumpang-dom_blok4'
        },
        chart: {
            type: 'area'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Kedatangan Wisatawan <?php echo $data_id_kebangsaan->kebangsaan ?></center></h4>'
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
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok4").slideDown();
        document.getElementById("grafik-2A_blok4").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok4").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_2A_blok4() {
        $("#grafik-1A_blok4").slideUp();
        $("#tabel_blok4").slideUp();
        $("#grafik-2A_blok4").slideDown();
    }

    function tabel_blok4() {
        $("#grafik-1A_blok4").slideUp();
        $("#grafik-2A_blok4").slideUp();
        $("#tabel_blok4").slideDown();
    }

    function grafik_1A_blok4() {
        $("#grafik-2A_blok4").slideUp();
        $("#tabel_blok4").slideUp();
        $("#grafik-1A_blok4").slideDown();
    }
</script>