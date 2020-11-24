<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php if ($this->session->userdata('id_admin') != 0) { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                        echo strtoupper($this->session->userdata('username')); ?></p>
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
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header" style="color: white">
                    <marquee behavior="scroll" direction="left">Sistem Pantau Pariwisata Bali - Dinas Provinsi Pariwisata Provinsi Bali - Indonesia</marquee>
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
                            <option value="id|jp">Jepang</option>
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
            <li class="header">NAVIGASI UTAMA</li>
            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                <li><a href="<?php echo base_url('Profil') ?>"><i class="fa fa-user"></i> <span>Profil Admin</span></a></li>
            <?php } else {
            } ?>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if ($this->session->userdata('id_admin') != 0) { ?>
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
                        <li class="treeview" hidden>
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
            <?php } else {
            } ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Statistik Pariwisata</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
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
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Akomodasi
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('SP_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                            <li><a href="<?= base_url('SP_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Kelas Bintang</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('SP_Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                    <li><a href="<?= base_url('SP_Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-balance-scale"></i> <span>Prediksi (Forecasting)</span>
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
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#"><i class="fa fa-circle-o"></i> Single Exponential<br />Smoothing
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= base_url('Prediksi_SES_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                            </li>
                            <li class="active">
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
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>