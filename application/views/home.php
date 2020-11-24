<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="15x15" href="<?php echo base_url('assets/dist/img/logo-kecil.png') ?>">
  <title>SIPTA Sistem Informasi Pantau Pariwisata Authentication</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/login.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/my-skins.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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

  <style>
    .gambar_1 a {
      float: center;
      display: block;
      width: 200px;
      height: 180px;
      background: transparent url("<?php echo base_url('assets/dist/img/icon6.png') ?>") 0 0 no-repeat;
    }

    .gambar_1 a:hover {
      border-bottom: none;
      outline: none;
      background: transparent url("<?php echo base_url('assets/dist/img/icon5.png') ?>") 0 0 no-repeat;
    }

    .gambar_2 a {
      float: center;
      display: block;
      width: 200px;
      height: 180px;
      background: transparent url("<?php echo base_url('assets/dist/img/icon8.png') ?>") 0 0 no-repeat;
    }

    .gambar_2 a:hover {
      border-bottom: none;
      outline: none;
      background: transparent url("<?php echo base_url('assets/dist/img/icon7.png') ?>") 0 0 no-repeat;
    }

    .gambar_3 a {
      float: center;
      display: block;
      width: 200px;
      height: 180px;
      background: transparent url("<?php echo base_url('assets/dist/img/icon3.png') ?>") 0 0 no-repeat;
    }

    .gambar_3 a:hover {
      border-bottom: none;
      outline: none;
      background: transparent url("<?php echo base_url('assets/dist/img/icon4.png') ?>") 0 0 no-repeat;
    }

    .gambar_4 a {
      float: center;
      display: block;
      width: 200px;
      height: 180px;
      background: transparent url("<?php echo base_url('assets/dist/img/icon10.png') ?>") 0 0 no-repeat;
    }

    .gambar_4 a:hover {
      border-bottom: none;
      outline: none;
      background: transparent url("<?php echo base_url('assets/dist/img/icon9.png') ?>") 0 0 no-repeat;
    }

    .gambar_5 a {
      float: center;
      display: block;
      width: 200px;
      height: 180px;
      background: transparent url("<?php echo base_url('assets/dist/img/icon3.png') ?>") 0 0 no-repeat;
    }

    .gambar_5 a:hover {
      border-bottom: none;
      outline: none;
      background: transparent url("<?php echo base_url('assets/dist/img/icon4.png') ?>") 0 0 no-repeat;
    }

    .lingkaran1 {
      width: 200px;
      height: 200px;
      background: #dac52c;
      border-radius: 100%;
    }
  </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav" onload="MyLoading()">
  <!-- Logo Loading -->
  <div id="loader"></div>
  <div id="logo_loading">
    <img src="<?php echo base_url('assets/dist/img/logo-kecil.png') ?>" style="width: 50px; object-position: center;">
  </div>
  <div id="teks_loading">
    <center><img src="<?php echo base_url('assets/dist/img/logo-sipta.png') ?>" style="width: 100px; margin-top: 25px; "></center>
  </div>
  <!-- akhir Logo Loading -->
  <div id="konten" class="wrapper" style="display: none;">

    <header class="fixed main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="../../index2.html" class="navbar-brand"><img src="<?php echo base_url('assets/dist/img/header-logo.png') ?>" style="width: 280px;" alt="homepage" class="dark-logo" /></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
        </div>
        <!-- /.container-fluid -->
      </nav>
      <nav class="navbar1 navbar-static-top">
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <!-- <h2 class="page-header">TESTING NIRU IMISSU</h2> -->

        <section class="content">

          <div class="row">
            <div class="col-md-4">

              <!-- Profile Image -->
              <div class="box box-danger">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/upload/<?= $this->session->userdata('foto_profil') ?>" alt="User profile picture" style="width: 150px">

                  <h3 class="profile-username text-center">Tentang Saya</h3>

                  <p class="text-muted text-center" hidden>198808072014041001</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>NIP</b> <a class="pull-right"><?php echo $this->session->userdata('nip'); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nama</b> <a class="pull-right"><?php echo $this->session->userdata('nama'); ?></a>
                    </li>
                  </ul>
                  <div class="row">
                    <div class="col-md-6">
                      <a href="<?php echo base_url('Profil') ?>" class="btn btn-default btn-block"><b>Edit</b></a>
                    </div>
                    <div class="col-md-6">
                      <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-default"><b>Log Out</b></a>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <div class="modal fade" id="modal-default">
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

              <!-- About Me Box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Support By</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <img src="<?php echo base_url('assets/dist/img/logo-kemenpar.png') ?>" style="width: 150px;">
                  <img src="<?php echo base_url('assets/dist/img/logo-disparda.png') ?>" style="width: 80px; margin-left:20px;">
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <!-- Block buttons -->
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
                      <center>
                        <div class="gambar_1">
                          <a href="<?php echo base_url('Dashboard') ?>"></a><br />
                        </div>
                        <h5 style="text-align: center">Dashboard</h5>
                      </center>
                    </div>
                    <div class="col-md-4">
                      <center>
                        <div class="gambar_2">
                          <a href="<?php echo base_url('JumlahPenumpang') ?>"></a><br />
                        </div>
                      </center>
                      <h5 style="text-align: center">Data Pariwisata</h5>
                    </div>
                    <div class="col-md-4">
                      <center>
                        <div class="gambar_3">
                          <a href="<?php echo base_url('SP_Akomodasi') ?>"></a><br />
                        </div>
                        <h5 style="text-align: center">Statistik Pariwisata</h5>
                      </center>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <center>
                        <div class="gambar_4">
                          <a href="<?php echo base_url('Prediksi_Akomodasi') ?>"></a><br />
                        </div>
                      </center>
                      <h5 style="text-align: center">Prediksi (Forecasting)</h5>
                    </div>
                    <?php if ($this->session->userdata('type') != 'pegawai') { ?>
                      <div class="col-md-4">
                        <center>
                          <div class="gambar_5">
                            <a href="<?php echo base_url('Admin') ?>"></a><br />
                          </div>
                        </center>
                        <h5 style="text-align: center">Administrator</h5>
                      </div>
                    <?php } else { ?>

                    <?php } ?>
                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
  <script>
    var myVar;

    function MyLoading() {
      myVar = setTimeout(showPage, 800);
      $('#konten').fadeIn(1800);

    }

    function showPage() {
      $('#loader').fadeOut();
      $('#logo_loading').fadeOut();
      $('#teks_loading').fadeOut();
      // document.getElementById("loader").style.display = "none";
      // document.getElementById("konten").style.display = "block";
      // document.getElementById("logo_loading").style.display = "none";
      // document.getElementById("teks_loading").style.display = "none";
    }
  </script>
</body>

</html>