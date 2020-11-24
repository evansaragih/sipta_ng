<!-- Default box -->
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Waktu</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Pintu Masuk</button>
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

<div class="box box-solid" id="tabel_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body kategori">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?></p>
        <table id="kategori" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Bulan</th>
                    <?php foreach ($grup_kebangsaan as $dp) { ?>
                        <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['jenis_kebangsaan'] ?></th>
                    <?php } ?>
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left;">Januari</td>
                    <?php $total1 = 0; ?>
                    <?php function format_ribuan($nilai)
                    {
                        return number_format($nilai, 0, ',', ',');
                    } ?>
                    <?php foreach ($data_januari as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total1 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total1) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Februari</td>
                    <?php $total2 = 0; ?>
                    <?php foreach ($data_februari as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total2 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total2) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Maret</td>
                    <?php $total3 = 0; ?>
                    <?php foreach ($data_maret as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total3 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total3) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">April</td>
                    <?php $total4 = 0; ?>
                    <?php foreach ($data_april as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total4 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total4) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Mei</td>
                    <?php $total5 = 0; ?>
                    <?php foreach ($data_mei as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total5 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total5) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Juni</td>
                    <?php $total6 = 0; ?>
                    <?php foreach ($data_juni as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total6 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total6) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Juli</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_juli as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Agustus</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_agustus as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">September</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_september as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Oktober</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_oktober as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">November</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_november as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Desember</td>
                    <?php $total7 = 0; ?>
                    <?php foreach ($data_desember as $dp) { ?>
                        <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                        <?php $total7 += $dp['jumlah']; ?>
                    <?php } ?>
                    <td><?php echo format_ribuan($total7) ?></td>
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
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_1A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_1B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_1C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-1B_blok1" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_1A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_1B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_1C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1B_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-1C_blok1" hidden>
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_1A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_1B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_1C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1C_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3A_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_3A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_3B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_3C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3A_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3B_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_3A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_3B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_3C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3B_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-3C_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_3A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_3B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_3C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-3C_blok1-jpenumpang" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning active" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_2B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_2C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>



