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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPB_JumlahWisman/cari_blok1") ?>">
                        <div class="col-md-3">
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

    <div class="box box-solid" id="grafik-4A_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="menurut_blok1()()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Map/Geo"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="bulan_1B">
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4A_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_2B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning active" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4B_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_3B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning active" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4C_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_4B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning active" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4D_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_5B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning active" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4E_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_6B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning active" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4F_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_7B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning active" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4G_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_8B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning active" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4H_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_9B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning active" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4I_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_10B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning active" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4J_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_11B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning active" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4K_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
            <div id="bulan_12B" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1B()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2B()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3B()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4B()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5B()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6B()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7B()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8B()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9B()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10B()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11B()">11</button>
                        <button type="button" class="btn btn-warning active" title="Desember" onclick="bulan_12B()">12</button>
                    </div>
                </center>
                <div id="grafik-4L_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
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
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Januari Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln1->jumlah, $data_asia_bln1->jumlah, $data_africa_bln1->jumlah, $data_american_bln1->jumlah, $data_europe_bln1->jumlah, $data_middle_east_bln1->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln1->jumlah ?>",
                    "path": "<?php echo $data_asean_bln1->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln1->jumlah ?>",
                    "path": "<?php echo $data_asia_bln1->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln1->jumlah ?>",
                    "path": "<?php echo $data_africa_bln1->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln1->jumlah ?>",
                    "path": "<?php echo $data_american_bln1->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln1->jumlah ?>",
                    "path": "<?php echo $data_europe_bln1->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln1->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln1->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln1->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4B_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Februari Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln2->jumlah, $data_asia_bln2->jumlah, $data_africa_bln2->jumlah, $data_american_bln2->jumlah, $data_europe_bln2->jumlah, $data_middle_east_bln2->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln2->jumlah ?>",
                    "path": "<?php echo $data_asean_bln2->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln2->jumlah ?>",
                    "path": "<?php echo $data_asia_bln2->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln2->jumlah ?>",
                    "path": "<?php echo $data_africa_bln2->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln2->jumlah ?>",
                    "path": "<?php echo $data_american_bln2->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln2->jumlah ?>",
                    "path": "<?php echo $data_europe_bln2->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln2->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln2->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln2->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4C_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Maret Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln3->jumlah, $data_asia_bln3->jumlah, $data_africa_bln3->jumlah, $data_american_bln3->jumlah, $data_europe_bln3->jumlah, $data_middle_east_bln3->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln3->jumlah ?>",
                    "path": "<?php echo $data_asean_bln3->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln3->jumlah ?>",
                    "path": "<?php echo $data_asia_bln3->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln3->jumlah ?>",
                    "path": "<?php echo $data_africa_bln3->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln3->jumlah ?>",
                    "path": "<?php echo $data_american_bln3->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln3->jumlah ?>",
                    "path": "<?php echo $data_europe_bln3->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln3->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln3->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln3->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4D_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan April Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln4->jumlah, $data_asia_bln4->jumlah, $data_africa_bln4->jumlah, $data_american_bln4->jumlah, $data_europe_bln4->jumlah, $data_middle_east_bln4->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln4->jumlah ?>",
                    "path": "<?php echo $data_asean_bln4->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln4->jumlah ?>",
                    "path": "<?php echo $data_asia_bln4->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln4->jumlah ?>",
                    "path": "<?php echo $data_africa_bln4->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln4->jumlah ?>",
                    "path": "<?php echo $data_american_bln4->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln4->jumlah ?>",
                    "path": "<?php echo $data_europe_bln4->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln4->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln4->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln4->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4E_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Mei Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln5->jumlah, $data_asia_bln5->jumlah, $data_africa_bln5->jumlah, $data_american_bln5->jumlah, $data_europe_bln5->jumlah, $data_middle_east_bln5->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln5->jumlah ?>",
                    "path": "<?php echo $data_asean_bln5->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln5->jumlah ?>",
                    "path": "<?php echo $data_asia_bln5->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln5->jumlah ?>",
                    "path": "<?php echo $data_africa_bln5->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln5->jumlah ?>",
                    "path": "<?php echo $data_american_bln5->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln5->jumlah ?>",
                    "path": "<?php echo $data_europe_bln5->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln5->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln5->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln5->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4F_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Juni Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln6->jumlah, $data_asia_bln6->jumlah, $data_africa_bln6->jumlah, $data_american_bln6->jumlah, $data_europe_bln6->jumlah, $data_middle_east_bln6->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln6->jumlah ?>",
                    "path": "<?php echo $data_asean_bln6->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln6->jumlah ?>",
                    "path": "<?php echo $data_asia_bln6->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln6->jumlah ?>",
                    "path": "<?php echo $data_africa_bln6->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln6->jumlah ?>",
                    "path": "<?php echo $data_american_bln6->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln6->jumlah ?>",
                    "path": "<?php echo $data_europe_bln6->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln6->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln6->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln6->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4G_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Juli Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln7->jumlah, $data_asia_bln7->jumlah, $data_africa_bln7->jumlah, $data_american_bln7->jumlah, $data_europe_bln7->jumlah, $data_middle_east_bln7->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln7->jumlah ?>",
                    "path": "<?php echo $data_asean_bln7->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln7->jumlah ?>",
                    "path": "<?php echo $data_asia_bln7->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln7->jumlah ?>",
                    "path": "<?php echo $data_africa_bln7->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln7->jumlah ?>",
                    "path": "<?php echo $data_american_bln7->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln7->jumlah ?>",
                    "path": "<?php echo $data_europe_bln7->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln7->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln7->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln7->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4H_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Agustus Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln8->jumlah, $data_asia_bln8->jumlah, $data_africa_bln8->jumlah, $data_american_bln8->jumlah, $data_europe_bln8->jumlah, $data_middle_east_bln8->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln8->jumlah ?>",
                    "path": "<?php echo $data_asean_bln8->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln8->jumlah ?>",
                    "path": "<?php echo $data_asia_bln8->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln8->jumlah ?>",
                    "path": "<?php echo $data_africa_bln8->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln8->jumlah ?>",
                    "path": "<?php echo $data_american_bln8->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln8->jumlah ?>",
                    "path": "<?php echo $data_europe_bln8->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln8->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln8->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln8->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4I_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan September Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln9->jumlah, $data_asia_bln9->jumlah, $data_africa_bln9->jumlah, $data_american_bln9->jumlah, $data_europe_bln9->jumlah, $data_middle_east_bln9->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln9->jumlah ?>",
                    "path": "<?php echo $data_asean_bln9->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln9->jumlah ?>",
                    "path": "<?php echo $data_asia_bln9->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln9->jumlah ?>",
                    "path": "<?php echo $data_africa_bln9->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln9->jumlah ?>",
                    "path": "<?php echo $data_american_bln9->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln9->jumlah ?>",
                    "path": "<?php echo $data_europe_bln9->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln9->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln9->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln9->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4J_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Oktober Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln9->jumlah, $data_asia_bln9->jumlah, $data_africa_bln9->jumlah, $data_american_bln9->jumlah, $data_europe_bln9->jumlah, $data_middle_east_bln9->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln10->jumlah ?>",
                    "path": "<?php echo $data_asean_bln10->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln10->jumlah ?>",
                    "path": "<?php echo $data_asia_bln10->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln10->jumlah ?>",
                    "path": "<?php echo $data_africa_bln10->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln10->jumlah ?>",
                    "path": "<?php echo $data_american_bln10->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln10->jumlah ?>",
                    "path": "<?php echo $data_europe_bln10->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln10->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln10->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln10->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4K_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan November Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln11->jumlah, $data_asia_bln11->jumlah, $data_africa_bln11->jumlah, $data_american_bln11->jumlah, $data_europe_bln11->jumlah, $data_middle_east_bln11->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln11->jumlah ?>",
                    "path": "<?php echo $data_asean_bln11->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln11->jumlah ?>",
                    "path": "<?php echo $data_asia_bln11->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln11->jumlah ?>",
                    "path": "<?php echo $data_africa_bln11->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln11->jumlah ?>",
                    "path": "<?php echo $data_american_bln11->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln11->jumlah ?>",
                    "path": "<?php echo $data_europe_bln11->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln11->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln11->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln11->path_map ?>"
                }
            ]
        }]
    });
