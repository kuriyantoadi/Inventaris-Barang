<?php
$username = $this->session->userdata('ses_user');
$ses_id = $this->session->userdata('ses_id');

?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Sistem Invetaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link href="<?= base_url() ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />

     <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
               
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/user.png" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $username ?></span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome <?= $username ?>!</h6>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        
                        <a class="dropdown-item" href="<?= base_url() ?>Login/admin_logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <!-- <h4 style="color: white; margin-top: 40px">Sistem Invetaris</h4> -->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img class="mt-2" src="<?= base_url('assets/images/logo-sekolah.png') ?>" style='max-width: 80px; max-height: 80;'>
                        <h4 style="color: white; margin-top: 10px">Sistem Invetaris</h4>
                        <!-- <img src="<?= base_url() ?>assets/images/logo-light.png" alt="" height="17"> -->
                    </span>
                </a>
                
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
    
            <div class="dropdown sidebar-user m-1 rounded">
                <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center gap-2">
                        <img class="rounded header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-8.jpg" alt="Header Avatar">
                        <span class="text-start">
                            <span class="d-block fw-medium sidebar-user-name-text"><?= $username ?></span>
                            <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                        </span>
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome <?= $username ?>!</h6>
                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                    <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
                    <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                    <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                </div>
            </div>
            
            <div id="scrollbar">
                <div class="container-fluid">


                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/index">
                                    <i class="ri-dashboard-line"></i> <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/barang">
                                    <i class="ri-archive-line"></i> <span data-key="t-dashboard">Data Barang</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/kategori_barang">
                                    <i class="ri-filter-line"></i> <span data-key="t-dashboard">Data Kategori Barang</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/input_barang_masuk">
                                    <i class="ri-inbox-archive-line"></i> <span data-key="t-dashboard">Input Barang Masuk</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/barang_masuk">
                                    <i class="ri-login-box-line"></i> <span data-key="t-dashboard">Data Barang Masuk</span>
                                </a>
                            </li>

                             <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/barang_keluar">
                                    <i class="ri-logout-box-line"></i> <span data-key="t-dashboard">Data Barang Keluar</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/mutasi">
                                    <i class="ri-shuffle-line"></i> <span data-key="t-dashboard">Data Mutasi</span>
                                </a>
                            </li>

                             <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/ruangan">
                                    <i class="ri-home-6-line"></i> <span data-key="t-dashboard">Data Ruangan</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url() ?>Admin/pengguna">
                                    <i class="ri-group-line"></i> <span data-key="t-dashboard">Data Pengguna</span>
                                </a>
                            </li>
                            
                            

                        </li> <!-- end Dashboard Menu -->      

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
