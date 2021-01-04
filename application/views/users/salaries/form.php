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
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('users')?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Pramuniaga</li>
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
            <a href="<?=base_url('gaji')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <input name="salary_id" type="hidden" value="<?=$this->input->post('salary_id') ?? $row->salary_id?>">
            <div class="form-group">
              <label for="date">Tanggal *</label>
              <input name="date" type="date" class="form-control" id="date" value="<?=date('Y-m-d')?>" autofocus>
              <small class="text-red font-italic"><?php echo form_error('date'); ?></small>
            </div>
            <div class="form-group">
              <label for="user">Nama Pramuniaga</label>
              <?php echo form_dropdown('user', $user, $selected_user, ['class' => 'form-control']) ?>
              <small class="text-red font-italic"><?php echo form_error('user'); ?></small>
            </div>
            <div class="form-group">
              <label for="salary">Gaji *</label>
              <input name="salary" type="number" class="form-control" id="salary" placeholder="Isi dengan angka" value="<?=$this->input->post('salary') ?? $row->salary?>">
              <small class="text-red font-italic"><?php echo form_error('salary'); ?></small>
            </div>
            <div class="form-group">
              <label for="notes">Keterangan</label>
              <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Keterangan"><?=$this->input->post('notes') ?? $row->notes?></textarea>
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