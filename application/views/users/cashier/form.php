<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pramuniaga</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pramuniaga</a></li>
            <li class="breadcrumb-item active">Tambah pramuniaga</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> pramuniaga</h3>
          <div class="float-right">
            <a href="<?=site_url('users')?>" class="btn btn-warning btn-sm">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post">
          <div class="card-body">
            <input name="user_id" type="hidden" value="<?=$this->input->post('user_id') ?? $row->user_id?>">
            <div class="form-group">
              <label for="name">Nama *</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="<?=$this->input->post('name') ?? $row->name?>">
              <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
              <label for="username">Nama pengguna *</label>
              <input name="username" type="text" class="form-control" id="username" placeholder="Nama pengguna" value="<?=$this->input->post('username') ?? $row->username?>">
              <small class="text-red font-italic"><?php echo form_error('username'); ?></small>
            </div>
            <div class="form-group">
              <label for="password">Kata sandi <?= $page == 'add' ? '*' : null?></label>
              <input name="password" type="password" class="form-control" id="password" placeholder="Kata sandi" value="<?=$this->input->post('passconf') ?? $row->passconf?>">
              <small class="text-red font-italic"><?php echo form_error('password'); ?></small>
            </div>
            <div class="form-group">
              <label for="passconf">Konfirmasi kata sandi <?= $page == 'add' ? '*' : null?></label>
              <input name="passconf" type="password" class="form-control" id="passconf" placeholder="Konfirmasi kata sandi">
              <small class="text-red font-italic"><?php echo form_error('passconf'); ?></small>
            </div>
            <div class="form-group">
              <label for="level">Tingkat *</label>
              <select name="level" id="level" class="form-control">
                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                <?= $page == 'add' ? '<option value="">- Pilih -</option>' : null?>
                <option value="1" <?= $level == '1' ? 'selected' : null?>>Admin</option>
                <option value="2" <?= $level == '2' ? 'selected' : null?>>Pramuniaga</option>
              </select>
              <small class="text-red font-italic"><?php echo form_error('level'); ?></small>
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="address" class="form-control" rows="3" placeholder="Alamat"><?=$this->input->post('address') ?? $row->address?></textarea>
            </div>
            <div class="form-group">
              <label for="image">Gambar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="image">
                  <label class="custom-file-label" for="image">Pilih gambar</label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button name="<?=$page?>" type="submit" class="btn btn-primary float-right ml-2"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-secondary float-right ml-2">Reset</button>
          </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>