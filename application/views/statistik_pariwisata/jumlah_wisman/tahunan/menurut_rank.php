<!-- Default box -->
<div id="konten">
    <div class="kotak-sp_jlh_wisman box-default">
        <div class="box-header with-border">
            <table border="0">
                <tr>
                    <td class="col-xs-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" onclick="menurut_blok1()">Menurut Kategori</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok2()">Menurut Growth</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok3()">Menurut Kebangsaan</button>
                            <button type="button" class="btn btn-danger" onclick="menurut_blok4()">Menurut Waktu</button>
                            <button type="button" class="btn btn-danger active" onclick="menurut_blok5()">Menurut Rank</button>
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
                            <a type="button" class="btn btn-success" href="<?php echo base_url('SPB_JumlahWisman') ?>">Bulanan</a>
                            <a type="button" class="btn btn-success active" href="<?php echo base_url('SPT_JumlahWisman') ?>">Tahunan</a>
                        </div>
                    </div>
                    <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("SPT_JumlahWisman/cari_blok5") ?>">
                        <div class="col-md-3">
                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                <?php
                                $year_now = date('Y');
                                // $year_search = $year_now - 1;
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

    <div class="box box-solid" id="tabel_blok5">
        <div class="box-header with-border">
            <center>
                <p class="box-title" style="text-align: center; font-size: 13pt;">Kedatangan Wisatawan Mancanegara Menurut Ranking Tahun <?php echo $tahun ?></p>
            </center>
        </div>
        <div class="box-body blok5">
            <!-- ini tabel -->
            <table id="blok5" class="table table-bordered table-striped" style="text-align: right">
                <thead>
                    <tr style="background-color:#6e0006; color:white;">
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Rank</th>
                        <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;">Kebangsaan</th>
                        <th rowspan="1" style="text-align: center; vertical-align: middle; width: 10px;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total1 = 0;
                    $rank = 1; ?>
                    <?php function format_ribuan($nilai)
                    {
                        return number_format($nilai, 0, ',', ',');
                    } ?>
                    <?php foreach ($rank_tahun as $dp) { ?>
                        <tr>

                            <td style="text-align: left;">Rank <?php echo $rank ?></td>
                            <td><?php echo $dp['kebangsaan'] ?></td>
                            <td><?php echo format_ribuan($dp['jumlah']) ?></td>
                            <?php $total1 += $dp['jumlah'];
                            $rank++; ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td style="text-align: left;">Total</td>
                        <td></td>
                        <td><?php echo format_ribuan($total1) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        var table = $('#blok5').DataTable({
            'buttons': [{
                    extend: 'csvHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Ranking Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Ranking Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Kedatangan Wisatawan Mancanegara Menurut Ranking Tahun <?php echo $tahun ?> - SIPTA'
                },
                {
                    extend: 'print',
                    title: '<h4>Kedatangan Wisatawan Mancanegara Menurut Ranking Tahun <?php echo $tahun ?> - SIPTA</h4>'
                }
                // {
                //   extend: 'colvis',
                //   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
                // }
            ],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        });

        table.buttons().container()
            .appendTo('.blok5 .col-sm-6:eq(0)');
    });
</script>
<!-- Page script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>