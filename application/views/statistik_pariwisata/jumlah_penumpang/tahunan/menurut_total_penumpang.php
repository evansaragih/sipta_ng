<!-- Default box -->
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Pintu Masuk</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok3()">Menurut Total Penumpang</button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('SPT_JumlahPenumpang') ?>">Tahunan</a>
                    </div>
                </div>
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahPenumpang/cari_blok3") ?>">
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
                        <button type="button" class="btn btn-danger" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body total">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Jumlah Penumpang Menurut Pintu Masuk Penumpang <?php echo $tahun ?></p>
        <table id="total" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th style="text-align: center; vertical-align: middle; width: 10px;">Pintu Masuk</th>
                    <th style="text-align: center; vertical-align: middle; width: 10px;">Total Penumpang</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $total = 0; ?>
                <?php foreach ($data_penumpang as $dp) { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i; ?></td>
                        <td style="text-align: left;"><?= $dp['pintu_masuk'] ?></td>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $total += $dp['jumlah']; ?>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
                <td></td>
                <td>Total Penumpang</td>
                <td><?php echo number_format($total) ?></td>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik-4A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Lingkaran" onclick="grafik_4A_blok3()"><i class="fa fa-pie-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-4A_blok3-jpenumpang" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<!-- Tabel Grafik -->
<table id="grafik-data_penumpang-blok3" border="1" hidden>
    <thead>
        <tr>
            <th>Pintu Masuk</th>
            <th>Total Penumpang</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_penumpang as $dp) { ?>
            <tr>
                <td><?php echo $dp['pintu_masuk'] ?></td>
                <td><?php echo $dp['jumlah'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#total').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Data Jumlah Penumpang Menurut Kategori Tahun <?php echo $tahun ?> - SIPTA</h4>'
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
            .appendTo('.total .col-sm-6:eq(0)');
    });
</script>
<!-- Page script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>

<!-- Grafik -->
<script type="text/javascript">
    Highcharts.chart('grafik-4A_blok3-jpenumpang', {
        data: {
            table: 'grafik-data_penumpang-blok3'
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Perbandingan Jumlah Penumpang Internasional Menurut Pintu Masuk <br/>Tahun <?php echo $tahun ?></center></h4>'
        },
        // subtitle: {
        //     text: '3D donut in Highcharts'
        // },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true
                },
                innerSize: 100,
                depth: 75,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                }
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok3").slideDown();
        document.getElementById("grafik-4A_blok3").setAttribute("hidden", "hidden");
    });

    function tabel_blok3() {
        $("#grafik-4A_blok3").slideUp();
        $("#tabel_blok3").slideDown();
    }

    function grafik_4A_blok3() {
        $("#tabel_blok3").slideUp();
        $("#grafik-4A_blok3").slideDown();
    }
</script>