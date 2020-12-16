<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=site_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <!--Fontawesome -->
    <script defer src="<?=site_url()?>assets/plugins/fontawesome/js/all.js"></script> 
    <!-- Bootstrap CSS -->
    <link href="<?=site_url()?>assets/dist/style.css" rel="stylesheet">

    <title>Kedaibutin</title>
  </head>
  <body>
    <!-- Navbar Menu -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom site-header sticky-top py-1 bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4" href="#" style="color: #2c7873;"><b>kedaibutin</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex mr-auto ml-5  w-100">
            <input class="form-control form-control-sm" type="text" placeholder="Search product name" aria-label=".form-control-sm example">
            <button class="btn btn-outline-dark btn-sm mr-5" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <ul class="navbar-nav ">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-shopping-cart"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" style="width:20rem;">
                <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
                  <span class="ml-3 text-secondary">
                    Total (15)
                  </span>
                  <span class="mr-3">
                    <a href="cart.html" class="link-success">Cart</a>
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
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" style="width:20rem;">
                <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
                  <span class="ml-3 text-secondary">
                    Unpaid (3)
                  </span>
                  <span class="mr-3">
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
              </ul>
            </li>
            <li class="nav-item dropdown mr-4">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-copy"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" style="width:20rem;">
                <div class="border-bottom pb-1 mb-2 d-flex justify-content-between fw-bold">
                  <span class="ml-3 text-secondary">
                  History Transaction
                  </span>
                  <span class="mr-3">
                    <a href="history.html" class="link-success">See more</a>
                  </span>
                </div>
                <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
                  <span>
                    This is customer name 1 <br>
                    <small class="fst-italic">AP020919970001</small>
                  </span>
                  <span> Rp 250.000</span>
                </div>
                <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
                  <span>
                    This is customer name 2 <br>
                    <small class="fst-italic">AP020919970001</small>
                  </span>
                  <span> Rp 2.250.000</span>
                </div>
                <div class="ml-3 mr-3 d-flex mb-2 justify-content-between border-bottom">
                  <span>
                    This is customer name 3 <br>
                    <small class="fst-italic">AP020919970001</small>
                  </span>
                  <span> Rp 1.250.000</span>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bars"></i> Menu 
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#" class="dropdown-item">Cashier</a></li>
                <li><a href="../raw-material/" class="dropdown-item">Raw Material</a></li>
                <li><a href="../product-list/" class="dropdown-item">Product List</a></li>
                <li><a href="<?=site_url('users')?>" class="dropdown-item">Pengguna / Pelanggan</a></li>
                <?php if( $this->login->user_login()->level == 1 ) : ?>
                <li><a href="../sellbuy-report/" class="dropdown-item">Sell/Buy Report</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> <?=ucfirst($this->login->user_login()->username)?> 
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="../account/settings.html" class="dropdown-item">Settings</a></li>
                <li><a href="../account/help.html" class="dropdown-item">Help</a></li>
                <li><a href="<?=site_url('auth/logout')?>" class="dropdown-item">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Begin: Content Wrapper -->
    <?php echo $contents ?>
    <!-- End: Content Wrapper -->

    <div class="clearfix"></div>
    <footer class="my-3 pt-1 text-muted text-center border-top ">
      <p class="mb-1">&copy; 2020-2021 <a class="link-success" href="https://tridenda.github.io/" target="popup">Tri Denda</a></p>
      <!-- <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul> -->
    </footer> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="<?=site_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper.js and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
    -->
  </body>
</html>