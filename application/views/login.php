<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="15x15" href="<?php echo base_url('assets/dist/img/logo-kecil.png')?>">
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

    <header class="main-header">
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

        <div class="row" style="margin-top: 30px;">
          <div class="col-md-8">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
                <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
                <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Dropdown <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                  </ul>
                </li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="<?php echo base_url('assets/dist/img/disparda.png') ?>" alt="First slide">

                        <div class="carousel-caption">
                          First Slide
                        </div>
                      </div>
                      <div class="item">
                        <img src="<?php echo base_url('assets/dist/img/disparda.png') ?>" alt="Second slide">

                        <div class="carousel-caption">
                          Second Slide
                        </div>
                      </div>
                      <div class="item">
                        <img src="<?php echo base_url('assets/dist/img/disparda.png') ?>" alt="Third slide">

                        <div class="carousel-caption">
                          Third Slide
                        </div>
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
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  The European languages are members of the same family. Their separate existence is a myth.
                  For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                  in their grammar, their pronunciation and their most common words. Everyone realizes why a
                  new common language would be desirable: one could refuse to pay expensive translators. To
                  achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                  words. If several languages coalesce, the grammar of the resulting language is more simple
                  and regular than that of the individual languages.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                  like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Custom Tabs (Pulled to the right) -->
            <center><img src="<?php echo base_url('assets/dist/img/logo-sipta.png') ?>" style="width: 300px; " alt="homepage" class="dark-logo" /></center>
            <div class="box box-default">
              <div class="box-header with-border">
                <center>
                  <h3 class="box-title" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Sign In</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url('Auth_admin/cek_login'); ?>">
                <div class="box-body ">
                  <!-- ALERT GAGAL LOGIN-->
                  <?php
                  if ($this->session->flashdata('info')) {
                    ?>
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fa fa-warning"></i> <?php echo $this->session->flashdata('info'); ?></h5>

                    </div>

                  <?php
                  }
                  ?>
                </div>
                <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="val_username" id="val_username" placeholder="Username">
                  </div>
                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="val_password" id="val_password" placeholder="Password">
                  </div>
                  <div class="form-group">
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                  <button type="submit" class="btn btn-primary pull-right">Sign in</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- nav-tabs-custom -->
            <div style="text-align: right; margin-top: 50px">
              <p>Jl.Raya Puputan (Renon) Denpasar 80226</p>
              <p>email: bps5100@bps.go.id,</p>
              <p>Telp +62 (361) 238159, 243696, 238162</p>
              <p>Fax: +62 (361) 238162</p>

            </div>
          </div>
          <!-- /.col -->
        </div>
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