<div class="box box-danger">
    <form method="post" id="import_form" enctype="multipart/form-data">
        <div class="box-header">
            <table border="0">
                <tr>
                    <td class="col-xs-8">
                        <h3 class="box-title" style="margin-left: -10px;">Info data</h3>
                    </td>
                    <td class="col-xs-2" style="object-position:right;">
                        <div class="btn-group" style="float: right;">
                            <button type="submit" id="import_ako" name="import" class="btn bg-green btn-flat tombol-simpan" disabled><i class="fa fa-fw fa-upload"></i>Import</button>
                            <button type="button" class="btn bg-red btn-flat" onclick="kembali()"><i class="fa fa-fw fa-reply"></i>Kembali</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="file" id="file" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" onchange="checkfile(this);" class="btn bg-orange btn-flat">
                        <p class="help-block">Ekstensi file .xls atau .xlsx</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="btn_cek" type="checkbox" required> Check to proceed
                        </label>
                    </div>

                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-5">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h4 id="akomodasi_data"></h4>
                            <p>Data yang telah tersimpan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('Bar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h4>Petunjuk Upload Data <br />Bar</h4>
                            <p>cara pengisian dilihat disini</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-download"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-default">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- untuk menampilkan tabel import -->
            <div class="table-responsive" id="akomodasi_data2">

            </div>
        </div>
    </form>
    <!-- /.box-body -->
</div>
<!-- box download table -->
<div class="box box-solid bg-green-gradient">
    <div class="box-header">
        <i class="fa fa-calendar"></i>
        <h3 class="box-title">Format File Upload Data Bar Tahun <?= date("Y") ?> </h3>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-black ekspor_format_file">
        <a href="#"><i class="fa fa-arrow-circle-down"></i> Silahkan download file excel di bawah ini</a>
        <table id="tbl_format_file" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px;">Kabupaten/Kota</th>
                    <th style="width: 30px;">Nama Bar</th>
                    <th style="width: 30px;">Tahun</th>
                    <th style="width: 30px;">Jenis Wisatawan</th>
                    <th style="width: 30px;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($format_excel as $dp) { ?>
                    <tr>
                        <td><?php echo $dp['kabupaten']; ?></td>
                        <td><?php echo $dp['nama']; ?></td>
                        <td><?php echo $dp['tahun']; ?></td>
                        <td><?php echo $dp['jenis_wisatawan']; ?></td>
                        <td>0</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- ./box download table -->

<script src="<?php echo base_url('assets/dist/js/jquery.validate-init.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/test2.js') ?>"></script>
<script>
    $(document).ready(function() {
        var table = $('#tbl_format_file').DataTable({
            'buttons': [{
                    extend: 'excelHtml5',
                    title: 'Data Bar Tahun <?= date("Y") ?> - SIPTA'
                }
                // {
                //     extend: 'print',
                //     title: '<h4>Data Jumlah Wisatawan Mancanegara - SIPTA</h4>'
                // }
            ],
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': true
        });

        table.buttons().container()
            .appendTo('.ekspor_format_file .col-sm-6:eq(0)');
    });
</script>
<script type="text/javascript" language="javascript">
    function checkfile(sender) {
        const fi = document.getElementById('file');
        const fsize = fi.files.item(0).size;
        const file = Math.round((fsize / 1024));
        var validExts = new Array(".xlsx", ".xls");
        var fileExt = sender.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (validExts.indexOf(fileExt) < 0) {
            document.getElementById("import_ako").setAttribute("disabled", "true");
            sweetAlert("Oops...", "Invalid file selected, valid files are of " +
                validExts.toString() + " types.", "error");
            $('#file').val('');
            // alert("Invalid file selected, valid files are of " +
            //     validExts.toString() + " types." + file + "");
            return false;
        } else if (file >= 2048) {
            document.getElementById("import_ako").setAttribute("disabled", "true");
            sweetAlert("Oops...", "File too Big, please select a file less than 2mb", "error");
            $('#file').val('');
            // alert("File too Big, please select a file less than 4mb");
            return false;
        } else {
            document.getElementById("import_ako").removeAttribute("disabled");
            return true;
        }
    }
</script>
<!-- Page script -->
<script>
    $(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>Upload_Bar/fetch",
                method: "POST",
                success: function(data) {
                    $('#akomodasi_data').html(data);
                }
            })
        }

        $('#import_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>Upload_Bar/import",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cahce: false,
                processData: false,
                success: function(data) {
                    $('#file').val('');
                    load_data();
                    swal("Hey, Good job !!", "Data Telah di Simpan", "success");
                    document.getElementById("import_ako").setAttribute("disabled", "true");
                    $('#btn_cek').prop('checked', false);
                    // alert(data);
                }
            })
        })
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