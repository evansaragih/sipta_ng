<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php if ($this->session->userdata('id_admin') != 0) { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url() ?>assets/upload/<?= $this->session->userdata('foto_profil') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                        echo strtoupper(substr(($this->session->userdata('username')), 0, 12)); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets/dist/img/avatar5.png') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>GUEST</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        <?php } ?>
        <ul class="sidebar-menu" data-widget="tree">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header" style="color: white">
                    <marquee behavior="scroll" direction="left">Sistem Pantau Pariwisata Provinsi Bali - Dinas Pariwisata Provinsi Bali - Indonesia</marquee>
                </li>
            </ul>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-language"></i> <span>Bahasa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <select onchange="doGTranslate(this);" class="select2" style="width: 100%;">
                            <option>Pilih Bahasa</option>
                            <option value="id|id">Indonesia</option>
                            <option value="id|en">English</option>
                            <option value="id|zh-CN">Cina</option>
                            <option value="id|ar">Arab</option>
                            <option value="id|it">Italia</option>
                            <option value="id|ja">Jepang</option>
                            <option value="id|ko">Korea</option>
                            <option value="id|nl">Belanda</option>
                            <option value="id|de">Jerman</option>
                            <option value="id|hi">India</option>
                            <option value="id|ru">Rusia</option>
                            <option value="id|pt">Portugis</option>
                            <option value="id|es">Spanyol</option>
                            <option value="id|ms">Malaysia</option>
                        </select>
                    </li>
                </ul>
            </li>
        </ul>
        </br>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="color: white">NAVIGASI UTAMA</li>
            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                <?php if ($kd_hlm == 'SA1') { ?>
                    <li class="active"><a href="<?php echo base_url('Profil') ?>"><i class="fa fa-user"></i> <span>Profil</span></a></li>
                <?php } else { ?>
                    <li><a href="<?php echo base_url('Profil') ?>"><i class="fa fa-user"></i> <span>Profil</span></a></li>
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
            <?php if ($kd_hlm == 'SB1') { ?>
                <li class="active">
                    <a href="<?= base_url('Dashboard') ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?= base_url('Dashboard') ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                <?php if (strstr($kd_hlm, "SC")) { ?>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-folder-open"></i>
                            <span>Data Pariwisata</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if ($kd_hlm == 'SC1') { ?>
                                <li class="active"><a href="<?= base_url('JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Jumlah Penumpang</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Jumlah Penumpang</a></li>
                            <?php } ?>
                            <?php if ($kd_hlm == 'SC2') { ?>
                                <li class="active"><a href="<?= base_url('JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara</a></li>
                            <?php } ?>
                            <?php if ($kd_hlm == 'SC3') { ?>
                                <li class="active"><a href="<?= base_url('AkomodasiNG') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('AkomodasiNG') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                            <?php } ?>
                            <?php if ($kd_hlm == 'SC4') { ?>
                                <li class="active"><a href="<?= base_url('Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                            <?php } ?>
                            <?php if ($kd_hlm == 'SC5') { ?>
                                <li class="active"><a href="<?= base_url('Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                            <?php } ?>
                            <?php if ($kd_hlm == 'SC6') { ?>
                                <li class="active"><a href="<?= base_url('ObjekWisata') ?>"><i class="fa fa-circle-o"></i> ObjekWisata</a></li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                            <?php } ?>
                            <?php if (strstr($kd_hlm, "SCA")) { ?>
                                <li class="treeview active">
                                    <a href="#">
                                        <i class="fa fa-circle-o"></i> Kebangsaan
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if ($kd_hlm == 'SCA1') { ?>
                                            <li class="active"><a href="<?= base_url('GrupKebangsaan') ?>"><i class="fa fa-circle-o"></i> Grup Kebangsaan</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('GrupKebangsaan') ?>"><i class="fa fa-circle-o"></i> Grup Kebangsaan</a></li>
                                        <?php } ?>
                                        <?php if ($kd_hlm == 'SCA2') { ?>
                                            <li class="active"><a href="<?= base_url('Kebangsaan') ?>"><i class="fa fa-circle-o"></i> Data Kebangsaan</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('Kebangsaan') ?>"><i class="fa fa-circle-o"></i> Data Kebangsaan</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-circle-o"></i> Kebangsaan
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('GrupKebangsaan') ?>"><i class="fa fa-circle-o"></i> Grup Kebangsaan</a></li>
                                        <li><a href="<?= base_url('Kebangsaan') ?>"><i class="fa fa-circle-o"></i> Data Kebangsaan</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i>
                            <span>Data Pariwisata</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Jumlah Penumpang</a></li>
                            <li><a href="<?= base_url('JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara</a></li>
                            <li><a href="<?= base_url('AkomodasiNG') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                            <li><a href="<?= base_url('Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                            <li><a href="<?= base_url('Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                            <li><a href="<?= base_url('ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> Kebangsaan
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('GrupKebangsaan') ?>"><i class="fa fa-circle-o"></i> Grup Kebangsaan</a></li>
                                    <li><a href="<?= base_url('Kebangsaan') ?>"><i class="fa fa-circle-o"></i> Data Kebangsaan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            <?php } else {
            } ?>
            <?php if (strstr($kd_hlm, "SD")) { ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-cubes"></i> <span>Statistik Pariwisata</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($kd_hlm == 'SDG') { ?>
                            <li class="active"><a href="<?= base_url('SP_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Statistik Region</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('SP_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Statistik Region</a></li>
                        <?php  } ?>
                        <?php if (strstr($kd_hlm, "SDA")) { ?>
                            <li class="treeview active">
                                <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($kd_hlm == 'SDA1') { ?>
                                        <li class="active"><a href="<?= base_url('SPB_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url('SPB_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <?php } ?>
                                    <?php if ($kd_hlm == 'SDA2') { ?>
                                        <li class="active"><a href="<?= base_url('SPT_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url('SPT_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('SPB_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <li><a href="<?= base_url('SPT_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                </ul>
                            </li>
                        <?php  } ?>
                        <?php if (strstr($kd_hlm, "SDB")) { ?>
                            <li class="treeview active">
                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($kd_hlm == 'SDB1') { ?>
                                        <li class="active"><a href="<?= base_url('SPB_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url('SPB_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <?php } ?>
                                    <?php if ($kd_hlm == 'SDB2') { ?>
                                        <li class="active"><a href="<?= base_url('SPT_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url('SPT_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('SPB_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                    <li><a href="<?= base_url('SPT_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                </ul>
                            </li>
                        <?php  } ?>
                        <?php if ($kd_hlm == 'SDC1') { ?>
                            <li class="active"><a href="<?= base_url('SP_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('SP_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                        <?php  } ?>
                        <?php if ($kd_hlm == 'SDD') { ?>
                            <li class="active"><a href="<?= base_url('SP_Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('SP_Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                        <?php  } ?>
                        <?php if ($kd_hlm == 'SDE') { ?>
                            <li class="active"><a href="<?= base_url('SP_Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('SP_Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                        <?php  } ?>
                        <?php if ($kd_hlm == 'SDF') { ?>
                            <li class="active"><a href="<?= base_url('SP_ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('SP_ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                        <?php  } ?>
                    </ul>
                </li>
            <?php } else { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cubes"></i> <span>Statistik Pariwisata</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('SP_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Statistik Region</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('SPB_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                <li><a href="<?= base_url('SPT_JumlahPenumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('SPB_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                <li><a href="<?= base_url('SPT_JumlahWisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('SP_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                        <li><a href="<?= base_url('SP_Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                        <li><a href="<?= base_url('SP_Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                        <li><a href="<?= base_url('SP_ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                <?php if (strstr($kd_hlm, "SE")) { ?>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-balance-scale"></i> <span>Prediksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (strstr($kd_hlm, "SEA")) { ?>
                                <li class="treeview active">
                                    <a href="#"><i class="fa fa-circle-o"></i> Regresi Linear
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if (strstr($kd_hlm, "SEAA")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SEAA1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SEAA2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_RL_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <li><a href="<?= base_url('Prediksi_RL_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if (strstr($kd_hlm, "SEAB")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SEAB1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SEAB2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_RL_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <li><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if (strstr($kd_hlm, "SEAC")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SEAC1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SEAC2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_RL_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_RL_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <li><a href="<?= base_url('Prediksi_RL_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEAD') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_RL_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_RL_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEAE') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_RL_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_RL_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEAF') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_RL_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_RL_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Regresi Linear
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_RL_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                <li><a href="<?= base_url('Prediksi_RL_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                            </ul>
                                        </li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_RL_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                <li><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                            </ul>
                                        </li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_RL_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                <li><a href="<?= base_url('Prediksi_RL_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_RL_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_RL_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_RL_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if (strstr($kd_hlm, "SEB")) { ?>
                                <li class="treeview active">
                                    <a href="#"><i class="fa fa-circle-o"></i>Single Exponential<br />Smoothing
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if ($kd_hlm == "SEBA") { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_SES_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_SES_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == "SEBB") { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_SES_Wisman') ?>"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_SES_Wisman') ?>"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara</a>
                                            </li>
                                        <?php } ?>


                                        <?php if (strstr($kd_hlm, "SEBC")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SEBC1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_SES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_SES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SEBC2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_SES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_SES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_SES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <li><a href="<?= base_url('Prediksi_SES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEBD') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_SES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_SES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEBE') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_SES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_SES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SEBF') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_SES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_SES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Single Exponential<br />Smoothing
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?= base_url('Prediksi_SES_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_SES_Wisman') ?>"><i class="fa fa-circle-o"></i>Wisatawan Mancanegara</a>
                                        </li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_SES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                <li><a href="<?= base_url('Prediksi_SES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_SES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_SES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_SES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if (strstr($kd_hlm, "SEC")) { ?>
                                <li class="treeview active">
                                    <a href="#"><i class="fa fa-circle-o"></i>Double Exponential<br />Smoothing
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if (strstr($kd_hlm, "SECA")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SECA1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SECA2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_DES_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <li><a href="<?= base_url('Prediksi_DES_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if (strstr($kd_hlm, "SECB")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SECB1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SECB2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_DES_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                    <li><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if (strstr($kd_hlm, "SECC")) { ?>
                                            <li class="treeview active">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <?php if ($kd_hlm == 'SECC1') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <?php } ?>
                                                    <?php if ($kd_hlm == 'SECC2') { ?>
                                                        <li class="active"><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?= base_url('Prediksi_DES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?= base_url('Prediksi_DES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                    <li><a href="<?= base_url('Prediksi_DES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SECD') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_DES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_DES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SECE') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_DES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_DES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($kd_hlm == 'SECF') { ?>
                                            <li class="active">
                                                <a href="<?= base_url('Prediksi_DES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('Prediksi_DES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i>Double Exponential<br />Smoothing
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_DES_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                <li><a href="<?= base_url('Prediksi_DES_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                            </ul>
                                        </li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_DES_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                                <li><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                            </ul>
                                        </li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?= base_url('Prediksi_DES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                                <li><a href="<?= base_url('Prediksi_DES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_DES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_DES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Prediksi_DES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-balance-scale"></i> <span>Prediksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Regresi Linear
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_RL_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                            <li><a href="<?= base_url('Prediksi_RL_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_RL_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                            <li><a href="<?= base_url('Prediksi_RL_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_RL_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                            <li><a href="<?= base_url('Prediksi_RL_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_RL_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_RL_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_RL_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Single Exponential<br />Smoothing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_Wisman') ?>"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Akomodasi</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_SES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>ObjekWisata</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i>Double Exponential<br />Smoothing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Jumlah Penumpang
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_DES_Penumpang') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                            <li><a href="<?= base_url('Prediksi_DES_T_Penumpang') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Wisatawan<br />Mancanegara
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_DES_Wisman') ?>"><i class="fa fa-circle-o"></i> Bulanan</a></li>
                                            <li><a href="<?= base_url('Prediksi_DES_T_Wisman') ?>"><i class="fa fa-circle-o"></i> Tahunan</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Akomodasi
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('Prediksi_DES_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                                            <li><a href="<?= base_url('Prediksi_DES_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_DES_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_DES_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_DES_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>ObjekWisata</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            <?php } else { ?>
            <?php } ?>

            <?php if (strstr($kd_hlm, "SF")) { ?>
                <li class="treeview active">
                    <a href="#">
                        <?php if ($this->session->userdata('id_admin') != 0) { ?>
                            <i class="fa fa-puzzle-piece"></i> <span>Gabungan Prediksi</span>
                        <?php } else { ?>
                            <i class="fa fa-balance-scale"></i> <span>Prediksi</span>
                        <?php } ?>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($kd_hlm == 'SFG') { ?>
                            <li class="active"><a href="<?= base_url('Prediksi_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Prediksi Region</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('Prediksi_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Prediksi Region</a></li>
                        <?php  } ?>
                        <?php if (strstr($kd_hlm, "SFA")) { ?>
                            <li class="treeview active">
                                <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($kd_hlm == 'SFA1') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_Penumpang') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_Penumpang') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($kd_hlm == 'SFA2') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_T_Penumpang') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_T_Penumpang') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?= base_url('Prediksi_Penumpang') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_T_Penumpang') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (strstr($kd_hlm, "SFB")) { ?>
                            <li class="treeview active">
                                <a href="#"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($kd_hlm == 'SFB1') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_Wisman') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_Wisman') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($kd_hlm == 'SFB2') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_T_Wisman') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_T_Wisman') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?= base_url('Prediksi_Wisman') ?>"><i class="fa fa-circle-o"></i>Bulanan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_T_Wisman') ?>"><i class="fa fa-circle-o"></i>Tahunan</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (strstr($kd_hlm, "SFC")) { ?>
                            <li class="treeview active">
                                <a href="#"><i class="fa fa-circle-o"></i> Akomodasi
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($kd_hlm == 'SFC1') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Akomodasi</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Akomodasi</a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($kd_hlm == 'SFC2') { ?>
                                        <li class="active">
                                            <a href="<?= base_url('Prediksi_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i>Kelas Bintang</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?= base_url('Prediksi_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i>Kelas Bintang</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Akomodasi
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?= base_url('Prediksi_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Akomodasi</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Prediksi_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i>Kelas Bintang</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($kd_hlm == 'SFD') { ?>
                            <li class="active">
                                <a href="<?= base_url('Prediksi_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= base_url('Prediksi_Restoran') ?>"><i class="fa fa-circle-o"></i>Restoran</a>
                            </li>
                        <?php } ?>
                        <?php if ($kd_hlm == 'SFE') { ?>
                            <li class="active">
                                <a href="<?= base_url('Prediksi_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= base_url('Prediksi_Bar') ?>"><i class="fa fa-circle-o"></i>Bar</a>
                            </li>
                        <?php } ?>
                        <?php if ($kd_hlm == 'SFF') { ?>
                            <li class="active">
                                <a href="<?= base_url('Prediksi_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= base_url('Prediksi_ObjekWisata') ?>"><i class="fa fa-circle-o"></i>Objek Wisata</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } else { ?>
                <li class="treeview">
                    <a href="#">
                        <?php if ($this->session->userdata('id_admin') != 0) { ?>
                            <i class="fa fa-puzzle-piece"></i> <span>Gabungan Prediksi</span>
                        <?php } else { ?>
                            <i class="fa fa-balance-scale"></i> <span>Prediksi</span>
                        <?php } ?>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('Prediksi_TinjauRegion') ?>"><i class="fa fa-circle-o"></i> Prediksi Region</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Jumlah Penumpang
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Prediksi_Penumpang') ?>"><i class="fa fa-circle-o"></i>Bulanan</a></li>
                                <li><a href="<?= base_url('Prediksi_T_Penumpang') ?>"><i class="fa fa-circle-o"></i>Tahunan</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Wisatawan Mancanegara
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Prediksi_Wisman') ?>"><i class="fa fa-circle-o"></i>Bulanan</a></li>
                                <li><a href="<?= base_url('Prediksi_T_Wisman') ?>"><i class="fa fa-circle-o"></i>Tahunan</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Akomodasi
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Prediksi_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Akomodasi</a></li>
                                <li><a href="<?= base_url('Prediksi_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i>Kelas Bintang</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('Prediksi_Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                        <li><a href="<?= base_url('Prediksi_Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                        <li><a href="<?= base_url('Prediksi_ObjekWisata') ?>"><i class="fa fa-circle-o"></i> Objek Wisata</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>