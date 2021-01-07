<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gaji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('users')?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Gaji</li>
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
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> Gaji</h3>
          <div class="float-right">
            <a href="<?=base_url('gaji')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <!-- Input salary_id hidden for edit table -->
          <input name="salary_id" type="hidden" value="<?=$this->input->post('salary_id') ?? $row->salary_id?>">
          <div class="card-body">
            <div class="form-group">
              <label for="user">Nama Karyawan</label>
              <?php echo form_dropdown('user', $user, $selected_user, ['class' => 'form-control']) ?>
              <small class="text-red font-italic"><?php echo form_error('user'); ?></small>
            </div>
            <div class="form-group">
              <label for="salary">Gaji Pokok *</label>
              <input name="salary" type="number" class="form-control" id="salary" placeholder="Contoh: 1500000" value="<?=$this->input->post('salary') ?? $row->salary?>" autocomplete="off">
              <small class="text-red font-italic"><?php echo form_error('salary'); ?></small>
            </div>
            <div class="form-group">
              <label for="overtime_rupiah">Upah Lembur Perjam *</label>
              <input name="overtime_rupiah" type="number" class="form-control" id="overtime_rupiah" placeholder="Contoh: 10000" value="<?=$this->input->post('overtime_rupiah') ?? $row->overtime_rupiah?>" autocomplete="off">
              <small class="text-red font-italic"><?php echo form_error('overtime_rupiah'); ?></small>
            </div>
            <div class="form-group">
              <label for="worktime_hour">Jam Kerja Perhari *</label>
              <input name="worktime_hour" type="number" class="form-control" id="worktime_hour" placeholder="Contoh: 12" value="<?=$this->input->post('worktime_hour') ?? $row->worktime_hour?>" autocomplete="off">
              <small class="text-red font-italic"><?php echo form_error('worktime_hour'); ?></small>
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