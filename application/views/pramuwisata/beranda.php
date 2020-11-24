<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPTA - Pariwisata Provinsi Bali</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/my-skins.css') ?>">
    <link href="<?php echo base_url('assets/dist/css/sweetalert/sweetalert.css') ?>" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->

<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <?php $this->load->view('jumlah_penumpang/alert'); ?>
    <div class="wrapper">

        <?php include 'header.php' ?>

        <!-- =============================================== -->
        <?php include 'left-sidebar.php' ?>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Jumlah Pramuwisata Umum Aktif
                    <small>Berdasarkan Tahun</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Data Pariwisata</a></li>
                    <li class="active">Pramuwisata</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div id="kolom-data"></div>

                <div id="kolom-tambah_data"></div>

                <div id="kolom-edit_data" hidden="">
                    <div class="box box-danger">
                        <form class="form-valide" method="post" action="<?php echo base_url("Pramuwisata/updateData") ?>">
                            <div class="box-header">
                                <table border="0">
                                    <tr>
                                        <td class="col-xs-8">
                                            <h3 class="box-title" style="margin-left: -10px;">Info data</h3>
                                        </td>
                                        <td class="col-xs-2" style="object-position:right;">
                                            <div class="btn-group" style="float: right;">
                                                <button type="submit" class="btn bg-green btn-flat tombol-simpan"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                                <button type="button" class="btn bg-red btn-flat" onclick="back()"><i class="fa fa-fw fa-reply"></i>Kembali</button>
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
                                                <input type="text" class="form-control" id="language-edit" name="language-edit" disabled>
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
                                                    <input type="text" class="form-control" id="jlh_pramuwisata-edit" name="jlh_pramuwisata-edit" placeholder="Jumlah Restaurant">
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
                                                <input type="text" class="form-control" id="tahun-edit1" name="tahun-edit1" disabled>
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
                                                <input type="text" id="id_language-edit" name="id_language-edit" hidden>
                                                <input type="text" id="id_pramuwisata-edit" name="id_pramuwisata-edit" hidden>
                                                <input type="text" id="tahun-edit2" name="tahun-edit2" hidden>
                                                <input type="text" class="form-control" id="ket-edit" name="ket-edit" placeholder="keterangan (optional)">
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
                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'footer.php'; ?>

        <?php include 'right-sidebar.php'; ?>
        <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>

    <script src="<?php echo base_url('assets/dist/js/jquery.validate-init.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/sweetalert/sweetalert.min.js') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#kolom-data").load("<?php echo site_url(); ?>Pramuwisata/col_data");
        });

        function tambah() {
            $("#kolom-data").slideToggle();
            $("#kolom-tambah_data").load("<?php echo site_url(); ?>Pramuwisata/col_tambahData");
            $("#kolom-tambah_data").slideDown();
        }

        function kembali() {
            $("#kolom-tambah_data").slideToggle();
            $("#kolom-data").slideToggle();
        }

        function detail() {
            $("#kolom-data").slideToggle();
            document.getElementById("kolom-edit_data").removeAttribute("hidden");
        }

        function back() {
            document.getElementById("kolom-edit_data").setAttribute("hidden", "hidden");
            $("#kolom-data").slideToggle();
        }

        function reload() {
            $("#kolom-data").load("<?php echo site_url(); ?>Pramuwisata/col_data");
        }
    </script>
    <script type="text/javascript">
        // Delete button clicked
        $(document).on('click', '.update', function() {
            var row_id = $(this).attr("id");
            console.log(row_id);
            var language = $('#language-hidden' + row_id + '').val();
            var id_language = $('#id_language-hidden' + row_id + '').val();
            var tahun = $('#tahun-hidden' + row_id + '').val();
            var jlh_pramuwisata = $('#jlh_pramuwisata-hidden' + row_id + '').val();
            var keterangan = $('#ket-hidden' + row_id + '').val();
            var id_pramuwisata = $('#id_pramuwisata-hidden' + row_id + '').val();
            console.log(language);
            console.log(tahun);
            console.log(jlh_pramuwisata);
            console.log(keterangan);
            console.log(id_pramuwisata);
            $('#language-edit').val(language);
            $('#id_language-edit').val(id_language);
            $('#tahun-edit1').val(tahun);
            $('#tahun-edit2').val(tahun);
            $('#jlh_pramuwisata-edit').val(jlh_pramuwisata);
            $('#id_pramuwisata-edit').val(id_pramuwisata);
            $('#ket-edit').val(keterangan);
        });
    </script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

    <!-- Penjumlahan pada jumlah internasional dan Domestik -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".perhitungan").keyup(function() {
                var jlh_int = parseInt($("#jlh_int-edit").val());
                var jlh_dom = parseInt($("#jlh_dom-edit").val());

                var total = jlh_int + jlh_dom;
                $("#total-edit1").val(total);
                $("#total-edit2").val(total);
            });
        });
    </script>

    <!-- Page script -->
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
</body>

</html>