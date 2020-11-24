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
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahWisman/cari_blok1") ?>">
                        <div class="col-md-3">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
                                // $year_search = $year_now - 1;
                                for ($x = $year_now; $x >= 2005; $x--) {
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
            <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun - 5 ?> s.d. <?php echo $tahun ?></p>
            <table id="blok1" class="table table-bordered table-striped" style="text-align: right">
                <thead>
                    <tr style="background-color:#6e0006; color:white;">
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Tahun</th>
                        <?php foreach ($grup_kebangsaan as $dp) { ?>
                            <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['grup'] ?></th>
                        <?php } ?>
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left;"><?php echo $tahun ?></td>
                        <?php $total1 = 0; ?>
                        <?php function format_ribuan($nilai)
                        {
                            return number_format($nilai, 0, ',', ',');
                        } ?>
                        <?php foreach ($data_tahun as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total1 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total1) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo ($tahun - 1) ?></td>
                        <?php $total2 = 0; ?>
                        <?php foreach ($data_tahun_1 as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total2 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total2) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo ($tahun - 2) ?></td>
                        <?php $total3 = 0; ?>
                        <?php foreach ($data_tahun_2 as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total3 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total3) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo ($tahun - 3) ?></td>
                        <?php $total4 = 0; ?>
                        <?php foreach ($data_tahun_3 as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total4 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total4) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo ($tahun - 4) ?></td>
                        <?php $total5 = 0; ?>
                        <?php foreach ($data_tahun_4 as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total5 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total5) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo ($tahun - 5) ?></td>
                        <?php $total6 = 0; ?>
                        <?php foreach ($data_tahun_5 as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total6 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total6) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Total</td>
                        <?php $total8 = 0; ?>
                        <?php foreach ($total_wisman as $dp) { ?>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total8 += $dp['jumlah']; ?>
                        <?php } ?>
                        <td><?php echo format_ribuan($total8) ?></td>
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
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 2 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2A_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_2A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2B_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_3A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 2 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2C_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_4A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 2 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2D_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_5A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 2 ?></button>
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2E_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
            </div>
            <div id="bulan_6A" hidden>
                <center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 5 ?>" onclick="bulan_1A()"><?php echo $tahun - 5 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 4 ?>" onclick="bulan_2A()"><?php echo $tahun - 4 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 3 ?>" onclick="bulan_3A()"><?php echo $tahun - 3 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 2 ?>" onclick="bulan_4A()"><?php echo $tahun - 2 ?></button>
                        <button type="button" class="btn btn-warning" title="<?php echo $tahun - 1 ?>" onclick="bulan_5A()"><?php echo $tahun - 1 ?></button>
                        <button type="button" class="btn btn-warning active" title="<?php echo $tahun ?>" onclick="bulan_6A()"><?php echo $tahun ?></button>
                    </div>
                </center>
                <div id="grafik-2F_blok1-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                <?php foreach ($data_tahun_5 as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <?php foreach ($data_tahun_4 as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <?php foreach ($data_tahun_3 as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <?php foreach ($data_tahun_2 as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <?php foreach ($data_tahun_1 as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <?php foreach ($data_tahun as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['jenis_kebangsaan'] ?></td>
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
                <td style="text-align: left;"><?php echo $tahun - 5 ?></td>
                <?php foreach ($data_tahun_5 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 4 ?></td>
                <?php foreach ($data_tahun_4 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 3 ?></td>
                <?php foreach ($data_tahun_3 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 2 ?></td>
                <?php foreach ($data_tahun_2 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 1 ?></td>
                <?php foreach ($data_tahun_1 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun ?></td>
                <?php foreach ($data_tahun as $dp) { ?>
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
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun - 5 ?> s.d. <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun - 5 ?> s.d. <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun - 5 ?> s.d. <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun - 5 ?> s.d. <?php echo $tahun ?> - SIPTA</h4>'
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
            text: '<h4><center>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></center></h4>'
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
                return '<b>' + this.point.x + '</b><br/>' +
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
            text: '<h4><center>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></center></h4>'
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
            text: '<h4><center>Grafik Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun ?></center></h4>'
        },
        // subtitle: {
        //     text: 'Source: Wikipedia.org'
        // },
        xAxis: {
            categories: ['<?php echo $tahun - 5 ?>', '<?php echo $tahun - 4 ?>', '<?php echo $tahun - 3 ?>', '<?php echo $tahun - 2 ?>', '<?php echo $tahun - 1 ?>', '<?php echo $tahun ?>'],
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
            text: '<h4><center>Kedatangan Wisatawan Mancanegara Menurut Kategori Tahun <?php echo $tahun; ?></center></h4>'
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
        $("#bulan_1A").fadeIn();
    }

    function bulan_2A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_2A").fadeIn();
    }

    function bulan_3A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_3A").fadeIn();
    }

    function bulan_4A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_4A").fadeIn();
    }

    function bulan_5A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_4A").fadeOut();
        $("#bulan_6A").fadeOut();
        $("#bulan_5A").fadeIn();
    }

    function bulan_6A() {
        $("#bulan_1A").fadeOut();
        $("#bulan_3A").fadeOut();
        $("#bulan_2A").fadeOut();
        $("#bulan_5A").fadeOut();
        $("#bulan_6A").fadeIn();
    }
</script>