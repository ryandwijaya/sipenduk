<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sipenduk</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/jquery-selectric/selectric.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                  class="fas fa-bars"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i class="fas fa-expand"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url() ?>assets/profile_av.png" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Hello <?= $this->session->userdata('session_nama') ?></div>
              
              <div class="dropdown-divider"></div>
              <a href="<?= base_url() ?>auth/logout" onclick="return confirm('Yakin ingin keluar dari sistem?')" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">
              <img alt="image" src="<?= base_url() ?>assets/img/logo.png" class="header-logo" />
              <span class="logo-name">SIPENDUK</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            
            <li><a class="nav-link" href="<?= base_url() ?>dashboard"><i class="fas fa-home"></i><span>Dashboard</span></a></li>

            <li class="menu-header">Data</li>            
            <li><a class="nav-link" href="<?= base_url() ?>kel"><i class="far fa-map"></i><span>Data Kelurahan</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>rw"><i class="far fa-list-alt"></i><span>Data RW</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>rt"><i class="fas fa-warehouse"></i><span>Data RT</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>kk"><i class="fas fa-clipboard"></i><span>Data KK</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>penduduk"><i class="fa fa-users"></i><span>Data Penduduk</span></a></li>

            <?php if ($this->session->userdata('session_level')=='admin'): ?>
              
            <li><a class="nav-link" href="<?= base_url() ?>user"><i class="fa fa-users"></i><span>Data User</span></a></li>
            <?php endif ?>

            <li class="menu-header">Operation</li>
            <li><a class="nav-link" href="<?= base_url() ?>bantuan"><i class="fa fa-gift"></i><span>Bantuan</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>laporan"><i class="fa fa-file"></i><span>Laporan</span></a></li>
            
            
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul ?></h1>
          </div>