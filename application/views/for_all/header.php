<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="<?php echo base_url("assets/dist/img/logo-kecil.png") ?>" style="width: 40px;" alt="homepage" class="dark-logo" /></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?php echo base_url("assets/dist/img/logo-sipta2.png") ?>" style="width: 120px;" alt="homepage" class="dark-logo" /></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <?php
                        $tgl = date('l, d-m-Y');
                        echo $tgl;
                        ?>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if ($this->session->userdata('id_admin') != 0) { ?>
                            <img src="<?php echo base_url() ?>assets/upload/<?= $this->session->userdata('foto_profil') ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php echo strtoupper(substr(($this->session->userdata('username')), 0, 12)); ?>
                            </span>
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/dist/img/avatar5.png') ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">GUEST</span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                                <img src="<?php echo base_url() ?>assets/upload/<?= $this->session->userdata('foto_profil') ?>" class="img-circle" alt="User Image">
                                <p> <?php echo substr($this->session->userdata('nama'), 0, 12); ?>
                                    <small>NIP.<?php echo $this->session->userdata('nip'); ?></small>
                                </p>
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/dist/img/avatar5.png') ?>" class="img-circle" alt="User Image">
                                <p> Selamat Datang...
                                    <small>Nice To Meet You...</small>
                                </p>
                    <?php } ?>
                </li>
                <!-- Menu Footer-->
                <?php if ($this->session->userdata('id_admin') != 0) { ?>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?php echo base_url('Profil') ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-logout">Sign out</a>
                        </div>
                    </li>
                <?php } else {
                } ?>
            </ul>
            </li>
            <?php if ($this->session->userdata('id_admin') != 0) { ?>
                <li>
                    <a href="<?php echo base_url('Home') ?>"><i class="fa fa-university"></i></a>
                </li>
            <?php } else {
            } ?>
            </ul>
        </div>
    </nav>
</header>