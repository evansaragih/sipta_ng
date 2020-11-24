<div class="box box-danger">
    <form class="form-valide" method="post" action="<?php echo base_url("Pramuwisata/insertData") ?>">
        <div class="box-header">
            <table border="0">
                <tr>
                    <td class="col-xs-8">
                        <h3 class="box-title" style="margin-left: -10px;">Info data</h3>
                    </td>
                    <td class="col-xs-2" style="object-position:right;">
                        <div class="btn-group" style="float: right;">
                            <button type="submit" class="btn bg-green btn-flat tombol-simpan"><i class="fa fa-fw fa-save"></i>Simpan</button>
                            <button type="button" class="btn bg-red btn-flat" onclick="kembali()"><i class="fa fa-fw fa-reply"></i>Kembali</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- fom group -->
                    <div class="form-group">
                        <label>Specific Language:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <select class="form-control select2" id="specific_lang-add" name="specific_lang-add" style="width: 100%;" data-placeholder="Pilih Salah Satu">
                                <option value="" selected>Pilih Salah Satu</option>
                                <?php foreach ($data_pramuwisata_lang as $a) { ?>
                                    <option value="<?php echo $a['id_pramuwisata_lang']; ?>"><?php echo $a['language']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="perhitungan">
                        <div class="form-group">
                            <label>Jumlah:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="jlh_pramuwisata-add" name="jlh_pramuwisata-add" placeholder="Jumlah Pramuwisata">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.col-md-4 -->
                </div>
                <div class="col-md-4">
                    <!-- form-group -->
                    <div class="form-group">
                        <label>Tahun:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <select class="form-control select2" id="tahun-add" name="tahun-add" style="width: 100%;" data-placeholder="Pilih Salah Satu">
                                <option value="">Pilih Salah Satu</option>
                                <?php
                                $year_now = date('Y');
                                for ($x = $year_now; $x >= 2000; $x--) {
                                    ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="form-group">
                        <label>Keterangan:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="ket-add" name="ket-add" placeholder="keterangan (optional)">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>

    </form>
    <!-- /.box-body -->
</div>
<script src="<?php echo base_url('assets/dist/js/jquery.validate-init.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#blok1").slideDown();
    });
</script>
<!-- Penjumlahan pada jumlah internasional dan Domestik -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".perhitungan").keyup(function() {
            var jlh_int = parseInt($("#jlh_int-add").val());
            var jlh_dom = parseInt($("#jlh_dom-add").val());

            var total = jlh_int + jlh_dom;
            $("#total-add").val(total);
        });
    });
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('mm/yyyy', {
            'placeholder': 'mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>