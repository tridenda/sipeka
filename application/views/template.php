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
          ?>
          </strong>
        </a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Cart Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart"></i>
          <!-- <span class="badge badge-danger navbar-badge">2</span> -->
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
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-bell"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
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
      </li>
      <!-- History Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-file-signature"></i>
          <!-- <span class="badge badge-info navbar-badge">15</span> -->
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
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="<?=base_url('beranda')?>" class="brand-link elevation-4">
      <img src="<?=base_url()?>assets/img/icon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kedaibutin</span>
    </a
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('uploads/users/cashier/').$this->functions->user_login()->image?>" alt="User Image" class="bg-white rounded-circle" style="width: 2rem; height: 2rem;">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=ucfirst($this->functions->user_login()->username)?></a>
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
          <li class="nav-item has-treeview <?=  $this->uri->segment(1) == 'gaji' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'gaji' ? 'active' : ''?>">
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
                <a href="<?=base_url('gaji')?>" class="nav-link <?= $this->uri->segment(1) == 'gaji' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pembayaran Gaji</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('gaji')?>" class="nav-link <?= $this->uri->segment(1) == 'gaji' ? 'menu-open active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pembarayan Cuti</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'pengguna' ? 'menu-open active' : ''?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pengguna' ? 'active' : ''?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if( $this->functions->user_login()->level == '1') : ?>
              <li class="nav-item">
                <a href="<?=base_url('pengguna')?>" class="nav-link <?= $this->uri->segment(1) == 'pengguna'  ? 'active' : ''?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pramuniaga</p>
                </a>
              </li>
              <?php endif; ?>
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
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p class="text">Pengaturan</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
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
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="https://tridenda.github.io/" target="_blank">Tri Denda</a>.</strong>
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