</script>
<script type="text/javascript">
    // Initiate the chart
    Highcharts.mapChart('grafik-4L_blok1-jpenumpang', {
        chart: {
            type: "map"
        },
        title: {
            useHTML: true,
            text: "<h4><center>Geomaps Kedatangan Wisatawan Mancanegara Berdasarkan Kebangsaan </br>Bulan Desember Tahun <?php echo $tahun; ?> </center></h4>"
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
            max: "<?php echo max($data_asean_bln12->jumlah, $data_asia_bln12->jumlah, $data_africa_bln12->jumlah, $data_american_bln12->jumlah, $data_europe_bln12->jumlah, $data_middle_east_bln12->jumlah) ?>",
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
                    "name": "<?php echo $data_asean_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asean_bln12->jumlah ?>",
                    "path": "<?php echo $data_asean_bln12->path_map ?>"
                },
                {
                    "name": "<?php echo $data_asia_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_asia_bln12->jumlah ?>",
                    "path": "<?php echo $data_asia_bln12->path_map ?>"
                },
                {
                    "name": "<?php echo $data_africa_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_africa_bln12->jumlah ?>",
                    "path": "<?php echo $data_africa_bln12->path_map ?>"
                },
                {
                    "name": "<?php echo $data_american_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_american_bln12->jumlah ?>",
                    "path": "<?php echo $data_american_bln12->path_map ?>"
                },
                {
                    "name": "<?php echo $data_europe_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_europe_bln12->jumlah ?>",
                    "path": "<?php echo $data_europe_bln12->path_map ?>"
                },
                {
                    "name": "<?php echo $data_middle_east_bln12->jenis_kebangsaan ?>",
                    "value": "<?php echo $data_middle_east_bln12->jumlah ?>",
                    "path": "<?php echo $data_middle_east_bln12->path_map ?>"
                }
            ]
        }]
    });
</script>
<!-- ending script diagram map -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#grafik-4A_blok1").slideDown();
        document.getElementById("tabel_blok1").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function tabel() {
        $("#tabel_blok1").slideDown();
    }
</script>