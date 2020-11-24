
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
                                                    <?php echo number_format($box2a->jlh_unit) ?>
                                                    <a style="font-size: 16pt;">
                                                        <?php if (($box2aa->jlh_unit) != 0) {
                                                            $perc_akomodasi = (((($box2a->jlh_unit) - ($box2aa->jlh_unit)) / $box2aa->jlh_unit) * 100);
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
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box2a->jlh_unit) - ($box2aa->jlh_unit)) ?></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-navy">
                                        <div class="inner">
                                            <p>Jumlah Kamar
                                                <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box2b->jlh_kamar) ?>
                                                    <a style="font-size: 16pt;">
                                                        <?php if (($box2bb->jlh_kamar) != 0) {
                                                            $perc_kamar = (((($box2b->jlh_kamar) - ($box2bb->jlh_kamar)) / $box2bb->jlh_kamar) * 100);
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
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box2b->jlh_kamar) - ($box2bb->jlh_kamar)) ?></a>
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
                                            <p>Jumlah Unit
                                                <p style="font-size: 24pt; font-weight: bold;">
                                                    <?php echo number_format($box1a->jlh_restoran) ?>
                                                    <a style="font-size: 16pt;">
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
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars" style="color: #728E87"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box1a->jlh_restoran) - ($box1aa->jlh_restoran)) ?></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-navy">
                                        <div class="inner">
                                            <p>Jumlah Kursi
                                                <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box1b->jlh_kursi) ?>
                                                    <a style="font-size: 16pt;">
                                                        <?php if (($box1bb->jlh_kursi) != 0) {
                                                            $perc_kursi = (((($box1b->jlh_kursi) - ($box1bb->jlh_kursi)) / $box1bb->jlh_kursi) * 100);
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
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box1b->jlh_kursi) - ($box1bb->jlh_kursi)) ?></a>
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
                                            <p>Jumlah Unit
                                                <p style="font-size: 24pt; font-weight: bold;">
                                                    <?php echo number_format($box5a->jlh_objek_wisata) ?>
                                                    <a style="font-size: 16pt;">
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
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars" style="color: #728E87"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box5a->jlh_objek_wisata) - ($box5aa->jlh_objek_wisata)) ?></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-navy">
                                        <div class="inner">
                                            <p>Jumlah Pengunjung
                                                <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box5b->jlh_pengunjung) ?>
                                                    <a style="font-size: 16pt;">
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
                                            <i class="ion ion-stats-bars" style="color: #728E87"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box5b->jlh_pengunjung) - ($box5bb->jlh_pengunjung)) ?></a>
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
                                            <p>Jumlah Unit
                                                <p style="font-size: 24pt; font-weight: bold;"><?php echo number_format($box3b->jlh_bar) ?>
                                                    <a style="font-size: 16pt;">
                                                        <?php if (($box3bb->jlh_bar) != 0) {
                                                            $perc_bar = (((($box3b->jlh_bar) - ($box3bb->jlh_bar)) / $box3bb->jlh_bar) * 100);
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
                                        <a href="#" class="small-box-footer">Perubahan: <?= number_format(($box3b->jlh_bar) - ($box3bb->jlh_bar)) ?></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </section>
                    </header>