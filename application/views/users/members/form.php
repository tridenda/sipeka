<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('users/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> pelanggan</h3>
          <div class="float-right">
            <a href="<?=base_url('pengguna/pelanggan')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post">
          <div class="card-body">
            <input name="member_id" type="hidden" value="<?=$this->input->post('member_id') ?? $row->member_id?>">
            <div class="form-group">
              <label for="name">Nama *</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="<?=$this->input->post('name') ?? $row->name?>" autocomplete="off" autofocus>
              <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
              <label for="gender">Jenis kelamin *</label>
              <select name="gender" id="gender" class="form-control">
                <?php $gender = $this->input->post('gender') ? $this->input->post('gender') : $row->gender ?>
                <?= $page == 'add' ? '<option value="">- Pilih -</option>' : null?>
                <option value="male" <?= $gender == 'male' ? 'selected' : null?>>Laki-laki</option>
                <option value="female" <?= $gender == 'female' ? 'selected' : null?>>Perempuan</option>
              </select>
              <small class="text-red font-italic"><?php echo form_error('gender'); ?></small>
            </div>
            <div class="form-group">
              <label for="phone">No HP *</label>
              <input name="phone" type="number" class="form-control" id="phone" placeholder="Contoh: 085155227654" value="<?=$this->input->post('phone') ?? $row->phone?>" autocomplete="off" autofocus>
              <small class="text-red font-italic"><?php echo form_error('phone'); ?></small>
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="address" class="form-control" rows="3" placeholder="Alamat"><?=$this->input->post('address') ?? $row->address?></textarea>
            </div>
            <div class="form-group">
              <label for="point">Poin *</label>
              <input name="point" type="number" class="form-control" id="point" placeholder="Poin dalam bentuk rupiah." value="<?=$this->input->post('point') ?? $row->point?>" autocomplete="off" autofocus>
              <small class="text-red font-italic"><?php echo form_error('point'); ?></small>
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