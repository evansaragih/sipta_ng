<header class="header header--bg2">
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <h2 style="color: white; font-weight: bold;">Akomodasi</h2>
                <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Jumlah Unit
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php echo number_format($box2a->jlh_akomodasi) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box2aa->jlh_akomodasi) != 0) {
                                        $perc_akomodasi = (((($box2a->jlh_akomodasi) - ($box2aa->jlh_akomodasi)) / $box2aa->jlh_akomodasi) * 100);
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
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box2a->jlh_akomodasi) - ($box2aa->jlh_akomodasi)) ?></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Jumlah Kamar
                            <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box2a->jlh_kamar) ?>
                                <a style="font-size: 16pt;">
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
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box2a->jlh_kamar) - ($box2aa->jlh_kamar)) ?></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Jumlah Tamu
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php echo number_format($box2a->jlh_tamu) ?>
                                <a style="font-size: 16pt;">
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
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box2a->jlh_tamu) - ($box2aa->jlh_tamu)) ?></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</header>

<header class="header header--bg2">
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <h2 style="color: white; font-weight: bold;">Restoran</h2>
                <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Nusantara
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php echo number_format($box1a->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box1aa->jlh_pengunjung) != 0) {
                                        $perc_restoran = (((($box1a->jlh_pengunjung) - ($box1aa->jlh_pengunjung)) / $box1aa->jlh_pengunjung) * 100);
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
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box1a->jlh_pengunjung) - ($box1aa->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Mancanegara
                            <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box1b->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
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
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box1b->jlh_pengunjung) - ($box1bb->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</header>

<header class="header header--bg2">
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <h2 style="color: white; font-weight: bold;">Objek Wisata</h2>
                <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Nusantara
                            <p style="font-size: 24pt; font-weight: bold;">
                                <?php echo number_format($box4a->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box4aa->jlh_pengunjung) != 0) {
                                        $perc_internasional = (((($box4a->jlh_pengunjung) - ($box4aa->jlh_pengunjung)) / $box4aa->jlh_pengunjung) * 100);
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
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box4a->jlh_pengunjung) - ($box4aa->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Mancanegara
                            <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box4b->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box4bb->jlh_pengunjung) != 0) {
                                        $perc_domestik = (((($box4b->jlh_pengunjung) - ($box4bb->jlh_pengunjung)) / $box4bb->jlh_pengunjung) * 100);
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
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box4b->jlh_pengunjung) - ($box4bb->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</header>

<header class="header header--bg2">
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <h2 style="color: white; font-weight: bold;">Bar</h2>
                <h4 style="color: white;"><?= ' Tahun ' . $tahun ?></h4>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Nusantara
                            <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box3b->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box3bb->jlh_pengunjung) != 0) {
                                        $perc_bar = (((($box3b->jlh_pengunjung) - ($box3bb->jlh_pengunjung)) / $box3bb->jlh_pengunjung) * 100);
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
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box3b->jlh_pengunjung) - ($box3bb->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <p>Pengunjung Mancanegara
                            <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box3b->jlh_pengunjung) ?>
                                <a style="font-size: 16pt;">
                                    <?php if (($box3bb->jlh_pengunjung) != 0) {
                                        $perc_bar = (((($box3b->jlh_pengunjung) - ($box3bb->jlh_pengunjung)) / $box3bb->jlh_pengunjung) * 100);
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
                        <i class="ion ion-stats-bars" style="color: #728E87"></i>
                    </div>
                    <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box3b->jlh_pengunjung) - ($box3bb->jlh_pengunjung)) ?></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</header>