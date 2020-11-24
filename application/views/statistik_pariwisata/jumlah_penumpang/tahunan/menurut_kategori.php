<!-- Default box -->
<div class="kotak-sp_jlh_penumpang box-default">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" onclick="menurut_blok1()">Menurut Kategori</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Pintu Masuk</button>
                        <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Total Penumpang</button>
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
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahPenumpang/cari_blok1") ?>">
                    <div class="col-md-3">
                        <select class="form-control select2" id="id_jenis_penumpang" name="id_jenis_penumpang" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <?php foreach ($option_penumpang as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?= $jenis == $a['id'] ? "selected" : null  ?>><?php echo $a['jenis_penumpang']; ?></option>
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

<div class="box box-solid" id="tabel_blok1">
    <div class="box-header with-border">
        <table border="0">
            <tr>
                <td class="col-xs-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger active" title="Tabel" onclick="tabel()"><i class="fa fa-table"></i></button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-body kategori">
        <!-- ini tabel -->
        <p class="box-title" style="text-align: center; font-size: 13pt;">Data Perbandingan Jumlah Penumpang Menurut Jenis Penumpang</p>
        <table id="kategori" class="table table-bordered table-striped" style="text-align: right">
            <thead>
                <tr style="background-color:#6e0006; color:white;">
                    <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                    <th style="text-align: center; vertical-align: middle; width: 10px;">Tahun</th>
                    <th style="text-align: center; vertical-align: middle;">Pintu Masuk</th>
                    <th style="text-align: center; vertical-align: middle;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data_kategori as $dp) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?php echo $dp['tahun'] ?></td>
                        <td><?php echo $dp['pintu_masuk'] ?></td>
                        <td><?php echo number_format($dp['jumlah']) ?></td>
                        <?php $i++; ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#kategori').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Jumlah Penumpang Menurut Kategori Tahun - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Data Jumlah Penumpang Menurut Kategori Tahun - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
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
    $(document).ready(function() {
        $("#tabel_blok1").slideDown();
    });

    function tabel() {
        $("#tabel_blok1").slideDown();
    }
</script>