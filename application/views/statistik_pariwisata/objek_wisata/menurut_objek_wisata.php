<!-- Default box -->
<div class="kotak-sp_objek_wisata box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Objek Wisata</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Waktu</button>
                    </div>
                </td>
                <td class="col-xs-1">
                    <img src="<?php echo base_url("assets/dist/img/logo-sipta2.png") ?>" style="width: 100px;" alt="homepage" class="dark-logo" />
                </td>
            </tr>
        </table>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="callout callout-picture">
            <div class="row">
                <form method="post" id="akomodasi_kategori" action="<?php echo base_url("SP_ObjekWisata/cari_objek_wisata") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_jenis_wisatawan" name="id_jenis_wisatawan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($jenis_wisman as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_jenis == $a['id'] ? "selected" : null  ?>><?php echo $a['jenis_wisatawan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <option value="">Semua Kota/Kabupaten</option>
                            <?php foreach ($kabupaten as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_kab == $a['id'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php
                            $year_now = date('Y');
                            $year_search = $year_now;
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
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel_blok1()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body blok1">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></p>
        <table id="blok1" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="1" style="text-align: center; vertical-align: middle;">Objek Wisata</th>
                    <th style="text-align: center;">Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                $jlh_pengunjung = 0; ?>
                <?php foreach ($data_objek_wisata as $dp) {
                ?>
                    <tr><?php $no++ ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dp['nama']; ?></td>
                        <td><?php echo number_format($dp['jumlah']);
                            $jlh_pengunjung += $dp['jumlah']; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td colspan="1" style="text-align: center;">Total Pengunjung</td>
                    <td><?php echo number_format($jlh_pengunjung) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box box-solid" id="grafik_1A_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok1()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang Vertikal" onclick="grafik_1A_blok1()"><i class="fa fa-bar-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-objek_wisata_blok1" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_objek_wisata_blok1" hidden>
    <thead>
        <tr>
            <th>Objek Wisata</th>
            <?php foreach ($data_objek_wisata as $dp) { ?>
                <th><?php echo $dp['nama']; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Pengunjung</td>
            <?php foreach ($data_objek_wisata as $dp) { ?>
                <td><?php echo $dp['jumlah']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        var table = $('#blok1').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
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
    Highcharts.chart('grafik-objek_wisata_blok1', {
        data: {
            table: 'data_objek_wisata_blok1'
        },
        chart: {
            type: 'column'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> di Objek Wisata area <?= $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></center></h4>'
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
                    this.point.y + ' ' + this.point.name.toUpperCase();
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok1").slideDown();
        document.getElementById("grafik_1A_blok1").setAttribute("hidden", "hidden");
    });

    function tabel_blok1() {
        $("#grafik_1A_blok1").slideUp();
        $("#tabel_blok1").slideDown();
    }

    function grafik_1A_blok1() {
        $("#tabel_blok1").slideUp();
        $("#grafik_1A_blok1").slideDown();
    }
</script>