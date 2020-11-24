<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Kategori</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Growth</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Kebangsaan</button>
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
                            <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_jumlahpenumpang') ?>">Tahunan</a>
                        </div>
                    </div>
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahWisman/cari_blok1b") ?>">
                        <div class="col-md-3">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
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

    <div class="box box-solid" id="grafik-4A_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="menurut_blok1()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Map/Geo"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="bulan_1B">
                <div id="grafik-4A_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
        </div>
    </div>

</div>

<!-- Page script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>

<!-- SCRIPT DIAGRAM MAP -->
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4A_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kategori </br>Tahun <?php echo $tahun; ?> </center></h4>"
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
            pointFormat: ' {point.name}<br>' +
                '<span style="font-size:30px">{point.value} Orang</span>',
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
            max: "<?php echo max($data_asean_tahun->jumlah, $data_asia_tahun->jumlah, $data_africa_tahun->jumlah, $data_america_tahun->jumlah, $data_europe_tahun->jumlah, $data_mid_east_tahun->jumlah) ?>",
            type: 'logarithmic',
            minColor: '#49FF56',
            maxColor: '#02820B',
            stops: [
                [0, '#49FF56'],
                [0.4, '#0AD518'],
                [0.55, '#06B712'],
                [0.60, '#03880D'],
                [0.98, '#02820B']
            ]
            //     labels: {
            //     format: '{value}%'
            //   }
        },

        series: [{
            name: 'Jumlah Wisman',
            states: {
                hover: {
                    color: '#D1351D'
                }
            },
            data: [{
                    "name": "<?php echo $data_asia_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_tahun->jumlah ?>",
                    "path": "<?php echo $data_asia_tahun->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asean_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_tahun->jumlah ?>",
                    "path": "<?php echo $data_asean_tahun->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_tahun->jumlah ?>",
                    "path": "<?php echo $data_africa_tahun->path_map ?>"
                },
                {
                    "name": "<?php echo $data_america_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_america_tahun->jumlah ?>",
                    "path": "<?php echo $data_america_tahun->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_tahun->jumlah ?>",
                    "path": "<?php echo $data_europe_tahun->path_map ?>"
                },
                {
                    "name": "<?php echo $data_mid_east_tahun->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_mid_east_tahun->jumlah ?>",
                    "path": "<?php echo $data_mid_east_tahun->path_map ?>"
                }
            ]
        }]
    });
</script>
<!-- ending script diagram map -->