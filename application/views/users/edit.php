<!-- Begin: Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Begin: Main -->
    <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
      <h1 class="h2 text-secondary text-center border-bottom pb-3">Ubah Data Pengguna</h1>
      <div class="table-responsive d-flex justify-content-center mt-4">       
        <!-- Begin: Form Add User -->
        <form action="" method="post" class="row g-2 needs-validation w-50" novalidate>
          <input name="user_id" type="hidden" value="<?=$row->user_id?>">
          <div class="position-relative">
            <label for="name" class="form-label">Nama *</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="nama" value="<?=$this->input->post('name') ?? $row->name?>">
            <small class="text-danger"><?php echo form_error('name'); ?></small>
          </div>
          <div class="position-relative">
            <label for="username" class="form-label">Nama Pengguna *</label>
            <input name="username" type="text" class="form-control" id="username" placeholder="Nama pengguna" value="<?=$this->input->post('username') ?? $row->username?>">
            <small class="text-danger"><?php echo form_error('username'); ?></small>
          </div>
          <div class="position-relative">
            <label for="password" class="form-label">Kata Sandi <small class="fst-italic">(kosongkan jika tidak ingin diganti)</small></label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Kata sandi" value="<?=$this->input->post('password')?>">
            <small class="text-danger"><?php echo form_error('password'); ?></small>
          </div>
          <div class="position-relative">
            <label for="confpass" class="form-label">Konfirmasi Kata Sandi</label>
            <input name="confpass" type="password" class="form-control" id="confpass" placeholder="Konfirmasi kata sandi">
            <small class="text-danger"><?php echo form_error('confpass'); ?></small>
          </div>
          <div class="position-relative">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" id="address" class="form-control"><?=$this->input->post('address') ?? $row->address?></textarea>
          </div>
          <div class="position-relative">
            <label for="level">Tingkat *</label>
            <select name="level" id="level" class="form-control">
              <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                <option value="1" <?=$level == "1" ? "selected" : null?>>Admin</option>
                <option value="2"  <?=$level == "2" ? "selected" : null?>>Pramuniaga</option>
            </select>
            <small class="text-danger"><?php echo form_error('level'); ?></small>
          </div>
          <div class="col-12 text-right mt-4">
            <a class="btn btn-secondary" href="<?=site_url('users')?>">Batal</a>
            <input name="submit" class="btn btn-primary input" type="submit" value="Ubah" onclick="return confirm('Apakah anda ingin menambah pengguna baru?');">
          </div>
        </form>
        <!-- End: Form Add User --> 
      </div>
    </main>
    <!-- End: Main -->
    <!-- Begin: Sidebar -->
    <div class="col-md-3 col-lg-3 d-md-block sidebar collapse border-left border-5">
      <h2 class="fw-bold border-bottom pb-2 text-center text-secondary">Raw Material</h2>
      <!-- Begin: Sidebar Menu -->
      <div class="list-group mb-2">
        <a href="<?=site_url('raw_material/material_list')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Material List</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/categories')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Categories</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/units')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Units</a></span>
        </div>
        <a href="<?=site_url('raw_material/suppliers')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Suppliers</a>
        <a href="<?=site_url('raw_material/stock_in')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock-in</a>
        <a href="<?=site_url('raw_material/stock_out')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock-out</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/stock_missing')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock Missing</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/stock_found')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Stock Found</a></span>
        </div>
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