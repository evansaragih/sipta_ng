<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url()?>assets/upload/<?=$data_admin->foto_profil?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo strtoupper($this->session->userdata('username')); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active"><a href="<?php echo base_url('Profil') ?>"><i class="fa fa-user"></i> <span>Profil Admin</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
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
                    <li class="treeview" hidden>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Akomodasi
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('AkomodasiNG') ?>"><i class="fa fa-circle-o"></i> Jumlah Akomodasi</a></li>
                            <li><a href="<?= base_url('DataAkomodasi') ?>"><i class="fa fa-circle-o"></i> Data Akomodasi*</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('AkomodasiNG') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                    <li><a href="<?= base_url('Restoran') ?>"><i class="fa fa-circle-o"></i> Restoran</a></li>
                    <li><a href="<?= base_url('Bar') ?>"><i class="fa fa-circle-o"></i> Bar</a></li>
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
                        <a href="#"><i class="fa fa-circle-o"></i>Wisatawan Mancanegara
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
                        <a href="#"><i class="fa fa-circle-o"></i>Jumlah Akomodasi
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('SP_Akomodasi') ?>"><i class="fa fa-circle-o"></i> Akomodasi</a></li>
                            <li><a href="<?= base_url('SP_AkomodasiBintang') ?>"><i class="fa fa-circle-o"></i> Hotel Bintang</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Restoran</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Bar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-balance-scale"></i> <span>Prediksi (Forecasting)</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= base_url('Prediksi_Penumpang') ?>"><i class="fa fa-circle-o"></i>Jumlah Penumpang</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Prediksi_Wisman') ?>"><i class="fa fa-circle-o"></i>Wisatawan Mancanegara</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Prediksi_Akomodasi') ?>"><i class="fa fa-circle-o"></i>Jumlah Akomodasi</a>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>