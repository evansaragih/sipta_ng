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
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok3()">Menurut Kebangsaan</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok4()">Menurut Waktu</button>
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
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPB_JumlahWisman/cari_blok3") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_grup" name="id_grup" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($grup_kebangsaan as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_grup == $a['id'] ? "selected" : null  ?>><?php echo $a['grup']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="id_bulan" name="id_bulan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($data_bulan_blok3 as $b) { ?>
                                <option value="<?php echo $b['bulan'] ?>" <?= $bulan == $b['bulan'] ? "selected" : null  ?>><?php echo $b['bulan'] ?></option>
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
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body blok3">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $data_id_group->grup . ' ' . $bulan . ' ' . $tahun ?></p>
        <table id="blok3" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 600px;">Kebangsaan</th>
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
                        <td style="text-align: center"><?php echo $dp['kebangsaan']; ?></td>
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

<div class="box box-solid" id="grafik-1A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok3-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok3()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_2A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok3-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_jpenumpang-int_blok3" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <?php foreach ($data_jwisman as $dp) { ?>
                <th><?php echo $dp['kebangsaan']; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;"><?php echo $data_id_bulan->bulan ?></td>
            <?php foreach ($data_jwisman as $dp) { ?>
                <td><?php echo $dp['jumlah']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<table id="data_jpenumpang-dom_blok3" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th><?php echo $data_id_bulan->bulan ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_jwisman as $dp) { ?>
            <tr>
                <td><?php echo $dp['kebangsaan']; ?></td>
                <td><?php echo $dp['jumlah']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#blok3').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?> - SIPTA'
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
            .appendTo('.blok3 .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-1A_blok3-jpenumpang', {
        data: {
            table: 'data_jpenumpang-int_blok3'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Wisatawan Mancanegara Kategori<br/> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?></center></h4>'
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
    Highcharts.chart('grafik-2A_blok3-jpenumpang', {
        data: {
            table: 'data_jpenumpang-dom_blok3'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Wisatawan Mancanegara Kategori<br/> <?php echo $data_id_group->grup . ' Tahun ' . $tahun ?></center></h4>'
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
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok3").slideDown();
        document.getElementById("grafik-2A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok3").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_2A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-2A_blok3").slideDown();
    }

    function tabel_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-2A_blok3").slideUp();
        $("#tabel_blok3").slideDown();
    }

    function grafik_1A_blok3() {
        $("#grafik-2A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-1A_blok3").slideDown();
    }
</script>