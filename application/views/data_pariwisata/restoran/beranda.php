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
    <?php $this->load->view('data_pariwisata/restoran/alert'); ?>
    <div class="wrapper">
        <!-- =============================================== -->
        <?php $this->load->view('for_all/header.php'); ?>
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Restoran di Bali
                    <small>Berdasarkan Nama Restoran dan Kabupaten</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Data Pariwisata</a></li>
                    <li class="active">Restoran</li>
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
                <div id="kolom-data"></div>

                <div id="kolom-tambah_data"></div>

                <div id="kolom-edit_data" hidden="">
                    <div class="box box-danger">
                        <form class="form-valide" method="post" action="<?php echo base_url('Restoran/updateData') ?>">
                            <div class="box-header">
                                <table border="0">
                                    <tr>
                                        <td class="col-xs-5">
                                            <h3 class="box-title" style="margin-left: -10px;">Edit data</h3>
                                        </td>
                                        <td class="col-xs-2" style="object-position:right;">
                                            <div class="btn-group" style="float: right;">
                                                <button type="button" class="btn bg-red btn-flat" id="hapus" title="delete data" style="width: 50px; margin-right: 30px;" data-toggle="modal" data-target="#modal-delete">
                                                    <i class="fa fa-fw  fa-trash"></i>
                                                </button>
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
                                                <input type="text" id="id_kab-edit" name="id_kab-edit" hidden>
                                                <input class="form-control" type="text" id="kabupaten-edit" name="kabupaten-edit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="form-group">
                                            <label>Nama Restoran:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" id="id_restoran-edit" name="id_restoran-edit" hidden>
                                                <input class="form-control" type="text" id="nama_resto-edit" name="nama_resto-edit">
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
                                                <input class="form-control" type="text" id="alamat-edit" name="alamat-edit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Beroperasi Mulai:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control" type="text" id="beroperasi_mulai-edit" name="beroperasi_mulai-edit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- /.col-md-6 -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Tahun:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="tahun-edit" name="tahun-edit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Jenis Wisatawan:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" id="jenis_wisatawan-edit" name="jenis_wisatawan-edit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label>Jumlah Pengunjung:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="number" class="form-control" id="jlh_pengunjung-edit" name="jlh_pengunjung-edit" placeholder="jumlah pengunjung" required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
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

        <!-- modal -->
        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Data Jumlah Restoran Dihapus ?</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url('assets/dist/img/disparda.png') ?>" alt="Third slide" width="100%">
                    </div>
                    <div class="modal-footer">
                        <form class="form-valide" method="POST" action="<?php echo base_url('Restoran/deleteData2') ?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger pull-left">Hapus Data</button>
                            <input type="text" id="user_ids" name="user_ids" hidden>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_restoran_1.png') ?>" alt="First slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_restoran_2.png') ?>" alt="Second slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_restoran_3.png') ?>" alt="Third slide">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url('assets/dist/img/panduan/panduan_restoran_4.png') ?>" alt="Third slide">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#kolom-data").load("<?php echo base_url('Restoran/col_data/' . $tahun); ?>");
            $('#kolom-data').slideToggle();
            myVar = setTimeout(showPage, 2000);
            $('#kolom-data').slideToggle(1800);
            document.getElementById("kabupaten-edit").disabled = true;
            document.getElementById("nama_resto-edit").disabled = true;
            document.getElementById("alamat-edit").disabled = true;
            document.getElementById("beroperasi_mulai-edit").disabled = true;
            document.getElementById("jenis_wisatawan-edit").disabled = true;
            document.getElementById("tahun-edit").disabled = true;
        });

        function detail() {
            $("#kolom-data").slideToggle();
            document.getElementById("kolom-edit_data").removeAttribute("hidden");
        }

        function tambah() {
            $("#kolom-data").slideToggle();
            $("#kolom-tambah_data").load("<?php echo site_url(); ?>Restoran/col_tambahData");
            $("#kolom-tambah_data").slideDown();
        }

        function kembali() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            myVar = setTimeout(showPage, 2000);
            $("#kolom-tambah_data").fadeOut();
            $("#kolom-data").load("<?php echo base_url('Restoran/col_data/' . $tahun); ?>");
            $('#kolom-data').slideToggle();
            $("#kolom-tambah_data_excel").fadeOut();
        }

        function back() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            document.getElementById("kolom-edit_data").setAttribute("hidden", "hidden");
            $("#kolom-data").load("<?php echo base_url('Restoran/col_data/' . $tahun); ?>");
            myVar = setTimeout(showPage, 2000);
            $('#kolom-data').slideToggle();
        }

        function upload() {
            $("#kolom-tambah_data").fadeOut();
            $("#kolom-tambah_data_excel").load("<?php echo site_url(); ?>Restoran/col_tambahDataExcel");
            $("#kolom-tambah_data_excel").fadeIn();
        }

        function reload() {
            $('#loader').fadeIn();
            $('#logo_loading').fadeIn();
            $('#teks_loading').fadeIn();
            $("#kolom-data").load("<?php echo base_url('Restoran/col_data/' . $tahun); ?>");
            $('#kolom-data').slideToggle();
            myVar = setTimeout(showPage, 2000);
            $('#kolom-data').slideToggle();
        }

        function showPage() {
            $('#loader').fadeOut();
            $('#logo_loading').fadeOut();
            $('#teks_loading').fadeOut();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_kabupaten-search').on('change', function() {
                var id_kabupaten = $(this).val();
                if (id_kabupaten == '') {
                    $('#nama_ako-search').prop('disabled', true);
                } else {
                    $('#nama_ako-search').prop('disabled', false);
                    $('#tombol_tambah-search').prop('disabled', false);
                    $('#nama_ako-search').html('');
                    $.ajax({
                        url: "<?php echo base_url() ?>Restoran/getDataHotel_kota",
                        type: "POST",
                        data: {
                            'id_kabupaten': id_kabupaten
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#nama_ako-search').html(data);
                        },
                        error: function() {
                            alert('data kota/kabupaten tidak ada...');
                            $('#nama_ako-search').prop('disabled', true);
                            $('#tombol_tambah-search').prop('disabled', true);
                        }
                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nama_ako-search').on('change', function() {
                var id_restoran = $(this).val();
                if (id_restoran == '') {
                    $('#detail_data-search').prop('disabled', true);
                } else {
                    $('#detail_data-search').prop('disabled', false);
                    $.ajax({
                        url: "<?php echo base_url() ?>Restoran/getDataHotel_detail",
                        type: "POST",
                        data: {
                            'id_restoran': id_restoran
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#detail_data-search').html(data);
                        },
                        error: function() {
                            alert('data restoran tidak tersedia...');
                            $('#detail_data-search').html('');
                        }
                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        // Delete button clicked
        $(document).on('click', '.update', function() {
            var row_id = $(this).attr("id");
            console.log(row_id);
            var id_restoran = $('#id_restoran-hidden' + row_id + '').val();
            var kabupaten = $('#kab-hidden' + row_id + '').val();
            var nama_resto = $('#nama_resto-hidden' + row_id + '').val();
            var tahun = $('#tahun-hidden' + row_id + '').val();
            var alamat = $('#alamat-hidden' + row_id + '').val();
            var beroperasi_mulai = $('#beroperasi_mulai-hidden' + row_id + '').val();
            var jenis_wisatawan = $('#jenis_wisatawan-hidden' + row_id + '').val();
            var jlh_pengunjung = $('#jlh_pengunjung-hidden' + row_id + '').val();
            console.log(id_restoran);
            console.log(kabupaten);
            console.log(nama_resto);
            console.log(tahun);
            console.log(alamat);
            console.log(beroperasi_mulai);
            console.log(jenis_wisatawan);
            console.log(jlh_pengunjung);
            $('#id_restoran-edit').val(id_restoran);
            $('#kabupaten-edit').val(kabupaten);
            $('#nama_resto-edit').val(nama_resto);
            $('#tahun-edit').val(tahun);
            $('#alamat-edit').val(alamat);
            $('#beroperasi_mulai-edit').val(beroperasi_mulai);
            $('#jenis_wisatawan-edit').val(jenis_wisatawan);
            $('#jlh_pengunjung-edit').val(jlh_pengunjung);
            $('#user_ids').val(id_restoran);
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