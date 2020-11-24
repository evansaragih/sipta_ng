<!-- Default box -->
<div class="kotak-sp_akomodasi box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" onclick="menurut_kategori()">Menurut Kategori Akomodasi</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_wilayah()">Menurut Wilayah</button>
                        <button type="button" class="btn btn-danger active" onclick="menurut_waktu()">Menurut Waktu</button>
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
                <form method="post" id="akomodasi_kategori" action="<?php echo base_url("SP_Akomodasi/cari_waktu") ?>">
                    <div class="col-md-4">
                        <select class="form-control select2" id="id_kategori" name="id_kategori" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">

                            <?php foreach ($kategori as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $id_kat == $a['id'] ? "selected" : null  ?>><?php echo $a['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
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
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body waktu">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></p>
        <table id="waktu" class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Tahun</th>
                    <th colspan="3" style="text-align: center;">Akomodasi</th>
                </tr>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center;">Unit</th>
                    <th style="text-align: center;">Room</th>
                    <th style="text-align: center;">Tamu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($data_akomodasi as $dp) {
                ?>
                    <tr><?php $no++ ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dp['tahun']; ?></td>
                        <td><?php echo $dp['jlh_akomodasi']; ?></td>
                        <td><?php echo $dp['jlh_kamar']; ?></td>
                        <td><?php echo $dp['jlh_tamu']; ?></td>
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
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-1A_blok3-akomodasi" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
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
                        <!-- <button type="button" class="btn btn-danger" title="Grafik Batang Horizontal" onclick="grafik_batang_horizontal()"><i class="fa fa-align-left"></i></button> -->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body">
        <div id="grafik-2A_blok3-akomodasi" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    </div>
</div>

<table id="data_akomodasi-blok3" hidden>
    <thead>
        <tr>
            <th></th>
            <th>Unit</th>
            <th>Kamar</th>
            <th>Tamu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_akomodasi as $dp) { ?>
            <tr>
                <th><?php echo '' . $dp['tahun']; ?></th>
                <td><?php echo $dp['jlh_akomodasi']; ?></td>
                <td><?php echo $dp['jlh_kamar']; ?></td>
                <td><?php echo $dp['jlh_tamu']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        var table = $('#waktu').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'lengthChange': true
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
    Highcharts.chart('grafik-1A_blok3-akomodasi', {
        data: {
            table: 'data_akomodasi-blok3'
        },
        chart: {
            type: 'line'
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></center></h4>'
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
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    Highcharts.chart('grafik-2A_blok3-akomodasi', {
        data: {
            table: 'data_akomodasi-blok3'
        },
        chart: {
            type: 'bar',
            options3d: {
                enabled: false,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            }
        },
        title: {
            useHTML: true,
            text: '<h4><center>Grafik Akomodasi <?php echo $nama_kategori->kategori ?> Kota/Kabupaten <?php echo $nama_kabupaten->kabupaten ?></center></h4>'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah'
            }
        },
        xAxis: {
            title: {
                text: 'Tahun'
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
                return '<b>' + this.point.x + '</b><br/>' +
                    this.point.y + ' ' + this.series.name;
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabel_blok3").slideDown();
        document.getElementById("grafik-1A_blok3").setAttribute("hidden", "hidden");
        document.getElementById("grafik-2A_blok3").setAttribute("hidden", "hidden");
    });

    function grafik_1A_blok3() {
        $("#grafik-2A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-1A_blok3").slideDown();
    }

    function tabel_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#grafik-2A_blok3").slideUp();
        $("#tabel_blok3").slideDown();
    }

    function grafik_2A_blok3() {
        $("#grafik-1A_blok3").slideUp();
        $("#tabel_blok3").slideUp();
        $("#grafik-2A_blok3").slideDown();
    }
</script>