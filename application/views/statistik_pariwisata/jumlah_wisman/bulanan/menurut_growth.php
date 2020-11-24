<!-- Default box -->
<?php function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
} ?>
<?php
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Pragma: private");
header("Expires: " . date(DATE_RFC822, strtotime("+1 day")));
?>
<!-- Default box -->
<div class="kotak-sp_jlh_wisman box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Growth</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Kebangsaan</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok4()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok5()">Menurut Rank</button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SPB_JumlahWisman') ?>">Tahunan</a>
                    </div>
                </div>
                <form method="post" id="jpenumpang-waktu" action="<?php echo base_url("SPB_JumlahWisman/cari_blok2") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_grup_kebangsaan" name="id_grup_kebangsaan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">

                            <?php foreach ($grup_kebangsaan as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_grup == $a['id'] ? "selected" : null  ?>><?php echo $a['grup']; ?></option>
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
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun_vs" name="tahun_vs" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            // $year_now = date('Y');
                            // $year_search = $year_now - 1;
                            for ($x = $tahun + 1; $x > $tahun; $x--) {
                            ?>
                                <option value="<?php echo $x ?>" <?= $tahun_vs == $x ? "selected" : null  ?>><?php echo $x ?></option>
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
                        <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_2A_blok2()"><i class="fa fa-line-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body waktu">
        <!-- nama waktu kalo bisa di seragamin itu untuk buat print !!!! -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Perbandingan Wisatawan Mancanegara Kategori<br /> <?php echo $jenis_kebangsaan->grup . ' Tahun ' . $tahun . ' VS ' . $tahun_vs ?></p>
        <table id="waktu" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th style="text-align: center; vertical-align: middle;">Bulan</th>
                    <th style="text-align: center;"><?php echo $tahun ?></th>
                    <th style="text-align: center;"><?php echo $tahun_vs ?></th>
                    <th style="text-align: center;">Growth (%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: left;">Januari</td>
                    <?php $total1 = 0; ?>
                    <td><?php echo format_ribuan($bulan_1->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_1_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_1->jumlah != 0) {
                        $total1 = ($bulan_1_tahunvs->jumlah - $bulan_1->jumlah) / $bulan_1->jumlah * 100;
                    } else {
                        $total1 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total1, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">Februari</td>
                    <?php $total2 = 0; ?>
                    <td><?php echo format_ribuan($bulan_2->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_2_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_2->jumlah != 0) {
                        $total2 = ($bulan_2_tahunvs->jumlah - $bulan_2->jumlah) / $bulan_2->jumlah * 100;
                    } else {
                        $total2 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total2, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td style="text-align: left;">Maret</td>
                    <?php $total3 = 0; ?>
                    <td><?php echo format_ribuan($bulan_3->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_3_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_3->jumlah != 0) {
                        $total3 = ($bulan_3_tahunvs->jumlah - $bulan_3->jumlah) / $bulan_3->jumlah * 100;
                    } else {
                        $total3 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total3, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">4</td>
                    <td style="text-align: left;">April</td>
                    <?php $total4 = 0; ?>
                    <td><?php echo format_ribuan($bulan_4->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_4_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_4->jumlah != 0) {
                        $total4 = ($bulan_4_tahunvs->jumlah - $bulan_4->jumlah) / $bulan_4->jumlah * 100;
                    } else {
                        $total4 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total4, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: left;">Mei</td>
                    <?php $total5 = 0; ?>
                    <td><?php echo format_ribuan($bulan_5->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_5_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_5->jumlah != 0) {
                        $total5 = ($bulan_5_tahunvs->jumlah - $bulan_5->jumlah) / $bulan_5->jumlah * 100;
                    } else {
                        $total5 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total5, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">6</td>
                    <td style="text-align: left;">Juni</td>
                    <?php $total6 = 0; ?>
                    <td><?php echo format_ribuan($bulan_6->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_6_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_6->jumlah != 0) {
                        $total6 = ($bulan_6_tahunvs->jumlah - $bulan_6->jumlah) / $bulan_6->jumlah * 100;
                    } else {
                        $total6 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total6, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">7</td>
                    <td style="text-align: left;">Juli</td>
                    <?php $total7 = 0; ?>
                    <td><?php echo format_ribuan($bulan_7->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_7_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_7->jumlah != 0) {
                        $total7 = ($bulan_7_tahunvs->jumlah - $bulan_7->jumlah) / $bulan_7->jumlah * 100;
                    } else {
                        $total7 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total7, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">8</td>
                    <td style="text-align: left;">Agustus</td>
                    <?php $total8 = 0; ?>
                    <td><?php echo format_ribuan($bulan_8->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_8_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_8->jumlah != 0) {
                        $total8 = ($bulan_8_tahunvs->jumlah - $bulan_8->jumlah) / $bulan_8->jumlah * 100;
                    } else {
                        $total8 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total8, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">9</td>
                    <td style="text-align: left;">September</td>
                    <?php $total9 = 0; ?>
                    <td><?php echo format_ribuan($bulan_9->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_9_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_9->jumlah != 0) {
                        $total9 = ($bulan_9_tahunvs->jumlah - $bulan_9->jumlah) / $bulan_9->jumlah * 100;
                    } else {
                        $total9 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total9, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">10</td>
                    <td style="text-align: left;">Oktober</td>
                    <?php $total10 = 0; ?>
                    <td><?php echo format_ribuan($bulan_10->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_10_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_10->jumlah != 0) {
                        $total10 = ($bulan_10_tahunvs->jumlah - $bulan_10->jumlah) / $bulan_10->jumlah * 100;
                    } else {
                        $total10 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total10, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">11</td>
                    <td style="text-align: left;">November</td>
                    <?php $total11 = 0; ?>
                    <td><?php echo format_ribuan($bulan_11->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_11_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_11->jumlah != 0) {
                        $total11 = ($bulan_11_tahunvs->jumlah - $bulan_11->jumlah) / $bulan_11->jumlah * 100;
                    } else {
                        $total11 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total11, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">12</td>
                    <td style="text-align: left;">Desember</td>
                    <?php $total12 = 0; ?>
                    <td><?php echo format_ribuan($bulan_12->jumlah) ?></td>
                    <td><?php echo format_ribuan($bulan_12_tahunvs->jumlah) ?></td>
                    <?php if ($bulan_12->jumlah != 0) {
                        $total12 = ($bulan_12_tahunvs->jumlah - $bulan_12->jumlah) / $bulan_12->jumlah * 100;
                    } else {
                        $total12 = 0;
                    } ?>
                    <td>
                        <center><?php echo round($total12, 2) ?><center>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: left;">Total Wisman</td>
                    <?php $total_tahun1 = $bulan_1->jumlah + $bulan_2->jumlah + $bulan_3->jumlah + $bulan_4->jumlah
                        + $bulan_5->jumlah + $bulan_6->jumlah + $bulan_7->jumlah + $bulan_8->jumlah + $bulan_9->jumlah +
                        $bulan_10->jumlah + $bulan_11->jumlah + $bulan_12->jumlah ?>
                    <?php $total_tahun2 = $bulan_1_tahunvs->jumlah + $bulan_2_tahunvs->jumlah + $bulan_3_tahunvs->jumlah
                        + $bulan_4_tahunvs->jumlah + $bulan_5_tahunvs->jumlah + $bulan_6_tahunvs->jumlah
                        + $bulan_7_tahunvs->jumlah + $bulan_8_tahunvs->jumlah + $bulan_9_tahunvs->jumlah
                        + $bulan_10_tahunvs->jumlah + $bulan_11_tahunvs->jumlah + $bulan_12_tahunvs->jumlah ?>
                    <?php if ($total_tahun1 != 0) {
                        $total_growth = ($total_tahun2 - $total_tahun1) / $total_tahun1 * 100;
                    } else {
                        $total_growth = 0;
                    } ?>
                    <td><?php echo format_ribuan($total_tahun1) ?></td>
                    <td><?php echo format_ribuan($total_tahun2) ?></td>
                    <td>
                        <center><?php echo round($total_growth, 2) ?><center>
                    </td>
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
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_2A_blok2()"><i class="fa fa-line-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok2-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_2A_blok2()"><i class="fa fa-line-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok2-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_jwisman_blok2" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th><?php echo $tahun ?></th>
            <th><?php echo $tahun_vs ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;">Januari</td>
            <td><?php echo $bulan_1->jumlah ?></td>
            <td><?php echo $bulan_1_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Februari</td>
            <td><?php echo $bulan_2->jumlah ?></td>
            <td><?php echo $bulan_2_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Maret</td>
            <td><?php echo $bulan_3->jumlah ?></td>
            <td><?php echo $bulan_3_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">April</td>
            <td><?php echo $bulan_4->jumlah ?></td>
            <td><?php echo $bulan_4_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Mei</td>
            <td><?php echo $bulan_5->jumlah ?></td>
            <td><?php echo $bulan_5_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Juni</td>
            <td><?php echo $bulan_6->jumlah ?></td>
            <td><?php echo $bulan_6_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Juli</td>
            <td><?php echo $bulan_7->jumlah ?></td>
            <td><?php echo $bulan_7_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Agustus</td>
            <td><?php echo $bulan_8->jumlah ?></td>
            <td><?php echo $bulan_8_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">September</td>
            <td><?php echo $bulan_9->jumlah ?></td>
            <td><?php echo $bulan_9_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Oktober</td>
            <td><?php echo $bulan_10->jumlah ?></td>
            <td><?php echo $bulan_10_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">November</td>
            <td><?php echo $bulan_11->jumlah ?></td>
            <td><?php echo $bulan_11_tahunvs->jumlah ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Desember</td>
            <td><?php echo $bulan_12->jumlah ?></td>
            <td><?php echo $bulan_12_tahunvs->jumlah ?></td>
        </tr>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#waktu').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori <?php echo $jenis_kebangsaan->grup ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori <?php echo $jenis_kebangsaan->grup ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori <?php echo $jenis_kebangsaan->grup ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Perbandingan Wisatawan Mancanegara Kategori <?php echo $jenis_kebangsaan->grup ?> Tahun <?php echo $tahun ?> - SIPTA'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
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
    Highcharts.chart('grafik-1A_blok2-jpenumpang', {
        data: {
            table: 'data_jwisman_blok2'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4>Grafik Perbandingan Wisatawan Mancanegara Kategori <br/> <?php echo $jenis_kebangsaan->grup . ' Tahun ' . $tahun . ' VS ' . $tahun_vs ?></h4>'
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
    Highcharts.chart('grafik-2A_blok2-jpenumpang', {
        data: {
            table: 'data_jwisman_blok2'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4>Grafik Perbandingan Wisatawan Mancanegara Kategori<br/> <?php echo $jenis_kebangsaan->grup . ' Tahun ' . $tahun . ' VS ' . $tahun_vs ?></h4>'
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
    $(document).ready(function() {
        $("#tabel_blok2").slideDown();
        document.getElementById("grafik-2A_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok2").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_2A_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-2A_blok2").slideDown();
    }

    function tabel_blok2() {
        $("#grafik-1A_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#tabel_blok2").slideDown();
    }

    function grafik_1A_blok2() {
        $("#grafik-2A_blok2").slideUp();
        $("#tabel_blok2").slideUp();
        $("#grafik-1A_blok2").slideDown();
    }
</script>