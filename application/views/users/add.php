<!-- Begin: Content -->
<div class="container-fluid mt-4">
      <div class="row">
        <!-- Begin: Main -->
        <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
          <h1 class="h2 text-secondary text-center border-bottom pb-3">Tambah Pengguna</h1>
          <div class="table-responsive d-flex justify-content-center mt-4">       
            <!-- Begin: Form Add User -->
            
            <form action="" method="post" class="row g-2 needs-validation w-50" novalidate>
              <div class="position-relative">
                <label for="name" class="form-label">Nama *</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="nama" value="<?=set_value('name')?>">
                <small class="text-danger"><?php echo form_error('name'); ?></small>
              </div>
              <div class="position-relative">
                <label for="username" class="form-label">Nama Pengguna *</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Nama pengguna" value="<?=set_value('username')?>">
                <small class="text-danger"><?php echo form_error('username'); ?></small>
              </div>
              <div class="position-relative">
                <label for="password" class="form-label">Kata Sandi *</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Kata sandi" value="<?=set_value('password')?>">
                <small class="text-danger"><?php echo form_error('password'); ?></small>
              </div>
              <div class="position-relative">
                <label for="confpass" class="form-label">Konfirmasi Kata Sandi *</label>
                <input name="confpass" type="password" class="form-control" id="confpass" placeholder="Konfirmasi kata sandi">
                <small class="text-danger"><?php echo form_error('confpass'); ?></small>
              </div>
              <div class="position-relative">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control"></textarea>
              </div>
              <div class="position-relative">
                <label for="level">Tingkat *</label>
                <select name="level" id="level" class="form-control">
                  <option value="">- Pilih - </option>
                  <option value="1" <?=set_value('level') == "1" ? "selected" : null?>>Admin</option>
                  <option value="2"  <?=set_value('level') == "2" ? "selected" : null?>>Pramuniaga</option>
                </select>
                <small class="text-danger"><?php echo form_error('level'); ?></small>
              </div>
              <div class="col-12 text-right mt-4">
                <a class="btn btn-secondary" href="<?=site_url('users')?>">Batal</a>
                <input name="submit" class="btn btn-primary input" type="submit" value="Tambah" onclick="return confirm('Apakah anda ingin menambah pengguna baru?');">
              </div>
            </form>
            <!-- End: Form Add User --> 
          </div>
        </main>
        <!-- End: Main -->
        <!-- Begin: Sidebar -->
        <div class="col-md-3 col-lg-3 d-md-block sidebar collapse border-left border-5">
          <h2 class="fw-bold border-bottom pb-2 text-center text-secondary">Pengguna</h2>
          <!-- Begin: Sidebar Menu -->
          <div class="list-group mb-2">
            <a href="<?=site_url('users')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Daftar Pengguna</a>
          </div>
          <!-- End: Sidebar menu -->

          <!-- Begin: History Activity -->
          <ul class="list-group mb-3">
            <li class="list-group-item text-center text-secondary">
              <strong>History Activity</strong>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item">
              <div class="d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 text-muted">Administator</h6>
                </div>
                <small class="text-muted">10:00 ~ 02/09/20</small>
              </div>
              <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
            </li>
            <li class="list-group-item text-center">
              <a href="" class="link-success">See more</a>
            </li>
          </ul>
          <!-- End: History Activity -->
        </div>
        <!-- End: Sidebar -->
      </div>
    </div>
    <!-- End: Content -->