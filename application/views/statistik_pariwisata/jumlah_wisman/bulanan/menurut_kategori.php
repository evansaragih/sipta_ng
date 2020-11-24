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
                            <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_JumlahWisman') ?>">Tahunan</a>
                        </div>
                    </div>
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPB_JumlahWisman/cari_blok1") ?>">
                        <div class="col-md-3">
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

    <div class="box box-solid" id="tabel_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1B_blok1()"><i class="fa fa-line-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok1()"><i class="fa fa-pie-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_3A_blok1()"><i class="fa fa-area-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Map/Geo" onclick="menurut_blok1b()"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body blok1">
            <!-- ini tabel -->
            <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></p>
            <table id="blok1" class="table table-bordered table-striped" style="text-align: right">
                <thead>
                    <tr style="background-color:#6e0006; color:white;">
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Bulan</th>
                        <?php foreach ($grup_kebangsaan as $dp) { ?>
                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['grup'] ?></th>
                        <?php } ?>
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left;">Januari</td>
                        <?php $total1 = 0; ?>
                        <?php foreach ($data_januari as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total1 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total1) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Februari</td>
                        <?php $total2 = 0; ?>
                        <?php foreach ($data_februari as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total2 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total2) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Maret</td>
                        <?php $total3 = 0; ?>
                        <?php foreach ($data_maret as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total3 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total3) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">April</td>
                        <?php $total4 = 0; ?>
                        <?php foreach ($data_april as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total4 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total4) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Mei</td>
                        <?php $total5 = 0; ?>
                        <?php foreach ($data_mei as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total5 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total5) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Juni</td>
                        <?php $total6 = 0; ?>
                        <?php foreach ($data_juni as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total6 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total6) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Juli</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_juli as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Agustus</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_agustus as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">September</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_september as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Oktober</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_oktober as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">November</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_november as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Desember</td>
                        <?php $total7 = 0; ?>
                        <?php foreach ($data_desember as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total7 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total7) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Total</td>
                        <?php $total8 = 0; ?>
                        <?php foreach ($total_wisman as $dp) { ?>
                            <td><?php echo number_format($dp['jumlah']) ?></td>
                            <?php $total8 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo number_format($total8) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-solid" id="grafik-1A_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Batang" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1B_blok1()"><i class="fa fa-line-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok1()"><i class="fa fa-pie-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_3A_blok1()"><i class="fa fa-area-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Map/Geo" onclick="menurut_blok1b()"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="grafik-1A_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>

    <div class="box box-solid" id="grafik-1B_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_1B_blok1()"><i class="fa fa-line-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok1()"><i class="fa fa-pie-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_3A_blok1()"><i class="fa fa-area-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Map/Geo" onclick="menurut_blok1b()"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="grafik-1B_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>

    <div class="box box-solid" id="grafik-2A_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1B_blok1()"><i class="fa fa-line-chart"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_2A_blok1()"><i class="fa fa-pie-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Area" onclick="grafik_3A_blok1()"><i class="fa fa-area-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Map/Geo" onclick="menurut_blok1b()"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="bulan_1A">
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2A_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_2A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning active" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2B_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_3A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning active" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2C_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_4A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning active" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2D_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_5A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning active" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2E_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_6A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning active" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2F_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_7A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning active" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2G_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_8A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning active" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2H_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_9A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning active" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2I_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_10A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning active" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2J_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_11A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning active" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2K_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_12A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Januari" onclick="bulan_1A()">01</button>
                        <button type="button" class="btn btn-warning" title="Februari" onclick="bulan_2A()">02</button>
                        <button type="button" class="btn btn-warning" title="Maret" onclick="bulan_3A()">03</button>
                        <button type="button" class="btn btn-warning" title="April" onclick="bulan_4A()">04</button>
                        <button type="button" class="btn btn-warning" title="Mei" onclick="bulan_5A()">05</button>
                        <button type="button" class="btn btn-warning" title="Juni" onclick="bulan_6A()">06</button>
                        <button type="button" class="btn btn-warning" title="Juli" onclick="bulan_7A()">07</button>
                        <button type="button" class="btn btn-warning" title="Agustus" onclick="bulan_8A()">08</button>
                        <button type="button" class="btn btn-warning" title="September" onclick="bulan_9A()">09</button>
                        <button type="button" class="btn btn-warning" title="Oktober" onclick="bulan_10A()">10</button>
                        <button type="button" class="btn btn-warning" title="November" onclick="bulan_11A()">11</button>
                        <button type="button" class="btn btn-warning active" title="Desember" onclick="bulan_12A()">12</button>
                    </div>
                </center>
                <div id="grafik-2L_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <table id="data-jpenumpang_grafik2A_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_januari as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2B_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_februari as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2C_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_maret as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2D_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_april as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2E_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_mei as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2F_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_juni as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2G_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_juli as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2H_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_agustus as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2I_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_september as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2J_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_oktober as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2K_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_november as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table id="data-jpenumpang_grafik2L_blok1" hidden>
            <thead>
                <tr>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_desember as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['grup'] ?></td>
                        <td><?php echo $dp['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="box box-solid" id="grafik-3A_blok1">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1B_blok1()"><i class="fa fa-line-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok1()"><i class="fa fa-pie-chart"></i></button>
                            <button type="button" class="btn btn-danger active" title="Grafik Area" onclick="grafik_3A_blok1()"><i class="fa fa-area-chart"></i></button>
                            <button type="button" class="btn btn-danger" title="Grafik Map/Geo" onclick="menurut_blok1b()"><i class="fa fa-map"></i></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div id="grafik-3A_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>


    <table id="data_jpenumpang-int_kategori" border="1" hidden>
        <thead>
            <tr>
                <th></th>
                <?php foreach ($grup_kebangsaan as $dp) { ?>
                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['grup'] ?></th>
                <?php } ?>
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
</div>

<script>
    $(document).ready(function() {
        var table = $('#blok1').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Kebangsaan Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Kebangsaan Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Kebangsaan Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Kebangsaan Tahun <?php echo $tahun ?> - SIPTA'
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
            .appendTo('.blok1 .col-sm-6:eq(0)');
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
    Highcharts.chart('grafik-1A_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-int_kategori'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></h4>'
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
    Highcharts.chart('grafik-1B_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-int_kategori'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></h4>'
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
    Highcharts.chart('grafik-3A_blok1-jpenumpang', {
        chart: {
            type: 'area'
        },
        title: {
            useHTML: true,
            text: '<h4>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></h4>'
        },
        // subtitle: {
        //     text: 'Source: Wikipedia.org'
        // },
        xAxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' orang'
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
        data: {
            table: 'data_jpenumpang-int_kategori'
        }
    });
</script>

<!-- script diagram pie blok 2 -->
<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2A_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Januari Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2B_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2B_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Februari Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2C_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2C_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Maret Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2D_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2D_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori April Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2E_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2E_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Mei Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2F_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2F_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Juni Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2G_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2G_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Juli Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2H_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2H_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Agustus Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2I_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2I_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori September Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2J_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2J_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Oktober Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2K_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2K_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori November Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2L_blok1-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2L_blok1'
        },
        chart: {
            type: 'pie'
        },
        title: {
            useHTML: true,
            text: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Desember Tahun <?php echo $tahun; ?></h4>'
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
                    this.point.y + ' ' + 'orang';
            }
        }
    });
</script>

<!-- ending script diagarm pie -->


<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok1").slideDown();
        document.getElementById("grafik-2A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1B_blok1").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_3A_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-3A_blok1").slideDown();
    }

    function tabel() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#tabel_blok1").slideDown();
    }

    function grafik_2A_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-2A_blok1").slideDown();
    }

    function grafik_1A_blok1() {
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1A_blok1").slideDown();
    }

    function grafik_1B_blok1() {
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideDown();
    }


    //  UNTUK BLOK 2 PIE CHART
    function bulan_1A() {
        $("#bulan_2A").slideUp();
        $("#bulan_3A").slideUp();
        $("#bulan_4A").slideUp();
        $("#bulan_5A").slideUp();
        $("#bulan_6A").slideUp();
        $("#bulan_7A").slideUp();
        $("#bulan_8A").slideUp();
        $("#bulan_9A").slideUp();
        $("#bulan_10A").slideUp();
        $("#bulan_11A").slideUp();
        $("#bulan_12A").slideUp();
        $("#bulan_1A").fadeIn();
    }

    function bulan_2A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_2A").fadeIn();
    }

    function bulan_3A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_3A").fadeIn();
    }

    function bulan_4A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_4A").fadeIn();
    }

    function bulan_5A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_5A").fadeIn();
    }

    function bulan_6A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_6A").fadeIn();
    }

    function bulan_7A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_7A").fadeIn();
    }

    function bulan_8A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_8A").fadeIn();
    }

    function bulan_9A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_9A").fadeIn();
    }

    function bulan_10A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_10A").fadeIn();
    }

    function bulan_11A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_12A").fadeOut();
        $("#bulan_11A").fadeIn();
    }

    function bulan_12A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_7A").fadeOut();
        $("#bulan_8A").fadeOut();
        $("#bulan_9A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_11A").fadeOut();
        $("#bulan_10A").fadeOut();
        $("#bulan_12A").fadeIn();
    }

    function bulan_1B() {
        $("#bulan_2B").slideUp();
        $("#bulan_3B").slideUp();
        $("#bulan_4B").slideUp();
        $("#bulan_5B").slideUp();
        $("#bulan_6B").slideUp();
        $("#bulan_7B").slideUp();
        $("#bulan_8B").slideUp();
        $("#bulan_9B").slideUp();
        $("#bulan_10B").slideUp();
        $("#bulan_11B").slideUp();
        $("#bulan_12B").slideUp();
        $("#bulan_1B").fadeIn();
    }

    function bulan_2B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_2B").fadeIn();
    }

    function bulan_3B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_3B").fadeIn();
    }

    function bulan_4B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_4B").fadeIn();
    }

    function bulan_5B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_5B").fadeIn();
    }

    function bulan_6B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_6B").fadeIn();
    }

    function bulan_7B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_7B").fadeIn();
    }

    function bulan_8B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_8B").fadeIn();
    }

    function bulan_9B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_9B").fadeIn();
    }

    function bulan_10B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_10B").fadeIn();
    }

    function bulan_11B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_12B").fadeOut();
        $("#bulan_11B").fadeIn();
    }

    function bulan_12B() {
        $("#bulan_1B").fadeOut();
        $("#bulan_3B").fadeOut();
        $("#bulan_2B").fadeOut();
        $("#bulan_5B").fadeOut();
        $("#bulan_6B").fadeOut();
        $("#bulan_7B").fadeOut();
        $("#bulan_8B").fadeOut();
        $("#bulan_9B").fadeOut();
        $("#bulan_4B").fadeOut();
        $("#bulan_11B").fadeOut();
        $("#bulan_10B").fadeOut();
        $("#bulan_12B").fadeIn();
    }
</script>