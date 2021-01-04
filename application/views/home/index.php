
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Kedaibutin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed-top">
    <div class="container">      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Tentang</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Hubungi</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Kotak Saran</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li> -->

              <!-- Level two dropdown-->
              <!-- <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li> -->

                  <!-- Level three dropdown-->
                  <!-- <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li> -->
                  <!-- End Level three -->

                  <!-- <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li> -->
              <!-- End Level two -->
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- SEARCH FORM -->
        <div class="input-group">
          <input type="text" class="form-control form-control-sm" style="width: 13rem" placeholder="Cari mie kocok kaki sapi">
          <div class="input-group-append">
            <button class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:3.5rem; margin-bottom:3.5rem;">
    <!-- Main content -->
    <div class="container">
      <div class="container-fluid border-bottom pt-1 d-flex justify-content-center" style="">
        <div class="row mb-2 mt-3">
          <div class="form-group" style="width: 18rem">
            <select class="form-control form-control-sm select2 select2-hidden-accessible float-right" data-select2-id="1" tabindex="-1" aria-hidden="true">
              <option selected="selected" data-select2-id="3">Makanan</option>
              <option data-select2-id="29">Minuman</option>
              <option data-select2-id="30">Lainnya</option>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h4 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h4>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h4 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h4>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h4 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h4>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <h3 class="lead text-center border-bottom" style="height: 4.5rem;"><b>Nicole Pearson  Pearson Pearson </b></h3>
                <img src="http://192.168.1.2/kedaibutin-app/assets/AdminLTE-3.0.5/dist/img/user1-128x128.jpg" alt="" class="w-100">
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="fw-bold mt-1">Rp 25.000</p>
                  </div>
                  <div class="text-right">
                    <form action="">
                      <input type="number" value="1" style="width: 2rem;">
                      <!-- <input type="number" class="w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                      <input type="submit" class="btn btn-success btn-sm mb-1" value="+ keranjang">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent border-bottom">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item"><a class="page-link" href="#">8</a></li>
          </ul>
        </nav>
      </div>
      <div class="card-footer bg-transparent border-bottom text-center">
        <strong>Copyright © 2020-2021 <a href="https://tridenda.github.io/" target="_blank">Tri Denda</a>.</strong>
      </div>
    </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer fixed-bottom d-flex justify-content-center" style="padding:0">
    <div class="btn-group dropup m-2" style="width: 23rem">
      <button type="button" class="btn btn-outline-secondary rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-shopping-cart"></i>
      <span class="badge badge-danger navbar-badge">3</span>
      </button>
      <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    <div class="btn-group dropup m-2" style="width: 23rem">
      <button type="button" class="btn btn-outline-secondary rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell"></i>
      <span class="badge badge-danger navbar-badge">3</span>
      </button>
      <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    <div class="btn-group dropup m-2" style="width: 23rem">
      <button type="button" class="btn btn-outline-secondary rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-comments"></i>
      <span class="badge badge-danger navbar-badge">3</span>
      </button>
      <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>/assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
</body>
</html>
