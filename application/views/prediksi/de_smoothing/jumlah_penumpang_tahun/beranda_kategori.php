<!DOCTYPE html>
<html>
<?php
$awal = microtime(true); ?>

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
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') ?>">
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
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border-top: 16px solid rgb(186, 0, 0);
            /*blue*/
            border-radius: 50%;
            border-left: 16px solid rgb(255, 255, 255);
            /*orange*/
            border-right: 16px solid rgb(255, 255, 255);
            border-bottom: 16px solid rgb(186, 0, 0);
            /*blue*/
            width: 120px;
            height: 120px;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 0.8s linear infinite;

        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #logo_loading {
            position: absolute;
            left: 50%;
            top: 49%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -35px 0 0 -45px;

        }

        #teks_loading {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 250px;
            height: 150px;
            margin: 30px 0 0 -140px;

        }
    </style>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->

<body class="hold-transition skin-blue fixed sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- =============================================== -->
        <?php $this->load->view('for_all/header.php'); ?>
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- GoogleTranslate -->
            <div id="google_translate_element2"></div>
            <!-- Akhir GoogleTranslate -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h4>Prediksi Double Exponential Smoothing
                    <small>Jumlah Penumpang ke Provinsi Bali</small>
                </h4>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Prediksi (Forecasting)</a></li>
                    <li class="active">Jumlah Penumpang</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Logo Loading -->
                <div id="loader"></div>
                <div id="logo_loading">
                    <img src="<?php echo base_url('assets/dist/img/logo-kecil.png') ?>" style="width: 50px; object-position: center;">
                </div>
                <div id="teks_loading">
                    <center>
                        <img src="<?php echo base_url('assets/dist/img/logo-sipta.png') ?>" style="width: 100px; margin-top: 25px; ">
                        <h4>Memuat Data ...</h4>
                    </center>
                </div>
                <!-- akhir Logo Loading -->
                <div id="kolom-menurut_blok1"></div>

                <div id="kolom-menurut_blok2"></div>

                <div id="kolom-menurut_blok3"></div>

                <div id="kolom-menurut_blok4"></div>

                <div id="kolom-menurut_blok5"></div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
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
    <!-- Language script -->
    <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <script src="<?php echo base_url('assets/dist/js/bahasa.js') ?>"></script>
    <!-- Language script -->

    <script type="text/javascript">
        var myVar;
        $(document).ready(function() {
            $("#kolom-menurut_blok1").load("<?php echo base_url('Prediksi_DES_T_Penumpang/hasil_cari_blok1/' . $id_pintu . '/' . $tahun); ?>");
            myVar = setTimeout(showPage, 900);
            // $('#konten').fadeIn(100);
        });

        function menurut_blok1() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            myVar = setTimeout(showPage, 800);
            $("#kolom-menurut_blok2").fadeOut(10);
            $("#kolom-menurut_blok3").fadeOut(10);
            $("#kolom-menurut_blok4").fadeOut(10);
            $("#kolom-menurut_blok5").fadeOut(10);
            $("#kolom-menurut_blok1").load("<?php echo site_url(); ?>Prediksi_DES_T_Penumpang/menurut_blok1");
            $("#kolom-menurut_blok1").slideDown(1000);
            // $('#konten').fadeIn(100);
        }

        function showPage() {
            $('#loader').fadeOut();
            $('#logo_loading').fadeOut();
            $('#teks_loading').fadeOut();
        }

        function menurut_blok2() {
            $("#kolom-menurut_blok1").fadeOut();
            $("#kolom-menurut_blok3").fadeOut();
            $("#kolom-menurut_blok4").fadeOut();
            $("#kolom-menurut_blok5").fadeOut();
            //document.getElementById("kolom-menurut_kategori").setAttribute("hidden", "hidden");
            $("#kolom-menurut_blok2").load("<?php echo site_url(); ?>Prediksi_DES_T_Penumpang/menurut_blok2");
            $("#kolom-menurut_blok2").slideDown();
        }

        function menurut_blok3() {
            $("#kolom-menurut_blok1").fadeOut();
            $("#kolom-menurut_blok2").fadeOut();
            $("#kolom-menurut_blok4").fadeOut();
            $("#kolom-menurut_blok5").fadeOut();
            //document.getElementById("kolom-menurut_kategori").setAttribute("hidden", "hidden");
            $("#kolom-menurut_blok3").load("<?php echo site_url(); ?>SPB_JumlahWisman/menurut_blok3");
            $("#kolom-menurut_blok3").slideDown();
        }

        function menurut_blok4() {
            $("#kolom-menurut_blok1").fadeOut();
            $("#kolom-menurut_blok2").fadeOut();
            $("#kolom-menurut_blok3").fadeOut();
            $("#kolom-menurut_blok5").fadeOut();
            $("#kolom-menurut_blok4").load("<?php echo site_url(); ?>SPB_JumlahWisman/menurut_blok4");
            $("#kolom-menurut_blok4").slideDown();
        }

        function menurut_blok5() {
            $("#kolom-menurut_blok1").fadeOut();
            $("#kolom-menurut_blok2").fadeOut();
            $("#kolom-menurut_blok3").fadeOut();
            $("#kolom-menurut_blok4").fadeOut();
            $("#kolom-menurut_blok5").load("<?php echo site_url(); ?>SPB_JumlahWisman/menurut_blok5");
            $("#kolom-menurut_blok5").slideDown();
        }
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

    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

</body>

</html>