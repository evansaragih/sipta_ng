<!-- Default box -->
<div class="kotak-sp_bar box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Bar</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok3()">Menurut Waktu</button>
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
                <form method="post" id="akomodasi_kategori" action="<?php echo base_url("SP_Bar/cari_waktu") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_jenis_wisatawan" name="id_jenis_wisatawan" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($jenis_wisman as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_jenis == $a['id'] ? "selected" : null  ?>><?php echo $a['jenis_wisatawan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($kabupaten as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_kab == $a['id'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                            <?php } ?>
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
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body blok3">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?></p>
        <table id="blok3" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Tahun</th>
                    <th colspan="2" style="text-align: center;">Bar</th>
                </tr>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center;">Unit</th>
                    <th style="text-align: center;">Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($data_objek_wisata as $dp) {
                ?>
                    <tr><?php $no++ ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dp['tahun']; ?></td>
                        <td><?php echo number_format($dp['jumlah_unit']); ?></td>
                        <td><?php echo number_format($dp['jumlah_pengunjung']); ?></td>
                    </tr>
                <?php } ?>
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
                        <button type="button" class="btn btn-danger active" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Batang" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok3-objek_wisata" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<div class="box box-solid" id="grafik-2A_blok3">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" title="Tabel" onclick="tabel_blok3()"><i class="fa fa-table"></i></button>
                        <button type="button" class="btn btn-danger" title="Grafik Garis" onclick="grafik_1A_blok3()"><i class="fa fa-line-chart"></i></button>
                        <button type="button" class="btn btn-danger active" title="Grafik Batang" onclick="grafik_2A_blok3()"><i class="fa fa-bar-chart"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok3-objek_wisata" style="max-width: 1280px; height: 1000px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_objek_wisata-blok3" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Bar</th>
            <th>Pengunjung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_objek_wisata as $dp) { ?>
            <tr>
                <th><?php echo '' . $dp['tahun']; ?></th>
                <td><?php echo $dp['jumlah_unit']; ?></td>
                <td><?php echo $dp['jumlah_pengunjung']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        var table = $('#blok3').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'lengthChange': true
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
    Highcharts.chart('grafik-1A_blok3-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok3'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?></center></h4>'
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
                return '<b>Tahun ' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok3-objek_wisata', {
        data: {
            table: 'data_objek_wisata-blok3'
        },
        chart: {
            type: 'bar',
            inverted: true
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Pengunjung <?= $jenis_wisatawan->jenis_wisatawan ?> pada Bar area <?= $nama_kabupaten->kabupaten ?> </center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>Tahun ' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok3").slideDown();
        document.getElementById("grafik-2A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-1A_blok3").setAttribute("hidden", "hidden");
    });

    function tabel_blok3() {
        $("#grafik-2A_blok3").slideUp();
        $("#grafik-1A_blok3").slideUp();
        $("#tabel_blok3").slideDown();
    }

    function grafik_1A_blok3() {
        $("#grafik-2A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-1A_blok3").slideDown();
    }

    function grafik_2A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-2A_blok3").slideDown();
    }
</script>