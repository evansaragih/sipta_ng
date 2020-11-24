<!-- Default box -->
<?php function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
} ?>
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok2()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Pintu Masuk</button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_jumlahpenumpang') ?>">Tahunan</a>
                    </div>
                </div>
                <form method="post" id="jpenumpang-waktu" action="<?php echo base_url("SPB_JumlahPenumpang/cari_blok2") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_pintu_masuk" name="id_pintu_masuk" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">

                            <?php foreach ($grup_kebangsaan as $a) { ?>
                                <option value="<?php echo $a['id_group']; ?>" <?= $id_grup == $a['id_group'] ? "selected" : null  ?>><?php echo $a['jenis_kebangsaan']; ?></option>
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
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun_vs" name="tahun_vs" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            // $year_now = date('Y');
                            // $year_search = $year_now - 1;
                            for ($x = $tahun + 5; $x > $tahun; $x--) {
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
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Growth</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Kebangsaan</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok4()">Menurut Waktu </button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body waktu">
        <!-- nama waktu kalo bisa di seragamin itu untuk buat print !!!! -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Tabel Jumlah Penumpang <?php echo $jenis_kebangsaan->jenis_kebangsaan . ' Tahun ' . $tahun ?> </p>
        <table id="waktu" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th style="text-align: center; vertical-align: middle;">Bulan</th>
                    <th style="text-align: center;">2000</th>
                    <th style="text-align: center;">2001</th>
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

<div class="box box-solid" id="grafik-1_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3_blok2()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1_blok2-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok2">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3_blok2()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
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
                    <div id="grafik-2A_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2B_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2C_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2D_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2E_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2F_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2G_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2H_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2I_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2J_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2K_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2L_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="bulan_1B" hidden>
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
                    <div id="grafik-2AA_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
                </div>
                <div id="bulan_2B">
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
                    <div id="grafik-2BB_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2CC_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2DD_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2EE_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2FF_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2GG_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2HH_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2II_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2JJ_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2KK_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
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
                    <div id="grafik-2LL_blok2-jpenumpang" style="min-width: 350px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
    <table id="data-jpenumpang_grafik2A_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_1->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_1->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2B_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_2->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_2->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2C_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_3->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_3->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2D_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_4->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_4->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2E_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_5->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_5->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2F_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_6->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_6->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2G_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_7->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_7->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2H_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_8->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_8->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2I_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_9->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_9->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2J_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_10->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_10->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2K_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_11->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_11->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
    <table id="data-jpenumpang_grafik2L_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Internasional</td>
                <td><?php echo $bulan_12->jlh_internasional; ?></td>
            </tr>
            <tr>
                <td>Domestik</td>
                <td><?php echo $bulan_12->jlh_domestik; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="box box-solid" id="grafik-3_blok2" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok2()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1_blok2()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_2A_blok2()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_3_blok2()"><i class="fa fa-area-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3_blok2-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <table id="data-jpenumpang_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Internasional</th>
                <th>Domestik</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_jpenumpang as $dp) { ?>
                <tr>
                    <th><?php echo '' . $dp['bulan']; ?></th>
                    <td><?php echo $dp['jlh_internasional']; ?></td>
                    <td><?php echo $dp['jlh_domestik']; ?></td>
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
                    title: 'Tabel Jumlah Penumpang <?php echo $jenis_kebangsaan->jenis_kebangsaan . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang <?php echo $jenis_kebangsaan->jenis_kebangsaan . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang <?php echo $jenis_kebangsaan->jenis_kebangsaan . ' Tahun ' . $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang <?php echo $jenis_kebangsaan->jenis_kebangsaan . ' Tahun ' . $tahun ?> - SIPTA'
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
            'autoWidth': true
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
    Highcharts.chart('grafik-1_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_blok2'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Penumpang <?php echo $nama_pintu_masuk->pintu_masuk . ' Tahun ' . $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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

<!-- script diagram pie blok 2 -->
<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2A_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JANUARI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2B_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2B_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> FEBRUARI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2C_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2C_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> MARET <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2D_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2D_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> APRIL <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2E_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2E_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> MEI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2F_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2F_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JUNI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2G_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2G_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JULI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2H_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2H_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> AGUSTUS <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2I_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2I_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> SEPTEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2J_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2J_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> OKTOBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2K_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2K_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> NOVEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2L_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2L_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> DESEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2AA_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2A_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JANUARI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2BB_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2B_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> FEBRUARI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2CC_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2C_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> MARET <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2DD_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2D_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> APRIL <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2EE_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2E_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> MEI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2FF_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2F_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JUNI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2GG_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2G_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> JULI <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2HH_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2H_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> AGUSTUS <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2II_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2I_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> SEPTEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2JJ_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2J_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> OKTOBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2KK_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2K_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> NOVEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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
    Highcharts.chart('grafik-2LL_blok2-jpenumpang', {
        data: {
            table: 'data-jpenumpang_grafik2L_blok2'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> DESEMBER <?= $tahun ?>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
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

<!-- ending script diagarm pie -->

<script type="text/javascript">
    Highcharts.chart('grafik-3_blok2-jpenumpang', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Jumlah Penumpang <?= $nama_pintu_masuk->pintu_masuk ?> Tahun <?= $tahun ?>'
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
            table: 'data-jpenumpang_blok2'
        }
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok2").slideDown();
        document.getElementById("grafik-1_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-2A_blok2").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3_blok2").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_1_blok2() {
        $("#tabel_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3_blok2").slideUp();
        $("#grafik-1_blok2").slideDown();
    }

    function grafik_2A_blok2() {
        $("#tabel_blok2").slideUp();
        $("#grafik-1_blok2").slideUp();
        $("#grafik-3_blok2").slideUp();
        $("#grafik-2A_blok2").slideDown();
    }

    function grafik_3_blok2() {
        $("#tabel_blok2").slideUp();
        $("#grafik-1_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3_blok2").slideDown();
    }

    function tabel_blok2() {
        $("#grafik-1_blok2").slideUp();
        $("#grafik-2A_blok2").slideUp();
        $("#grafik-3_blok2").slideUp();
        $("#tabel_blok2").slideDown();
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