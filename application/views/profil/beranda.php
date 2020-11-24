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
    <?php $this->load->view('profil/alert'); ?>
    <div class="wrapper">
        <!-- =============================================== -->
        <?php $this->load->view('for_all/header.php'); ?>
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><i class="fa fa-fw fa-user"></i> Profil
                    <small>detail</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Profil</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-danger">
                    <form class="form-valide" method="post" action="<?php echo base_url("Profil/updateData") ?>">
                        <div class="box-header">
                            <table border="0">
                                <tr>
                                    <td class="col-xs-5">
                                        <h5 class="box-title" style="margin-left: -10px;"><i class="fa fa-fw fa-th-list"></i>Data Administrator</h5>
                                    </td>
                                    <td class="col-xs-2" style="object-position:right;">
                                        <div class="btn-group" style="float: right;">
                                            <button type="submit" class="btn bg-green btn-flat tombol-simpan"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                            <a type="button" class="btn bg-blue btn-flat" href="<?php base_url('Profil') ?>"><i class="fa fa-fw fa-refresh"></i>Perbaharui Data</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url() ?>assets/upload/<?= $data_admin->foto_profil ?>" class="img-thumbnail" alt="Foto Profil" width="300px">
                                    <div class="form-group">
                                        <br />
                                        <button type="button" class="btn btn-warning btn-flat tombol-editfoto" data-toggle="modal" data-target="#modal-editfoto">Upload Photo</button>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- form-group -->
                                            <div class="form-group">
                                                <label>NIP:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="nip-edit" name="nip-edit" placeholder="Nomor Induk Pegawai (NIP)" value="<?php echo $data_admin->nip; ?>">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <select class="form-control select2" id="gender-edit" name="gender-edit" style="width: 100%;" data-placeholder="Pilih Salah Satu">
                                                        <option value="">Pilih Salah Satu</option>
                                                        <?php
                                                        $gender = array('Laki-Laki', 'Perempuan');
                                                        foreach ($gender as $gd) {
                                                        ?>
                                                            <option value="<?php echo $gd ?>" <?= $data_admin->jenis_kelamin == $gd ? "selected" : null  ?>><?php echo $gd ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <!-- form-group -->
                                    <div class="form-group">
                                        <label>Nama Lengkap:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="nama-edit" name="nama-edit" placeholder="Nama Lengkap" value="<?php echo $data_admin->nama; ?>">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- form-group -->
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="username-edit" name="username-edit" placeholder="Username" value="<?php echo $data_admin->username; ?>">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <button type="button" class="btn bg-default btn-flat tombol-simpan" data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-edit"></i>Change Password</button>
                                    <!-- form-group -->
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                        </div>

                    </form>
                    <!-- /.box-body -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div>
            <form class="form-valide_password_profil" method="post" action="<?php echo base_url("Profil/updatePass") ?>">
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Change Password</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Password:</label>
                                            <div class="input-group">
                                                <input type="password" maxlength="15" class="form-control" id="password-add" name="password-add" placeholder="Current Password" required>
                                                <div class="input-group-addon">
                                                    <input type="checkbox" onclick="myFunction()">Show Password
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <div class="input-group">
                                                <input type="password" maxlength="15" class="form-control" id="password_new-add" name="password_new-add" placeholder="New Password maks. 12 karakter" required>
                                                <div class="input-group-addon">
                                                    <input type="checkbox" onclick="myFunction2()">Show Password
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <div class="input-group">
                                                <input type="password" maxlength="15" class="form-control" id="password_new_2-add" name="password_new_2-add" placeholder="New Password maks. 12 karakter" required>
                                                <div class="input-group-addon">
                                                    <input type="checkbox" onclick="myFunction3()">Show Password
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">YA</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.modal -->
            </form>
        </div>

        <form method="post" enctype='multipart/form-data' action="<?php echo base_url("Profil/updatePhoto") ?>">
            <div class="modal fade" id="modal-editfoto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Upload Photo</h4>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg" onchange="checkfile(this);" class="btn bg-default btn-flat" required>
                            <p class="help-block">Ekstensi file .png atau .jpeg</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">YA</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </form>

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

    <script src="<?php echo base_url('assets/dist/js/jquery.validate-admin.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/sweetalert/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/test.js') ?>"></script>

    <script type="text/javascript">
        function reload() {
            $("#kolom-data").load("<?php echo site_url(); ?>AkomodasiNG/col_data");
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("password-add");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("password_new-add");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction3() {
            var x = document.getElementById("password_new_2-add");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
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
            var website = $('#website-hidden' + row_id + '').val();
            var telp = $('#telp-hidden' + row_id + '').val();
            var fax = $('#fax-hidden' + row_id + '').val();
            var tahun = $('#tahun-hidden' + row_id + '').val();
            var keterangan = $('#ket-hidden' + row_id + '').val();
            var created_at = $('#created_at-hidden' + row_id + '').val();
            var created_by = $('#created_by-hidden' + row_id + '').val();
            var updated_at = $('#updated_at-hidden' + row_id + '').val();
            var updated_by = $('#updated_by-hidden' + row_id + '').val();
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
            console.log(keterangan);
            console.log(created_at);
            console.log(created_by);
            console.log(updated_at);
            console.log(updated_by);
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
            $('#website-edit').val(website);
            $('#no_telp-edit').val(telp);
            $('#fax-edit').val(fax);
            $('#ket-edit').val(keterangan);
            $('#tahun-edit').val(tahun);
            $('#updated_at-edit').html(updated_at);
            $('#updated_by-edit').html(updated_by);
            $('#created_at-edit').html(created_at);
            $('#created_by-edit').html(created_by);
        });
    </script>

    <script type="text/javascript">
        // Delete button clicked
        $(document).on('click', '.copy_data', function() {
            var kabupaten = $('#kabupaten-edit').val();
            var kat_akomodasi = $('#kat_akomodasi-edit').val();
            var nama_hotel = $('#nama_ako-edit').val();
            var nama_perusahaan = $('#nama_perusahaan-edit').val();
            var pemilik = $('#owner-edit').val();
            var alamat = $('#alamat-edit').val();
            var email = $('#email-edit').val();
            var website = $('#website-edit').val();
            var telp_hp = $('#no_telp-edit').val();
            var fax = $('#fax-edit').val();
            var tahun = $('#tahun-edit').val();
            var jlh_kamar = $('#jlh_kamar-edit').val();
            var keterangan = $('#ket-edit').val();
            var id_akomodasi = $('#id_akomodasi-edit').val();
            console.log(nama_hotel);
            console.log(nama_perusahaan);
            console.log(pemilik);
            $('#nama_ako2-paste').html(nama_hotel);
            $('#nama_ako-paste').val(nama_hotel);
            $('#owner-paste').val(pemilik);
            $('#nama_perusahaan-paste').val(nama_perusahaan);
            $('#alamat-paste').val(alamat);
            $('#email-paste').val(email);
            $('#website-paste').val(website);
            $('#no_telp-paste').val(telp_hp);
            $('#fax-paste').val(fax);
            $('#tahun2-paste').html(tahun);
            $('#jlh_kamar-paste').val(jlh_kamar);
            $('#ket-paste').val(keterangan);
            $('#kabupaten-paste').html(kabupaten);
            $('#id_akomodasi-paste').val(id_akomodasi);
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