
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
  <!-- Icon Kedaibutin -->
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/img/icon.ico" />
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
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Ingat saya
              </label> -->
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
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

<script>document.addEventListener('contextmenu', event => event.preventDefault());</script>
</body>
</html>