<table id="data_jpenumpang-int_kategori" border="1">
    <thead>
        <tr>
        <th></th>
            <?php foreach ($grup_kebangsaan as $dp) { ?>
                <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['jenis_kebangsaan'] ?></th>
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
<table id="data_jpenumpang-dom_kategori" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Bandara Internasional I Gusti Ngurah Rai</th>
            <th>Pelabuhan Ketapang-Gilimanuk</th>
            <th>Pelabuhan Lembar-Padang Bai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: left;">Januari</td>
            <?php foreach ($data_januari as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Februari</td>
            <?php foreach ($data_februari as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Maret</td>
            <?php foreach ($data_maret as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">April</td>
            <?php foreach ($data_april as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Mei</td>
            <?php foreach ($data_mei as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Juni</td>
            <?php foreach ($data_juni as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Juli</td>
            <?php foreach ($data_juli as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Agustus</td>
            <?php foreach ($data_agustus as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">September</td>
            <?php foreach ($data_september as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Oktober</td>
            <?php foreach ($data_oktober as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">November</td>
            <?php foreach ($data_november as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="text-align: left;">Desember</td>
            <?php foreach ($data_desember as $dp) { ?>
                <td><?php echo $dp['jlh_domestik'] ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<table id="data_jpenumpang-total_kategori" border="1" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Bandara Internasional I Gusti Ngurah Rai</th>
            <th>Pelabuhan Ketapang-Gilimanuk</th>
            <th>Pelabuhan Lembar-Padang Bai</th>
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

<div class="box box-solid" id="grafik-2B_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_2B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_2C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2B_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2C_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_3A_blok1()"><i class="fa fa-pie-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()"><i class="fa fa-align-left"></i></button>
                    </div>
                </td>
                <td style="width: 20px"></td>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning" title="Grafik Batang Horizontal" onclick="grafik_2A_blok1()">Internasional</button>
                        <button type="button" class="btn btn-warning" title="Grafik Map" onclick="grafik_2B_blok1()">Domestik</button>
                        <button type="button" class="btn btn-warning active" title="Grafik Map" onclick="grafik_2C_blok1()">Int/Dom</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2C_blok1-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#kategori').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: 'Tabel Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?> - SIPTA'
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
    Highcharts.chart('grafik-1A_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-int_kategori'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Internasional Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
    Highcharts.chart('grafik-1B_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-dom_kategori'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Domestik Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
    Highcharts.chart('grafik-1C_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-total_kategori'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
    Highcharts.chart('grafik-2A_blok1-jpenumpang', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Internasional Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
        series: [{
                name: 'Bandara Internasional I Gusti Ngurah Rai',
                data: [<?= join($bandara_int, ',') ?>]
            },
            {
                name: 'Pelabuhan Ketapang-Gilimanuk',
                data: [<?= join($pelKG_int, ',') ?>]
            },
            {
                name: 'Pelabuhan Lembar-Padang Bai',
                data: [<?= join($pelLP_int, ',') ?>]
            }
        ]
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2B_blok1-jpenumpang', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Domestik Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
        series: [{
                name: 'Bandara Internasional I Gusti Ngurah Rai',
                data: [<?= join($bandara_dom, ',') ?>]
            },
            {
                name: 'Pelabuhan Ketapang-Gilimanuk',
                data: [<?= join($pelKG_dom, ',') ?>]
            },
            {
                name: 'Pelabuhan Lembar-Padang Bai',
                data: [<?= join($pelLP_dom, ',') ?>]
            }
        ]
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2C_blok1-jpenumpang', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
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
        series: [{
                name: 'Bandara Internasional I Gusti Ngurah Rai',
                data: [<?= join($bandara_total, ',') ?>]
            },
            {
                name: 'Pelabuhan Ketapang-Gilimanuk',
                data: [<?= join($pelKG_total, ',') ?>]
            },
            {
                name: 'Pelabuhan Lembar-Padang Bai',
                data: [<?= join($pelLP_total, ',') ?>]
            }
        ]
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-3A_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-diagram_donut1'
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Grafik Jumlah Penumpang Internasional Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
        },
        // subtitle: {
        //     text: '3D donut in Highcharts'
        // },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 75
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-3B_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-diagram_donut2'
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Grafik Jumlah Penumpang Domestik Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
        },
        // subtitle: {
        //     text: '3D donut in Highcharts'
        // },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 75
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-3C_blok1-jpenumpang', {
        data: {
            table: 'data_jpenumpang-diagram_donut3'
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Grafik Jumlah Penumpang Menurut Pintu Masuk Tahun <?php echo $tahun ?>'
        },
        // subtitle: {
        //     text: '3D donut in Highcharts'
        // },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 75
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok1").slideDown();
        document.getElementById("grafik-2A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-2B_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-2C_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3B_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-3C_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1B_blok1").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1C_blok1").setAttribute("hidden", "hidden");
        // $("#grafik_batang-horizontal").slideToggle();
        // $("#grafik_lingkaran").slideToggle();
    });

    function grafik_3A_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#grafik-3A_blok1").slideDown();
    }

    function grafik_3B_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#grafik-3B_blok1").slideDown();
    }

    function grafik_3C_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideDown();
    }

    function tabel() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideDown();
    }

    function grafik_2A_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-2A_blok1").slideDown();
    }

    function grafik_2B_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-2B_blok1").slideDown();
    }

    function grafik_2C_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-2C_blok1").slideDown();
    }

    function grafik_1A_blok1() {
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-1A_blok1").slideDown();
    }

    function grafik_1B_blok1() {
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1C_blok1").slideUp();
        $("#grafik-1B_blok1").slideDown();
    }

    function grafik_1C_blok1() {
        $("#grafik-1A_blok1").slideUp();
        $("#grafik-1B_blok1").slideUp();
        $("#grafik-2A_blok1").slideUp();
        $("#grafik-2B_blok1").slideUp();
        $("#grafik-2C_blok1").slideUp();
        $("#tabel_blok1").slideUp();
        $("#grafik-3A_blok1").slideUp();
        $("#grafik-3B_blok1").slideUp();
        $("#grafik-3C_blok1").slideUp();
        $("#grafik-1C_blok1").slideDown();
    }
</script>