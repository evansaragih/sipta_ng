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
    <?php $this->load->view('data_pariwisata/akomodasi/alert'); ?>
    <div class="wrapper">
        <!-- =============================================== -->
        <?php $this->load->view('for_all/header.php'); ?>
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Akomodasi di Bali
                    <small>Berdasarkan Nama Akomodasi/Perusahaan/Pemilik</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Data Pariwisata</a></li>
                    <li class="active">Akomodasi</li>
                </ol>
            </section>
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
            <!-- Main content -->
            <section class="content">
                <div id="kolom-data"></div>

                <div id="kolom-tambah_data"></div>

                <div id="kolom-edit_data" hidden="">
                    <div class="box box-danger">
                        <form class="form-valide" method="post" action="<?php echo base_url('AkomodasiNG/updateData') ?>">
                            <div class="box-header">
                                <table border="0">
                                    <tr>
                                        <td class="col-xs-8">
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
                                    <div class="col-md-6">
                                        <!-- fom group -->
                                        <div class="form-group">
                                            <label>Kabupaten/Kota:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="kabupaten-edit" name="kabupaten-edit" placeholder="Nama Akomodasi">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kategori Akomodasi:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="kat_akomodasi-edit" name="kat_akomodasi-edit" placeholder="Nama Akomodasi">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tahun:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="tahun-edit" name="tahun-edit" placeholder="Tidak Tersedia">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                        <!-- /.form group -->

                                        <div class="form-group">
                                            <label>Nama Akomodasi:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" id="id_akomodasi-edit" name="id_akomodasi-edit" hidden>
                                                <input type="text" class="form-control" id="nama_ako-edit" name="nama_ako-edit" placeholder="Nama Akomodasi">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Nama Perusahaan (Nama Pemilik):</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="nama_perusahaan-edit" name="nama_perusahaan-edit" placeholder="Nama Perusahaan/Pemilik/Owner">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Nama Pimpinan/GM:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="owner-edit" name="owner-edit" placeholder="Nama Pimpinan/GM">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Alamat:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="alamat-edit" name="alamat-edit" placeholder="Alamat">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- /.col-md-6 -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- form-group -->
                                                <div class="form-group">
                                                    <label>Jumlah Kamar:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="jlh_kamar-edit" name="jlh_kamar-edit" placeholder="jumlah kamar">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Tamu:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="jlh_tamu-edit" name="jlh_tamu-edit" placeholder="jumlah tamu">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>E-Mail:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="email" class="form-control" id="email-edit" name="email-edit" placeholder="Alamat Email (optional)">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Website:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="website-edit" name="website-edit" placeholder="Url Website (optional)">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>No.Telp/HP</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="no_telp-edit" name="no_telp-edit" placeholder="No.Telepon/HP (optional)">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>FAX:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="fax-edit" name="fax-edit" placeholder="No.FAX (optional)">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                </div>
                            </div>

                        </form>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div id="kolom-tambah_data_excel"></div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Syarat dan Ketentuan</h4>
                    </div>
                    <div class="modal-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_akomodasi_1.png') ?>" alt="First slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_akomodasi_2.png') ?>" alt="Second slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_akomodasi_3.png') ?>" alt="Third slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_perhatian_1.png') ?>" alt="Forth slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_perhatian_2.png') ?>" alt="Fifth slide">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                    </div>
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
    <script src="<?php echo base_url('assets/dist/js/test.js') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#kolom-data").load("<?php echo base_url('AkomodasiNG/col_data/' . $tahun); ?>");
            $('#kolom-data').slideToggle();
            myVar = setTimeout(showPage, 2000);
            $('#kolom-data').slideToggle(800);
            document.getElementById("kabupaten-edit").disabled = true;
            document.getElementById("kat_akomodasi-edit").disabled = true;
            document.getElementById("tahun-edit").disabled = true;
            document.getElementById("nama_ako-edit").disabled = true;
            document.getElementById("nama_perusahaan-edit").disabled = true;
            document.getElementById("owner-edit").disabled = true;
            document.getElementById("alamat-edit").disabled = true;
            document.getElementById("email-edit").disabled = true;
            document.getElementById("website-edit").disabled = true;
            document.getElementById("no_telp-edit").disabled = true;
            document.getElementById("fax-edit").disabled = true;
        });

        function tambah() {
            $("#kolom-data").slideToggle();
            $("#kolom-tambah_data").load("<?php echo site_url(); ?>AkomodasiNG/col_tambahData");
            $("#kolom-tambah_data").slideDown();
            document.getElementById("kolom-paste_data").setAttribute("hidden", "hidden");
        }

        function detail() {
            $("#kolom-data").slideToggle();
            document.getElementById("kolom-edit_data").removeAttribute("hidden");
            // document.getElementById("hasil").innerHTML = dibuat_oleh;
        }

        function upload() {
            $("#kolom-tambah_data").fadeOut();
            $("#kolom-tambah_data_excel").load("<?php echo site_url(); ?>AkomodasiNG/col_tambahDataExcel");
            $("#kolom-tambah_data_excel").fadeIn();
        }

        function back() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            document.getElementById("kolom-edit_data").setAttribute("hidden", "hidden");
            $("#kolom-data").load("<?php echo base_url('AkomodasiNG/col_data/' . $tahun); ?>");
            myVar = setTimeout(showPage, 1000);
            $('#kolom-data').slideToggle(180);
        }

        function kembali() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            $("#kolom-tambah_data").fadeOut();
            $("#kolom-tambah_data_excel").fadeOut();
            $("#kolom-data").load("<?php echo base_url('AkomodasiNG/col_data/' . $tahun); ?>");
            myVar = setTimeout(showPage, 1000);
            $('#kolom-data').slideToggle(180);
        }

        function reload() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            $("#kolom-data").load("<?php echo base_url('AkomodasiNG/col_data/' . $tahun); ?>");
            $('#kolom-data').slideToggle();
            myVar = setTimeout(showPage, 200);
            $('#kolom-data').slideToggle(180);
        }

        function showPage() {
            $('#loader').fadeOut();
            $('#logo_loading').fadeOut();
            $('#teks_loading').fadeOut();
        }
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

    <script type="text/javascript">
        // Delete button clicked
        $(document).on('click', '.update', function() {
            var row_id = $(this).attr("id");
            var id_akomodasi = $('#id_ako-hidden' + row_id + '').val();
            var kabupaten = $('#kab-hidden' + row_id + '').val();
            var kat_akomodasi = $('#kat_akomodasi-hidden' + row_id + '').val();
            var kelas_bintang = $('#kelas_bintang-hidden' + row_id + '').val();
            var nama_hotel = $('#akomodasi-hidden' + row_id + '').val();
            var nama_perusahaan = $('#nama_perusahaan-hidden' + row_id + '').val();
            var nama_pimpinan = $('#nama_pimpinan-hidden' + row_id + '').val();
            var alamat = $('#alamat-hidden' + row_id + '').val();
            var email = $('#email-hidden' + row_id + '').val();
            var jlh_kamar = $('#jlh_kamar-hidden' + row_id + '').val();
            var jlh_tamu = $('#jlh_tamu-hidden' + row_id + '').val();
            var website = $('#website-hidden' + row_id + '').val();
            var telp = $('#telp-hidden' + row_id + '').val();
            var fax = $('#fax-hidden' + row_id + '').val();
            var tahun = $('#tahun-hidden' + row_id + '').val();
            console.log(row_id);
            console.log(id_akomodasi);
            console.log(kabupaten);
            console.log(kat_akomodasi);
            console.log(kelas_bintang);
            console.log(nama_hotel);
            console.log(nama_perusahaan);
            console.log(nama_pimpinan);
            console.log(alamat);
            console.log(email);
            console.log(website);
            console.log(telp);
            console.log(fax);
            $('#id_akomodasi-edit').val(id_akomodasi);
            $('#kabupaten-edit').val(kabupaten);
            $('#kat_akomodasi-edit').val(kat_akomodasi);
            $('#kelas_bintang-edit').val(kelas_bintang);
            $('#nama_ako-edit').val(nama_hotel);
            $('#nama_perusahaan-edit').val(nama_perusahaan);
            $('#owner-edit').val(nama_pimpinan);
            $('#alamat-edit').val(alamat);
            $('#email-edit').val(email);
            $('#jlh_kamar-edit').val(jlh_kamar);
            $('#jlh_tamu-edit').val(jlh_tamu);
            $('#website-edit').val(website);
            $('#no_telp-edit').val(telp);
            $('#fax-edit').val(fax);
            $('#tahun-edit').val(tahun);
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
</body>

</html>