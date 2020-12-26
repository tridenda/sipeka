
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedaibutin | Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=site_url()?>assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=site_url()?>assets/AdminLTE-3.0.5/plugins/others/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=site_url()?>assets/AdminLTE-3.0.5/plugins/others/font.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url()?>assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?=site_url()?>assets/img/icon.png" alt="" class="w-25"><br>
    <a href="<?=site_url()?>assets/AdminLTE-3.0.5/index2.html">
      <b>Kedaibutin</b>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukan nama anda</p>

      <form action="<?=site_url('auth/process')?>" method="post">
        <div class="input-group mb-3">
          <input name="guest_name" type="name" class="form-control" placeholder="Nama anda">
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat saya
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="guest" type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- ATAU -</p>
        <a href="<?=site_url('auth/login')?>" class="btn btn-secondary w-100">Sebagai Member</a>
      </div>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=site_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=site_url()?>assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=site_url()?>assets/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>