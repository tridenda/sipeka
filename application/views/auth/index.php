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
    <link href="<?=site_url()?>assets/dist/login.css" rel="stylesheet">
    <link href="<?=site_url()?>assets/dist/style.css" rel="stylesheet">
    <title>Kedaibutin</title>
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="<?=site_url('auth/process')?>" method="post">
        <img class="mb-4" src="<?=site_url()?>assets/img/icon.png" alt="" width="150" height="140">
        <h1 class="h3 mb-3 fw-normal">Masuk Sebagai</h1>
        <label for="username" class="visually-hidden">Nama Pengguna</label>
        <input name="username" type="text" id="username" class="form-control" placeholder="Nama pengguna" required autofocus>
        <label for="password" class="visually-hidden">Kata Sandi</label>
        <input name="password" type="password" id="password" class="form-control mt-2" placeholder="Kata sandi" required>
        <div class="d-flex justify-content-between">
          <label for="checkbox" style="margin-top: 0.7rem"><input name="remember" id="checkbox" type="checkbox"> Ingat saya</label>
          <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        </div>        
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021 <a class="link-success" href="https://tridenda.github.io/">Tri Denda</a></p>
      </form>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="<?=site_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper.js and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
    -->
  </body>
</html>