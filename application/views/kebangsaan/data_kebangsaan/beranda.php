<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="15x15" href="<?php echo base_url('assets/dist/img/logo-kecil.png') ?>">
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
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->

<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <?php $this->load->view('kebangsaan/data_kebangsaan/alert'); ?>
    <div class="wrapper">
        <!-- =============================================== -->
        <?php $this->load->view('for_all/header.php'); ?>
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Kebangsaan
                    <small>Berdasarkan Nama Kebangsaan</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Data Pariwisata</a></li>
                    <li class="active">Kebangsaan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div id="kolom-data"></div>

                <div id="kolom-tambah_data"></div>

                <div id="kolom-edit_data" hidden="">
                    <div class="box box-danger">
                        <form class="form-valide" method="post" action="<?php echo base_url('Kebangsaan/updateData') ?>">
                            <div class="box-header">
                                <table border="0">
                                    <tr>
                                        <td class="col-xs-5">
                                            <h3 class="box-title" style="margin-left: -10px;">Edit data</h3>
                                        </td>
                                        <td class="col-xs-2" style="object-position:right;">
                                            <div class="btn-group" style="float: right;">
                                                <button type="submit" class="btn bg-green btn-flat tombol-simpan"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                                <button type="button" class="btn bg-yellow btn-flat" style="float: right" onclick="back()"><i class="fa fa-fw fa-reply"></i>Kembali</button>
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
                                            <label>Kategori Kebangsaan:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <select class="form-control select2" id="id_grup-edit" name="id_grup-edit" style="width: 100%;" data-placeholder="Jika ingin mengganti kategori" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php foreach ($kabupaten as $a) { ?>
                                                        <option value="<?php echo $a['id']; ?>"><?php echo $a['grup']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kebangsaan:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control" type="text" id="kebangsaan-edit" name="kebangsaan-edit">
                                                <input type="text" id="id_kebangsaan-edit" name="id_kebangsaan-edit" hidden>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- /.col-md-4 -->
                                    </div>
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

        <!-- modal -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-valide_kebangsaan" method="POST" action="<?php echo base_url('Kebangsaan/insertData') ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Masukkan Data Jenis Kebangsaan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- fom group -->
                                    <div class="form-group">
                                        <label>Kategori Kebangsaan:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <select class="form-control select2" id="id_kabupaten-search" name="id_kabupaten-search" style="width: 100%;" data-placeholder="Pilih Salah Satu" required>
                                                <option value="" selected>Pilih Salah Satu</option>
                                                <?php foreach ($kabupaten as $a) { ?>
                                                    <option value="<?php echo $a['id']; ?>"><?php echo $a['grup']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <!-- fom group -->
                                    <div class="form-group">
                                        <label>Kebangsaan:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control" type="text" id="nama_ako-search" name="nama_ako-search" placeholder="Jenis Kebangsaan" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.col-md-4 -->
                                </div>
                                <div class="col-md-6">
                                    <img src="<?php echo base_url('assets/dist/img/disparda.png') ?>" alt="Third slide" width="100%" height="130px">
                                    <!-- fom group -->
                                    <div class="form-group">
                                        <label id="detail_data-search"></label>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success pull-left" id="tombol_tambah-search">Tambah Data</button>


                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-logout">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Keluar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <a href="<?php echo base_url('Auth_admin/logOut') ?>" type="submit" class="btn btn-primary">YA</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <?php $this->load->view('for_all/footer.php'); ?>
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
            $("#kolom-data").load("<?php echo site_url(); ?>Kebangsaan/col_data");
        });

        function detail() {
            $("#kolom-data").slideToggle();
            document.getElementById("kolom-edit_data").removeAttribute("hidden");
        }

        function back() {
            document.getElementById("kolom-edit_data").setAttribute("hidden", "hidden");
            $("#kolom-data").slideToggle();
        }

        function reload() {
            $("#kolom-data").load("<?php echo site_url(); ?>Kebangsaan/col_data");
        }
    </script>

    <script type="text/javascript">
        // Delete button clicked
        $(document).on('click', '.update', function() {
            var row_id = $(this).attr("id");
            console.log(row_id);
            var id_grup = $('#id_grup-hidden' + row_id + '').val();
            var id_kebangsaan = $('#id_kebangsaan-hidden' + row_id + '').val();
            var kebangsaan = $('#kebangsaan-hidden' + row_id + '').val();
            var grup = $('#grup-hidden' + row_id + '').val();
            // console.log(kabupaten);
            $('#id_grup-edit').val(id_grup);
            $('#id_kebangsaan-edit').val(id_kebangsaan);
            $('#kebangsaan-edit').val(kebangsaan);
            $('#grup').val(grup);
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