<!DOCTYPE html>
<html>
<!-- <?php
        // header("Cache-Control: private, max-age=10800, pre-check=10800");
        // header("Pragma: private");
        // header("Expires: " . date(DATE_RFC822, strtotime("+1 day")));
        ?> -->

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
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/my-skins.css') ?>">
    <link href="<?php echo base_url('assets/dist/css/sweetalert/sweetalert.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dist/css/font_poppins.css') ?>" rel="stylesheet">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->

<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php $this->load->view('for_all/header.php'); ?>

        <!-- =============================================== -->
        <?php $this->load->view('for_all/left-sidebar.php'); ?>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- GoogleTranslate -->
            <div id="google_translate_element2"></div>
            <!-- Akhir GoogleTranslate -->
            <header class="header header--bg">
                <div class="container">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h2 class="judul_1">
                            #Kunjungi<b style="color: #f56954;">Bali</b></h2>
                        <h2 class="judul_2">Statistik
                            <text style="color: #f56954;">Pariwisata Provinsi Bali</text><br />langsung di genggaman tangan anda.</h2>
                        <h4 class="judul_3">lihat, pahami, mengerti</h4>
                    </section>
                </div>
                <!-- /.container -->
            </header>
            <header class="header--bg2">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-xs-12">
                            <h2 style="color: white; font-weight: bold;">Provinsi Bali</h2>
                            <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p><b>Restoran</b>
                                        <p>Pengunjung Nusantara</p>
                                        <p style="font-size: 18pt; font-weight: bold;">
                                            <?php echo number_format($box1a->jlh_restoran) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box1aa->jlh_restoran) != 0) {
                                                    $perc_restoran = (((($box1a->jlh_restoran) - ($box1aa->jlh_restoran)) / $box1aa->jlh_restoran) * 100);
                                                } else {
                                                    $perc_restoran = 0;
                                                } ?>
                                                <?php if ($perc_restoran > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_restoran, 2) ?>%</span>
                                                <?php } else if ($perc_restoran == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_restoran, 2) ?>%</span>
                                                <?php } else if ($perc_restoran < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_restoran, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p><br />
                                    <p>Pengunjung Mancanegara
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box1b->jlh_pengunjung) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box1bb->jlh_pengunjung) != 0) {
                                                    $perc_kursi = (((($box1b->jlh_pengunjung) - ($box1bb->jlh_pengunjung)) / $box1bb->jlh_pengunjung) * 100);
                                                } else {
                                                    $perc_kursi = 0;
                                                } ?>
                                                <?php if ($perc_kursi > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_kursi, 2) ?>%</span>
                                                <?php } else if ($perc_kursi == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_kursi, 2) ?>%</span>
                                                <?php } else if ($perc_kursi < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_kursi, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p><b>Akomodasi</b>
                                        <p>Tamu</p>
                                        <p style="font-size: 18pt; font-weight: bold;">
                                            <?php echo number_format($box2a->jlh_tamu) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box2aa->jlh_tamu) != 0) {
                                                    $perc_akomodasi = (((($box2a->jlh_tamu) - ($box2aa->jlh_tamu)) / $box2aa->jlh_tamu) * 100);
                                                } else {
                                                    $perc_akomodasi = 0;
                                                } ?>
                                                <?php if ($perc_akomodasi > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_akomodasi, 2) ?>%</span>
                                                <?php } else if ($perc_akomodasi == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_akomodasi, 2) ?>%</span>
                                                <?php } else if ($perc_akomodasi < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_akomodasi, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p><br />
                                    <p>Kamar
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box2a->jlh_kamar) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box2aa->jlh_kamar) != 0) {
                                                    $perc_kamar = (((($box2a->jlh_kamar) - ($box2aa->jlh_kamar)) / $box2aa->jlh_kamar) * 100);
                                                } else {
                                                    $perc_kamar = 0;
                                                } ?>
                                                <?php if ($perc_kamar > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_kamar, 2) ?>%</span>
                                                <?php } else if ($perc_kamar == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_kamar, 2) ?>%</span>
                                                <?php } else if ($perc_kamar < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_kamar, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p><b>Penumpang</b>
                                        <p>Internasional</p>
                                        <p style="font-size: 18pt; font-weight: bold;">
                                            <?php echo number_format($box4a->jlh_internasional) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box4aa->jlh_internasional) != 0) {
                                                    $perc_internasional = (((($box4a->jlh_internasional) - ($box4aa->jlh_internasional)) / $box4aa->jlh_internasional) * 100);
                                                } else {
                                                    $perc_internasional = 0;
                                                } ?>
                                                <?php if ($perc_internasional > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else if ($perc_internasional == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else if ($perc_internasional < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p><br />
                                    <p>Domestik
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box4b->jlh_domestik) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box4bb->jlh_domestik) != 0) {
                                                    $perc_domestik = (((($box4b->jlh_domestik) - ($box4bb->jlh_domestik)) / $box4bb->jlh_domestik) * 100);
                                                } else {
                                                    $perc_domestik = 0;
                                                } ?>
                                                <?php if ($perc_domestik > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else if ($perc_domestik == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else if ($perc_domestik < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-plane" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                        </div>

                        <!-- col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p><b>Objek Wisata</b>
                                        <p>Pengunjung Nusantara</p>
                                        <p style="font-size: 18pt; font-weight: bold;">
                                            <?php echo number_format($box5a->jlh_objek_wisata) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box5aa->jlh_objek_wisata) != 0) {
                                                    $perc_internasional = (((($box5a->jlh_objek_wisata) - ($box5aa->jlh_objek_wisata)) / $box5aa->jlh_objek_wisata) * 100);
                                                } else {
                                                    $perc_internasional = 0;
                                                } ?>
                                                <?php if ($perc_internasional > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else if ($perc_internasional == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else if ($perc_internasional < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_internasional, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p><br />
                                    <p>Pengunjung Mancanegara
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box5b->jlh_pengunjung) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box5bb->jlh_pengunjung) != 0) {
                                                    $perc_domestik = (((($box5b->jlh_pengunjung) - ($box5bb->jlh_pengunjung)) / $box5bb->jlh_pengunjung) * 100);
                                                } else {
                                                    $perc_domestik = 0;
                                                } ?>
                                                <?php if ($perc_domestik > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else if ($perc_domestik == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else if ($perc_domestik < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_domestik, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-plane" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p>Wisatawan Mancanegara
                                        <p style="font-size: 18pt; font-weight: bold;">
                                            <?php echo number_format($box3a->jlh_wisman) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box3aa->jlh_wisman) != 0) {
                                                    $perc_wisman = (((($box3a->jlh_wisman) - ($box3aa->jlh_wisman)) / $box3aa->jlh_wisman) * 100);
                                                } else {
                                                    $perc_wisman = 0;
                                                } ?>
                                                <?php if ($perc_wisman > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_wisman, 2) ?>%</span>
                                                <?php } else if ($perc_wisman == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_wisman, 2) ?>%</span>
                                                <?php } else if ($perc_wisman < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_wisman, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <p><b>Bar</b>
                                        <p>Pengunjung Nusantara</p>
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box6a->jlh_pengunjung) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box6aa->jlh_pengunjung) != 0) {
                                                    $perc_bar = (((($box6a->jlh_pengunjung) - ($box6aa->jlh_pengunjung)) / $box6aa->jlh_pengunjung) * 100);
                                                } else {
                                                    $perc_bar = 0;
                                                } ?>
                                                <?php if ($perc_bar > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else if ($perc_bar == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else if ($perc_bar < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p><br />
                                        <p>Pengunjung Mancanegara</p>
                                        <p style="font-size: 18pt; font-weight: bold;"><?php echo number_format($box6b->jlh_pengunjung) ?>
                                            <a style="font-size: 12pt;">
                                                <?php if (($box6bb->jlh_pengunjung) != 0) {
                                                    $perc_bar = (((($box6b->jlh_pengunjung) - ($box6bb->jlh_pengunjung)) / $box6aa->jlh_pengunjung) * 100);
                                                } else {
                                                    $perc_bar = 0;
                                                } ?>
                                                <?php if ($perc_bar > 0) { ?>
                                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else if ($perc_bar == 0) { ?>
                                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else if ($perc_bar < 0) { ?>
                                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo round($perc_bar, 2) ?>%</span>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add" style="color: #728E87"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-calendar-o"></i><?= ' Tahun ' . $tahun ?></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </section>
            </header>
            <header class="header bg-navy">
                <section class="content">
                    <h2 style="color: white; font-weight: bold; text-align: center;">Lihat Statistik Region <span class="glyphicon glyphicon-chevron-right"></span></h2>
                    <h4 style="color: white; text-align: center;"><a href="<?php echo base_url("SP_TinjauRegion") ?>">Klik di Sini</a></h4><br />
                    <div class="row">
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SPT_JumlahPenumpang") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Penumpang</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SPT_JumlahWisman") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Wisatawan <br />Mancanegara</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SP_Akomodasi") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Akomodasi</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SP_Restoran") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Restoran</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SP_Bar") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Bar</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("SP_ObjekWisata") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Objek Wisata</button>
                            </form>
                        </div>
                    </div>
                </section>
            </header>
            <header class="header--bg2">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Negara dengan Kunjungan Wisata Ke Bali Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($wisman_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $wt['kebangsaan']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($box3a->jlh_wisman != 0) {
                                                                                        echo round(($wt['jumlah'] / $box3a->jlh_wisman) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($box3a->jlh_wisman != 0) {
                                                echo round(($wt['jumlah'] / $box3a->jlh_wisman) * 100, 2); ?>% Total Wisatawan Mancanegara
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Objek Wisata di Bali dengan Kunjungan Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($objek_wisata_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content" data-toggle="tooltip" data-placement="top" title="Kabupaten/Kota: <?= $wt['kabupaten'] ?>">
                                        <span class="info-box-text"><?php echo $wt['nama_objek_wisata']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>
                                        <?php $jumlah_pengunjung = ($box5a->jlh_pengunjung) + ($box5b->jlh_pengunjung) ?>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($jumlah_pengunjung != 0) {
                                                                                        echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($jumlah_pengunjung != 0) {
                                                echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2); ?>% Total Kujungan Objek Wisata
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Kabupaten/Kota di Bali dengan Restoran Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($restoran_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content" data-toggle="tooltip" data-placement="top" title="Jumlah Pengunjung: <?= number_format($wt['jumlah']) ?>">
                                        <span class="info-box-text"><?php echo $wt['nama_restoran']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>
                                        <?php $jumlah_pengunjung = ($box1a->jlh_pengunjung) + ($box1b->jlh_pengunjung) ?>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($jumlah_pengunjung != 0) {
                                                                                        echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($jumlah_pengunjung != 0) {
                                                echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2); ?>% Total Restoran
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Kabupaten/Kota di Bali dengan Akomodasi Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($akomodasi_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy" data-toggle="tooltip" data-placement="top" title="Jumlah Kamar: <?= number_format($wt['jlh_kamar']) ?>">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $wt['kabupaten']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($box2a->jlh_unit != 0) {
                                                                                        echo round(($wt['jumlah'] / $box2a->jlh_unit) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($box2a->jlh_unit != 0) {
                                                echo round(($wt['jumlah'] / $box2a->jlh_unit) * 100, 2); ?>% Total Akomodasi
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Akomodasi di Bali dengan Jumlah Tamu Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($hotel_bintang_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content" data-toggle="tooltip" data-placement="top" title="Jumlah Kamar: <?= $wt['jlh_kamar'] ?>">
                                        <span class="info-box-text"><?php echo $wt['nama_hotel']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($box2b->jlh_tamu != 0) {
                                                                                        echo round(($wt['jumlah'] / $box2b->jlh_tamu) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($box2b->jlh_tamu != 0) {
                                                echo round(($wt['jumlah'] / $box2b->jlh_tamu) * 100, 2); ?>% Total Tamu
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4">
                            <h2 style="color: white; font-weight: bold; text-align: center;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Kabupaten/Kota di Bali dengan Jumlah Bar Terbanyak
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h2>
                            <h4 style="color: white; text-align: center;">Tahun: <?= $tahun ?></h4><br />
                            <!-- info-box -->
                            <?php
                            $no = 0;
                            foreach ($bar_terbanyak as $wt) {
                                $no++; ?>
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon"><?php echo $no ?></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $wt['nama_bar']; ?></span>
                                        <span class="info-box-number"><?php echo number_format($wt['jumlah']); ?></span>
                                        <?php $jumlah_pengunjung = ($box6a->jlh_pengunjung) + ($box6b->jlh_pengunjung) ?>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php if ($jumlah_pengunjung != 0) {
                                                                                        echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2) . "%";
                                                                                    } else {
                                                                                        echo "0%";
                                                                                    } ?>"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if ($jumlah_pengunjung != 0) {
                                                echo round(($wt['jumlah'] / $jumlah_pengunjung) * 100, 2); ?>% Total Bar
                                        <?php } else {
                                                echo "Data Tidak Tersedia";
                                            } ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <?php } ?>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </section>
            </header>
            <header class="header bg-navy">
                <section class="content">
                    <h2 style="color: white; font-weight: bold; text-align: center;">Lihat Prediksi Region <span class="glyphicon glyphicon-chevron-right"></span></h2>
                    <h4 style="color: white; text-align: center;"><a href="<?php echo base_url("Prediksi_TinjauRegion") ?>">Klik di Sini</a></h4><br />
                    <div class="row">
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_T_Penumpang") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Penumpang</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_T_Wisman") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Wisatawan <br />Mancanegara</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_Akomodasi") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Akomodasi</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_Restoran") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Restoran</button>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_Bar") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Bar</button>
                            </form>
                        </div>

                        <div class="col-lg-2">
                            <form method="post" action="<?php echo base_url("Prediksi_ObjekWisata") ?>">
                                <button type="submit" class="btn btn-block bg-orange btn-lg">Jumlah <br />Objek Wisata</button>
                            </form>
                        </div>
                    </div>
                </section>
            </header>
            <!-- Main content -->
            <header class="header--bg2">
                <section class="content">
                    <form method="post" id="akomodasi_kategori" action="<?php echo base_url("Dashboard/getData") ?>">
                        <div class="row">
                            <!-- Akomodasi MAP -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-4">
                                            <select class="form-control select2" id="id_kategori" name="id_kategori" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                                <?php foreach ($id_kategori as $a) { ?>
                                                    <option value="<?php echo $a['id_kategori']; ?>" <?= $kat == $a['id_kategori'] ? "selected" : null  ?>><?php echo $a['kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                                <?php
                                                $year_now = date('Y');
                                                $year_search = $year_now - 1;
                                                for ($x = $year_search; $x >= 2000; $x--) {
                                                ?>
                                                    <option value="<?php echo $x ?>" <?= $tahun == $x ? "selected" : null  ?>><?php echo $x ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning" title="Grafik Map Menurut Jumlah Unit" onclick="map_unit()">Unit</button>
                                            <button type="button" class="btn btn-warning" title="Grafik Map Menurut Jumlah Kamar" onclick="map_room()">Kamar</button>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="map1">
                                            <div id="grafik-wilayah_akomodasi_4" style="min-width: 300px; height: 420px; margin: 0 auto"></div>
                                        </div>
                                        <div id="map2" hidden>
                                            <div id="grafik-wilayah_akomodasi_5" style="min-width: 310px; height: 420px; margin: 0 auto"></div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </section>
                            <!-- Ending Akomodasi MAP -->
                            <!-- Tabel Akomodasi -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-4">
                                            <select class="form-control select2" id="id_kabupaten" name="id_kabupaten" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                                                <option value="">Semua Kota/Kabupaten</option>
                                                <?php foreach ($kabupaten as $a) { ?>
                                                    <option value="<?php echo $a['id_kabupaten']; ?>" <?= $kab == $a['id_kabupaten'] ? "selected" : null  ?>><?php echo $a['kabupaten']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning" title="Tabel Menurut Jumlah Akomodasi" onclick="tabel_akomodasi()">Akomodasi</button>
                                            <button type="button" class="btn btn-warning" title="Tabel Menurut Jumlah Kelas Bintang" onclick="tabel_bintang()">Kelas Bintang</button>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="tabel1">
                                            <p class="box-title" style="text-align: center; font-size: 13pt;">Tabel Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></p>
                                            <table id="kategori" class="table table-bordered table-striped" style="height: 365px">
                                                <thead>
                                                    <tr style="background-color:#6e0006; color:white;">
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Kategori</th>
                                                        <th colspan="2" style="text-align: center;">Akomodasi</th>
                                                    </tr>
                                                    <tr style="background-color:#6e0006; color:white;">
                                                        <th style="text-align: center;">Unit</th>
                                                        <th style="text-align: center;">Room</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0;
                                                    $jlh_ako = 0;
                                                    $jlh_kamar = 0; ?>
                                                    <?php foreach ($data_akomodasi_2 as $dp) {
                                                    ?>
                                                        <tr><?php $no++ ?>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $dp['akomodasi']; ?></td>
                                                            <td><?php echo number_format($dp['jlh_akomodasi']);
                                                                $jlh_ako += $dp['jlh_akomodasi']; ?></td>
                                                            <td><?php echo number_format($dp['jlh_kamar']);
                                                                $jlh_kamar += $dp['jlh_kamar']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2" style="text-align: center;">Jumlah</td>
                                                        <td><?php echo number_format($jlh_ako) ?></td>
                                                        <td><?php echo number_format($jlh_kamar) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="tabel2" hidden>
                                            <p class="box-title" style="text-align: center; font-size: 13pt;">Tabel Akomodasi <?php echo $nama_kabupaten->kabupaten ?> Tahun <?php echo $tahun ?></p>
                                            <table id="kategori" class="table table-bordered table-striped" style="height: 365px">
                                                <thead>
                                                    <tr style="background-color:#6e0006; color:white;">
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Kategori</th>
                                                        <th colspan="2" style="text-align: center;">Akomodasi</th>
                                                    </tr>
                                                    <tr style="background-color:#6e0006; color:white;">
                                                        <th style="text-align: center;">Unit</th>
                                                        <th style="text-align: center;">Room</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0;
                                                    $jlh_ako = 0;
                                                    $jlh_kamar = 0; ?>
                                                    <?php foreach ($data_akomodasi_bintang as $dp) {
                                                    ?>
                                                        <tr><?php $no++ ?>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo 'Bintang ' . $dp['akomodasi']; ?></td>
                                                            <td><?php echo number_format($dp['jlh_akomodasi']);
                                                                $jlh_ako += $dp['jlh_akomodasi']; ?></td>
                                                            <td><?php echo number_format($dp['jlh_kamar']);
                                                                $jlh_kamar += $dp['jlh_kamar']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="1" style="text-align: center;">Jumlah</td>
                                                        <td><?php echo number_format($jlh_ako) ?></td>
                                                        <td><?php echo number_format($jlh_kamar) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </section>
                            <!-- Ending Tabel Akomodasi -->
                        </div>
                        <div class="row">
                            <!-- Jumlah Penumpang Line -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-9">
                                            <select class="form-control select2" id="id_pintu_masuk" name="id_pintu_masuk" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">

                                                <?php foreach ($pintu_masuk as $a) { ?>
                                                    <option value="<?php echo $a['id_pintu_masuk']; ?>" <?= $id_pintu_masuk == $a['id_pintu_masuk'] ? "selected" : null  ?>><?php echo $a['pintu_masuk']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="grafik-1_blok2-jpenumpang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </section>
                            <!-- Ending Jumlah Penumpang Line -->
                            <!-- Restoran Pie -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning" title="Grafik Pie Menurut Jumlah Unit" onclick="pie_unit()">Unit</button>
                                            <button type="button" class="btn btn-warning" title="Grafik Pie Menurut Jumlah Kursi" onclick="pie_kursi()">Kursi</button>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="pie1">
                                            <div id="grafik-wilayah_akomodasi_2a" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                        </div>
                                        <table id="data_akomodasi_wilayah_pie_1" hidden>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_restoran as $dp) { ?>
                                                    <tr>
                                                        <th><?php echo $dp['kabupaten']; ?></th>
                                                        <td><?php echo $dp['jlh_akomodasi']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div id="pie2" hidden>
                                            <div id="grafik-wilayah_akomodasi_2b" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                        </div>
                                        <table id="data_akomodasi_wilayah_pie_2" hidden>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Kursi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_restoran as $dp) { ?>
                                                    <tr>
                                                        <th><?php echo $dp['kabupaten']; ?></th>
                                                        <td><?php echo $dp['jlh_kamar']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </section>
                            <!-- Ending Restoran Pie -->
                        </div>
                        <div class="row">
                            <!-- Wisman Coloumn -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-3">
                                            <h5>Tahun <?php echo $tahun ?></h5>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="grafik-1A_blok1-jpenumpang" style="min-width: 310px; height: 420px; margin: 0 auto"></div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                            </section>
                            <!-- Ending Wisman Coloumn -->
                            <!-- Bar Bar Chart -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-3">
                                            <h5>Tahun <?php echo $tahun ?></h5>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="grafik-wilayah_akomodasi_3" style="min-width: 310px; height: 420px; margin: 0 auto"></div>
                                    </div>
                                    <table id="data_akomodasi_wilayah" hidden>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_bar as $dp) { ?>
                                                <tr>
                                                    <th><?php echo '' . $dp['kabupaten']; ?></th>
                                                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </section>
                            <!-- Ending Bar Bar Chart -->
                        </div>
                        <div class="row">
                            <!-- Wisman Coloumn -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-3">
                                            <h5>Tahun <?php echo $tahun ?></h5>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="grafik-1A_blok1-jpengunjung" style="min-width: 310px; height: 420px; margin: 0 auto"></div>
                                        <!-- /.box-body -->
                                    </div>
                                    <table id="data_objek_wisata" hidden>
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Pengunjung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kunjungan_objek_wisata as $dp) { ?>
                                                <tr>
                                                    <th><?php echo '' . $dp['tahun']; ?></th>
                                                    <td><?php echo $dp['jumlah']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- /.box -->

                            </section>
                            <!-- Ending Wisman Coloumn -->
                            <!-- Bar Bar Chart -->
                            <section class="col-lg-6 connectedSortable">
                                <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                        <div class="col-md-3">
                                            <h5>Tahun <?php echo $tahun ?></h5>
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="grafik-1A_blok1-jobjek_wisata" style="min-width: 310px; height: 420px; margin: 0 auto"></div>
                                    </div>
                                    <table id="data_unit_objek_wisata" hidden>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Objek Wisata</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($unit_objek_wisata as $dp) { ?>
                                                <tr>
                                                    <th><?php echo '' . $dp['kabupaten']; ?></th>
                                                    <td><?php echo $dp['jlh_akomodasi']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </section>
                            <!-- Ending Bar Bar Chart -->
                        </div>
                    </form>
                </section>
            </header>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php $this->load->view('for_all/footer.php'); ?>

        <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <table id="data_jpenumpang-int_kategori" border="1" hidden>
        <thead>
            <tr>
                <th></th>
                <?php foreach ($grup_kebangsaan as $dp) { ?>
                    <th colspan="1" style="text-align: center; vertical-align: middle; width: 1px;"><?php echo $dp['jenis_kebangsaan'] ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 5 ?></td>
                <?php foreach ($data_tahun_5 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 4 ?></td>
                <?php foreach ($data_tahun_4 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 3 ?></td>
                <?php foreach ($data_tahun_3 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 2 ?></td>
                <?php foreach ($data_tahun_2 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun - 1 ?></td>
                <?php foreach ($data_tahun_1 as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: left;"><?php echo $tahun ?></td>
                <?php foreach ($data_tahun as $dp) { ?>
                    <td><?php echo $dp['jumlah'] ?></td>
                <?php } ?>
            </tr>
        </tbody>
    </table>

    <table id="data-jpenumpang_blok2" hidden>
        <thead>
            <tr>
                <th></th>
                <th>Internasional</th>
                <th>Domestik</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_jpenumpang as $dp) { ?>
                <tr>
                    <th><?php echo '' . $dp['tahun']; ?></th>
                    <td><?php echo $dp['jlh_internasional']; ?></td>
                    <td><?php echo $dp['jlh_domestik']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

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
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <!-- Language script -->
    <script src="<?php echo base_url('assets/dist/js/bahasa.js') ?>"></script>
    <!-- Language script -->

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

    <!-- <script src="<?php echo base_url('assets/dist/js/highmaps.js') ?>"></script> -->
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <!-- https://code.highcharts.com/maps/highmaps.js -->
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script type="text/javascript">
        function map_unit() {
            $("#map2").slideUp();
            $("#map1").slideDown();
        }

        function map_room() {
            $("#map1").slideUp();
            $("#map2").slideDown();
        }

        function pie_unit() {
            $("#pie2").slideUp();
            $("#pie1").slideDown();
        }

        function pie_kursi() {
            $("#pie1").slideUp();
            $("#pie2").slideDown();
        }

        function tabel_akomodasi() {
            $("#tabel2").slideUp();
            $("#tabel1").slideDown();
        }

        function tabel_bintang() {
            $("#tabel1").slideUp();
            $("#tabel2").slideDown();
        }
    </script>

    <script type="text/javascript">
        // Initiate the chart
        Highcharts.mapChart('grafik-wilayah_akomodasi_4', {
            chart: {
                type: "map"
            },
            title: {
                useHTML: true,
                text: "<b><h4><center>Geomaps <?php echo $kat_akomodasi->kategori ?> Berdasarkan Jumlah Unit </br> Tahun <?php echo $tahun ?></center></h4></b>"
            },
            legend: {
                enabled: true,
                layout: 'horizontal',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: false,
                verticalAlign: 'bottom'
                // x: -140
            },
            tooltip: {
                backgroundColor: '#f5f5f5',
                borderWidth: 0,
                shadow: true,
                useHTML: true,
                padding: 0,
                pointFormat: ' <a style="font-size:15pt"><b>{point.name}</b></a><br>' +
                    '<span style="font-size:18px">{point.value} Kamar</span>',
                positioner: function() {
                    return {
                        x: 10,
                        y: 320
                    };
                }
            },
            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'top'
                }
            },

            colorAxis: {
                min: "1",
                max: "<?php echo $nilai_max->max ?>",
                type: 'logarithmic',
                minColor: '#49FF56',
                maxColor: '#02820B',
                stops: [
                    [0, '#49FF56'],
                    [0.4, '#0AD518'],
                    [0.55, '#06B712'],
                    [0.60, '#03880D'],
                    [0.98, '#02820B']
                ]
                //     labels: {
                //     format: '{value}%'
                //   }
            },

            series: [{
                name: '<?php echo $kat_akomodasi->kategori ?> Tahun <?php echo $tahun ?>',
                states: {
                    hover: {
                        color: '#D1351D'
                    }
                },
                data: [{

                        "name": "Jembrana",
                        "value": "<?php echo $kab_jembrana->jlh_akomodasi ?>",
                        "path": "M126,-762,117,-772L117,-774L113,-776,111,-782,100,-792,91,-805,82,-813,71,-815,70,-816,63,-816,62,-818,59,-819,57,-820,56,-822,55,-825,55,-838,57,-840,56,-844,46,-854,34,-869,31,-876,31,-886,28,-893,24,-901,19,-906,18,-911,34,-911,33,-912,41,-912,41,-914,49,-914,48,-915,55,-915,55,-916C55,-916,74,-916,74,-916,75,-916,75,-917,75,-917L85,-917,85,-918L90,-918L90,-919,95,-919,95,-921,99,-921,100,-922,105,-922,105,-923,115,-923,115,-921,120,-922,125,-922C125,-922,127,-922,127,-922,128,-922,132,-918,132,-918L135,-914,137,-908,139,-904,142,-899,148,-896,154,-894,159,-891C159,-891,165,-889,165,-889,166,-889,172,-889,172,-889L179,-889,180,-892,181,-895,181,-897L188,-897L196,-897,198,-898,204,-903,206,-906,208,-907,210,-908L212,-908L215,-905,217,-903,220,-902,226,-901,226,-899,228,-899,228,-898,230,-897,232,-895,238,-891,242,-889,245,-887,249,-886,250,-884,254,-883,256,-882,259,-881C259,-881,260,-879,261,-879,261,-879,263,-877,263,-877,263,-877,265,-876,265,-876L265,-874,265,-868,267,-867,268,-866,270,-865,271,-864,274,-864,275,-863,283,-863,284,-861,289,-861,290,-860,291,-859,293,-857,294,-856,296,-854,298,-853,299,-851,299,-850L299,-849L300,-848,301,-846,301,-842,303,-840L303,-836L304,-835,304,-831C304,-831,305,-829,305,-829,305,-829,305,-827,305,-827L306,-826,307,-823,309,-823,310,-821,312,-819,314,-817,315,-816,317,-815,319,-813,321,-812C321,-812,323,-811,324,-811,324,-811,328,-811,328,-811L331,-809,334,-810C334,-810,336,-808,336,-808,336,-808,339,-808,339,-808L342,-808C342,-808,344,-807,344,-807,344,-807,346,-806,346,-806,346,-805,348,-803,348,-803L351,-800,354,-798,356,-798,356,-797C356,-797,357,-795,358,-795,358,-795,359,-794,359,-794,359,-794,361,-792,361,-792,361,-792,362,-790,362,-790,362,-790,363,-789,363,-789,363,-789,364,-788,364,-788,364,-788,366,-787,366,-787L367,-786,370,-785,371,-784,373,-784,374,-783,376,-783,378,-782,384,-782,390,-782,394,-782,394,-774,394,-769,396,-768,396,-765,396,-753,396,-750,398,-750L398,-734L395,-731,393,-728,388,-725,385,-723,384,-721,375,-721,372,-722,371,-723,368,-724,367,-726,364,-727,362,-729,358,-731,358,-732,355,-732L353,-732L353,-734,328,-733,327,-734,325,-739,323,-740,322,-742,319,-745,315,-748,310,-750,307,-750,304,-752,302,-752,302,-754,299,-754,298,-755,295,-755,294,-756,290,-757,290,-758,288,-758,286,-759,284,-759,283,-760,282,-760,281,-761,258,-761L258,-763L257,-763L256,-763,256,-764,254,-764,253,-765,251,-765,250,-767,249,-769,247,-770,233,-770,227,-770,226,-771,224,-771,223,-772,205,-772,203,-771,193,-771,192,-770,183,-770,183,-769,182,-769,181,-768L181,-767L176,-767,175,-766,173,-766,172,-766,171,-765,169,-764,168,-763L167,-763C167,-763,162,-762,161,-762,160,-762,160,-764,160,-764L158,-764L154,-764L152,-763,152,-762,130,-762z",
                    },
                    {
                        "name": "Tabanan",
                        "value": "<?php echo $kab_tabanan->jlh_akomodasi ?>",
                        "path": "M394,-782,406,-801,407,-806,423,-820,434,-821,449,-829,455,-831,463,-834,474,-838,482,-842,493,-843,498,-841,506,-840,506,-843,513,-843,516,-846,522,-847,525,-849,528,-848,532,-851,535,-850,537,-853,540,-853,543,-855,550,-860L577,-860L577,-854,576,-852,576,-846,576,-840,574,-841,574,-837,574,-826,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,581,-813,582,-811,582,-802,583,-801,583,-795,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,579,-761,576,-759,574,-758,570,-757,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,554,-747,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,542,-711,541,-710,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-678,523,-675,522,-674,522,-664,521,-657L520,-657L520,-653,519,-652,519,-650,515,-646,509,-641,503,-637,499,-634,494,-634,494,-633,481,-634,479,-633,477,-635,476,-637,474,-639,471,-642,468,-645,467,-645,464,-646,464,-649,462,-651,460,-653,460,-655,459,-657,455,-660,452,-666,447,-671,442,-674,437,-678,432,-683,430,-689,427,-694,425,-697,421,-698,417,-700,413,-701,408,-704,404,-706,400,-708,398,-711,394,-713,390,-715,386,-718,384,-721,393,-728,395,-731,398,-734L398,-750L396,-750,396,-752,396,-757,396,-765,396,-768,394,-769,394,-782"
                    },
                    {
                        "name": "Badung",
                        "value": "<?php echo $kab_badung->jlh_akomodasi ?>",
                        "path": "M479,-633,480,-632,482,-631,482,-629,483,-628,485,-628,485,-627,488,-627L488,-625L490,-625,490,-624,492,-622,493,-620,494,-619,494,-618,495,-616,497,-612L497,-611L499,-610L500,-610L499,-608,501,-607,502,-606,504,-604,505,-603,506,-602,507,-601,508,-600,509,-599,510,-598,511,-597L513,-597L514,-595C514,-595,515,-595,515,-595,515,-594,516,-593,516,-593L517,-592,519,-591,519,-590,520,-590,520,-589,521,-588,521,-587,522,-587,522,-586,525,-586L525,-585L526,-584,526,-584,527,-583L527,-582L528,-582,529,-581,530,-581,530,-580,531,-580,531,-578,531,-577,532,-577,532,-576,534,-576,534,-573,535,-571,535,-570,536,-570L536,-569L537,-569,537,-567,539,-567,538,-566,540,-566,540,-565,541,-565,541,-564L542,-564L544,-562,545,-560,547,-560,548,-558,550,-557,550,-554,551,-554C551,-554,552,-552,552,-551,553,-551,553,-549,553,-549,554,-549,556,-549,556,-549L559,-547,561,-546C561,-546,563,-545,563,-545,564,-544,567,-542,567,-542L568,-539,569,-538,570,-537,570,-527,569,-526,568,-523,566,-519,564,-517,563,-516,562,-511,563,-510,564,-508,565,-506,566,-503,567,-503L567,-500L569,-500,569,-497,569,-491,567,-489,565,-487C565,-487,564,-487,564,-487,563,-486,561,-484,561,-484L557,-482,547,-482,544,-481,540,-477,537,-474,531,-469C531,-469,526,-464,526,-464,526,-464,523,-462,523,-462L521,-459,514,-458,507,-457,502,-453,499,-449,499,-445C499,-445,499,-442,500,-442,500,-441,503,-441,503,-441,504,-441,507,-439,507,-439L509,-438,513,-436,516,-434C516,-434,518,-433,518,-433,519,-433,524,-433,524,-433L530,-432,546,-432,556,-433,562,-433,565,-435,569,-436,571,-438,577,-439,579,-440,585,-439C585,-439,590,-439,591,-439,591,-440,592,-441,592,-441L594,-442,599,-442,599,-443,605,-443,608,-445,609,-446L610,-446L612,-447,615,-450,620,-451,624,-455,628,-458,629,-460,629,-463,630,-464,630,-468,630,-491,630,-492,626,-495,620,-495,616,-491,612,-487,606,-483,603,-483,600,-484,598,-486,597,-488L597,-494L596,-496,595,-497,595,-507L595,-512L594,-513,593,-513,593,-516,592,-517,592,-520,590,-520,589,-521,587,-523,585,-525,585,-527,585,-537,583,-539,582,-541,580,-543,579,-545,577,-546,576,-548,575,-550L575,-557L573,-557,573,-565,572,-566,572,-568,571,-568,570,-569,570,-569,570,-571,568,-572,568,-573,567,-574,567,-589,568,-589,568,-590,570,-592,570,-598,571,-598,571,-604,572,-605,579,-605,582,-606,583,-608C583,-608,586,-609,586,-609,587,-609,589,-612,589,-612L591,-616,594,-617,597,-617,604,-621,608,-623,614,-628,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695C626,-695,631,-697,632,-698,633,-699,635,-706,635,-706L635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,615,-728,613,-730,613,-734,616,-737,622,-745C622,-745,626,-745,626,-746,627,-747,628,-756,628,-756L630,-762,635,-775,638,-779C638,-779,644,-785,644,-787,645,-788,647,-795,647,-795,647,-795,649,-800,649,-801,650,-801,651,-806,651,-806L652,-813,653,-815,653,-825,655,-828,654,-839,653,-841,653,-846,652,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,629,-890,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860L577,-860L577,-854,576,-852,576,-840,574,-841,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,582,-811,582,-802,583,-801,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,574,-758,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-675,522,-674,521,-657L520,-657L520,-653,519,-652,519,-650,509,-641,499,-634,494,-634,494,-633,481,-634z"
                    },
                    {
                        "name": "Denpasar",
                        "value": "<?php echo $kab_denpasar->jlh_akomodasi ?>",
                        "path": "M652,-557,652,-566,652,-569,653,-572,653,-574C653,-574,654,-575,654,-575,655,-575,655,-578,655,-578L656,-579,657,-581,658,-581,660,-583,661,-584,661,-588,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,633,-608,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,617,-630,616,-631,614,-628,608,-623,597,-617,594,-617,591,-616,589,-612,587,-609,583,-608,582,-606,579,-605,572,-605,571,-604,571,-598,570,-598,570,-592,568,-590,568,-589,567,-589,567,-574,568,-573,568,-572,570,-571,570,-569,570,-569,571,-568,572,-568,572,-566,573,-565,573,-557,575,-557L575,-550L576,-548,577,-546,579,-545,580,-543,582,-541,583,-539,585,-537,585,-527,585,-525C585,-525,587,-523,587,-523L589,-521,590,-520,592,-520,592,-517,593,-516,593,-513,594,-513,595,-512,595,-508,596,-508,596,-509,597,-511,599,-511,599,-512,600,-513C600,-513,601,-515,601,-515,601,-516,602,-516,602,-516L603,-517,605,-517,610,-518,612,-519,613,-521,615,-523,615,-525C615,-525,615,-526,615,-526,615,-527,616,-528,616,-528L617,-529,617,-530,618,-532,620,-534C620,-534,621,-535,621,-535,621,-535,624,-536,624,-536L627,-537C627,-537,629,-538,629,-538,629,-538,633,-537,633,-537,634,-537,638,-539,638,-539,638,-539,640,-540,640,-540,640,-540,643,-542,643,-542,643,-542,645,-543,645,-543,645,-543,645,-547,645,-547,645,-547,646,-548,647,-549,647,-549,648,-551,648,-552,648,-552,648,-554,649,-554,649,-554,651,-555,651,-555z"
                    },
                    {
                        "name": "Gianyar",
                        "value": "<?php echo $kab_gianyar->jlh_akomodasi ?>",
                        "path": "M682,-808,692,-809,693,-804,693,-802,691,-800C691,-800,690,-798,691,-797,691,-797,690,-794,690,-794L690,-791,691,-788,691,-786,692,-785,693,-783,695,-783,696,-780,698,-776L698,-774L698,-766,701,-764,704,-763,707,-761,707,-753,706,-752L706,-748L704,-747,703,-744,701,-743,700,-742,699,-740C699,-740,699,-739,698,-739,698,-738,698,-736,698,-736L697,-734,695,-733,695,-732,695,-730,694,-729,692,-727,692,-726,692,-723,691,-723,689,-719,689,-712,691,-710,691,-707,692,-706,692,-673,692,-670,693,-669,694,-667C694,-667,695,-666,695,-666,695,-665,698,-664,698,-664L699,-662C699,-662,702,-660,702,-659,703,-659,705,-657,705,-657L706,-654C706,-654,706,-654,707,-653,708,-652,709,-651,710,-650,710,-650,713,-650,713,-649,714,-648,716,-647,716,-646,716,-645,718,-644,717,-640,717,-637,717,-634,717,-634L715,-632,713,-629,711,-629,704,-628,701,-627,701,-626,700,-624,698,-621,696,-619,696,-616,693,-614,690,-613C690,-613,687,-611,686,-611,686,-611,684,-611,684,-611L682,-611C682,-611,678,-610,679,-609,679,-608,678,-606,678,-606L676,-606,674,-605,674,-602,672,-602,671,-601,671,-599,670,-599,670,-596,669,-594,667,-593,666,-592,666,-592,664,-591,662,-590,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,616,-631,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695,632,-698,635,-706,635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,613,-730,613,-734,616,-737,622,-745,624,-745,626,-746,628,-756,635,-775,638,-779,641,-783,644,-786,647,-795,649,-800,651,-806,652,-813,653,-815,653,-825,655,-828,655,-830,657,-830,658,-829,660,-827,661,-826,663,-826,664,-824,667,-822,667,-820,669,-819,671,-817,673,-814,676,-813,677,-811,679,-810,680,-809z"
                    },
                    {
                        "name": "Klungkung",
                        "value": "<?php echo $kab_klungkung->jlh_akomodasi ?>",
                        "path": "M695,-711L707,-711L711,-712L721,-712L722,-713,728,-713,730,-715,734,-714,737,-717,737,-719,739,-720,740,-722,748,-722,750,-723,758,-723,759,-721,761,-718L761,-715L762,-712L762,-705L762,-700,762,-699,764,-697,766,-694,767,-694,768,-691,768,-683L769,-683L770,-679L773,-679L776,-677,778,-676,781,-673,783,-671C783,-671,785,-670,786,-670,786,-670,806,-670,806,-670L808,-669,810,-667,813,-665,815,-662,815,-659,816,-657,817,-654,817,-651,810,-650,808,-649,805,-649,803,-647,800,-646,799,-644,796,-643,790,-642,787,-639,785,-637,781,-636,778,-635,775,-634,772,-633,767,-631,733,-632,731,-633,727,-633,726,-634,722,-634,721,-636,720,-636,719,-637,718,-637,717,-636,718,-642,717,-645,716,-647,714,-648,713,-649,710,-650,706,-654,705,-657,699,-662,698,-664,696,-666,695,-666,694,-667,693,-669,692,-670,692,-706,691,-707,691,-710L691,-710z,M838,-560L845,-560L847,-562,862,-561,864,-563,866,-563,868,-565,872,-566,876,-566,877,-564,878,-563,880,-560,880,-559,881,-559,882,-557,882,-555C882,-555,883,-554,883,-554,883,-554,885,-553,885,-553L887,-553,889,-552,890,-551,892,-549,894,-546,895,-544,896,-543,897,-541,897,-539,898,-538,899,-536,900,-535,902,-534,903,-533,905,-531,909,-529,912,-528,914,-528,915,-526,918,-526,919,-525,921,-523,923,-521,923,-519,924,-517,925,-516,925,-513,926,-512,926,-510,927,-509,927,-506,928,-505,929,-503,930,-501,930,-496,929,-494,928,-492,927,-491,927,-489C927,-489,926,-489,926,-488,926,-488,926,-487,926,-487L922,-485,921,-483,919,-480,917,-478,915,-474,914,-472,912,-468,909,-466,907,-463,905,-458,903,-455C903,-455,899,-452,899,-452,899,-452,896,-449,896,-449L894,-449,893,-448,890,-449,889,-447,886,-446,876,-446,875,-447,873,-448,872,-449,871,-450,870,-450,869,-451,866,-451,865,-452,863,-453L859,-453L858,-455,857,-455,854,-455,853,-455,851,-457L850,-457L849,-458,848,-460,847,-463L847,-467L847,-474,846,-475,845,-478,844,-479,841,-482,839,-485,835,-488,833,-489,830,-489,828,-490,827,-490,824,-493,822,-494,818,-495,817,-497,816,-498,813,-500,810,-502,807,-504,805,-506,805,-507,803,-508,802,-510,801,-512,800,-514,800,-517,798,-519,797,-520,797,-532,799,-533,801,-535,803,-537,804,-538,806,-539,807,-540,808,-541,812,-544,814,-546,817,-550,821,-553,823,-554,824,-555,825,-556,828,-558C828,-558,832,-558,832,-558,832,-558,832,-559,833,-559,833,-559,836,-559,836,-559L836,-560z"
                    },
                    {
                        "name": "Bangli",
                        "value": "<?php echo $kab_bangli->jlh_akomodasi ?>",
                        "path": "M637,-908,637,-923,639,-924,642,-926,644,-927,645,-932,646,-938,649,-940,653,-941,658,-942,660,-944,664,-948,665,-951,670,-952,672,-953,681,-953,682,-952,692,-952,694,-950,697,-951,698,-952,705,-952,706,-953L716,-953L720,-951,723,-948,725,-945,727,-943,742,-943,744,-944,751,-944,752,-942,756,-940,757,-938,764,-940,765,-938,767,-937,771,-936,774,-936,774,-934L778,-934L780,-933,782,-932,783,-931,787,-931,790,-928,792,-925,795,-923,797,-922,798,-920,800,-918,801,-916,802,-914,802,-907,803,-892,804,-889,804,-882,804,-875,802,-874,801,-872,799,-872,799,-870,798,-869,797,-868,795,-866,795,-863,795,-858,793,-858,793,-857,792,-855,790,-853,785,-848,781,-845,778,-842,775,-840,771,-837,768,-834,762,-827,759,-826,757,-825,758,-823,757,-822,757,-816,756,-815,756,-797,756,-794,754,-793,756,-791,755,-785,757,-782,759,-780,761,-779C761,-779,762,-776,762,-776,762,-776,764,-773,764,-773L763,-771,765,-770,766,-769,766,-767,767,-765,766,-762,768,-762,769,-760C769,-760,770,-758,770,-757,770,-757,770,-752,770,-752L771,-750,772,-747,773,-745,773,-741,772,-739,771,-737,770,-734,768,-731,769,-729,767,-727,766,-725,762,-723,759,-721,758,-723,750,-723,748,-722,740,-722,739,-720,737,-719,737,-717,734,-714,730,-715,728,-713,722,-713,721,-712L711,-712L707,-711L695,-711L691,-710,689,-712,689,-719,691,-723,692,-723,692,-727,695,-730,695,-732,695,-733,697,-734,698,-736,698,-738,701,-743,703,-744,704,-747,706,-748L706,-752L707,-753,707,-761,704,-763,701,-764,698,-766,698,-776,697,-778,696,-780,695,-783,693,-783,692,-785,691,-786,690,-791,690,-794,691,-797,691,-798,691,-800,693,-802,693,-804,692,-809,682,-808,680,-809,679,-810,677,-811,676,-813,673,-814,670,-818,667,-820,667,-822,663,-826,661,-826,658,-829,657,-830,655,-830,654,-839,653,-841,653,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,628,-892,629,-893,630,-895,630,-897,631,-897,633,-899,633,-901,635,-901,635,-903,636,-906,636,-907z"
                    },
                    {
                        "name": "Karangasem",
                        "value": "<?php echo $kab_karangasem->jlh_akomodasi ?>",
                        "path": "M792,-952,808,-952,810,-951,812,-951,813,-949,816,-949,818,-948,819,-947,820,-947,822,-945,825,-944,828,-940,831,-938,832,-936,836,-936,838,-934,841,-934,844,-932,847,-930,850,-928,850,-927,853,-923,855,-921,857,-918,860,-915C860,-915,863,-912,864,-911,864,-911,866,-909,866,-909,867,-909,869,-907,869,-907L877,-908,879,-906,881,-906,883,-905,886,-905,887,-904,889,-902,891,-902,893,-900,898,-900,900,-899,901,-898,902,-897,902,-895,903,-894,904,-892,904,-891,906,-888C906,-888,907,-887,907,-886,907,-886,910,-882,910,-882L910,-879,911,-878,912,-875,913,-873,914,-871,916,-869,916,-866C916,-866,917,-864,917,-863,917,-863,918,-858,918,-858L918,-856,918,-854,919,-851,919,-849,920,-848,920,-846,921,-845,922,-843,923,-841,924,-841,926,-839,927,-838,928,-837,929,-836,931,-835,933,-834L934,-834L935,-833,937,-831,938,-830,941,-828,943,-827,946,-825,947,-824,949,-824,950,-822,953,-822,954,-821,955,-821,956,-820,957,-819,959,-818,961,-818,962,-817,963,-816C963,-816,964,-815,964,-815,965,-815,967,-814,967,-814L968,-813L969,-813L971,-812,975,-812,976,-811L977,-811L980,-809,983,-808,984,-808,987,-807C987,-807,989,-806,989,-805,990,-805,992,-802,992,-802L994,-800,996,-797,996,-796,998,-795,998,-792,999,-789,1000,-787,1000,-782,1000,-778,999,-776,999,-774,999,-773,996,-771,994,-769,991,-768,989,-767,988,-766,986,-765,983,-764,983,-763,980,-763,979,-762,976,-760,974,-757,971,-755,969,-754,967,-752,966,-751,964,-750,961,-748,960,-747,958,-746,956,-745,955,-743,953,-741,951,-740,949,-737,947,-736,945,-733,943,-732,942,-729,941,-728,940,-725,938,-723,937,-721,937,-720,936,-718,934,-717,932,-716,930,-713,929,-711,929,-710,927,-708,926,-707,926,-705,924,-703,922,-701,922,-699,918,-697,915,-694,915,-692,912,-692,910,-690,907,-689,905,-688,904,-687,901,-687,894,-687,888,-687,886,-686,881,-686,881,-686,878,-687,876,-688L873,-688L871,-689,869,-690,867,-691,866,-692,865,-692,862,-693,858,-693,855,-693,854,-692,853,-691,851,-690,851,-688,850,-688,849,-686,848,-685,847,-683,848,-675,846,-675,845,-673,844,-673,843,-671,841,-671,841,-670,841,-665,840,-665,839,-664,838,-664,837,-661,835,-661C835,-661,835,-659,834,-659,834,-659,834,-657,834,-657L832,-657,830,-656,829,-656,827,-655,827,-654,826,-654,825,-653,823,-653,822,-652,821,-652,820,-651,819,-651,818,-651,817,-651,817,-654,816,-657,815,-660,813,-665,809,-668,808,-669,806,-670,786,-670,783,-671,780,-674,778,-676,776,-677,773,-679L770,-679L769,-683L768,-683L768,-691,767,-694,766,-694,764,-697,762,-699,762,-700,762,-712,761,-715L761,-718L759,-721,762,-723,766,-725,767,-727,769,-729,768,-731,770,-734,771,-737,772,-739,773,-741,773,-745,771,-750,770,-752,770,-758,769,-760,768,-762,766,-762,767,-765,766,-767,766,-769,763,-771,764,-773,762,-776,761,-779,759,-780,757,-782,755,-785,756,-791,754,-793,756,-794,756,-815,757,-816,757,-822,758,-823,757,-825,759,-826,762,-827,768,-834,771,-837,775,-840,778,-842,781,-845,785,-848,789,-852,792,-855,793,-857,793,-858,795,-858,795,-863,795,-866,797,-868,798,-869,799,-870,799,-872,801,-872,804,-875,804,-879,804,-882,804,-887,804,-889,803,-892,802,-914,800,-918,798,-920,797,-922,794,-924,787,-931,782,-932,780,-933,778,-934L774,-934L774,-936,771,-936,767,-937,765,-938,764,-940,765,-942,766,-943,766,-945,768,-946,769,-948,769,-953,769,-954,770,-955,770,-966,770,-967L771,-967L771,-966,773,-966,774,-964,775,-965,776,-964,777,-963,778,-963,778,-963,779,-962,779,-962,780,-961,780,-960,781,-960,781,-959,782,-959,783,-957,784,-957,784,-956,785,-956,786,-955,787,-954,787,-953,789,-953,789,-952z"
                    },
                    {
                        "name": "Buleleng",
                        "value": "<?php echo $kab_buleleng->jlh_akomodasi ?>",
                        "path": "M16,-916,14,-917,13,-918,12,-919,11,-921,10,-921,10,-924,9,-924,9,-930,10,-930L10,-933L11,-934,11,-936,13,-937,14,-939,15,-940,15,-941,15,-943,16,-943,16,-949,15,-949,15,-951,14,-952,12,-953,11,-953,10,-954,9,-954,7,-955,6,-955,5,-956,4,-956,3,-958,3,-957,1,-959,1,-961,0,-962,0,-990,1,-991L1,-992L3,-993,3,-994,4,-995,6,-996,6,-998,9,-1000,12,-1003,12,-1004,15,-1005,18,-1005,21,-1006,31,-1006,33,-1005,37,-1004,38,-1003C38,-1003,40,-1004,41,-1003,41,-1003,42,-1002,42,-1002L44,-1002,45,-1001,48,-1001,48,-1000,50,-999,52,-998,53,-997,54,-997,55,-996,57,-996,58,-994C58,-994,59,-994,59,-994,60,-993,61,-992,61,-992L62,-991,63,-990,64,-989,64,-988,65,-987,66,-987,66,-986,67,-986,67,-979,67,-975,66,-974,65,-974,65,-973,64,-972,64,-971,63,-970,63,-968,63,-966,63,-965,64,-965,64,-964,65,-963,65,-962,67,-962,67,-961,70,-961,71,-960,72,-959,73,-959,74,-959,79,-959,81,-959,82,-960,84,-960,84,-962,86,-963,89,-963,90,-965,93,-966,94,-967,97,-969,99,-972C99,-972,99,-973,99,-973,99,-973,100,-974,100,-974L102,-975,103,-976,105,-977,107,-979,109,-979,110,-981,112,-982,113,-983,116,-986,122,-986,126,-984,129,-982,131,-980,133,-978,150,-978,154,-978C154,-978,155,-977,155,-977,156,-977,158,-977,158,-977L159,-975L164,-975L165,-974L168,-974L170,-973,172,-973,173,-972,179,-972,178,-971C178,-971,181,-971,181,-971,182,-971,182,-969,182,-969L184,-969,187,-966,190,-964,192,-963,195,-961,197,-959,200,-959,202,-957,206,-956,222,-957,226,-955,231,-955,237,-953,242,-951,245,-951,251,-950,262,-949,265,-948,271,-947,272,-946,276,-943,277,-941,279,-941,282,-940,285,-938,288,-938,291,-937,292,-935,297,-935,303,-934,305,-933L333,-933L337,-931L359,-931L365,-934,371,-936,373,-938,386,-937,388,-939,397,-938,398,-941,406,-941,410,-941,416,-942,421,-943,423,-945,429,-946,432,-948,437,-948,440,-950L444,-950L448,-953,453,-955C453,-955,458,-957,459,-958,460,-958,463,-962,463,-962L463,-964,469,-965,471,-966,472,-969,473,-973,476,-977,481,-980,487,-982,494,-982,499,-985,503,-991,507,-995,511,-998,518,-1002,521,-1005,527,-1010,534,-1014,540,-1017,548,-1017,549,-1018,554,-1019,557,-1021,561,-1022,564,-1024,569,-1024,570,-1025,593,-1024,595,-1027,599,-1027,602,-1024,603,-1024,607,-1022,612,-1021,615,-1019,618,-1019,623,-1018,626,-1017,631,-1015,634,-1013,637,-1011,642,-1010,646,-1008,649,-1009,653,-1007,656,-1006,659,-1002,665,-999,668,-996,673,-994,693,-994,699,-993,702,-991,706,-989,708,-987,713,-986,718,-984,722,-983,725,-980,730,-979,734,-976,737,-975,741,-974,748,-975,750,-973,754,-973,756,-973,758,-971,762,-970,765,-968,770,-967,770,-955,769,-954,769,-948,768,-946,766,-945,766,-943,765,-942,764,-940,757,-938,756,-940,752,-942,751,-944,744,-944,742,-943,727,-943,725,-945,723,-948,720,-951,716,-953L706,-953L705,-952,698,-952,697,-951,694,-950,692,-952,682,-952,681,-953,672,-953,670,-952,665,-951,664,-948,658,-942,653,-941,649,-940,646,-938,645,-932,644,-927,642,-926,639,-924,637,-923,637,-908,636,-907,636,-906,635,-903,635,-901,633,-901,633,-899,631,-897,630,-897,630,-895,629,-893,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860,550,-860,543,-855,540,-853,537,-853,535,-850,532,-851,528,-848,525,-849,522,-847,516,-846,513,-843,506,-843,506,-840,498,-841,493,-843,482,-842,474,-838,449,-829,434,-821,423,-820C423,-820,407,-806,407,-806L406,-801,394,-782,378,-782,376,-783,374,-783,373,-784,371,-784,370,-785,367,-786,366,-787,364,-788,363,-789,361,-790,359,-794,357,-795,356,-798,354,-798,351,-800,346,-805,342,-808,336,-809,334,-810,331,-809,328,-811,324,-811,321,-812,319,-813,317,-815,314,-817,312,-819,310,-821,309,-823,307,-823,306,-826,305,-827,305,-829,304,-831,304,-835,303,-836L303,-840L301,-842,301,-846,300,-848,299,-849L299,-850L298,-853,296,-854,294,-856,291,-859,290,-860,289,-861,284,-861,283,-863,275,-863,274,-864,271,-864,270,-865,268,-866,267,-867,265,-868,265,-874,265,-876,263,-877,259,-881,254,-883,250,-884,249,-886,245,-887,242,-889,238,-891,233,-895,230,-897,228,-898,228,-899,226,-899,226,-901,220,-902,217,-903,212,-908L210,-908L208,-907,206,-906,204,-903,198,-898,196,-897,181,-897,180,-892,179,-889,172,-889,165,-889,159,-891,142,-899,139,-904,137,-908,135,-914,132,-918,127,-922,115,-921,115,-923,105,-923,105,-922,100,-922,99,-921,95,-921,95,-919,90,-919,90,-918L85,-918L85,-917,75,-917,74,-916,55,-916,55,-915,48,-915,49,-914,41,-914,41,-912,33,-912,34,-911,18,-911,18,-912,17,-913,16,-913,16,-914z"
                    }
                ]
            }]
        });
    </script>

    <script type="text/javascript">
        // Initiate the chart
        Highcharts.mapChart('grafik-wilayah_akomodasi_5', {
            chart: {
                type: "map"
            },
            title: {
                useHTML: true,
                text: "<b><h4><center>Geomaps <?php echo $kat_akomodasi->kategori ?> Berdasarkan Jumlah Kamar </br> Tahun <?php echo $tahun ?></center></h4></b>"
            },
            legend: {
                enabled: true,
                layout: 'horizontal',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: false,
                verticalAlign: 'bottom'
                // x: -140
            },
            tooltip: {
                backgroundColor: '#f5f5f5',
                borderWidth: 0,
                shadow: true,
                useHTML: true,
                padding: 0,
                pointFormat: ' <a style="font-size:15pt"><b>{point.name}</b></a><br>' +
                    '<span style="font-size:18px">{point.value} Kamar</span>',
                positioner: function() {
                    return {
                        x: 10,
                        y: 320
                    };
                }
            },
            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'top'
                }
            },

            colorAxis: {
                min: "1",
                max: "<?php echo $nilai_max->max_kamar ?>",
                type: 'logarithmic',
                minColor: '#49FF56',
                maxColor: '#02820B',
                stops: [
                    [0, '#49FF56'],
                    [0.4, '#0AD518'],
                    [0.55, '#06B712'],
                    [0.60, '#03880D'],
                    [0.98, '#02820B']
                ]
                //     labels: {
                //     format: '{value}%'
                //   }
            },

            series: [{
                name: '<?php echo $kat_akomodasi->kategori ?> Tahun <?php echo $tahun ?>',
                states: {
                    hover: {
                        color: '#D1351D'
                    }
                },
                data: [{

                        "name": "Jembrana",
                        "value": "<?php echo $kab_jembrana->jlh_kamar ?>",
                        "path": "M126,-762,117,-772L117,-774L113,-776,111,-782,100,-792,91,-805,82,-813,71,-815,70,-816,63,-816,62,-818,59,-819,57,-820,56,-822,55,-825,55,-838,57,-840,56,-844,46,-854,34,-869,31,-876,31,-886,28,-893,24,-901,19,-906,18,-911,34,-911,33,-912,41,-912,41,-914,49,-914,48,-915,55,-915,55,-916C55,-916,74,-916,74,-916,75,-916,75,-917,75,-917L85,-917,85,-918L90,-918L90,-919,95,-919,95,-921,99,-921,100,-922,105,-922,105,-923,115,-923,115,-921,120,-922,125,-922C125,-922,127,-922,127,-922,128,-922,132,-918,132,-918L135,-914,137,-908,139,-904,142,-899,148,-896,154,-894,159,-891C159,-891,165,-889,165,-889,166,-889,172,-889,172,-889L179,-889,180,-892,181,-895,181,-897L188,-897L196,-897,198,-898,204,-903,206,-906,208,-907,210,-908L212,-908L215,-905,217,-903,220,-902,226,-901,226,-899,228,-899,228,-898,230,-897,232,-895,238,-891,242,-889,245,-887,249,-886,250,-884,254,-883,256,-882,259,-881C259,-881,260,-879,261,-879,261,-879,263,-877,263,-877,263,-877,265,-876,265,-876L265,-874,265,-868,267,-867,268,-866,270,-865,271,-864,274,-864,275,-863,283,-863,284,-861,289,-861,290,-860,291,-859,293,-857,294,-856,296,-854,298,-853,299,-851,299,-850L299,-849L300,-848,301,-846,301,-842,303,-840L303,-836L304,-835,304,-831C304,-831,305,-829,305,-829,305,-829,305,-827,305,-827L306,-826,307,-823,309,-823,310,-821,312,-819,314,-817,315,-816,317,-815,319,-813,321,-812C321,-812,323,-811,324,-811,324,-811,328,-811,328,-811L331,-809,334,-810C334,-810,336,-808,336,-808,336,-808,339,-808,339,-808L342,-808C342,-808,344,-807,344,-807,344,-807,346,-806,346,-806,346,-805,348,-803,348,-803L351,-800,354,-798,356,-798,356,-797C356,-797,357,-795,358,-795,358,-795,359,-794,359,-794,359,-794,361,-792,361,-792,361,-792,362,-790,362,-790,362,-790,363,-789,363,-789,363,-789,364,-788,364,-788,364,-788,366,-787,366,-787L367,-786,370,-785,371,-784,373,-784,374,-783,376,-783,378,-782,384,-782,390,-782,394,-782,394,-774,394,-769,396,-768,396,-765,396,-753,396,-750,398,-750L398,-734L395,-731,393,-728,388,-725,385,-723,384,-721,375,-721,372,-722,371,-723,368,-724,367,-726,364,-727,362,-729,358,-731,358,-732,355,-732L353,-732L353,-734,328,-733,327,-734,325,-739,323,-740,322,-742,319,-745,315,-748,310,-750,307,-750,304,-752,302,-752,302,-754,299,-754,298,-755,295,-755,294,-756,290,-757,290,-758,288,-758,286,-759,284,-759,283,-760,282,-760,281,-761,258,-761L258,-763L257,-763L256,-763,256,-764,254,-764,253,-765,251,-765,250,-767,249,-769,247,-770,233,-770,227,-770,226,-771,224,-771,223,-772,205,-772,203,-771,193,-771,192,-770,183,-770,183,-769,182,-769,181,-768L181,-767L176,-767,175,-766,173,-766,172,-766,171,-765,169,-764,168,-763L167,-763C167,-763,162,-762,161,-762,160,-762,160,-764,160,-764L158,-764L154,-764L152,-763,152,-762,130,-762z",
                    },
                    {
                        "name": "Tabanan",
                        "value": "<?php echo $kab_tabanan->jlh_kamar ?>",
                        "path": "M394,-782,406,-801,407,-806,423,-820,434,-821,449,-829,455,-831,463,-834,474,-838,482,-842,493,-843,498,-841,506,-840,506,-843,513,-843,516,-846,522,-847,525,-849,528,-848,532,-851,535,-850,537,-853,540,-853,543,-855,550,-860L577,-860L577,-854,576,-852,576,-846,576,-840,574,-841,574,-837,574,-826,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,581,-813,582,-811,582,-802,583,-801,583,-795,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,579,-761,576,-759,574,-758,570,-757,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,554,-747,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,542,-711,541,-710,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-678,523,-675,522,-674,522,-664,521,-657L520,-657L520,-653,519,-652,519,-650,515,-646,509,-641,503,-637,499,-634,494,-634,494,-633,481,-634,479,-633,477,-635,476,-637,474,-639,471,-642,468,-645,467,-645,464,-646,464,-649,462,-651,460,-653,460,-655,459,-657,455,-660,452,-666,447,-671,442,-674,437,-678,432,-683,430,-689,427,-694,425,-697,421,-698,417,-700,413,-701,408,-704,404,-706,400,-708,398,-711,394,-713,390,-715,386,-718,384,-721,393,-728,395,-731,398,-734L398,-750L396,-750,396,-752,396,-757,396,-765,396,-768,394,-769,394,-782"
                    },
                    {
                        "name": "Badung",
                        "value": "<?php echo $kab_badung->jlh_kamar ?>",
                        "path": "M479,-633,480,-632,482,-631,482,-629,483,-628,485,-628,485,-627,488,-627L488,-625L490,-625,490,-624,492,-622,493,-620,494,-619,494,-618,495,-616,497,-612L497,-611L499,-610L500,-610L499,-608,501,-607,502,-606,504,-604,505,-603,506,-602,507,-601,508,-600,509,-599,510,-598,511,-597L513,-597L514,-595C514,-595,515,-595,515,-595,515,-594,516,-593,516,-593L517,-592,519,-591,519,-590,520,-590,520,-589,521,-588,521,-587,522,-587,522,-586,525,-586L525,-585L526,-584,526,-584,527,-583L527,-582L528,-582,529,-581,530,-581,530,-580,531,-580,531,-578,531,-577,532,-577,532,-576,534,-576,534,-573,535,-571,535,-570,536,-570L536,-569L537,-569,537,-567,539,-567,538,-566,540,-566,540,-565,541,-565,541,-564L542,-564L544,-562,545,-560,547,-560,548,-558,550,-557,550,-554,551,-554C551,-554,552,-552,552,-551,553,-551,553,-549,553,-549,554,-549,556,-549,556,-549L559,-547,561,-546C561,-546,563,-545,563,-545,564,-544,567,-542,567,-542L568,-539,569,-538,570,-537,570,-527,569,-526,568,-523,566,-519,564,-517,563,-516,562,-511,563,-510,564,-508,565,-506,566,-503,567,-503L567,-500L569,-500,569,-497,569,-491,567,-489,565,-487C565,-487,564,-487,564,-487,563,-486,561,-484,561,-484L557,-482,547,-482,544,-481,540,-477,537,-474,531,-469C531,-469,526,-464,526,-464,526,-464,523,-462,523,-462L521,-459,514,-458,507,-457,502,-453,499,-449,499,-445C499,-445,499,-442,500,-442,500,-441,503,-441,503,-441,504,-441,507,-439,507,-439L509,-438,513,-436,516,-434C516,-434,518,-433,518,-433,519,-433,524,-433,524,-433L530,-432,546,-432,556,-433,562,-433,565,-435,569,-436,571,-438,577,-439,579,-440,585,-439C585,-439,590,-439,591,-439,591,-440,592,-441,592,-441L594,-442,599,-442,599,-443,605,-443,608,-445,609,-446L610,-446L612,-447,615,-450,620,-451,624,-455,628,-458,629,-460,629,-463,630,-464,630,-468,630,-491,630,-492,626,-495,620,-495,616,-491,612,-487,606,-483,603,-483,600,-484,598,-486,597,-488L597,-494L596,-496,595,-497,595,-507L595,-512L594,-513,593,-513,593,-516,592,-517,592,-520,590,-520,589,-521,587,-523,585,-525,585,-527,585,-537,583,-539,582,-541,580,-543,579,-545,577,-546,576,-548,575,-550L575,-557L573,-557,573,-565,572,-566,572,-568,571,-568,570,-569,570,-569,570,-571,568,-572,568,-573,567,-574,567,-589,568,-589,568,-590,570,-592,570,-598,571,-598,571,-604,572,-605,579,-605,582,-606,583,-608C583,-608,586,-609,586,-609,587,-609,589,-612,589,-612L591,-616,594,-617,597,-617,604,-621,608,-623,614,-628,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695C626,-695,631,-697,632,-698,633,-699,635,-706,635,-706L635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,615,-728,613,-730,613,-734,616,-737,622,-745C622,-745,626,-745,626,-746,627,-747,628,-756,628,-756L630,-762,635,-775,638,-779C638,-779,644,-785,644,-787,645,-788,647,-795,647,-795,647,-795,649,-800,649,-801,650,-801,651,-806,651,-806L652,-813,653,-815,653,-825,655,-828,654,-839,653,-841,653,-846,652,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,629,-890,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860L577,-860L577,-854,576,-852,576,-840,574,-841,574,-825,576,-825,576,-821,577,-821,577,-819,578,-818,579,-815,582,-811,582,-802,583,-801,583,-793,581,-792,582,-777,583,-775,583,-767,582,-765,582,-763,574,-758,567,-756,566,-755,561,-754,559,-752L556,-752L556,-751,554,-750,553,-745,551,-744L551,-742L550,-740,550,-730,550,-728,549,-723,549,-720,548,-719L548,-716L546,-714,544,-713,540,-708,537,-706,528,-700,526,-696,527,-695,525,-694,525,-691,524,-689,524,-684,522,-684,523,-675,522,-674,521,-657L520,-657L520,-653,519,-652,519,-650,509,-641,499,-634,494,-634,494,-633,481,-634z"
                    },
                    {
                        "name": "Denpasar",
                        "value": "<?php echo $kab_denpasar->jlh_kamar ?>",
                        "path": "M652,-557,652,-566,652,-569,653,-572,653,-574C653,-574,654,-575,654,-575,655,-575,655,-578,655,-578L656,-579,657,-581,658,-581,660,-583,661,-584,661,-588,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,633,-608,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,617,-630,616,-631,614,-628,608,-623,597,-617,594,-617,591,-616,589,-612,587,-609,583,-608,582,-606,579,-605,572,-605,571,-604,571,-598,570,-598,570,-592,568,-590,568,-589,567,-589,567,-574,568,-573,568,-572,570,-571,570,-569,570,-569,571,-568,572,-568,572,-566,573,-565,573,-557,575,-557L575,-550L576,-548,577,-546,579,-545,580,-543,582,-541,583,-539,585,-537,585,-527,585,-525C585,-525,587,-523,587,-523L589,-521,590,-520,592,-520,592,-517,593,-516,593,-513,594,-513,595,-512,595,-508,596,-508,596,-509,597,-511,599,-511,599,-512,600,-513C600,-513,601,-515,601,-515,601,-516,602,-516,602,-516L603,-517,605,-517,610,-518,612,-519,613,-521,615,-523,615,-525C615,-525,615,-526,615,-526,615,-527,616,-528,616,-528L617,-529,617,-530,618,-532,620,-534C620,-534,621,-535,621,-535,621,-535,624,-536,624,-536L627,-537C627,-537,629,-538,629,-538,629,-538,633,-537,633,-537,634,-537,638,-539,638,-539,638,-539,640,-540,640,-540,640,-540,643,-542,643,-542,643,-542,645,-543,645,-543,645,-543,645,-547,645,-547,645,-547,646,-548,647,-549,647,-549,648,-551,648,-552,648,-552,648,-554,649,-554,649,-554,651,-555,651,-555z"
                    },
                    {
                        "name": "Gianyar",
                        "value": "<?php echo $kab_gianyar->jlh_kamar ?>",
                        "path": "M682,-808,692,-809,693,-804,693,-802,691,-800C691,-800,690,-798,691,-797,691,-797,690,-794,690,-794L690,-791,691,-788,691,-786,692,-785,693,-783,695,-783,696,-780,698,-776L698,-774L698,-766,701,-764,704,-763,707,-761,707,-753,706,-752L706,-748L704,-747,703,-744,701,-743,700,-742,699,-740C699,-740,699,-739,698,-739,698,-738,698,-736,698,-736L697,-734,695,-733,695,-732,695,-730,694,-729,692,-727,692,-726,692,-723,691,-723,689,-719,689,-712,691,-710,691,-707,692,-706,692,-673,692,-670,693,-669,694,-667C694,-667,695,-666,695,-666,695,-665,698,-664,698,-664L699,-662C699,-662,702,-660,702,-659,703,-659,705,-657,705,-657L706,-654C706,-654,706,-654,707,-653,708,-652,709,-651,710,-650,710,-650,713,-650,713,-649,714,-648,716,-647,716,-646,716,-645,718,-644,717,-640,717,-637,717,-634,717,-634L715,-632,713,-629,711,-629,704,-628,701,-627,701,-626,700,-624,698,-621,696,-619,696,-616,693,-614,690,-613C690,-613,687,-611,686,-611,686,-611,684,-611,684,-611L682,-611C682,-611,678,-610,679,-609,679,-608,678,-606,678,-606L676,-606,674,-605,674,-602,672,-602,671,-601,671,-599,670,-599,670,-596,669,-594,667,-593,666,-592,666,-592,664,-591,662,-590,661,-590,654,-590,653,-591,652,-592,651,-592,651,-593,649,-593,649,-594,647,-594,647,-595,645,-597,643,-599,641,-600,639,-602,637,-603,636,-605,634,-606,632,-610,631,-612,630,-614,629,-616,627,-618,627,-620,626,-621,626,-622,624,-623,623,-624,622,-625,622,-625,621,-626,620,-628,618,-629,617,-630,616,-631,617,-633,619,-640,619,-651,618,-652,618,-688,620,-690,626,-695,632,-698,635,-706,635,-710,633,-712,631,-716,627,-718,626,-721,623,-723,618,-727,613,-730,613,-734,616,-737,622,-745,624,-745,626,-746,628,-756,635,-775,638,-779,641,-783,644,-786,647,-795,649,-800,651,-806,652,-813,653,-815,653,-825,655,-828,655,-830,657,-830,658,-829,660,-827,661,-826,663,-826,664,-824,667,-822,667,-820,669,-819,671,-817,673,-814,676,-813,677,-811,679,-810,680,-809z"
                    },
                    {
                        "name": "Klungkung",
                        "value": "<?php echo $kab_klungkung->jlh_kamar ?>",
                        "path": "M695,-711L707,-711L711,-712L721,-712L722,-713,728,-713,730,-715,734,-714,737,-717,737,-719,739,-720,740,-722,748,-722,750,-723,758,-723,759,-721,761,-718L761,-715L762,-712L762,-705L762,-700,762,-699,764,-697,766,-694,767,-694,768,-691,768,-683L769,-683L770,-679L773,-679L776,-677,778,-676,781,-673,783,-671C783,-671,785,-670,786,-670,786,-670,806,-670,806,-670L808,-669,810,-667,813,-665,815,-662,815,-659,816,-657,817,-654,817,-651,810,-650,808,-649,805,-649,803,-647,800,-646,799,-644,796,-643,790,-642,787,-639,785,-637,781,-636,778,-635,775,-634,772,-633,767,-631,733,-632,731,-633,727,-633,726,-634,722,-634,721,-636,720,-636,719,-637,718,-637,717,-636,718,-642,717,-645,716,-647,714,-648,713,-649,710,-650,706,-654,705,-657,699,-662,698,-664,696,-666,695,-666,694,-667,693,-669,692,-670,692,-706,691,-707,691,-710L691,-710z,M838,-560L845,-560L847,-562,862,-561,864,-563,866,-563,868,-565,872,-566,876,-566,877,-564,878,-563,880,-560,880,-559,881,-559,882,-557,882,-555C882,-555,883,-554,883,-554,883,-554,885,-553,885,-553L887,-553,889,-552,890,-551,892,-549,894,-546,895,-544,896,-543,897,-541,897,-539,898,-538,899,-536,900,-535,902,-534,903,-533,905,-531,909,-529,912,-528,914,-528,915,-526,918,-526,919,-525,921,-523,923,-521,923,-519,924,-517,925,-516,925,-513,926,-512,926,-510,927,-509,927,-506,928,-505,929,-503,930,-501,930,-496,929,-494,928,-492,927,-491,927,-489C927,-489,926,-489,926,-488,926,-488,926,-487,926,-487L922,-485,921,-483,919,-480,917,-478,915,-474,914,-472,912,-468,909,-466,907,-463,905,-458,903,-455C903,-455,899,-452,899,-452,899,-452,896,-449,896,-449L894,-449,893,-448,890,-449,889,-447,886,-446,876,-446,875,-447,873,-448,872,-449,871,-450,870,-450,869,-451,866,-451,865,-452,863,-453L859,-453L858,-455,857,-455,854,-455,853,-455,851,-457L850,-457L849,-458,848,-460,847,-463L847,-467L847,-474,846,-475,845,-478,844,-479,841,-482,839,-485,835,-488,833,-489,830,-489,828,-490,827,-490,824,-493,822,-494,818,-495,817,-497,816,-498,813,-500,810,-502,807,-504,805,-506,805,-507,803,-508,802,-510,801,-512,800,-514,800,-517,798,-519,797,-520,797,-532,799,-533,801,-535,803,-537,804,-538,806,-539,807,-540,808,-541,812,-544,814,-546,817,-550,821,-553,823,-554,824,-555,825,-556,828,-558C828,-558,832,-558,832,-558,832,-558,832,-559,833,-559,833,-559,836,-559,836,-559L836,-560z"
                    },
                    {
                        "name": "Bangli",
                        "value": "<?php echo $kab_bangli->jlh_kamar ?>",
                        "path": "M637,-908,637,-923,639,-924,642,-926,644,-927,645,-932,646,-938,649,-940,653,-941,658,-942,660,-944,664,-948,665,-951,670,-952,672,-953,681,-953,682,-952,692,-952,694,-950,697,-951,698,-952,705,-952,706,-953L716,-953L720,-951,723,-948,725,-945,727,-943,742,-943,744,-944,751,-944,752,-942,756,-940,757,-938,764,-940,765,-938,767,-937,771,-936,774,-936,774,-934L778,-934L780,-933,782,-932,783,-931,787,-931,790,-928,792,-925,795,-923,797,-922,798,-920,800,-918,801,-916,802,-914,802,-907,803,-892,804,-889,804,-882,804,-875,802,-874,801,-872,799,-872,799,-870,798,-869,797,-868,795,-866,795,-863,795,-858,793,-858,793,-857,792,-855,790,-853,785,-848,781,-845,778,-842,775,-840,771,-837,768,-834,762,-827,759,-826,757,-825,758,-823,757,-822,757,-816,756,-815,756,-797,756,-794,754,-793,756,-791,755,-785,757,-782,759,-780,761,-779C761,-779,762,-776,762,-776,762,-776,764,-773,764,-773L763,-771,765,-770,766,-769,766,-767,767,-765,766,-762,768,-762,769,-760C769,-760,770,-758,770,-757,770,-757,770,-752,770,-752L771,-750,772,-747,773,-745,773,-741,772,-739,771,-737,770,-734,768,-731,769,-729,767,-727,766,-725,762,-723,759,-721,758,-723,750,-723,748,-722,740,-722,739,-720,737,-719,737,-717,734,-714,730,-715,728,-713,722,-713,721,-712L711,-712L707,-711L695,-711L691,-710,689,-712,689,-719,691,-723,692,-723,692,-727,695,-730,695,-732,695,-733,697,-734,698,-736,698,-738,701,-743,703,-744,704,-747,706,-748L706,-752L707,-753,707,-761,704,-763,701,-764,698,-766,698,-776,697,-778,696,-780,695,-783,693,-783,692,-785,691,-786,690,-791,690,-794,691,-797,691,-798,691,-800,693,-802,693,-804,692,-809,682,-808,680,-809,679,-810,677,-811,676,-813,673,-814,670,-818,667,-820,667,-822,663,-826,661,-826,658,-829,657,-830,655,-830,654,-839,653,-841,653,-846,649,-849,648,-851,646,-855,644,-859,643,-861,641,-864,639,-867,636,-870,633,-875,634,-878,631,-880,630,-883,631,-888,628,-892,629,-893,630,-895,630,-897,631,-897,633,-899,633,-901,635,-901,635,-903,636,-906,636,-907z"
                    },
                    {
                        "name": "Karangasem",
                        "value": "<?php echo $kab_karangasem->jlh_kamar ?>",
                        "path": "M792,-952,808,-952,810,-951,812,-951,813,-949,816,-949,818,-948,819,-947,820,-947,822,-945,825,-944,828,-940,831,-938,832,-936,836,-936,838,-934,841,-934,844,-932,847,-930,850,-928,850,-927,853,-923,855,-921,857,-918,860,-915C860,-915,863,-912,864,-911,864,-911,866,-909,866,-909,867,-909,869,-907,869,-907L877,-908,879,-906,881,-906,883,-905,886,-905,887,-904,889,-902,891,-902,893,-900,898,-900,900,-899,901,-898,902,-897,902,-895,903,-894,904,-892,904,-891,906,-888C906,-888,907,-887,907,-886,907,-886,910,-882,910,-882L910,-879,911,-878,912,-875,913,-873,914,-871,916,-869,916,-866C916,-866,917,-864,917,-863,917,-863,918,-858,918,-858L918,-856,918,-854,919,-851,919,-849,920,-848,920,-846,921,-845,922,-843,923,-841,924,-841,926,-839,927,-838,928,-837,929,-836,931,-835,933,-834L934,-834L935,-833,937,-831,938,-830,941,-828,943,-827,946,-825,947,-824,949,-824,950,-822,953,-822,954,-821,955,-821,956,-820,957,-819,959,-818,961,-818,962,-817,963,-816C963,-816,964,-815,964,-815,965,-815,967,-814,967,-814L968,-813L969,-813L971,-812,975,-812,976,-811L977,-811L980,-809,983,-808,984,-808,987,-807C987,-807,989,-806,989,-805,990,-805,992,-802,992,-802L994,-800,996,-797,996,-796,998,-795,998,-792,999,-789,1000,-787,1000,-782,1000,-778,999,-776,999,-774,999,-773,996,-771,994,-769,991,-768,989,-767,988,-766,986,-765,983,-764,983,-763,980,-763,979,-762,976,-760,974,-757,971,-755,969,-754,967,-752,966,-751,964,-750,961,-748,960,-747,958,-746,956,-745,955,-743,953,-741,951,-740,949,-737,947,-736,945,-733,943,-732,942,-729,941,-728,940,-725,938,-723,937,-721,937,-720,936,-718,934,-717,932,-716,930,-713,929,-711,929,-710,927,-708,926,-707,926,-705,924,-703,922,-701,922,-699,918,-697,915,-694,915,-692,912,-692,910,-690,907,-689,905,-688,904,-687,901,-687,894,-687,888,-687,886,-686,881,-686,881,-686,878,-687,876,-688L873,-688L871,-689,869,-690,867,-691,866,-692,865,-692,862,-693,858,-693,855,-693,854,-692,853,-691,851,-690,851,-688,850,-688,849,-686,848,-685,847,-683,848,-675,846,-675,845,-673,844,-673,843,-671,841,-671,841,-670,841,-665,840,-665,839,-664,838,-664,837,-661,835,-661C835,-661,835,-659,834,-659,834,-659,834,-657,834,-657L832,-657,830,-656,829,-656,827,-655,827,-654,826,-654,825,-653,823,-653,822,-652,821,-652,820,-651,819,-651,818,-651,817,-651,817,-654,816,-657,815,-660,813,-665,809,-668,808,-669,806,-670,786,-670,783,-671,780,-674,778,-676,776,-677,773,-679L770,-679L769,-683L768,-683L768,-691,767,-694,766,-694,764,-697,762,-699,762,-700,762,-712,761,-715L761,-718L759,-721,762,-723,766,-725,767,-727,769,-729,768,-731,770,-734,771,-737,772,-739,773,-741,773,-745,771,-750,770,-752,770,-758,769,-760,768,-762,766,-762,767,-765,766,-767,766,-769,763,-771,764,-773,762,-776,761,-779,759,-780,757,-782,755,-785,756,-791,754,-793,756,-794,756,-815,757,-816,757,-822,758,-823,757,-825,759,-826,762,-827,768,-834,771,-837,775,-840,778,-842,781,-845,785,-848,789,-852,792,-855,793,-857,793,-858,795,-858,795,-863,795,-866,797,-868,798,-869,799,-870,799,-872,801,-872,804,-875,804,-879,804,-882,804,-887,804,-889,803,-892,802,-914,800,-918,798,-920,797,-922,794,-924,787,-931,782,-932,780,-933,778,-934L774,-934L774,-936,771,-936,767,-937,765,-938,764,-940,765,-942,766,-943,766,-945,768,-946,769,-948,769,-953,769,-954,770,-955,770,-966,770,-967L771,-967L771,-966,773,-966,774,-964,775,-965,776,-964,777,-963,778,-963,778,-963,779,-962,779,-962,780,-961,780,-960,781,-960,781,-959,782,-959,783,-957,784,-957,784,-956,785,-956,786,-955,787,-954,787,-953,789,-953,789,-952z"
                    },
                    {
                        "name": "Buleleng",
                        "value": "<?php echo $kab_buleleng->jlh_kamar ?>",
                        "path": "M16,-916,14,-917,13,-918,12,-919,11,-921,10,-921,10,-924,9,-924,9,-930,10,-930L10,-933L11,-934,11,-936,13,-937,14,-939,15,-940,15,-941,15,-943,16,-943,16,-949,15,-949,15,-951,14,-952,12,-953,11,-953,10,-954,9,-954,7,-955,6,-955,5,-956,4,-956,3,-958,3,-957,1,-959,1,-961,0,-962,0,-990,1,-991L1,-992L3,-993,3,-994,4,-995,6,-996,6,-998,9,-1000,12,-1003,12,-1004,15,-1005,18,-1005,21,-1006,31,-1006,33,-1005,37,-1004,38,-1003C38,-1003,40,-1004,41,-1003,41,-1003,42,-1002,42,-1002L44,-1002,45,-1001,48,-1001,48,-1000,50,-999,52,-998,53,-997,54,-997,55,-996,57,-996,58,-994C58,-994,59,-994,59,-994,60,-993,61,-992,61,-992L62,-991,63,-990,64,-989,64,-988,65,-987,66,-987,66,-986,67,-986,67,-979,67,-975,66,-974,65,-974,65,-973,64,-972,64,-971,63,-970,63,-968,63,-966,63,-965,64,-965,64,-964,65,-963,65,-962,67,-962,67,-961,70,-961,71,-960,72,-959,73,-959,74,-959,79,-959,81,-959,82,-960,84,-960,84,-962,86,-963,89,-963,90,-965,93,-966,94,-967,97,-969,99,-972C99,-972,99,-973,99,-973,99,-973,100,-974,100,-974L102,-975,103,-976,105,-977,107,-979,109,-979,110,-981,112,-982,113,-983,116,-986,122,-986,126,-984,129,-982,131,-980,133,-978,150,-978,154,-978C154,-978,155,-977,155,-977,156,-977,158,-977,158,-977L159,-975L164,-975L165,-974L168,-974L170,-973,172,-973,173,-972,179,-972,178,-971C178,-971,181,-971,181,-971,182,-971,182,-969,182,-969L184,-969,187,-966,190,-964,192,-963,195,-961,197,-959,200,-959,202,-957,206,-956,222,-957,226,-955,231,-955,237,-953,242,-951,245,-951,251,-950,262,-949,265,-948,271,-947,272,-946,276,-943,277,-941,279,-941,282,-940,285,-938,288,-938,291,-937,292,-935,297,-935,303,-934,305,-933L333,-933L337,-931L359,-931L365,-934,371,-936,373,-938,386,-937,388,-939,397,-938,398,-941,406,-941,410,-941,416,-942,421,-943,423,-945,429,-946,432,-948,437,-948,440,-950L444,-950L448,-953,453,-955C453,-955,458,-957,459,-958,460,-958,463,-962,463,-962L463,-964,469,-965,471,-966,472,-969,473,-973,476,-977,481,-980,487,-982,494,-982,499,-985,503,-991,507,-995,511,-998,518,-1002,521,-1005,527,-1010,534,-1014,540,-1017,548,-1017,549,-1018,554,-1019,557,-1021,561,-1022,564,-1024,569,-1024,570,-1025,593,-1024,595,-1027,599,-1027,602,-1024,603,-1024,607,-1022,612,-1021,615,-1019,618,-1019,623,-1018,626,-1017,631,-1015,634,-1013,637,-1011,642,-1010,646,-1008,649,-1009,653,-1007,656,-1006,659,-1002,665,-999,668,-996,673,-994,693,-994,699,-993,702,-991,706,-989,708,-987,713,-986,718,-984,722,-983,725,-980,730,-979,734,-976,737,-975,741,-974,748,-975,750,-973,754,-973,756,-973,758,-971,762,-970,765,-968,770,-967,770,-955,769,-954,769,-948,768,-946,766,-945,766,-943,765,-942,764,-940,757,-938,756,-940,752,-942,751,-944,744,-944,742,-943,727,-943,725,-945,723,-948,720,-951,716,-953L706,-953L705,-952,698,-952,697,-951,694,-950,692,-952,682,-952,681,-953,672,-953,670,-952,665,-951,664,-948,658,-942,653,-941,649,-940,646,-938,645,-932,644,-927,642,-926,639,-924,637,-923,637,-908,636,-907,636,-906,635,-903,635,-901,633,-901,633,-899,631,-897,630,-897,630,-895,629,-893,628,-892,626,-889,625,-889,622,-886,619,-885,618,-882,615,-881,610,-878,608,-876,603,-875,603,-873,601,-873,599,-871,596,-869,595,-868,592,-866,590,-864,580,-864,580,-863,577,-860,550,-860,543,-855,540,-853,537,-853,535,-850,532,-851,528,-848,525,-849,522,-847,516,-846,513,-843,506,-843,506,-840,498,-841,493,-843,482,-842,474,-838,449,-829,434,-821,423,-820C423,-820,407,-806,407,-806L406,-801,394,-782,378,-782,376,-783,374,-783,373,-784,371,-784,370,-785,367,-786,366,-787,364,-788,363,-789,361,-790,359,-794,357,-795,356,-798,354,-798,351,-800,346,-805,342,-808,336,-809,334,-810,331,-809,328,-811,324,-811,321,-812,319,-813,317,-815,314,-817,312,-819,310,-821,309,-823,307,-823,306,-826,305,-827,305,-829,304,-831,304,-835,303,-836L303,-840L301,-842,301,-846,300,-848,299,-849L299,-850L298,-853,296,-854,294,-856,291,-859,290,-860,289,-861,284,-861,283,-863,275,-863,274,-864,271,-864,270,-865,268,-866,267,-867,265,-868,265,-874,265,-876,263,-877,259,-881,254,-883,250,-884,249,-886,245,-887,242,-889,238,-891,233,-895,230,-897,228,-898,228,-899,226,-899,226,-901,220,-902,217,-903,212,-908L210,-908L208,-907,206,-906,204,-903,198,-898,196,-897,181,-897,180,-892,179,-889,172,-889,165,-889,159,-891,142,-899,139,-904,137,-908,135,-914,132,-918,127,-922,115,-921,115,-923,105,-923,105,-922,100,-922,99,-921,95,-921,95,-919,90,-919,90,-918L85,-918L85,-917,75,-917,74,-916,55,-916,55,-915,48,-915,49,-914,41,-914,41,-912,33,-912,34,-911,18,-911,18,-912,17,-913,16,-913,16,-914z"
                    }
                ]
            }]
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-1A_blok1-jpenumpang', {
            data: {
                table: 'data_jpenumpang-int_kategori'
            },
            chart: {
                type: 'column'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Kedatangan Wisatawan Mancanegara <br/>Menurut Kategori Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ' + 'orang';
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-1_blok2-jpenumpang', {
            data: {
                table: 'data-jpenumpang_blok2'
            },
            chart: {
                type: 'line'
            },
            title: {
                useHTML: true,
                text: "<h4><center> Jumlah Penumpang <br/> <?php echo $nama_pintu_masuk->pintu_masuk ?></center></h4>"
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ' + 'orang';
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-wilayah_akomodasi_2a', {
            data: {
                table: 'data_akomodasi_wilayah_pie_1'
            },
            chart: {
                type: 'pie'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Restoran Berdasarkan Jumlah Unit <br/>Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b><br/>' +
                        this.point.y + ' ' + this.series.name.toUpperCase();
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-wilayah_akomodasi_2b', {
            data: {
                table: 'data_akomodasi_wilayah_pie_2'
            },
            chart: {
                type: 'pie'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Restoran Berdasarkan Jumlah Kursi <br/>Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toUpperCase();
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-wilayah_akomodasi_3', {
            data: {
                table: 'data_akomodasi_wilayah'
            },
            chart: {
                type: 'bar'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Bar Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b><br/>' +
                        this.point.y + ' ' + this.series.name.toUpperCase();
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-1A_blok1-jpengunjung', {
            data: {
                table: 'data_objek_wisata'
            },
            chart: {
                type: 'line'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Pengunjung Pada Objek Wisata Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.x + '</b><br/>' +
                        this.point.y + ' ' + this.series.name.toUpperCase();
                }
            }
        });
    </script>

    <script type="text/javascript">
        Highcharts.chart('grafik-1A_blok1-jobjek_wisata', {
            data: {
                table: 'data_unit_objek_wisata'
            },
            chart: {
                type: 'pie'
            },
            title: {
                useHTML: true,
                text: '<h4><center>Grafik Jumlah Objek Wisata Berdasarkan Jumlah Unit <br/>Tahun <?php echo $tahun ?></center></h4>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br/> {point.y} ({point.percentage:.1f} %)'
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b><br/>' +
                        this.point.y + ' ' + this.series.name.toUpperCase();
                }
            }
        });
    </script>

</body>

</html>