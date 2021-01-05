
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedaibutin | Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/others/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/others/font.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?=base_url()?>assets/img/icon.png" alt="" class="w-25"><br>
    <a href="<?=base_url()?>">
      <b>Kedaibutin</b>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukan nama pengguna dan kata sandi</p>

      <form action="<?=base_url('auth/process_cashier')?>" method="post">
        <div class="input-group mb-3">
          <input name="username" type="name" class="form-control" placeholder="Nama pengguna">
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Kata sandi">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="member" type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="card">
    <div class="container text-center mt-2 border-bottom pb-2">
      <h7 class="pb-2 font-weight-bold">
      Matikan atau muat ulang komputer</h7>
    </div>
    <div class="container mt-3 mb-3 d-flex justify-content-center">
      <a href="<?=base_url('auth/turn_off/restart')?>" class="btn btn-warning btn-lg mr-1" onclick="return confirm('Anda akan memuat ulang komputer, yakin?');" style="width: 10rem">
        <i class="fas fa-undo-alt"></i> Muat Ulang
      </a>     
      <a href="<?=base_url('auth/turn_off/shutdown')?>" class="btn btn-danger btn-lg mr-1" onclick="return confirm('Anda akan mematikan komputer, yakin?');" style="width: 10rem">
        <i class="fas fa-power-off"></i> Matikan
      </a>    
    </div>  
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
