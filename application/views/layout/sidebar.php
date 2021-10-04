<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url() ?>/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - <?= $pageName; ?></title>
  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/css/datepicker.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>/js/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/js/datepicker.js"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?= file_exists('asset/logo/' . $setting->logo) ? base_url() . 'asset/logo/' . $setting->logo : base_url() . 'asset/logo/logo.png'; ?>">
        </div>
        <div class="sidebar-brand-text mx-3"><?= $setting->nama_app; ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() . 'index.php/dasbor'; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() . 'index.php/pelanggan'; ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() . 'index.php/karyawan' ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Karyawan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() . 'index.php/pesanan' ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pesanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() . 'index.php/pengeluaran' ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pengeluaran</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() . 'index.php/lap_pesanan' ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan Pesanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() . 'index.php/lap_keluar' ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan Pengeluaran</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Pengaturan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() . 'index.php/settings' ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan APP</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->