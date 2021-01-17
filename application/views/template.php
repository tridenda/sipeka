<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedaibutin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?=base_url()?>/assets/dist/js/Chart.bundle.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/img/icon.ico" />
  <style>
    * {
      box-sizing: border-box;
    }

    video {
      width: 100%;
      height: auto;
    }

    .row:after {
      content: "";
      clear: both;
      display: table;
    }

    [class*="col-"] {
      float: left;
      padding: 15px;
      width: 100%;
    }

    @media only screen and (min-width: 600px) {
      .col-s-1 {width: 8.33%;}
      .col-s-2 {width: 16.66%;}
      .col-s-3 {width: 25%;}
      .col-s-4 {width: 33.33%;}
      .col-s-5 {width: 41.66%;}
      .col-s-6 {width: 50%;}
      .col-s-7 {width: 58.33%;}
      .col-s-8 {width: 66.66%;}
      .col-s-9 {width: 75%;}
      .col-s-10 {width: 83.33%;}
      .col-s-11 {width: 91.66%;}
      .col-s-12 {width: 100%;}
    }

    @media only screen and (min-width: 768px) {
      .col-1 {width: 8.33%;}
      .col-2 {width: 16.66%;}
      .col-3 {width: 25%;}
      .col-4 {width: 33.33%;}
      .col-5 {width: 41.66%;}
      .col-6 {width: 50%;}
      .col-7 {width: 58.33%;}
      .col-8 {width: 66.66%;}
      .col-9 {width: 75%;}
      .col-10 {width: 83.33%;}
      .col-11 {width: 91.66%;}
      .col-12 {width: 100%;}
    }

    html {
      font-family: "Lucida Sans", sans-serif;
    }

    .header {
      background-color: #9933cc;
      color: #ffffff;
      padding: 15px;
    }

    .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu li {
      padding: 8px;
      margin-bottom: 7px;
      background-color: #33b5e5;
      color: #ffffff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }

    .menu li:hover {
      background-color: #0099cc;
    }

    .aside {
      background-color: #33b5e5;
      padding: 15px;
      color: #ffffff;
      text-align: center;
      font-size: 14px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }

    .footer {
      background-color: #0099cc;
      color: #ffffff;
      text-align: center;
      font-size: 12px;
      padding: 15px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed <?= $this->uri->segment(1) == 'laporan_persediaan' ? 'sidebar-collapse' : ''?>">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <strong>
          <?php
          echo indo_date(date('Y-m-d'), TRUE, TRUE);
          echo " — ";
          echo date('H:i:s');
          ?> [ F5 ]
          </strong>
        </a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Cart Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
            <span class="ml-3 mt-2 text-secondary">
              Total (5)
            </span>
            <span class="mr-3 mt-2">
              <a href="unpaid.html" class="link-success">See more</a>
            </span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is name product 1 <br>
              <small class="fst-italic">5 Unit</small>
            </span>
            <span> Rp 20.000</span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is name product 2 <br>
              <small class="fst-italic">5 Unit</small>
            </span>
            <span> Rp 50.000</span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is name product 3 <br>
              <small class="fst-italic">5 Unit</small>
            </span>
            <span> Rp 20.000</span>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-bell"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
            <span class="ml-3 mt-2 text-secondary">
              Unpaid (3)
            </span>
            <span class="mr-3 mt-2">
              <a href="unpaid.html" class="link-success">See more</a>
            </span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer name 1 <br>
              <small class="fst-italic">AP020919970001 ~ Rp 2.500.000</small>
            </span>
            <span>
              <button type="button" class="mt-1 btn btn-outline-success btn-sm">Pay Now</button>
            </span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer name 2 <br>
              <small class="fst-italic">AP020919970001 ~ Rp 2.500.000</small>
            </span>
            <span>
              <button type="button" class="mt-1 btn btn-outline-success btn-sm">Pay Now</button>
            </span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer name 3 <br>
              <small class="fst-italic">AP020919970001 ~ Rp 2.500.000</small>
            </span>
            <span>
              <button type="button" class="mt-1 btn btn-outline-success btn-sm">Pay Now</button>
            </span>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- History Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-file-signature"></i>
          <span class="badge badge-info navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
            <span class="ml-3 mt-2 text-secondary">
            History Transaction
            </span>
            <span class="mr-3 mt-2">
              <a href="history.html" class="link-success">See more</a>
            </span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer 1 <br>
              <small class="fst-italic">AP020919970001</small>
            </span>
            <span>Rp 250.000</span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer 2 <br>
              <small class="fst-italic">AP020919970001</small>
            </span>
            <span> Rp 2.250.000</span>
          </div>
          <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
            <span>
              This is customer 3 <br>
              <small class="fst-italic">AP020919970001</small>
            </span>
            <span> Rp 1.250.000</span>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Aplikasi penjualan, persediaan, kehadiran, dan laporan -->
  <!-- Apekela -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="<?=base_url('beranda')?>" class="brand-link elevation-4">
      <img src="<?=base_url()?>assets/img/sipeka.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I P E K A</span>
    </a
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('uploads/users/cashier/').$this->functions->user_login()->image?>" alt="User Image" class="bg-white rounded-circle" style="width: 2rem; height: 2rem;">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=ucfirst($this->functions->user_login()->name)?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="<?=base_url('beranda')?>" class="nav-link <?= $this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == '' ? 'active' : ''?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Kasir
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>assets/AdminLTE-3.0.5/charts/flot.html" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>assets/AdminLTE-3.0.5/charts/inline.html" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>assets/AdminLTE-3.0.5/charts/chartjs.html" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>assets/AdminLTE-3.0.5/charts/flot.html" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>assets/AdminLTE-3.0.5/charts/inline.html" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'daftar_bahan'
          || $this->uri->segment(1) == 'bahan_baku'
          || $this->uri->segment(1) == 'pemasok'
          || $this->uri->segment(1) == 'kategori'
          || $this->uri->segment(1) == 'satuan' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'daftar_bahan'
            || $this->uri->segment(1) == 'bahan_baku'
            || $this->uri->segment(1) == 'pemasok'
            || $this->uri->segment(1) == 'kategori'
            || $this->uri->segment(1) == 'satuan'
             ? 'active' : ''?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Bahan Baku
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('daftar_bahan')?>" class="nav-link <?= $this->uri->segment(1) == 'daftar_bahan' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Daftar Bahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('kategori')?>" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('satuan')?>" class="nav-link <?= $this->uri->segment(1) == 'satuan' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('pemasok')?>" class="nav-link <?= $this->uri->segment(1) == 'pemasok' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pemasok</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->uri->segment(1)  == 'masuk'
          || $this->uri->segment(2) == 'keluar'
          || $this->uri->segment(2) == 'hilang'
          || $this->uri->segment(2) == 'ditemukan'
          || $this->uri->segment(1) == 'persediaan' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'masuk'
            || $this->uri->segment(2) == 'keluar'
            || $this->uri->segment(2) == 'hilang'
            || $this->uri->segment(2) == 'ditemukan'
            || $this->uri->segment(1) == 'persediaan' ? 'active' : ''?>">
              <i class="nav-icon fas fa-dolly"></i>
              <p>
                Transaksi Persediaan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('persediaan/masuk')?>" class="nav-link <?= $this->uri->segment(2) == 'masuk' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Bahan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('persediaan/keluar')?>" class="nav-link <?= $this->uri->segment(2) == 'keluar' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Bahan Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('persediaan/hilang')?>" class="nav-link <?= $this->uri->segment(2) == 'hilang' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Bahan Hilang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('persediaan/ditemukan')?>" class="nav-link <?= $this->uri->segment(2) == 'ditemukan' ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Bahan Ditemukan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'pengisian_kehadiran' || $this->uri->segment(1) == 'pengisian_cuti'
          || $this->uri->segment(1) == 'pengisian_lembur' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pengisian_kehadiran' 
            || $this->uri->segment(1) == 'pengisian_cuti'
            || $this->uri->segment(1) == 'pengisian_lembur' ? 'active' : ''?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Kehadiran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pengisian_kehadiran')?>" class="nav-link <?= $this->uri->segment(1) == 'pengisian_kehadiran' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pengisian Kehadiran</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pengisian_cuti')?>" class="nav-link <?= $this->uri->segment(1) == 'pengisian_cuti' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pengisian Cuti</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pengisian_lembur')?>" class="nav-link <?= $this->uri->segment(1) == 'pengisian_lembur' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pengisian Lembur</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=  $this->uri->segment(1) == 'gaji'
          || $this->uri->segment(1) == 'pembayaran_gaji'
          || $this->uri->segment(1) == 'pembayaran_cuti' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'gaji'
            || $this->uri->segment(1) == 'pembayaran_gaji'
            || $this->uri->segment(1) == 'pembayaran_cuti' ? 'active' : ''?>">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Gaji Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('gaji')?>" class="nav-link <?= $this->uri->segment(1) == 'gaji' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Data Gaji</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pembayaran_gaji')?>" class="nav-link <?= $this->uri->segment(1) == 'pembayaran_gaji' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pembayaran Gaji</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pembayaran_cuti')?>" class="nav-link <?= $this->uri->segment(1) == 'pembayaran_cuti' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pembayaran Cuti</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'pramuniaga' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(2) == 'pramuniaga' ? 'active' : ''?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pengguna/pramuniaga')?>" class="nav-link <?= $this->uri->segment(2) == 'pramuniaga'  ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pramuniaga</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=base_url('users/members')?>" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pelanggan</p>
                </a>
              </li> -->
            </ul>
          </li>
          <?php if( $this->functions->user_login()->level == '1'  ) : ?>
          <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'laporan_persediaan' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'laporan_persediaan' ? 'menu-open active' : ''?>">
              <i class="nav-icon fas fa-chart-area"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('laporan_persediaan')?>" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Persediaan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <p class="border-bottom border-secondary mt-3"></p>
          <li class="nav-item">
            <a href="<?=base_url('pengguna/pengaturan')?>" class="nav-link <?= $this->uri->segment(2) == 'pengaturan'  ? 'active' : ''?>">
              <i class="nav-icon fas fa-cog"></i>
              <p class="text">Pengaturan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pengguna/bantuan')?>" class="nav-link <?= $this->uri->segment(2) == 'bantuan'  ? 'active' : ''?>">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>Bantuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('auth/logout_cashier')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery -->
  <script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
  
  <!-- Content Wrapper. Contains page content -->
  <?php echo $contents ?>

  <!-- Begin: Modal -->
  <?php if( isset($tutorial)) : ?>
  <div class="modal fade show" id="modal-xl" style="display: block;" aria-modal="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <?php 
            if( $this->uri->segment(1) == 'daftar_bahan' || $this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'satuan' ) {
              $modal_title = 'Bahan Baku';
              $video_type = 'materials';
            } else if( $this->uri->segment(1) == 'pemasok' || $this->uri->segment(1) == 'persediaan' ) {
              $modal_title = 'Transaksi Persediaan';
              $video_type = 'stocks';
            } else if( $this->uri->segment(1) == 'pengisian_kehadiran' || $this->uri->segment(1) == 'pengisian_cuti' || $this->uri->segment(1) == 'pengisian_lembur' ) {
              $modal_title = 'Kehadiran';
              $video_type = 'attendances';
            } else if( $this->uri->segment(1) == 'gaji' || $this->uri->segment(1) == 'pembayaran_gaji' || $this->uri->segment(1) == 'pembayaran_cuti' ) {
              $modal_title = 'Gaji Karyawan';
              $video_type = 'salaries';
            } else if( $this->uri->segment(1) == 'pengguna' ) {
              $modal_title = 'Pengguna';
              $video_type = 'users';
            }
          ?>
          <h4 class="modal-title">Tutorial <?=$modal_title?></h4>
          <?php
          if( $this->uri->segment(1) == 'daftar_bahan' ) {
            $base_url = base_url('daftar_bahan');
          } else if( $this->uri->segment(1) == 'kategori' ) {
            $base_url = base_url('kategori');
          } else if( $this->uri->segment(1) == 'satuan' ) {
            $base_url = base_url('satuan');
          } else if( $this->uri->segment(1) == 'pemasok' ) {
            $base_url = base_url('pemasok');
          } else if( $this->uri->segment(1) == 'persediaan' && $this->uri->segment(2) == 'masuk' ) {
            $base_url = base_url('persediaan/masuk');
          } else if( $this->uri->segment(1) == 'persediaan' && $this->uri->segment(2) == 'keluar' ) {
            $base_url = base_url('persediaan/keluar');
          } else if( $this->uri->segment(1) == 'persediaan' && $this->uri->segment(2) == 'hilang' ) {
            $base_url = base_url('persediaan/hilang');
          } else if( $this->uri->segment(1) == 'persediaan' && $this->uri->segment(2) == 'ditemukan' ) {
            $base_url = base_url('persediaan/ditemukan');
          } else if( $this->uri->segment(1) == 'pengisian_kehadiran' ) {
            $base_url = base_url('pengisian_kehadiran');
          } else if( $this->uri->segment(1) == 'pengisian_cuti' ) {
            $base_url = base_url('pengisian_cuti');
          } else if( $this->uri->segment(1) == 'pengisian_lembur' ) {
            $base_url = base_url('pengisian_lembur');
          } else if( $this->uri->segment(1) == 'gaji' ) {
            $base_url = base_url('gaji');
          } else if( $this->uri->segment(1) == 'pembayaran_gaji' ) {
            $base_url = base_url('pembayaran_gaji');
          } else if( $this->uri->segment(1) == 'pembayaran_cuti' ) {
            $base_url = base_url('pembayaran_cuti');
          } else if( $this->uri->segment(1) == 'pengguna' && $this->uri->segment(2) == 'pramuniaga' ) {
            $base_url = base_url('pengguna/pramuniaga');
          }
          ?>
          <a class="close" href="<?=$base_url?>">×</a>
          
        </div>
        <div class="modal-body">
          <video controls autoplay>
            <source src="<?=base_url()?>/assets/videos/<?=$video_type?>.mp4" type="video/mp4">
            <source src="<?=$video_type?>.ogg" type="video/ogg">
            Browser anda tidak kompetipel dengan HTML5.
          </video>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php endif; ?>
  <!-- End: Modal -->
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versi</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="<?=base_url('pengguna/bantuan')?>" target="_blank">Tri Denda</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#table1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  // Activate this if wanna use this app
  // document.addEventListener('contextmenu', event => event.preventDefault());
</script>

</body>
</html>